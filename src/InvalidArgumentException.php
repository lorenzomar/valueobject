<?php

/**
 * This file is part of the ValueObjects package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObjects;

/**
 * Class InvalidArgumentException.
 *
 * @package ValueObjects
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class InvalidArgumentException extends \InvalidArgumentException
{
    public function __construct($value, array $allowedTypes)
    {
        $this->message = sprintf('Argument "%s" is invalid. Allowed types for argument are "%s".', print_r($value, true), implode(', ', $allowedTypes));
    }
}