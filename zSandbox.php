
<!--		SITE LOGO-->
    <div class="site-logo">
      <?php $site_title = get_bloginfo('name'); ?>
<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
  <div class="screen-reader-text">
    <?php printf(esc_html('Página de inicio de %1$s', 'pleiadesweb16'), $site_title); ?>
  </div><!--class="screen-reader-text"-->

  <?php if (has_site_icon()) { ?>
    <div class="site-firstletter" aria-hidden="true">
      <?php $site_icon = esc_url(get_site_icon_url(270)); ?>
      <img class="site-icon" src="<?php echo $site_icon; ?>" alt="">
    </div><!--class="site-firstletter"-->
  <?php } else { ?>
    <div class="site-firstletter" aria-hidden="true">
      <?php echo substr($site_title, 0, 1); ?>
    </div><!--class="site-firstletter"-->
  <?php } ?>
</a>
</div><!--class="site-logo"-->