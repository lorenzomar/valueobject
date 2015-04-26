<?php

/**
 * This file is part of the ValueObjects package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObjects\Number;

use ValueObjects\InvalidArgumentException;

/**
 * Class IntegerTest.
 *
 * @package ValueObjects
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class IntegerTest extends \PHPUnit_Framework_TestCase
{
    public function testNegativeConstructor()
    {
        $integer = new Integer(-1);
        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertSame(-1, $integer->getValue());
    }

    public function testZeroConstructor()
    {
        $integer = new Integer(0);
        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertSame(0, $integer->getValue());
    }

    public function testPositiveConstructor()
    {
        $integer = new Integer(1);
        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertSame(1, $integer->getValue());
    }

    public function testPositiveNumericStringConstructor()
    {
        $integer = new Integer('1');
        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertSame(1, $integer->getValue());
    }

    public function testNegativeNumericStringConstructor()
    {
        $integer = new Integer('-1');
        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertSame(-1, $integer->getValue());
    }

    public function testInvalidConstruct()
    {
        $this->setExpectedException(InvalidArgumentException::class);
        new Real('invalid');
    }
}
