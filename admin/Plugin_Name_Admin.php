<?php
namespace AuthorName\PluginName\admin;
use AuthorName\PluginName\admin\core\Plugin_Name_Create_Metabox;
use AuthorName\PluginName\admin\core\Plugin_Name_PostType;
use AuthorName\PluginName\admin\core\Plugin_Name_Register_Menu;

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/admin
 * @author     Your Name <email@example.com>
 */
class Plugin_Name_Admin {

    public static $_instance_metafield;
    public  $post_type_object;
    public  $register_menu_object;

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name  = $plugin_name;
		$this->version      = $version;

        $this->post_type_object         =new Plugin_Name_PostType();
        $this->register_menu_object     =new Plugin_Name_Register_Menu();

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/plugin-name-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/plugin-name-admin.js', array( 'jquery' ), $this->version, false );

	}

    /**
     * Register custom post type.
     *
     * @since	1.0.1
     */
    public function plugin_name_register_post_type(){
        $this->post_type_object->plugin_name_create_post_type();
    }

    /**
     * Register All Menu Options.
     *
     * @since	1.0.1
     */
    public function plugin_name_register_all_menu(){
        $this->register_menu_object->plugin_name_create_menu_page();
    }

    public function plugin_name_metafield_instance(){
        if( is_null( self::$_instance_metafield ) ) {
           self::$_instance_metafield = new Plugin_Name_Create_Metabox();
        }
        return self::$_instance_metafield;
    }

}
