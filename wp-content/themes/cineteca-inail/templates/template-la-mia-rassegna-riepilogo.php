<?php
/*
  Template Name: La mia rassegna riepilogo
  Description: Template la mia rassegna riepilogo
 */
	global $current_user;
	get_currentuserinfo();
	get_header();
	$riepilogo = true;
?>
<main class="container bb-main-wrapper">
	<section class="row" role="content-info">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 bb-rassegna" id="bb-rassegna-container">
			<div class="bb-rassegna-title">
				<span>
					<img src="<?php echo get_template_directory_uri().'/images/film.png';?>" alt="bobina di un film"/>
				</span>
				<h1><?php _e('La mia rassegna','cineteca_inail'); ?></h1>
			</div>

		<?php if( $riepilogo && !is_user_logged_in() ): ?>
				<div class="bb-must-login" id="bb-must-login-title"><?php _e('Per proseguire devi essere registrato','cineteca_inail'); ?></div>
		<?php else: ?>

			<div class="bb-rassegna-content">
			<?php if( !$riepilogo ): ?>
				<div class="bb-rassegna-select-title" id="bb-rassegna-title"><?php _e('Hai selezionato','cineteca_inail'); ?></div>
			<?php else: ?>
				<div class="bb-rassegna-riepilogo-select-title" id="bb-rassegna-title"><?php _e('Utente','cineteca_inail'); ?> <?php echo $current_user->user_firstname; ?> <?php echo $current_user->user_lastname;?></div>
				<div class="bb-rassegna-select-subtitle" id="bb-rassegna-subtitle"><?php _e('La tua rassegna &egrave; pronta per essere richiesta.','cineteca_inail'); ?></div>
			<?php endif; ?>

				<div class="bb-rassegna-content" id="bb-rassegna-list-query-container">
				</div>

			<?php if( $riepilogo ): ?>
				<div class="bb-rassegna-input-text" id="bb-riepilogo-input-text">
					<h2>Campo di testo (opzionale)</h2>
					<textarea name="bb-textfield" class="form-control" id="bb-riepilogo-textarea" rows="20"></textarea>
				</div>
				<div class="bb-riepilogo-buttons">
					<span class="btn bb-back-btn"><a class="btn" href="<?php echo wp_get_referer();?>">Indietro</a></span>
					<span class="btn bb-send-btn"><a class="btn" onclick="cineteca_inail_sendfilmdatatostaff()">Invia richiesta</a></span>
				</div>
			<?php endif; ?>
			</div>
		<?php endif; ?>

		</div>
		<?php get_sidebar(); ?>
	</section>
</main>
<?php get_footer(); ?>