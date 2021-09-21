<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
 * @copyright	Copyright (C) 2011 - 2021 JoomlaFarsi.com. All Rights Reserved.
 * @license    GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * fa-IR localise class.
 *
 * @since  1.6
 */
 jimport('joomla.utilities.date');
abstract class Fa_IRLocalise {
	
	public static function getPluralSuffixes($count) {
		if ($count == 0) {
			$return =  array('0');
		}
		elseif($count == 1) {
			$return =  array('ONE', '1');
		}
		else {
			$return = array('OTHER', 'MORE');
		}
		return $return;
	}
	
	public static function getIgnoredSearchWords() {
		$search_ignore = array();
		$search_ignore[] = "and";  //change here to fit
		$search_ignore[] = "in"; //change here to fit
		$search_ignore[] = "on"; //change here to fit
		return $search_ignore;
	}
	
	public static function getLowerLimitSearchWord() {
		return 3;
	}
	
	public static function getUpperLimitSearchWord() {
		return 20;
	}
	
	public static function getSearchDisplayedCharactersNumber() {
		return 200;
	}
}
	

class fa_IRDate extends JDate {
	const DAY_NUMBER	= "\x027\x03";
	const DAY_NUMBER2	= "\x030\x03";
	const DAY_YEAR		= "\x032\x03";
	const MONTH_ABBR	= "\x033\x03";
	const MONTH_NAME	= "\x034\x03";
	const MONTH_NUMBER	= "\x035\x03";
	const MONTH_NUMBER2	= "\x036\x03";
	const MONTH_LENGTH	= "\x037\x03";
	const YEAR_ABBR		= "\x040\x03";
	const YEAR_NAME		= "\x041\x03";
	const AM_LOWER		= "\x042\x03";
	const AM_UPPER		= "\x043\x03";
	const PERSIAN_EPOCH	= 1948320.5;

	protected static $month_names	= array("فروردين","ارديبهشت","خرداد","تیر","مرداد","شهریور","مهر","آبان","آذر","دی","بهمن","اسفند");


	
	public function calendar($format, $local = false, $translate = true)
	{
		// Do string replacements for date format options that can be translated.
		$format = preg_replace('/(^|[^\\\])d/', "\\1".self::DAY_NUMBER2, $format);
		$format = preg_replace('/(^|[^\\\])j/', "\\1".self::DAY_NUMBER, $format);
		$format = preg_replace('/(^|[^\\\])z/', "\\1".self::DAY_YEAR, $format);
		$format = preg_replace('/(^|[^\\\])M/', "\\1".self::MONTH_ABBR, $format);
		$format = preg_replace('/(^|[^\\\])F/', "\\1".self::MONTH_NAME, $format);
		$format = preg_replace('/(^|[^\\\])n/', "\\1".self::MONTH_NUMBER, $format);
		$format = preg_replace('/(^|[^\\\])m/', "\\1".self::MONTH_NUMBER2, $format);
		$format = preg_replace('/(^|[^\\\])t/', "\\1".self::MONTH_LENGTH, $format);
		$format = preg_replace('/(^|[^\\\])y/', "\\1".self::YEAR_ABBR, $format);
		$format = preg_replace('/(^|[^\\\])Y/', "\\1".self::YEAR_NAME, $format);
		$format = preg_replace('/(^|[^\\\])a/', "\\1".self::AM_LOWER, $format);
		$format = preg_replace('/(^|[^\\\])A/', "\\1".self::AM_UPPER, $format);

		// Format the date.
		$return = parent::calendar($format, $local);

		$jd = gregoriantojd($this->month, $this->day, $this->year);
		$jalaliDate = self::jd_to_persian($jd);
		$m = $jalaliDate['mon'];
		$d = $jalaliDate['day'];
		$y = $jalaliDate['year'];

		// Manually modify the strings in the formated time.
		if (strpos($return, self::DAY_NUMBER) !== false) {
			$return = str_replace(self::DAY_NUMBER, $d , $return);
		}
		if (strpos($return, self::DAY_NUMBER2) !== false) {
			$return = str_replace(self::DAY_NUMBER2, sprintf("%02d",$d), $return);
		}
		if (strpos($return, self::DAY_YEAR) !== false) {
			$return = str_replace(self::DAY_YEAR, $jd - self::persian_to_jd(1,1,$y)+1, $return);
		}
		if (strpos($return, self::MONTH_ABBR) !== false) {
			$return = str_replace(self::MONTH_ABBR, self::$month_names[$m-1] , $return);
		}
		if (strpos($return, self::MONTH_NAME) !== false) {
			$return = str_replace(self::MONTH_NAME, self::$month_names[$m-1] , $return);
		}
		if (strpos($return, self::MONTH_NUMBER) !== false) {
			$return = str_replace(self::MONTH_NUMBER, $m , $return);
		}
		if (strpos($return, self::MONTH_NUMBER2) !== false) {
			$return = str_replace(self::MONTH_NUMBER2, sprintf("%02d", $m) , $return);
		}
		if (strpos($return, self::MONTH_LENGTH) !== false) {
			//$return = str_replace(self::MONTH_LENGTH, $m < 7 ? 31 : $m < 12 ? 30 : self::leap_persian($y) ? 30 : 29 , $return);
			$return = str_replace(self::MONTH_LENGTH, ($m < 7 ? 31 : (($m < 12 ? 30 : self::leap_persian($y)) ? 30 : 29)) , $return);
		}
		if (strpos($return, self::YEAR_ABBR) !== false) {
			$return = str_replace(self::YEAR_ABBR, sprintf("%02d",$y % 100), $return);
		}
		if (strpos($return, self::YEAR_NAME) !== false) {
			$return = str_replace(self::YEAR_NAME, $y, $return);
		}
		if (strpos($return, self::AM_LOWER) !== false) {
			$return = str_replace(self::AM_LOWER, $this->format('a',$local)=='pm' ? 'ب ظ' : 'ق ظ', $return);
		}
		if (strpos($return, self::AM_UPPER) !== false) {
			$return = str_replace(self::AM_UPPER, $this->format('a',$local)=='pm' ? 'ب ظ' : 'ق ظ', $return);
		}

		return $return;
	}
	public static function jd_to_persian($jd)

