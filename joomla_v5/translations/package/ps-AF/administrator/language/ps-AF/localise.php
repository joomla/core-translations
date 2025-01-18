<?php

/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2011 Open Source Matters, Inc. <https://www.sporghay.com>
 * @license    GNU General Public License version ۲ or later; see LICENSE.txt
 *
 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
 *
 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * ps-AF localise class.
 *
 * @since  1.6
 */
abstract class Ps_AFLocalise
{
    /**
     * د یو ټاکلي شمیر توکو له پاره احتمالي ضمیمې بیرته راګرځي
     *
     * @param   integer  $count  The number of items.
     *
     * @return  array  An array of potential suffixes.
     *
     * @since   1.6
     */
    public static function getPluralSuffixes($count)
    {
        if ($count == 0) {
            return ['0'];
        }

        if ($count == 1) {
            return ['ONE', '1'];
        }

        return ['OTHER', 'MORE'];
    }

    /**
     * له پامه غورځول شوي د لټون کلیمې بیرته راګرځوي
     *
     * @return  array  An array of ignored search words.
     *
     * @since   1.6
     *
     * @deprecated  5.1 will be removed in 7.0 without replacement
     */
    public static function getIgnoredSearchWords()
    {
        return ['and', 'in', 'on'];
    }

    /**
     * د لټون کلمو لږ اوږد حد بیرته راستنوي
     *
     * @return  integer  The lower length limit of search words.
     *
     * @since   1.6
     *
     * @deprecated  5.1 will be removed in 7.0 without replacement
     */
    public static function getLowerLimitSearchWord()
    {
        return 3;
    }

    /**
     * د لټون د کلمو پورتنۍ اوږدوالی حد بیرته راګرځوي
     *
     * @return  integer  The upper length limit of search words.
     *
     * @since   1.6
     *
     * @deprecated  5.1 will be removed in 7.0 without replacement
     */
    public static function getUpperLimitSearchWord()
    {
        return 20;
    }

    /**
     * د لټون پرمهال د ښودلو له پاره د توروشمیر بیرته راګرځي
     *
     * @return integer د لټون پر مهال د ښودلو له پاره د تورو شمیر.
     *
     * @since   1.6
     *
     * @deprecated  5.1 will be removed in 7.0 without replacement
     */
    public static function getSearchDisplayedCharactersNumber()
    {
        return 200;
    }
}
