<?php
/**
 * @file
 * Theme implementation to display Annual Report 2014/2015 'In Action' entries.
 *
 * Custom added variables:
 * - $report_year: The year of AR this node belongs to, either 2014 or 2015.
 * - $highlights_bg: Highlights box background image style.
 * - $facts: An associative array containing facts to display. Each fact has:
 *   - title: Name of the fact.
 *   - graph: Graph HTML to show. Can be image, donught, bar etc.
 *   - copy: Fact description.
 * - $facts_class: Css class to apply to facts wrapper element.
 *
 * @see un_preprocess_node().
 */
?>
<div class="sc-anchor"><a id="Node-<?php print $node->nid; ?>"></a></div>

<div class="in-action">

  <div class="action-header">
    <div class="action-titles">
      <h2 class="rp-upper con-font"><?php print $title; ?></h2>
      <?php if ($report_year != 2015): ?>
        <h3 class="rp-upper con-font"><?php print render($content['field_action_subtitle']); ?></h3>
      <?php endif; ?>
    </div>
    <div class="action-img action-img-desktop"><?php print render($content['field_action_image']); ?></div>
    <div class="action-img action-img-mobile"><?php print render($content['field_action_image2']); ?></div>
  </div>

  <?php if ($report_year == 2015): ?>
    <div class="section-main-copy">
      <?php print render($content['field_action_body']); ?>
      <?php print render($content['field_action_body_2']); ?>
    </div>
  <?php else: ?>
    <div class="section-main-copy">
      <div class="items-50">
        <div class="item">
          <?php print render($content['field_action_body']); ?>
          <?php print render($content['field_action_body_2']); ?>
        </div>
        <div class="item">
          <?php print render($content['field_action_video']); ?>
        </div>
      </div>
    </div>

    <div class="action-highlights b-font rp-color-1" data-600-top-top="background-position: 56px center;" data-650-top-top="background-position: -100px center;" data-0="background-position: -100px center;"<?php print $highlights_bg; ?>>
      <?php print render($content['field_action_highlights']); ?>
    </div>
  <?php endif; ?>
  
  <h3 class="action-factshead rp-upper con-font"><?php print render($content['field_action_factshead']); ?></h3>

  <div class="action-facts <?php print $facts_class; ?>">
    <?php foreach ($facts as $fact): ?>
      <div class="fact">
        <div class="fact-name rp-bg-3">
          <h4 class="rp-upper b-font"><?php print $fact['title']; ?></h4>
        </div>
        <div class="fact-graph">
          <?php print $fact['graph']; ?>
        </div>
        <p class="rp-color-7"><?php print $fact['copy']; ?></p>
      </div>
    <?php endforeach; ?>
  </div>

</div>
