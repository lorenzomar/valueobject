<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Number;

use ValueObject\ScalarValueObjectInterface;

/**
 * Interface NumberInterface.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
interface NumberInterface extends ScalarValueObjectInterface
{
    /**
     * greaterThan.
     *
     * @param NumberInterface $number
     *
     * @return bool
     */
    public function greaterThan(NumberInterface $number);

    /**
     * greaterThanOrEqual.
     *
     * @param NumberInterface $number
     *
     * @return bool
     */
    public function greaterThanOrEqual(NumberInterface $number);

    /**
     * lessThan.
     *
     * @param NumberInterface $number
     *
     * @return bool
     */
    public function lessThan(NumberInterface $number);

    /**
     * lessThanOrEqual.
     *
     * @param NumberInterface $number
     *
     * @return bool
     */
    public function lessThanOrEqual(NumberInterface $number);
}