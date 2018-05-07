<?php
	
	function cineteca_inail_ajax_get_film(){

		if( isset($_POST['message']) )
		{
			$ids = array();
			$ids = json_decode(str_replace ('\"','"', $_POST['id_list']),false);
			

			if( !empty($ids) )
			{
				$the_query = new WP_Query( array( 'post__in' => $ids, 'post_type' => 'film' ) );

				ob_start();
				
				if( $_POST['message'] == 'full' )
			    	cineteca_inail_get_the_film_loop_from_query($the_query,false);
			    else if( $_POST['message'] == 'titles' )
			    	cineteca_inail_get_the_film_title_loop_from_query($the_query);

			    $message = ob_get_clean();

			    die( json_encode( array( 'status' => 'ok', 'message' => $message ) ) );

			}else
				die( json_encode( array( 'status' => 'ko', 'message' => 'Nessun film selezionato', 'given_id' => $ids ) ) );
		}
	}

	add_action('wp_ajax_get_film', 'cineteca_inail_ajax_get_film');
	add_action('wp_ajax_nopriv_get_film', 'cineteca_inail_ajax_get_film');


