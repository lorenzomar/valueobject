<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Web;

use Assert\Assertion;
use ValueObject\String\Str;
use Assert\InvalidArgumentException as AssertionInvalidArgumentException;
use ValueObject\InvalidArgumentException;

/**
 * Class Email.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Email extends Str
{
    public function __construct($value)
    {
        try {
            Assertion::email($value);

            $this->value = $value;
        } catch (AssertionInvalidArgumentException $exception) {
            throw new InvalidArgumentException($value, array('email'));
        }
    }

    public function getLocalPart()
    {

    }

    public function getDomainPart()
    {

    }
}