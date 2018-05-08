<?php
/*
  Plugin Name: My registration form
  Plugin URI: http://simonepozzobon.com
  Description: Custom Registration Form
  Version: 1.0
  Author: Simone Pozzobon
  Author URI: http://simonepozzobon.com
 */
function mrf_registration_form( &$fields, &$errors )
{
	$regok = false;

	if( !is_array($fields) )
		$fields = array();
	if( !is_wp_error($errors) )
		$errors = new WP_Error;

	if( isset($_POST['submit']) )
	{
		$fields = mrf_get_form_fields();

		if( mrf_validate_fields($fields, $errors))
		{
			$id = wp_insert_user($fields);
			update_field('field_5529102deed8f',$fields['profession'],$id);
			$fields = array();
			$regok = true;
		}
	}
	mrf_sanitize_fields($fields);
	mrf_display_form($fields, $errors, $regok);
}

function mrf_get_form_fields()
{
	return array(
		'user_login'  		=> isset($_POST['user_login'])  	  ? $_POST['user_login'] 		: '',
		'user_pass'   		=> isset($_POST['user_pass'])   	  ? $_POST['user_pass']   		: '',
		'user_pass_confirm' => isset($_POST['user_pass_confirm']) ? $_POST['user_pass_confirm'] : '',
		'user_email'  		=> isset($_POST['user_email'])  	  ? $_POST['user_email']  		: '',
		'user_url'    		=> isset($_POST['user_url'])    	  ? $_POST['user_url']    		: '',
		'first_name'  		=> isset($_POST['first_name'])  	  ? $_POST['first_name']  		: '',
		'last_name'   		=> isset($_POST['last_name']) 		  ? $_POST['last_name']   		: '',
		'nickname'    		=> isset($_POST['nickname'])  		  ? $_POST['nickname']    		: '',
		'description' 		=> isset($_POST['description'])	 	  ? $_POST['description'] 		: '',
		'profession' 		=> isset($_POST['profession'])		  ? $_POST['profession'] 		: '',
		'role'				=> 'insegnante'
	);
}

function mrf_sanitize_fields( &$fields )
{
	$fields['user_login'] 		 = isset($fields['user_login'])  	   ? sanitize_user($fields['user_login']) 		 : '';
	$fields['user_pass']  		 = isset($fields['user_pass']) 		   ? esc_attr($fields['user_pass']) 			 : '';
	$fields['user_pass_confirm'] = isset($fields['user_pass_confirm']) ? esc_attr($fields['user_pass_confirm']) 	 : '';
	$fields['user_email'] 		 = isset($fields['user_email'])		   ? sanitize_email($fields['user_email']) 		 : '';
	$fields['user_url']   		 = isset($fields['user_url']) 		   ? esc_url($fields['user_url']) 				 : '';
	$fields['first_name'] 		 = isset($fields['first_name'])		   ? sanitize_text_field($fields['first_name'])  : '';
	$fields['last_name']  		 = isset($fields['last_name'])		   ? sanitize_text_field($fields['last_name']) 	 : '';
	$fields['nickname']   		 = isset($fields['nickname']) 		   ? sanitize_text_field($fields['nickname']) 	 : '';
	$fields['description']		 = isset($fields['description'])	   ? esc_textarea($fields['description']) 		 : '';
	$fields['profession']		 = isset($fields['profession'])	   	   ? sanitize_text_field($fields['profession']) : '';
}

