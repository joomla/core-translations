<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * th-TH localise class.
 *
 * @since  1.6
 */
abstract class Th_THLocalise
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

	/**
	 * Returns the ignored search words
	 *
	 * @return  array  An array of ignored search words.
	 *
	 * @since   1.6
	 */
	public static function getIgnoredSearchWords()
	{
		return array('and', 'in', 'on');
	}

	/**
	 * Returns the lower length limit of search words
	 *
	 * @return  integer  The lower length limit of search words.
	 *
	 * @since   1.6
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
		$str = \Joomla\String\StringHelper::strtolower($string);

		//Specific language transliteration.
		//This one is for latin 1, latin supplement , extended A, Cyrillic, Greek

		$glyph_array = array(
		'a'		=>	'à,á,â,ã,ä,å,ā,ă,ą,ḁ,α,ά',
		'ae'	=>	'æ',
		'b'		=>	'β,б',
		'c'		=>	'ç,ć,ĉ,ċ,č,ч,ћ,ц',
		'ch'	=>	'ч',
		'd'		=>	'ď,đ,Ð,д,ђ,δ,ð',
		'dz'	=>	'џ',
		'e'		=>	'è,é,ê,ë,ē,ĕ,ė,ę,ě,э,ε,έ',
		'f'		=>	'ƒ,ф',
		'g'		=>	'ğ,ĝ,ğ,ġ,ģ,г,γ',
		'h'		=>	'ĥ,ħ,Ħ,х',
		'i'		=>	'ì,í,î,ï,ı,ĩ,ī,ĭ,į,и,й,ъ,ы,ь,η,ή',
		'ij'	=>	'ĳ',
		'j'		=>	'ĵ',
		'ja'	=>	'я',
		'ju'	=>	'яю',
		'k'		=>	'ķ,ĸ,κ',
		'l'		=>	'ĺ,ļ,ľ,ŀ,ł,л,λ',
		'lj'	=>	'љ',
		'm'		=>	'μ',
		'n'		=>	'ñ,ņ,ň,ŉ,ŋ,н,ν',
		'nj'	=>	'њ',
		'o'		=>	'ò,ó,ô,õ,ø,ō,ŏ,ő,ο,ό,ω,ώ',
		'oe'	=>	'œ,ö',
		'p'		=>	'п,π',
		'ph'	=>	'φ',
		'ps'	=>	'ψ',
		'r'		=>	'ŕ,ŗ,ř,р,ρ,σ,ς',
		's'		=>	'ş,ś,ŝ,ş,š,с',
		'ss'	=>	'ß,ſ',
		'sh'	=>	'ш',
		'shch'	=>	'щ',
		't'		=>	'ţ,ť,ŧ,τ',
		'th'	=>	'θ',
		'u'		=>	'ù,ú,û,ü,ũ,ū,ŭ,ů,ű,ų,у',
		'v'		=>	'в',
		'w'		=>	'ŵ',
		'x'		=>	'χ,ξ',
		'y'		=>	'ý,þ,ÿ,ŷ',
		'z'		=>	'ź,ż,ž,з,ж,ζ'
		);

		foreach( $glyph_array as $letter => $glyphs ) {
			$glyphs = explode( ',', $glyphs );
			$str = str_replace( $glyphs, $letter, $str );
		}

		return $str;
	}
}

jimport('joomla.utilities.date');
class th_THDate extends JDate {
	const DAY_NUMBER	= "\x027\x03";
	const MONTH_NUMBER	= "\x035\x03";
	const YEAR_NUMBER		= "\x040\x03";
	const YEAR_NUMBER2		= "\x041\x03";
	const HOUR_NUMBER		= "\x042\x03";
	const MINUTE_NUMBER		= "\x043\x03";
	const SECOND_NUMBER		= "\x044\x03";
	const ORDINAL_NUMBER	= "\x045\x03";

	/**
	 * Gets the date as a formatted string.
	 *
	 * @param	string	The date format specification string (see {@link PHP_MANUAL#date})
	 * @param	boolean	True to return the date string in the local time zone, false to return it in GMT.
	 * @return	string	The date string in the french republican calendar (see @link{http://en.wikipedia.org/wiki/French_Republican_Calendar}).
	 * @since	1.6
	 */
	public function calendar($format, $local = false, $translate = true)
	{
		// Do string replacements for date format options that can be translated.
		$format = preg_replace('/(^|[^\\\])d/', "\\1".self::DAY_NUMBER, $format);
		$format = preg_replace('/(^|[^\\\])m/', "\\1".self::MONTH_NUMBER, $format);
		$format = preg_replace('/(^|[^\\\])Y/', "\\1".self::YEAR_NUMBER, $format);
		$format = preg_replace('/(^|[^\\\])y/', "\\1".self::YEAR_NUMBER2, $format);
		$format = preg_replace('/(^|[^\\\])H/', "\\1".self::HOUR_NUMBER, $format);
		$format = preg_replace('/(^|[^\\\])i/', "\\1".self::MINUTE_NUMBER, $format);
		$format = preg_replace('/(^|[^\\\])s/', "\\1".self::SECOND_NUMBER, $format);
		$format = preg_replace('/(^|[^\\\])S/', "\\1".self::ORDINAL_NUMBER, $format);

		// Format the date.
		$return = parent::calendar($format, $local);
		// convNumber : true = thai number , false = arabic number
		$convNumber = false;

		if (strpos($return, self::DAY_NUMBER) !== false) {
			$return = str_replace(self::DAY_NUMBER, $this->numToString($this->day, $convNumber), $return);
		}
		if (strpos($return, self::MONTH_NUMBER) !== false) {
			$return = str_replace(self::MONTH_NUMBER, $this->numToString($this->month, $convNumber), $return);
		}
		if (strpos($return, self::YEAR_NUMBER) !== false) {
			$return = str_replace(self::YEAR_NUMBER, $this->yearToString($this->year, $convNumber), $return);
		}
		if (strpos($return, self::YEAR_NUMBER2) !== false) {
			$return = str_replace(self::YEAR_NUMBER2, \Joomla\String\StringHelper::substr($this->yearToString($this->year, $convNumber), -2) , $return);
		}
		if (strpos($return, self::HOUR_NUMBER) !== false) {
			$return = str_replace(self::HOUR_NUMBER, $this->numToString($this->hour, $convNumber), $return);
		}
		if (strpos($return, self::MINUTE_NUMBER) !== false) {
			$return = str_replace(self::MINUTE_NUMBER, $this->numToString($this->minute, $convNumber), $return);
		}
		if (strpos($return, self::SECOND_NUMBER) !== false) {
			$return = str_replace(self::SECOND_NUMBER, $this->numToString($this->second, $convNumber), $return);
		}
		if (strpos($return, self::ORDINAL_NUMBER) !== false) {
			$return = str_replace(self::ORDINAL_NUMBER, $this->numToString($this->ordinal, $convNumber), $return);
		}

		return $return;
	}

	function monthToString($month, $abbr = false)
	{
		switch ($month)
		{
			case 1: return $abbr ? JText::_('JANUARY_SHORT')   : JText::_('JANUARY');
			case 2: return $abbr ? JText::_('FEBRUARY_SHORT')  : JText::_('FEBRUARY');
			case 3: return $abbr ? JText::_('MARCH_SHORT')     : JText::_('MARCH');
			case 4: return $abbr ? JText::_('APRIL_SHORT')     : JText::_('APRIL');
			case 5: return $abbr ? JText::_('MAY_SHORT')       : JText::_('MAY');
			case 6: return $abbr ? JText::_('JUNE_SHORT')      : JText::_('JUNE');
			case 7: return $abbr ? JText::_('JULY_SHORT')      : JText::_('JULY');
			case 8: return $abbr ? JText::_('AUGUST_SHORT')    : JText::_('AUGUST');
			case 9: return $abbr ? JText::_('SEPTEMBER_SHORT') : JText::_('SEPTEMBER');
			case 10: return $abbr ? JText::_('OCTOBER_SHORT')   : JText::_('OCTOBER');
			case 11: return $abbr ? JText::_('NOVEMBER_SHORT')  : JText::_('NOVEMBER');
			case 12: return $abbr ? JText::_('DECEMBER_SHORT')  : JText::_('DECEMBER');
		}
	}

	function yearToString($year, $abbr = false)
	{
		return $this->Convertnumber2thai($year+543,$abbr);
	}
	function numToString($date, $abbr = false)
	{
		return  $this->Convertnumber2thai($date,$abbr);
	}

	// Here convert to  number in Thai
	function Convertnumber2thai($result,$abbr = false)
	{
		 $thaiNumber = array ("๐", "๑", "๒", "๓", "๔", "๕", "๖", "๗","๘", "๙" );
		$org_result = $result;
		for ( $counter=0; $counter <= 9; $counter++) {	$result = str_replace($counter, $thaiNumber[$counter], $result);	}
		return $abbr ? $result : $org_result ;
	}
	// End convert number 2 thai

	function dayToString($day, $abbr = false)
	{
		switch ($day) {
			case 0: return $abbr ? JText::_('SUN') : JText::_('SUNDAY');
			case 1: return $abbr ? JText::_('MON') : JText::_('MONDAY');
			case 2: return $abbr ? JText::_('TUE') : JText::_('TUESDAY');
			case 3: return $abbr ? JText::_('WED') : JText::_('WEDNESDAY');
			case 4: return $abbr ? JText::_('THU') : JText::_('THURSDAY');
			case 5: return $abbr ? JText::_('FRI') : JText::_('FRIDAY');
			case 6: return $abbr ? JText::_('SAT') : JText::_('SATURDAY');
		}
	}
}
