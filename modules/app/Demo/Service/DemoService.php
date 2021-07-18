<?php

namespace Chaos\Modules\Demo\Service;

use Chaos\Modules\Demo\Repository\DemoRepository;
use Chaos\Service\AbstractEntityRepositoryService;

/**
 * Class DemoService.
 */
class DemoService extends AbstractEntityRepositoryService
{
    /**
     * @param DemoRepository $demoRepository
     * @param DemoSubscriber $demoSubscriber
     */
    public function __construct(DemoRepository $demoRepository, DemoSubscriber $demoSubscriber)
    {
        $this->repository = $demoRepository;
        $this->subscriber = $demoSubscriber;
    }
}
