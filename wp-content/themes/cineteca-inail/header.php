<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	<title>Lo Spettacolo Della Sicurezza<?php echo " ".wp_title(); ?></title>

    <!-- Goole Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-77181369-1', 'auto');
        ga('send', 'pageview');
    </script>
</head>
<?php global $bodyclass; ?>
<body class="container "<?php body_class($bodyclass); ?>>

<header class="row">
	<nav class="col-md-12 col-sm-12 col-lg-12 nav bb-menu-top-container center-block">
		<div class="col-md-1 col-sm-1 col-lg-1 bb-menu-menu-top bb-menu-logo-top">
			<a title="homepage" href="<?php echo get_home_url();?>">
				<img alt="logo sito" src="<?php echo get_template_directory_uri().'/images/logosito.png';?>"/>
			</a>
		</div>

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
			$items = wp_get_nav_menu_items( 'Menu1', $args );
		?>

		<?php for( $i = 0; $i < count($items); $i++ ) { ?>
			<div class="col-md-1 col-sm-1 col-lg-1 bb-menu-menu-top center-block">
				<a class="bb-menu-item-top" title="<?php echo $items[$i]->title;?>" href="<?php echo $items[$i]->url;?>">
					<?php echo $items[$i]->title; ?>
				</a>
			</div>
		<?php } ?>
	</nav>


	<section role="content-info" class="row bb-heading-img">
		<div class="bb-logos col-md-4 bb-header-img">
			<img alt="logo Inail" src="<?php echo get_template_directory_uri().'/images/InailLogo.png';?>"/>
		</div>
		<div class="bb-logos col-md-2 bb-header-collab">
			In collaborazione con
		</div>
		<div class="bb-logos col-md-4">
			<img alt="logo Cineteca Milano" src="<?php echo get_template_directory_uri().'/images/CinetecaLogo.png';?>"/>
		</div>
	</section>
</header>
