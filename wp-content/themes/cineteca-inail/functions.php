<?php
	define( 'VERSION',   '2.0' );
	define( 'THEME_URL', get_template_directory_uri().'/' );
	define( 'JS_DIR',    THEME_URL.'js/' );
	define( 'CSS_DIR',   THEME_URL.'css/' );
	define( 'SALT',		 'mia_cinail_');
	define( 'ACF_LITE',  false );
	define( 'MINIFIED',  true );
	define( 'DEBUG', 	 false );

	global $bodyclass;
	$bodyclass = 'makeitapp cineteca-inail';

	include_once('includes/advanced-custom-fields/acf.php');
	//include_once('includes/acf-options-page/acf-options-page.php');
	include_once('includes/acf-flexible-content/acf-flexible-content.php');
	include_once('includes/acf-repeater/acf-repeater.php');
	include_once('includes/acf-gallery/acf-gallery.php');
	include_once('includes/acf-definition.php');
	include_once('includes/supports.php');
	include_once('includes/actions.php');
	include_once('includes/filters.php');

	/* Include Custom Post Type */
	include_once('includes/custom_post_types/film.php');
	/* Include Navigation Menu  */
	include_once('includes/navigation-menu/navigation-menu.php');

	/* Include Excerpt */
	include_once('includes/excerpt/excerpt.php');
	/* Include Search */
	include_once('includes/queries/cineteca.query.film.php');
	/* Include Loop */
	include_once('includes/loop/loop-film.php');
	/* Include Ajax Handler */
	include_once('includes/ajax/cineteca.get_film.handler.php');
	include_once('includes/ajax/cineteca.send_film.handler.php');
	/* Include user role and login handles */
	include_once('includes/user-and-login/cineteca.user_role.insegnante.php');
	include_once('includes/user-and-login/cineteca.login.php');
	/* Include save method for custom field */
	include_once('includes/extra-field/extra-field.php');

	function cineteca_inail_generate_uid(){
		global $current_user;
		get_currentuserinfo();
		return $current_user->ID;
	}
