<?php namespace WSUWP\Plugin\Newsletter;

class Newsletter_Post_Type {

	protected static $post_type = 'newsletter';

	protected static $key_prefix = 'wsuwp_newsletter_';


	public static function get( $property ) {

		switch( $property ) {

			case 'post_type':
				return self::$post_type;

			default:
				return '';

		}
	}


	public static function init() {

		add_action( 'init', array( __CLASS__, 'register_post_type' ) );

		add_action('admin_menu', array( __CLASS__, 'register_newsletter_settings_page' ) );

	}


	public static function register_post_type() {

		$labels = array(
			'name'                  => _x( 'Newsletters', 'Post type general name', 'textdomain' ),
			'singular_name'         => _x( 'Newsletter', 'Post type singular name', 'textdomain' ),
			'menu_name'             => _x( 'Newsletters', 'Admin Menu text', 'textdomain' ),
			'name_admin_bar'        => _x( 'Newsletter', 'Add New on Toolbar', 'textdomain' ),
			'add_new'               => __( 'Add New', 'textdomain' ),
			'add_new_item'          => __( 'Add New Newsletter', 'textdomain' ),
			'new_item'              => __( 'New Newsletter', 'textdomain' ),
			'edit_item'             => __( 'Edit Newsletter', 'textdomain' ),
			'view_item'             => __( 'View Newsletter', 'textdomain' ),
			'all_items'             => __( 'All Newsletters', 'textdomain' ),
			'search_items'          => __( 'Search Newsletters', 'textdomain' ),
			'parent_item_colon'     => __( 'Parent Newsletters:', 'textdomain' ),
			'not_found'             => __( 'No newsletters found.', 'textdomain' ),
			'not_found_in_trash'    => __( 'No newsletters found in Trash.', 'textdomain' ),
			'featured_image'        => _x( 'Newsletter Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'textdomain' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'textdomain' ),
			'archives'              => _x( 'Newsletter archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'textdomain' ),
			'insert_into_item'      => _x( 'Insert into newsletter', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'textdomain' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this newsletter', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'textdomain' ),
			'filter_items_list'     => _x( 'Filter newsletters list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'textdomain' ),
			'items_list_navigation' => _x( 'Newsletters list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'textdomain' ),
			'items_list'            => _x( 'Newsletters list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'textdomain' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_rest'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'newsletter' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' ),
			'template'           => array(
				array( 'wsuwp/newsletter-date', array() ),
				array( 'wsuwp/newsletter-text', array() ),
				array( 'wsuwp/newsletter-heading', array() ),
				array( 'wsuwp/newsletter-item', array() ),
				array( 'wsuwp/newsletter-heading', array() ),
				array( 'wsuwp/newsletter-item', array() ),
			),
			'taxonomies' => array( 'category', 'post_tag' ),
		);

		register_post_type( self::$post_type, $args );

	}


	public static function register_newsletter_settings_page() {

		add_submenu_page(
			'edit.php?post_type=newsletter',
			'Newsletter Settings',
			'Newsletter Settings',
			'edit_posts',
			'newsletter_settings',
			array( __CLASS__, 'render_newsletter_settings_page' )
		);

	}


	public static function render_newsletter_settings_page() {

		if (  ! empty( $_REQUEST['newsletter_save'] ) ) {

			self::save_newsletter_settings();

		}

		include Plugin::get( 'dir' ) . '/templates/newsletter-settings.php';

	}

	protected static function save_newsletter_settings() {

		$properties = array(
			'template_before'   => 'none',
			'template_after'    => 'none',
			'template_date'     => 'none',
			'template_content'  => 'none',
			'template_heading'  => 'none',
			'template_item'     => 'none',
			'template_a_styles' => 'none',
			'template_p_styles' => 'none',
		);

		foreach ( $properties as $key => $sanitize_type ) {

			if ( ! empty( $_REQUEST[ $key ] ) ) {

				update_option( self::$key_prefix . $key, self::sanitize_newsletter_input( $key, $sanitize_type ) );
			}
		}

	}


	public static function sanitize_newsletter_setting( $value, $sanitize_type = 'default' ) {

		$all_allowed_tags = '<table><td><tr><tbody><div><hr><span><strong><i><b><br><h1><h2><h3><h4><ul><ol><li><p><a><button>';

		switch ( $sanitize_type ) {

			case 'none':
				return $value;

			case 'decode':
				return stripslashes( htmlspecialchars_decode( $value ) );

			default:
				return strip_tags( $value, $all_allowed_tags );
		}

	}

	public static function sanitize_newsletter_input( $key, $sanitize_type = 'default' ) {

		if ( ! empty( $_REQUEST[ $key ] ) ) {

			switch ( $type ) {

				default:
					return self::sanitize_newsletter_setting( $_REQUEST[ $key ], $sanitize_type );
			}

		} else {

			return '';
		}

	}


	public static function get_option( $key, $default, $sanitize_type = 'default' ) {

		return self::sanitize_newsletter_setting( get_option( self::$key_prefix . $key, '' ), $sanitize_type );

	}
}

Newsletter_Post_Type::init();
