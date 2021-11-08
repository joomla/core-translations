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
abstract class ca_ESLocalise
{
	/**
	 * Retorna els sufixos potencials per a un nombre específic d'elements
	 *
	 * @param   integer  $count  Nombre d'elements.
	 *
	 * @return  array  Conjunt de sufixos potencials.
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
			return array('UNO', '1');
		}
		else
		{
			return array('ALTRE', 'MÉS');
		}
	}

	/**
	 * Retorna les paraules de cerca ignorades
	 *
	 * @return  array  Sèrie de paraules de cerca ignorades.
	 *
	 * @since   1.6
	 */
	public static function getIgnoredSearchWords()
	{
		return array('i', 'a', 'amb');
	}

	/**
	 * Retorna el límit mínim de longitud de les paraules de cerca
	 *
	 * @return  integer  Límit mínim de longitud de les paraules de cerca.
	 *
	 * @since   1.6
	 */
	public static function getLowerLimitSearchWord()
	{
		return 3;
	}

	/**
	 * Retorna el límit màxim de longitud de les paraules de cerca
	 *
	 * @return  integer Llímit màxim de longitud de les paraules de cerca.
	 *
	 * @since   1.6
	 */
	public static function getUpperLimitSearchWord()
	{
		return 20;
	}

	/**
	 * Retorna el nombre de caràcters que es mostraran en cercar
	 *
	 * @return  integer  Nombre de caràcters que es mostraran en cercar.
	 *
	 * @since   1.6
	 */
	public static function getSearchDisplayedCharactersNumber()
	{
		return 200;
	}
}
