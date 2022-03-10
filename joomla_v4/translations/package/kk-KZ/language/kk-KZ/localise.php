defined('_JEXEC') or die; /** * kk_KZ localise class. * * @since 1.6 */
abstract class kk_KZLocalise { /** * Returns the potential suffixes for a specific number of items * * @param integer $count The number of items. * * @return array An array of potential suffixes. * * @since 1.6 */ public static function getPluralSuffixes($count) { if ($count == 0) { return array('0'); } elseif ($count == 1) { return array('ONE', '1'); } else { return array('OTHER', 'MORE'); } } }

defined('_JEXEC') or die;

/**
 * kk_KZ localise class.
 *
 * @since  1.6
 */
abstract class En_GBLocalise
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
}
