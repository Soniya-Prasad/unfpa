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
<div class="panel-display panel-3col-33-stacked  clearfix" <?php if (!empty($css_id)) {
    print "id=\"$css_id\"";
} ?>>
<?php if ($content['top']): ?>
        <div class="panel-panel panel-col-top">
            <div class="inside"><?php print $content['top']; ?></div>
        </div>
        <?php endif ?>
    <div class="panel-panel panel-col-center">
<?php if ($content['center-left']): ?>
            <div class="panel-panel panel-col-center-left">
                <div class="inside"><?php print $content['center-left']; ?></div>
            </div>
<?php endif ?>
<?php if ($content['center-right']): ?>
            <div class="panel-panel panel-col-center-right">
                <div class="inside"><?php print $content['center-right']; ?></div>
            </div>
<?php endif ?>
    </div>
    <div class="panel-panel panel-col-middle">
        <div class="panel-panel panel-col-first">
            <div class="inside"><?php print $content['left']; ?></div>
        </div>

        <div class="panel-panel panel-col">
            <div class="inside"><?php print $content['middle']; ?></div>
        </div>

        <div class="panel-panel panel-col-last">
            <div class="inside"><?php print $content['right']; ?></div>
        </div>
    </div>

<?php if ($content['bottom']): ?>
        <div class="panel-panel panel-col-bottom">
            <div class="inside"><?php print $content['bottom']; ?></div>
        </div>
<?php endif ?>
</div>
