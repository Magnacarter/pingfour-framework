<!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php echo esc_attr( get_bloginfo( 'charset' ) ) ?>">

		<title><?php wp_title( '-', true, 'right' ); echo esc_html( get_bloginfo( 'name' ) ) ?></title>

		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1"/>

		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ) ?>">

		<link href="#" rel="publisher"/>

		<!--Remove phone number styles-->
		<meta name="format-detection" content="telephone=no">

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

		<?php wp_head(); ?>

		<?php 
			global $post;
			$post_slug = $post->post_name;
			$page_slug = 'page-'.$post_slug;
			$post_id   = 'post-id-'.$post->ID;
			$classes   = array( $page_slug, $post_id );
		?>

	</head>

	<body <?php body_class( $classes ); ?>>

	<div id="wrapper">

		<header id="header">

			<nav id="nav">

				<div class="nav-wrap container">

					<div class="header-logo col-sm-4 no-pad">

                        <a href="/"><h2>PingFour</h2></a>

					</div><!-- .header-logo -->

					<div class="navbar col-sm-8 no-pad">

						<div class="navbar-collapse collapse hidden-sm hidden-xs no-pad float-right" id="navbar">

							<?php wp_nav_menu( array( 
								'container'         => 'div',
								'theme_location'    => 'header-menu',
								'menu_class'        => 'nav navbar-nav',
								'walker'            => new Walker_Nav_Primary()
							) ); ?>

						</div><!-- .navbar-collapse -->

					</div><!-- .navbar -->

				</div><!-- .container -->

			</nav><!-- #nav-main -->

		</header><!-- #header -->

	</div><!-- .wrapper -->

	<main id="main" role="main">
