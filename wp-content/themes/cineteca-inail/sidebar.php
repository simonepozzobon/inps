<aside class="hidden-xs bb-sidebar">

	<?php if( !is_front_page() ): ?>
	<div class="row">
		<div class="col bb-lil-block bg-orange">
			<div class="icon cine">
				<svg width="24px" height="24px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
				    <g class="cine-icon" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g class="cine">
				            <path class="icon" d="M32,10.75 C20.28125,10.75 10.75,20.28125 10.75,32 C10.75,43.71875 20.28125,53.25 32,53.25 C43.71875,53.25 53.25,43.71875 53.25,32 C53.25,20.28125 43.71875,10.75 32,10.75 Z M62,32 C62,48.5625 48.5625,62 32,62 C15.4375,62 2,48.5625 2,32 C2,15.4375 15.4375,2 32,2 C48.5625,2 62,15.4375 62,32 Z"></path>
				            <circle class="icon" cx="32" cy="20" r="6"></circle>
				            <circle class="icon" cx="32" cy="44" r="6"></circle>
				            <circle class="icon" cx="20" cy="32" r="6"></circle>
				            <circle class="icon" cx="44" cy="32" r="6"></circle>
				            <circle class="icon" cx="32" cy="32" r="2"></circle>
				        </g>
				    </g>
				</svg>
			</div>
			<div class="link">
				<div class="title">La mia rassegna</div>
				<div class="lil-row">
					<?php _e('Film aggiunti', 'cineteca-inail'); ?> <span class="bb-numeric" id="bb-num-film-added"></span>
				</div>
				<div class="lil-row">
					<?php _e('Puoi sceglierne altri', 'cineteca-inail'); ?> <span class="bb-numeric" id="bb-num-film-remain"></span>
				</div>
				<div class="bb-btn bb-edit-btn pt-3">
					<a class="btn btn-light btn-block" href="<?php echo get_the_permalink(101); ?>"><?php _e('Modifica rassegna','cineteca-inail'); ?></a>
				</div>
				<div class="bb-btn bb-go-on-btn pt-3">
					<a class="btn btn-light btn-block" href="<?php echo get_the_permalink(103); ?>"><?php _e('Prosegui','cineteca-inail'); ?></a>
				</div>
			</div>
		</div>
	</div>
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
				    <g class="help-search" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
				        <g class="icon">
				            <path d="M27.0718,16.0742 C31.5688,16.0742 35.2168,19.7222 35.2168,24.2192 C35.2168,28.7162 31.5688,32.3652 27.0718,32.3652 C22.5748,32.3652 18.9258,28.7162 18.9258,24.2192 C18.9258,19.7222 22.5748,16.0742 27.0718,16.0742 M39.9118,36.7432 C39.0128,33.5082 37.1748,31.0072 33.7108,31.0072 C31.9928,32.6832 29.6598,33.7222 27.0718,33.7222 C24.4838,33.7222 22.1508,32.6832 20.4318,31.0072 C17.0198,31.0072 15.1838,33.4372 14.2708,36.6042 C12.3148,33.9502 11.1428,30.6842 11.1428,27.1432 C11.1428,18.3212 18.3218,11.1432 27.1428,11.1432 C35.9648,11.1432 43.1428,18.3212 43.1428,27.1432 C43.1428,30.7462 41.9308,34.0652 39.9118,36.7432 M60.1078,53.6422 L47.8578,41.3922 C50.7498,37.2142 52.2858,32.2142 52.2858,27.1432 C52.2858,13.2502 41.0358,2.0002 27.1428,2.0002 C13.2498,2.0002 1.9998,13.2502 1.9998,27.1432 C1.9998,41.0362 13.2498,52.2862 27.1428,52.2862 C32.2148,52.2862 37.2148,50.7502 41.3928,47.8572 L53.6428,60.0712 C54.4648,60.9282 55.6428,61.4282 56.8578,61.4282 C59.3578,61.4282 61.4288,59.3572 61.4288,56.8572 C61.4288,55.6422 60.9288,54.4652 60.1078,53.6422" id="Fill-1"></path>
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
