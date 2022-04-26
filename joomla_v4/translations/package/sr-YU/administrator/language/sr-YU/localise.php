<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2013 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * sr-Latn-RS klasa za lokalizaciju.
 *
 * @počev od verzije  1.6
 */
abstract class En_GBLocalise
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
		if ($count == 0)
		{
			return array('0');
		}
		elseif ($count == 1)
		{
			return array('ONE', '1');
		}
		else
		{
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
