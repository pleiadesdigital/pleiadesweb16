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
        <?php  if (is_single()) {
          the_post_thumbnail(); ?>
        <?php } else { ?>
          <a href="<?php echo esc_url(the_permalink()); ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
        <?php } //if (!is_single()) ?>

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
		if ('post' === get_post_type()) {
      if (is_home()) { ?>
        <div class="index-entry-meta">
          <?php pleiadesweb16_index_posted_on(); ?>
        </div><!-- .entry-meta -->
        <?php
      } else { ?>
        <div class="entry-meta">
          <?php pleiadesweb16_posted_on(); ?>
        </div><!-- .entry-meta -->
    <?php
      } // if (is_single())
    } //if ('post' === get_post_type())
    ?>

	</header><!-- .entry-header -->



	<div class="entry-content <?php if(is_home()){echo 'index-excerpt';} ?>">
		<?php
      if (is_single()) {
        the_content();
        wp_link_pages(array(
          'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'pleiadesweb16' ),
          'after'  => '</div>',
        ));
      } else {
        the_excerpt();?>
        <!--  Continue reading-->
      <div class="continue-reading">
        <a href="<?php echo esc_url(get_permalink()) ?>" rel="bookmark">
         <?php printf(wp_kses(__('Continúe leyendo %s', 'pleiadesweb16'), array('span' => array( 'class' => array()))),
          the_title('<span class="screen-reader-text">"', '"</span>', false )
        ); ?>
        </a>
      </div>
    <?php  }
		?>
	</div><!-- .entry-content -->
  <?php if (!is_home()){ ?>
    <footer class="entry-footer">
      <?php pleiadesweb16_entry_footer(); ?>
    </footer><!-- .entry-footer -->
  <?php } ?>

</article><!-- #post-## -->
