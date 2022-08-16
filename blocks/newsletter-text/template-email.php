<?php namespace WSUWP\Plugin\Newsletter;

$content = Email_Template::format_content( $content );

$custom_content = Newsletter_Post_Type::get_option( 'template_content', '', 'decode' );

$custom_content = str_replace( '[[content]]', $content, $custom_content );

if ( ! empty( $custom_content ) ) {

	echo $custom_content;

}