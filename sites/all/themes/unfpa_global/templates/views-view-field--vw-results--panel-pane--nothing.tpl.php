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
<?php // print 'heeloo'; 
//echo "<!-- <pre>";
//print_r($row);
//echo "</pre> -->";
?>
<span class="value" style="color:<?php echo $row->field_field_color_code[0]['raw']['value']; ?>;"><?php echo $row->field_field_result_number[0]['raw']['value']; ?></span>
<span class="result_sub_title"><?php echo $row->field_field_sub_title_result[0]['raw']['value']; ?></span>