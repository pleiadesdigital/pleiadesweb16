<?php
/**
 * Template part for displaying a message that posts cannot be found.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pleiades_Web_2016
 */

?>

<section class="<?php if(is_404()){echo 'error-404';} else {echo 'no-results';} ?> not-found">
	<header class="page-header">
		<h1 class="page-title">
      <?php
      if (is_404()) {
        esc_html_e('Página no disponible', 'pleiadesweb16');
      } elseif (is_search()) {
        printf(esc_html__('No se econtró nada con: &ldquo;%s&rdquo;', 'pleiadesweb16'), '<em>' .get_search_query() . '</em>');
      } else {
        esc_html_e('Lo sentimos, no se encontró nada.', 'pleiadesweb16');
      }
      ?>
    </h1>
	</header><!-- .page-header -->


	<div class="page-content">
		<?php
		if (is_home() && current_user_can('publish_posts')) { ?>

      <p><?php printf(wp_kses(__('¿Listo para publicar su primera entrada? <a href="%1$s">Empieza acá</a>.', 'pleiadesweb16'), array('a' => array('href' => array()))), esc_url(admin_url('post-new.php'))); ?></p>

      <?php } elseif (is_search()) { ?>

      <p><?php esc_html_e('Lo sentimos, pero no se encontró nada con esa búsqueda. Por favor trate de nuevo con otras palabras.', 'pleiadesweb16'); ?></p>
      <?php
      get_search_form();

      } elseif (is_404()) { ?>

      <p><?php esc_html_e('Página no encontrada. Por favor intente una búsqueda o navegue más abajo con los artículos más recientes.', 'pleiadesweb16'); ?></p>
      <?php
      get_search_form();

    } else { ?>

      <p><?php esc_html_e('Página no encontrada. Por favor intente una búsqueda o navegue más abajo con los artículos más recientes.', 'pleiadesweb16'); ?></p>
      <?php
      get_search_form();

    } //if (is_home() && current_user_can('publish_posts')) ?>
	</div><!-- .page-content -->
  <?php
  if (is_404() || is_search()) {
    ?>
    <h4 class="page-title secondary-title"><?php esc_html_e( 'Artículos más recientes:', 'popperscores' ); ?></h4>
    <?php
    $args = array(
      'posts_per_page' => 6
    );
    $latest_posts_query = new WP_Query($args);
    // The Loop
    if ($latest_posts_query->have_posts()) {
      while ($latest_posts_query->have_posts()) {
        $latest_posts_query->the_post();
        get_template_part('template-parts/content', get_post_format());
      } //while ($latest_posts_query->have_posts())
    } //if ($latest_posts_query->have_posts())
    /* Restore original Post Data */
    wp_reset_postdata();
  } // endif
  ?>

</section><!-- .no-results -->
