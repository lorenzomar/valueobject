<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Number;

use Assert\Assertion;
use Assert\InvalidArgumentException as AssertionInvalidArgumentException;
use ValueObject\InvalidArgumentException;

/**
 * Class Real.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Real extends AbstractNumber
{
    public function __construct($value)
    {
        try {
            Assertion::numeric($value);

            $this->value = filter_var($value, FILTER_VALIDATE_FLOAT);
        } catch (AssertionInvalidArgumentException $exception) {
            throw new InvalidArgumentException($value, array('float'));
        }
    }

    /**
     * toInteger.
     *
     * @param RoundingMode $roundingMode
     *
     * @return Integer
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
        $naturalValue = abs($this->toInteger($roundingMode)->value());
        return new Natural($naturalValue);
    }

    /**
     * fromInteger.
     *
     * @param Integer $integer
     *
     * @return Real
     */
    public static function fromInteger(Integer $integer)
    {
        return new self($integer->value());
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
}