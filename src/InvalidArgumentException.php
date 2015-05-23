<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject;

/**
 * Class InvalidArgumentException.
 *
 * @package ValueObject
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