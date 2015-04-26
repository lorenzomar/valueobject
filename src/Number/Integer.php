<?php

/**
 * This file is part of the ValueObjects package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObjects\Number;

use Assert\Assertion;
use Assert\InvalidArgumentException;

/**
 * Class Integer.
 *
 * @package ValueObjects
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Integer extends Real
{
    public function __construct($value)
    {
        try {
            Assertion::integerish($value);

            parent::__construct($value);
        } catch (InvalidArgumentException $exception) {
            throw new \ValueObjects\InvalidArgumentException($value, array('integer'));
        }
    }

    public function getValue()
    {
        $value = parent::getValue();

        return \intval($value);
    }
}