<footer class="row bb-footer-wrapper">

	<?php
		$args = array(
			'order'					 => 'ASC',
			'orderby'				 => 'menu_order',
			'post_type'				 => 'nav_menu_item',
			'post_status'			 => 'publish',
			'output'				 => ARRAY_A,
			'output_key'			 => 'menu_order',
			'nopaging'				 => true,
			'update_post_term_cache' => false
		);
		$items = wp_get_nav_menu_items( 'MenuFooter', $args );
	?>

	<div id="footer" class="col-12 bg-light">
		<div class="bb-footer-logos">
			<img class="bb-footer-image py-3" alt="logo sito" src="<?php echo get_template_directory_uri().'/images/logosito.png';?>"/>
			<img class="bb-footer-image py-3" alt="logo Inail" src="<?php echo get_template_directory_uri().'/images/InailLogo.png';?>"/>
			<img class="bb-footer-image py-3" alt="logo Cineteca Milano" src="<?php echo get_template_directory_uri().'/images/CinetecaLogo.png';?>"/>
		</div>
		<div class="bb-footer-links">
			<?php foreach ($items as $item) { ?>
				<div class="bb-footer-link">
					<a title="" href="<?php echo $item->url; ?>" class="bb-footer-menu-link">
						<?php echo $item->title; ?>
					</a>
				</div>
			<?php } ?>

		</div>
	</div>

	<div id="subfooter" class="col-12 bg-light">
		LO<b>SPETTACOLO</b>DELLA<b>SICUREZZA</b> &copy; <?php echo date('Y')?> - INAIL e FONDAZIONE CINETECA ITALIANA <a title="termini e condizioni" href="<?php echo get_the_permalink(122);?>">Termini e condizioni d'uso</a>
	</div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
