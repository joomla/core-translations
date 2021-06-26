<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
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
}
