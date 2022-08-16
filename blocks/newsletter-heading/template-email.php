<?php namespace WSUWP\Plugin\Newsletter;

$custom_heading = Newsletter_Post_Type::get_option( 'template_heading', '', 'decode' );

$custom_heading = str_replace( '[[heading]]', $attributes['heading'], $custom_heading );
$custom_heading = str_replace( '[[level]]', $attributes['level'], $custom_heading );

if ( ! empty( $custom_heading ) ) {

	echo $custom_heading;

}
