<?php

/**
 * @package    Joomla.Language
 *
 * @Direitos reservados  (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
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
 * pt-BR localise class.
 *
 * @since  1.6
 */
abstract class Pt_BRLocalise
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

        if ($count == 1) {
            return ['ONE', '1'];
        }

        return ['OTHER', 'MORE'];
    }

    /**
     * Returns the ignored search words
     *
     * @return  array  An array of ignored search words.
     *
     * @since   1.6
     *
     * @deprecated  5.1 será removido em 7.0 sem reposição
     */
    public static function getIgnoredSearchWords()
    {
        return ['e', 'de', 'se', 'por', 'nem', 'ou', 'mas', 'em'];
    }

    /**
     * Returns the lower length limit of search words
     *
     * @return  integer  The lower length limit of search words.
     *
     * @since   1.6
     *
     * @deprecated  5.1 será removido em 7.0 sem reposição
     */
    public static function getLowerLimitSearchWord()
    {
        return 3;
    }

    /**
     * Returns the upper length limit of search words
     *
     * @return  integer  The upper length limit of search words.
     *
     * @since   1.6
     *
     * @deprecated  5.1 será removido em 7.0 sem reposição
     */
    public static function getUpperLimitSearchWord()
    {
        return 20;
    }

    /**
     * Returns the number of chars to display when searching
     *
     * @return  integer  The number of chars to display when searching.
     *
     * @since   1.6
     *
     * @deprecated  5.1 será removido em 7.0 sem reposição
     */
    public static function getSearchDisplayedCharactersNumber()
    {
        return 200;
    }
}
