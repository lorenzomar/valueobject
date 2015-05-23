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
 * Class Integer.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Integer extends Real
{
    public function __construct($value)
    {
        try {
            Assertion::integerish($value);

            $this->value = (int) $value;
        } catch (AssertionInvalidArgumentException $exception) {
            throw new InvalidArgumentException($value, array('integer'));
        }
    }
}