<?php
/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
?>

<?php if (isset($row->field_field_related_topic[0]['raw']['entity']->path['alias'])): ?>
    <a href="<?php echo $row->field_field_related_topic[0]['raw']['entity']->path['alias']; ?>" title="click here to learn more about '<?php echo $row->field_field_related_topic[0]['raw']['entity']->title; ?>'">
        <h3 class="result_title"><?php echo $row->field_field_first_title[0]['raw']['value']; ?></h3>
        <div class="result_logo_icon">
            <img typeof="foaf:Image" src="<?php echo file_create_url($row->field_field_logo_icon[0]['raw']['uri']); ?>" width="30" height="30" alt="">
        </div>
        <div class="value_wrapper">
            <div class="value" style="color:<?php echo $row->field_field_color_code[0]['raw']['value']; ?>;"><?php echo $row->field_field_result_number[0]['raw']['value']; ?></div>
            <div class="result_sub_title"><?php echo $row->field_field_sub_title_result[0]['raw']['value']; ?>
                <?php if (isset($row->field_field_source[0]['raw']['value'])): ?>
                    <span class="star">*</span>
                    <span class="arrow"></span>
                    <p class="text">
                        <?php echo $row->field_field_source[0]['raw']['value']; ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </a>
<?php else : ?>
    <h3 class="result_title"><?php echo $row->field_field_first_title[0]['raw']['value']; ?></h3>
    <div class="result_logo_icon">
        <img typeof="foaf:Image" src="<?php echo file_create_url($row->field_field_logo_icon[0]['raw']['uri']); ?>" width="30" height="30" alt="">
    </div>
    <div class="value_wrapper">
        <div class="value" style="color:<?php echo $row->field_field_color_code[0]['raw']['value']; ?>;"><?php echo $row->field_field_result_number[0]['raw']['value']; ?></div>
        <div class="result_sub_title"><?php echo $row->field_field_sub_title_result[0]['raw']['value']; ?>
            <?php if (isset($row->field_field_source[0]['raw']['value'])): ?>
                <span class="star">*</span>
                <span class="arrow"></span>
                <p class="text">
                    <?php echo $row->field_field_source[0]['raw']['value']; ?>
                </p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
