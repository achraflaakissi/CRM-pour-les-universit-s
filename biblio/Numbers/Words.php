<?php
/**
 * Numbers_Words
 *
 * PHP version 5
 *
 * Copyright (c) 1997-2006 The PHP Group
 *
 * This source file is subject to version 3.01 of the PHP license,
 * that is bundled with this package in the file LICENSE, and is
 * available at through the world-wide-web at
 * http://www.php.net/license/3_01.txt
 * If you did not receive a copy of the PHP license and are unable to
 * obtain it through the world-wide-web, please send a note to
 * license@php.net so we can mail you a copy immediately.
 *
 * Authors: Piotr Klaban <makler@man.torun.pl>
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Piotr Klaban <makler@man.torun.pl>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @version  SVN: $Id$
 * @link     http://pear.php.net/package/Numbers_Words
 */

// {{{ Numbers_Words
require_once 'Words/Exception.php';

/**
 * The Numbers_Words class provides method to convert arabic numerals to words.
 *
 * @category Numbers
 * @package  Numbers_Words
 * @author   Piotr Klaban <makler@man.torun.pl>
 * @license  PHP 3.01 http://www.php.net/license/3_01.txt
 * @link     http://pear.php.net/package/Numbers_Words
 * @since    PHP 4.2.3
 * @access   public
 */
 class Numbers_Words_Locale_fr extends Numbers_Words
{

    // {{{ properties

    /**
     * Locale name.
     * @var string
     * @access public
     */
    var $locale = 'fr';

    /**
     * Language name in English.
     * @var string
     * @access public
     */
    var $lang = 'French';

    /**
     * Native language name.
     * @var string
     * @access public
     */
    var $lang_native = 'Français';

    /**
     * The words for some numbers.
     * @var string
     * @access private
     */
    var $_misc_numbers = array(
        10=>'dix',      // 10
            'onze',     // 11
            'douze',    // 12
            'treize',   // 13
            'quatorze', // 14
            'quinze',   // 15
            'seize',    // 16
        20=>'vingt',    // 20
        30=>'trente',   // 30
        40=>'quarante', // 40
        50=>'cinquante',// 50
        60=>'soixante', // 60
       100=>'cent'      // 100
    );


    /**
     * The words for digits (except zero).
     * @var string
     * @access private
     */
    var $_digits = array(1=>"un", "deux", "trois", "quatre", "cinq", "six", "sept", "huit", "neuf");

    /**
     * The word for zero.
     * @var string
     * @access private
     */
    var $_zero = 'zéro';

    /**
     * The word for infinity.
     * @var string
     * @access private
     */
    var $_infinity = 'infini';

    /**
     * The word for the "and" language construct.
     * @var string
     * @access private
     */
    var $_and = 'et';
    
    /**
     * The word separator.
     * @var string
     * @access private
     */
    var $_sep = ' ';

    /**
     * The dash liaison.
     * @var string
     * @access private
     */
    var $_dash = '-';

    /**
     * The word for the minus sign.
     * @var string
     * @access private
     */
    var $_minus = 'moins'; // minus sign

    /**
     * The plural suffix (except for hundred).
     * @var string
     * @access private
     */
    var $_plural = 's'; // plural suffix

