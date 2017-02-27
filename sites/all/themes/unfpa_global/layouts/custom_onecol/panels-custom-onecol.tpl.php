<?php
/**
 * @file
 * Template for a 3 column panel layout.
 *
 * This template provides a very simple "one column" panel display layout.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   $content['middle']: The only panel in the layout.
 */
?>
<div class="panel-display panel-1col clearfix" <?php
if (!empty($css_id)) {
    print "id=\"$css_id\"";
}
?>>
    <div class="panel-panel panel-col panel-row-1">
        <div class="inside clearfix"><?php print $content['row1']; ?></div>
    </div>
    <div class="panel-panel panel-col panel-row-2">
        <div class="inside clearfix"><?php print $content['row2']; ?></div>
    </div>
    <div class="panel-panel panel-col panel-row-3">
        <div class="inside clearfix"><?php print $content['row3']; ?></div>
    </div>
    <div class="panel-panel panel-col panel-row-4">
        <div class="inside clearfix"><?php print $content['row4']; ?></div>
    </div>
    <div class="panel-panel panel-col panel-row-5">
        <div class="inside clearfix"><?php print $content['row5']; ?></div>
    </div>
</div>
