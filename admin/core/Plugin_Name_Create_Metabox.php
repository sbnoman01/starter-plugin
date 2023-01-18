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

class Plugin_Name_Create_Metabox{

    public $post_type;
    /**
     * Class constructor
     */
    public function __construct() {
        $this->post_type='plugin-demo';
    }

    public function plugin_name_add_meta_boxes(){
        add_meta_box('main_demo_metabox_id', esc_html__('Plugin Name Demo','plugin-name-demo'), [$this,'plugin_name_metabox_callback'], $this->post_type, 'normal', 'high');
    }

    public function plugin_name_save_metabox_value(){

    }

    /**
     * @return mixed
     */
    public  function plugin_name_metabox_callback($post)
    {
        if( ! function_exists( 'plugin_name_metafield_render' ) ) {
            require_once PLUGIN_NAME_ADMIN_DIR . 'views/plugin-name-type-metafield.php';
        }

        return plugin_name_metafield_render($post);
    }
}
?>