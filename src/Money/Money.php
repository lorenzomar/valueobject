<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Money;

use ValueObject\Quantity\QuantityInterface;
use ValueObject\Util;
use ValueObject\ValueObjectInterface;

/**
 * Class Money.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Money implements MoneyInterface
{
    /**
     * @var Amount
     */
    protected $amount;

    /**
     * @var Currency
     */
    protected $currency;

    /**
     * __callStatic.
     *
     * @param string $method
     * @param array $arguments
     *
     * @return static
     */
    public static function __callStatic($method, $arguments)
    {
        $amount   = new Amount($arguments[0]);
        $currency = new Currency($method);

        return new static($amount, $currency);
    }

    public function __construct(Amount $amount, Currency $currency)
    {
        $this->amount   = $amount;
        $this->currency = $currency;
    }

    public function currency()
    {
        return $this->currency;
    }

    public function sameCurrencyOf(MoneyInterface $money)
    {
        return $this->currency->sameValueAs($money->currency());
    }

    public function sameUnitOf(QuantityInterface $quantity)
    {
        return $this->sameCurrencyOf($quantity);
    }

    public function amount()
    {
        return $this->amount;
    }

    public function unit()
    {
        return $this->currency();
    }

    public function greaterThan(QuantityInterface $quantity)
    {
        $this->assertSameCurrency($quantity);

        return $this->amount()->greaterThan($quantity->amount());
    }

    public function greaterThanOrEqual(QuantityInterface $quantity)
    {
        $this->assertSameCurrency($quantity);

        return $this->amount()->greaterThanOrEqual($quantity->amount());
    }

    public function lessThan(QuantityInterface $quantity)
    {
        $this->assertSameCurrency($quantity);

        return $this->amount()->lessThan($quantity->amount());
    }

    public function lessThanOrEqual(QuantityInterface $quantity)
    {
        $this->assertSameCurrency($quantity);

        return $this->amount()->lessThanOrEqual($quantity->amount());
    }

    public function add(QuantityInterface $quantity)
    {
        $this->assertSameCurrency($quantity);

        $amount = new Amount($this->amount()->value() + $quantity->amount()->value());

        return new static($amount, $this->currency());
    }

    public function subtract(QuantityInterface $quantity)
    {
        $this->assertSameCurrency($quantity);

        $amount = new Amount($this->amount()->value() - $quantity->amount()->value());

        return new static($amount, $this->currency());
    }

    /**
     * sameValueAs.
     *
     * @param ValueObjectInterface|static $valueObject
     *
     * @return bool
     */
    public function sameValueAs(ValueObjectInterface $valueObject)
    {
        if (!Util::classEquals($this, $valueObject)) {
            return false;
        }

        return $this->amount()->sameValueAs($valueObject->amount()) && $this->currency()->sameValueAs($valueObject->currency());
    }

    public function copy()
    {
        return clone $this;
    }

    public function __clone()
    {
        return new static($this->amount(), $this->currency());
    }

    protected function assertSameCurrency(MoneyInterface $money)
    {
        if (!$this->sameCurrencyOf($money)) {
            // throw exception
        }
    }
}