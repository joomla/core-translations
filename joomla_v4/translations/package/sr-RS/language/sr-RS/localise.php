<?php

/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt

 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps

 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */



/**
 * sr-Cyrl-RS класа за локализацију.
 *
 * @почев од верзије  1.6
 */
abstract class Sr_RSLocalise
{
    /**
     * Враћа потенцијалне суфиксе за специфични број ставки
     *
     * @param   integer  $count  Број ставки.
     *
     * @return  array Веза потенцијалних суфикса.
     *
     * @@почев од верзије  1.6
     */
    public static function getPluralSuffixes($count)
    {
        if ($count == 0) {
            return array('0');
        } elseif ($count == 1) {
            return array('ONE', '1');
        } else {
            return array('OTHER', 'MORE');
        }
    }
}
