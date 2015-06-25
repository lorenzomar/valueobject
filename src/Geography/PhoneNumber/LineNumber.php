<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Geography\PhoneNumber;

use ValueObject\InvalidArgumentException;
use ValueObject\Number\AbstractNumber;
use Assert\InvalidArgumentException as AssertionInvalidArgumentException;

/**
 * Class LineNumber.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobject
 */
class LineNumber extends AbstractNumber
{
    public function __construct($value)
    {
        try {
            \Assert\that($value)->numeric()->min(0);

            $this->value = $value;
        } catch (AssertionInvalidArgumentException $exception) {
            throw new InvalidArgumentException($value, array('number'));
        }
    }
}