    /**
     * The suffixes for exponents (singular).
     * @var array
     * @access private
     */
    var $_exponent = array(
        0 => '',
        3 => 'mille',
        6 => 'million',
        9 => 'milliard',
       12 => 'trillion',
       15 => 'quadrillion',
       18 => 'quintillion',
       21 => 'sextillion',
       24 => 'septillion',
       27 => 'octillion',
       30 => 'nonillion',
       33 => 'decillion',
       36 => 'undecillion',
       39 => 'duodecillion',
       42 => 'tredecillion',
       45 => 'quattuordecillion',
       48 => 'quindecillion',
       51 => 'sexdecillion',
       54 => 'septendecillion',
       57 => 'octodecillion',
       60 => 'novemdecillion',
       63 => 'vigintillion',
       66 => 'unvigintillion',
       69 => 'duovigintillion',
       72 => 'trevigintillion',
       75 => 'quattuorvigintillion',
       78 => 'quinvigintillion',
       81 => 'sexvigintillion',
       84 => 'septenvigintillion',
       87 => 'octovigintillion',
       90 => 'novemvigintillion',
       93 => 'trigintillion',
       96 => 'untrigintillion',
       99 => 'duotrigintillion',
      102 => 'trestrigintillion',
      105 => 'quattuortrigintillion',
      108 => 'quintrigintillion',
      111 => 'sextrigintillion',
      114 => 'septentrigintillion',
      117 => 'octotrigintillion',
      120 => 'novemtrigintillion',
      123 => 'quadragintillion',
      126 => 'unquadragintillion',
      129 => 'duoquadragintillion',
      132 => 'trequadragintillion',
      135 => 'quattuorquadragintillion',
      138 => 'quinquadragintillion',
      141 => 'sexquadragintillion',
      144 => 'septenquadragintillion',
      147 => 'octoquadragintillion',
      150 => 'novemquadragintillion',
      153 => 'quinquagintillion',
      156 => 'unquinquagintillion',
      159 => 'duoquinquagintillion',
      162 => 'trequinquagintillion',
      165 => 'quattuorquinquagintillion',
      168 => 'quinquinquagintillion',
      171 => 'sexquinquagintillion',
      174 => 'septenquinquagintillion',
      177 => 'octoquinquagintillion',
      180 => 'novemquinquagintillion',
      183 => 'sexagintillion',
      186 => 'unsexagintillion',
      189 => 'duosexagintillion',
      192 => 'tresexagintillion',
      195 => 'quattuorsexagintillion',
      198 => 'quinsexagintillion',
      201 => 'sexsexagintillion',
      204 => 'septensexagintillion',
      207 => 'octosexagintillion',
      210 => 'novemsexagintillion',
      213 => 'septuagintillion',
      216 => 'unseptuagintillion',
      219 => 'duoseptuagintillion',
      222 => 'treseptuagintillion',
      225 => 'quattuorseptuagintillion',
      228 => 'quinseptuagintillion',
      231 => 'sexseptuagintillion',
      234 => 'septenseptuagintillion',
      237 => 'octoseptuagintillion',
      240 => 'novemseptuagintillion',
      243 => 'octogintillion',
      246 => 'unoctogintillion',
      249 => 'duooctogintillion',
      252 => 'treoctogintillion',
      255 => 'quattuoroctogintillion',
      258 => 'quinoctogintillion',
      261 => 'sexoctogintillion',
      264 => 'septoctogintillion',
      267 => 'octooctogintillion',
      270 => 'novemoctogintillion',
      273 => 'nonagintillion',
      276 => 'unnonagintillion',
      279 => 'duononagintillion',
      282 => 'trenonagintillion',
      285 => 'quattuornonagintillion',
      288 => 'quinnonagintillion',
      291 => 'sexnonagintillion',
      294 => 'septennonagintillion',
      297 => 'octononagintillion',
      300 => 'novemnonagintillion',
      303 => 'centillion'
        );
    // }}}

    // {{{ _splitNumber()

    /**
     * Split a number to groups of three-digit numbers.
     *
     * @param mixed $num An integer or its string representation
     *                   that need to be split
     *
     * @return array  Groups of three-digit numbers.
     * @access private
     * @author Kouber Saparev <kouber@php.net>
     * @since  PHP 4.2.3
     */
    function _splitNumber($num)
    {
        if (is_string($num)) {
            $ret    = array();
            $strlen = strlen($num);
            $first  = substr($num, 0, $strlen%3);

            preg_match_all('/\d{3}/', substr($num, $strlen%3, $strlen), $m);
            $ret =& $m[0];

            if ($first) {
                array_unshift($ret, $first);
            }

            return $ret;
        }
        return explode(' ', number_format($num, 0, '', ' ')); // a faster version for integers
    }
    // }}}

    // {{{ _showDigitsGroup()

