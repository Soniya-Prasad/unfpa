<?php

/**
 * @file
 * Theme implementation to display SOWMY Availability section.
 */
?><h2><?php print $availability_data['title']; ?></h2>
<div id="availability-table">
  <div class="row row-country-classification-time-spant">
    <div class="column column1"><?php print t('Country classification of staworking in MNH'); ?></div>
    <div class="column column2"><?php print t('Time spent on MNH %'); ?></div>
  </div>
  <div class="row row-midwives">
    <div class="label">
      <div class="label-box"></div>
      <span><?php print t('Midwives'); ?></span>
    </div>
    <div class="value"><?php print $availability_data['midwife_workers']; ?></div>
    <div class="value"><?php print $availability_data['midwife_working_hours']; ?></div>
  </div>
  <div class="row row-midwives-auxiliary">
    <div class="label">
      <div class="label-box"></div>
      <span><?php print t('Midwives, auxiliary'); ?></span>
    </div>
    <div class="value"><?php print $availability_data['auxiliary_midwife_workers']; ?></div>
    <div class="value"><?php print $availability_data['auxiliary_midwife_working_hours']; ?></div>
  </div>
  <div class="row row-nurse-midwives">
    <div class="label">
      <div class="label-box"></div>
      <span><?php print t('Nurse-midwives'); ?></span>
    </div>
    <div class="value"><?php print $availability_data['nurse_midwife_workers']; ?></div>
    <div class="value"><?php print $availability_data['nurse_midwife_working_hours']; ?></div>
  </div>
  <div class="row row-nurses">
    <div class="label">
      <div class="label-box"></div>
      <span><?php print t('Nurses'); ?></span>
    </div>
    <div class="value"><?php print $availability_data['nurse_workers']; ?></div>
    <div class="value"><?php print $availability_data['nurse_working_hours']; ?></div>
  </div>
  <div class="row row-nurses-nurse-midwives">
    <div class="label">
      <div class="label-box"></div>
      <span><?php print t('Nurses or nurse- midwives, auxiliary'); ?></span>
    </div>
    <div class="value"><?php print $availability_data['auxiliary_nurse_midwife_workers']; ?></div>
    <div class="value"><?php print $availability_data['auxiliary_nurse_midwife_working_hours']; ?></div>
  </div>
  <div class="row row-clinical-ocers">
    <div class="label">
      <div class="label-box"></div>
      <span><?php print t('Clinical ocers & medical assistants'); ?></span>
    </div>
    <div class="value"><?php print $availability_data['clinical_officer_workers']; ?></div>
    <div class="value"><?php print $availability_data['clinical_officer_working_hours']; ?></div>
  </div>
  <div class="row row-physicians-generalists">
    <div class="label">
      <div class="label-box"></div>
      <span><?php print t('Physicians, generalists'); ?></span>
    </div>
    <div class="value">
      <?php print $availability_data['physician_generalist_workers']; ?>
    </div>
    <div class="value">
      <?php print $availability_data['physician_generalist_working_hours']; ?>
    </div>
  </div>
  <div class="row row-obstetricians-gynaecologists">
    <div class="label">
      <div class="label-box"></div>
      <span>
        <?php print t('Obstetricians & gynaecologists'); ?>
      </span>
    </div>
    <div class="value"><?php print $availability_data['physician_specialist_workers']; ?></div>
    <div class="value"><?php print $availability_data['physician_specialist_working_hours']; ?></div>
  </div>
</div>
<div id="sowmy-map-details-wrapper">
  <div id="sowmy-map-details">
    <div class="episode pre-pregnancy">
      <div class="episode-arrow"></div>
      <div class="label-wrapper">
        <div class="label"><?php print t('PRE-PREGNANCY'); ?></div>
      </div>
    </div>
    <div class="episode antenatal">
      <div class="episode-arrow"></div>
      <div class="label-wrapper">
        <div class="label"><?php print t('ANTENATAL'); ?></div>
      </div>
    </div>
    <div class="episode birth">
      <div class="episode-arrow"></div>
      <div class="label-wrapper">
        <div class="label"><?php print t('BIRTH'); ?></div>
      </div>
    </div>
    <div class="episode post-partum">
      <div class="episode-arrow"></div>
      <div class="label-wrapper">
        <div class="label"><?php print t('POST-PARTUM'); ?></div>
      </div>
    </div>
    <div class="episode postnatal">
      <div class="episode-arrow"></div>
      <div class="label-wrapper">
        <div class="label"><?php print t('POSTNATAL'); ?></div>
      </div>
    </div>
  </div>
  <div id="availability-seperator"></div>
  <div id="availability-details">
    <div class="met-need"><?php print t('ESTIMATED MET NEED'); ?>=</div>
    <div class="met-value"><?php print $availability_data['met_need']; ?>%</div>
    <div class="time-available"><?php print t('workforce time available'); ?></div>
    <div class="time-needed"><?php print t('workforce time needed'); ?></div>
    <div class="aggregate-data"><?php print t('Estimate of met need (national aggregate) based on available data'); ?></div>
  </div>
</div>
