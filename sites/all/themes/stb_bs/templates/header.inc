<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="<?php print $container_class; ?> vcenter">
    <div class="col-lg-2 col-xs-12 vcenter logo-container">

      <div class="navbar-header">
        <?php if ($logo): ?>
          <a class="logo navbar-btn" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
            <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="img-responsive"/>
          </a>
        <?php endif; ?>

        <?php if (!empty($site_name)): ?>
          <!--a class="name navbar-brand" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a-->
        <?php endif; ?>

        <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
          <!--button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
              <span class="sr-only"><?php print t('Toggle navigation'); ?></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button-->
        <?php endif; ?>
      </div>



    </div>

    <div class="col-lg-5 col-xs-12 search">
      <?php if (!empty($page['search_block'])): ?>
        <?php print $page['search_block']; ?>
      <?php endif; ?>
    </div>


    <div class="col-lg-5 col-xs-12">
      <?php if (!empty($primary_nav) || !empty($secondary_nav) || !empty($page['navigation'])): ?>
        <div class="navbar-collapse collapse" id="navbar-collapse">
          <nav role="navigation">
            <?php if (!empty($primary_nav)): ?>
              <?php print render($primary_nav); ?>
            <?php endif; ?>
            <?php if (!empty($secondary_nav)): ?>
              <?php print render($secondary_nav); ?>
            <?php endif; ?>
            <?php if (!empty($page['navigation'])): ?>
              <?php print render($page['navigation']); ?>
            <?php endif; ?>
          </nav>
        </div>

      <?php endif; ?>
      <?php if (!empty($page['fb_block'])): ?>
        <?php print $page['fb_block']; ?>
      <?php endif; ?>
    </div>



  </div>
</header>