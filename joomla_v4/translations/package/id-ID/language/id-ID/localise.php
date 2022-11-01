/**
  * @paket Joomla.Language
  *
  * @copyright (C) 2010 Open Source Matters, Inc. <https://www.joomla.org>
  * @lisensi GNU General Public License versi 2 atau lebih baru; lihat LISENSI.txt

 * @phpcs:disable Squiz.Classes.ValidClassName.NotCamelCaps

 * @phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace
 */

// phpcs:disable PSR1.Files.SideEffects
\defined('_JEXEC') or die;
// phpcs:enable PSR1.Files.SideEffects

/**
 * id-ID localise class.
 *
 * @since  1.6
 */
abstract class Id_IDLocalise
{
    /**
     * Mengembalikan sufiks potensial untuk sejumlah item tertentu
     *
     * @param integer $count Jumlah item
     *
     * @return array Array sufiks potensial.
     *
     * @Sejak 1.6
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
