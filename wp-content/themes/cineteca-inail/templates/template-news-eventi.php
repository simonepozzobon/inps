<?php
/*
  Template Name: News ed eventi
  Description: Template news ed eventi
*/
	get_header();
?>
<?php $nepage = new WP_Query( 'cat=2,3' ); ?>
<main class="container bb-main-wrapper">
	<section class="row" role="content-info">
		
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 bb-news-event" id="bb-ne-container">
			<div class="bb-ne-container-title">
				<h1><?php _e('News & Eventi','cineteca-inail'); ?></h1>
			</div>
<?php $first = true; ?>

		<?php $postquery = new WP_Query( array( 'cat'=>'2,3', 'posts_per_page' => 10 ) );

			if( $postquery->have_posts() ):
				while( $postquery->have_posts() ) :
					$postquery->the_post();
		?>

			<?php if( $first ) : ?>

			<div class="bb-latest-film">
				<div class="bb-latest-film-image">
				<?php if( has_post_thumbnail() ): ?>
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('cineteca-inail-locandina'); ?></a>
				<?php else: ?>
					<a href="#"><img width="720" height="400" alt="default thumbnail" src="<?php echo get_template_directory_uri().'/images/greythumb.png'; ?>"/></a>
				<?php endif; ?>
				</div>

				<div class="bb-latest-film-title">
					<a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>">
						<?php echo get_the_title(); ?>
					</a>
				</div>

				<div class="bb-latest-film-excerpt">
				<?php echo the_excerpt(); ?>
				</div>
			</div>
			<?php $first = false; ?>
			<?php else: ?>	

		    <div class="row bb-query-item-row" id="bb-q-result-<?php echo get_the_ID();?>">
                <div class="col-sm-1 col-md-1 col-lg-1 bb-item-image">
                    <div class="bb-result-image-thumb">
                    <?php if( has_post_thumbnail() ): ?>
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'cineteca-inail-lilthumb' ); ?></a>
                    <?php else: ?>
                        <a href="#"><img alt="default thumbnail" width="132" height="98" src="<?php echo get_template_directory_uri().'/images/greythumb.png'; ?>"/></a>
                    <?php endif; ?>
                    </div>
                </div>
                <div class="col-sm-9 col-md-9 col-lg-9 bb-item-content-info">
                    <div class="bb-item-title">
                        <h2>
                            <a href="<?php the_permalink(); ?>" title="<?php echo get_the_title(); ?>">
                                <?php echo get_the_title(); ?>
                            </a>
                        </h2>
                    </div>
                    <div class="bb-item-excerpt">
                    	<?php echo the_excerpt(); ?>
                    </div>
                </div>
            </div>
        	<?php endif; ?>
			<?php endwhile; ?>
			
		<?php
			else:
				_e('Nessun post trovato','cineteca-inail'); 
			endif;
		?>

		</div>

	<?php get_sidebar(); ?>

	</section>
</main>
<?php get_footer(); ?>