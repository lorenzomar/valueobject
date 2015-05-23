<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Number;

use ValueObject\InvalidArgumentException;

/**
 * Class IntegerTest.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class IntegerTest extends \PHPUnit_Framework_TestCase
{
    public function testNegativeConstructor()
    {
        $integer = new Integer(-1);
        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertSame(-1, $integer->value());
    }

    public function testZeroConstructor()
    {
        $integer = new Integer(0);
        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertSame(0, $integer->value());
    }

    public function testPositiveConstructor()
    {
        $integer = new Integer(1);
        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertSame(1, $integer->value());
    }

    public function testPositiveNumericStringConstructor()
    {
        $integer = new Integer('1');
        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertSame(1, $integer->value());
    }

    public function testNegativeNumericStringConstructor()
    {
        $integer = new Integer('-1');
        $this->assertInstanceOf(Integer::class, $integer);
        $this->assertSame(-1, $integer->value());
    }

    public function testInvalidConstruct()
    {
        $this->setExpectedException(InvalidArgumentException::class);
        new Real('invalid');
    }
}
