<?php
/**
 * @file
 * Theme implementation to display AR 2014 '20 Years In Progress' nodes.
 *
 * Custom added variables:
 * - $icon_class: Css class used for selecting right side icon
 * - $style: Style tag with desktop background-image url (if any)
 * - $style_mobile: Style tag with mobile background-image url (if any)
 * - $class_mobile: Additional css class used if entry has bg image
 * - $side: progress Item side content.
 *
 * @see un_preprocess_node().
 */
?>

<div class="sc-anchor"><a id="Node-<?php print $node->nid; ?>"></a></div>

<div class="rp-progress <?php print $icon_class; ?>"<?php print $style; ?>>
  <div class="rp-progress-inner" data-600-top-top="background-position: 0px 71px;" data-650-top-top="background-position: -100px 71px;" data-0="background-position: -100px 71px;">

    <div class="progress-texts">
      <h3 class="con-font"><?php print $title; ?></h3>
      <?php print render($content['field_progress_body']); ?>
    </div>

    <div class="progress-side<?php print $class_mobile; ?>"<?php print $style_mobile; ?>>
      <?php print $side; ?>
    </div>

  </div>
</div>