    /**
     * Converts a three-digit number to its word representation
     * in French language.
     *
     * @param integer $num  An integer between 1 and 999 inclusive.
     * @param boolean $last A flag, that determines if it is the last group of digits -
     *                      this is used to accord the plural suffix of the "hundreds".
     *                      Example: 200 = "deux cents", but 200000 = "deux cent mille".
     *
     * @return string   The words for the given number.
     * @access private
     * @author Kouber Saparev <kouber@php.net>
     */
    function _showDigitsGroup($num, $last = false)
    {
        $ret = '';
        
        // extract the value of each digit from the three-digit number
        $e = $num%10;                  // ones
        $d = ($num-$e)%100/10;         // tens
        $s = ($num-$d*10-$e)%1000/100; // hundreds
        
        // process the "hundreds" digit.
        if ($s) {
            if ($s>1) {
                $ret .= $this->_digits[$s].$this->_sep.$this->_misc_numbers[100];
                if ($last && !$e && !$d) {
                    $ret .= $this->_plural;
                }
            } else {
                $ret .= $this->_misc_numbers[100];
            }
            $ret .= $this->_sep;
        }

        // process the "tens" digit, and optionally the "ones" digit.
        if ($d) {
            // in the case of 1, the "ones" digit also must be processed
            if ($d==1) {
                if ($e<=6) {
                    $ret .= $this->_misc_numbers[10+$e];
                } else {
                    $ret .= $this->_misc_numbers[10].'-'.$this->_digits[$e];
                }
                $e = 0;
            } elseif ($d>5) {
                if ($d<8) {
                    $ret .= $this->_misc_numbers[60];

                    $resto = $d*10+$e-60;
                    if ($e==1) {
                        $ret .= $this->_sep.$this->_and.$this->_sep;
                    } elseif ($resto) {
                        $ret .= $this->_dash;
                    }
                    
                    if ($resto) {
                        $ret .= $this->_showDigitsGroup($resto);
                    }
                    $e = 0;
                } else {
                    $ret .= $this->_digits[4].$this->_dash.$this->_misc_numbers[20];

                    $resto = $d*10+$e-80;
                    if ($resto) {
                        $ret .= $this->_dash;
                        $ret .= $this->_showDigitsGroup($resto);

                        $e = 0;
                    } else {
                        $ret .= $this->_plural;
                    }
                }
            } else {
                $ret .= $this->_misc_numbers[$d*10];
            }
        }

        // process the "ones" digit
        if ($e) {
            if ($d) {
                if ($e==1) {
                    $ret .= $this->_sep.$this->_and.$this->_sep;
                } else {
                    $ret .= $this->_dash;
                }
            }
            $ret .= $this->_digits[$e];
        }

        // strip excessive separators
        $ret = rtrim($ret, $this->_sep);

        return $ret;
    }
    // }}}

    // {{{ _toWords()

    /**
     * Converts a number to its word representation
     * in French language.
     *
     * @param integer $num An integer (or its string representation) between 9.99*-10^302
     *                        and 9.99*10^302 (999 centillions) that need to be converted to words
     *
     * @return string  The corresponding word representation
     * @access protected
     * @author Kouber Saparev <kouber@php.net>
     * @since  Numbers_Words 0.16.3
     */
    function _toWords($num = 0)
    {
        $ret = '';

        // check if $num is a valid non-zero number
        if (!$num || preg_match('/^-?0+$/', $num) || !preg_match('/^-?\d+$/', $num)) {
            return $this->_zero;
        }

        // add a minus sign
        if (substr($num, 0, 1) == '-') {
            $ret = $this->_minus . $this->_sep;
            $num = substr($num, 1);
        }

        // if the absolute value is greater than 9.99*10^302, return infinity
        if (strlen($num)>306) {
            return $ret . $this->_infinity;
        }

        // strip excessive zero signs
        $num = ltrim($num, '0');

        // split $num to groups of three-digit numbers
        $num_groups = $this->_splitNumber($num);

        $sizeof_numgroups = count($num_groups);

        foreach ($num_groups as $i=>$number) {
            // what is the corresponding exponent for the current group
            $pow = $sizeof_numgroups-$i;

            // skip processment for empty groups
            if ($number!='000') {
                if ($number!=1 || $pow!=2) {
                    $ret .= $this->_showDigitsGroup($number, $i+1==$sizeof_numgroups).$this->_sep;
                }
                $ret .= $this->_exponent[($pow-1)*3];
                if ($pow>2 && $number>1) {
                    $ret .= $this->_plural;
                }
                $ret .= $this->_sep;
            }
        }

        return rtrim($ret, $this->_sep);
    }
    // }}}
}
 
 
 
 
 
 
class Numbers_Words
{
    // {{{ constants

