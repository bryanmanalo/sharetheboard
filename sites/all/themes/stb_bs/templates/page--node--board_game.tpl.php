<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup templates
 */


?>
<header id="navbar" role="banner" class="<?php print $navbar_classes; ?>">
  <div class="<?php print $container_class; ?> vcenter">
    <div class="col-lg-2 vcenter logo-container">

        <div class="navbar-header">
          <?php if ($logo): ?>
            <a class="logo navbar-btn pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
              <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="image-responsive"/>
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

    <div class="col-lg-4 search">
      <?php if (!empty($page['search_block'])): ?>
        <?php print $page['search_block']; ?>
      <?php endif; ?>
    </div>


    <div class="col-lg-6">
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

<?php print $messages; ?>

<?php if (!empty($tabs)): ?>
  <?php print render($tabs); ?>
<?php endif; ?>

<?php //if(!isset($page['#edit']) || (isset($page['#edit']) && !$page['#edit'])): ?>
  <div class="fluid-container" >
    <?php print render($page['header']); ?>
    <div id="bg-owner">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 vcenter">
            <div class="col-lg-3 hcenter">
              <?php if(!empty($user_photo)): ?>
                <?php if(user_is_anonymous()): ?>
                  <img src="<?php print $user_photo ?>" />
                <?php else: ?>
                  <a href="/user/<?php print $game_owner->uid; ?>"><img src="<?php print $user_photo ?>" /></a>
                <?php endif; ?>
              <?php endif; ?>
            </div>
            <div class="col-lg-9">
              <h1 class="page-header">
                <?php print check_plain($node->title); ?>
              </h1>
              <div class="clearfix"></div>
              <?php if(user_is_anonymous()): ?>
                <span class="user">by&nbsp;</span><strong class="user"><?php print check_plain($game_owner->name); ?></strong>
              <?php else: ?>
                <span class="user">by&nbsp;</span>
                <a href="/user/<?php print $game_owner->uid; ?>">
                  <strong class="user"><?php print check_plain($game_owner->name); ?></strong>
                </a>
              <?php endif; ?>
              <div class="clearfix"></div>
              <span><?php print check_plain($game_owner->location_city); ?></span>
            </div>
          </div>
          <div class="col-lg-4">

          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div id="game-details">

      <div class="row">
        <div class="col-lg-8 bg-detail">
          <?php if(!empty($game_description)): ?>
            <div class="vcenter bottomliner bg-row-detail">
              <div class="col-lg-3 hcenter">
                <h3>Description</h3>
              </div>
              <div class="col-lg-9">
                <?php print check_markup(BoardGameHelperUtil::truncate($game_description , 500),'limited_format'); ?>
              </div>
            </div>
          <?php endif; ?>
          <?php if(!empty($game_category) || !empty($number_players_from) || !empty($game_pieces)): ?>
            <div class="vcenter bottomliner bg-row-detail">
              <div class="col-lg-3 hcenter">
                <h3>Details</h3>
              </div>
              <div class="col-lg-9">
                <?php if(isset($game_category)): ?>
                <div>
                  <strong>Category:&nbsp;</strong>
                  <span><?php print check_plain($game_category); ?></span>
                </div>
                <div class="clearfix"></div>
                <?php endif; ?>
                <?php if(isset($number_players_from)): ?>
                <div>
                  <strong>Number of Players:&nbsp;</strong>
                  <span>
                    <?php print check_plain($number_players_from); ?>
                    <?php if(isset($number_players_to)): ?>
                      -<?php print check_plain($number_players_to); ?>
                    <?php endif; ?>
                  </span>
                </div>
                <div class="clearfix"></div>
                <?php endif; ?>
                <?php if(isset($game_pieces)): ?>
                <div>
                  <div>
                    <strong>Game Items:&nbsp;</strong>
                  </div>
                  <div class="clearfix"></div>
                  <div>
                    <?php print check_markup(BoardGameHelperUtil::truncate($game_pieces , 500),'limited_format'); ?>
                  </div>
                </div>
                <?php endif; ?>
              </div>
            </div>
          <?php endif; ?>
          <?php if(!empty($game_owner->name) || !empty($game_owner->contact_number)
            || !empty($game_owner->location_city) || !empty($game_owner->pickup_location)): ?>
          <div class="vcenter bg-row-detail">
            <div class="col-lg-3 hcenter">
              <h3>Owner Details</h3>
            </div>
            <div class="col-lg-9">
              <div>
                <strong>Name:</strong>
                <span><?php print check_plain($game_owner->name); ?></span>
              </div>
              <div class="clearfix"></div>
              <?php if(isset($game_owner->contact_number)): ?>
              <div>
                <strong>Contact Number:</strong>
                <span><?php print check_plain($game_owner->contact_number); ?></span>
              </div>
              <?php endif; ?>
              <?php if(isset($game_owner->contact_number)): ?>
                <div>
                  <strong>Pickup Location City:</strong>
                  <span><?php print check_plain($game_owner->location_city); ?></span>
                </div>
              <?php endif; ?>
              <?php if(isset($game_owner->pickup_location)): ?>
                <div>
                  <div class="cleafix"></div>
                  <br />
                  <div>
                    <?php print $game_owner->pickup_location; ?>
                  </div>
                </div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <div class="col-lg-4">
          <?php if($for_sale): ?>
          <div class="price-card">
            <div class="price-card-title">
              <div class="price-card-price">P<?php print $for_sale_price; ?></div>
              <div class="price-card-type">For Sale</div>
            </div>
            <div class="price-card-body">
              <?php if(isset($game_owner->contact_number) && !user_is_anonymous()): ?>
                <div>
                  <strong>Contact Number:</strong>
                  <span><?php print check_plain($game_owner->contact_number); ?></span>
                </div>
                <div class="clearfix"></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>
          <?php if($for_rent): ?>
          <div class="price-card">
            <div class="price-card-title">
              <div class="price-card-price">P<?php print check_plain($for_rent_price); ?></div>
              <div class="price-card-type">For Rent</div>
            </div>
            <div class="price-card-body">
              <?php if(isset($for_rent_deposit)): ?>
              <div>
                <strong>Deposit Required:</strong>
                <span><?php print check_plain($for_rent_deposit); ?></span>
              </div>
              <div class="clearfix"></div>
              <?php endif; ?>
              <?php if(isset($game_owner->contact_number) && !user_is_anonymous()): ?>
              <div>
                <strong>Contact Number:</strong>
                <span><?php print check_plain($game_owner->contact_number); ?></span>
              </div>
              <div class="clearfix"></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>
          <?php if($for_swap): ?>
          <div class="price-card">
            <div class="price-card-title">
              <div class="price-card-type">For Swap</div>
            </div>
            <div class="price-card-body">
              <?php if(isset($game_owner->contact_number) && !user_is_anonymous()): ?>
              <div>
                <strong>Contact Number:</strong>
                <span><?php print check_plain($game_owner->contact_number); ?></span>
              </div>
              <div class="clearfix"></div>
              <?php endif; ?>
              <?php if(isset($for_swap_terms)): ?>
                <div>
                  <strong>Looking to swap with:</strong>
                  <span><?php print check_markup(BoardGameHelperUtil::truncate($for_swap_terms , 500),'limited_format'); ?></span>
                </div>
                <div class="clearfix"></div>
              <?php endif; ?>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>


    </div>
  </div>
<?php //endif; ?>


<?php if (!empty($page['footer'])): ?>
  <footer class="footer <?php print $container_class; ?>">
    <?php print render($page['footer']); ?>
  </footer>
<?php endif; ?>
<footer class="footer <?php print $container_class; ?>">
  <div class="col-lg-6">
    <?php if ($logo): ?>
      <a class="logo navbar-btn" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
        <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" class="image-responsive"/>
      </a>
    <?php endif; ?>
  </div>
  <div class="col-lg-6">
    <?php if (!empty($page['footer_right'])): ?>
      <?php print render($page['footer_right']); ?>
    <?php endif; ?>
  </div>
</footer>
