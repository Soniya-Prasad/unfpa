<?php
/**
 * @file
 * Theme implementation to display Annual Report 2014/2015 Region nodes.
 *
 * Custom added variables:
 * - $progress: An associative array with 'Progress' section items, with keys:
 *   - title: Title of the progress item entry.
 *   - copy: Description of the progress item entry.
 *
 * - $facts: An associative array with Indicators (Facts) to display, with keys:
 *   - copy: Description of the fact.
 *   - bigcopy: Enlarged piece of the description of the fact.
 *   - graph: Graph HTML to show. Can be image, donught, bar etc.
 * - $expnses_list: Text list of costs displayed in the Expenses subsection.
 * - $expenses_charts: HTML for expenses charts (legend, labels, etc).
 * - $expenses_js: Javascript charts config, used by expenses charts.
 *
 * @see un_preprocess_node().
 */
?>
<div class="sc-anchor"><a id="Node-<?php print $node->nid; ?>"></a></div>

<div class="rp-region">

  <h2 class="region-name unt-font"><?php print $title; ?></h2>

  <div class="region-header">
    <div class="region-photo"><?php print render($content['field_region_photo']); ?></div>
    <div class="region-intro unt-font">
      <h3 class="unsb-font"><?php print render($content['field_region_intro_title']); ?></h3>
      <?php print render($content['field_region_intro_copy']); ?>
      <?php print render($content['field_region_intro_copy_2']); ?>
    </div>
  </div>

  <h3 class="region-subheader unb-font"><span><?php print t('Context And Challenges'); ?></span></h3>
  <div class="items-7-5">
    <div class="item">
      <?php print render($content['field_region_body']); ?>
      <?php print render($content['field_region_body_2']); ?>
    </div>
    <div class="item">
      <?php print render($content['field_region_video']); ?>
    </div>
  </div>

  <h3 class="region-subheader unb-font"><span><?php print t('Progress'); ?></span></h3>
  <div class="region-progress items-50">
    <?php foreach ($progress as $progr): ?>
      <div class="item">
        <h4 class="con-font"><?php print $progr['title']; ?></h4>
        <div class="progress-copy rp-color-1 sb-font">
          <?php print $progr['copy']; ?>
        </div>
      </div>
    <?php endforeach; ?>
  </div>

  <h3 class="region-subheader unb-font"><span><?php print t('Indicators'); ?></span></h3>
  <div class="region-indicators rp-bg-1">
    <div class="region-indicators-inner">
      <div class="region-indicators-inner-2">
        <?php foreach ($facts as $fact): ?>
          <div class="fact">
            <div class="fact-graph">
              <?php print $fact['graph']; ?>
            </div>
            <p>
              <?php print $fact['copy']; ?>
              <?php if ($fact['bigcopy']): ?>
                <strong><?php print $fact['bigcopy']; ?></strong>
              <?php endif; ?>
            </p>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <h3 class="region-subheader unb-font"><span><?php print t('Expenses'); ?></span></h3>

  <div class="rp-exp">

    <div class="rp-exp-1">
      <div class="exp-title">
        <h4><?php print t('Programme expenses'); ?></h4>
        <div class="exp-subtitle"><?php print t('in thousands of US$'); ?></div>
        <div class="exp-subinfo"><?php print t('(includes core and non-core resources)'); ?></div>
      </div>
      <h5><?php print $title; ?></h5>
      <?php print $expenses_list; ?>
    </div>

    <div class="rp-exp-2">
      <div class="exp-title">
        <h4><?php print t('Programme expenses by focus area'); ?></h4>
        <div class="exp-subtitle"><?php print t('in thousands of US$'); ?></div>
        <div class="exp-subinfo exp-empty">&nbsp;</div>
      </div>
      <ul class="exp-legend">
        <li><span style="background: #4295d1;"></span><b><?php print t('Integrated sexual and reproductive health'); ?></b></li>
        <li><span style="background: #f7941e;"></span><b><?php print t('Adolescents'); ?></b></li>
        <li><span style="background: #7bcab1;"></span><b><?php print t('Gender equality and rights'); ?></b></li>
        <li><span style="background: #7e79a9;"></span><b><?php print t('Data for development'); ?></b></li>
        <li><span style="background: #c0dc7d;"></span><b><?php print t('Organizational efficiency and effectiveness'); ?></b></li>
      </ul>
      <div class="exp-charts">
        <?php print $expenses_charts; ?>
      </div>
      <?php print $expenses_js; ?>
    </div>

  </div>

</div>
