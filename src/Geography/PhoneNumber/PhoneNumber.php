<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Geography\PhoneNumber;

use ValueObject\ValueObjectInterface;

/**
 * Class PhoneNumber.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobject
 */
class PhoneNumber implements ValueObjectInterface
{
    /**
     * @var CountryPrefix
     */
    protected $prefix;

    /**
     * @var LineNumber
     */
    protected $lineNumber;

    public function __construct(CountryPrefix $prefix, LineNumber $lineNumber)
    {
        $this->prefix     = $prefix;
        $this->lineNumber = $lineNumber;
    }

    /**
     * prefix.
     *
     * @return CountryPrefix
     */
    public function prefix()
    {
        return $this->prefix;
    }

    /**
     * lineNumber.
     *
     * @return LineNumber
     */
    public function lineNumber()
    {
        return $this->lineNumber;
    }

    /**
     * @inheritdoc.
     *
     * @param static $valueObject
     */
    public function sameValueAs(ValueObjectInterface $valueObject)
    {
        return $this->prefix->sameValueAs($valueObject->prefix());
    }

    public function copy()
    {
        return clone $this;
    }

    public function __clone()
    {
        $prefix = clone $this->prefix;
        $line   = clone $this->lineNumber;

        return new static($prefix, $line);
    }
}