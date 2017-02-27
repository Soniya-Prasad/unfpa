<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?> submenu topics"<?php print $attributes; ?> data-parent="topics">

  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>
  
</div> <!-- /.block -->
