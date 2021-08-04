<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * Greek Translation 2005  2021 <https://www.joomla.gr>
 * @license    GNU Γενική Άδεια Δημόσιας Χρήσης έκδοση 2 ή νεότερη; δες LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * el-GR κλάση τοπικοποίησης.
 *
 * @since  1.6
 */
abstract class El_GRLocalise
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
		elseif ($count == 1)
		{
			return array('ΕΝΑ', '1');
		}
		else
		{
			return array('ΑΛΛΟ', 'ΠΕΡΙΣΣΟΤΕΡΑ');
		}
	}
}
