<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Pleiades_Web_2016
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<!--	HEADER-->
	<header class="entry-header">

    <!--    FEATURED IMAGE-->
    <?php if (has_post_thumbnail()) { ?>
      <figure class="<?php if (is_home()) { echo 'featured-image-index'; } else { echo 'featured-image'; } ?>">
        <?php the_post_thumbnail(); ?>
      </figure>
    <?php } //if (has_post_thumbnail()) ?>

		<?php
			if (is_single()) {
				the_title( '<h1 class="entry-title">', '</h1>' );
			} else {
				the_title( '<h2 class="entry-title index-excerpt"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			} //(is_single())
    ?>

<!-- SHORT CUSTOM EXCERPT-->
    <?php
		if ('post' === get_post_type()) { ?>
      <div class="entry-meta">
        <?php pleiadesweb16_posted_on(); ?>
      </div><!-- .entry-meta -->
    <?php } //if ('post' === get_post_type())?>

	</header><!-- .entry-header -->



	<div class="entry-content">
		<?php
      if (is_single()) {
        the_content(sprintf(wp_kses(__('Continue leyendo %s <span class="meta-nav">&rarr;</span>', 'pleiadesweb16'), array('span' => array( 'class' => array()))),
          the_title('<span class="screen-reader-text">"', '"</span>', false )
        ));
      } else {
        the_excerpt();
      }

    /*
			wp_link_pages(array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pleiadesweb16' ),
				'after'  => '</div>',
			));
    */
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php pleiadesweb16_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
