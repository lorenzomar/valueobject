<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\String;

use ValueObject\InvalidArgumentException;

/**
 * Class StrTest.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class StrTest extends \PHPUnit_Framework_TestCase
{
    public function testValidConstructor()
    {
        $value = 'test';
        $string = new Str($value);
        $this->assertInstanceOf(Str::class, $string);
    }

    public function testInvalidConstructor()
    {
        $this->setExpectedException(InvalidArgumentException::class);
        new Str(1);
    }

    public function testValue()
    {
        // Empty value
        $value = '';
        $string = new Str($value);
        $this->assertEmpty($string->value());
        $this->assertSame($value, $string->value());

        // Not empty value
        $value = 'test';
        $string = new Str($value);
        $this->assertSame($value, $string->value());
    }

    public function testSameValueAs()
    {
        $string1 = new Str('foo');
        $string2 = new Str('foo');
        $string3 = new Str('bar');

        $this->assertTrue($string1->sameValueAs($string2));
        $this->assertFalse($string1->sameValueAs($string3));
        $this->assertTrue($string2->sameValueAs($string1));
        $this->assertFalse($string2->sameValueAs($string3));
        $this->assertFalse($string3->sameValueAs($string1));
        $this->assertFalse($string3->sameValueAs($string2));
    }

    public function testCopy()
    {
        $value = 'test';
        $string = new Str($value);
        $string2 = $string->copy();

        $this->assertNotSame($string, $string2);
        $this->assertTrue($string2->sameValueAs($string));
    }

    public function testIsEmpty()
    {
        $string = new Str('');
        $this->assertTrue($string->isEmpty());

        $string = new Str('test');
        $this->assertFalse($string->isEmpty());
    }
}