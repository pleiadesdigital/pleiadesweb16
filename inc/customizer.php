<?php
/**
 * Pleiades Web 2016 Theme Customizer.
 *
 * @package Pleiades_Web_2016
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function pleiadesweb16_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

  //Custom settings
  $wp_customize->add_setting('header_color', array(
    'default'     => '#000000',
    'type'        => 'theme_mod',
    'sanitize_callback' => 'sanitize_hex_color',
    'transport' => 'postMessage'
  ));
  $wp_customize->add_control(
    new WP_Customize_Color_Control(
      $wp_customize,
      'header_color', array(
        'label' => __('Header Background Color', 'pleiadesweb16'),
        'section' => 'colors',
      )
    )
  );


  //Create new section in the customizer
  $wp_customize->add_section('pleiadesweb16-options', array(
    'title' => __('Theme Options', 'pleiadesweb16'),
    'capability' => 'edit_theme_options',
    'description' => __('Change default layout options.')
  ));

  //Create sidebar layout setting

  $wp_customize->add_setting('layout_setting', array(
        'default' => 'no-sidebar',
        'type'    => 'theme_mod',
        'sanitize_callback' => 'pleiadesweb16_sanitize_layout',
        'tranport'        => 'postMessage'
      )
    );

    //Add sidebar layout control
    $wp_customize->add_control('layout_control', array(
      'settings'      => 'layout_setting',
      'type'          => 'radio',
      'label'         => __('Sidebar position', 'pleiadesweb16'),
      'choices'       => array(
        'no-sidebar'  => __('No sidebar (default)', 'pleiadesweb16'),
        'sidebar-left' => __('Left sidebar', 'pleiadesweb16'),
        'sidebar-right' => __('Right sidebar', 'pleiadesweb16')
        ),
      'section'     => 'pleiadesweb16-options',
      )
    );


  }
  add_action('customize_register', 'pleiadesweb16_customize_register');

  /**
   * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
   */
function pleiadesweb16_customize_preview_js() {
	wp_enqueue_script('pleiadesweb16_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true);
}
add_action( 'customize_preview_init', 'pleiadesweb16_customize_preview_js' );

function pleiadesweb16_sanitize_layout($value) {
  if (!in_array($value, array('sidebar-left', 'sidebar-right', 'no-sidebar'))) {
    $value = 'no-sidebar';
  }
  return $value;
}



//Inject Customizer CSS when appropriate
function pleiadesweb16_customizer_css() {
  $header_color = get_theme_mod('header_color');
  ?>
  <style type="text/css">
    .site-header {
      background-color: <?php echo $header_color; ?>
    }
  </style>
  <?php
}
add_action('wp_head', 'pleiadesweb16_customizer_css');