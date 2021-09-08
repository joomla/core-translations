<?php
/**
 * @pacote Joomla.Language
 *
 * @copyright (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license GNU General Public License versão 2 ou superior; consulte LICENSE.txt
*/

defined('_JEXEC') or die;

/**
 * pt-BR localise class.
 *
 * @since  1.6
 */
abstract class pt_BRLocalise
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
			return array('ONE', '1');
		}
		else
		{
			return array('OTHER', 'MORE');
		}
	}
}
