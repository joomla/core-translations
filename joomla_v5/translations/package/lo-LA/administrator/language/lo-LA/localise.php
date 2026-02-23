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
 * lo_LA localise class.
 *
 * @since  1.6
 */
abstract class Lo_LALocalise
{
    /**
     * ສົ່ງຄ່າຄຳຕໍ່ທ້າຍທີ່ເປັນໄປໄດ້ສຳລັບຈຳນວນລາຍການທີ່ລະບຸ
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
     * ສົ່ງຄ່າຄຳສັບຄົ້ນຫາທີ່ຖືກຍົກເວັ້ນ
     *
     * @return  array  An array of ignored search words.
     *
     * @since   1.6
     *
     * @deprecated  5.1 will be removed in 7.0 without replacement
     */
    public static function getIgnoredSearchWords()
    {
        return ['ແລະ', 'ໃນ', 'ເທິງ'];
    }

    /**
     * ສົ່ງຄ່າຄວາມຍາວຂັ້ນຕ່ຳຂອງຄຳຄົ້ນຫາ
     *
     * @return  integer  The lower length limit of search words.
     *
     * @since   1.6
     *
     * @deprecated  5.1 will be removed in 7.0 without replacement
     */
    public static function getLowerLimitSearchWord()
    {
        return 3;
    }

    /**
     * ສົ່ງຄ່າຄວາມຍາວສູງສຸດຂອງຄຳຄົ້ນຫາ
     *
     * @return  integer  The upper length limit of search words.
     *
     * @since   1.6
     *
     * @deprecated  5.1 will be removed in 7.0 without replacement
     */
    public static function getUpperLimitSearchWord()
    {
        return 20;
    }

    /**
     * ສົ່ງຄ່າຈຳນວນຕົວອັກສອນທີ່ຈະສະແດງເມື່ອຄົ້ນຫາ
     *
     * @return  integer  The number of chars to display when searching.
     *
     * @since   1.6
     *
     * @deprecated  5.1 will be removed in 7.0 without replacement
     */
    public static function getSearchDisplayedCharactersNumber()
    {
        return 200;
    }
}
