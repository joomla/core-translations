<?php
/**
 * @package	Joomla.Language
 *
 * @copyright	(C) 2005 - 2021 Open Source Matters, Inc. <https://www.joomla.org>
 * @license	GNU General Public License version 2 or later; see LICENSE.txt

 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps
 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * be-BY localise class.
 *
 * @since  1.6
 */
* @since 1.6
 */
abstract class Be_BYLocalise
{
	/**
	 * Returns the potential suffixes for a specific number of items
	 *
	 * @param   integer  $count  The number of items
	 *
	 * @return  array  An array of potential suffixes
	 *
	 * @since   1.6
	 */
	public static function getPluralSuffixes($count)
	{
		if ($count == 0)
		{
			$return = array('0');

		} else {
			$return = array(($count%10==1 && $count%100!=11 ? '1' : ($count%10>=2 && $count%10<=4 && ($count%100<10 || $count%100>=20)? '2' : 'MORE')));

		}

		return $return;
	}

	public static function transliterate($string)
	{
		$str = StringHelper::strtolower($string);

$glyph_array = array(
			'a' => 'а',
			'b' => 'б',
			'v' => 'в',
			'g' => 'г,ґ',
			'd' => 'д',
			'e' => 'е,є,э',
			'jo' => 'ё',
			'zh' => 'ж',
			'z' => 'з',
			'i' => 'и,і',
			'ji' => 'ї',
			'j' => 'й',
			'k' => 'к',
			'l' => 'л',
			'm' => 'м',
			'n' => 'н',
			'o' => 'о',
			'p' => 'п',
			'r' => 'р',
			's' => 'с',
			't' => 'т',
			'u' => 'у,ў',
			'f' => 'ф',
			'kh' => 'х',
			'ts' => 'ц',
			'ch' => 'ч',
			'sh' => 'ш',
			'shch' => 'щ',
			'' => 'ъ',
			'y' => 'ы',
			'' => 'ь',
			'yu' => 'ю',
			'ya' => 'я',
		);


		foreach ($glyph_array as $letter => $glyphs)
		{
			$glyphs = explode(',', $glyphs);
			$str = StringHelper::str_ireplace($glyphs, $letter, $str);
		}

		$str = preg_replace('#\&\#?[a-z0-9]+\;#ismu', '', $str);

		return $str;
	}
}
