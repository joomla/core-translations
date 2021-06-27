<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License versija 2 arba naujesnė; žr. LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * lt-LT localise class.
 *
 * @since  1.6
 */
abstract class Lt_LTLocalise
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
		elseif ($count % 10 == 1 && $count % 100 != 11)
		{
			return array('ONE', '1');
		}
		elseif ($count % 10 >= 2 && $count % 10 <= 9 && $count%100 <= 10 || $count%100 > 20)
{
return array('FEW', '2');
}
else
		{
			return array('OTHER', 'MORE');
		}
	}
}
