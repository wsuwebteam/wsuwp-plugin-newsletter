<?php namespace WSUWP\Plugin\Newsletter;

class Plugin {


	public static function get( $property ) {

		switch ( $property ) {

			case 'version':
				return WSUWPPLUGINNEWSLETTERVERSION;

			case 'dir':
				return plugin_dir_path( dirname( __FILE__ ) );

			case 'url':
				return plugin_dir_url( dirname( __FILE__ ) );

			default:
				return '';

		}

	}


	public static function init() {

		require_once __DIR__ . '/newsletter-post-type.php';
		require_once __DIR__ . '/blocks.php';
		require_once __DIR__ . '/email-template.php';
		require_once __DIR__ . '/scripts.php';

	}



}

Plugin::init();
