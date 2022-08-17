<?php namespace WSUWP\Plugin\Newsletter;

class Email_Template {

	private static $redirect_key = 'view-email';

	public static function init() {

		if ( ! empty( $_GET[ self::$redirect_key ] ) ) {

			add_filter( 'template_include', array( __CLASS__, 'render_email' ), 10 );

		}

	}


	public static function render_email( $template ) {

		if ( ! empty( $_GET[ self::$redirect_key ] ) ) {

			return Plugin::get( 'dir' ) . '/templates/email.php';

		}

		return $template;

	}


	public static function format_content( $content ) {

		$a_styles      = Newsletter_Post_Type::get_option( 'template_a_styles', '', 'decode' );
		$p_styles = Newsletter_Post_Type::get_option( 'template_p_styles', '', 'decode' );

		if ( empty( $a_styles ) ) {

			$a_styles = 'text-decoration: underline; color: #a60f2d;';

		}

		if ( empty( $p_styles ) ) {

			$p_styles = 'font-size: 16px; line-height: 24px; font-weight: 400; padding: 0; margin-bottom: 24px;';
			
		}

		$content = str_replace( '<a', '<a style="' . $a_styles . '"', $content );
		$content = str_replace( '<p', '<p style="' . $p_styles . '"', $content );

		return $content;

	}

	public static function template_replace( $content, $replace_array = array() ) {

		foreach ( $replace_array as $merge_tag => $replace_value ) {

			$content = str_replace( $merge_tag, $replace_value, $content );

		}

		return $content;

	}



}

Email_Template::init();
