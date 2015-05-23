<?php

/**
 * This file is part of the ValueObject package.
 *
 * (c) Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 */

namespace ValueObject\Money;

use ValueObject\Enum\AbstractEnum;
use ValueObject\Quantity\UnitInterface;

/**
 * Class Currency.
 *
 * @package ValueObject
 * @author  Lorenzo Marzullo <marzullo.lorenzo@gmail.com>
 * @link    http://github.com/lorenzomar/valueobjects
 *
 * @method static Currency AED
 * @method static Currency AFN
 * @method static Currency ALL
 * @method static Currency AMD
 * @method static Currency ANG
 * @method static Currency AOA
 * @method static Currency ARS
 * @method static Currency AUD
 * @method static Currency AWG
 * @method static Currency AZN
 * @method static Currency BAM
 * @method static Currency BBD
 * @method static Currency BDT
 * @method static Currency BGN
 * @method static Currency BHD
 * @method static Currency BIF
 * @method static Currency BMD
 * @method static Currency BND
 * @method static Currency BOB
 * @method static Currency BRL
 * @method static Currency BSD
 * @method static Currency BTN
 * @method static Currency BWP
 * @method static Currency BYR
 * @method static Currency BZD
 * @method static Currency CAD
 * @method static Currency CDF
 * @method static Currency CHF
 * @method static Currency CLF
 * @method static Currency CLP
 * @method static Currency CNY
 * @method static Currency COP
 * @method static Currency CRC
 * @method static Currency CUP
 * @method static Currency CVE
 * @method static Currency CZK
 * @method static Currency DJF
 * @method static Currency DKK
 * @method static Currency DOP
 * @method static Currency DZD
 * @method static Currency EEK
 * @method static Currency EGP
 * @method static Currency ETB
 * @method static Currency EUR
 * @method static Currency FJD
 * @method static Currency FKP
 * @method static Currency GBP
 * @method static Currency GEL
 * @method static Currency GHS
 * @method static Currency GIP
 * @method static Currency GMD
 * @method static Currency GNF
 * @method static Currency GTQ
 * @method static Currency GYD
 * @method static Currency HKD
 * @method static Currency HNL
 * @method static Currency HRK
 * @method static Currency HTG
 * @method static Currency HUF
 * @method static Currency IDR
 * @method static Currency ILS
 * @method static Currency INR
 * @method static Currency IQD
 * @method static Currency IRR
 * @method static Currency ISK
 * @method static Currency JEP
 * @method static Currency JMD
 * @method static Currency JOD
 * @method static Currency JPY
 * @method static Currency KES
 * @method static Currency KGS
 * @method static Currency KHR
 * @method static Currency KMF
 * @method static Currency KPW
 * @method static Currency KRW
 * @method static Currency KWD
 * @method static Currency KYD
 * @method static Currency KZT
 * @method static Currency LAK
 * @method static Currency LBP
 * @method static Currency LKR
 * @method static Currency LRD
 * @method static Currency LSL
 * @method static Currency LTL
 * @method static Currency LVL
 * @method static Currency LYD
 * @method static Currency MAD
 * @method static Currency MDL
 * @method static Currency MGA
 * @method static Currency MKD
 * @method static Currency MMK
 * @method static Currency MNT
 * @method static Currency MOP
 * @method static Currency MRO
 * @method static Currency MUR
 * @method static Currency MVR
 * @method static Currency MWK
 * @method static Currency MXN
 * @method static Currency MYR
 * @method static Currency MZN
 * @method static Currency NAD
 * @method static Currency NGN
 * @method static Currency NIO
 * @method static Currency NOK
 * @method static Currency NPR
 * @method static Currency NZD
 * @method static Currency OMR
 * @method static Currency PAB
 * @method static Currency PEN
 * @method static Currency PGK
 * @method static Currency PHP
 * @method static Currency PKR
 * @method static Currency PLN
 * @method static Currency PYG
 * @method static Currency QAR
 * @method static Currency RON
 * @method static Currency RSD
 * @method static Currency RUB
 * @method static Currency RWF
 * @method static Currency SAR
 * @method static Currency SBD
 * @method static Currency SCR
 * @method static Currency SDG
 * @method static Currency SEK
 * @method static Currency SGD
 * @method static Currency SHP
 * @method static Currency SLL
 * @method static Currency SOS
 * @method static Currency SRD
 * @method static Currency STD
 * @method static Currency SVC
 * @method static Currency SYP
 * @method static Currency SZL
 * @method static Currency THB
 * @method static Currency TJS
 * @method static Currency TMT
 * @method static Currency TND
 * @method static Currency TOP
 * @method static Currency TRY_
 * @method static Currency TTD
 * @method static Currency TWD
 * @method static Currency TZS
 * @method static Currency UAH
 * @method static Currency UGX
 * @method static Currency USD
 * @method static Currency UYU
 * @method static Currency UZS
 * @method static Currency VEF
 * @method static Currency VND
 * @method static Currency VUV
 * @method static Currency WST
 * @method static Currency XAF
 * @method static Currency XCD
 * @method static Currency XDR
 * @method static Currency XOF
 * @method static Currency XPF
 * @method static Currency YER
 * @method static Currency ZAR
 * @method static Currency ZMK
 * @method static Currency ZWL
 */
