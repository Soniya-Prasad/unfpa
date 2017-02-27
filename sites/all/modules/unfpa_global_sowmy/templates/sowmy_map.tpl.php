<?php

/**
 * @file
 * Theme implementation to display SOWMY Map section on SOWMY landing page.
 */
?>
<div id="sowmy-map">
  <div id="map"></div>
  <div id="sowmy-map-scale-wrapper">
    <div class="swomy-scale-title"><?php print t("The State of the World's Midwifery Dashboard Estimated met need"); ?></div>
    <div class="no-data-legend">
      <span class="country-legend"></span>
      <span><?php print t('Countries with no data'); ?></span>
    </div>
    <div class="sowmy-scale"></div>
    <span class="max"><?php print t('Higher'); ?></span>
    <span class="min"><?php print t('Lower'); ?></span>
  </div>
</div>
