<?php

/**
 * @file
 * Theme implementation to display SOWP Report section Featured Story nodes.
 */
?>

<div class="swp-story" id="Node-<?php print $node->nid; ?>">
  <button class="story-close">
    <span class="icon icon-story-close"></span>
  </button>
  
  <h3 class="story-title color-text"><?php print $title; ?></h3>
  
  <div class="story-img-slider">
    <?php print render($content['sowp_story_imgs']); ?>
  </div>
  
  <div class="story-body">
    <div class="story-body-inner">
      <?php print render($content['sowp_story_body']); ?>
    </div>
  </div>
  
  <div class="story-showall element-hidden swp-upper sb-font">
    <button class="st-show"><?php print t('Show all at once'); ?></button>
    <button class="st-hide"><?php print t('Hide story'); ?></button>
  </div>

  <?php print $sowp_sharelinks; ?>
</div>
