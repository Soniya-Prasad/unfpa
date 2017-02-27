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
 * - $cover_intro
 * - $cover_bigintro
 * - $cover_bodies
 *
 * - $im10_intro
 * - $im10_bigintro
 * - $im10_stories
 * - $im10_bodies
 *
 * - $challenges_intro
 * - $challenges_bigintro
 * - $challenges_stories
 * - $challenges_bodies
 *
 * - $opportunities_intro
 * - $opportunities_bigintro
 * - $opportunities_stories
 * - $opportunities_bodies
 *
 * - $potential_intro
 * - $potential_bigintro
 * - $potential_stories
 * - $potential_bodies
 *
 * - $future_intro
 * - $future_bigintro
 * - $future_stories
 * - $future_bodies
 *
 * - $data_intro
 * - $data_bigintro
 * - $data_stories
 * - $data_bodies
 *
 * For more details see template_preprocess_swp_report_page_2016().
 */
?>

<script src="<?php print $p; ?>/sowp.loading.js"></script>

<div class="swp swp-2016<?php print $language_class; ?>">


  <nav class="swp-nav b-font">
    <ul class="swp-nolist">
      <li class="nav-im10">
        <a href="#Im10">
          <span class="swp-nav-icon"></span>
          <span class="swp-nav-label"><?php print t("I'm 10"); ?></span>
        </a>
      </li>
      <li class="nav-challenges">
        <a href="#MyChallenges">
          <span class="swp-nav-icon"></span>
          <span class="swp-nav-label"><?php print t('<span>My</span> <span>Challenges</span>'); ?></span>
        </a>
      </li>
      <li class="nav-opportunities">
        <a href="#MyOpportunities">
          <span class="swp-nav-icon"></span>
          <span class="swp-nav-label"><?php print t('<span>My</span> <span>Opportunities</span>'); ?></span>
        </a>
      </li>
      <li class="nav-potential">
        <a href="#MyPotential">
          <span class="swp-nav-icon"></span>
          <span class="swp-nav-label"><?php print t('My Potential'); ?></span>
        </a>
      </li>
      <li class="nav-future">
        <a href="#MyFuture">
          <span class="swp-nav-icon"></span>
          <span class="swp-nav-label"><?php print t('My Future'); ?></span>
        </a>
      </li>
      <li class="nav-data">
        <a href="#Data">
          <span class="swp-nav-icon"></span>
          <span class="swp-nav-label"><?php print t('Data'); ?></span>
        </a>
      </li>
    </ul>
    <a href="#" class="swp-gotop light-font">
      <span class="gotop-label"><?php print t('Return<br />to top'); ?></span>
      <span class="gotop-icon"><span class="icon icon-nav-gotop"></span></span>
    </a>
  </nav>


  <section class="swp-section section-cover" id="Cover" data-weight="1">
    <?php print $cover_image_grid; ?>
    <?php print $cover_bigintro; ?>
    <?php print $cover_bodies; ?>
  </section>


  <section class="swp-section section-im10 js-nav-fadein" id="Im10" data-weight="2">
    <?php print $im10_intro; ?>

    <div class="swp-push">
      <?php print $im10_bigintro; ?>
      <?php print $im10_stories; ?>
      <?php print $im10_bodies; ?>
    </div>
  </section>


  <section class="swp-section section-challenges" id="MyChallenges" data-weight="3">
    <?php print $challenges_intro; ?>

    <div class="swp-push">
      <?php print $challenges_bigintro; ?>
      <?php print $challenges_stories; ?>
      <?php print $challenges_bodies; ?>
    </div>
  </section>


  <section class="swp-section section-opportunities" id="MyOpportunities" data-weight="4">
    <?php print $opportunities_intro; ?>

    <div class="swp-push">
      <?php print $opportunities_bigintro; ?>
      <?php print $opportunities_stories; ?>
      <?php print $opportunities_bodies; ?>
    </div>
  </section>


  <section class="swp-section section-potential" id="MyPotential" data-weight="5">
    <?php print $potential_intro; ?>

    <div class="swp-push">
      <?php print $potential_bigintro; ?>
      <?php print $potential_stories; ?>
      <?php print $potential_bodies; ?>
    </div>
  </section>


  <section class="swp-section section-future" id="MyFuture" data-weight="6">
    <?php print $future_intro; ?>

    <div class="swp-push">
      <?php print $future_bigintro; ?>
      <?php print $future_stories; ?>
      <?php print $future_bodies; ?>
    </div>
  </section>


  <section class="swp-section section-data" id="Data" data-weight="7">
    <?php print $data_intro; ?>

    <div class="swp-push">
      <?php /*print $data_bigintro; ?>
      <?php print $data_stories; ?>
      <?php print $data_bodies;*/ ?>
    </div>
  </section>


</div>
