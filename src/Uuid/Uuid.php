<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Uuid;

use Ramsey\Uuid\PeclUuidFactory;
use Ramsey\Uuid\Uuid as BaseUuid;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidFactoryInterface;
use ValueObject\ValueObjectInterface;

/**
 * Class Uuid.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Uuid extends BaseUuid implements ValueObjectInterface
{
    /**
     * @var UuidFactoryInterface
     */
    protected static $factory = null;

    /**
     * @inheritdoc.
     *
     * @param static $valueObject
     */
    public function sameValueAs(ValueObjectInterface $valueObject)
    {
        return $this->equals($valueObject);
    }

    /**
     * copy.
     *
     * @return static
     */
    public function copy()
    {
        return clone $this;
    }

    public function __clone()
    {
        return self::fromString($this->toString());
    }

    public static function getFactory()
    {
        if (!static::$factory) {
            $featureSet      = new FeatureSet(static::class, DegradedUuid::class);
            static::$factory = new PeclUuidFactory(new UuidFactory($featureSet));
        }

        return self::$factory;
    }

    /**
     * @inheritdoc
     *
     * @return Uuid
     */
    public static function fromBytes($bytes)
    {
        return self::getFactory()->fromBytes($bytes);
    }

    /**
     * @inheritdoc
     *
     * @return Uuid
     */
    public static function fromString($name)
    {
        return self::getFactory()->fromString($name);
    }

    /**
     * @inheritdoc
     *
     * @return Uuid
     */
    public static function fromInteger($integer)
    {
        return self::getFactory()->fromInteger($integer);
    }

    /**
     * @inheritdoc
     *
     * @return Uuid
     */
    public static function uuid1($node = null, $clockSeq = null)
    {
        return self::getFactory()->uuid1($node, $clockSeq);
    }

    /**
     * @inheritdoc
     *
     * @return Uuid
     */
    public static function uuid3($ns, $name)
    {
        return self::getFactory()->uuid3($ns, $name);
    }

    /**
     * @inheritdoc
     *
     * @return Uuid
     */
    public static function uuid4()
    {
        return self::getFactory()->uuid4();
    }

    /**
     * @inheritdoc
     *
     * @return Uuid
     */
    public static function uuid5($ns, $name)
    {
        return self::getFactory()->uuid5($ns, $name);
    }
}