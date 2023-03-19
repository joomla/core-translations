<?php

/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt

 * @phpcs: បិទ Squiz.Classes.ValidClassName.NotCamelCaps

 * @phpcs: បិទ PSR1.Classes.ClassDeclaration.MissingNamespace
 */

// phpcs:បិទ PSR1.Files.SideEffects
\defined('_JEXEC') ឬស្លាប់;
// phpcs: បើក PSR1.Files.SideEffects

/**
 * km-KH ធ្វើមូលដ្ឋានីយកម្មថ្នាក់។
 *
 * @ចាប់តាំងពី 1.6
 */
abstract class Km-KHLocalise
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
        } elseif ($count == 1) {
            return ['ONE', '1'];
        } else {
            return ['OTHER', 'MORE'];
        }
    }
}
