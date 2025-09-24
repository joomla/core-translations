<?php

/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
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
        if ($count == 0) {
            return ['0'];
        }

        if ($count == 1) {
            return ['UN', '1'];
        }

        return ['ALTRE', 'MÉS'];
    }

    /**
     * Retorna les paraules de cerca ignorades
     *
     * @return array Una matriu de paraules de cerca ignorades.
     *
     * @since   1.6
     *
     @deprecated 5.1 serà eliminat a la versió 7.0 sense reemplaçament
     */
    public static function getIgnoredSearchWords()
    {
        return ['i', 'in', 'on'];
    }

    /**
     * Retorna el límit de longitud inferior de les paraules de cerca
     *
     * @return  integer El límit inferior de longitud de les paraules de cerca.
     *
     * @since   1.6
     *
     @deprecated 5.1 serà eliminat a la versió 7.0 sense reemplaçament
     */
    public static function getLowerLimitSearchWord()
    {
        return 3;
    }

    /**
     * Retorna el límit de longitud superior de les paraules de cerca
     *
     * @return  integer El límit de longitud superior de les paraules de cerca.
     *
     * @since   1.6
     *
     @deprecated 5.1 serà eliminat a la versió 7.0 sense reemplaçament
     */
    public static function getUpperLimitSearchWord()
    {
        return 20;
    }

    /**
     * Retorna el nombre de caràcters que es mostren en cercar
     *
     * @return integer El nombre de caràcters que es mostraran en cercar.
     *
     * @since   1.6
     *
     @deprecated 5.1 serà eliminat a la versió 7.0 sense reemplaçament
     */
    public static function getSearchDisplayedCharactersNumber()
    {
        return 200;
    }
}
