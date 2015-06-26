<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Uuid;

/**
 * Class UuidTest.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobject
 */
class UuidTest extends \PHPUnit_Framework_TestCase
{
    protected $uuid1 = "d5836ab6-1c3c-11e5-9679-0800273abcfc";
    protected $uuid4 = "95ec35c0-c1df-4531-a77c-da86503460bc";

    public function testInstanceOf()
    {
        $uuid1 = Uuid::fromString($this->uuid1);

        $this->assertInstanceOf(Uuid::class, $uuid1);
    }

    public function testCopy()
    {
        $uuid1     = Uuid::fromString($this->uuid1);
        $uuid1Copy = $uuid1->copy();

        $this->assertInstanceOf(Uuid::class, $uuid1Copy);
        $this->assertNotSame($uuid1, $uuid1Copy);
        $this->assertSame($uuid1->toString(), $uuid1Copy->toString());
    }

    public function testSameValueAs()
    {
        $uuid1  = Uuid::fromString($this->uuid1);
        $uuid1_ = Uuid::fromString($this->uuid1);

        $this->assertTrue($uuid1->sameValueAs($uuid1_));
        $this->assertTrue($uuid1_->sameValueAs($uuid1));
    }

    public function testFromString()
    {
        $uuid1 = Uuid::fromString($this->uuid1);
        $uuid4 = Uuid::fromString($this->uuid4);

        $this->assertSame($uuid1->toString(), $this->uuid1);
        $this->assertSame($uuid4->toString(), $this->uuid4);
    }
}