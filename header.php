<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Neochrome BeastTV
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="stylesheet" type="text/css" href="//cloud.typography.com/6564154/679368/css/fonts.css" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="mean-shim"></div>
<a class="home-link" href="<?php echo home_url(); ?>"></a>

	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'beast' ); ?></a>
		<div class="header-wrap faded">
			<header id="masthead" class="container site-header" role="banner">
				<div class="site-branding row">
					<div class="col-md-12">
						<a id="site-logo-wrap" href="<?php echo home_url( '/' ); ?>" class="left-side">
							<img id="site-logo" src="<?php echo get_template_directory_uri(); ?>/images/logo_198_63.png">
						</a>
					<!-- h1 class="site-title"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php //bloginfo( 'name' ); ?></a></h1>
					<h2 class="site-description"><?php //bloginfo( 'description' ); ?></h2 -->
						<a id="menu-stack" href="#" class="right-side collapsed" aria-expanded="false">
							<img height="85" width="115" src="<?php echo get_template_directory_uri(); ?>/images/menu-stack_115x85.png">
						</a>					
					</div>

				</div><!-- .site-branding -->


				<nav id="site-navigation" class="main-navigation displace" style="display:none;">
					<div class="row">
						<div class="col-sm-10 col-sm-offset-1">
							<div class="menu-wrap">
								<?php wp_nav_menu( array(
									'theme_location' => 'primary',
									'container' => false,
									'menu_id' => 'primary-menu'
									) ); ?>
								</div>
							</div>
						</div>
					</nav><!-- #site-navigation -->

				</header><!-- #masthead -->
			</div><!-- header wrap -->
			<div id="content" class="site-content">






