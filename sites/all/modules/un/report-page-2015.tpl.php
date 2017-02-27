<?php
/**
 * @file
 * Theme implementation to display Annual Report 2015 page.
 *
 * Available variables:
 *
 * - $p: Path to 'un' module directory
 * - $year: The of the report. Used for applying changes per each report.
 *
 * Cover:
 * - $cover_tiles: tile-like images linking to regions
 *
 * Navigation:
 * - $nav_subitems_4: Navigation subitems for section 4
 * - $nav_subitems_5: Navigation subitems for section 5
 *
 * Section 1 (Introduction):
 * - $introduction_text: Body text
 * - $introduction_graphs: Graphs displayed below Body text
 *
 * Section 2 (From the Executive Director):
 * - $fromdirector_video: Markup for the video
 * - $fromdirector_quote: The quote text
 * - $fromdirector_author: The author of the quote text
 *
 * Section 3 (20 Years of Progress):
 * - $progress_intro: Introduction text
 * - $progress_items: All progress items nodes display built using views
 *
 * Section 4 (In Action - 2014):
 * - $inaction_intro: Introduction text
 * - $inaction_items: All progress items nodes display built using views
 *
 * Section 5 (Regions):
 * - $regions_items: All regions items nodes display built using views
 *
 * Section 6 (Resources and Management):
 * - $resources_content: The content of this section
 *
 * For more details see template_preprocess_un_annual_report_page().
 */
?>

