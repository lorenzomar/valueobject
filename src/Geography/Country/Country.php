<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <lorenzo.marzullo@qwentes.it>
 */

namespace ValueObject\Geography\Country;

use ValueObject\String\Str;
use ValueObject\ValueObjectInterface;

/**
 * Class Country.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobject
 */
class Country implements ValueObjectInterface
{
    /**
     * @var Iso31661Alpha2Code
     */
    protected $iso31661Alpha2Code;

    /**
     * @var Iso31661Alpha3Code
     */
    protected $iso31661Alpha3Code;

    /**
     * @var
     */
    protected $numericCode;

    /**
     * @var Str
     */
    protected $englishName;

    public function __construct(Iso31661Alpha2Code $iso31661Alpha2Code, Iso31661Alpha3Code $iso31661Alpha3Code, Str $englishName)
    {
        $this->iso31661Alpha2Code = $iso31661Alpha2Code;
        $this->iso31661Alpha3Code = $iso31661Alpha3Code;
        $this->englishName        = $englishName;
    }

    /**
     * fromIso31661Alpha2Code.
     *
     * @param Iso31661Alpha2Code $code
     *
     * @return static
     */
    public static function fromIso31661Alpha2Code(Iso31661Alpha2Code $code)
    {
        $data = DataProvider::fromIso31661Alpha2Code($code);

        $alpha2 = new Iso31661Alpha2Code($data[0]);
        $alpha3 = new Iso31661Alpha3Code($data[1]);
        $name   = new Str($data[3]);

        return new static($alpha2, $alpha3, $name);
    }

    /**
     * fromIso31661Alpha3Code.
     *
     * @param Iso31661Alpha3Code $code
     *
     * @return static
     */
    public static function fromIso31661Alpha3Code(Iso31661Alpha3Code $code)
    {
        $data = DataProvider::fromIso31661Alpha3Code($code);

        $alpha2 = new Iso31661Alpha2Code($data[0]);
        $alpha3 = new Iso31661Alpha3Code($data[1]);
        $name   = new Str($data[3]);

        return new static($alpha2, $alpha3, $name);
    }

    /**
     * iso31661Alpha2Code.
     *
     * @return Iso31661Alpha2Code
     */
    public function iso31661Alpha2Code()
    {
        return $this->iso31661Alpha2Code;
    }

    /**
     * iso31661Alpha3Code.
     *
     * @return Iso31661Alpha3Code
     */
    public function iso31661Alpha3Code()
    {
        return $this->iso31661Alpha3Code;
    }

    /**
     * englishName.
     *
     * @return Str
     */
    public function englishName()
    {
        return $this->englishName;
    }

    /**
     * @inheritdoc.
     *
     * @param static $valueObject
     */
    public function sameValueAs(ValueObjectInterface $valueObject)
    {
        return $this->iso31661Alpha2Code->sameValueAs($valueObject->iso31661Alpha2Code()) && $this->iso31661Alpha3Code->sameValueAs($valueObject->iso31661Alpha3Code()) && $this->englishName->sameValueAs($valueObject->englishName());
    }

    public function copy()
    {
        return clone $this;
    }

    public function __clone()
    {
        $alpha2 = clone $this->iso31661Alpha2Code;
        $alpha3 = clone $this->iso31661Alpha3Code;
        $name   = clone $this->englishName;

        return new static($alpha2, $alpha3, $name);
    }
}