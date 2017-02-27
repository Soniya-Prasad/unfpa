<?php
/**
 * @file
 * Main view template.
 */
?>
<div class="<?php print $classes; ?>">
  <div class="exbo-title-social-wrapper clearfix">
    <h1 class="page-title executive-board"><?php print t("Members of the Executive Board"); ?></h1>
  </div>
  <div class="exec-brd view-events-header">
    <span class="selected-one"><?php print t('Select one:'); ?></span>
    <div class="select-list">
      <a class="bluelink" href="<?php echo "board-members"; ?>"><?php print t('Board Members'); ?></a>
      <a class="active bluelink bureau-members" href= "<?php echo "bureau-members"; ?>"><?php print t('Bureau Members'); ?></a>      
    </div>
    <div class="clearfix"></div>
  </div>
  <?php if ($header): ?>
    <div class="exec-brd view-header">
      <?php print $header; ?>
    </div>
  <?php endif; ?>
  <?php if ($exposed): ?>  
    <div class="exec-brd-exposed-filter-container">
      <div class="filter-fields exec-brd-filter-text"><?php
        print t('Bureau Members');
        ?>
        <?php if ($year): ?>
          <span><?php print $year; ?></span>
        <?php endif; ?>
      </div>
      <div class="filter-fields exec-brd-view-filters">
        <div class="view-filters">
          <?php print $exposed; ?>
        </div>
      </div>
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

</div><?php /* class view */ ?>
