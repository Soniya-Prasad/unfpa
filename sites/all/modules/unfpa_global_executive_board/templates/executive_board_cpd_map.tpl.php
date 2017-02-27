<?php
/**
 * @file
 * Theme implementation to display CPD Map section for Exbo.
 */
?>
<div class="exbo-title-social-wrapper clearfix">
<h1 class="page-title executive-board"><?php print t('Country Programme Document Map'); ?></h1>
<?php print $social_media; ?>
</div>
<h4><?php print t('Browse by Country'); ?></h4>
<div class="popover">
  <button class="pencil"><?php print t('Select country or territory'); ?></button>
  <div class="thepopover">
    <span class="triangle-img"></span>
    <div id="family-planning-countries">
      <div class="area">
        <h4><?php print t('Countries and Territories'); ?></h4>
        <ul>
          <?php foreach ($country as $country_code => $country_name): ?>
            <li><a href="javascript: update_tooltip('<?php print ($country_code); ?>')"><?php print ($country_name); ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
  <span class="info"><?php print t('Click on a country or territory or select from drop down list'); ?></span>
</div>
<div id="cpd-tooltip" class="hide-element">
  <span class="close-button"></span>
  <h4 class="country-title">India</h4>
  <div id="cpd-doc-wrapper">
  </div>
</div>
<div class="executive-board-outer-box" id="cpd-map">
  <div class="executive-board-sec-content clearfix">
    <div class="topo clearfix">
    </div>
    <div id="map"></div>
    <div id="cpd-map-filters" class="executive-board-filter-container hide-element">
      <span class="filters-title">Filter</span>
      <ul class="square-input-element" id="exbo-cpd-map">
        <li class="filter-option"><div><input class="active" name="cpd-filter" value="All" checked="true" type="radio"><label><?php print t('All CPDs'); ?></label></div></li>
        <li class="filter-option"><div><input name="cpd-filter" value="approved" type="radio"><label><?php print t('Approved CPDs and extensions'); ?></label></div></li>
        <li class="filter-option"><div><input name="cpd-filter" value="draft_for_review" type="radio"><label><?php print t('CPD - Draft for review'); ?></label></div></li>        
        <li class="filter-option"><div><input name="cpd-filter" value="for_discussion" type="radio"><label><?php print t('CPD and Extensions for Discussion'); ?></label></div></li>
      </ul>
    </div>
  </div>
</div>
<div class="disclaimer-text map-text-summary hide-element">
  <span>
    <?php print t("The designations employed and the presentation of material on the map do not imply the expression of any opinion whatsoever on the part of UNFPA concerning the legal status of any country, territory, city or area or its authorities, or concerning the delimitation of its frontiers or boundaries. The dotted line represents approximately the Line of Control in Jammu and Kashmir agreed upon by India and Pakistan. The final status of Jammu and Kashmir has not yet been agreed upon by the parties."); ?>
  </span>
</div>
<div class="grey-background hide-element"></div>
<div class="loader"></div>

