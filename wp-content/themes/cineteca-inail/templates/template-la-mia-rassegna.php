<?php
/*
  Template Name: La mia rassegna
  Description: Template la mia rassegna
 */
	global $current_user;
	get_currentuserinfo();
	get_header();
	$riepilogo = false;
?>
<main role="main" class="container pb-5">
	<div class="row">
		<div class="col-md-8">
			<!-- Parte Centrale -->

				<div class="row">
					<div class="col">
						<div class="row bb-home-sect-title">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="row">
							<div id="content" class="col content">
								<?php if( !is_user_logged_in() ): ?>
										<div class="bb-must-login" id="bb-must-login-title"><?php _e('Per proseguire devi essere registrato','cineteca_inail'); ?></div>
								<?php else: ?>
									<!-- Contenuto della rassegna -->
									<div class="bb-rassegna-content" id="bb-rassegna-list-query-container">
									</div>

									<div class="confirm d-flex justify-content-center">
										<a href="<?php echo get_the_permalink(103); ?>" class="btn btn-lg btn-light">Conferma e Prosegui</a>
									</div>
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
