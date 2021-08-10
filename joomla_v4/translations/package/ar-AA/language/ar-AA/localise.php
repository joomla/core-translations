<?php
/**
 * @package    Joomla.Language
 * @Copyright  Copyright (C) Translation 2010 - 2021 Ashraf Damra/Abu Nidal dr.d.ashraf@gmail.com. All rights reserved.
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * ar-AA localise class.
 *
 * @since  1.6
 */
abstract class Ar_AALocalise
{
	/**
	 * Returns the potential suffixes for a specific number of items
	 *
	 * @param	int $count  The number of items.
	 *
	 * @return	array  An array of potential suffixes.
	 *
	 * @since	1.6
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
