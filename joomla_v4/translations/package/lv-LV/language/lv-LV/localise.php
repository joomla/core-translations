<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License versija 2 vai vēlāka; skatīt LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * en-GB localise class.
 *
 * @since  1.6
 */
abstract class lv_LVLocalise
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
		elseif ($count == 1 || ($count > 20 && $count % 10 == 1))
		{
			return array('ONE', '1');
		}
		else
		{
			return array('OTHER', 'MORE');
		}
	}
}
