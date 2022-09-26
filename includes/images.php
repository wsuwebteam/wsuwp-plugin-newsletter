<?php namespace WSUWP\Plugin\Newsletter;

class Images {



	public static function init() {

		add_action( 'init', array( __CLASS__, 'add_image_sizes' ) );

	}

	public static function add_image_sizes() {

		add_image_size( 'email-large', 600, 9999 );
		add_image_size( 'email-medium', 231, 9999 );
		add_image_size( 'email-small', 175, 9999 );
		
	}

}

Images::init();
