<?php

namespace Chaos\Modules\Demo\Entity;

use Chaos\Entity\Mixin\AppTrait;
use Chaos\Entity\Mixin\AuditTrait;
use Chaos\Entity\Mixin\SoftDeletesTrait;
use Chaos\Entity\Mixin\VersionTrait;

/**
 * Class Demo.
 *
 * @Doctrine\ORM\Mapping\Entity(repositoryClass="Chaos\Modules\Demo\Repository\DemoRepository")
 * @Doctrine\ORM\Mapping\EntityListeners({ "Chaos\Modules\Demo\Repository\DemoListener" })
 * @Doctrine\ORM\Mapping\Table(name="demo")
 */
class Demo
{
    use AuditTrait, SoftDeletesTrait, VersionTrait, AppTrait;

    /**
     * @var int
     *
     * @JMS\Serializer\Annotation\Type("int")
     *
     * @Doctrine\ORM\Mapping\Id
     * @Doctrine\ORM\Mapping\GeneratedValue
     * @Doctrine\ORM\Mapping\Column(name="id", type="integer")
     */
    private $Id;

    /**
     * @JMS\Serializer\Annotation\Type("string")
     *
     * @Doctrine\ORM\Mapping\Column(type="string", name="vehicle_id")
     */
    private $VehicleId;

    /**
     * @JMS\Serializer\Annotation\Type("DateTime<'Y-m-d'>")
     *
     * @Doctrine\ORM\Mapping\Column(type="datetime", name="start_time", nullable=true)
     */
    private $StartTime;

    /**
     * @JMS\Serializer\Annotation\Type("string")
     *
     * @Doctrine\ORM\Mapping\Column(type="string", name="place")
     */
    private $Place;

    /**
     * @var bool
     *
     * @JMS\Serializer\Annotation\Type("bool")
     *
     * @Doctrine\ORM\Mapping\Column(name="not_use", type="boolean", nullable=true)
     */
    private $NotUse = false;
}
