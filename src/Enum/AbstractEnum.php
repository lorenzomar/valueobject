<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Enum;

use MyCLabs\Enum\Enum;
use ValueObject\ScalarValueObjectInterface;
use ValueObject\ValueObjectInterface;

/**
 * Class AbstractEnum.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
abstract class AbstractEnum extends Enum implements ScalarValueObjectInterface
{
    public function value()
    {
        return $this->getValue();
    }

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
        return new static($this->value());
    }
}