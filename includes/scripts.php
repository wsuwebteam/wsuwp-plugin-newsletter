<?php namespace WSUWP\Plugin\Newsletter;

class Scripts {

	

	public static function init() {

		add_action( 'init', array( __CLASS__, 'register_block_editor_assets' ) );

        add_action( 'admin_enqueue_scripts', array( __CLASS__, 'enqueue_assets' ) );

	}

    public static function register_block_editor_assets() {

        $editor_asset  = include Plugin::get( 'dir' ) . 'assets/dist/editor.asset.php';

		// editor
		wp_register_script(
			'wsuwp-plugin-newsletter-editor-scripts',
			Plugin::get( 'url' ) . 'assets/dist/editor.js',
			$editor_asset['dependencies'],
			$editor_asset['version']
		);

		wp_register_style(
			'wsuwp-plugin-newsletter-editor-styles',
			Plugin::get( 'url' ) . 'assets/dist/style-editor.css',
			array(),
			$editor_asset['version']
		);
	}


    public static function enqueue_assets() {

		//wp_enqueue_script( 'wsuwp-plugin-newsletter-editor-scripts' );
		//wp_enqueue_style( 'wsuwp-plugin-newsletter-editor-styles' );

	}
}

Scripts::init();