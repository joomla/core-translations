<?php

/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 - 2021 Open Source Matters, Inc. <https://www.joomla.org>
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
 * nl-BE localise class.
 *
 * @since  1.6
 */
abstract class Nl_BELocalise
{
    /**
     * Geeft als resultaat de mogelijke achtervoegsels van een bepaald aantal items
     *
     * @param integer  $count  Het aantal items.
     *
     * @return array van potentiële suffixen.
     *
     *@sinds 1.6
     */
    public static function getPluralSuffixes($count)
    {
        switch ($count) {
            case 0:
                return ['0'];

            case 1:
                return ['ONE', '1'];
        }

        return ['OTHER', 'MORE'];
    }
}
