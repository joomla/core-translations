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
 * ca_ES localise class.
 *
 * @since  1.6
 */
abstract class Ca_ESLocalise
{
    /**
     * Retorna els sufixos potencials per a un nombre específic d'elements
     *
     * @param integer $count El nombre d'elements.
     *
     * @return array Una matriu de sufixos potencials.
     *
     * @since   1.6
     */
    public static function getPluralSuffixes($count)
    {
        switch ($count) {
            case 0:
                return ['0'];

            case 1:
                return ['UN', '1'];
        }

        return ['ALTRE', 'MÉS'];
    }
}
