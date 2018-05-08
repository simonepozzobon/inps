<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
	<title>Lo Spettacolo Della Sicurezza<?php echo " ".wp_title(); ?></title>

    <!-- Goole Analytics -->
    <!-- <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-77181369-1', 'auto');
        ga('send', 'pageview');
    </script> -->
</head>
<?php global $bodyclass; ?>
<body class="container "<?php body_class($bodyclass); ?>>

<header class="row pb-3">
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

	<div id="main-nav" class="col-12 bg-light">
		<nav class="navbar navbar-expand-lg navbar-light bb-menu-top-container w-100">
		  <a class="navbar-brand" title="homepage" href="<?php echo get_home_url();?>">
		  	<img alt="logo sito" src="<?php echo get_template_directory_uri().'/images/logosito.png';?>"/>
		  </a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mx-auto">
					<?php foreach ($items as $key => $item) { ?>
			      <li class="nav-item bb-menu-menu-top">
			        <a class="nav-link bb-menu-item-top" title="<?php echo $item->title ?>" href="<?php echo $item->url ?>"><?php echo $item->title ?></a>
			      </li>
					<?php } ?>
		    </ul>
		  </div>
		</nav>
	</div>

	<!-- <section role="content-info" class="col-12 bb-heading-img">
		<div class="row text-center pt-4">
			<div class="col-md-5 bb-logos">
				<img alt="logo Inail" src="<?php echo get_template_directory_uri().'/images/InailLogo.png';?>" class="text-center"/>
			</div>
			<div class="col-md-2 bb-logos">
				<span>In collaborazione con</span>
			</div>
			<div class="col-md-5 bb-logos">
				<img alt="logo Cineteca Milano" src="<?php echo get_template_directory_uri().'/images/CinetecaLogo.png';?>"/>
			</div>
		</div>
	</section> -->
</header>
