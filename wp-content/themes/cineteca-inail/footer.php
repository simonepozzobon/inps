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


	<div class="bb-footer-item bb-footer-logos col-sm-1 col-md-1 col-lg-1">
		<img class="bb-footer-image" alt="logo sito" src="<?php echo get_template_directory_uri().'/images/logosito.png';?>"/>
		<img class="bb-footer-image" alt="logo Inail" src="<?php echo get_template_directory_uri().'/images/InailLogo.png';?>"/>
		<img class="bb-footer-image" alt="logo Cineteca Milano" src="<?php echo get_template_directory_uri().'/images/CinetecaLogo.png';?>"/>
	</div>
	<?php for( $i = 0; $i < count($items); $i++ ) { ?>
	<div class="bb-footer-item col-sm-1 col-md-1 col-lg-1">
		<div class="bb-footer-lineup">
		<a title="" href="<?php echo $items[$i]->url; ?>" class="bb-footer-menu-link">
		<?php echo $items[$i]->title; ?>
		</a>
		</div>
	</div>

	<?php } ?>
	<div id="bb-footer-copy">
		LO<span class="bb-heavier">SPETTACOLO</span>DELLA<span class="bb-heavier">SICUREZZA</span> &copy; <?php echo date('Y')?> - INAIL e FONDAZIONE CINETECA ITALIANA <span id="bb-condition"><a title="termini e condizioni" href="<?php echo get_the_permalink(122);?>">Termini e condizioni d'uso</a></span>
	</div>

</footer>

<?php wp_footer(); ?>
</body>
</html>
