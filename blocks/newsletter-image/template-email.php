<?php namespace WSUWP\Plugin\Newsletter;

$custom_image = Newsletter_Post_Type::get_option( 'template_image', '', 'decode' );

$custom_image = str_replace( '[[img_src]]', $attributes['imgSrc'], $custom_image );
$custom_image = str_replace( '[[img_alt]]', $attributes['imgAlt'], $custom_image );
$custom_image = str_replace( '[[img_caption]]', $attributes['imgCaption'], $custom_image );
$custom_image = str_replace( '[[img_credit]]', $attributes['imgCredit'], $custom_image );

if ( ! empty( $custom_image ) ) {

	echo $custom_image;

}