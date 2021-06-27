<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  Visas tiesības aizsargātas (C) 2010 - 2021 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * lv-LV localise class.
 *
 * @since  1.6
 */
abstract class Lv_LVLocalise
{
	/**
	 * Returns the potential suffixes for a specific number of items
	 *
	 * @param   integer  $count  The number of items.
	 *
	 * @return  array  An array of potential suffixes.
	 *
	 * @since   1.6
	 */
	public static function getPluralSuffixes($count)
	{
		if ($count == 0)
		{
			return array('0');
		}
		elseif ($count % 10 == 1 && $count != 11)
		{
			return array('ONE', '1');
		}
		else
		{
			return array('OTHER', 'MORE');
		}
	}
}
