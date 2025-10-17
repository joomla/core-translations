<?php

/**
 * @package    Joomla.Language
 *
 * @copyright Direitos de Autor (C) 2010 -  Open Source Matters, Inc. <https://www.joomla.org>
 * @license  Pública Geral GNU - versão 2 ou posterior; ver ficheiro LICENSE.txt
 *
 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
 *
 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * Pt-PT localise class.
 *
 * @since  1.6
 */
abstract class Pt_PTLocalise
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
                return ['0'];

            case 1:
                return ['ONE', '1'];
        }

        return ['OTHER', 'MORE'];
    }
}
