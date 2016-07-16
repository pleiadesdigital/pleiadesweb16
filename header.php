<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Pleiades_Web_2016
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<!--<script src="https://use.fontawesome.com/a81cded45e.js"></script>-->
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site <?php echo get_theme_mod('layout_setting', 'no-sidebar'); ?>">
	<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'pleiadesweb16' ); ?></a>
    <header id="masthead" class="site-header" role="banner">
      <div class="site-logo">
        <?php $site_title = get_bloginfo('name'); ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
          <div class="screen-reader-text">
            <?php printf(esc_html__('Go to the home page of %1$s', 'pleiadesweb16')); ?>
          </div>
          <?php if (has_site_icon()) { ?>
            <?php $site_icon = esc_url(get_site_icon_url(270));  ?>
            <img class="site-icon" src="<?php echo $site_icon; ?>" alt="">
          <?php } else { ?>
            <div class="site-firstletter" aria-hidden="true">
              <?php echo substr($site_title, 0, 1); ?>
            </div><!--class="site-firstletter"-->
          <?php } ?>
        </a><!--class="site-logo"-->
      </div>
      <!--		SITE BRANDING-->
      <div class="site-branding<?php if(is_singular()) { echo ' screen-reader-text'; } ?>">
        <?php
        if (is_front_page() && is_home()): ?>
          <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
        <?php else : ?>
          <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
          <?php
        endif;

        $description = get_bloginfo( 'description', 'display' );
        if ($description || is_customize_preview()) : ?>
          <p class="site-description"><?php echo $description; ?></p>
          <?php
        endif; ?>
      </div><!-- .site-branding -->


<!--		NAVIGATION-->
    <button id="menu-toggle" class="menu-toggle"><?php _e('MENU', 'pleiadesweb16'); ?></button>
    <div id="site-header-menu" class="site-header-menu <?php if (is_front_page() && is_home()) { echo 'site-header-menu-home';} ?>">

      <nav id="site-navigation" class="main-navigation" role="navigation">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'menu_class' => 'primary-menu',
          ));
        ?>
      </nav><!-- #site-navigation -->
    </div><!--id="site-header-menu" class="site-header-menu"-->
	</header><!-- #masthead -->

	<div id="content" class="site-content">













