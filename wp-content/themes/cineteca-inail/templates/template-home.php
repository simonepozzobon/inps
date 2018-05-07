<?php
/*
  Template Name: Homepage
  Description: Template home
*/
	get_header();
?>
	<main class="container bb-main-wrapper">
		<section class="row" role="content-info">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 bb-slider">
				<?php if ( function_exists( 'easingslider' ) ) { easingslider( 99 ); } ?>
			</div>
			<?php get_sidebar(); ?>
		</section>

		<section class="bb-custom-row" role="content-info">
			<div class="bb-posts-home col-lg-12">
				<div class="bb-posts-home-title">
					<h1><?php _e('News ed eventi','cineteca-inail'); ?></h1>
				</div>
			<?php
				$queryargs = array('posts_per_page' => 1,'category_name'=>'eventi');
				$the_query = new WP_Query( $queryargs );
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
			?>
				<div class="col-sm-4 col-md-4 col-lg-4 bb-posts-home-single">
					<div class="row bb-posts-home-single-sect-title">
						<?php _e('IN PROGRAMMA','cineteca-inail'); ?>
					</div>
					<div class="row bb-posts-home-single-image">
						<a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>">
				<?php if( has_post_thumbnail() ): ?>
							<?php echo the_post_thumbnail('cineteca-inail-thumb');?>
				<?php else:  ?>
							<img alt="Default thumbnail" width="240" height="150" src="<?php echo get_template_directory_uri().'/images/greythumb.png'; ?>" />
				<?php endif; ?>
						</a>
					</div>
					<div class="row bb-posts-home-single-title">
						<a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>">
							<?php echo get_the_title();?>
						</a>
					</div>
					<div class="row bb-posts-home-single-excerpt">
						<?php the_excerpt();?>
					</div>
				</div>
			<?php
				endwhile;
				wp_reset_query();
				wp_reset_postdata();
			?>
			<?php
				$queryargs = array('posts_per_page' => 1,'post_type'=>'film');
				$the_query = new WP_Query( $queryargs );
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
					$filminfo = cineteca_inail_get_film_info_from_id(get_the_ID());
			?>
				<div class="col-sm-4 col-md-4 col-lg-4 bb-posts-home-single">
					<div class="row bb-posts-home-single-sect-title">
						<?php _e('ULTIMI ARRIVI','cineteca-inail'); ?>
					</div>

					<div class="row bb-posts-home-single-image">
						<a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>">
				<?php if( has_post_thumbnail() ): ?>
							<?php echo the_post_thumbnail('cineteca-inail-thumb');?>
				<?php else:  ?>
							<img alt="Default thumbnail" width="240" height="150" src="<?php echo get_template_directory_uri().'/images/greythumb.png'; ?>" />
				<?php endif; ?>
						</a>
					</div>
					<div class="row bb-posts-home-single-title">
						<a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>">
							<?php echo get_the_title();?>
						</a>
					</div>
					<div class="row bb-posts-home-single-excerpt">
						<?php echo cineteca_inail_get_custom_excerpt($filminfo['sinossi'][0],0,250); ?>
					</div>
				</div>
			<?php
				endwhile;
				wp_reset_query();
				wp_reset_postdata();
			?>
			<?php
				$queryargs = array('posts_per_page' => 1,'category_name'=>'news');
				$the_query = new WP_Query( $queryargs );
				while ( $the_query->have_posts() ) :
					$the_query->the_post();
			?>
				<div class="col-sm-4 col-md-4 col-lg-4 bb-posts-home-single">
					<div class="row bb-posts-home-single-sect-title">
						<?php _e('IN PRIMO PIANO','cineteca-inail'); ?>
					</div>

					<div class="row bb-posts-home-single-image">
						<a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>">
				<?php if( has_post_thumbnail() ): ?>
							<?php echo the_post_thumbnail('cineteca-inail-thumb');?>
				<?php else:  ?>
							<img alt="Default thumbnail" width="240" height="150" src="<?php echo get_template_directory_uri().'/images/greythumb.png'; ?>" />
				<?php endif; ?>
						</a>
					</div>

					<div class="row bb-posts-home-single-title">
						<a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>">
							<?php echo get_the_title();?>
						</a>
					</div>
					<div class="row bb-posts-home-single-excerpt">
						<?php the_excerpt();?>
					</div>
				</div>
			<?php
				endwhile;
				wp_reset_query();
				wp_reset_postdata();
			?>
			</div>

			<div class="row bb-project col-sm-2 col-md-2 col-lg-2">
			<?php
				$query = new WP_Query('page_id=14');
				while( $query->have_posts() ):
					$query->the_post();
			?>
				<div class="row bb-project-title">
					<a href="<?php echo get_the_permalink();?>" title="<?php echo get_the_title();?>"><?php _e('Il progetto in breve','cineteca-inail'); ?></a>
				</div>
				<div class="row bb-project-excerpt">
					<?php echo cineteca_inail_get_custom_excerpt(get_the_content(), 0, 450); ?>
				</div>
			<?php
				endwhile;
				wp_reset_query();
				wp_reset_postdata();
			?>
			</div>
		</section>
	</main>

<?php get_footer(); ?>