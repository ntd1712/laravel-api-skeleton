<?php

namespace Chaos\Modules\Mongo\Repository;

use Chaos\Repository\AbstractDocumentRepository;

/**
 * Class MongoRepository.
 */
class MongoRepository extends AbstractDocumentRepository
{
    /**
     * @var string
     */
    protected $documentName = 'Chaos\Modules\Mongo\Document\Mongo';
}
