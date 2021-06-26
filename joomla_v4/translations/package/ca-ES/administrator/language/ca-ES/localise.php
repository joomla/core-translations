<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * ca-ES localise class.
 *
 * @since  1.6
 */
abstract class Ca_ESLocalise
{
	/**
	 * Torna els sufixos potencials per a un nombre concret d'elements
	 *
	 * @param   integer  $count  Tel nombre d'elements.
	 *
	 * @return  array  Una gran varietat de possibles sufixos.
	 *
	 * @since   1.6
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
	 * Retorna les paraules cercades a ignorar
	 *
	 * @return  array Una gran varietat de paraules de cerca ignorades.
	 *
	 * @since   1.6
	 */
	public static function getIgnoredSearchWords()
	{
		return array('and', 'in', 'on');
	}

	/**
	 * Torna el mínim de longitud de les paraules a cercar
	 *
	 * @return  integer   Torna el mínim de longitud de les paraules a cercar.
	 *
	 * @since   1.6
	 */
	public static function getLowerLimitSearchWord()
	{
		return 3;
	}

	/**
	 * Torna el mínim de longitud de les paraules a cercar
	 *
	 * @return  integer   El màxim de longitud de les paraules a cercar.
	 *
	 * @since   1.6
	 */
	public static function getUpperLimitSearchWord()
	{
		return 20;
	}

	/**
	 * Retorna el nombre de caràcters per mostrar mentres cerques
	 *
	 * @return  integer  El nombre de caràcters a mostrar quan cerques.
	 *
	 * @since   1.6
	 */
	public static function getSearchDisplayedCharactersNumber()
	{
		return 200;
	}
}
