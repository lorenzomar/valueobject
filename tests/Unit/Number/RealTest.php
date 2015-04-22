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
    public function testConstrucWithVariousNumericValues()
    {
        // negative
        $real  = new Real(-1);
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(-1.0, $real->getValue());

        // Zero
        $real  = new Real(0);
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(0.0, $real->getValue());

        // positive
        $real  = new Real(1);
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(1.0, $real->getValue());

        // negative float
        $real  = new Real(-1.1);
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(-1.1, $real->getValue());

        // positive float
        $real  = new Real(1.1);
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(1.1, $real->getValue());

        // positive numeric string
        $real  = new Real('1');
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(1.0, $real->getValue());

        // positive float numeric string
        $real  = new Real('1.1');
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(1.1, $real->getValue());

        // negative numeric string
        $real  = new Real('-1');
        $this->assertInstanceOf(Real::class, $real);
        $this->assertSame(-1.0, $real->getValue());

        // negative float numeric string
        $real  = new Real('-1.1');
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

    public function testToInteger()
    {
        $real = new Real(3.5);

        // Half down
        $integer = new Integer(3);
        $rounding = RoundingMode::HALF_DOWN();
        $this->assertTrue($integer->sameValueAs($real->toInteger($rounding)));

        // Half up
        $integer = new Integer(4);
        $rounding = RoundingMode::HALF_UP();
        $this->assertTrue($integer->sameValueAs($real->toInteger($rounding)));

        // @TODO even e odd (non so cosa si intenda)
    }

    public function testToNatural()
    {
        // $real = new Real(3.5);

        // var_dump($real->toNatural());
    }
}
