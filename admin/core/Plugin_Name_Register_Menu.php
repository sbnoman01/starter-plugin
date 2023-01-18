<?php
namespace AuthorName\PluginName\admin\core;
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
class Plugin_Name_Register_Menu{

    public $post_type;

    /**
     * Class constructor
     */
    public function __construct() {
        $this->post_type='plugin-demo';
    }

    /**
     * Create Menu pages Under post Type: Admin Menu Page
     * @return void
     */
    public function plugin_name_create_menu_page(){

        $createOptionsSupport = apply_filters( 'plugin_name_create_options', 'edit_posts', 'plugin_name_roles' );

        $hookCreate = add_menu_page( esc_html__('Demo Plugin','plugin-name-demo'),esc_html__('Demo Plugin','plugin-name-demo'), $createOptionsSupport, 'plugin-demo-admin', array( $this, 'plugin_name_list' ) );
        add_action('load-' . $hookCreate, array( $this, 'screen_options' ) );

        //Sub menu added
        add_submenu_page( 'plugin-demo-admin', esc_html__('All Demo Plugin','plugin-name-demo'), esc_html__('Dashboard','plugin-name-demo'), $createOptionsSupport, 'plugin-demo-admin' );
        add_submenu_page( 'plugin-demo-admin', esc_html__('Add New', 'plugin-name-demo'),esc_html__('Add New Slider','plugin-name-demo'), $createOptionsSupport, 'post-new.php?post_type=plugin-demo');
        add_submenu_page( 'plugin-demo-admin', esc_html__('Help Center', 'plugin-name-demo'),esc_html__('Help Center','plugin-name-demo'), $createOptionsSupport, 'help-center',array( $this, 'help_center' ));
    }


    public function help_center(){

    }

    public function plugin_name_list(){

    }


    /*---------Screen----------*/
    public function screen_options(){
        $option = 'per_page';
        $args = array(
            'label' => esc_html__('Number of plugin demo','plugin-name-demo'),
            'default' => 10,
            'option' => 'plugin_demo_per_page'
        );

        self::add_screen_option( $option, $args );
    }

    /**
     * Register and configure an admin screen option
     * @param string $option An option name.
     * @param mixed  $args   Option-dependent arguments.
     */
    function add_screen_option( $option, $args = array() ) {

        $current_screen = self::get_current_screen();

        if ( ! $current_screen ) {
            return;
        }

        $current_screen->add_option( $option, $args );
    }

    function get_current_screen() {
        global $current_screen;

        if ( ! isset( $current_screen ) ) {
            return null;
        }

        return $current_screen;
    }
}
?>