<div class="rp rp15">

  <div id="skrollr-body">
    <div class="canvas">

      <section class="rp-cover">
        <div class="cover-2 width-wrap">
          <h1 class="rp-upper rp-color-1 reg-font"><?php print t('UNFPA Annual Report | <span>2015</span>'); ?></h1>
          <span class="cover-sep rp-bg-1"></span>
          <h2 class="rp-upper light-font"><?php print t('For People,<br /> Planet<br /> &amp; Prosperity'); ?></h2>
          <span class="cover-sep cover-sep-2 rp-bg-1"></span>
          <?php print $report_pdf; ?>
        </div>
        <div class="cover-tiles">
          <div class="width-wrap">
            <?php print $cover_tiles; ?>
          </div>
        </div>
      </section>

      <div class="nav-mobile rp-bg-1 rp-upper sb-font">
        <span class="nav-mobile-label"><?php print t('Menu'); ?></span>
        <ul class="rp-nolist rp-bg-1">
          <li data-section="1"><a href="#Introduction"><?php print t('Introduction'); ?></a></li>
          <li data-section="3"><a href="#Sustainability"><?php print t('Path To Sustainability'); ?></a></li>
          <li data-section="4"><a href="#InAction"><?php print t('2015 In Action'); ?></a></li>
          <li data-section="5"><a href="#Regions"><?php print t('Regions'); ?></a></li>
          <li data-section="6"><a href="#IncomeExpenses"><?php print t('Income and Expenses'); ?></a></li>
        </ul>
      </div>

      <div class="width-wrap">

        <section class="rp-section section-1" data-section="1">
          <h2 class="element-invisible"><?php print t('Navigation'); ?></h2>

          <nav>

            <div class="nav-headings rp-color-1 con-font">
              <div class="heading-1"><?php print t('Introduction'); ?></div>
              <div class="heading-3"><?php print t('Path To<br />Sustainability'); ?></div>
              <div class="heading-4"><?php print t('2015 In Action'); ?></div>
              <div class="heading-5"><?php print t('Regions'); ?></div>
              <div class="heading-6"><?php print t('Income<br />and Expenses'); ?></div>
            </div>

            <div class="rp-nav-wrap rp-upper unt-font">
              <ul class="rp-nav">
                <li data-section="1"><a href="#Introduction"><?php print t('Introduction'); ?></a></li>
                <li data-section="3"><a href="#Sustainability"><?php print t('Path To Sustainability'); ?></a></li>
                <li data-section="4"><a href="#InAction"><?php print t('2015 In Action'); ?></a>
                  <?php print $nav_subitems_4; ?>
                </li>
                <li data-section="5"><a href="#Regions"><?php print t('Regions'); ?></a>
                  <?php print $nav_subitems_5; ?>
                </li>
                <li data-section="6"><a href="#IncomeExpenses"><?php print t('Income and Expenses'); ?></a></li>
              </ul>
            </div>

          </nav>

          <div class="sc-anchor" id="Introduction"></div>
          <div class="sc-inner">
            <h1 class="section-title"><?php print t('Introduction'); ?></h1>

            <div class="items-50">
              <div class="item">
                <h2 class="rp-upper"><?php print $introduction_title; ?></h2>
                <?php print $introduction_text; ?>
              </div>
              <div class="item">
                <div class="rp-photo">
                  <?php print $introduction_photo; ?>
                  <div class="rp-photo-label"><?php print $introduction_phototxt; ?></div>
                </div>
              </div>
            </div>

            <h2 class="rp-upper intro-facts-head"><?php print $introduction_graphstitle; ?></h2>

            <h3 class="intro-line-header sbem-font"><?php print $introduction_numbcols_title; ?></h3>
            <div class="intro-numbcols reg-font">
              <ul class="rp-nolist clearfix">
                <?php foreach ($introduction_numbcols as $col): ?>
                  <li><?php print $col; ?></li>
                <?php endforeach; ?>
              </ul>
            </div>

            <h3 class="intro-line-header sbem-font"><?php print $introduction_graphs_subtitle; ?></h3>
            <div class="intro-facts bar-alt-color">
              <?php print $introduction_graphs; ?>
            </div>
          </div>

          <div class="bg bg-1"></div>
        </section>

        <section class="rp-section section-3" data-section="3">
          <div class="sc-anchor" id="Sustainability"></div>
          <div class="sc-inner">
            <h1 class="section-title"><?php print t('Path To Sustainability'); ?></h1>
            <?php print $sustainability_items; ?>
          </div>
          <div class="bg bg-3"></div>
        </section>

        <section class="rp-section section-4" data-section="4">
          <div class="sc-anchor" id="InAction"></div>
          <div class="sc-inner">
            <h1 class="section-title"><?php print t('2015 In Action'); ?></h1>
            <?php print $inaction_intro; ?>
            <?php print $inaction_items; ?>
          </div>
          <div class="bg bg-4"></div>
        </section>

        <section class="rp-section section-5" data-section="5">
          <div class="sc-anchor" id="Regions"></div>
          <div class="sc-inner">
            <h1 class="section-title"><?php print t('Regions'); ?></h1>
            <?php print $regions_items; ?>
          </div>
          <div class="bg bg-5"></div>
        </section>

        <section class="rp-section section-6" data-section="6">
          <div class="sc-anchor" id="IncomeExpenses"></div>
          <div class="sc-inner">
            <h1 class="section-title"><?php print t('Income and Expenses'); ?></h1>
            <div class="income-expenses">
              <h2 class="reg-font"><?php print t('View all 2015 income and expenditure information, which is provided through the UNFPA transparency portal.'); ?></h2>
              <a href="<?php print base_path(); ?>transparency-portal" class="sb-font incexp-link">
                <span class="incexp-link-inner">
                  <?php print t('Go To The UNFPA<br />Transparency Portal'); ?>
                  <span class="incexp-link-triangle"></span>
                </span>
              </a>
            </div>
          </div>
          <div class="bg bg-6"></div>
        </section>

      </div>
    </div>
  </div><!-- end #skrollr-body -->

  <div class="bg bg-1"></div>
  <div class="bg bg-2"></div>
  <div class="bg bg-3"></div>
  <div class="bg bg-4"></div>
  <div class="bg bg-5"></div>
  <div class="bg bg-6"></div>

</div><!-- end .rp -->
