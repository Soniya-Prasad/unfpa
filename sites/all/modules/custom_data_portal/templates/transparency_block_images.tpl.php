<?php
/**
 * @file
 * Theme implementation to display transparency images block on funds - funding page.
 */
?>  
<div class="transparency-portal-bottom-section">
  <ul class="clearfix transparency-portal-section-list">
    <li class="programme-expenses-section">
      <a href='<?php print $transparency_portal_url; ?>' class="block-programme-expenses">
        <span class="transparency-portal-section-icon programme-expenses-icon">
          <?php print $programme_expenses_icon; ?>
        </span>
        <span class="title-wrapper programme-expenses-title">
          <span class="transparency-portal-section-title">
            <?php print t('Programme'); ?><br>
            <?php print t('expenses'); ?>
          </span>
        </span>
      </a>
    </li>
    <li class="donor-contributions-section">
      <a href='<?php print $donor_contributions_url; ?>' class="block-donor-contributions">
        <span class="transparency-portal-section-icon donor-contributions-icon">
          <?php print $donor_contributions_icon; ?>
        </span>
        <span class="title-wrapper donor-contributions-title">
          <span class="transparency-portal-section-title">
            <?php print t('Donor'); ?><br>
            <?php print t('Contributions'); ?>
          </span>
        </span>
      </a>
    </li>
    <li class="total-need-section">
      <a href='<?php print $total_need_url; ?>' class="block-total-need">
        <span class="transparency-portal-section-icon total-need-icon">
          <?php print $total_need_icon; ?>
        </span>
        <span class="title-wrapper total-need-title">
          <span class="transparency-portal-section-title">
            <?php print t('Total Need'); ?>
          </span>
        </span>
      </a>
    </li>
    <li class="annual-report-section">
      <a href='<?php print $annual_report_url; ?>' class="block-annual-report">
        <span class="transparency-portal-section-icon annual-report-icon">
          <?php print $annual_report_icon; ?>
        </span>
        <span class="title-wrapper annual-report-title">
          <span class="transparency-portal-section-title">
            <?php print t('Annual Report'); ?>
          </span>
        </span>
      </a>
    </li>
  </ul>
</div>
