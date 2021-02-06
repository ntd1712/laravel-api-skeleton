<?php

namespace Chaos\Modules\Demo\Repository;

use Chaos\Repository\AbstractEntityRepository;

/**
 * Class DemoRepository.
 */
class DemoRepository extends AbstractEntityRepository
{
    /**
     * @var string
     */
    protected $_entityName = 'Chaos\Modules\Demo\Entity\Demo';
}
