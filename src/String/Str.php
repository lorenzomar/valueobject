<?php

/**
 * This file is part of the ValueObjects package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObjects\String;

use Assert\Assertion;
use Assert\InvalidArgumentException;
use ValueObjects\ValueObjectInterface;

/**
 * Class Str.
 *
 * @package ValueObjects
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Str implements ValueObjectInterface
{
    /**
     * @var string
     */
    protected $value;

    public function __construct($value)
    {
        try {
            Assertion::string($value);

            $this->value = $value;
        } catch (InvalidArgumentException $exception) {
            throw new \ValueObjects\InvalidArgumentException($value, array('string'));
        }
    }

    public function sameValueAs(ValueObjectInterface $valueObject)
    {
        return $this == $valueObject;
    }

    public function copy()
    {
        return clone $this;
    }

    /**
     * getValue.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->__toString();
    }

    /**
     * isEmpty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        try {
            Assertion::length($this->value, 0);

            return true;
        } catch (InvalidArgumentException $exception) {
            return false;
        }
    }

    public function __clone()
    {
        return new static($this->value);
    }

    public function __toString()
    {
        return $this->value;
    }
}