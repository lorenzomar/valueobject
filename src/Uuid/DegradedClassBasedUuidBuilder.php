<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Uuid;

use Ramsey\Uuid\Builder\DefaultUuidBuilder;
use Ramsey\Uuid\CodecInterface;
use Ramsey\Uuid\Converter\NumberConverterInterface;

/**
 * Class DegradedClassBasedUuidBuilder.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobject
 */
class DegradedClassBasedUuidBuilder extends DefaultUuidBuilder
{
    /**
     * @var NumberConverterInterface
     */
    protected $converter;

    /**
     * @var string
     */
    protected $uuidFqn;


    public function __construct($uuidFqn, NumberConverterInterface $converter)
    {
        parent::__construct($converter);
        $this->uuidFqn = $uuidFqn;
    }

    public function build(CodecInterface $codec, array $fields)
    {
        return new $this->uuidFqn($fields, $this->converter, $codec);
    }
}