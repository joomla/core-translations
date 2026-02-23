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
        switch ($count) {
            case 0:
                return ['ZERO', '0'];

            case 1:
                return ['ONE', '1'];
        }

        if  ($count == 2){
			return ['TWO', '2'];
		}
		if ($count == 3){
			return ['FEW', '3'];
		}
		if ($count == 6){
			return ['MANY', '6'];
		}
else return ['OTHER', 'MORE'];
    }
}
