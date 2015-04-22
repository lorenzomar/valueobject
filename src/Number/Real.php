<?php

/**
 * This file is part of the ValueObjects package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObjects\Number;

use Assert\Assertion;
use Assert\InvalidArgumentException;
use ValueObjects\ValueObjectInterface;

/**
 * Class Real.
 *
 * @package ValueObjects
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Real implements ValueObjectInterface
{
    /**
     * @var double
     */
    protected $value;

    public function __construct($value)
    {
        try {
            Assertion::numeric($value);

            $this->value = \filter_var($value, FILTER_VALIDATE_FLOAT);
        } catch (InvalidArgumentException $exception) {
            throw new \ValueObjects\InvalidArgumentException($value, array('float'));
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
     * @return double
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * toInteger.
     *
     * @param RoundingMode $roundingMode
     *
     * @return \ValueObjects\Number\Integer
     */
    public function toInteger(RoundingMode $roundingMode = null)
    {
        if (null === $roundingMode) {
            $roundingMode = RoundingMode::HALF_UP();
        }
        $value = filter_var(round($this->value, 0, $roundingMode->getValue()), FILTER_VALIDATE_INT);

        return new Integer($value);
    }

    /**
     * toNatural.
     *
     * @param RoundingMode $roundingMode
     *
     * @return Natural
     */
    public function toNatural(RoundingMode $roundingMode = null)
    {
        $naturalValue = \abs($this->toInteger($roundingMode)->getValue());
        return new Natural($naturalValue);
    }

    /**
     * fromInteger.
     *
     * @param \ValueObjects\Number\Integer $integer
     *
     * @return Real
     */
    public static function fromInteger(Integer $integer)
    {
        return new self($integer->getValue());
    }

    /**
     * fromNatural.
     *
     * @param Natural $natural
     *
     * @return Real
     */
    public static function fromNatural(Natural $natural)
    {
        return self::fromInteger($natural);
    }

    public function __clone()
    {
        return new static($this->value);
    }

    public function __toString()
    {
        return (string)$this->value;
    }
}