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
 * sr-YU localise class.
 *
 * @since  1.6
 */
abstract class Sr_YULocalise
{
/**
	 * Vraća potencijalne sufikse za specifični broj stavki
	 *
	 * @param   integer  $count  Broj stavki.
	 *
	 * @return  array  Veza potencijalnih sufiksa.
	 *
	 * @od verzije   1.6
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
	 * Vraća ignorisane reči pretrage
	 *
	 * @return  array  Veza ignorisanih reči pretrage.
	 *
	 * @počev od verzije   1.6
	 */
    public static function getIgnoredSearchWords()
    {
        return array('and', 'in', 'on');
    }

	/**
	 * Vraća donju veličinu reči pretrage.
	 *
	 * @return  integer  Donja veličina reči pretrage.
	 *
	 * @počev od verzije   1.6
	 */
    public static function getLowerLimitSearchWord()
    {
        return 3;
    }

	/**
	 * Vraća gornju granicu reči pretrage
	 *
	 * @return  integer  Gornji limit reči za pretragu.
	 *
	 * @počev od verzije   1.6
	 */
    public static function getUpperLimitSearchWord()
    {
        return 20;
    }

	/**
	 * Vraća broj karaktera za prikaz tokom pretrage.
	 *
	 * @return  integer  Broj karaktera za prikaz tokom pretrage.
	 *
	 * @počev od verzije   1.6
	 */
    public static function getSearchDisplayedCharactersNumber()
    {
        return 200;
    }
}
