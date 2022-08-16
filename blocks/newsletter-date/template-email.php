<?php namespace WSUWP\Plugin\Newsletter;

$custom_date = Newsletter_Post_Type::get_option( 'template_date', '', 'decode' );

$custom_date = str_replace( '[[date]]', $attributes['date'], $custom_date );

if ( ! empty( $custom_date ) ) {

	echo $custom_date;

}






