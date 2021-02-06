<?php

namespace Chaos\Modules\Mongo\Document;

/**
 * Class Mongo.
 *
 * @Doctrine\ODM\MongoDB\Mapping\Annotations\Document(repositoryClass="Chaos\Modules\Mongo\Repository\MongoRepository")
 */
class Mongo
{
    /**
     * @var string
     *
     * @JMS\Serializer\Annotation\Type("string")
     *
     * @Doctrine\ODM\MongoDB\Mapping\Annotations\Id(type="string")
     */
    private $Id;

    /**
     * @JMS\Serializer\Annotation\Type("string")
     *
     * @Doctrine\ODM\MongoDB\Mapping\Annotations\Field(type="string")
     */
    private $Name;

    /**
     * @JMS\Serializer\Annotation\Type("string")
     *
     * @Doctrine\ODM\MongoDB\Mapping\Annotations\Field(type="string")
     */
    private $Email;
}
