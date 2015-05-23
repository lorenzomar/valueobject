<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject;

/**
 * Interface SimpleValueObjectInterface.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
interface SimpleValueObjectInterface extends ValueObjectInterface
{
    /**
     * value.
     *
     * @return mixed
     */
    public function value();
}