<div id="container" class="clearfix">

    <div id="skip-link">
        <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
        <?php if ($main_menu): ?>
            <a href="#navigation" class="element-invisible element-focusable"><?php print t('Skip to navigation'); ?></a>
        <?php endif; ?>
    </div>

    <header id="header" role="banner" class="clearfix">
        <div class="max_wrapper">
            <?php if ($logo): ?>
                <a href="<?php print $front_page; ?>" title="<?php print t('United Nations Population Fund'); ?>" id="logo">
                    <img src="<?php print $logo; ?>" alt="<?php print t('United Nations Population Fund'); ?>" />
                </a>
            <?php endif; ?>

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
            <?php endif; ?>
        </div>

    </header>

    <section id="main" role="main" class="clearfix">
        <?php //if ($breadcrumb): print $breadcrumb; endif;?>
        <?php print $messages; ?>
        <a id="main-content"></a>
        <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="title" id="page-title"><?php print t($title); ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper clearfix"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
        <?php print render($page['content']); ?>
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
