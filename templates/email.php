<?php namespace WSUWP\Plugin\Newsletter;

define( 'WSUISEMAILOUTPUT', true );

$merge_args = array();

$content = Newsletter_Post_Type::get_option( 'template_before', '', 'decode' );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 

		$merge_args['[[url]]'] = get_permalink();

		ob_start();
		
        the_content();

		$content .= str_replace( '<p></p>', '', ob_get_clean() );

	} // end while
} // end if

$content .= Newsletter_Post_Type::get_option( 'template_after', '', 'decode' );

echo Email_Template::template_replace( $content, $merge_args );

