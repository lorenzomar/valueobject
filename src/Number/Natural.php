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
 * Class Natural.
 *
 * @package ValueObjects
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Natural extends Integer
{
    public function __construct($value)
    {
        try {
            Assertion::min($value, 0);

            parent::__construct($value);
        } catch (InvalidArgumentException $exception) {
            throw new \ValueObjects\InvalidArgumentException($value, array('natural'));
        }
    }
}