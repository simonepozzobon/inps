<aside class="hidden-xs col-md-3 bb-sidebar">
	
	<?php if( !is_front_page() ): ?>
	<section class="row bb-mia-rassegna bb-lil-block">
		<span class="bb-rass-tit"><img alt="Pellicola cinematografica" src="<?php echo get_template_directory_uri().'/images/film.png'?>"/></span> La mia rassegna
		<br>
		<span class="bb-rass-lilrow"><?php _e('Film aggiunti', 'cineteca-inail'); ?> </span><span class="bb-numeric" id="bb-num-film-added"></span>
		<br>
		<span class="bb-rass-lilrow"><?php _e('Puoi sceglierne altri', 'cineteca-inail'); ?> </span><span class="bb-numeric" id="bb-num-film-remain"></span>
		<br>
		<span class="btn bb-edit-btn"><a class="btn" href="<?php echo get_the_permalink(101); ?>"><?php _e('Modifica rassegna','cineteca-inail'); ?></a></span>
		<span class="btn bb-go-on-btn"><a class="btn" href="<?php echo get_the_permalink(103); ?>"><?php _e('Prosegui','cineteca-inail'); ?></a></span>
	</section>
	<?php endif; ?>
	
	<section class="row bb-free-s bb-lil-block">
		<a href="<?php echo get_the_permalink(18); ?>" title="Ricerca libera">
			<span>
				<img alt="Lente di ingrandimento" src="<?php echo get_template_directory_uri().'/images/magnifier.png'?>"/>
			</span> <span class="bb-sidebar-block-title"><?php _e('Ricerca Libera','cineteca-inail'); ?></span>
		</a>
	</section>
	<section class="row bb-guid-s bb-lil-block">
		<a href="<?php echo get_the_permalink(16); ?>" title="Ricerca guidata">
			<span>
				<img alt="Lente di ingrandimento" src="<?php echo get_template_directory_uri().'/images/magnifier.png'?>"/>
			</span> <span class="bb-sidebar-block-title"><?php _e('Ricerca Guidata','cineteca-inail'); ?></span>
		</a>
	</section>
	
	<section class="row bb-reglog bb-lil-block">
		<a href="<?php echo get_the_permalink(20); ?>" title="Registrati o effettua il login">
			<span class="col-md-2 col-lg-2 col-sm-2 bb-lock-span"><img alt="Lucchetto" src="<?php echo get_template_directory_uri().'/images/lock.png'?>"/></span>
			<span class="col-md-offset-1 col-lg-offset-1 col-sm-offset-1 col-md-9 col-lg-9 col-sm-9 bb-sidebar-block-title"> <?php _e('Registrazione e login','cineteca-inail'); ?></span>
		</a>
		<br><br>
		<p id="bb-sidebar-logintext">Per effettuare le ricerche e accedere ai servizi occorre registrarsi.<br>&Egrave; gratuito.</p>
	</section>

</aside>