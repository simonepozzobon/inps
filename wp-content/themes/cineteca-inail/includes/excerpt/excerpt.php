<?php

	function cineteca_inail_new_excerpt_more( $more ) {
		return ' <a class="bb-read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Leggi tutto', 'cineteca-inail') . '</a>';
	}
	function cineteca_inail_new_excerpt_length( $length ) {
		return 30;
	}
	add_filter( 'excerpt_length', 'cineteca_inail_new_excerpt_length' );
	add_filter( 'excerpt_more', 'cineteca_inail_new_excerpt_more' );

	function cineteca_inail_get_custom_excerpt( $str, $startPos=0, $maxLength=100 ) {
		if( strlen($str) > $maxLength )
		{
			$excerpt   = substr($str, $startPos, $maxLength-3);
			$lastSpace = strrpos($excerpt, ' ');
			$excerpt   = substr($excerpt, 0, $lastSpace);
			$excerpt  .= apply_filters('excerpt_more',$excerpt);
		}
		else 
			$excerpt = $str;
		
		return $excerpt;
	}