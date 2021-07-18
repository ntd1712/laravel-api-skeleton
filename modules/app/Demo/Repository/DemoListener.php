<?php

namespace Chaos\Modules\Demo\Repository;

/**
 * Class DemoListener.
 */
class DemoListener
{
    /**
     * @param object $entity Entity.
     *
     * @return void
     */
    public function postLoad($entity)
    {
        // $entity->setContainer($this->getContainer());
    }

    /**
     * @param \Doctrine\ORM\Event\LifecycleEventArgs $eventArgs
     *
     * @return void
     */
    public function postPersist($eventArgs)
    {
        // echo '<pre>';
        // var_dump(func_get_args());
        // die;
    }
}
