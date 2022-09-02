<?php

/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt

 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps

 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * cy-GB localise class.
 *
 * @since  1.6
 */
abstract class Cy_GBLocalise
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
			return array('ZERO', '0');
		}
		elseif ($count == 1)
		{
			return array('ONE', '1');
		}
		elseif  ($count == 2)
		{
			return array('TWO', '2');
		}
		elseif ($count == 3)
		{
			return array('FEW', '3');
		}
		elseif ($count == 6)
		{
			return array('MANY', '6');
		}
		else
		{
			return array('OTHER', 'MORE');
		}
	}
}
