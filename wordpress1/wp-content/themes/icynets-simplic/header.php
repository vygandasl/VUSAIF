<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package icyNETS Simplic
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'icynets-simplic' ); ?></a>


	<!--HEADER-->
	<header class="header">
		<?php if ( get_header_image() ){ ?>
			<div class="<?php if ( get_header_image() != ''){ echo 'header-image'; } ?>">
				<img src="<?php header_image(); ?>" width="<?php echo esc_attr( get_custom_header()->width ); ?>" height="<?php echo esc_attr( get_custom_header()->height ); ?>" alt="">
			</div>
		<?php } ?> <!--./End If Header Image-->

				<!--MOBILE MENU-->
				<div id="mobile-menu-wrapper">
					<a href="#" id="sidemenu_hide" class="sideviewtoggle"><i class="fa fa-arrow-left"></i><?php esc_html_e( 'Hide Menu', 'icynets-simplic' ); ?> <i class="fa fa-bars"></i></a>

					<nav id="navigation" class="clearfix">
						<div id="mobile-menu" class="mobile-menu">
							<?php wp_nav_menu( array(
								'theme_location' => 'mobile-menu' ) ); ?>
						</div>
					</nav>
				</div><!--#MOBILE-menu-wrapper-->


			<div class="container">
				<!--LOGO-->
				<?php if ( get_theme_mod('custom_logo') ) { ?>
				<div class="logo logo-image float-l">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" alt="<?php bloginfo( 'name' ); ?>">
					<img src="<?php echo esc_url( get_theme_mod('custom_logo') )?>">
					</a>
				</div>
				<?php } else { ?>

				<div class="logo float-l">
					<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<p class="site-description"><?php bloginfo( 'description' ); ?></p>
				</div>
				<?php  }  ?>

				<div class="float-r">
					<?php icynets_simplic_header_area(); ?>
				</div>
				<div class="clearfix"></div>
			</div><!--.container-->
	



		<!--TOP NAV-->
		<div class="container">
			<div class="mid-head main-navigation">
				<div class="top-nav secondary-navigation">
					<!--MOBILE MENU-->
					<div id="sideviewtoggle">
						<div class="container clearfix">
							<a href="#" id="sidemenu_show" class="sideviewtoggle"><i class="fa fa-bars"></i><?php esc_html_e( 'Menu', 'icynets-simplic' ); ?></a>
						</div><!--.container-->
					</div><!--#sideviewtoggle-->
					<nav id="navigation" class="" role="navigation">
						<?php wp_nav_menu( array(
								'theme_location' => 'primary' ) ); ?>
					</nav>
				</div><!--.top-nav-->
			</div><!--.mid-head-->
		</div><!--.container-->
	</header><!--.header-->



	<div id="content" class="container">
