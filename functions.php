<?php
/***********************************************************************
 ************* Pleiades Web 2016 functions and definitions. *************
 ************************************************************************/

// SETUP THEME FUNCTION
if (!function_exists('pleiadesweb16_setup')) :
  function pleiadesweb16_setup() {

    // Make theme available for translation.
    load_theme_textdomain('pleiadesweb16', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    // Let Wordpress manage the title tag
    add_theme_support('title-tag');

    //Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(828, 360, true);
    add_image_size('small-thumb', 300, 150, true);

    // Navigation menus -> register
    register_nav_menus( array(
      'primary' => esc_html__('Primary', 'pleiadesweb16'),
      'secondary' => esc_html__('Secondary', 'pleiadesweb16'),
    ));

    // Markup for valid HTML5
    add_theme_support('html5', array(
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
    ));

    //Support for Post Formats.
    add_theme_support('post-formats', array(
      'aside',
      'gallery',
      'image',
      'video',
      'quote',
      'link',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('pleiadesweb16_custom_background_args', array(
      'default-color' => 'FFFFFF',
      'default-image' => '',
    )));

  } //function pleiadesweb16_setup()

endif; //if (!function_exists('pleiadesweb16_setup'))
add_action( 'after_setup_theme', 'pleiadesweb16_setup' );

// CONTENT WIDTH
function pleiadesweb16_content_width() {
  $GLOBALS['content_width'] = apply_filters('pleiadesweb16_content_width', 640);
}
add_action('after_setup_theme', 'pleiadesweb16_content_width', 0);

// REGISTER SIDEBAR
function pleiadesweb16_widgets_init() {
  register_sidebar(array(
    'name'          => esc_html__('Widget Area', 'pleiadesweb16'),
    'id'            => 'sidebar-1',
    'description'   => esc_html__('Add widgets here.', 'pleiadesweb16'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget'  => '</section>',
    'before_title'  => '<h2 class="widget-title">',
    'after_title'   => '</h2>',
  ));
}
add_action('widgets_init', 'pleiadesweb16_widgets_init');

// ENQUEUE SCRIPTS AND STYLES
function pleiadesweb16_scripts() {

  wp_enqueue_style('pleiadesweb16-style', get_stylesheet_uri());

  // FONTS
  // Google fonts

  // FONTS
  // Titillium Web & Roboto Slab
  wp_enqueue_style('pleiadesweb-google-fonts', 'https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,400italic,600,700,600italic');

  /*wp_enqueue_style('pleiadesweb16-google-fonts', 'https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,400italic,300italic|Merriweather:400,300,700');*/

  // Local fonts
  //wp_enqueue_style('pleiadesweb16-local-fonts', get_template_directory_uri() . '/fonts/custom-fonts.css');

  // Fontawesome
  wp_enqueue_script('pleiadesweb16-fontawesome', 'https://use.fontawesome.com/51fb71df19.js', array(), '20160602', true);

  // Navigation scripts
  wp_enqueue_script('pleiadesweb16-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), '20151215', true);

  wp_localize_script( 'pleiadesweb16-navigation', 'screenReaderText', array(
    'expand'   => '<span class="screen-reader-text">' . __( 'expand child menu', 'pleiadesweb16' ) . '</span>',
    'collapse' => '<span class="screen-reader-text">' . __( 'collapse child menu', 'pleiadesweb16' ) . '</span>',
  ) );

  wp_enqueue_script('pleiadesweb16-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }

  if ( is_singular() && wp_attachment_is_image() ) {
    wp_enqueue_script( 'pleiadesweb16-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160412' );
  }

  wp_enqueue_script( 'pleiadesweb16-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160412', true );

  wp_localize_script( 'pleiadesweb16-script', 'screenReaderText', array(
    'expand'   => __( 'expand child menu', 'pleiadesweb16' ),
    'collapse' => __( 'collapse child menu', 'pleiadesweb16' ),
  ) );

}
add_action('wp_enqueue_scripts', 'pleiadesweb16_scripts');

// OTHERS

// Custom header feature
require get_template_directory() . '/inc/custom-header.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/template-tags.php';

// Custom functions that act independently of the theme templates.
require get_template_directory() . '/inc/extras.php';

// Customizer additions.
require get_template_directory() . '/inc/customizer.php';

// Load Jetpack compatibility file.
require get_template_directory() . '/inc/jetpack.php';
