<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://ryansoeder.github.io/
 * @since      1.0.0
 *
 * @package    Cpt_Event
 * @subpackage Cpt_Event/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Cpt_Event
 * @subpackage Cpt_Event/admin
 * @author     Ryan Soeder <mr.soeder@gmail.com>
 */
class Cpt_Event_Admin {

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

		$this->plugin_name = $plugin_name;
		$this->version = $version;

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
		 * defined in Cpt_Event_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cpt_Event_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/cpt-event-admin.css', array(), $this->version, 'all' );

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
		 * defined in Cpt_Event_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Cpt_Event_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/cpt-event-admin.js', array( 'jquery' ), $this->version, false );

	}
	
	// register cpt Event
	function event() {
        $labels = [
            'name'                  => _x('Events', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Event', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Events', 'text_domain'),
            'name_admin_bar'        => __('Events', 'text_domain'),
            'archives'              => __('Item Archives', 'text_domain'),
            'attributes'            => __('Item Attributes', 'text_domain'),
            'parent_item_colon'     => __('Parent Event:', 'text_domain'),
            'all_items'             => __('All Events', 'text_domain'),
            'add_new_item'          => __('Add New Event', 'text_domain'),
            'add_new'               => __('Add Event', 'text_domain'),
            'new_item'              => __('New Event', 'text_domain'),
            'edit_item'             => __('Edit Event', 'text_domain'),
            'update_item'           => __('Update Event', 'text_domain'),
            'view_item'             => __('View Event', 'text_domain'),
            'view_items'            => __('View Events', 'text_domain'),
            'search_items'          => __('Search Events', 'text_domain'),
            'not_found'             => __('Not found', 'text_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
            'featured_image'        => __('Featured Image', 'text_domain'),
            'set_featured_image'    => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image'    => __('Use as featured image', 'text_domain'),
            'insert_into_item'      => __('Insert into item', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this item', 'text_domain'),
            'items_list'            => __('Items list', 'text_domain'),
            'items_list_navigation' => __('Items list navigation', 'text_domain'),
            'filter_items_list'     => __('Filter items list', 'text_domain'),
        ];
        $args = [
            'label'                 => __('Events', 'text_domain'),
            'description'           => __('A collection of events', 'text_domain'),
            'labels'                => $labels,
            'supports'              => [ 'title' ],
            'taxonomies'            => [  ],
            'hierarchical'          => false,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 20,
            'menu_icon'             => 'dashicons-format-chat',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
        ];
        register_post_type('event', $args);
    }

    // Register Custom Taxonomy for Events
    function event_categories() {
        $labels = [
            'name'                       => _x('Event Categories', 'Taxonomy General Name', 'text_domain'),
            'singular_name'              => _x('Event Category', 'Taxonomy Singular Name', 'text_domain'),
            'menu_name'                  => __('Event Category', 'text_domain'),
            'all_items'                  => __('All Items', 'text_domain'),
            'parent_item'                => __('Parent Item', 'text_domain'),
            'parent_item_colon'          => __('Parent Item:', 'text_domain'),
            'new_item_name'              => __('New Item Name', 'text_domain'),
            'add_new_item'               => __('Add New Item', 'text_domain'),
            'edit_item'                  => __('Edit Item', 'text_domain'),
            'update_item'                => __('Update Item', 'text_domain'),
            'view_item'                  => __('View Item', 'text_domain'),
            'separate_items_with_commas' => __('Separate items with commas', 'text_domain'),
            'add_or_remove_items'        => __('Add or remove items', 'text_domain'),
            'choose_from_most_used'      => __('Choose from the most used', 'text_domain'),
            'popular_items'              => __('Popular Items', 'text_domain'),
            'search_items'               => __('Search Items', 'text_domain'),
            'not_found'                  => __('Not Found', 'text_domain'),
            'no_terms'                   => __('No items', 'text_domain'),
            'items_list'                 => __('Items list', 'text_domain'),
            'items_list_navigation'      => __('Items list navigation', 'text_domain'),
        ];
        $args = [
            'labels'                     => $labels,
            'hierarchical'               => true,
            'public'                     => true,
            'show_ui'                    => true,
            'show_admin_column'          => true,
            'show_in_nav_menus'          => true,
            'show_tagcloud'              => true,
        ];
        register_taxonomy('event_categories', [ 'event' ], $args);
    }

	// Throw an error if ACF is not installed
	public function acf_notice_error() {
		if(  !class_exists('acf')  ) {
			$class = 'notice notice-error';
			$message = __( 'CPT Portfolio - <a href="https://wordpress.org/plugins/advanced-custom-fields/" target="_blank">Advanced Custom Fields</a> must be installed', 'sample-text-domain' );

			printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), $message ); 
		}
	}

}
