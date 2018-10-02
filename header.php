<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Idl
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<b class="animsition-loading"></b>
    <div class="loading wrapper">
        <header id="header">
            <div class="container">
                <div class="navbar-header">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand"  style="background-image: url(<?php echo get_custome_logo_url(); ?>);">
                        <span class="sr-only"><?php echo get_bloginfo('name');?></span>
                    </a>
                    <a href="#main-nav" class="navbar-toggle">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <em class="sr-only"><?php _e('toggle mobile menu', 'idl');?></em>
                    </a>
                </div><!-- / navbar-header -->
                <nav id="main-nav">
                    <?php
	                wp_nav_menu( array(
		                'container' => false,
		                'theme_location' => 'primary-menu',
		                'menu_id'        => '',
		                'menu_class'     => 'base',
	                ) );?>
                </nav><!-- / main-nav -->
                <div class="fader"></div>
            </div><!-- / container -->
        </header><!-- / header -->