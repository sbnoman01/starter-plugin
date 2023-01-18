<?php
namespace AuthorName\PluginName;
/**
 * Fired during plugin activation
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Activator {

    /**
     * Class constructor
     */
    public function __construct() {
        self::activate();
    }

	/**
	 * Do stuff upon plugin activation
	 *
     * @return void
	 *
	 * @since    1.0.0
	 */
	public static function activate() {
        $installed = get_option( 'plugin_name_installed' );

        if ( ! $installed ) {
            update_option( 'plugin_name_installed', time() );
        }

        update_option( 'wd_academy_version', PLUGIN_NAME_VERSION );
        add_option('redirect_status', true);
	}

}
