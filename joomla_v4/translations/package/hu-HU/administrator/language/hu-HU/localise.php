<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * en-GB localise class.
 *
 * @since  1.6
 */
abstract class hu_HULocalise
{
	/**
	 * Returns the potential suffixes for a specific number of items
	 *
	 * @param   integer  $count  The number of items.
	 *
	 * @return	array  An array of potential suffixes.
	 *
	 * @since	1.6
	 */
	public static function getPluralSuffixes($count)
    {
		if ($count == 0)
        {
			return array('0');
		}
		elseif($count == 1)
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
	 * @return	array  An array of ignored search words.
	 *
	 * @since	1.6
	 */
	public static function getIgnoredSearchWords()
    {
		return array('aki', 'amely', 'ami', 'és', 'is', 'itt', 'lesz', 'mert', 'miért', 'mivel', 'ott', 'vagy');
	}

	/**
	 * Returns the lower length limit of search words
	 *
	 * @return	integer  The lower length limit of search words.
	 *
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
	 *
	 * @since	1.6
	 */
	public static function getUpperLimitSearchWord()
    {
		return 20;
	}

	/**
	 * Returns the number of chars to display when searching
	 *
	 * @return	integer  The number of chars to display when searching.
	 *
	 * @since	1.6
	 */
	public static function getSearchDisplayedCharactersNumber()
    {
		return 200;
	}

	/**
    * This method processes a string and replaces all accented UTF-8 characters by unaccented
    * ASCII-7 "equivalents"
    *
    * @param       string  $string The string to transliterate
    * @return      string  The transliteration of the string
    * @since       1.6
    */
    public static function transliterate($string)
    {
        $str = JString:: strtolower($string);

        //Specific language transliteration.
        //This one is for latin 1, latin supplement , extended A, Cyrillic, Greek

        $glyph_array = array(
        'a'            =>   'á',
        'e'            =>   'é',
        'i'            =>   'í',
        'o'            =>   'ó, ö, ő',
        'u'            =>   'ú, ü, ű',
    );
 
    foreach( $glyph_array as $letter => $glyphs ) {
        $glyphs = explode( ',', $glyphs );
        $str = str_replace( $glyphs, $letter, $str );
    }
 
        return $str;
    }
}
