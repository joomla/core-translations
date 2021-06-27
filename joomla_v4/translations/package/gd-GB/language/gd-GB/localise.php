<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * gd-GB localise class.
 *
 * @since  1.6
 */
abstract class Gd_GBLocalise
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
		if ($count == 1 or $count == 11)
		{
			return array('ONE', '1');
		}
		elseif ($count == 2 or $count == 12)
		{
			return array('TWO', '2');
		}
		elseif (($count >= 3 and $count <=10) or ($count >= 13 and $count <=19))
		{
			return array('FEW');
		}
	}
}
