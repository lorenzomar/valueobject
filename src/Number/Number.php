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
 * Class Number.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobject
 */
class Number extends AbstractNumber
{
    public function __construct($value)
    {
        try {
            Assertion::numeric($value);

            $this->value = $value + 0;
        } catch (AssertionInvalidArgumentException $exception) {
            throw new InvalidArgumentException($value, array('number'));
        }
    }
}