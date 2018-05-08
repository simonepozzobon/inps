<?php

function cineteca_inail_get_the_film_loop_from_query($loop,$add)
{
?>
	<section class="row" role="content-info">
		<div class="col-12 bb-query-container">
<?php
	$uid = cineteca_inail_generate_uid();
	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<?php $postinfo = cineteca_inail_get_film_info_from_id(get_the_ID()); ?>
			<div class="row bb-query-result-row pb-5" id="bb-q-result-<?php echo get_the_ID();?>">
				<div class="col-md-4">
					<div class="bb-result-image-thumb">
						<?php if( has_post_thumbnail() ): ?>
							<a href="<?php the_permalink(); ?>">
								<img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" />
							</a>
						<?php else: ?>
							<a href="#">
								<img class="img-fluid" alt="default thumbnail" src="<?php echo get_template_directory_uri().'/images/greythumb.png'; ?>"/>
							</a>
						<?php endif; ?>
					</div>
				</div>
				<div class="col-md-8">
					<div class="bb-result-title">
						<h2>
							<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
								<?php echo get_the_title(); ?>
							</a>
						</h2>
					</div>
					<div class="bb-result-info">
						<?php echo $postinfo['genere'][0]; ?> -
						<?php echo $postinfo['anno_di_produzione'][0]; ?> -
						<?php echo $postinfo['nazionalità'][0]; ?> -
						<?php echo $postinfo['durata'][0]; ?>' -
						Et&agrave; consigliata: <?php echo $postinfo['età_consigliata'][0]; ?>
					</div>
					<div class="bb-result-dirandcast">
						Un film di <span class="bb-heavier"><?php echo $postinfo['regia'][0];?></span><br>
						Con <span class="bb-heavier"><?php echo $postinfo['cast_and_credits'][0]; ?></span>
					</div>
					<div class="buttons pt-3">
						<?php if($add): ?>
							<div class="bb-add-btn">
								<a class="btn btn-light" onclick="cineteca_inail_addFilmToRassegna(<?php echo get_the_ID();?>,<?php echo $uid;?>)">Aggiungi alla rassegna</a>
							</div>
						<?php else: ?>
							<div class="bb-remove-btn">
								<a class="btn btn-danger text-white" onclick="cineteca_inail_removeFilmFromRassegna(<?php echo get_the_ID();?>,<?php echo $uid;?>)">Rimuovi</a>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		</div>

		<?php if (  $loop->max_num_pages > 1 ) : ?>
			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous', 'domain' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'domain' ) ); ?></div>
			</div>
		<?php endif;
	else:
?>
	<div class="bb-query-result-row">
		<h2 class="bb-query-no-result">
			<?php echo _e('Nessun risultato trovato','cineteca-inail'); ?>
		</h2>
	</div>
<?php
	endif;
?>
	</section>

<?php
	wp_reset_postdata();
}

