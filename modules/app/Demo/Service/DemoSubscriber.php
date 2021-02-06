<?php

namespace Chaos\Modules\Demo\Service;

use Chaos\Service\AbstractSubscriber;

/**
 * Class DemoSubscriber.
 */
class DemoSubscriber extends AbstractSubscriber
{
    // <editor-fold defaultstate="collapsed" desc="Subscribed events">

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return [
            'foo' => [
                'listener' => static::class,
                'method' => 'onFooAction',
                'event' => 'foo',
                'priority' => 1
            ]
        ];
    }

    // </editor-fold>

    /**
     * @return void
     */
    public function onFooAction()
    {
        // $this->getDispatcher()->dispatch("foo", ['criteria' => $criteria]);

        echo '<pre>';
        var_dump(func_get_args());
        die;
    }
}
