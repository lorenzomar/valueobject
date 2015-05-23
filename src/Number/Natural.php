<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Number;

use Assert\Assertion;
use Assert\AssertionChain;
use Assert\InvalidArgumentException as AssertionInvalidArgumentException;
use ValueObject\InvalidArgumentException;

/**
 * Class Natural.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Natural extends Integer
{
    public function __construct($value)
    {
        try {
            \Assert\that($value)->integerish()->min(0);

            $this->value = (int) $value;
        } catch (AssertionInvalidArgumentException $exception) {
            throw new InvalidArgumentException($value, array('natural'));
        }
    }
}