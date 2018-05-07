<?php
/*
  Template Name: Ricerca Guidata
  Description: Template ricerca guidata
*/
	get_header(); 
?>
<?php 
	$formitems = cineteca_inail_query_get_option_guid_search();

	if( DEBUG )
		var_dump($formitems);

	if( isset($_POST['anni-studenti'])	 || isset($_POST['tematiche'])  || 
		isset($_POST['nazionalita']) 	 || isset($_POST['genere']) 	|| 
		isset($_POST['anno_produzione']) || isset($_POST['tipologia']) 
	)
	{
		if(
			$_POST['anno_produzione'] != "Seleziona il decennio di produzione"	|| $_POST['anni-studenti'] != "Seleziona l\'età"   ||
			$_POST['nazionalita'] != "Seleziona il paese di produzione"			|| $_POST['tipologia'] != "Seleziona la tipologia" ||
			$_POST['genere'] != "Seleziona il genere"							|| isset($_POST['tematiche'])				 	
		)
		{
			if( $_POST['anni-studenti'] == "Seleziona l\'età")
				$_POST['anni-studenti'] = NULL;
			
			if( $_POST['nazionalita'] == 'Indifferente' || $_POST['nazionalita'] == 'Seleziona il paese di produzione' )
				$_POST['nazionalita'] = NULL;

			if( $_POST['anno_produzione'] == 'Seleziona il decennio di produzione' )
				$_POST['anno_produzione'] = NULL;

			if( $_POST['tipologia'] == 'Seleziona la tipologia' )
				$_POST['tipologia'] = NULL;

			if( $_POST['genere'] == 'Seleziona il genere' )
				$_POST['genere'] = NULL;


			$filmresults = cineteca_inail_query_builder(
							NULL, 
							$_POST['tipologia'],
							$_POST['genere'],
							$_POST['nazionalita'],
							NULL,
							NULL,
							$_POST['tematiche'],
							$_POST['anni-studenti'],
							$_POST['anno_produzione'] 
						);

			if( DEBUG )
				var_dump( $_POST );

			$default_age 	 = $_POST['anni-studenti'];
			$default_country = $_POST['nazionalita'];
			$default_decade	 = $_POST['anno_produzione'];
			$default_genre	 = $_POST['genere'];
			$default_type	 = $_POST['tipologia'];
			$default_theme	 = $_POST['tematiche'];
		}else{
			$message = "Seleziona almeno un campo!";
			echo "<script type='text/javascript'>alert('$message');</script>";
		}
	}
	if( isset($filmresults) )
		wp_enqueue_style('cineteca.query.results');
?>
<main class="container bb-main-wrapper">
		<section class="row" role="content-info">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9 bb-search bb-search-guid" id="bb-search-guid-container">
				<div class="bb-search-guid-title bb-search-title">
					<span>
						<img src="<?php echo get_template_directory_uri().'/images/magnifier.png';?>" alt="lente di ingrandimento"/>
					</span>
					<h1><?php echo get_the_title() ?></h1>
				</div>

				<div class="bb-search-form-container bb-search-guid-form-container">
					<form method="POST" action="#">

						<?php	$eta = $formitems["anni_studenti"]; ?>
						<div class="form-group">
							<h2>
								<label for="anni-studenti">
									<?php echo _e('Quanti anni hanno i tuoi studenti?','cineteca-inail'); ?>
								</label>
							</h2>
							<select class="form-control" name="anni-studenti" value="Seleziona l'et&agrave;">
								<option><?php echo _e('Seleziona l\'et&agrave;','cineteca-inail' ); ?></option>
							<?php foreach( $eta as $etaitem ){ ?>
								<option <?php if( isset($default_age) && $default_age == $etaitem ) echo "selected"; ?> ><?php echo $etaitem; ?></option>
							<?php } ?>
							</select>
						</div>

						<div class="form-group">
							<h2 class="bb-search-subtitle">Quali tematiche ti interessano?</h2>
							<br>
							<?php $keywords = $formitems["tematiche"]; ?>
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

						<div class="form-group form-inline bb-two-group">
							<h2 class="bb-search-subtitle">I film</h2>
							
							<?php 	$nation =  $formitems['nazionalita'];	?>
							<select class="form-control" name="nazionalita">
								<option><?php echo _e('Seleziona il paese di produzione','cineteca-inail'); ?></option>
							<?php foreach( $nation as $nationitem ) { ?>
								<option <?php if( isset($default_country) && $default_country == $nationitem ) echo "selected";?> ><?php echo $nationitem; ?></option>
							<?php } ?>
							</select>

							<?php 	$decade = $formitems['anno_produzione'];	?>
							<select class="form-control" name="anno_produzione">
								<option><?php echo _e('Seleziona il decennio di produzione','cineteca-inail'); ?></option>
							<?php foreach( $decade as $decadeitem ) { ?>
								<option <?php if( isset($default_decade) && $default_decade == $decadeitem ) echo "selected";?> ><?php echo $decadeitem; ?></option>
							<?php } ?>
							</select>
						</div>
						<div class="form-group form-inline bb-two-group">
							<?php 	$tipology = $formitems['tipologia']; ?>
							<select class="form-control" name="tipologia" value="Seleziona l'et&agrave;">
								<option><?php echo _e('Seleziona la tipologia','cineteca-inail'); ?></option>
							<?php foreach( $tipology as $tipologyitem ) { ?>
								<option <?php if( isset($default_type) && $default_type == $tipologyitem ) echo "selected";?> ><?php echo $tipologyitem; ?></option>
							<?php } ?>
							</select>

							<?php 	$genre = $formitems['genere'];	?>
							<select class="form-control" name="genere" value="Seleziona l'et&agrave;">
								<option><?php echo _e('Seleziona il genere','cineteca-inail'); ?></option>
							<?php foreach( $genre as $genreitem ) { ?>
								<option <?php if( isset($default_genre) && $default_genre == $genreitem ) echo "selected";?> ><?php echo $genreitem; ?></option>
							<?php } ?>
							</select>
						</div>

						<input class="btn bb-guid-src-btn" type="submit" value="Cerca"/>
					</form>
				</div>

			</div>
			<?php get_sidebar(); ?>
		</section>

		<?php 
			if( isset($filmresults) )
				cineteca_inail_get_the_5_film_rand_loop_from_query($filmresults,true);

			if( DEBUG && isset($filmresults) )
			{
				echo '<br><br><hr><br><br>';
				var_dump($filmresults);
				echo '<hr>';
			}
		?>

</main>
<?php get_footer(); ?>