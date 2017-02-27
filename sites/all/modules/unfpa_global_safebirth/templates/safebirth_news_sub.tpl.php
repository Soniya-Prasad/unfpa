<?php

/**
 * @file
 * Display the sub news block.
 */
?>

<div class="image-section-container clearfix">
  <div class="hover-effect">
    <?php print $news_image_url; ?>
    <div class="publication-overlay image-overlay">
      <a href="<?php print $node_link; ?>" title="<?php print $title; ?>" class="section_hover">
        <div class="overlay-inner-wrapper">
          <div class="news-date"><?php echo $date; ?></div>
          <div class="section-category"><?php echo $news_type; ?></div>
          <div class="news-title"><?php echo $title; ?></div>
          <p class="description"><?php echo $body; ?></p>
          <div class="news-read-more"><?php echo $read_more_text; ?></div>
        </div>
      </a>
    </div>
  </div>
</div>
