<?php

/**
 * @file
 * Theme implementation to display SOWMY page.
 */
?>
<div id="sowmy-main-content">
  <div class="sowmy-wrapper">
    <h1><?php print $sowmy_country_name; ?></h1>
    <h2 id='sub-title'><?php print t("The State of the World's Midwifery 2014"); ?></h2>
    <div class="topo clearfix">
      <div class="popover">
        <button class="pencil"><?php print t('Select country or territory'); ?></button>
        <div class="thepopover">
          <span class="triangle-img"></span>
          <div id="sowmy-map-area-click-id">
            <div class="area">
              <h4><?php print t('Countries and Territories'); ?></h4>
              <ul>
                <?php foreach ($country_data as $country_code => $country_name): ?>
                  <li>
                    <a href="<?php print $country_code; ?>">
                      <?php print $country_name; ?>
                    </a>
                  </li>
                <?php endforeach; ?>
              </ul>
            </div>
          </div>
        </div>
        <span class="info">
          <?php print t('Click on a country or territory or select from drop down list'); ?>
        </span>
      </div>
    </div>
  </div>
  <div id="sowmy-needs">
    <div class="sowmy-wrapper">
      <?php print $sowmy_needs_content; ?>
    </div>
  </div>

  <div id="sowmy-first-section">
    <div class="sowmy-wrapper">
      <div id="sowmy-availability">
        <?php print $sowmy_availability_content; ?>
      </div>

      <div id="sowmy-accessibility">
        <h2><?php print t('Geographic accessibility'); ?></h2>
        <h3>
          <?php print t('Number of births with a skilled birth attendant (SBA)'); ?>
          <sup>2</sup>
        </h3>
        <div id="accessibility-chart" ></div>
        <div class="label-accessed-sba label">
          <div class="label-box"></div>
          <span><?php print t('Accessed a SBA'); ?></span>
        </div>
        <div class="label-not-accessed-sba label">
          <div class="label-box"></div>
          <span><?php print t('Did not access a SBA'); ?></span>
        </div>
        <div class="label-no-data-on-rural label">
          <div class="label-box"></div>
          <span><?php print t('No data on rural/urban SBA'); ?></span>
        </div>
      </div>
    </div>
  </div>
  <div id="sowmy-middle-section">
    <div class="sowmy-wrapper">
      <?php print $sowmy_midwifery_content; ?>
    </div>
  </div>

  <div id="sowmy-pregnencies">
    <div class="sowmy-wrapper">
      <h2><?php print t('PROJECTED NUMBER OF PREGNANCIES BY YEAR: URBAN VS. RURAL'); ?></h2>
      <div id="pregencies-chart"></div>
    </div>
  </div>

  <div id="sowmy-whatif-estimates">
    <div class="sowmy-wrapper">
      <?php print $sowmy_whatif_content; ?>
    </div>
  </div>

  <div id="sowmy-last-section">
    <div class="sowmy-wrapper">
      <div id="sowmy-current-trajectory">
        <h2><?php print $current_trajectory_label; ?></h2>
        <div id="visualization"></div>
        <div class="details">
          <span>
            <?php print $current_trajectory_met_need; ?>
            %
          </span>
          <?php print t('MET NEED 2030'); ?>
        </div>
      </div>

      <div id="sowmy-whatif-trajectory">
        <h2><?php print $whatif_trajectory_label; ?></h2>
        <div id="whatif-chart"></div>
        <div class="details">
          <span>
            <?php print $whatif_trajectory_met_need; ?>
            %
          </span>
          <?php print t('MET NEED 2030'); ?>
        </div>
      </div>

      <div id="sowmy-footnotes">
        <!--Country-specific cadre footnote.-->
        <div> 1. <?php print $footnote1; ?></div>
        <!--Year of data is as per most recent data available in STATCOMPILER.-->
        <div> 2. <?php print $footnote2; ?></div>
        <!--Information refers to the Midwife (or Nurse-Midwife) cadre category.-->
        <div> 3. <?php print $footnote3; ?></div>
        <!--National associations for midwifery and nursing.-->
        <div> 4. <?php print $footnote4; ?></div>
      </div>

    </div>
  </div>
</div>
