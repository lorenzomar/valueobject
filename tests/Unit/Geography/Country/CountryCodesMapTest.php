<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Geography\Country;

/**
 * Class CountryCodesMapTest.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobject
 */
class CountryCodesMapTest extends \PHPUnit_Framework_TestCase
{
    public function testThrowException()
    {
        $this->setExpectedException(InvalidCountryCodeException::class);

        CountryCodesMap::toIso31661Alpha2Code('wrong');
    }
}
