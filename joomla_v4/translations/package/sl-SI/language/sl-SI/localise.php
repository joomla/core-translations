<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * sl-SI localise class.
 *
 * @since  1.6
 */
abstract class Sl_SILocalise
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
		if (($count % 100) == 1)
		{
			return array('ONE', '1');
		}
		elseif (($count % 100) == 2)
		{
			return array('TWO', '2');
		}
		elseif ((($count % 100) == 3) or (($count % 100) == 4))
		{
			return array('FEW', '3');
		}
	}
}
