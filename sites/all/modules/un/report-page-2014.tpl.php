<?php
/**
 * @file
 * Theme implementation to display Annual Report 2014 page.
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

<div class="rp">

  <div id="skrollr-body">
    <div class="canvas">

      <section class="rp-cover">
        <div class="cover-headers">
          <div class="width-wrap">
            <div class="cover-headleft">
              <h1 class="rp-upper rp-color-1 unt-font"><?php print t('Annual Report | <span>2014</span>'); ?></h1>
              <h2 class="rp-upper unt-font"><?php print t('A Year Of Renewal'); ?></h2>
            </div>
            <div class="cover-headright">
              <?php print $report_pdf; ?>
            </div>
          </div>
        </div>
        <div class="cover-banner">
          <img src="<?php print $p; ?>images/cover.jpg" alt="" class="banner-desktop" />
          <img src="<?php print $p; ?>images/cover-mobile.jpg" alt="" class="banner-mobile" />
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
          <li data-section="2"><a href="#FromDirector"><?php print t('From the Executive Director'); ?></a></li>
          <li data-section="3"><a href="#YearsProgress"><?php print t('20 Years of Progress'); ?></a></li>
          <li data-section="4"><a href="#InAction"><?php print t('2014 In Action'); ?></a></li>
          <li data-section="5"><a href="#Regions"><?php print t('Regions'); ?></a></li>
          <li data-section="6"><a href="#Resources"><?php print t('Income and Expenses'); ?></a></li>
        </ul>
      </div>

      <div class="width-wrap">
        <section class="rp-section section-1" data-section="1">
          <h2 class="element-invisible"><?php print t('Navigation'); ?></h2>

          <nav>

            <div class="nav-headings rp-color-1 con-font">
              <div class="heading-1"><?php print t('Introduction'); ?></div>
              <div class="heading-2"><?php print t('From the<br />Executive Director'); ?></div>
              <div class="heading-3"><?php print t('20 Years<br />of Progress'); ?></div>
              <div class="heading-4"><?php print t('2014 In Action'); ?></div>
              <div class="heading-5"><?php print t('Regions'); ?></div>
              <div class="heading-6"><?php print t('Income<br />and Expenses'); ?></div>
            </div>

            <div class="rp-nav-wrap rp-upper unt-font">
              <ul class="rp-nav">
                <li data-section="1"><a href="#Introduction"><?php print t('Introduction'); ?></a></li>
                <li data-section="2"><a href="#FromDirector"><?php print t('From the Executive Director'); ?></a></li>
                <li data-section="3"><a href="#YearsProgress"><?php print t('20 Years of Progress'); ?></a></li>
                <li data-section="4"><a href="#InAction"><?php print t('2014 In Action'); ?></a>
                  <?php print $nav_subitems_4; ?>
                </li>
                <li data-section="5"><a href="#Regions"><?php print t('Regions'); ?></a>
                  <?php print $nav_subitems_5; ?>
                </li>
                <li data-section="6"><a href="<?php print base_path(); ?>transparency-portal" class="no-scroll-link"><?php print t('Income and Expenses'); ?></a></li>
              </ul>
            </div>

          </nav>

          <div class="sc-anchor" id="Introduction"></div>
          <div class="sc-inner">
            <h1 class="section-title"><?php print t('Introduction'); ?></h1>
            <h2 class="rp-upper"><?php print $introduction_title; ?></h2>
            <div class="items-50">
              <div class="item">
                <?php print $introduction_text; ?>
              </div>
              <div class="item">
                <?php print $introduction_video; ?>
                <div class="rp-video-label unb-font">
                  <span><?php print $introduction_videotxt; ?></span>
                </div>
              </div>
            </div>

            <h2 class="rp-upper intro-facts-head"><?php print $introduction_graphstitle; ?></h2>
            <div class="intro-facts bar-alt-color">
              <?php print $introduction_graphs; ?>
            </div>
          </div>

          <div class="bg bg-1"></div>
        </section>

        <section class="rp-section section-2" data-section="2">
          <div class="sc-anchor" id="FromDirector"></div>
          <div class="sc-inner">
            <h1 class="section-title"><?php print t('From the Executive Director'); ?></h1>
            <?php print $fromdirector_video; ?>
            <blockquote class="sb-font"><?php print $fromdirector_quote; ?></blockquote>
            <p class="rp-quote-auth sb-font">&ndash; <?php print $fromdirector_author; ?></p>
          </div>
          <div class="bg bg-2"></div>
        </section>

        <section class="rp-section section-3" data-section="3">
          <div class="sc-anchor" id="YearsProgress"></div>
          <div class="sc-inner">
            <h1 class="section-title"><?php print t('20 Years of Progress'); ?></h1>
            <?php print $progress_intro; ?>
            <?php print $progress_items; ?>
          </div>
          <div class="bg bg-3"></div>
        </section>

        <section class="rp-section section-4" data-section="4">
          <div class="sc-anchor" id="InAction"></div>
          <div class="sc-inner">
            <h1 class="section-title"><?php print t('2014 In Action'); ?></h1>
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
          <div class="sc-anchor" id="Resources"></div>
          <div class="sc-inner">
            <h1 class="section-title"><?php print t('Income and Expenses'); ?></h1>
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
