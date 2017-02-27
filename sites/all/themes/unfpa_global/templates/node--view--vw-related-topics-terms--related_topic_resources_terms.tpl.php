<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>
  </div>
  <?php print render($title_prefix); ?>
  <div class="item">
    <?php
    if ($overwrite == 1) {
      if (!empty($content['field_resource_cover_image'])) {
        print render($content['field_resource_cover_image']);
      }
      else {
        print render($content['field_resource_document']);
      }
    }
    ?>
    <div class="description">
      <a href="<?php print $node_url; ?>"><?php print $title; ?></a>
      <div class="summary">
        <?php
        if (!empty($content['field_blurb'])) {
          print render($content['field_blurb']);
        }
        else {
          print render($content['body']);
        }
        ?>        
      </div>
    </div>
    <div class="clearfix"></div>
  </div>

</div>

