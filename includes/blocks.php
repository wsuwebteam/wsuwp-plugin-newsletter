<?php namespace WSUWP\Plugin\Newsletter;

class Blocks {

	protected static $allowed_blocks = array(
		'core/html',
		'core/paragraph',
		'core/list',
		'wsuwp/newsletter-banner',
		'wsuwp/newsletter-date',
		'wsuwp/newsletter-text',
		'wsuwp/newsletter-heading',
		'wsuwp/newsletter-item',
		'wsuwp/newsletter-image',
	);


	public static function get( $property ) {

		switch ( $property ) {

			case 'register_blocks':
				return self::$register_blocks;

			default:
				return '';
		}

	}


	public static function parse_defaults( $attrs, $default_attrs ) {

		foreach ( $default_attrs as $attr_key => $default_value ) {

			if ( ! isset( $attrs[ $attr_key ] ) ) {

				$attrs[ $attr_key ] = $default_value;

			}
		}

		return $attrs;
	}


	public static function init() {

		add_filter( 'allowed_block_types', array( __CLASS__, 'remove_blocks' ), 99999, 2 );

		require_once Plugin::get( 'dir' ) . 'blocks/newsletter-banner/block.php';

		require_once Plugin::get( 'dir' ) . 'blocks/newsletter-date/block.php';

		require_once Plugin::get( 'dir' ) . 'blocks/newsletter-text/block.php';

		require_once Plugin::get( 'dir' ) . 'blocks/newsletter-heading/block.php';

		require_once Plugin::get( 'dir' ) . 'blocks/newsletter-item/block.php';

		require_once Plugin::get( 'dir' ) . 'blocks/newsletter-image/block.php';

	}

	public static function remove_blocks( $allowed_blocks, $post ) {

		if ( 'newsletter' === $post->post_type ) {

			return self::$allowed_blocks;

		}

		return $allowed_blocks;

	}

}

Blocks::init();
