<?php

/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open source matters, Inc. <https://www.joomla.org>
 * @license    Licença pública geral GNU versão 2 ou posterior; consulte LICENSE.txt

 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps

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
     * Retorna os sufixos potenciais para um número específico de itens
     *
     * @param   integer  $count  O número de itens.
     *
     * @return  array  Um arranjo de sufixos potenciais.
     *
     * @since   1.6
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
