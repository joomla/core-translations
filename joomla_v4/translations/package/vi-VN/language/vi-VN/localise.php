<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * en-GB localise class.
 *
 * @since  1.6
 */
abstract class vi_VNLocalise 
{
	/**
	 * Returns the potential suffixes for a specific number of items
	 *
	 * @param   int  $count  The number of items.
	 *
	 * @return  array  An array of potential suffixes.
	 *
	 * @since   1.6
	 */
	public static function getPluralSuffixes($count) 
	{
		if ($count == 0) 
		{
			$return = array('0');
		}
		elseif($count == 1) 
		{
			$return = array('1');
		}
		else
		{
			$return = array('MORE');
		}
		return $return;
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
		$search_ignore = array();
		$search_ignore[] = "and";
		$search_ignore[] = "in";
		$search_ignore[] = "on";
		return $search_ignore;
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
   * 
   * @param type $string
   * @return type
   */
  public static function transliterate($string)
  {
    $str = strtolower($string);

    //Specific language transliteration.
    //This one is for latin 1, latin supplement , extended A, Cyrillic, Greek

    $glyph_array = array(
        'a' => 'á,à,ả,ã,ạ,À,Á,Ả,Ã,Ạ,â,ầ,ấ,ẩ,ẫ,ậ,Â,Ầ,Ấ,Ẩ,Ẫ,Ậ,ă,ằ,ắ,ẳ,ẳ,ặ',
        'd' => 'Ð,đ',
        'e' => 'è,é,ẻ,ẽ,ẹ,È,É,Ẻ,Ẽ,Ẹ,ê,ề,ế,ể,ễ,ệ,Ê,Ề,Ế,Ể,Ễ,Ệ',
        'i' => 'í,ì,ỉ,ĩ,ị,Ì,Í,Ỉ,Ĩ,Ị',
        'o' => 'ò,ó,ỏ,õ,ọ,ơ,ờ,ớ,ở,ỡ,ợ,Ò,Ó,Ỏ,Õ,Ọ,Ơ,Ờ,Ớ,Ở,Ỡ,Ợ,ô,ồ,ố,ổ,ỗ,ộ,Ồ,Ố,Ổ,Ỗ,Ổ,Ộ',
        'u' => 'ù,ú,ủ,ũ,ụ,Ù,Ú,Ủ,Ũ,ư,ừ,ứ,ử,ữ,ự,Ư,Ừ,Ứ,Ử,Ữ,Ự',
        'y' => 'ý,ỷ,ỳ,ỹ,ỵ,Ỹ,Ỷ,Ỵ,Ý,Ỳ'
    );

    foreach ($glyph_array as $letter => $glyphs)
    {
      $glyphs = explode(',', $glyphs);
      $str = str_replace($glyphs, $letter, $str);
    }

    return $str;
  }
}
