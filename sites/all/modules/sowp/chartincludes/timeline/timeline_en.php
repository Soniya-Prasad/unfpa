<?php
$p = base_path() . drupal_get_path('module', 'sowp') . '/';
$p_imgs = base_path() . drupal_get_path('module', 'sowp') . '/chartincludes/timeline/images/';
?>

<div class="swp-timeline">
    <h3 class="color-text b-font swp-upper"><?php print $title; ?></h3>

    <div class="timeline-legend">
        <span class="legend-disasters"><?php print t('Disasters'); ?></span>
        <span class="legend-conflicts"><?php print t('Conflicts'); ?></span>
    </div>

    <div class="timeline-chart-wrapper">
        <div class="timeline-chart">
            <canvas class="timeline-canvas" height="429" width="1970"></canvas>
        </div>
    </div>

    <div class="timeline-mobile">
        <img src="<?php print $p_imgs; ?>timeline-mobile.jpg" alt="" class="timeline-mobile-image">
    </div>

    <div class="timeline-scrollbar"></div>

    <?php print theme('sowp_sharelinks', array('nid' => $node->nid, 'title' => $title, 'twitter_share' => $twitter_share, 'twitter_hashtags' => $twitter_hashtags)); ?>
</div>