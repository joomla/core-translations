<?php

/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 *
 * @phpcs：禁用 Squiz.Classes.ValidClassName.NotCamelCaps
 *
 * @phpcs：禁用 PSR1.Classes.ClassDeclaration.MissingNamespace
 */

// phpcs:禁用 PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:启用 PSR1.Files.SideEffects

/**
 * zh-CN localise class.
 *
 * @since  1.6
 */
abstract class zh_CNLocalise
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
     * @deprecated  5.1 将在 7.0 移除且没有替代方式
     */
    public static function getIgnoredSearchWords()
    {
        return ['and', 'in', 'on'];
    }

    /**
     * Returns the lower length limit of search words
     *
     * @return  integer  The lower length limit of search words.
     *
     * @since   1.6
     *
     * @deprecated  5.1 将在 7.0 移除且没有替代方式
     */
    public static function getLowerLimitSearchWord()
    {
        return 2;
    }

    /**
     * Returns the upper length limit of search words
     *
     * @return  integer  The upper length limit of search words.
     *
     * @since   1.6
     *
     * @deprecated  5.1 将在 7.0 移除且没有替代方式
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
     * @deprecated  5.1 将在 7.0 移除且没有替代方式
     */
    public static function getSearchDisplayedCharactersNumber()
    {
        return 200;
    }
}
