<div id="container" class="clearfix content" data-title="<?php print $site_name; ?>" data-href="<?php print $base_path; ?>">
  <div class="page">
    <div id="introduction-section" class="container active">
      <header id="header">
        <div class="site-information-content">
          <div class="inner-wrapper clearfix">
            <div class="mobile-menu-icon-container">
              <a class="mobile-menu-icon" href="#">
                <?php print $mobile_menu_image; ?>
              </a>
            </div>
            <div class="logo">
              <?php if ($logo): ?>
                <a class="site-logo" href="<?php print $front_page; ?>">
                  <img alt="<?php print $site_name; ?>" title="<?php print $site_name; ?>" src="<?php print $logo; ?>">
                </a>
              <?php endif; ?>
            </div>
            <div class="donate-button">
              <a href="https://www.friendsofunfpa.org/NetCommunity/sslpage.aspx?pid=1325" target="_blank" class="donate-link">Donate</a>
            </div>
          </div>
        </div>
        <?php if (!empty($page['navigation'])): ?>
          <?php print render($page['navigation']); ?>
        <?php endif; ?>
      </header>
    </div>
    <div class="max_wrapper">
      <?php if ($title): ?>
        <h1 class="title" id="page-title"><?php print t($title); ?></h1>
      <?php endif; ?>
      <?php print render($page['content']); ?>
    </div>
  </div>
  <div>
    <?php print render($page['footer']); ?>
  </div>
</div>
