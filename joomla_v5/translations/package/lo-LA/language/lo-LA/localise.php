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
 * lo_LA localise class.
 *
 * @since  1.6
 */
abstract class Lo_LALocalise
{
    /**
     * ສົ່ງຄືນຄຳຕໍ່ທ້າຍທີ່ເປັນໄປໄດ້ສຳລັບຈຳນວນລາຍການທີ່ລະບຸ
     *
     * @param   integer  $count  ຈຳນວນລາຍການ.
     *
     * @return  array  ອາເຣຂອງສ່ວນທ້າຍທີ່ເປັນໄປໄດ້.
     *
     * @since   1.6
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
