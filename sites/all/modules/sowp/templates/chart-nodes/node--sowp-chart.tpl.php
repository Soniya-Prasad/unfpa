<?php

/**
 * @file
 * Template to display SOWP Animated chart, image slider or custom include.
 */
?>

<div class="swp-bg swp-chart" id="Node-<?php print $node->nid; ?>"<?php print $bg; ?>>
  <div class="swp-width">
    <div class="swp-content">

      <?php if ($usetype == 'chart'): ?>

        <div class="swp-chart-charts">
          <?php print render($content['sowp_chart_charts']); ?>
          <?php print $sowp_sharelinks; ?>
        </div>

      <?php elseif ($usetype == 'include'): ?>

        <div class="swp-chart-include">
          <?php include $include; ?>
          <?php print $sowp_sharelinks; ?>
        </div>

      <?php elseif ($usetype == 'image'): ?>

        <?php if ($single_image): ?>
          <div class="swp-chart-bigimage">
            <?php print $single_image; ?>
            <?php if ($node->nid != 13530): ?>
              <?php print $sowp_sharelinks; ?>
            <?php endif; ?>
          </div>
        <?php else: ?>
          <div class="swp-chart-imgslider">
            <?php print render($content['sowp_chart_images']); ?>
            <?php print $sowp_sharelinks; ?>
          </div>
        <?php endif; ?>

      <?php endif; ?>

    </div>
    <span class="swp-clear">&nbsp;</span>
  </div>
</div>
