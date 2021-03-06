<?php	get_header(); ?>
<main role="main" class="container pb-5">
	<div class="row">
		<div class="col-md-8">
			<!-- Parte Centrale -->
			<?php if (have_posts()): while (have_posts()) : the_post(); ?>

				<div id="post-<?php the_ID(); ?>" class="row">
					<div class="col">
						<div class="row bb-single-post-title">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="row bb-single-post-image pt-3">
							<?php if( has_post_thumbnail() ): ?>
								<img src="<?php the_post_thumbnail_url('cineteca-inail-locandina'); ?>" />
							<?php else: ?>
								<a href="#">
									<img class="img-fluid" width="720" height="400" alt="default thumbnail" src="<?php echo get_template_directory_uri().'/images/greythumb.png'; ?>"/>
								</a>
							<?php endif; ?>
						</div>
						<div class="row">
							<div id="content" class="col content">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				</div>

			<?php endwhile; ?>
			<?php else: ?>
				<div class="row">
					<div class="col">
						<div class="row bb-home-sect-title">
							<h2><?php _e( '404 Pagina non trovata', 'cineteca-inail' ); ?></h2>
						</div>
					</div>
				</div>
			<?php endif; ?>
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
