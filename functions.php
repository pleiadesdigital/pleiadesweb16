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
		// Navigation menus -> register
		register_nav_menus( array(
			'primary' => esc_html__('Primary', 'pleiadesweb16'),
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
		'name'          => esc_html__('Sidebar', 'pleiadesweb16'),
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

	wp_enqueue_script('pleiadesweb16-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

	wp_enqueue_script('pleiadesweb16-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
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
