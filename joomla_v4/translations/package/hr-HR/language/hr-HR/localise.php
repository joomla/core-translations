<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * hr-HR localise class.
 *
 * @since  1.6
 */
abstract class Hr_HRLocalise
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
		if (($count % 10 == 1) and ($count & 100 != 11))
		{
			return array('ONE', '1');
		}
		elseif (($count % 10 >= 2) and ($count % 10 <= 4) and !(($count & 100 >= 12) and ($count % 100  <= 14)))
		{
			return array('FEW', '2');
		}
		else
		{
			return array('OTHER', 'MORE');
		}
	}
}