function mrf_display_form( $fields = array(), $errors = null, $regok = false )
{
	if( is_wp_error($errors) && count($errors->get_error_messages()) > 0 )
	{
	?>
			<ul class="list-unstyled mrf-reg-error-list">
			<?php foreach( $errors->get_error_messages() as $key => $val ) ?>
				<li class="mfr-reg-error-item text-danger">Errore: <?php echo $val; ?> </li>
			</ul>
	<?php
		}

		if( $regok ):?>
			<p class="mfr-reg-success text-success">Registrazione effettuata</p>
		<?php endif; ?>

		<form action="<?php $_SERVER['REQUEST_URI'] ?>" method="post">

			<div class="form-group">
				<label class="mrf-registration-form-label" for="firstname">Nome</label>
				<input type="text" class="form-control" id="firstname" name="first_name" value="<?php echo (isset($fields['first_name']) ? $fields['first_name'] : '') ?>">
			</div>

			<div class="form-group">
				<label class="mrf-registration-form-label" for="last_name">Cognome</label>
				<input type="text" class="form-control" name="last_name" value="<?php echo (isset($fields['last_name']) ? $fields['last_name'] : '') ?>">
			</div>

			<div class="form-group">
				<label class="mrf-registration-form-label" for="profession">Ambito lavorativo/professione</label>
				<input type="text" class="form-control" name="profession" value="<?php echo (isset($fields['profession']) ? $fields['profession'] : '') ?>">
			</div>

			<div class="form-group">
				<label class="mrf-registration-form-label" for="email">Indirizzo Email</label>
				<input type="text" class="form-control" name="user_email" value="<?php echo (isset($fields['user_email']) ? $fields['user_email'] : '') ?>">
			</div>

			<div class="form-group">
				<label class="mrf-registration-form-label" for="user_pass">Password</label>
				<input type="password" class="form-control" name="user_pass">
			</div>

			<div class="form-group">
				<label class="mrf-registration-form-label" for="user_pass">Conferma password</label>
				<input type="password" class="form-control" name="user_pass_confirm">
			</div>

			<div class="form-group">
				<label class="mrf-registration-form-label" for="user_login">Scegliere nome utente</label>
				<input type="text" class="form-control" name="user_login" value="<?php echo (isset($fields['user_login']) ? $fields['user_login'] : '') ?>">
			</div>

			<br>
			<div class="mrf-accept">Accetto i <a href="<?php echo get_the_permalink(122);?>" title="termini e condizioni">Termini</a> del sito di<br>LOSPETTACOLODELLASICUREZZA</div>
			<br>

			<div class="btn-group pb-5 w-100">
				<input type="submit" class="btn mrf-register-btn btn-dark btn-block" name="submit" value="Continua">
			</div>
		</form>
<?php
}

function mrf_validate_fields( &$fields, &$errors )
{
	if( !is_wp_error($errors) )
		$errors = new WP_Error;

	if( empty($fields['user_login']) || empty($fields['user_pass']) || empty($fields['user_email']) )
		$errors->add('field', 'Compilare i campi obbligatori');


	if( strlen($fields['user_login']) < 4 )
		$errors->add('username_length', 'Username troppo corto, almeno 5 caratteri');


	if( username_exists($fields['user_login']) )
	$errors->add('user_name', 'Lo username scelto esiste già');

	if( !validate_username($fields['user_login']) )
		$errors->add('username_invalid', 'Username non valido');

	if( strlen($fields['user_pass']) < 5 )
		$errors->add('user_pass', 'La password deve contenere almeno 5 caratteri');

	if( $fields['user_pass'] != $fields['user_pass_confirm'] )
		$errors->add('wrong_pass', 'Le due password non corrispondono');

	if( !is_email($fields['user_email']) )
		$errors->add('email_invalid', 'Email non valida');

	if( $fields['profession'] == "" )
		$errors->add('empty_profession', 'Inserisci il tuo ambito professionale');

	if( email_exists($fields['user_email']) )
		$errors->add('email', 'Email già in uso');

	if( count($errors->get_error_messages()) > 0 )
		return false;

	return true;
}

function mrf_shortcode() {
  $fields = array();
  $errors = new WP_Error();

  ob_start();
  mrf_registration_form( $fields, $errors );
  return ob_get_clean();
}
add_shortcode( 'my_registration_form', 'mrf_shortcode' );
