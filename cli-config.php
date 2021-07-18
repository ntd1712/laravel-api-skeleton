<?php /* @noinspection all */

namespace Chaos;

use App\Http\Controllers\Api\Controller;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// define('LARAVEL_START', microtime(true));
// $loader = require __DIR__ . '/vendor/autoload.php';
// Doctrine\Common\Annotations\AnnotationRegistry::registerUniqueLoader([$loader, 'loadClass']);

/* @var \Illuminate\Contracts\Http\Kernel $kernel */
$app = include_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make('Illuminate\Contracts\Console\Kernel');
$kernel->bootstrap();

new Controller();
$doctrine = doctrine();

if (empty($argv[1]) || false !== strpos($argv[1], 'orm')) {
    foreach ($doctrine->getManagerNames() as $name => $id) {
        if (false === strpos($id, '_entity_manager')) {
            continue;
        }

        $helperSet = ConsoleRunner::createHelperSet(
            $doctrine->getManager($name)
        );

        $cli = ConsoleRunner::createApplication($helperSet, []);
        $cli->setAutoExit(false);
        $cli->run();
    }
} elseif (false !== strpos($argv[1], 'odm')) {
    foreach ($doctrine->getManagerNames() as $name => $id) {
        if (false === strpos($id, '_document_manager')) {
            continue;
        }

        $helperSet = Support\Doctrine\ODM\Tools\Console\ConsoleRunner::createHelperSet(
            $doctrine->getManager($name)
        );

        $cli = Support\Doctrine\ODM\Tools\Console\ConsoleRunner::createApplication($helperSet, []);
        $cli->setAutoExit(false);
        $cli->run();
    }
}

exit(0);
