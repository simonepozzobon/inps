<aside class="hidden-xs bb-sidebar">

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

	<div class="row">
		<div class="col bb-lil-block bg-primary">
			<div class="icon">
				<svg width="24px" height="24px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <g class="search-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g class="icon">
				            <path d="M43.1429062,27.1428871 C43.1429062,18.321448 35.9643262,11.142868 27.1428871,11.142868 C18.321448,11.142868 11.142868,18.321448 11.142868,27.1428871 C11.142868,35.9643262 18.321448,43.1429062 27.1428871,43.1429062 C35.9643262,43.1429062 43.1429062,35.9643262 43.1429062,27.1428871 Z M61.4286423,56.8572083 C61.4286423,59.3572112 59.3572112,61.4286423 56.8572083,61.4286423 C55.6429211,61.4286423 54.4643483,60.9286417 53.6429187,60.0714978 L41.3929041,47.8571975 C37.2143277,50.7500581 32.2143217,52.2857742 27.1428871,52.2857742 C13.2500134,52.2857742 2,41.0357608 2,27.1428871 C2,13.2500134 13.2500134,2 27.1428871,2 C41.0357608,2 52.2857742,13.2500134 52.2857742,27.1428871 C52.2857742,32.2143217 50.7500581,37.2143277 47.8571975,41.3929041 L60.1072121,53.6429187 C60.9286417,54.4643483 61.4286423,55.6429211 61.4286423,56.8572083 Z" id="search---FontAwesome"></path>
				        </g>
				    </g>
				</svg>
			</div>
			<div class="link">
				<a href="<?php echo get_the_permalink(18); ?>" title="Ricerca libera">
					<span class="text-white"><?php _e('Ricerca Libera','cineteca-inail'); ?></span>
				</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col bb-lil-block bg-teal">
			<div class="icon">
				<svg width="24px" height="24px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <g class="search-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g class="icon">
				            <path d="M43.1429062,27.1428871 C43.1429062,18.321448 35.9643262,11.142868 27.1428871,11.142868 C18.321448,11.142868 11.142868,18.321448 11.142868,27.1428871 C11.142868,35.9643262 18.321448,43.1429062 27.1428871,43.1429062 C35.9643262,43.1429062 43.1429062,35.9643262 43.1429062,27.1428871 Z M61.4286423,56.8572083 C61.4286423,59.3572112 59.3572112,61.4286423 56.8572083,61.4286423 C55.6429211,61.4286423 54.4643483,60.9286417 53.6429187,60.0714978 L41.3929041,47.8571975 C37.2143277,50.7500581 32.2143217,52.2857742 27.1428871,52.2857742 C13.2500134,52.2857742 2,41.0357608 2,27.1428871 C2,13.2500134 13.2500134,2 27.1428871,2 C41.0357608,2 52.2857742,13.2500134 52.2857742,27.1428871 C52.2857742,32.2143217 50.7500581,37.2143277 47.8571975,41.3929041 L60.1072121,53.6429187 C60.9286417,54.4643483 61.4286423,55.6429211 61.4286423,56.8572083 Z" id="search---FontAwesome"></path>
				        </g>
				    </g>
				</svg>
			</div>
			<div class="link">
				<a href="<?php echo get_the_permalink(16); ?>" title="Ricerca libera">
					<span class="text-white"><?php _e('Ricerca Guidata','cineteca-inail'); ?></span>
				</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col bb-lil-block bg-info">
			<div class="icon">
				<svg width="24px" height="24px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <g class="lock-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g class="icon">
				            <path d="M21.4090909,29.8181818 L42.8636364,29.8181818 L42.8636364,21.7727273 C42.8636364,15.8643466 38.0447443,11.0454545 32.1363636,11.0454545 C26.227983,11.0454545 21.4090909,15.8643466 21.4090909,21.7727273 L21.4090909,29.8181818 Z M56.2727273,33.8409091 L56.2727273,57.9772727 C56.2727273,60.1981534 54.4708807,62 52.25,62 L12.0227273,62 C9.80184659,62 8,60.1981534 8,57.9772727 L8,33.8409091 C8,31.6200284 9.80184659,29.8181818 12.0227273,29.8181818 L13.3636364,29.8181818 L13.3636364,21.7727273 C13.3636364,11.4644886 21.828125,3 32.1363636,3 C42.4446023,3 50.9090909,11.4644886 50.9090909,21.7727273 L50.9090909,29.8181818 L52.25,29.8181818 C54.4708807,29.8181818 56.2727273,31.6200284 56.2727273,33.8409091 Z" id="lock---FontAwesome"></path>
				        </g>
				    </g>
				</svg>
			</div>
			<div class="link">
				<a href="<?php echo get_the_permalink(20); ?>" title="Ricerca libera">
					<span class="text-white"><?php _e('Registrazione e login','cineteca-inail'); ?></span>
				</a>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col bb-lil-block">
			<p id="bb-sidebar-logintext">Per effettuare le ricerche e accedere ai servizi occorre registrarsi.<br>&Egrave; gratuito.</p>
		</div>
	</div>

</aside>
