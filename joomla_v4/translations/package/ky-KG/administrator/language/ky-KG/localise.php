<?php
/**
 * @package    Joomla.Language
 *
 * @copyright  (C) 2011 Open Source Matters, Inc. <https://www.joomla.org>
 * @license    GNU Жалпы Коомдук Лицензиясы 2 же андан кийинки нускасы; LICENSE.txt бөлүмүн караңыз.
 */

defined('_JEXEC') or die;

/**
 * ky-KG localise class.
 *
 * @since  1.6
 */
abstract class ky_KGLocalise
{
	/**
	 * Белгилүү бир сандагы элементтер үчүн потенциалдуу суффикстерди кайтарат.
	 *
	 * @param   integer  $count  Элементтердин саны.
	 *
	 * @return  array  Потенциалдуу суффикстердин массиви.
	 *
	 * @since   1.6
	 */
	коомдук статикалык функция getPluralSuffixes($count)
	{
		эгер ($count == 0)
		{
			return array('0');
		}
		антпесе ($count == 1)
		{
			return array('БИР', '1');
		}
		дагы
		{
			return array('БАШКА', 'ДАГЫ');
		}
	}

	/**
	 * Этибарга алынбаган издөө сөздөрүн кайтарат
	 *
	 * @return  array  Изделбеген сөздөрдүн массиви.
	 *
	 * @since   1.6
	 */
	коомдук статикалык функция getIgnoredSearchWords()
	{
		return array('and', 'in', 'on');
	}

	/**
	 * Издөө сөзүнүн узактыгынын төмөнкү чегин кайтарып берет.
	 *
	 * @return  integer  Издөө сөздөрүнүн төмөнкү узундуктагы чеги.
	 *
	 * @since   1.6
	 */
	коомдук статикалык функция getLowerLimitSearchWord()
	{
		return 3;
	}

	/**
	 * Издөө сөзүнүн узактыгынын жогорку чегин кайтарып берет
	 *
	 * @return  integer  Издөө сөзүнүн узактыгынын жогорку чеги.
	 *
	 * @since   1.6
	 */
	коомдук статикалык функция getUpperLimitSearchWord()
	{
		return 20;
	}

	/**
	 * Издөөгө көрсөтүлө турган белгилердин санын кайтарат.
	 *
	 * @return  integer  Издөөдө көрсөтүлгөн белгилердин саны.
	 *
	 * @since   1.6
	 */
	коомдук стат. функция getSearchDisplayedCharactersNumber()
	{
		return 200;
	}
}
