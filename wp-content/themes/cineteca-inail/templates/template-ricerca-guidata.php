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

<main role="main" class="container pb-5">
	<div class="row">
		<div class="col-md-8">
			<!-- Parte Centrale -->

				<div id="post-<?php the_ID(); ?>" class="row">
					<div class="col">
						<div class="row bb-home-sect-title">
							<h1><?php the_title(); ?></h1>
						</div>
						<div class="row">
							<div id="content" class="col content">

								<form class="bb-search-form-container bb-search-guid-form-container" action="#" method="post">

									<div class="row">
										<div class="col-12">
											<?php	$eta = $formitems["anni_studenti"]; ?>
											<h2><?php echo _e('Quanti anni hanno i tuoi studenti?','cineteca-inail'); ?></h2>
											<div class="form-group">
												<select class="form-control" name="anni-studenti" value="Seleziona l'et&agrave;">
													<option><?php echo _e('Seleziona l\'et&agrave;','cineteca-inail' ); ?></option>
												<?php foreach( $eta as $etaitem ){ ?>
													<option <?php if( isset($default_age) && $default_age == $etaitem ) echo "selected"; ?> ><?php echo $etaitem; ?></option>
												<?php } ?>
												</select>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-12">
											<h2 class="bb-search-subtitle">Quali tematiche ti interessano?</h2>
											<div class="form-group">
												<?php $keywords = $formitems["tematiche"]; ?>
												<div class="bb-keywords">
													<?php $i = 0;
														foreach( $keywords as $keyword ) { ?>
															<div class="bb-keyword">
																<input type="checkbox" id="inlineCheckbox<?php echo $i; ?>" name="tematiche[]" value="<?php echo $keyword; ?>">
																<label for="inlineCheckbox<?php echo $i; ?>" class="checkbox-inline bb-sublbl">
																	<?php echo $keyword; ?>
																</label>
															</div>
													<?php $i++;
														}
													?>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-12">
											<h2 class="bb-search-subtitle">I film</h2>

											<div class="row">
												<div class="form-group col-md-6">
													<div class="form-group">
														<label for="nazionalita">Nazionalità</label>
														<?php 	$nation =  $formitems['nazionalita'];	?>
														<select class="form-control" name="nazionalita">
															<option><?php echo _e('Seleziona il paese di produzione','cineteca-inail'); ?></option>
															<?php foreach( $nation as $nationitem ) { ?>
																<option <?php if( isset($default_country) && $default_country == $nationitem ) echo "selected";?> ><?php echo $nationitem; ?></option>
															<?php } ?>
														</select>
													</div>
												</div>
												<div class="form-group col-md-6">
													<label for="anno_produzione">Anno di produzione</label>
													<?php 	$decade = $formitems['anno_produzione'];	?>
													<select class="form-control" name="anno_produzione">
														<option><?php echo _e('Seleziona il decennio di produzione','cineteca-inail'); ?></option>
														<?php foreach( $decade as $decadeitem ) { ?>
															<option <?php if( isset($default_decade) && $default_decade == $decadeitem ) echo "selected";?> ><?php echo $decadeitem; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>

											<div class="row">
												<div class="form-group col-md-6">
													<label for="tipologia">Tipologia</label>
													<?php 	$tipology = $formitems['tipologia']; ?>
													<select class="form-control" name="tipologia" value="Seleziona l'et&agrave;">
														<option><?php echo _e('Seleziona la tipologia','cineteca-inail'); ?></option>
														<?php foreach( $tipology as $tipologyitem ) { ?>
															<option <?php if( isset($default_type) && $default_type == $tipologyitem ) echo "selected";?> ><?php echo $tipologyitem; ?></option>
														<?php } ?>
													</select>
												</div>
												<div class="form-group col-md-6">
													<label for="genere">Genere</label>
													<?php 	$genre = $formitems['genere'];	?>
													<select class="form-control" name="genere" value="Seleziona l'et&agrave;">
														<option><?php echo _e('Seleziona il genere','cineteca-inail'); ?></option>
														<?php foreach( $genre as $genreitem ) { ?>
															<option <?php if( isset($default_genre) && $default_genre == $genreitem ) echo "selected";?> ><?php echo $genreitem; ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
										</div>
									</div>

									<div class="buttons">
										<input class="btn btn-dark bb-guid-src-btn" type="submit" value="Cerca"/>
									</div>

								</form>

								<div class="results pt-5">
									<?php
										if( isset($filmresults) )
											cineteca_inail_get_the_5_film_rand_loop_from_query( $filmresults, true );

										if( DEBUG && isset($filmresults) )
										{
											echo '<br><br><hr><br><br>';
											var_dump($filmresults);
											echo '<hr>';
										}
									?>
								</div>

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
