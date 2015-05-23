<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\String;

use Assert\Assertion;
use Assert\InvalidArgumentException as AssertionInvalidArgumentException;
use ValueObject\InvalidArgumentException;
use ValueObject\SimpleValueObjectInterface;
use ValueObject\ValueObjectInterface;

/**
 * Class Str.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Str implements SimpleValueObjectInterface
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
        } catch (AssertionInvalidArgumentException $exception) {
            throw new InvalidArgumentException($value, array('string'));
        }
    }

    public function value()
    {
        return $this->__toString();
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
     * isEmpty.
     *
     * @return bool
     */
    public function isEmpty()
    {
        try {
            Assertion::length($this->value, 0);

            return true;
        } catch (AssertionInvalidArgumentException $exception) {
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