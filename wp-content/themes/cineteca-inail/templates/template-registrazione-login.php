<?php
/*
  Template Name: Registrazione Login
  Description: Template registrazione login
 */
	get_header(); 
?>

<?php $projectpage = get_post( 14 ); ?>
<main class="container bb-main-wrapper">
		<section class="row bb-content-row" role="content-info">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" id="bb-registrazione-login-container">
				<div class="bb-reglog-title">
					<span>
						<img src="<?php echo get_template_directory_uri().'/images/lock.png';?>" alt="lucchetto"/>
					</span>
					<h1><?php _e('Registrazione','cineteca-inail') ?></h1>
				</div>

				<div class="bb-reglog-content">
				<?php if( !is_user_logged_in() ): ?>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 bb-reglog-form-col-container" id="bb-registration_col">
						<h2>Crea il tuo account</h2>
						<?php echo do_shortcode('[my_registration_form]'); ?>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 bb-reglog-form-col-container" id="bb-login_col">
						<h2>Hai gi&agrave; un account?</h2>
						<?php 
							$login_args = array(
 								'echo'			 => true,
								'redirect'		 => site_url( $_SERVER['REQUEST_URI'] ), 
								'form_id'		 => 'bb-loginform',
								'label_username' => __( 'Nome utente' ),
								'label_password' => __( 'Password' ),
								'label_remember' => __( 'Remember Me' ),
								'label_log_in'	 => __( 'Login' ),
								'id_username'	 => 'bb-user_login',
								'id_password'	 => 'bb-user_pass',
								'id_remember'	 => 'bb-rememberme',
								'id_submit'		 => 'bb-login-submit',
								'remember'		 => false,
								'value_username' => NULL,
								'value_remember' => false
							);
							wp_login_form($login_args); 
						?> 
						<script type="text/javascript">
							document.getElementById('bb-user_login').className += ' form-control';
							document.getElementById('bb-user_pass').className += ' form-control';
							document.getElementById('bb-login-submit').className += ' btn bb-login-btn';
						</script>
					</div>
				<? else: ?>
					<?php $current_user = wp_get_current_user(); ?>
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bb-welcomeback-container">
						<h2 class="bb-welcomeback-title"><?php _e('Bentornato','cineteca-inail'); ?> <?php echo $current_user->user_firstname; ?> <?php echo $current_user->user_lastname; ?></h2>

						<br>

						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bb-welcomeback-text">

							<p>Crea la tua rassegna utilizzando le funzioni di <a href="<?php get_permalink(16);?>">Ricerca Guidata</a> e <a href="<?php get_permalink(18);?>">Ricerca Libera</a></p>
							<p><a href="<?php get_permalink(101);?>">Modifica la tua rassegna</a> e <a href="<?php get_permalink(103);?>">inviala</a> al nostro staff</p>

							<a class="btn bb-logout-btn" href="<?php echo wp_logout_url( get_permalink() ); ?>" title="logout button">Logout</a>
						</div>
					</div>
					<script>
					$(document).on("ready",function(){
						cineteca_inail_transfer_rassegna(<?php echo cineteca_inail_generate_uid(); ?>);
					});

					</script>
				<?php endif; ?>
				</div>

			</div>
			<?php get_sidebar(); ?>
		</section>
</main>
<?php get_footer(); ?>