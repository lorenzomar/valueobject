<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Number;

use ValueObject\InvalidArgumentException;

/**
 * Class NumberTest.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobject
 */
class NumberTest extends \PHPUnit_Framework_TestCase
{
    public function testNonNumericConstructor()
    {
        $this->setExpectedException(InvalidArgumentException::class);
        new Number('test');
    }
}