<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Uuid;

use Ramsey\Uuid\DegradedUuid as BaseDegradedUuid;
use Ramsey\Uuid\PeclUuidFactory;
use Ramsey\Uuid\UuidFactory;
use Ramsey\Uuid\UuidFactoryInterface;
use ValueObject\ValueObjectInterface;

/**
 * Class DegradedUuid.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class DegradedUuid extends BaseDegradedUuid implements ValueObjectInterface
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
        $this->equals($valueObject);
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
            $featureSet      = new FeatureSet(Uuid::class, static::class);
            static::$factory = new PeclUuidFactory(new UuidFactory($featureSet));
        }

        return self::$factory;
    }
}