<?php
/**
 * @file
 * Display the publication block template.
 */
?>
<div class="image-section-container clearfix">
  <div class="hover-effect">
    <?php print $image; ?>
    <div class="news-overlay image-overlay">
      <a href="<?php print $node_link; ?>" title="<?php print $type; ?>" class="section_hover">
        <div class="overlay-inner-wrapper">
          <div class="section-category"><?php print $type; ?></div>
          <div class="news-read-more"><?php print $read_more_text; ?></div>
        </div>
      </a>
    </div>
  </div>
</div>
