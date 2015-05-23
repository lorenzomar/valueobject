<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject;

/**
 * Class Util.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Util
{
    /**
     * classEquals.
     *
     * @param  object $a
     * @param  object $b
     *
     * @return bool
     */
    public static function classEquals($a, $b)
    {
        return get_class($a) === get_class($b);
    }

    /**
     * className.
     *
     * @param object $object
     *
     * @return string
     */
    public static function className($object)
    {
        return \get_class($object);
    }
}