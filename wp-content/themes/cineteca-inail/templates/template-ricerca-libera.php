<?php
/*
  Template Name: Ricerca Libera
  Description: Template ricerca libera
*/
	get_header(); 
?>
<?php

	$formitems = cineteca_inail_query_get_option_free_search();

	if( DEBUG )
		var_dump($formitems);

	if (isset($_POST['all-films'])){
		
		$filmresults = cineteca_inail_query_all_films();

	} else if( 
		isset($_POST['titolo']) 		|| isset($_POST['regia']) 		 ||
		isset($_POST['cast']) 			|| isset($_POST['nazionalita'])  ||
		isset($_POST['tematiche']) 	|| isset($_POST['tipologia']) 	 ||
		isset($_POST['genere']) 		|| isset($_POST['eta-studenti']) ||
		isset($_POST['anno_produzione'])
	){
	
		if (DEBUG){
			echo "here";
		}

		if(	
			$_POST['titolo'] != "" 						|| $_POST['anno_produzione'] != "Decennio"			||
			$_POST['regia'] != ""  	  					|| $_POST['cast'] != "" 							|| 
			$_POST['nazionalita'] != ""  				|| $_POST['tipologia'] != "Seleziona la tipologia"  ||
			$_POST['genere'] != "Seleziona il genere"	|| $_POST['eta-studenti'] != "Età consigliata"		||
			isset($_POST['tematiche'])
		){
			
			if( DEBUG ){
				echo "there";
				var_dump( $_POST );
			}

			if($_POST['titolo']=="")
				$_POST['titolo'] = NULL;

			if($_POST['regia']=="")
				$_POST['regia'] = NULL;

			if($_POST['cast']=="")
				$_POST['cast'] = NULL;

			if($_POST['nazionalita']=="")
				$_POST['nazionalita'] = NULL;

			if( $_POST['anno_produzione'] == 'Decennio' )
				$_POST['anno_produzione'] = NULL;

			if( $_POST['tipologia'] == 'Seleziona la tipologia' )
				$_POST['tipologia'] = NULL;

			if( $_POST['genere'] == 'Seleziona il genere' )
				$_POST['genere'] = NULL;

			if( $_POST['eta-studenti'] == 'Età consigliata' )
				$_POST['eta-studenti'] = NULL;

			if( $_POST['nazionalita'] == 'Indifferente' || $_POST['nazionalita'] == 'indifferente' )
				$_POST['nazionalita'] = NULL;

			if( DEBUG ){
				echo "_POST <br>";
				print_r($_POST);
			}

			if (isset($_POST['do-query'])){
				$filmresults  = cineteca_inail_query_builder( 
								$_POST['titolo'], 
								$_POST['tipologia'],
								$_POST['genere'],
								$_POST['nazionalita'],
								$_POST['regia'],
								$_POST['cast'],
								$_POST['tematiche'],
								$_POST['eta-studenti'],
								$_POST['anno_produzione'] 
							);
			} 

			$default_title	 = $_POST['titolo'];
			$default_regia	 = $_POST['regia'];
			$default_cast	 = $_POST['cast'];
			$default_country = $_POST['nazionalita'];

			$default_age 	 = $_POST['eta-studenti'];
			$default_decade	 = $_POST['anno_produzione'];
			$default_type	 = $_POST['tipologia'];
			$default_genre	 = $_POST['genere'];
			$default_theme	 = $_POST['tematiche'];
		}else{

			if (!isset($_POST['all-films'])){
				$message = "Seleziona almeno un campo!";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
		}
	}

	if( isset($filmresults) )
		wp_enqueue_style('cineteca.query.results');
?>
<main class="container bb-main-wrapper">
	<section class="row" role="content-info">
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 bb-search bb-search-free" id="bb-search-free-container">
			<div class="bb-search-free-title bb-search-title">
				<span><img src="<?php echo get_template_directory_uri().'/images/magnifier.png'; ?>" alt="lente di ingrandimento"/></span>
				<h1><?php echo _e('Ricerca libera','cineteca-inail'); ?></h1>
			</div>

			<div class="bb-search-form-container bb-search-free-form-container">
				<form method="POST" class="form">

					<div class="form-group form-inline bb-two-group">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<label class="bb-free-search-lbl" for="titolo">
								<?php echo _e('Titolo','cineteca-inail'); ?>

							</label>
							<br>
							<input  type="text" 
									class="form-control" 
									name="titolo"
								<?php if( isset($default_title) ): ?>
									value="<?php echo $default_title;?>"
								<?php endif; ?>
							/>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6">
							<label class="bb-free-search-lbl" for="regia"><?php echo _e('Regia','cineteca-inail'); ?></label>
							<br>
							<input  type="text" 
									class="form-control" 
									name="regia"
								<?php if( isset($default_regia) ): ?>
									value="<?php echo $default_regia;?>"
								<?php endif; ?>
							/>
						</div>
					</div>
					<div class="form-group form-inline bb-two-group">
						<div class="col-sm-6 col-md-6 col-lg-6 bb-free-search-second-row">
							<label class="bb-free-search-lbl" for="cast"><?php echo _e('Cast','cineteca-inail'); ?></label>
							<br>
							<input  type="text" 
									class="form-control" 
									name="cast"
								<?php if( isset($default_cast) ): ?>
									value="<?php echo $default_cast;?>"
								<?php endif; ?>
							/>
						</div>
						<div class="col-sm-6 col-md-6 col-lg-6 bb-free-search-second-row">	
							<label class="bb-free-search-lbl" for="nazionalita"><?php echo _e('Nazionalit&agrave;','cineteca-inail'); ?></label>
							<br>
							<input  type="text" 
									class="form-control" 
									name="nazionalita"
								<?php if( isset($default_country) ): ?>
									value="<?php echo $default_country;?>"
								<?php endif; ?>
							/>
						</div>
					</div>
					<div class="form-group form-inline bb-two-group bb-free-search-third-row">
						<?php 	$decade = $formitems['anno_produzione'];	?>
						<select class="form-control" name="anno_produzione">
							<option><?php echo _e('Decennio','cineteca-inail'); ?></option>
						<?php foreach( $decade as $decadeitem ) { ?>
							<option	<?php if( isset($default_decade) && $default_decade == $decadeitem ) echo "selected";?> ><?php echo $decadeitem; ?></option>
						<?php } ?>
						</select>

						<?php 	$tipology = $formitems['tipologia'];	?>
						<select class="form-control" name="tipologia">
							<option><?php echo _e('Seleziona la tipologia','cineteca-inail'); ?></option>
						<?php foreach( $tipology as $tipologyitem ) { ?>
							<option <?php if( isset($default_type) && $default_type == $tipologyitem ) echo "selected";	?> ><?php echo $tipologyitem; ?></option>
						<?php } ?>
						</select>		
					</div>
					<div class="form-group form-inline bb-two-group bb-free-search-fourth-row">
						<?php 	$genere = $formitems['genere'];	?>
						<select class="form-control" name="genere">
							<option><?php echo _e('Seleziona il genere','cineteca-inail'); ?></option>
						<?php foreach( $genere as $genereitem ) { ?>
							<option <?php if( isset($default_genre) && $default_genre == $genereitem ) echo "selected";	?> ><?php echo $genereitem; ?></option>
						<?php } ?>
						</select>
						<?php 	$age = $formitems['anni_studenti']; ?>
						<select class="form-control" name="eta-studenti">
							<option><?php echo _e('Et&agrave; consigliata','cineteca-inail'); ?></option>
						<?php foreach( $age as $ageitem ) { ?>
							<option <?php if( isset($default_age) && $default_age == $ageitem ) echo "selected"; ?> ><?php echo $ageitem; ?></option>
						<?php } ?>
						</select>
					</div>
					
					<?php $keywords = $formitems["tematiche"]; ?>
					<div class="form-group bb-free-search-keywords">
						<h2 class="bb-search-subtitle">Quali tematiche ti interessano?</h2>
						<br>
						<?php $i = 0;
							foreach( $keywords as $keyword ){ ?>
								<label for="inlineCheckbox<?php echo $i; ?>" class="checkbox-inline bb-sublbl">
									<?php echo $keyword; ?>
								</label>
								<input type="checkbox" id="inlineCheckbox<?php echo $i; ?>" name="tematiche[]" value="<?php echo $keyword; ?>">
								<span class="bb-white-space"></span>
						<?php $i++;
							}
						?>
					</div>

					<input class="btn bb-free-src-btn" name="do-query" type="submit" value="Cerca"/>			
					<input class="btn bb-free-src-all-film-btn" name="all-films" type="submit" value="Tutti i Film"/>
				</form>
			</div>
		</div>
		<?php get_sidebar(); ?>
	</section>

	<?php 
		if( isset($filmresults) )
			cineteca_inail_get_the_film_loop_from_query($filmresults,true);

		if( DEBUG && isset($filmresults) )
		{
			echo '<br><br><hr><br><br>'; /// -_-
			var_dump($filmresults);
			echo '<hr>';
		}
	?>

</main>
<?php get_footer(); ?>
