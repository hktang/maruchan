<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package maruchan
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	<header id="masthead" class="navbar navbar-inverse navbar-fixed-top" role="banner">
	  <div class="container">	
		<div class="navbar-header">
			<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</div><!-- .navbar-header -->
			<?php 
			
			$nav_args = array(
				'theme_location'  => 'primary',
				'container'       => 'nav',
				'container_class' => 'collapse navbar-collapse bs-navbar-collapse',
				'menu_class'      => 'nav navbar-nav',
			);
			
			wp_nav_menu( $nav_args ); ?>
	  </div><!-- .container -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
