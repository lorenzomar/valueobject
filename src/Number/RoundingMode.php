<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Number;

use ValueObject\Enum\AbstractEnum;

/**
 * Class RoundingMode.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 *
 * @method static RoundingMode HALF_UP
 * @method static RoundingMode HALF_DOWN
 * @method static RoundingMode HALF_EVEN
 * @method static RoundingMode HALF_ODD
 */
class RoundingMode extends AbstractEnum
{
    const HALF_UP   = PHP_ROUND_HALF_UP;
    const HALF_DOWN = PHP_ROUND_HALF_DOWN;
    const HALF_EVEN = PHP_ROUND_HALF_EVEN;
    const HALF_ODD  = PHP_ROUND_HALF_ODD;
}