<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Money;

use ValueObject\Number\Integer;
use ValueObject\Quantity\AmountInterface;

/**
 * Class Amount.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 */
class Amount extends Integer implements AmountInterface
{

}