<?php 
/*
 * Single template for posts
 */
	get_header(); 
?>
<main class="container bb-main-wrapper">
	<section class="row" role="content-info">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 bb-single-post" id="bb-single-post-container">
			
		<?php while ( have_posts() ) : the_post(); ?>
		
			<div class="bb-single-post-image">
			<?php if( has_post_thumbnail() ): ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('cineteca-inail-locandina'); ?></a>
			<?php else: ?>
				<a href="#"><img width="720" height="400" alt="default thumbnail" src="<?php echo get_template_directory_uri().'/images/greythumb.png'; ?>"/></a>
			<?php endif; ?>
			</div>

			<div class="bb-single-post-title">
				<?php echo get_the_title(); ?>
			</div>
			
			<div class="bb-single-post-content">
				<?php echo the_content(); ?>
			</div>	

			<?php endwhile; ?>
		</div>
		<?php get_sidebar(); ?>
	</section>
</main>
<?php get_footer(); ?>


