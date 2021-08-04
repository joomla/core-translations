<?php
/**
 * @package    Joomla.Language
 *
 * @copyright Direitos de Autor (C) 2010 - Open Source Matters, Inc. <https://www.joomla.org>
 * @license  Pública Geral GNU - versão 2 ou posterior; ver ficheiro LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * pt-PT localise class.
 *
 * @since  1.6
 */
abstract class pt_PTLocalise
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
