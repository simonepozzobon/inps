<?php

/*
 * Adds new image sizes
 */
function cineteca_add_custom_image_sizes() {
	add_image_size( 'image_size', 				 70,  70, true  );
	add_image_size( 'cineteca-inail-thumb', 	240, 150, true  );
	add_image_size( 'cineteca-inail-lilthumb', 	132,  98, true  );
	add_image_size( 'cineteca-inail-locandina', 720, 400, false );
}

add_action( 'init', 'cineteca_add_custom_image_sizes' );

/**
 * Add Styles
 */
function cineteca_enqueue_styles() {
	$min = "";
	if( MINIFIED )
		$min="min.";
	
	/* Register Styles */
	wp_register_style( 'bootstrap', 				   CSS_DIR.'bootstrap.min.css', 					  false				, VERSION );
	wp_register_style( 'cineteca.inail',			   CSS_DIR.'cineteca.inail.'.$min.'css', 		 	  array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.header', 		  	   CSS_DIR.'cineteca.header.'.$min.'css', 		 	  array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.sidebar',		  	   CSS_DIR.'cineteca.sidebar.'.$min.'css',		 	  array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.footer', 		  	   CSS_DIR.'cineteca.footer.'.$min.'css', 		 	  array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.home', 	 		   CSS_DIR.'cineteca.home.'.$min.'css', 			  array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.default.page',		   CSS_DIR.'cineteca.page.'.$min.'css',		  		  array('bootstrap'), VERSION );
	
	wp_register_style( 'cineteca.ricerca.common',  	   CSS_DIR.'cineteca.ricerca.common.'.$min.'css', 	  array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.ricerca.guidata', 	   CSS_DIR.'cineteca.ricerca.guidata.'.$min.'css',	  array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.ricerca.libera',  	   CSS_DIR.'cineteca.ricerca.libera.'.$min.'css', 	  array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.query.results',	   CSS_DIR.'cineteca.query.results.'.$min.'css',  	  array('bootstrap'), VERSION );
	
	wp_register_style( 'cineteca.single',			   CSS_DIR.'cineteca.single.'.$min.'css',			  array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.single.film',	  	   CSS_DIR.'cineteca.single.film.'.$min.'css',	 	  array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.rassegna',		  	   CSS_DIR.'cineteca.rassegna.'.$min.'css',		      array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.eventinews',	  	   CSS_DIR.'cineteca.eventinews.'.$min.'css',	  	  array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.registrazione.login', CSS_DIR.'cineteca.registrazionelogin.'.$min.'css', array('bootstrap'), VERSION );
	wp_register_style( 'cineteca.404',				   CSS_DIR.'cineteca.404.'.$min.'css', 				  false,			  VERSION );

	/* Enqueue Styles */
	wp_enqueue_style('bootstrap');
	wp_enqueue_style('cineteca.inail');
	wp_enqueue_style('cineteca.header');
	wp_enqueue_style('cineteca.sidebar');
	wp_enqueue_style('cineteca.footer');


	if( is_page_template( 'templates/template-home.php' ) )
		wp_enqueue_style('cineteca.home');

	if( is_page_template( 'templates/template-news-eventi.php') )
	{
		wp_enqueue_style('cineteca.eventinews');
	}

	if( is_page_template( 'templates/template-registrazione-login.php') )
	{
		wp_enqueue_style('cineteca.registrazione.login');
	}

	if( is_page_template( 'templates/template-ricerca-guidata.php') || is_page_template( 'templates/template-ricerca-libera.php') )
		wp_enqueue_style('cineteca.ricerca.common');
	

	if( is_page_template( 'templates/template-ricerca-guidata.php') )
		wp_enqueue_style('cineteca.ricerca.guidata');
	

	if( is_page_template( 'templates/template-ricerca-libera.php') )
		wp_enqueue_style('cineteca.ricerca.libera');


	if( is_page_template( 'templates/template-la-mia-rassegna.php' ) || is_page_template( 'templates/template-la-mia-rassegna-riepilogo.php') )
	{
		wp_enqueue_style('cineteca.rassegna');
		wp_enqueue_style('cineteca.query.results');	
	}

	if( is_single() )
		wp_enqueue_style('cineteca.single');

	if( is_singular( 'film') )
		wp_enqueue_style('cineteca.single.film');

	if( is_404() )
		wp_enqueue_style('cineteca.404');

	if( is_page() )
		wp_enqueue_style('cineteca.default.page');
}
add_action('wp_enqueue_scripts', 'cineteca_enqueue_styles');

/**
 * Add Scripts
 */
function cineteca_enqueue_scripts() {

	global $current_user;
	wp_get_current_user();

	wp_deregister_script('jquery'); // remove WP jQuery;

	$min = "";
	if( MINIFIED )
		$min="min.";

	wp_register_script( 'jquery',				 JS_DIR.'jquery-1.11.1.min.js', 	 		false, 						  VERSION, true );
	wp_register_script( 'bootstrap', 	 		 JS_DIR.'bootstrap.min.js', 		 		array('jquery'), 			  VERSION, true );
	wp_register_script( 'cineteca.inail', 		 JS_DIR.'cineteca.inail.'.$min.'js', 		array('jquery', 'bootstrap'), VERSION, true );
	wp_register_script( 'cineteca.localstorage', JS_DIR.'cineteca.localstorage.'.$min.'js', array('jquery'),	 		  VERSION, true );
	wp_register_script( 'cineteca.rassegna',	 JS_DIR.'cineteca.rassegna.'.$min.'js', 	array('jquery'),			  VERSION, true );
	wp_register_script( 'cineteca.riepilogo',	 JS_DIR.'cineteca.riepilogo.'.$min.'js',	array('jquery'), 			  VERSION, true );
	
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('cineteca.inail');
	wp_enqueue_script('cineteca.localstorage');
	wp_localize_script('cineteca.localstorage', 'bb_ajax_handler', array( 'userid' => $current_user->ID ));

	if( is_page_template( 'templates/template-la-mia-rassegna.php' ) )
	{
		wp_enqueue_script('cineteca.rassegna');
		wp_localize_script('cineteca.rassegna', 'bb_ajax_handler', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'userid' => $current_user->ID ));
	}

	if( is_page_template( 'templates/template-la-mia-rassegna-riepilogo.php') )
	{
		wp_enqueue_script('cineteca.riepilogo');
		wp_localize_script('cineteca.riepilogo', 'bb_ajax_handler', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ), 'userid' => $current_user->ID ));
	}
}

add_action('wp_enqueue_scripts', 'cineteca_enqueue_scripts');
