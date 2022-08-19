<?php namespace WSUWP\Plugin\Newsletter;

class Sidebars {

	

	public static function init() {

		add_action( 'widgets_init', array( __CLASS__, 'register_sidebars' ) );

		add_filter( 'the_content', array( __CLASS__, 'do_sidebar_before' ), 9999 );

		add_filter( 'the_content', array( __CLASS__, 'add_view_email_link' ), 99998 );

		add_filter( 'the_content', array( __CLASS__, 'do_sidebar_after' ), 99999 );

	}

	public static function register_sidebars() {

		register_sidebar( 
			array(
				'name'          => 'Newsletter: Before Content',
				'id'            => 'wsu-newsletter-widgets__before-content',
				'description'   => 'Widgets in this area will be shown on all newsletters.',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
			) 
		);

		register_sidebar( 
			array(
				'name'          => 'Newsletter: After Content',
				'id'            => 'wsu-newsletter-widgets__after-content',
				'description'   => 'Widgets in this area will be shown on all newsletters.',
				'before_widget' => '',
				'after_widget'  => '',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
			) 
		);

	}


	public static function do_sidebar_before(  $content ) {

		if ( is_singular( 'newsletter' ) && is_main_query() && is_active_sidebar( 'wsu-newsletter-widgets__before-content' ) && ! defined( 'WSUISEMAILOUTPUT' ) ) {

			ob_start();

			dynamic_sidebar( 'wsu-newsletter-widgets__after-content' );

			$content .= ob_get_clean();

		}

		return $content;

	}

	public static function add_view_email_link(  $content ) {

		if ( is_singular( 'newsletter' ) && is_main_query() && ! defined( 'WSUISEMAILOUTPUT' ) ) {

			if ( is_preview() ) {

				$link = get_preview_post_link( null, array( 'view-email' => 'true' ) );

			} else {

				$link = get_permalink() . '?view-email=true';

			}

			$content .= '<div class="wsu-cta"><a href="' . $link . '" class="wsu-button--style-action">View Email</a></div>';

		}

		return $content;

	}


	public static function do_sidebar_after(  $content ) {

		if ( is_singular( 'newsletter' ) && is_main_query() && is_active_sidebar( 'wsu-newsletter-widgets__after-content' ) && ! defined( 'WSUISEMAILOUTPUT' ) ) {

			ob_start();

			dynamic_sidebar( 'wsu-newsletter-widgets__after-content' );

			$content .= ob_get_clean();
		}

		return $content;

	}
}

Sidebars::init();