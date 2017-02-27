<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>
  </div>

  <?php print render($title_prefix); ?>
  <div class="item">
    <?php
    if (!empty($content['field_publication_cover_image'])) {
      print render($content['field_publication_cover_image']);
    }
    else {
      print render($content['field_languages']);
    }
    ?>
    <a href="<?php print $node_url; ?>" class="description">                  
      <div class="description-container">
        <div class="description-scroller">
          <div class="news-title"><?php print $title; ?></div>                    
          <div class="summary"><?php print render($content['field_blurb']); ?>
          </div>
        </div>
      </div>
    </a>
    <div class = "clearfix"></div>
  </div>

</div>

