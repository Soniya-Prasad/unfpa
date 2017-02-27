<?php
/**
 * @file
 * Theme implementation to display transparency portal on funds - funding page.
 */
?>
<div class="dash-outer-box" id="transparency">
  <div class="dash-sec-title"><span class="section-title"><?php print t('Transparency'); ?></span></div>
  <div class="dash-sec-content clearfix">
    <div class="data donut-chart-container">
      <div id="donut-chart-tabs" class="container">
        <ul>
          <li class="active donut-chart-tabs" tabfor="all">
            <span><?php print t('All resources'); ?></span>
          </li>
          <li class="donut-chart-tabs" tabfor="core">
            <span><?php print t('Core'); ?></span>
          </li>
          <li class="donut-chart-tabs" tabfor="noncore">
            <span><?php print t('Non - core'); ?></span>
          </li>
        </ul>
      </div>
      <div class="donut-chart-wrapper">
        <div id="donutchart-all" class="donut-chart all visible-element"></div>
        <div id="donutchart-core" class="donut-chart core"></div>
        <div id="donutchart-noncore" class="donut-chart noncore"></div>
      </div>
    </div>
    <div class="bchart-container">
      <div id="bchart-all" class="bchart all visible-element"></div>
      <div id="bchart-core" class="bchart core"></div>
      <div id="bchart-noncore" class="bchart noncore"></div>
    </div>
    <?php print $transparency_images_section; ?>
  </div>
</div>