class Currency extends AbstractEnum implements UnitInterface
{
    const AED = 'AED';
    const AFN = 'AFN';
    const ALL = 'ALL';
    const AMD = 'AMD';
    const ANG = 'ANG';
    const AOA = 'AOA';
    const ARS = 'ARS';
    const AUD = 'AUD';
    const AWG = 'AWG';
    const AZN = 'AZN';
    const BAM = 'BAM';
    const BBD = 'BBD';
    const BDT = 'BDT';
    const BGN = 'BGN';
    const BHD = 'BHD';
    const BIF = 'BIF';
    const BMD = 'BMD';
    const BND = 'BND';
    const BOB = 'BOB';
    const BRL = 'BRL';
    const BSD = 'BSD';
    const BTN = 'BTN';
    const BWP = 'BWP';
    const BYR = 'BYR';
    const BZD = 'BZD';
    const CAD = 'CAD';
    const CDF = 'CDF';
    const CHF = 'CHF';
    const CLF = 'CLF';
    const CLP = 'CLP';
    const CNY = 'CNY';
    const COP = 'COP';
    const CRC = 'CRC';
    const CUP = 'CUP';
    const CVE = 'CVE';
    const CZK = 'CZK';
    const DJF = 'DJF';
    const DKK = 'DKK';
    const DOP = 'DOP';
    const DZD = 'DZD';
    const EEK = 'EEK';
    const EGP = 'EGP';
    const ETB = 'ETB';
    const EUR = 'EUR';
    const FJD = 'FJD';
    const FKP = 'FKP';
    const GBP = 'GBP';
    const GEL = 'GEL';
    const GHS = 'GHS';
    const GIP = 'GIP';
    const GMD = 'GMD';
    const GNF = 'GNF';
    const GTQ = 'GTQ';
    const GYD = 'GYD';
    const HKD = 'HKD';
    const HNL = 'HNL';
    const HRK = 'HRK';
    const HTG = 'HTG';
    const HUF = 'HUF';
    const IDR = 'IDR';
    const ILS = 'ILS';
    const INR = 'INR';
    const IQD = 'IQD';
    const IRR = 'IRR';
    const ISK = 'ISK';
    const JEP = 'JEP';
    const JMD = 'JMD';
    const JOD = 'JOD';
    const JPY = 'JPY';
    const KES = 'KES';
    const KGS = 'KGS';
    const KHR = 'KHR';
    const KMF = 'KMF';
    const KPW = 'KPW';
    const KRW = 'KRW';
    const KWD = 'KWD';
    const KYD = 'KYD';
    const KZT = 'KZT';
    const LAK = 'LAK';
    const LBP = 'LBP';
    const LKR = 'LKR';
    const LRD = 'LRD';
    const LSL = 'LSL';
    const LTL = 'LTL';
    const LVL = 'LVL';
    const LYD = 'LYD';
    const MAD = 'MAD';
    const MDL = 'MDL';
    const MGA = 'MGA';
    const MKD = 'MKD';
    const MMK = 'MMK';
    const MNT = 'MNT';
    const MOP = 'MOP';
    const MRO = 'MRO';
    const MUR = 'MUR';
    const MVR = 'MVR';
    const MWK = 'MWK';
    const MXN = 'MXN';
    const MYR = 'MYR';
    const MZN = 'MZN';
    const NAD = 'NAD';
    const NGN = 'NGN';
    const NIO = 'NIO';
    const NOK = 'NOK';
    const NPR = 'NPR';
    const NZD = 'NZD';
    const OMR = 'OMR';
    const PAB = 'PAB';
    const PEN = 'PEN';
    const PGK = 'PGK';
    const PHP = 'PHP';
    const PKR = 'PKR';
    const PLN = 'PLN';
    const PYG = 'PYG';
    const QAR = 'QAR';
    const RON = 'RON';
    const RSD = 'RSD';
    const RUB = 'RUB';
    const RWF = 'RWF';
    const SAR = 'SAR';
    const SBD = 'SBD';
    const SCR = 'SCR';
    const SDG = 'SDG';
    const SEK = 'SEK';
    const SGD = 'SGD';
    const SHP = 'SHP';
    const SLL = 'SLL';
    const SOS = 'SOS';
    const SRD = 'SRD';
    const STD = 'STD';
    const SVC = 'SVC';
    const SYP = 'SYP';
    const SZL = 'SZL';
    const THB = 'THB';
    const TJS = 'TJS';
    const TMT = 'TMT';
    const TND = 'TND';
    const TOP = 'TOP';
    const TRY_ = 'TRY'; // "try" is a PHP reserved word
    const TTD = 'TTD';
    const TWD = 'TWD';
    const TZS = 'TZS';
    const UAH = 'UAH';
    const UGX = 'UGX';
    const USD = 'USD';
    const UYU = 'UYU';
    const UZS = 'UZS';
    const VEF = 'VEF';
    const VND = 'VND';
    const VUV = 'VUV';
    const WST = 'WST';
    const XAF = 'XAF';
    const XCD = 'XCD';
    const XDR = 'XDR';
    const XOF = 'XOF';
    const XPF = 'XPF';
    const YER = 'YER';
    const ZAR = 'ZAR';
    const ZMK = 'ZMK';
    const ZWL = 'ZWL';
}