<?php 
/*
 * Single template for Film custom post type
 */
	get_header(); 
?>
<main class="container bb-main-wrapper">
		<section class="row" role="content-info">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 bb-single-film" id="bb-single-film-container">
				
				<?php while ( have_posts() ) : the_post(); ?>
					<?php $filminfo = cineteca_inail_get_film_info_from_id(get_the_ID()); ?>
					<?php if(DEBUG) var_dump($filminfo); ?>
					<?php 
						if( $filminfo['clip'] != NULL || $filminfo['clip'][0] != "" ): 
							
							$embedurl = '';

							if( stristr($filminfo['clip'][0],'youtube') )
							{

								parse_str( parse_url( $filminfo['clip'][0], PHP_URL_QUERY ), $queryvars );
								$embedurl = 'https://youtube.com/embed/'.$queryvars['v'];
							}
							else if( stristr($filminfo['clip'][0],'vimeo') )
							{
								if( preg_match("/\/(\d+)$/",$filminfo['clip'][0],$match) )
									$embedurl = 'https://player.vimeo.com/video/'.$match[1];
							}
					?>
					<iframe src="<?php echo $embedurl; ?>" 
							width="718" 
							height="405"
							frameborder="0" 
							webkitallowfullscreen mozallowfullscreen allowfullscreen>
					</iframe> 
					<?php endif; ?>

					<div class="bb-single-film-title">
						<?php echo get_the_title(); ?>
					</div>
					<div class="bb-single-film-info">
						<?php echo $filminfo['genere'][0]; ?> - 
						<?php echo $filminfo['anno_di_produzione'][0]; ?> - 
						<?php echo $filminfo['nazionalità'][0]; ?> - 
						<?php echo $filminfo['durata'][0]; ?>' -
						Et&agrave; consigliata: <?php echo $filminfo['età_consigliata'][0]; ?>
						
					</div>

					<div class="bb-single-film-dirandcast">
						Un film di <span class="bb-heavier"><?php echo $filminfo['regia'][0]; ?></span><br>
						Con <span class="bb-heavier"><?php echo $filminfo['cast_and_credits'][0]; ?></span>.
					
						<br><br>

						<span class="bb-italic">(Sinossi) <?php echo $filminfo['sinossi'][0]; ?></span>

						<br><br>

						(Critica) <?php echo $filminfo['critica'][0]; ?>

						<br><br>

						<div class="bb-single-film-rep col-sm-10 col-md-10 col-lg-10">
							<?php echo _e('Questo film &egrave; visionabile:','cineteca-inail'); ?> <?php echo $filminfo['reperibilità'][0];?><?php if( $filminfo['note'][0] != "" ): ?>*<? endif;?>
						</div>
						<div class="bb-single-film-add-btn col-sm-2 col-md-2 col-lg-2">
							<span class="btn bb-add-film-btn"><a class="btn" onclick="cineteca_inail_addFilmToRassegna(<?php echo get_the_ID();?>)">Aggiungi alla rassegna</a></span> 
						</div>
					</div>
					<div class="bb-single-film-notes-container">
						<div class="bb-single-film-notes col-sm-10 col-md-10 col-lg-10">
							<?php if( $filminfo['note'][0] != "" ): ?>*<?php echo $filminfo['note'][0]; endif; ?>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
			<?php get_sidebar(); ?>
		</section>
</main>
<?php get_footer(); ?>


