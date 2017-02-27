<?php

/**
 * @file
 * Theme implementation to display Borad members Map section for Exbo.
 */
?>
<div class="exbo-title-social-wrapper clearfix">
<h1 class="page-title executive-board"><?php print t('Members of the Executive Board'); ?></h1>
<?php print $social_media; ?>
</div>
<div class="exec-brd view-events-header">
  <span class="selected-one"><?php print t('Select one:'); ?></span>
  <div class="select-list">
    <a class="active bluelink" href="<?php echo "board-members"; ?>"><?php print t('Board Members'); ?></a>
    <a class="bluelink" href= "<?php echo "bureau-members"; ?>"><?php print t('Bureau Members'); ?></a>       
  </div>
  <div class="clearfix"></div>
</div>
<div class="exec-brd-exposed-filter-container">
  <div class="filter-fields exec-brd-filter-text"><?php print t('Board Members'); ?> <span class="year"></span></div>
  <div class="filter-fields exec-brd-view-filters">
    <select id="year" class="form-select">
      <option value="year">Select year</option>
      <?php foreach($data as $key => $year):?>
      <option value="<?php print ($year);?>" <?php if($key == 0):?>selected="selected"<?php
     endif;?>><?php print ($year);?></option>
      <?php endforeach; ?>
    </select>
  </div>
</div>
<div class="executive-board-outer-box" id="executive-board-map">
   <div class="executive-board-sec-content clearfix">
    <div id="map"></div>
      <div id="board-members-map-filters" class="executive-board-filter-container hide-element">
        <span class="filters-title">Filter</span>
        <ul class="square-input-element" id="exbo-map-board-member">
          <li class="filter-option"><div><input class="active" name="board-members-map-filters" value="all" checked="true" type="radio"><label><?php print t("All");?></label></div></li>
          <li class="filter-option"><div><input name="board-members-map-filters" value="0" type="radio"><label><?php print t("Africa");?></label></div></li>
          <li class="filter-option"><div><input name="board-members-map-filters" value="1" type="radio"><label><?php print t("Asia");?></label></div></li>
          <li class="filter-option"><div><input name="board-members-map-filters" value="2" type="radio"><label><?php print t("Eastern Europe");?></label></div></li>
          <li class="filter-option"><div><input name="board-members-map-filters" value="3" type="radio"><label><?php print t("Latin America and Caribbean");?></label></div></li>
          <li class="filter-option"><div><input name="board-members-map-filters" value="4" type="radio"><label><?php print t("Western Europe and others");?></label></div></li>
        </ul>
      </div>
  </div>
</div>
<div class="clearfix region-info-block">
</div>
<div class="loader"></div>
