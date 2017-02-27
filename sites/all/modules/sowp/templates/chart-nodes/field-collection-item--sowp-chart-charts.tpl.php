<?php

/**
 * @file
 * Default theme implementation for field collection items.
 *
 * Available variables:
 * - $content: An array of comment items. Use render($content) to print them
 *   all, or print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $title: The (sanitized) field collection item label.
 * - $url: Direct url of the current entity if specified.
 * - $page: Flag for the full page state.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. By default the following classes are available, where
 *   the parts enclosed by {} are replaced by the appropriate values:
 *   - entity-field-collection-item
 *   - field-collection-item-{field_name}
 *
 * Other variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 *
 * @see template_preprocess()
 * @see template_preprocess_entity()
 * @see template_process()
 */
?>

<div class="swp-chart-chart">
  <h3 class="color-text sb-font swp-upper"><?php print render($content['sowp_chart_title']); ?></h3>
  
  <div class="swp-multisvg">
    <div class="swp-multisvg-svgs">
      <img class="anim anim-base" src="<?php print $svg_base; ?>" alt="" />
      <img class="anim anim-grid" src="<?php print $svg_grid; ?>" alt="" />
      <img class="anim anim-bars" src="<?php print $svg_bars; ?>" alt="" />
    </div>
    
    <div class="swp-multisvg-nosvg">
      <?php print render($content['sowp_chart_static']); ?>
    </div>

    <div class="swp-multisvg-xlabel">
      <?php print render($content['sowp_chart_xaxislabel']); ?>
    </div>
    
    <?php if ($smallnote): ?>
      <div class="swp-multisvg-smallnote">
        <?php print render($content['sowp_chart_smallnote']); ?>
      </div>
    <?php endif; ?>
  </div>
  
</div>
