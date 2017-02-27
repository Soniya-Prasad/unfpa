<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>
    <?php print render($title_prefix); ?>
    <div class="item">
      <div class="news-image"><?php print render($content['field_news_image']); ?></div>
      <div class="feature-image"><?php
        if ($show_feature == 'yes') {
          print render($content['field_feature_banner_image']);
        }
        else {
          print render($content['field_news_image']);
        }
        ?></div>
      <?php if (!$page): ?>
        <div class="news-title">
          <?php print $title; ?>
        </div>
      <?php endif; ?>
      <a href="<?php print $node_url; ?>" class="description">
        <div class="description-container">
          <div class="description-scroller">
            <div class="news-title"><?php print render($title); ?></div>
            <div class="summary"><?php print render($content['field_blurb']); ?></div>
          </div>
        </div>
      </a>
      <div class="clearfix"></div>
    </div>

  </div>
</div>

