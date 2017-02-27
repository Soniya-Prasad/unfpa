<nav id="top_menu">
    <div class="wrapper">
        <ul>
            <li><a href="#content-1"><?php print $featured_publication['field_anchor_title_1']; ?></a></li>
            <li><a href="#content-2"><?php print $featured_publication['field_anchor_title_2']; ?></a></li>
            <li><a href="#content-3"><?php print $featured_publication['field_anchor_title_3']; ?></a></li>
            <li><a href="#content-4"><?php print $featured_publication['field_anchor_title_4']; ?></a></li>
        </ul>
    </div>
</nav>

<div class="content"<?php print $content_attributes; ?>>

    <?php if (!empty($content['field_featured_pub_banner'])): ?>
      <div id="content-0" class="clearfix">
          <?php print render($content['field_featured_pub_banner']); ?>
      </div>
    <?php endif; ?>

    <?php if (isset($featured_publication['feature_pub_content'])): ?>
      <div id="content-1" class="clearfix" style="background: url('<?php print $featured_publication['bg_img_1']; ?>') <?php print $featured_publication['bg_color_1']; ?>">
          <?php print $featured_publication['feature_pub_content']; ?>
          <?php if ($featured_publication['swop_iframe_content']) : ?>
            <iframe id="demographic-dividend" src="<?php print $featured_publication['swop_iframe_url']; ?>" height="700"></iframe>
          <?php endif; ?>
          <?php print render($content['field_resource_block_title']); ?>
          <?php if (isset($featured_publication['related_resources_content'])): ?>
            <?php print $featured_publication['related_resources_content']; ?>
          <?php endif; ?>
          <?php print render($content['field_content_1']); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($content['field_content_2'])): ?>
      <div id="content-2" class="clearfix" style="background: url('<?php print $featured_publication['bg_img_2']; ?>') <?php print $featured_publication['bg_color_2']; ?>">
          <?php if (!empty($featured_publication['field_anchor_title_2'])): ?>
            <h1><?php print $featured_publication['field_anchor_title_2']; ?></h1>
          <?php endif; ?>
          <?php print render($content['field_content_2']); ?>
      </div>
    <?php endif; ?>
    <?php if ($featured_publication['sowmy_map_content']): ?>
      <div id="sowmy-map-content" class="clearfix">
          <?php print render($featured_publication['sowmy_map']); ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($content['field_content_3'])): ?>
      <div id="content-3" class="clearfix" style="background: url('<?php print $featured_publication['bg_img_3']; ?>') <?php print $featured_publication['bg_color_3']; ?>">
          <?php if (!empty($featured_publication['field_anchor_title_3'])): ?>
            <h1><?php print $featured_publication['field_anchor_title_3']; ?></h1>
          <?php endif; ?>
          <?php if (isset($featured_publication['related_publications_content'])): ?>
            <?php print $featured_publication['related_publications_content']; ?>
          <?php endif; ?>
          <?php print render($content['field_content_3']); ?>
      </div>
    <?php endif; ?>

    <?php if (!empty($content['field_content_4'])): ?>
      <div id="content-4" class="clearfix" style="background: url('<?php print $featured_publication['bg_img_4']; ?>') <?php print $featured_publication['bg_color_4']; ?>">
          <?php if (!empty($featured_publication['field_anchor_title_4'])): ?>
            <h1><?php print $featured_publication['field_anchor_title_4']; ?></h1>
          <?php endif; ?>
          <?php print render($content['field_content_4']); ?>
      </div>
    <?php endif; ?>

</div>
