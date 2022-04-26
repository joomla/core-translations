<?php
/**
 * @paket    Joomla.Jezik
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License verzija 2 ili novija; pogledaj LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * sr-Latn-RS klasa za lokalizaciju.
 *
 * @počev od verzije  1.6
 */
abstract class sr_Latn_RSLocalise
{
	/**
	 * Vraća potencijalne sufikse za specifični broj stavki
	 *
	 * @param   integer  $count  Broj stavki.
	 *
	 * @return  array  Niz potencijalnih sufiksa.
	 *
	 * @počev od   1.6
	 */
	public static function getPluralSuffixes($count)
	{
		if ($count == 0)
		{
			return array('0');
		}
		elseif ($count == 1)
		{
			return array('ONE', '1');
		}
		else
		{
			return array('OTHER', 'MORE');
		}
	}
}