    /**
     * Masculine gender, for languages that need it
     */
    const GENDER_MASCULINE = 0;

    /**
      * Feminine gender, for languages that need it
      */
    const GENDER_FEMININE = 1;

    /**
      * Neuter gender, for languages that need it
      */
    const GENDER_NEUTER = 2;

    /**
      * This is not an actual gender; some languages
      * have different ways of numbering actual things
      * (e.g. Romanian: "un nor, doi nori" for "one cloud, two clouds")
      * and for just counting in an abstract manner
      * (e.g. Romanian: "unu, doi" for "one, two"
      */
    const GENDER_ABSTRACT = 3;

    // }}}

    // {{{ properties

    /**
     * Default Locale name
     * @var string
     * @access public
     */
    public $locale = 'en_US';

    /**
     * Default decimal mark
     * @var string
     * @access public
     */
    public $decimalPoint = '.';

    // }}}
    // {{{ toWords()

    /**
     * Converts a number to its word representation
     *
     * @param integer $num     An integer between -infinity and infinity inclusive :)
     *                         that should be converted to a words representation
     * @param string  $locale  Language name abbreviation. Optional. Defaults to
     *                         current loaded driver or en_US if any.
     * @param array   $options Specific driver options
     *
     * @access public
     * @author Piotr Klaban <makler@man.torun.pl>
     * @since  PHP 4.2.3
     * @return string  The corresponding word representation
     */
    function toWords($num, $locale = '', $options = array())
    {
        if (empty($locale) && isset($this) && $this instanceof Numbers_Words) {
            $locale = $this->locale;
        }

        if (empty($locale)) {
            $locale = 'en_US';
        }

        $classname = self::loadLocale($locale, '_toWords');


        $obj = new $classname;


        if (!is_int($num)) {
            $num = $obj->normalizeNumber($num);

            // cast (sanitize) to int without losing precision
            $num = preg_replace('/(.*?)('.preg_quote($obj->decimalPoint).'.*?)?$/', '$1', $num);
        }

        if (empty($options)) {
            return trim($obj->_toWords($num));
        }
        return trim($obj->_toWords($num, $options));
    }
    // }}}

    // {{{ toCurrency()
    /**
     * Converts a currency value to word representation (1.02 => one dollar two cents)
     * If the number has not any fraction part, the "cents" number is omitted.
     *
     * @param float  $num      A float/integer/string number representing currency value
     *
     * @param string $locale   Language name abbreviation. Optional. Defaults to en_US.
     *
     * @param string $intCurr  International currency symbol
     *                         as defined by the ISO 4217 standard (three characters).
     *                         E.g. 'EUR', 'USD', 'PLN'. Optional.
     *                         Defaults to $def_currency defined in the language class.
     *
     * @param string $decimalPoint  Decimal mark symbol
     *                         E.g. '.', ','. Optional.
     *                         Defaults to $decimalPoint defined in the language class.
     *
     * @return string  The corresponding word representation
     *
     * @access public
     * @author Piotr Klaban <makler@man.torun.pl>
     * @since  PHP 4.2.3
     * @return string
     */
    function toCurrency($num, $locale = 'en_US', $intCurr = '', $decimalPoint = null)
    {
        $ret = $num;

        $classname = self::loadLocale($locale, 'toCurrencyWords');

        $obj = new $classname;

        if (is_null($decimalPoint)) {
            $decimalPoint = $obj->decimalPoint;
        }

        // round if a float is passed, use Math_BigInteger otherwise
        if (is_float($num)) {
            $num = round($num, 2);
        }

        $num = $obj->normalizeNumber($num, $decimalPoint);

        if (strpos($num, $decimalPoint) === false) {
            return trim($obj->toCurrencyWords($intCurr, $num));
        }

        $currency = explode($decimalPoint, $num, 2);

        $len = strlen($currency[1]);

        if ($len == 1) {
            // add leading zero
            $currency[1] .= '0';
        } elseif ($len > 2) {
            // get the 3rd digit after the comma
            $round_digit = substr($currency[1], 2, 1);
            
            // cut everything after the 2nd digit
            $currency[1] = substr($currency[1], 0, 2);
            
            if ($round_digit >= 5) {
                // round up without losing precision
                include_once "Math/BigInteger.php";

                $int = new Math_BigInteger(join($currency));
                $int = $int->add(new Math_BigInteger(1));
                $int_str = $int->toString();

                $currency[0] = substr($int_str, 0, -2);
                $currency[1] = substr($int_str, -2);

                // check if the rounded decimal part became zero
                if ($currency[1] == '00') {
                    $currency[1] = false;
                }
            }
        }

        return trim($obj->toCurrencyWords($intCurr, $currency[0], $currency[1]));
    }
    // }}}

