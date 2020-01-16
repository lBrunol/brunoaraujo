<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package brunoaraujo
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,500,700&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Ir para o conteúdo', 'brunoaraujo' ); ?></a>

	<header id="masthead" class="site-navbar">
		<div class="container">		
			<div class="header-strip">
				<div class="logo-header">
					<?php the_custom_logo(); ?>
				</div>
				<div class="title-header">				
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a class="site-title-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a class="site-title-link" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>
					<?php $brunoaraujo_description = get_bloginfo( 'description', 'display' );
						if ( $brunoaraujo_description || is_customize_preview() ) :
					?>
							<p class="site-title"> | <?php echo $brunoaraujo_description; /* WPCS: xss ok. */ ?></p>
					<?php 
						endif; 
					?>
				</div>
				<nav id="site-navigation" class="main-navigation site-navigation">
					<?php
					wp_nav_menu( array(
						'menu_class' => 'nav-menu',
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav>
			</div>

		</div>
	</header>

	<div id="content" class="site-content">
