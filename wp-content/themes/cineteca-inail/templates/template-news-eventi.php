<?php
/*
  Template Name: News ed eventi
  Description: Template news ed eventi
*/
	get_header();
?>
<?php $nepage = new WP_Query( 'cat=2,3' ); ?>
<main role="main" class="container pb-5">
	<div class="row">
		<div class="col-md-8">
			<!-- Parte Centrale -->
			<div class="row">
				<div class="col">
					<div class="row bb-single-post-title">
						<h1><?php _e('News & Eventi','cineteca-inail'); ?></h1>
					</div>
					<div class="row bb-single-post-image pt-3">
					</div>
					<div class="row">
						<div class="col">

							<?php $first = true; ?>
							<?php $postquery = new WP_Query( array( 'cat'=>'2,3', 'posts_per_page' => 10 ) );
								if( $postquery->have_posts() ):
									while( $postquery->have_posts() ) :
										$postquery->the_post();
							?>

								<?php if( $first ) : ?>
									<div class="row">
										<div class="bb-first-event-image">
											<?php if( has_post_thumbnail() ): ?>
												<a href="<?php the_permalink(); ?>">
													<img class="img-fluid" src="<?php the_post_thumbnail_url('cineteca-inail-locandina'); ?>" />
												</a>
											<?php else: ?>
												<a href="#"><img alt="default thumbnail" src="<?php echo get_template_directory_uri().'/images/greythumb.png'; ?>"/></a>
											<?php endif; ?>
										</div>
										<div class="bb-first-event-title">
											<a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>">
												<?php echo get_the_title(); ?>
											</a>
										</div>
										<div class="bb-first-event-excerpt">
											<?php echo the_excerpt(); ?>
										</div>
									</div>
									<?php $first = false; ?>

								<?php else: ?>
									<div class="row">
										<div class="col-md-4">
											<div class="bb-event-list-image">
												<?php if( has_post_thumbnail() ): ?>
													<a href="<?php the_permalink(); ?>">
														<img class="img-fluid" src="<?php the_post_thumbnail_url('cineteca-inail-locandina'); ?>" />
													</a>
												<?php else: ?>
													<a href="#"><img alt="default thumbnail" src="<?php echo get_template_directory_uri().'/images/greythumb.png'; ?>"/></a>
												<?php endif; ?>
											</div>
										</div>
										<div class="col-md-8">
											<div class="bb-event-list-title">
												<a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>">
													<?php echo get_the_title(); ?>
												</a>
											</div>
											<div class="bb-event-list-excerpt">
												<?php echo the_excerpt(); ?>
											</div>
										</div>
									</div>
								<?php endif; ?>

							<?php endwhile; ?>

							<?php else: ?>
								<?php _e('Nessun post trovato','cineteca-inail'); ?>
							<?php endif; ?>

						</div>
					</div>
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
