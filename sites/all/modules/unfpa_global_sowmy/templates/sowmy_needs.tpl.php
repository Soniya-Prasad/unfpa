<?php

/**
 * @file
 * Theme implementation to display SOWMY Needs section.
 */
?>
<h2><?php print t('What women and newborns need (2012)'); ?></h2>
<div id="episodes-label">
  <?php print $sowmy_data['number_of_pregnancies'] . ' ' . t('PREGNANCIES A YEAR = HOW MANY EPISODES OF CARE'); ?>
  ?
</div>
<div id="sowmy-map-needs">
  <?php print $sowmy_data['image']; ?>
  <div class="map-title"><?php print t('Number and distribution of pregnancies (2012)'); ?></div>
  <div class="map-legends">
    <div class="legend legend-1"><div class="legend-box"></div>0</div>
    <div class="legend legend-2"><div class="legend-box"></div>&lt;0.09</div>
    <div class="legend legend-3"><div class="legend-box"></div>0.10-0.19</div>
    <div class="legend legend-4"><div class="legend-box"></div>0.20-0.49</div>
    <div class="legend legend-5"><div class="legend-box"></div>0.50-0.99</div>
    <div class="legend legend-6"><div class="legend-box"></div>1.00-1.49</div>
    <div class="legend legend-7"><div class="legend-box"></div>1.50-1.99</div>
    <div class="legend legend-8"><div class="legend-box"></div>2.00-2.49</div>
    <div class="legend legend-9"><div class="legend-box"></div>2.50-10.00</div>
    <div class="legend legend-10"><div class="legend-box"></div>&gt;10.00</div>
  </div>
</div>
<div id="sowmy-map-details">
  <div id="approx-text"><?php print t('APPROX'); ?></div>
  <div class="episode pre-pregnancy">
    <div class="episode-arrow"></div>
    <div class="label-wrapper">
      <div class="label"><?php print t('PRE-PREGNANCY'); ?></div>
      <div class="sub-label">(<?php print t('all women of reproductive age'); ?>)</div>
    </div>
    <div class="eq-wrapper"> = </div>
    <div class="value-wrapper">
      <div class="value">
        <?php print $sowmy_data['number_of_family_planning_visits']; ?>
      </div>
      <div class="sub-value"><?php print t('family planning visits'); ?></div>
    </div>
  </div>
  <div class="episode antenatal">
    <div class="episode-arrow"></div>
    <div class="label-wrapper">
      <div class="label"><?php print t('ANTENATAL'); ?></div>
      <div class="sub-label">(<?php print t('pregnancies x 4'); ?>)</div>
    </div>
    <div class="eq-wrapper"> = </div>
    <div class="value-wrapper">
      <div class="value">
        <?php print $sowmy_data['number_of_anc_visits_needed']; ?>
      </div>
      <div class="sub-value"><?php print t('routine visits'); ?></div>
    </div>
  </div>
  <div class="episode birth">
    <div class="episode-arrow"></div>
    <div class="label-wrapper">
      <div class="label"><?php print t('BIRTH'); ?></div>
      <div class="sub-label"></div>
    </div>
    <div class="eq-wrapper"> = </div>
    <div class="value-wrapper">
      <div class="value">
        <?php print $sowmy_data['skilled_birth_attendance_needed']; ?>
      </div>
      <div class="sub-value"><?php print t('skilled birth attendance'); ?></div>
    </div>
  </div>
  <div class="episode post-partum">
    <div class="episode-arrow">
    </div>
    <div class="label-wrapper">
      <div class="label"><?php print t('POST-PARTUM'); ?></div>
      <div class="sub-label">(<?php print t('births x 4'); ?>)</div>
    </div>
    <div class="grp-wrapper"></div>
    <div class="eq-wrapper"> = </div>
    <div class="value-wrapper">
      <div class="value">
        <?php print $sowmy_data['number_of_pnc_visits_needed']; ?>
      </div>
      <div class="sub-value"><?php print t('routine visits'); ?></div>
    </div>
  </div>
  <div class="episode postnatal">
    <div class="episode-arrow">
    </div>
    <div class="label-wrapper">
      <div class="label"><?php print t('POSTNATAL'); ?></div>
      <div class="sub-label">(<?php print t('newborns x 4'); ?>)</div>
    </div>
    <div class="grp-wrapper"></div>
    <div class="eq-wrapper"></div>
    <div class="value-wrapper">
      <div class="value"></div>
      <div class="sub-value"></div>
    </div>
  </div>
</div>
