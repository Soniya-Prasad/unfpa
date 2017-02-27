<?php

/**
 * @file
 * Theme implementation to display SOWP Report section Regular Body nodes.
 */
?>

<div class="swp-bg swp-body<?php print $swp_body_class; ?>" id="Node-<?php print $node->nid; ?>">
  <div class="swp-width">
    <div class="swp-content">
      <div class="swp-floats">

        <?php /* Photosplit media (single video custom printed). */ ?>
        <?php if ($is_photosplit): ?>
          <div class="swp-body-side">
            <?php print $photosplit_video; ?>
          </div>
        <?php endif; ?>

        <?php /* Main body - always printed. */ ?>
        <div class="swp-body-main<?php print $swp_body_main_class; ?>">
          <?php print render($content['sowp_body_content']); ?>
          <?php print render($content['sowp_body_download']); ?>
        </div>

        <?php /* Regular body sidebar (videos printed via field template). */ ?>
        <?php if (!$is_photosplit): ?>
          <div class="swp-body-side">
            <div class="swp-body-side-sticky">
              <?php print render($content['sowp_body_sideimgs']); ?>
              <?php print render($content['sowp_body_sidevids']); ?>

              <?php if ($sideinclude): ?>
                <?php include $sideinclude; ?>
              <?php endif; ?>

              <?php if ($node->nid != 13498 && $node->nid != 13460 && $node->nid != 13490): ?>
                <?php print $sowp_sharelinks; ?>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

      </div>
    </div>
    <span class="swp-clear">&nbsp;</span>
  </div>
</div>
