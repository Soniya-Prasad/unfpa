<?php
/**
 * @file
 * Default theme implementation to display a node.
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> clearfix"<?php print $attributes; ?>>
  <div class="content"<?php print $content_attributes; ?>>
    <div class="calendar">
      <?php print render($content['field_exbo_date']); ?>
    </div>
    <div class="location">
      <?php print render($content['field_location']); ?>
    </div>
  </div>
  <?php print $user_picture; ?>
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php print render($content['body']); ?>
  <?php $content['links']['node']['#links']['node-readmore']['title'] = t('Details'); ?>
  <?php print render($content['links']); ?>
</div>
