<?php
/**
 * @file
 * Template for a 3 column panel layout.
 *
 * This template provides a three column 25%-50%-25% panel display layout, with
 * additional areas for the top and the bottom.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['top']: Content in the top row.
 *   - $content['left']: Content in the left column.
 *   - $content['middle']: Content in the middle column.
 *   - $content['right']: Content in the right column.
 *   - $content['bottom']: Content in the bottom row.
 */
?>
<div class="panel-display panel-3col-33-stacked clearfix" <?php
if (!empty($css_id)) {
    print "id=\"$css_id\"";
}
?>>

    <div class="panel-panel panel-col-top">
        <div class="inside"><?php print $content['top']; ?></div>
    </div>

    <div class="panel-panel panel-col-first">
        <div class="panel-panel panel-col-first-left">
            <div class="inside"><?php print $content['first-left']; ?></div>
        </div>
        <div class="panel-panel panel-col-first-middle">
            <div class="inside"><?php print $content['first-middle']; ?></div>
        </div>
        <div class="panel-panel panel-col-first-right">
            <div class="inside"><?php print $content['first-right']; ?></div>
        </div>
    </div>

    <div class="panel-panel panel-col-second">
        <div class="panel-panel panel-col-second-left">
            <div class="inside"><?php print $content['second-left']; ?></div>
        </div>
        <div class="panel-panel panel-col-second-middle">
            <div class="inside"><?php print $content['second-middle']; ?></div>
        </div>
        <div class="panel-panel panel-col-second-right">
            <div class="inside"><?php print $content['second-right']; ?></div>
        </div>
    </div>

    <?php if ($content['bottom']): ?>
        <div class="panel-panel panel-col-bottom">
            <div class="inside"><?php print $content['bottom']; ?></div>
        </div>
    <?php endif ?>
</div>