    // {{{ getLocales()
    /**
     * Lists available locales for Numbers_Words
     *
     * @param mixed $locales string/array of strings $locale
     *                       Optional searched language name abbreviation.
     *                       Default: all available locales.
     *
     * @return array   The available locales (optionaly only the requested ones)
     * @author Piotr Klaban <makler@man.torun.pl>
     * @author Bertrand Gugger, bertrand at toggg dot com
     *
     * @return mixed[] Array of locale names ("de_DE", "en")
     */
    public static function getLocales($locales = null)
    {
        $ret = array();
        if (isset($locales) && is_string($locales)) {
            $locales = array($locales);
        }

        $dname = __DIR__ . DIRECTORY_SEPARATOR . 'Words'
            . DIRECTORY_SEPARATOR . 'Locale'
            . DIRECTORY_SEPARATOR;

        $sfiles = glob($dname . '??.php');
        foreach ($sfiles as $fname) {
            $lname = substr($fname, -6, 2);
            if (is_file($fname) && is_readable($fname)
                && (count($locales) == 0 || in_array($lname, $locales))
            ) {
                $ret[] = $lname;
            }
        }

        $mfiles = glob($dname . '??/??.php');
        foreach ($mfiles as $fname) {
            $lname = str_replace(array('/', '\\'), '_', substr($fname, -9, 5));
            if (is_file($fname) && is_readable($fname)
                && (count($locales) == 0 || in_array($lname, $locales))
            ) {
                $ret[] = $lname;
            }
        }

        sort($ret);
        return $ret;
    }
    // }}}

    /**
     * Load the given locale and return class name
     *
     * @param string $locale         Locale key, e.g. "de" or "en_US"
     * @param string $requiredMethod Method that this class needs to have
     *
     * @return string Locale class name
     *
     * @throws Numbers_Words_Exception When the class cannot be loaded
     */
    public static function loadLocale($locale, $requiredMethod)
    {
       if($locale=="fr")
       {
           $classname="Numbers_Words_Locale_fr";
             if (!class_exists($classname)) {
            $file = str_replace('_', '/', $classname) . '.php';
            if (stream_resolve_include_path($file)) {
                include_once $file;
            }

            if (!class_exists($classname)) {
                throw new Numbers_Words_Exception(
                    'Unable to load locale class ' . $classname
                );
            }
        }

        $methods = get_class_methods($classname);
       }
        if (!in_array($requiredMethod, $methods)) {
            throw new Numbers_Words_Exception(
                "Unable to find method '$requiredMethod' in class '$classname'"
            );
        }

        return $classname;
    }

    /**
     * Removes redundant spaces, thousands separators, etc.
     *
     * @param string $num            Some number
     * @param string $decimalPoint   The decimal mark, e.g. "." or ","
     *
     * @return string Number
     */
    function normalizeNumber($num, $decimalPoint = null)
    {
        if (is_null($decimalPoint)) {
            $decimalPoint = $this->decimalPoint;
        }

        return preg_replace('/[^-'.preg_quote($decimalPoint).'0-9]/', '', $num);
    }
}
//Succès !

// }}}
