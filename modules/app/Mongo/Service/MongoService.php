<?php

namespace Chaos\Modules\Mongo\Service;

use Chaos\Modules\Mongo\Repository\MongoRepository;
use Chaos\Service\AbstractDocumentRepositoryService;

/**
 * Class MongoService.
 */
class MongoService extends AbstractDocumentRepositoryService
{
    /**
     * @param MongoRepository $mongoRepository
     * @param MongoSubscriber $mongoSubscriber
     */
    public function __construct(MongoRepository $mongoRepository, MongoSubscriber $mongoSubscriber)
    {
        $this->repository = $mongoRepository;
        $this->subscriber = $mongoSubscriber;
    }
}
