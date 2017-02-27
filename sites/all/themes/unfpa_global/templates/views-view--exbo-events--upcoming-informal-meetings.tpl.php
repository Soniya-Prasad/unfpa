<?php
/**
 * @file
 * Main view template.
 */
?>
<div class="<?php print $classes; ?>">
  <div class="view-events-header">
    <span class="selected-event"><?php print t('Upcoming Events'); ?></span>
    <div class="select-list">
      <a class="active bluelink" href= "<?php echo $upcoming_events_link; ?>"><?php print t('Upcoming Events'); ?></a>
      <a class="bluelink" href="<?php echo $past_events_link; ?>"><?php print t('Past Events'); ?></a>
    </div>
    <div class="clearfix"></div>
  </div>
  <?php if ($header): ?>
    <div class="view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>
  <?php if ($exposed): ?>
    <div class="view-filters">
      <?php print $exposed; ?>
    </div>
  <?php endif; ?>

  <?php if ($attachment_before): ?>
    <div class="attachment attachment-before">
      <?php print $attachment_before; ?>
    </div>
  <?php endif; ?>
  <?php if ($rows): ?>
    <div class="view-content">
      <?php print $rows; ?>
    </div>
  <?php elseif ($empty): ?>
    <div class="view-empty">
      <?php print $empty; ?>
    </div>
  <?php endif; ?>
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <?php print $title; ?>
  <?php endif; ?>
  <?php print render($title_suffix); ?>
  <?php if ($pager): ?>
    <?php print $pager; ?>
  <?php endif; ?>

  <?php if ($attachment_after): ?>
    <div class="attachment attachment-after">
      <?php print $attachment_after; ?>
    </div>
  <?php endif; ?>

  <?php if ($more): ?>
    <?php print $more; ?>
  <?php endif; ?>

  <div class="upcoming-events-footer">
    <a class="upcoming-events-footer-link" href="<?php echo $executive_board_link; ?>">Executive Board</a>
  </div>
  <?php if ($footer): ?>
    <div class="view-footer">
      <?php print $footer; ?>
    </div>
  <?php endif; ?>

  <?php if ($feed_icon): ?>
    <div class="feed-icon">
      <?php print $feed_icon; ?>
    </div>
  <?php endif; ?>
</div>
