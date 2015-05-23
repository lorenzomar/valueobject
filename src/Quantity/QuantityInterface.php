<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Quantity;

use ValueObject\ValueObjectInterface;

/**
 * Interface QuantityInterface.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
interface QuantityInterface extends ValueObjectInterface
{
    /**
     * amount.
     *
     * @return AmountInterface
     */
    public function amount();

    /**
     * unit.
     *
     * @return UnitInterface
     */
    public function unit();

    /**
     * sameUnitOf.
     *
     * @param QuantityInterface $quantity
     *
     * @return bool
     */
    public function sameUnitOf(QuantityInterface $quantity);

    /**
     * greaterThan.
     *
     * @param QuantityInterface $quantity
     *
     * @return bool
     */
    public function greaterThan(QuantityInterface $quantity);

    /**
     * greaterThanOrEqual.
     *
     * @param QuantityInterface $quantity
     *
     * @return bool
     */
    public function greaterThanOrEqual(QuantityInterface $quantity);

    /**
     * lessThan.
     *
     * @param QuantityInterface $quantity
     *
     * @return bool
     */
    public function lessThan(QuantityInterface $quantity);

    /**
     * lessThanOrEqual.
     *
     * @param QuantityInterface $quantity
     *
     * @return bool
     */
    public function lessThanOrEqual(QuantityInterface $quantity);

    /**
     * add.
     *
     * @param QuantityInterface $quantity
     *
     * @return static
     */
    public function add(QuantityInterface $quantity);

    /**
     * subtract.
     *
     * @param QuantityInterface $quantity
     *
     * @return static
     */
    public function subtract(QuantityInterface $quantity);
}