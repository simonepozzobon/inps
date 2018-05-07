<?php get_header(); ?>
<main role="main" class="container bb-main-wrapper">
	<?php if (have_posts()): while (have_posts()) : the_post(); ?>

		<section role="contentinfo" id="post-<?php the_ID(); ?>" <?php post_class("col-xs-12 col-sm-9 col-md-9 col-lg-9 bb-the-page");?>>
			<div class="bb-page-title">
				<h1><?php the_title(); ?></h1>
			</div>

			<div class="bb-page-content">
				<?php the_content(); ?>
			</div>
			<br class="clear">
		</section>
		<?php get_sidebar(); ?>
	<?php endwhile; ?>
	<?php else: ?>
		
		<section role="contentinfo">
			<h2><?php _e( '404 Pagina non trovata', 'cineteca-inail' ); ?></h2>
		</section>

	<?php endif; ?>
</main>
<?php get_footer(); ?>