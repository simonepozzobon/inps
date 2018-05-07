<?php
	
	function cineteca_inail_ajax_send_film(){

		if( isset($_POST['message']) )
		{
			$ids = array();
			$ids = json_decode(str_replace ('\"','"', $_POST['id_list']),false);
			
			if( !empty($ids) )
			{
				global $current_user;
				get_currentuserinfo();

				$adminmail = get_option('admin_email');
				$usermail  = $current_user->user_email;

				$message_from_user = $_POST['message'];

				ob_start();
				cineteca_inail_get_the_film_title_loop_from_query( new WP_Query( array( 'post__in' => $ids, 'post_type' => 'film' ) ) );
				$filmlist = ob_get_clean();

				$adminms = "L'utente ".$current_user->user_firstname." ".$current_user->user_lastname." ha creato la seguente rassegna.
							<br><br>".$filmlist."<br><br>";

				if( $_POST['message'] != "" )
					$adminms .= "Ha scritto inoltre:<br>".$_POST['message']."<br><br>";

					$adminms .=	"Contattalo all'indirizzo <a href='mailto:".$current_user->user_email."'>".$current_user->user_email."</a>";

				$usermsg = "La tua rassegna è stata creata correttamente, verrai presto contattato dal nostro staff.";


				$hdrFROM 		= 'From: no-reply@lospettacolodellasicurezza.it'."\r\n";
				$hdrTOforadmin  = 'Reply-To: '.$current_user->user_email."\r\n";
				$hdrTOforuser	= 'Reply-To: no-reply@lospettacolodellasicurezza.it'."\r\n";
				$hdrHTML =	'MIME-Version: 1.0'."\r\n".
							'Content-type: text/html; charset=iso-8859-1'."\r\n";

				$adminsent = mail( $adminmail, 'Una nuova rassegna è stata creata', $adminms, $hdrFROM.$hdrTOforadmin.$hdrHTML );
				$usersent  = mail( $usermail, 'La tua rassegna è stata creata', $usermsg, $hdrFROM.$hdrTOforuser.$hdrHTML );

				if( !$adminsent && !$usersent )
					die( json_encode( array( 'status'=> 'ko', 'message' => 'Non &egrave; stato possibile inviare la mail<br>Riprova pi&ugrave; tardi') ) );

				if( DEBUG )
					die( json_encode( array( 'status' => 'ok', 'message' => get_post(106)->post_content, 'admin_mail' => $adminmail, 'user_mail' => $usermail, 'sent' => $adminsent ) ) );

			    die( json_encode( array( 'status' => 'ok', 'message' => get_post(106)->post_content ) ) );

			}else
				die( json_encode( array( 'status' => 'ko', 'message' => 'Nessun film selezionato', 'given_id' => $ids ) ) );
		}
	}

	add_action('wp_ajax_send_film', 'cineteca_inail_ajax_send_film');

