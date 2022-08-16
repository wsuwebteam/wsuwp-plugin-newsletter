<?php namespace WSUWP\Plugin\Newsletter;

class Block_Newsletter_Date {

	protected static $default_attrs = array(
		'date' => '',
	);

	public static function render( $attributes, $content ) {

		$attributes = Blocks::parse_defaults( $attributes, self::$default_attrs );

		ob_start();

		if ( defined( 'WSUISEMAILOUTPUT' ) ) {

			include __DIR__ . '/template-email.php';

		} else {

			include __DIR__ . '/template.php';

		}

		return ob_get_clean();

	}


	public static function register_block() {

		register_block_type(
			'wsuwp/newsletter-date',
			array(
				'render_callback' => array( __CLASS__, 'render' ),
				'api_version'     => 2,
				'editor_script'   => 'wsuwp-plugin-newsletter-editor-scripts',
				'editor_style'    => 'wsuwp-plugin-newsletter-editor-styles',
			)
		);

	}


	public static function init() {

		add_action( 'init', array( __CLASS__, 'register_block' ) );

	}
}

Block_Newsletter_Date::init();
