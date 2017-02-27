<?php

/**
 * @file
 * Theme implementation to display SOWP Report section Big Intro nodes.
 */
?>

<div class="swp-bg swp-bigintro sb-font" id="Node-<?php print $node->nid; ?>">

  <div class="swp-width">
    <div class="swp-content">
      <div class="narrow-col">
        <?php print render($content['sowp_bigintro_body']); ?>
        <?php print $sowp_sharelinks; ?>
        
        <?php if ($show_downloads): ?>
          <?php print $sowp_download_buttons; ?>
        <?php endif; ?>
      </div>
    </div>
    <span class="swp-clear">&nbsp;</span>
  </div>

</div>
