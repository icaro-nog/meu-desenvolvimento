<div id="<?php echo esc_attr($item_selector); ?>" class="insta-gallery-feed insta-gallery-square" data-feed="<?php echo htmlentities(json_encode($feed), ENT_QUOTES, 'UTF-8'); ?>" data-feed_layout="<?php echo esc_attr($feed['layout']); ?>">
  <?php
  if (!empty($feed['box']['profile']) && ($template_file = QLIGG_Frontend::template_path('parts/profile.php'))) {
    include($template_file);
  }
  ?>
  <div class="insta-gallery-list">
  </div>
  <?php include(QLIGG_Frontend::template_path('parts/spinner.php')); ?>
  <?php include(QLIGG_Frontend::template_path('parts/actions.php')); ?>
</div>