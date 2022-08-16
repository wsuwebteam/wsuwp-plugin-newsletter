<?php namespace WSUWP\Plugin\Newsletter;

class Block_Newsletter_Banner {

	public static function render( $attributes, $content ) {

		ob_start();

        echo 'banner';
		//include Plugin::get( 'template_dir' ) . '/block-student-profile.php';

		return ob_get_clean();

	}


	public static function register_block() {

		register_block_type(
			'wsuwp/newsletter-banner',
			array(
				'render_callback' => array( __CLASS__, 'render' ),
				'api_version'     => 2,
				'editor_script'   => 'wsuwp-plugin-newsletter-editor-scripts',
				//'editor_style'    => 'wsuwp-plugin-people-student-profile-editor-styles',
			)
		);

	}


	public static function init() {

		add_action( 'init', array( __CLASS__, 'register_block' ) );

	}
}

Block_Newsletter_Banner::init();
