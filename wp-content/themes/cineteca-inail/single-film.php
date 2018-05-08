<?php
/*
 * Single template for Film custom post type
 */
	get_header();
?>
<main role="main" class="container pb-5">
	<div class="row">
		<div class="col-md-8">
			<!-- Parte Centrale -->
				<?php while ( have_posts() ) : the_post(); ?>
					<div class="row">
						<div class="col">
							<div class="row bb-home-sect-title">
								<h1><?php echo get_the_title(); ?></h1>
							</div>
							<div class="row">
								<div id="content" class="col content-film">
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
										<div class="embed-responsive embed-responsive-16by9 w-100">
											<iframe class="embed-responsive-item" src="<?php echo $embedurl; ?>" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
										</div>

										<br>

										<div class="bb-single-film-rep bg-light p-2">
											<b><?php echo _e('Questo film &egrave; visionabile:','cineteca-inail'); ?> <?php echo $filminfo['reperibilità'][0];?><?php if( $filminfo['note'][0] != "" ): ?>*<? endif;?></b>
										</div>
										<div class="bb-single-film-info pt-3">
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

											<h2>Sinossi</h2>
											<span class="bb-italic">
												<?php echo $filminfo['sinossi'][0]; ?>
											</span>

											<br><br>

											<h2>Critica</h2>
											<?php echo $filminfo['critica'][0]; ?>


											<div class="bb-single-film-add-btn d-flex justify-content-center pt-3">
													<a class="btn btn-lg btn-light" onclick="cineteca_inail_addFilmToRassegna(<?php echo get_the_ID();?>)">Aggiungi alla rassegna</a>
											</div>
										</div>
										<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>

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

<main class="container bb-main-wrapper">
		<section class="row" role="content-info">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 bb-single-film" id="bb-single-film-container">





					<div class="bb-single-film-notes-container">
						<div class="bb-single-film-notes col-sm-10 col-md-10 col-lg-10">
							<?php if( $filminfo['note'][0] != "" ): ?>*<?php echo $filminfo['note'][0]; endif; ?>
						</div>
					</div>
			</div>
		</section>
</main>
<?php get_footer(); ?>
