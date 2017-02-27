<?php

/**
 * @file
 * Theme implementation to display SWOP 2015 page.
 *
 * Available variables:
 *
 * - $p: Path to 'sowp' module directory
 * - $language_class
 *
 * - $cover_bigintro
 * - $cover_bodies
 *
 * - $risk_intro
 * - $risk_bigintro
 * - $risk_stories
 * - $risk_bodies
 *
 * - $response_intro
 * - $response_bigintro
 * - $response_stories
 * - $response_bodies
 *
 * - $resilence_intro
 * - $resilence_bigintro
 * - $resilence_stories
 * - $resilence_bodies
 *
 * - $moving_intro
 * - $moving_bigintro
 * - $moving_stories
 * - $moving_bodies
 *
 * - $data_intro
 * - $data_bigintro
 * - $data_stories
 * - $data_bodies
 *
 * For more details see template_preprocess_swp_report_page_2015().
 */
?>

<div class="swp swp-2015<?php print $language_class; ?>">


  <nav class="swp-nav b-font">
    <ul class="swp-nolist">
      <li class="nav-risk">
        <a href="#Risk">
          <span class="swp-nav-icon"><span class="icon icon-nav-alert"></span></span>
          <span class="swp-nav-label"><?php print t('Risks'); ?></span>
        </a>
      </li>
      <li class="nav-response">
        <a href="#Response">
          <span class="swp-nav-icon"><span class="icon icon-nav-car"></span></span>
          <span class="swp-nav-label"><?php print t('Response'); ?></span>
        </a>
      </li>
      <li class="nav-resilience">
        <a href="#Resilience">
          <span class="swp-nav-icon"><span class="icon icon-nav-leaf"></span></span>
          <span class="swp-nav-label"><?php print t('Resilience'); ?></span>
        </a>
      </li>
      <li class="nav-moving">
        <a href="#Moving">
          <span class="swp-nav-icon"><span class="icon icon-nav-arrow"></span></span>
          <span class="swp-nav-label"><?php print t('<span>Moving</span> <span>forward</span>'); ?></span>
        </a>
      </li>
    </ul>
    <a href="#" class="swp-gotop light-font">
      <span class="gotop-label"><?php print t('Return<br />to top'); ?></span>
      <span class="gotop-icon"><span class="icon icon-nav-gotop"></span></span>
    </a>
  </nav>


  <section class="swp-section section-cover" id="Cover" data-weight="1">
    <?php print $cover_intro; ?>

    <div class="swp-push">
      <?php print $cover_bigintro; ?>
      <?php print $cover_bodies; ?>
    </div>
  </section>


  <section class="swp-section section-risk" id="Risk" data-weight="2">
    <?php print $risk_intro; ?>

    <div class="swp-push">
      <?php print $risk_bigintro; ?>
      <?php print $risk_stories; ?>
      <?php print $risk_bodies; ?>
    </div>
  </section>


  <section class="swp-section section-response" id="Response" data-weight="3">
    <?php print $response_intro; ?>

    <div class="swp-push">
      <?php print $response_bigintro; ?>
      <?php print $response_stories; ?>
      <?php print $response_bodies; ?>
    </div>
  </section>


  <section class="swp-section section-resilience" id="Resilience" data-weight="4">
    <?php print $resilience_intro; ?>

    <div class="swp-push">
      <?php print $resilience_bigintro; ?>
      <?php print $resilience_stories; ?>
      <?php print $resilience_bodies; ?>
    </div>
  </section>


  <section class="swp-section section-moving" id="Moving" data-weight="5">
    <?php print $moving_intro; ?>

    <div class="swp-push">
      <?php print $moving_bigintro; ?>
      <?php print $moving_stories; ?>
      <?php print $moving_bodies; ?>
    </div>
  </section>
</div>


<div class="ajax-progress ajax-progress-throbber sowp-throbber">
  <div class="throbber">&nbsp;</div>
  <div class="message"><?php print t('Please wait...'); ?></div>
</div>
