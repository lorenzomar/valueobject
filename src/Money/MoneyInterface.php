<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Money;

use ValueObject\Quantity\QuantityInterface;

/**
 * Interface MoneyInterface.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
interface MoneyInterface extends QuantityInterface
{
    /**
     * currency.
     *
     * @return mixed
     */
    public function currency();

    /**
     * sameCurrencyOf.
     *
     * @param MoneyInterface $money
     *
     * @return bool
     */
    public function sameCurrencyOf(MoneyInterface $money);
}