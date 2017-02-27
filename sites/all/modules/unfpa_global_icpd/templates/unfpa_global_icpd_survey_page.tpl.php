<div id="icpd-survey-banner">
  <?php print $image ?>
</div>
<div class="icpd-survey-para">
  <p><?php print $survey_links['first'] . t(' aims to deliver the most comprehensive evidence base of achievements, gaps and outstanding issues in relation to the implementation of the Programme of Action.'); ?></p>

  <p><?php print t('To facilitate evidence gathering, the ICPD Beyond 2014 Secretariat worked in partnership with civil society, governments and technical experts to develop a Global Survey tool. Completed surveys were returned to the ICPD Beyond 2014 Secretariat for analysis from 176 Member States (183 including associates). Responses were reviewed by expert panels and collated with findings from regional and thematic conferences that contributed to the ICPD Beyond 2014 Review process. ') .$survey_links['second']. t(' of the survey data and input from expert panels were presented to UN member states in June 2013.'); ?></p>

  <p><?php print t('The Global Survey gathered information against a number of key indicators that relate to each ICPD thematic area, which include migration, poverty and economic development, gender equality and empowerment of women, education, maternal and child health, sexual and reproductive health, and urbanization and environment.  Through the Global Survey, governments have received an overview of the latest, ICPD relevant population and development data. The results and analysis of the Global Survey are available in the Country Implementation Profiles, contained in the below map, which provide reliable data on key indicators that will support governments and civil society to evaluate progress and measure advancement towards the goals set out in the ').$survey_links['third'].t('. Assistance has been provided in those countries where additional capacity was required for consultation and evidence gathering.'); ?></p>

  <p><?php print t("Data from the Global Survey informed the Secretary-General's global report on the review and contributed to the 2030 Agenda for Sustainable Development."); ?></p>
</div>
<?php global $base_url; ?>
<div class="topo clearfix">
  <div class="popover">
    <button class="pencil"><?php print t('Select country or territory'); ?></button>
    <div class="thepopover">
      <span class="triangle-img"></span>
      <div id="sowmy-map-area-click-id">
        <div class="area">
          <h4><?php print t('Countries and Territories'); ?></h4>
          <ul>
            <?php foreach ($icpd_data as $country_code => $node_link): ?>
              <li><?php print $node_link; ?></li>
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
<div id ="icpd-map"></div>
