<?php

/**
 * This file is part of the ValueObjects package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObjects\Enum;

use MyCLabs\Enum\Enum;
use ValueObjects\ValueObjectInterface;

/**
 * Class AbstractEnum.
 *
 * @package ValueObjects
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
abstract class AbstractEnum extends Enum implements ValueObjectInterface
{
    public function sameValueAs(ValueObjectInterface $valueObject)
    {
        return $this == $valueObject;
    }

    public function copy()
    {
        return clone $this;
    }

    public function __clone()
    {
        return new static($this->getValue());
    }
}