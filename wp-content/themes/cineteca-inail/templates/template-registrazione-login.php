<?php
/*
  Template Name: Registrazione Login
  Description: Template registrazione login
 */
	get_header();
?>

<?php $projectpage = get_post( 14 ); ?>

<main role="main" class="container pb-5">
	<div class="row">
		<div class="col-md-8">
			<!-- Parte Centrale -->
			<div class="row">
				<div class="col">
					<?php if( !is_user_logged_in() ): ?>

						<div class="row bb-home-sect-title">
							<h1><?php _e('Registrazione e Login','cineteca-inail') ?></h1>
						</div>
						<div class="row bg-light bb-register-login-container">
							<div class="col-md-6 bb-register">
								<h2 class="py-3">Crea il tuo account</h2>
								<?php echo do_shortcode('[my_registration_form]'); ?>
							</div>
							<div class="col-md-6 bb-login">
								<h2 class="py-3">Hai gi&agrave; un account?</h2>
								<form class="" action="/wp-login.php" method="post">
									<div class="form-group">
										<label for="bb-user_login">Nome utente</label>
										<input type="text" name="log" id="bb-user_login" class="input form-control" value="" size="20">
									</div>

									<div class="form-group">
										<label for="bb-user_pass">Password</label>
										<input type="password" name="pwd" id="bb-user_pass" class="input form-control" value="" size="20">
									</div>

									<div class="form-group">
										<a href="/wp-login.php?action=lostpassword" class="bb-forgot-password" title="Password dimenticata">hai dimenticato la password?</a>
									</div>

									<div class="btn-group pb-5 w-100">
										<input type="submit" name="wp-submit" id="bb-login-submit" class="btn btn-dark btn-block bb-login-btn" value="Login">
									</div>
									<input type="hidden" name="redirect_to" value="<?php echo get_permalink() ?>">

								</form>
							</div>
						</div>

					<? else: ?>
						<?php $current_user = wp_get_current_user(); ?>
						<div class="row bb-home-sect-title">
							<h1><?php _e('Bentornato','cineteca-inail'); ?> <?php echo $current_user->user_firstname; ?> <?php echo $current_user->user_lastname; ?></h1>
						</div>
						<div id="content" class="row content">
							<div class="col">
								<p>Crea la tua rassegna utilizzando le funzioni di <a href="<?php get_permalink(16);?>">Ricerca Guidata</a> e <a href="<?php get_permalink(18);?>">Ricerca Libera</a></p>
								<p><a href="<?php get_permalink(101);?>">Modifica la tua rassegna</a> e <a href="<?php get_permalink(103);?>">inviala</a> al nostro staff<br></p>

								<div class="button">
									<a class="btn btn-dark bb-logout-btn" href="<?php echo wp_logout_url( get_permalink() ); ?>" title="logout button">Logout</a>
								</div>
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
		</div>
		<div class="col-md-4">
			<!-- Sidebar -->
			<div class="row">
				<div class="col-12">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</div>
</main>
<?php get_footer(); ?>
