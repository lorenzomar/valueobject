<?php

/**
 * This file is part of the ValueObjects package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObjects\Number;

use ValueObjects\InvalidArgumentException;

/**
 * Class RealTest.
 *
 * @package ValueObjects
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class RealTest extends \PHPUnit_Framework_TestCase
{
    public function testNegativeConstructor()
    {
        $real = new Real(-1);
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(-1.0, $real->getValue());

        $real = new Real(-1.1);
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(-1.1, $real->getValue());
    }

    public function testZeroConstructor()
    {
        $real = new Real(0);
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(0.0, $real->getValue());
    }

    public function testPositiveConstructor()
    {
        $real = new Real(1);
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(1.0, $real->getValue());

        $real = new Real(1.1);
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(1.1, $real->getValue());
    }

    public function testPositiveNumericStringConstructor()
    {
        $real = new Real('1');
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(1.0, $real->getValue());

        $real = new Real('1.1');
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(1.1, $real->getValue());
    }

    public function testNegativeNumericStringConstructor()
    {
        $real = new Real('-1');
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(-1.0, $real->getValue());

        $real = new Real('-1.1');
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(-1.1, $real->getValue());
    }

    public function testInvalidConstruct()
    {
        $this->setExpectedException(InvalidArgumentException::class);
        new Real('invalid');
    }

    public function testSameValueAs()
    {
        $real1 = new Real(0.1);
        $real2 = new Real(0.1);
        $real3 = new Real('0.1');
        $real4 = new Real(0.2);

        $this->assertTrue($real1->sameValueAs($real2));
        $this->assertTrue($real1->sameValueAs($real3));
        $this->assertTrue($real2->sameValueAs($real1));
        $this->assertTrue($real2->sameValueAs($real3));
        $this->assertTrue($real3->sameValueAs($real1));
        $this->assertTrue($real3->sameValueAs($real2));

        $this->assertFalse($real2->sameValueAs($real4));
    }

    public function testToIntegerHalfDown()
    {
        $real    = new Real(3.5);
        $integer = $real->toInteger(RoundingMode::HALF_DOWN());
        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertSame(3, $integer->getValue());
    }

    public function testToIntegerHalfUp()
    {
        $real    = new Real(3.5);
        $integer = $real->toInteger(RoundingMode::HALF_UP());
        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertSame(4, $integer->getValue());
    }

    public function testNegativeToNaturalHalfDown()
    {
        $real    = new Real(-0.5);
        $natural = $real->toNatural(RoundingMode::HALF_DOWN());
        $this->assertInstanceOf(Natural::class, $natural);
        $this->assertSame(0, $natural->getValue());
    }

    public function testNegativeToNaturalHalfUp()
    {
        $real    = new Real(-0.5);
        $natural = $real->toNatural(RoundingMode::HALF_UP());
        $this->assertInstanceOf(Natural::class, $natural);
        $this->assertSame(1, $natural->getValue());
    }
}
