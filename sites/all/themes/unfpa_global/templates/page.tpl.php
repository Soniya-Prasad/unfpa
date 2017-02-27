<div id="container" class="clearfix">

    <div id="skip-link">
        <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
        <?php if ($main_menu): ?>
            <a href="#navigation" class="element-invisible element-focusable"><?php print t('Skip to navigation'); ?></a>
        <?php endif; ?>
    </div>

    <?php /* <header id="header" role="banner" class="clearfix">
      <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" id="logo">
      <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
      </a>
      <?php endif; ?>
      <?php if ($site_name || $site_slogan): ?>
      <hgroup id="site-name-slogan">
      <?php if ($site_name): ?>
      <h1 id="site-name">
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><span><?php // print $site_name; ?></span></a>
      </h1>
      <?php endif; ?>
      <?php if ($site_slogan): ?>
      <h2 id="site-slogan"><?php print $site_slogan; ?></h2>
      <?php endif; ?>
      </hgroup>
      <?php endif; ?>

      <?php print render($page['header']); ?>

      <?php if ($main_menu || $secondary_menu || !empty($page['navigation'])): ?>
      <nav id="navigation" role="navigation" class="clearfix">
      <?php if (!empty($page['navigation'])): ?> <!--if block in navigation region, override $main_menu and $secondary_menu-->
      <?php print render($page['navigation']); ?>
      <?php endif; ?>
      <?php if (empty($page['navigation'])): ?>
      <?php print theme('links__system_main_menu', array(
      'links' => $main_menu,
      'attributes' => array(
      'id' => 'main-menu',
      'class' => array('links', 'clearfix'),
      ),
      'heading' => array(
      'text' => t('Main menu'),
      'level' => 'h2',
      'class' => array('element-invisible'),
      ),
      )); ?>
      <?php print theme('links__system_secondary_menu', array(
      'links' => $secondary_menu,
      'attributes' => array(
      'id' => 'secondary-menu',
      'class' => array('links', 'clearfix'),
      ),
      'heading' => array(
      'text' => t('Secondary menu'),
      'level' => 'h2',
      'class' => array('element-invisible'),
      ),
      )); ?>
      <?php endif; ?>
      </nav> <!-- /#navigation -->
      <?php endif; ?>
      <?php if ($breadcrumb): print $breadcrumb; endif;?>
      </header> <!-- /#header --> */ ?>

    <header id="header" role="banner" class="clearfix">
        <div class="max_wrapper">
            <?php if ($logo): ?>
                <a href="<?php print $front_page; ?>" title="<?php print t('United Nations Population Fund'); ?>" id="logo">
                    <img src="<?php print $logo; ?>" alt="<?php print t('United Nations Population Fund'); ?>" />
                </a>
            <?php endif; ?>
            <?php /*
              if ($site_name || $site_slogan): ?>
              <hgroup id="site-name-slogan">
              <?php if ($site_name): ?>
              <h1 id="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><span><?php // print $site_name; ?></span></a>
              </h1>
              <?php endif; ?>
              <?php if ($site_slogan): ?>
              <h2 id="site-slogan"><?php print $site_slogan; ?></h2>
              <?php endif; ?>
              </hgroup>
              <?php endif;
             */ ?>

            <?php print render($page['header']); ?>

            <?php if ($main_menu || $secondary_menu || !empty($page['navigation'])): ?>
                <menu>
                    <nav id="navigation" role="navigation" class="clearfix">
                        <span id="mobile-menu-icon"></span>
                        <?php if (!empty($page['navigation'])): ?> <!--if block in navigation region, override $main_menu and $secondary_menu-->
                            <?php print render($page['navigation']); ?>
                        <?php endif; ?>
                        <?php if (empty($page['navigation'])): ?>
                            <?php
                            print theme('links__system_main_menu', array(
                                'links' => $main_menu,
                                'attributes' => array(
                                    'id' => 'main-menu',
                                    'class' => array('links', 'clearfix'),
                                ),
                                'heading' => array(
                                    'text' => t('Main menu'),
                                    'level' => 'h2',
                                    'class' => array('element-invisible'),
                                ),
                            ));
                            ?>
                            <?php
                            print theme('links__system_secondary_menu', array(
                                'links' => $secondary_menu,
                                'attributes' => array(
                                    'id' => 'secondary-menu',
                                    'class' => array('links', 'clearfix'),
                                ),
                                'heading' => array(
                                    'text' => t('Secondary menu'),
                                    'level' => 'h2',
                                    'class' => array('element-invisible'),
                                ),
                            ));
                            ?>
                        <?php endif; ?>
                    </nav> <!-- /#navigation -->
                </menu>
                <?php //print render($page['menu_dropdown']);  ?>
            <?php endif; ?>
        </div>

    </header>

    <section id="main" role="main" class="clearfix">
        <div class="max_wrapper">
            <?php
            if ($breadcrumb): print $breadcrumb;
            endif;
            ?>
            <?php print $messages; ?>
            <a id="main-content"></a>
            <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
            <?php print render($title_prefix); ?>
            <?php if ($title): ?>
                <?php if (strtolower(arg(0)) != 'annual-report' && strtolower(arg(0)) != 'sowp-2015' && strtolower(arg(0)) != 'swop-2015'): ?>
                    <h1 class="title" id="page-title"><?php print t($title); ?></h1>
                <?php endif; ?>
            <?php endif; ?>
            <?php print render($title_suffix); ?>
            <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
            <?php print render($page['help']); ?>
            <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
            <?php print render($page['content']); ?>
        </div>
        <?php if ($page['content_bottom']): ?>
            <div class="content-bottom">
                <div class="max_wrapper">
                    <?php print render($page['content_bottom']); ?>
                </div>
            </div>
        <?php endif; ?>
    </section> <!-- /#main -->

    <?php if ($page['sidebar_first']): ?>
        <aside id="sidebar-first" role="complementary" class="sidebar clearfix">
            <?php print render($page['sidebar_first']); ?>
        </aside>  <!-- /#sidebar-first -->
    <?php endif; ?>

    <?php if ($page['sidebar_second']): ?>
        <aside id="sidebar-second" role="complementary" class="sidebar clearfix">
            <?php print render($page['sidebar_second']); ?>
        </aside>  <!-- /#sidebar-second -->
    <?php endif; ?>

    <footer id="footer" role="contentinfo" class="clearfix">
        <div class="max_wrapper">
            <div class="footer_area">
                <div id="footer_social">
                    <?php print render($page['footer_social']) ?>
                    <div id="footer_logo">
                        <?php print render($page['footer_logo']) ?>
                    </div>
                </div>
                <div id="footer_links">
                    <?php print render($page['footer_links']) ?>
                </div>
                <?php print $feed_icons ?>
            </div>
        </div>
    </footer> <!-- /#footer -->
    <div class="current-path" style="display: none;">
        <?php
        global $base_url;
        echo $base_url . '/' . current_path();
        ?>
    </div>
</div> <!-- /#container -->
<?php
//For Newsletter Block Javascript Submit
if ($is_front) {
    ?>
    <script type="text/javascript" language="javascript">
        (function ($) {
            $(document).ready(function () {
                $(".page-home .pane-block-newsletter form input[type='button']").click(function () {
                    var email_data = $(".page-home .pane-block-newsletter form input[name='newsletter_email']").val();
                    window.location.href = "http://unfpa.us4.list-manage.com/subscribe?u=99975c64dbbe54cb130a37bfa&id=835afca60b&&MERGE0=" + email_data;
                });
            });
        })(jQuery);
    </script>
    <?php
}
?>
<?php
print render($content['metatags']);
?>