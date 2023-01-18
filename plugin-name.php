<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://example.com
 * @since             1.0.0
 * @package           Plugin_Name
 *
 * @wordpress-plugin
 * Plugin Name:       WordPress Plugin Boilerplate
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Your Name or Your Company
 * Author URI:        http://example.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The main plugin class
 */
use AuthorName\PluginName\Plugin_Name_Activator;
use AuthorName\PluginName\Plugin_Name_Deactivator;
use AuthorName\PluginName\Plugin_Name;

final class Plugin_Name_Init{

    /**
     * The ID of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_name    The ID of this plugin.
     */
    private $initPluginName='PLUGIN_NAME';

    /**
     * Currently plugin version.
     * Start at version 1.0.0 and use SemVer - https://semver.org
     * Rename this for your plugin and update it as you release new versions.
     * @var string
     */
    const version = '1.0';

    /**
     * Class construcotr
     */
    private function __construct() {
        $this->define_constants();

        register_activation_hook( __FILE__, [ $this, 'activated_plugin_name' ] );

        register_deactivation_hook( __FILE__, [ $this, 'deactivated_plugin_name' ] );

        add_action( 'plugins_loaded', [ $this, 'init_plugin' ] );
    }


    /**
     * Initializes a singleton instance
     *
     * @return \Plugin_Name_Init
     */
    public static function init() {
        static $instance = false;

        if ( ! $instance ) {
            $instance = new self();
        }

        return $instance;
    }

    /**
     * Define the required plugin constants
     *
     * @return void
     */
    public function define_constants() {
        define( 'PLUGIN_NAME_VERSION', self::version );
        define( 'PLUGIN_NAME_FILE', __FILE__ );
        define('PLUGIN_NAME_PATH', __DIR__ );
        define( 'PLUGIN_NAME_URL', plugins_url( '', PLUGIN_NAME_FILE) );
        define( 'PLUGIN_NAME_DIR_ROOT', plugin_dir_path( __FILE__ ) );
        define( 'PLUGIN_NAME_ADMIN_DIR', PLUGIN_NAME_DIR_ROOT . 'admin/' );
        define( 'PLUGIN_NAME_PUBLIC_DIR',PLUGIN_NAME_DIR_ROOT. 'frontend/' );
        define( 'PLUGIN_NAME_PUBLIC_ASSETS',PLUGIN_NAME_URL . '/frontend/assets' );
        define( 'PLUGIN_NAME_ADMIN_ASSETS',PLUGIN_NAME_URL . '/admin/assets/' );
        define( 'PLUGIN_NAME_ADMIN_ROLE','admin' );
        define( 'PLUGIN_NAME_PUBLIC_ROLE','public' );
    }

    /**
     * The code that runs during plugin activation.
     * This action is documented in includes/class-plugin-name-activator.php
     */
    public function activated_plugin_name() {
        new Plugin_Name_Activator();
    }

    /**
     * The code that runs during plugin deactivation.
     * This action is documented in includes/class-plugin-name-deactivator.php
     */
    function deactivated_plugin_name() {
        new Plugin_Name_Deactivator();
    }

    /**
     * Initialize the plugin for admin panel and public panel
     *
     * @return void
     */
    public function init_plugin() {
        new Plugin_Name($this->initPluginName,self::version);

    }
}

/**
 * Initializes the main plugin
 *
 * @return \Plugin_Name_Init
 */
function plugin_name_init() {

    return Plugin_Name_Init::init();

}

/*-- kick-off the plugin----*/
plugin_name_init();
