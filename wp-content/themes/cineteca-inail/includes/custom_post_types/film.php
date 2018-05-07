<?php

	function create_posttype() {
		register_post_type( 'Film',
			array(
				'labels' => array(
					'name' => __( 'Film' ),
					'singular_name' => __( 'Film' )
				),
				'public' => true,
				'has_archive' => true,
				'rewrite' => array('slug' => 'film'),
				'supports' => array('title','thumbnail')
			)
		);
	}

	add_action( 'init', 'create_posttype' );