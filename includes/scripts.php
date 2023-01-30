<?php namespace WSUWP\Plugin\Newsletter;

class Scripts {

	

	public static function init() {

		add_action( 'init', array( __CLASS__, 'register_block_editor_assets' ) );

	}

    public static function register_block_editor_assets() {

        $editor_asset  = include Plugin::get( 'dir' ) . 'assets/dist/editor.asset.php';

		// editor
		wp_register_script(
			'wsuwp-plugin-newsletter-editor-scripts',
			Plugin::get( 'url' ) . 'assets/dist/editor.js',
			array( 'wp-element', 'wp-blocks', 'wp-components', 'wp-editor' ),
			Plugin::get( 'version' )
		);

		wp_register_style(
			'wsuwp-plugin-newsletter-editor-styles',
			Plugin::get( 'url' ) . 'assets/dist/style-editor.css',
			array( 'wp-edit-blocks' ),
			Plugin::get( 'version' )
		);
	}

}

Scripts::init();
