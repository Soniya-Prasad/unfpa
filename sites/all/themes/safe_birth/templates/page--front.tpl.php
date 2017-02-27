<?php print render($intro_content); ?>
<div id="container" class="clearfix content" data-title="<?php print $site_name; ?>" data-href="<?php print $front_page; ?>">
  <div class="page">
    <div id="introduction-section" class="container active">
      <header id="header">
        <div class="site-information-content">
          <div class="inner-wrapper clearfix">
            <div class="mobile-menu-icon-container">
              <a class="mobile-menu-icon" href="#">
                <img src="<?php print $directory; ?>/images/mobile-menu-img.png">
              </a>
            </div>
            <?php if ($logo): ?>
              <div class="logo">
                <a class="site-logo" href="<?php print $front_page; ?>">
                  <img alt="<?php print t('Safe Birth Even Here'); ?>" src="<?php print $logo; ?>">
                </a>
              </div>
            <?php endif; ?>
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
    <div class="safebirth-body">
      <?php print render($page['content']); ?>
    </div>
  </div>
  <?php print render($page['footer']); ?>
  <!---Footer section end--->

</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-573dd56ac77b5069"></script>
<div class="overlay offcanvas-menu-overlay"></div>
<div id="video-player-overlay"></div>
<div class="offcanvas-menu"></div>
