<?php namespace WSUWP\Plugin\Newsletter;

$link_start = ( ! empty( $attributes['link'] ) ) ? '<a href="' . esc_url( $attributes['link'] ) . '">' : '';

$link_end = ( ! empty( $attributes['link'] ) ) ? '</a>' : '';

$custom_item = Newsletter_Post_Type::get_option( 'template_item', '', 'decode' );

$custom_item = str_replace( '[[content]]', Email_Template::format_content( $content ), $custom_item );

$custom_item = str_replace( '[[title]]', $attributes['title'], $custom_item );

$custom_item = Email_Template::format_content( str_replace( '[[link_start]]', $link_start, $custom_item ) );

$custom_item = str_replace( '[[link_end]]', $link_end, $custom_item );

if ( ! empty( $custom_item  ) ) {

	echo $custom_item;

}