<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License ვერსია 2 ან მეტი; დეტალები - LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * ka-GE localise class.
 *
 * @მოყოლებული  1.6 ვერსიიდან
 */
abstract class Ka_GELocalise
{
	/**
	 * Returns the potential suffixes for a specific number of items
	 *
	 * @param   integer  $count  The number of items.
	 *
	 * @return  array  An array of potential suffixes.
	 *
	 * @მოყოლებული  1.6 ვერსიიდან
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
