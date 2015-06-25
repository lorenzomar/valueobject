<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Geography\PhoneNumber;

use ValueObject\Geography\Country\Country;
use ValueObject\Geography\Country\Iso31661Alpha2Code;

/**
 * Class CountryPrefixTest.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobject
 */
class CountryPrefixTest extends \PHPUnit_Framework_TestCase
{
    public function testFromCountry()
    {
        $country = Country::fromIso31661Alpha2Code(Iso31661Alpha2Code::IT());

        $prefix = CountryPrefix::fromCountry($country);

        $this->assertSame(39, $prefix->value());
    }
}
