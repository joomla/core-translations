<?php

/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt

 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps

 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * sv-SE localise class.
 *
 * @since  1.6
 */
abstract class Sv_SELocalise
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
        } elseif ($count == 1) {
            return ['ONE', '1'];
        } else {
            return ['ÖVRIGT', 'MER'];
        }
    }

/**
		 * Returns the ignored search words
		 *
		 * @return 	array  An array of ignored search words.
		 * @since 	1.6
		 */
		public static function getIgnoredSearchWords()
		{
			$search_ignore = [];
			$search_ignore[] = "och";
			$search_ignore[] = "på";
			$search_ignore[] = "den";
			return $search_ignore;
		}
		/**
		 * Returns the lower length limit of search words
		 *
		 * @return	integer  The lower length limit of search words.
		 * @since	1.6
		 */
		public static function getLowerLimitSearchWord()
		{
			return 3;
		}
		/**
		 * Returns the upper length limit of search words
		 *
		 * @return	integer  The upper length limit of search words.
		 * @since	1.6
		 */
		public static function getUpperLimitSearchWord()
		{
			return 20;
		}
		/**
		 * Returns the number of chars to display when searching
		 *
		 * @return      integer  The number of chars to display when searching.
		 * @since      1.6
		 */
		public static function getSearchDisplayedCharactersNumber()
		{
			return 200;
		}

		/**
		 * This method processes a string and replaces all accented UTF-8 characters by unaccented
		 * ASCII-7 "equivalents"
		 *
		 * @param	string	$string	The string to transliterate
		 * @return	string	The transliteration of the string
		 * @since	1.6
		 */
		public static function transliterate($string)
		{
		$str = \Joomla\String\StringHelper:: strtolower($string);
		// Specific language transliteration.
		// This one is for latin 1, latin supplement , extended A, Cyrillic, Greek

		$glyph_array = [
		'a'		=>	'a, à, á, â, ã, ä, å, ā, ă, ą, ḁ, α, ά',
		'ae'	=>	'æ',
		'b'		=>	'β, б',
		'c'		=>	'c, ç, ć, ĉ, ċ, č, ћ, ц',
		'ch'	=>	'ч',
		'd'		=>	'ď, đ, Ð, д, ђ, δ, ð',
		'dz'	=>	'џ',
		'e'		=>	'e, è, é, ê, ë, ē, ĕ, ė, ę, ě, э, ε, έ',
		'f'		=>	'ƒ, ф',
		'g'		=>	'ğ, ĝ, ğ, ġ, ģ, г, γ',
		'h'		=>	'ĥ, ħ, Ħ, х',
		'i'		=>	'i, ì, í, î, ï, ı, ĩ, ī, ĭ, į, и, й, ъ, ы, ь, η, ή',
		'ij'	=>	'ĳ',
		'j'		=>	'ĵ, j',
		'ja'	=>	'я',
		'ju'	=>	'яю',
		'k'		=>	'ķ, ĸ, κ',
		'l'		=>	'ĺ, ļ, ľ, ŀ, ł, л, λ',
		'lj'	=>	'љ',
		'm'		=>	'μ, м',
		'n'		=>	'ñ, ņ, ň, ŉ, ŋ, н, ν',
		'nj'	=>	'њ',
		'o'		=>	'ò, ó, ô, õ, ø, ō, ŏ, ő, ö, ο, ό, ω, ώ',
		'oe'	=>	'œ',
		'p'		=>	'п, π',
		'ph'	=>	'φ',
		'ps'	=>	'ψ',
		'r'		=>	'ŕ, ŗ, ř, р, ρ, σ, ς',
		's'		=>	'ş, ś, ŝ, ş, š, с',
		'ss'	=>	'ß, ſ',
		'sh'	=>	'ш',
		'shch'	=>	'щ',
		't'		=>	'ţ, ť, ŧ, τ, т',
		'th'	=>	'θ',
		'u'		=>	'u, ù, ú, û, ü, ũ, ū, ŭ, ů, ű, ų, у',
		'v'		=>	'в',
		'w'		=>	'ŵ',
		'x'		=>	'χ, ξ',
		'y'		=>	'ý, þ, ÿ, ŷ',
		'z'		=>	'ź, ż, ž, з, ж, ζ'
		];

		foreach($glyph_array as $letter => $glyphs)
		{
			$glyphs = explode(',', $glyphs);
			$str = str_replace($glyphs, $letter, $str);
		}

		return $str;
		}
}
