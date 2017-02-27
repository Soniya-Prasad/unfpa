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
<?php //print $output; ?>
<?php
$image_title	=	$row->node_title;
$show_image = isset($row->field_field_news_image[0])?true:false;
$show_image_body_text = isset($row->field_field_news_image_body_text[0]['raw']['value'])?true:false;

if($show_image)
{
$image_uri =  $row->field_field_news_image[0]['rendered']['#item']["uri"];
$image_style = $row->field_field_news_image[0]['rendered']['#image_style'];
$image_thumbnail = image_style_url($image_style, $image_uri);
?>
<figure>
<img title='<?php echo t($image_title); ?>' alt='<?php echo t($image_title); ?>' src='<?php echo $image_thumbnail; ?>' typeof='foaf:Image'>
	<?php
    if($show_image_body_text)
    {
    ?>
    <figcaption><?php echo $row->field_field_news_image_body_text[0]['raw']['value']; ?></figcaption>
    </figure>
    <?php
    }
}
?>