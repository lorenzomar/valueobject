<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject;

/**
 * Interface ValueObjectInterface.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
interface ValueObjectInterface
{
    /**
     * sameValueAs.
     *
     * @param ValueObjectInterface $valueObject
     *
     * @return bool
     */
    public function sameValueAs(ValueObjectInterface $valueObject);

    /**
     * copy.
     *
     * @return static
     */
    public function copy();
}