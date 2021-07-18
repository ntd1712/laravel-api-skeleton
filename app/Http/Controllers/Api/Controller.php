<?php

namespace App\Http\Controllers\Api;

use Chaos\Controller\LaravelControllerTrait;
use Chaos\Support\Config\VarsConfigAdapter;
use Chaos\Support\Container\Container;
use Chaos\Support\Doctrine\ManagerRegistry;
use Chaos\Support\Doctrine\ODM\DocumentManagerFactory;
use Chaos\Support\Doctrine\ORM\EntityManagerFactory;
use Chaos\Support\Messenger\LaravelEventDispatcherAdapter;
use Chaos\Support\Serializer\SerializerFactory;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Routing\RouteDependencyResolverTrait;
use M1\Vars\Vars;

/**
 * Class Controller.
 *
 * @author t(-.-t) <ntd1712@mail.com>
 */
class Controller extends BaseController
{
    use AuthorizesRequests;
    use DispatchesJobs;
    use ValidatesRequests;
    use RouteDependencyResolverTrait;
    use LaravelControllerTrait;

    /**
     * Initializes Controller.
     */
    public function __invoke()
    {
        Container::setInstance($this->container = app());

        // <editor-fold defaultstate="collapsed" desc="Initializes Config">

        $basePath = $this->container->basePath();
        $cachePath = $this->container->storagePath() . '/framework/cache';
        $config = $this->container['config'];

        $vars = new VarsConfigAdapter(
            new Vars(
                array_merge(
                    glob($basePath . '/modules/core/*/config.yml', GLOB_NOSORT),
                    glob($basePath . '/modules/app/*/config.yml', GLOB_NOSORT),
                    [$basePath . '/modules/config.yml']
                ),
                [
                    'cache' => $this->container->isProduction(),
                    'cache_path' => $cachePath,
                    'loaders' => ['yaml'],
                    'merge_globals' => false,
                    'replacements' => [
                        'base_path' => $basePath,
                        'cache_path' => $cachePath,
                        'app' => $config['app'],
                        'db' => $config['database.connections'][$config['database.default']]
                    ]
                ]
            )
        );
        $this->container->instance('vars', $vars);

        // </editor-fold>

        // <editor-fold defaultstate="collapsed" desc="Initializes Dispatcher">

        $dispatcher = new LaravelEventDispatcherAdapter(app('events'));
        $this->container->instance('dispatcher', $dispatcher);

        // </editor-fold>

        // <editor-fold defaultstate="collapsed" desc="Initializes Doctrine">

        try {
            $connections = $managers = [];

            if (isset($vars['doctrine'])) {
                foreach ($vars['doctrine']['connections'] as $id => $name) {
                    $connections[$id] = $id . '_connection'; //= ['default' => 'default_connection']
                }

                foreach ($vars['doctrine']['entity_managers'] as $id => $name) {
                    /* @var \Doctrine\ODM\MongoDB\DocumentManager|\Doctrine\ORM\EntityManager $manager */
                    $this->container->instance(
                        $managers[$id] = $id . '_entity_manager',
                        $manager = (new EntityManagerFactory())($this->container, $id, $vars['doctrine'])
                    );
                    $this->container->instance($connections[$name['connection']], $manager->getConnection());
                }
            }

            if (isset($vars['doctrine_mongodb'])) {
                foreach ($vars['doctrine_mongodb']['connections'] as $id => $name) {
                    $connections[$id] = $id . '_connection';
                }

                foreach ($vars['doctrine_mongodb']['document_managers'] as $id => $name) {
                    $this->container->instance(
                        $managers[$id] = $id . '_document_manager',
                        $manager = (new DocumentManagerFactory())($this->container, $id, $vars['doctrine_mongodb'])
                    );
                    $this->container->instance($connections[$name['connection']], $manager->getClient());
                }
            }

            $doctrine = new ManagerRegistry(
                'anonymous',
                $connections,
                $managers,
                'default',
                'default',
                $vars['doctrine']['proxy_interface_name']
            );
            $doctrine->setContainer($this->container);

            $this->container->instance('doctrine', $doctrine);
        } catch (Exception $exception) {
            abort(500, 'Application Configuration Error');
        }

        // </editor-fold>

        // <editor-fold defaultstate="collapsed" desc="Initializes Serializer">

        $serializer = (new SerializerFactory())($this->container, null, $vars['serializer']);
        $this->container->instance('serializer', $serializer);

        // </editor-fold>

        foreach (func_get_args() as $service) {
            $this->container->instance(get_class($service), $service($this->container, null));
        }
    }

    /**
     * {@inheritDoc}
     *
     * @param string $method The method to be called.
     * @param array $parameters The parameters to be passed.
     *
     * @return mixed
     */
    public function callAction($method, $parameters)
    {
        if (!method_exists($this, $method)) {
            $parameters = $this->resolveClassMethodDependencies(
                request()->route()->parametersWithoutNulls(),
                $this,
                $method .= 'Action'
            );
        }

        return call_user_func_array([$this, $method], $parameters);
    }
}
