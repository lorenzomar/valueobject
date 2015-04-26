<?php

/**
 * This file is part of the ValueObjects package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObjects\Number;

use ValueObjects\InvalidArgumentException;

/**
 * Class NaturalTest.
 *
 * @package ValueObjects
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class NaturalTest extends \PHPUnit_Framework_TestCase
{
    public function testNegativeConstructor()
    {
        $this->setExpectedException(InvalidArgumentException::class);
        new Natural(-1);
    }

    public function testNegativeNumericStringConstructor()
    {
        $this->setExpectedException(InvalidArgumentException::class);
        new Natural('-1');
    }

    public function testZeroConstructor()
    {
        $natural = new Natural(0);
        $this->assertInstanceOf(Natural::class, $natural);
        $this->assertSame(0, $natural->getValue());
    }

    public function testPositiveConstructor()
    {
        $natural = new Natural(1);
        $this->assertInstanceOf(Natural::class, $natural);
        $this->assertSame(1, $natural->getValue());
    }

    public function testPositiveNumericStringConstructor()
    {
        $natural = new Natural('1');
        $this->assertInstanceOf(Natural::class, $natural);
        $this->assertSame(1, $natural->getValue());
    }

    public function testInvalidConstruct()
    {
        $this->setExpectedException(InvalidArgumentException::class);
        new Natural('invalid');
    }
}
