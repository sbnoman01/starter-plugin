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
class Plugin_Name_PostType{

    public $post_type;

    /**
     * Class constructor
     */
    public function __construct() {
        $this->post_type='plugin-demo';
    }

    public function plugin_name_create_post_type(){


        //Define Role
        $createOptionsSupport = apply_filters( 'plugin_name_create_options', 'edit_posts', 'plugin_name_roles' );

        $labels = array(
            'name'                => esc_html__('Plugin Name Demo','plugin-name-demo'),
            'singular_name'       => esc_html__('Plugin Name Demo','plugin-name-demo'),
            'add_new'             => esc_html__( 'Add New','plugin-name-demo' ) ,
            'add_new_item'        => esc_html__( 'Add New', 'plugin-name-demo' ),
            'edit_item'           => esc_html__( 'Edit', 'plugin-name-demo' ),
            'new_item'            => esc_html__( 'New', 'plugin-name-demo' ),
            'view_item'           => esc_html__( 'View', 'plugin-name-demo' ),
            'search_items'        => esc_html__( 'Search', 'plugin-name-demo'),
            'not_found'           => esc_html__( 'No Plugin Name Demo is found', 'plugin-name-demo'),
            'not_found_in_trash'  => esc_html__( 'No Plugin Name Demo is found in Trash', 'plugin-name-demo'),
            'menu_name'           => esc_html__('Plugin Name Demo','plugin-name-demo'),
        );
        $args = array(
            'labels'              => $labels,
            'hierarchical'        => false,
            'description'         => '',
            'taxonomies'          => array( '' ),
            'public'              => false,
            'show_ui'             => true,
            'show_in_menu'        => 'plugin-demo',
            'show_in_admin_bar'   => $createOptionsSupport,
            'show_in_rest'        => false,
            'menu_position'       => 80,
            'show_in_nav_menus'   => false,
            'publicly_queryable'  => false,
            'exclude_from_search' => true,
            'has_archive'         => false,
            'query_var'           => true,
            'can_export'          => true,
            'rewrite'             => '',
            'capability_type'     => 'post',
            'supports'            => array( 'title' ),
        );

        register_post_type( $this->post_type, $args );
    }
}
?>