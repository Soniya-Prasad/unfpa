<?php

/**
 * @file
 * Template for News section.
 */
?>
<div id="news-events-section" class="container-section grey-background">
  <div class="inside-wrapper-spacer">
    <h1>News</h1>
    <div class="image-section-container clearfix">
      <div class="events-left-section">
        <div class="hover-effect">
          <?php print $news_image_url; ?>
          <div class="event-overlay image-overlay">
            <a href="<?php print $node_link; ?>" title="<?php print $title; ?>" class="section_hover">
              <div class="overlay-inner-wrapper">
                <div class="news-date"><?php print $date; ?></div>
                <div class="news-title"><?php print $title; ?></div>
                <p class="description"><?php print $body; ?></p>
                <div class="news-read-more"><?php print $read_more_text; ?></div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
