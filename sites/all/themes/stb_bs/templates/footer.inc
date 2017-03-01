<footer class="footer <?php print $container_class; ?>">
  <div class="col-lg-6 col-xs-6">
    <?php if ($logo): ?>
      <a class="logo navbar-btn" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="img-responsive"/>
      </a>
    <?php endif; ?>
  </div>
  <div class="col-lg-6 col-xs-6">
    <?php if (!empty($page['footer_right'])): ?>
      <?php print render($page['footer_right']); ?>
    <?php endif; ?>
  </div>
</footer>