<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Number;

use ValueObject\InvalidArgumentException;
use ValueObject\Util;
use ValueObject\ValueObjectInterface;

/**
 * Class AbstractNumber.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
abstract class AbstractNumber implements NumberInterface
{
    /**
     * @var float|int
     */
    protected $value;

    public function value()
    {
        return $this->value;
    }

    public function sameValueAs(ValueObjectInterface $valueObject)
    {
        return $this == $valueObject;
    }

    public function copy()
    {
        return clone $this;
    }

    public function greaterThan(NumberInterface $number)
    {
        $this->assertSameClass($number);

        return $this->value() > $number->value();
    }

    public function greaterThanOrEqual(NumberInterface $number)
    {
        $this->assertSameClass($number);

        return $this->value() >= $number->value();
    }

    public function lessThan(NumberInterface $number)
    {
        $this->assertSameClass($number);

        return $this->value() < $number->value();
    }

    public function lessThanOrEqual(NumberInterface $number)
    {
        $this->assertSameClass($number);

        return $this->value() <= $number->value();
    }

    public function __clone()
    {
        return new static($this->value);
    }

    public function __toString()
    {
        return (string)$this->value;
    }

    protected function assertSameClass(NumberInterface $number)
    {
        if(!Util::classEquals($this, $number)) {
            throw new InvalidArgumentException($number, array(Util::className($this)));
        }
    }
}