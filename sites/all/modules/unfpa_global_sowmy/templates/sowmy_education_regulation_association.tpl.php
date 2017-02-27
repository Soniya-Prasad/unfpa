<?php

/**
 * @file
 * Theme implementation for Education, Regulation and Association section.
 */
?>
<div id="swomy-education">
  <h2><?php print t('MIDWIFERY EDUCATION'); ?>
    <sup>3</sup>
  </h2>
  <div class="row">
    <div class="label"><?php print t('Minimum high-school requirement to start training'); ?></div>
    <div class="value"><?php print $midwifery_data['minimum_entry_requirements']; ?></div>
  </div>
  <div class="row">
    <div class="label"><?php print t('Years of study required to qualify (rounded)'); ?></div>
    <div class="value"><?php print $midwifery_data['years_of_study_required']; ?></div>
  </div>
  <div class="row">
    <div class="label"><?php print t('Standardized curriculum? Year of last update'); ?></div>
    <div class="value"><?php print $midwifery_data['standard_curriculum'] . ', ' . $midwifery_data['last_update_year']; ?></div>
  </div>
  <div class="row">
    <div class="label"><?php print t('Minimum number of supervised births in curriculum'); ?></div>
    <div class="value"><?php print $midwifery_data['number_of_midwives']; ?></div>
  </div>
  <div class="row">
    <div class="label"><?php print t('Number of 2012 graduates/as % of all practising midwives'); ?></div>
    <div class="value"><?php print $midwifery_data['midwife_graduates_percent'] . '/' . $midwifery_data['is_autonomous_profession']; ?></div>
  </div>
  <div class="row">
    <div class="label"><?php print t('% of graduates employed in MNH within one year'); ?></div>
    <div class="value"><?php print $midwifery_data['is_professional_midwife']; ?></div>
  </div>
</div>
<div id="swomy-regulation">
  <h2><?php print t('MIDWIFERY REGULATION'); ?></h2>
  <div class="row">
    <div class="label"><?php print t('Legislation exists recognizing midwifery as an autonomous profession'); ?></div>
    <div class="value"><?php print $midwifery_data['midwifery_practice']; ?></div>
  </div>
  <div class="row">
    <div class="label"><?php print t('A recognized definition of a professional midwife exists'); ?></div>
    <div class="value"><?php print $midwifery_data['is_system_licensing']; ?></div>
  </div>
  <div class="row">
    <div class="label"><?php print t('A government body regulates midwifery practice'); ?></div>
    <div class="value"><?php print $midwifery_data['licensed_midwives']; ?></div>
  </div>
  <div class="row">
    <div class="label"><?php print t('A licence is required to practise midwifery'); ?></div>
    <div class="value"><?php print $midwifery_data['number_of_functions_carried_out']; ?></div>
  </div>
  <div class="row">
    <div class="label"><?php print t('A live registry of licensed midwives exists'); ?></div>
    <div class="value"><?php print $midwifery_data['authorized_contraceptive_injections']; ?></div>
  </div>
  <div class="row">
    <div class="label"><?php print t('Number of EmONC basic signal functions that midwives are allowed to practise (out of a possible 7)'); ?></div>
    <div class="value"><?php print $midwifery_data['number_of_functions_allowed']; ?></div>
  </div>
  <div class="row">
    <div class="label"><?php print t('Midwives allowed to provide injectable contraceptives/intrauterine devices'); ?></div>
    <div class="value"><?php print $midwifery_data['allowed_injectable_contraceptives'] . '/' . $midwifery_data['allowed_to_provide_idu']; ?></div>
  </div>
</div>
<div id="swomy-association">
  <h2><?php print t('PROFESSIONAL ASSOCIATIONS'); ?>
    <sup>4</sup>
  </h2>
  <div class="row">
    <div class="label"><?php print t('Year of creation of professional associations'); ?></div>
    <div class="value"><?php print $midwifery_data['professional_associations_year']; ?></div>
  </div>
  <div class="list">
    <span><?php print t('Roles performed by professional associations'); ?>:</span>
    <div class="row">
      <div class="label"><?php print t('Continuing professional development'); ?></div>
      <div class="value"><?php print $midwifery_data['professional_development']; ?></div>
    </div>
    <div class="row">
      <div class="label"><?php print t('Advising or representing members accused of misconduct'); ?></div>
      <div class="value"><?php print $midwifery_data['members_accused']; ?></div>
    </div>
    <div class="row">
      <div class="label"><?php print t('Advising members on quality standards for MNH care'); ?></div>
      <div class="value"><?php print $midwifery_data['advise_quality_standards']; ?></div>
    </div>
    <div class="row">
      <div class="label"><?php print t('Advising the Government onpolicy documents related to MNH'); ?></div>
      <div class="value"><?php print $midwifery_data['advice_health_policy']; ?></div>
    </div>
    <div class="row">
      <div class="label"><?php print t('Negotiating work or salary issues with the Government'); ?></div>
      <div class="value"><?php print $midwifery_data['negotiate_work_salary_issues']; ?></div>
    </div>
    <span><?php print t('na = not applicable; - = missing data'); ?></span>
  </div>
</div>
