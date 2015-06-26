<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Uuid;

use Ramsey\Uuid\Codec\GuidStringCodec;
use Ramsey\Uuid\Codec\StringCodec;
use Ramsey\Uuid\FeatureSet as BaseFeatureSet;
use Ramsey\Uuid\Provider\Node\FallbackNodeProvider;
use Ramsey\Uuid\Provider\Node\RandomNodeProvider;
use Ramsey\Uuid\Provider\Node\SystemNodeProvider;
use Ramsey\Uuid\Provider\Time\SystemTimeProvider;

/**
 * Class FeatureSet.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobject
 */
class FeatureSet extends BaseFeatureSet
{
    /**
     * @var string
     */
    protected $uuidFqn;

    /**
     * @var string
     */
    protected $degradedUuidFqn;

    private $disableBigNumber = false;

    private $disable64Bit = false;

    private $ignoreSystemNode = false;

    private $builder;

    private $codec;

    private $nodeProvider;

    private $numberConverter;

    private $randomGenerator;

    private $timeConverter;

    private $timeProvider;

    public function __construct($uuidFqn, $degradedUuidFqn, $useGuids = false, $force32Bit = false, $forceNoBigNumber = false, $ignoreSystemNode = false)
    {
        $this->uuidFqn          = $uuidFqn;
        $this->degradedUuidFqn  = $degradedUuidFqn;
        $this->disableBigNumber = $forceNoBigNumber;
        $this->disable64Bit     = $force32Bit;
        $this->ignoreSystemNode = $ignoreSystemNode;

        $this->numberConverter = $this->buildNumberConverter();
        $this->builder         = $this->buildUuidBuilder();
        $this->codec           = $this->buildCodec($useGuids);
        $this->nodeProvider    = $this->buildNodeProvider();
        $this->randomGenerator = $this->buildRandomGenerator();
        $this->timeConverter   = $this->buildTimeConverter();
        $this->timeProvider    = new SystemTimeProvider();
    }

    public function getBuilder()
    {
        return $this->builder;
    }

    public function getCodec()
    {
        return $this->codec;
    }

    public function getNodeProvider()
    {
        return $this->nodeProvider;
    }

    public function getNumberConverter()
    {
        return $this->numberConverter;
    }

    public function getRandomGenerator()
    {
        return $this->randomGenerator;
    }

    public function getTimeConverter()
    {
        return $this->timeConverter;
    }

    public function getTimeProvider()
    {
        return $this->timeProvider;
    }

    protected function buildCodec($useGuids = false)
    {
        if ($useGuids) {
            return new GuidStringCodec($this->builder);
        }

        return new StringCodec($this->builder);
    }

    protected function buildUuidBuilder()
    {
        if ($this->is64BitSystem()) {
            return new ClassBasedUuidBuilder($this->uuidFqn, $this->numberConverter);
        }

        return new DegradedClassBasedUuidBuilder($this->degradedUuidFqn, $this->numberConverter);
    }

    protected function buildNodeProvider()
    {
        if ($this->ignoreSystemNode) {
            return new RandomNodeProvider();
        }

        return new FallbackNodeProvider([
            new SystemNodeProvider(),
            new RandomNodeProvider()
        ]);
    }

    protected function hasBigNumber()
    {
        return class_exists('Moontoast\Math\BigNumber') && ! $this->disableBigNumber;
    }

    protected function is64BitSystem()
    {
        return PHP_INT_SIZE == 8 && ! $this->disable64Bit;
    }
}