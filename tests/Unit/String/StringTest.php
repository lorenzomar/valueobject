<?php

/**
 * This file is part of the ValueObjects package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObjects\String;

use ValueObjects\InvalidArgumentException;

/**
 * Class StringTest.
 *
 * @package ValueObjects
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class StringTest extends \PHPUnit_Framework_TestCase
{
    public function testValidConstructor()
    {
        $value = 'test';
        $string = new String($value);
        $this->assertInstanceOf(String::class, $string);
    }

    public function testInvalidConstructor()
    {
        $this->setExpectedException(InvalidArgumentException::class);
        new String(1);
    }

    public function testGetValue()
    {
        // Empty value
        $value = '';
        $string = new String($value);
        $this->assertEmpty($string->getValue());
        $this->assertSame($value, $string->getValue());

        // Not empty value
        $value = 'test';
        $string = new String($value);
        $this->assertSame($value, $string->getValue());
    }

    public function testSameValueAs()
    {
        $string1 = new String('foo');
        $string2 = new String('foo');
        $string3 = new String('bar');

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
        $string = new String($value);
        $string2 = $string->copy();

        $this->assertNotSame($string, $string2);
        $this->assertTrue($string2->sameValueAs($string));
    }

    public function testIsEmpty()
    {
        $string = new String('');
        $this->assertTrue($string->isEmpty());

        $string = new String('test');
        $this->assertFalse($string->isEmpty());
    }
}