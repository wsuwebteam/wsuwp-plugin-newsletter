<?php namespace WSUWP\Plugin\Newsletter;

define( 'WSUISEMAILOUTPUT', true );

echo Newsletter_Post_Type::get_option( 'template_before', '', 'decode' );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 

		ob_start();
		
        the_content();

		$content = ob_get_clean();

		echo str_replace( '<p></p>', '', $content );
        
	} // end while
} // end if

echo Newsletter_Post_Type::get_option( 'template_after', '', 'decode' );