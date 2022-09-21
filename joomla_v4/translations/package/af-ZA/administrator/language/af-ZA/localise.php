<?php

/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt

 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps

 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * af.ZA localise class.
 *
 * @since  1.6
 */
abstract class Af_ZALocalise
{
    /**
     * Wys die potensiële agtervoegsels vir 'n spesifieke aantal items
     *
     * @param   integer  $count  Die aantal items.
     *
     * @return  array  verskeidenheid potensiële agtervoegsels.
     *
     * @since   1.6
     */
    public static function getPluralSuffixes($count)
    {
        if ($count == 0) {
            return array('0');
        } elseif ($count == 1) {
            return array('ONE', '1');
        } else {
            return array('OTHER', 'MORE');
        }
    }

    /**
     * Wys die geïgnoreer soekwoorde
     *
     * @return  array  reeks geïgnoreer soekwoorde.
     *
     * @since   1.6
     */
    public static function getIgnoredSearchWords()
    {
        return array('and', 'in', 'on');
    }

    /**
     * Wys die onderste lengtelimiet van soekwoorde
     *
     * @return  integer  Die onderste lengtelimiet van soekwoorde.
     *
     * @since   1.6
     */
    public static function getLowerLimitSearchWord()
    {
        return 3;
    }

    /**
     * Wys die boonste lengtelimiet van soekwoorde
     *
     * @return  integer  Die boonste lengtelimiet van soekwoorde.
     *
     * @since   1.6
     */
    public static function getUpperLimitSearchWord()
    {
        return 20;
    }

    /**
     * Wys die aantal tekens om te wys wanneer jy soek
     *
     * @return  integer  Die aantal karakters om te vertoon wanneer jy soek.
     *
     * @since   1.6
     */
    public static function getSearchDisplayedCharactersNumber()
    {
        return 200;
    }
}
