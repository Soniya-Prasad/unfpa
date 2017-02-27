<?php
/**
 * @file
 * Theme implementation to display Annual Report 2015 Tiles nodes.
 *
 * Custom added variables:
 * - $tiles: An associative array containing tiles to display. Each tile has:
 *   - title: Name of the tile
 *   - img: The collapsed tile square image
 *   - photo: Photography that shows upon expanding the tile
 *   - copyright: Photography copyright text
 *   - titleimg: Detail view image with number and title text embedded
 *   - text: Main copy of the tile, visible when tile is expanded.
 *
 * @see un_preprocess_node().
 */
?>

<div class="sc-anchor"><a id="Node-<?php print $node->nid; ?>"></a></div>

<h2 class="rp-upper"><?php print $title; ?></h2>
<?php print render($content['field_artiles_body']); ?>

<div class="rp-tiles">
  <ul class="rp-nolist clearfix">
    <?php foreach ($tiles as $tile): ?>
      <li class="rp-tile">

        <h3 class="rp-tile-title element-invisible">
          <?php print $tile['title']; ?>
        </h3>

        <div class="rp-tile-collapsed">
          <button>
            <?php print $tile['img']; ?>
            <span>&nbsp;</span>
          </button>
        </div>

        <div class="rp-tile-expanded">
          <button class="rp-tile-close"><?php print t('Close'); ?></button>
          <div class="rp-tile-photo">
            <?php print $tile['photo']; ?>
            <span class="rp-tile-copyright sb-font"><?php print $tile['copyright']; ?></span>
          </div>

          <div class="rp-tile-titleimg">
            <?php print $tile['titleimg']; ?>
          </div>

          <div class="rp-tile-text">
            <?php print $tile['text']; ?>
          </div>
        </div>

      </li>
    <?php endforeach; ?>
  </ul>
</div>