function cineteca_inail_get_the_5_film_rand_loop_from_query($loop,$add){
?>
	<section class="row" role="content-info">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 bb-query-container">
<?php
	$uid = cineteca_inail_generate_uid();
	if ( $loop->have_posts() ) :

		if( DEBUG )
			echo "total post returned: ".$loop->post_count."<br>";

		$count = -1;
		$random_numbers = array();

		if( $loop->post_count > 5 )
		{
			while(sizeof($random_numbers) < 5)
			{
				$r = rand(0,$loop->post_count-1);
				if( !in_array($r, $random_numbers) )
					array_push($random_numbers,$r);
			}
		}

		while ( $loop->have_posts() ) : $loop->the_post();

			if( $loop->post_count > 5 )
			{
				$count++;
				if( !in_array($count, $random_numbers) )
					continue;
			}
		?>
			<?php $postinfo = cineteca_inail_get_film_info_from_id(get_the_ID()); ?>
			<div class="row bb-query-result-row" id="bb-q-result-<?php echo get_the_ID();?>">
				<div class="col-sm-1 col-md-1 col-lg-1 bb-result-image">
					<div class="bb-result-image-thumb">
					<?php if( has_post_thumbnail() ): ?>
						<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(132,98)); ?></a>
					<?php else: ?>
						<a href="#"><img alt="default thumbnail" src="<?php echo get_template_directory_uri().'/images/greythumb.png'; ?>"/></a>
					<?php endif; ?>
					</div>
				</div>
				<div class="col-sm-9 col-md-9 col-lg-9 bb-result-content-info">
					<div class="bb-result-title">
						<h2>
							<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
								<?php echo get_the_title(); ?>
							</a>
						</h2>
					</div>
					<div class="bb-result-info">
						<?php echo $postinfo['genere'][0]; ?> -
						<?php echo $postinfo['anno_di_produzione'][0]; ?> -
						<?php echo $postinfo['nazionalità'][0]; ?> -
						<?php echo $postinfo['durata'][0]; ?>' -
						Et&agrave; consigliata: <?php echo $postinfo['età_consigliata'][0]; ?>
					</div>

					<div class="bb-result-dirandcast">
						Un film di <span class="bb-heavier"><?php echo $postinfo['regia'][0];?></span><br>
						Con <span class="bb-heavier"><?php echo $postinfo['cast_and_credits'][0]; ?></span>.
					</div>
					<?php if($add): ?>
					<span class="btn bb-add-btn"><a class="btn" onclick="cineteca_inail_addFilmToRassegna(<?php echo get_the_ID();?>,<?php echo $uid;?>)">Aggiungi alla rassegna</a></span>
					<?php else: ?>
					<span class="btn bb-remove-btn"><a class="btn" onclick="cineteca_inail_removeFilmFromRassegna(<?php echo get_the_ID();?>,<?php echo $uid;?>)">Rimuovi</a></span>
					<?php endif; ?>
				</div>
			</div>
		<?php endwhile; ?>
		</div>

		<?php if (  $loop->max_num_pages > 1 ) : ?>
			<div id="nav-below" class="navigation">
				<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Previous', 'domain' ) ); ?></div>
				<div class="nav-next"><?php previous_posts_link( __( 'Next <span class="meta-nav">&rarr;</span>', 'domain' ) ); ?></div>
			</div>
		<?php endif;
	else:
?>
	<div class="bb-query-result-row">
		<h2 class="bb-query-no-result">
			<?php echo _e('Nessun risultato trovato','cineteca-inail'); ?>
		</h2>
	</div>
<?php
	endif;
?>
	</section>

<?php
	wp_reset_postdata();
}

function cineteca_inail_get_the_film_title_loop_from_query($loop)
{
?>
	<section class="row" role="content-info">
		<div class="bb-riepilogo-query-container">
<?php
	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
			<div class="row bb-query-result-only-title-row" id="bb-q-result-<?php echo get_the_ID();?>">
				<div class="bb-result-only-title">
					<h2>
						<a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
							<?php echo get_the_title(); ?>
						</a>
					</h2>
				</div>
			</div>
	<?php endwhile; ?>
		</div>
<?php else:
?>
	<div class="bb-query-result-row">
		<h2 class="bb-query-no-result">
			<?php echo _e('Nessun risultato trovato','cineteca-inail'); ?>
		</h2>
	</div>
<?php
	endif;
?>
	</section>
<?php
	wp_reset_postdata();
}

function cineteca_inail_get_film_loop_for_mail($loop)
{
?>
	<ul>
<?php
	if ( $loop->have_posts() ) :
		while ( $loop->have_posts() ) : $loop->the_post(); ?>
?>
		<li><a href="<?php echo the_permalink();?>"><?php echo get_the_title(); ?></a></li>
	<?php endwhile; ?>
<?php endif; ?>
	</ul>
<?php
	wp_reset_postdata();
}

?>
