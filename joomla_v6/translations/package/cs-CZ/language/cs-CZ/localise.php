<?php

/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 *
 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
 *
 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * cs-CZ localise class.
 *
 * @since  1.6
 */
abstract class Cs_CZLocalise
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
        if ($count == 0) {
            return ['0'];
                }

            		elseif ($count == 1)
		{
			return ['ONE', '1'];
		}
		    elseif ($count == 2)
    {
        return ['FEW', '2'];
    }
    elseif ($count == 3)
    {
        return ['FEW', '3'];
    }
                    elseif ($count == 4)
    {
        return ['FEW'];
        }

            else
		{
			return ['OTHER', 'MORE'];
		}
    }
}
