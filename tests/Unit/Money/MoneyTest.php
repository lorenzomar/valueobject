<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Money;

use ValueObject\ValueObjectInterface;

/**
 * Class MoneyTest.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class MoneyTest extends \PHPUnit_Framework_TestCase
{
    public function testConstructor()
    {
        $amount   = new Amount(100);
        $currency = Currency::EUR();

        $money = new Money($amount, $currency);
        $this->assertInstanceOf(Money::class, $money);
    }

    public function testCallStatic()
    {
        $money = Money::EUR(100);
        $this->assertInstanceOf(Money::class, $money);
        $this->assertSame(100, $money->amount()->value());
        $this->assertSame('EUR', $money->currency()->value());
    }

    public function testSameValueAs()
    {
        $money1 = new Money(new Amount(100), Currency::EUR());
        $money2 = new Money(new Amount(100), Currency::EUR());
        $money3 = new Money(new Amount(100), Currency::USD());

        $this->assertTrue($money1->sameValueAs($money2));
        $this->assertTrue($money2->sameValueAs($money1));
        $this->assertFalse($money3->sameValueAs($money1));
        $this->assertFalse($money3->sameValueAs($money2));
    }

    public function testSameCurrencyOf()
    {
        $money1 = new Money(new Amount(100), Currency::EUR());
        $money2 = new Money(new Amount(100), Currency::EUR());
        $money3 = new Money(new Amount(100), Currency::USD());

        $this->assertTrue($money1->sameCurrencyOf($money2));
        $this->assertTrue($money2->sameCurrencyOf($money1));
        $this->assertFalse($money3->sameCurrencyOf($money1));
        $this->assertFalse($money3->sameCurrencyOf($money2));
    }

    public function testSameUnitOf()
    {
        $money1 = new Money(new Amount(100), Currency::EUR());
        $money2 = new Money(new Amount(100), Currency::EUR());
        $money3 = new Money(new Amount(100), Currency::USD());

        $this->assertTrue($money1->sameUnitOf($money2));
        $this->assertTrue($money2->sameUnitOf($money1));
        $this->assertFalse($money3->sameUnitOf($money1));
        $this->assertFalse($money3->sameUnitOf($money2));
    }

    public function testCurrency()
    {
        $amount   = new Amount(100);
        $currency = Currency::EUR();

        $money = new Money($amount, $currency);
        $this->assertTrue($money->currency()->sameValueAs(Currency::EUR()));
    }

    public function testAmount()
    {
        $amount   = new Amount(100);
        $currency = Currency::EUR();

        $money = new Money($amount, $currency);
        $this->assertTrue($money->amount()->sameValueAs(new Amount(100)));
    }
}
