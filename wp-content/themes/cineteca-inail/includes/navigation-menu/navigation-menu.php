<?php
	function register_my_menu() {
		register_nav_menu('header-menu',__( 'Header Menu' ));
		register_nav_menu('footer-menu',__( 'Footer Menu' ));
	}

	add_action( 'init', 'register_my_menu' );


	function custom_menu_order() {
		return array( 'index.php', 'edit.php', 'edit-comments.php' );
	}

	add_filter( 'custom_menu_order', '__return_true' );
	add_filter( 'menu_order', 'custom_menu_order' );