	{

		//var $year, $month, $day, $depoch, $cycle, $cyear, $ycycle,

		//    $aux1, $aux2, $yday;



		$jd = floor($jd) + 0.5;



		$depoch = $jd - self::persian_to_jd(1, 1, 475);

		$cycle = floor($depoch / 1029983);

		$cyear = $depoch % 1029983;

		if ($cyear == 1029982) {

		    $ycycle = 2820;

		} else {

		    $aux1 = floor($cyear / 366);

		    $aux2 = $cyear % 366;

		    $ycycle = floor(((2134 * $aux1) + (2816 * $aux2) + 2815) / 1028522) +

		                $aux1 + 1;

		}

		$year = $ycycle + (2820 * $cycle) + 474;

		if ($year <= 0) {

		    $year--;

		}

		$yday = ($jd - self::persian_to_jd(1, 1, $year)) + 1;

		$month = ($yday <= 186) ? ceil($yday / 31) : ceil(($yday - 6) / 30);

		$day = ($jd - self::persian_to_jd($month, 1, $year)) + 1;

		return array('year'=>$year, 'mon'=>$month,'day'=> $day);

	}
	public static function persian_to_jd($month, $day, $year)

	{

		//var $epbase, $epyear;

		$epbase = $year - (($year >= 0) ? 474 : 473);

		$epyear = 474 + $epbase % 2820;



		return $day +

		        (($month <= 7) ?

		            (($month - 1) * 31) :

		            ((($month - 1) * 30) + 6)

		        ) +

		        floor((($epyear * 682) - 110) / 2816) +

		        ($epyear - 1) * 365 +

		        floor($epbase / 2820) * 1029983 +

		        self::PERSIAN_EPOCH;

	}

	public static function leap_persian($year) {

	    return (((((($year - (($year > 0) ? 474 : 473)) % 2820) + 474) + 38) * 682) % 2816) < 682;

	}

}
