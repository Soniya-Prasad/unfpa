<?php
/**
 * @file
 * Custom include file with HTML for Slide Tiles.
 */

$p = base_path() . drupal_get_path('module', 'sowp') . '/chartincludes-2016/slidetiles/';
?>

<div class="swp-slidetiles">
  <h3 class="swp-upper">Transforming Our World</h3>
  <div class="slidetiles-intro">
    <p>In 2015, the world made an unprecedented commitment to people, prosperity and the planet. The historic 2030 Agenda for Sustainable Development, endorsed by over 150 world leaders, aims to end all forms of poverty and discrimination. It seeks to transform how we live, where all people enjoy rights and dignity.</p>
    <p>UNFPA is already playing a leadership role on Goals related to poverty, health, education and gender equality. Attaining the Goal of universal access to sexual and reproductive health services supports the freedom of every girl and woman to seek an education, find decent work  and contribute even more to her family, community and nation.</p>
  </div>

  <ul class="slidetiles-tiles con-font"><!--
    --><li>
      <div class="slidetile-content st-color-1">
        <h4 class="element-invisible">1. No Poverty</h4>
        <img src="<?php print $p; ?>images_1/tile-1.png" alt="" />
        <p>The first Goal commits to halving the share of people of all ages who suffer any of the major dimensions of poverty.</p>
        <p class="slidetile-expand" style="color: #e4233a;">UNFPA supports sexual and reproductive health services that help girls expand their economic options. </p>
      </div>
    </li><!--
    --><li>
      <div class="slidetile-content st-color-2">
        <h4 class="element-invisible">3. Good HealthAnd Well-Being</h4>
        <img src="<?php print $p; ?>images_1/tile-3.png" alt="" />
        <p>The third Goal commits to reducing global maternal death to less than 70 per 100,000 births.</p>
        <p class="slidetile-expand" style="color: #4b9f38;">UNFPA helps countries develop public policies and services that keep girls healthy.</p>
      </div>
    </li><!--
    --><li>
      <div class="slidetile-content st-color-3">
        <h4 class="element-invisible">4. Quality Education</h4>
        <img src="<?php print $p; ?>images_1/tile-4.png" alt="" />
        <p>The fourth Goal calls for ensuring, by 2030, that education is free, equitable and of high quality.</p>
        <p class="slidetile-expand" style="color: #c5182c;">UNFPA works with countries to promote investments in education and opportunities for girls.</p>
      </div>
    </li><!--
    --><li>
      <div class="slidetile-content st-color-4">
        <h4 class="element-invisible">5. Gender Equality</h4>
        <img src="<?php print $p; ?>images_1/tile-5.png" alt="" />
        <p>The fifth Goal seeks to end all forms of discrimination against all women and girls. Violence against them must stop.</p>
        <p class="slidetile-expand" style="color: #ff3920;">UNFPA works to eliminate harmful practices and their consequences.</p>
      </div>
    </li><!--
  --></ul>

</div>
