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
//echo "<!-- <pre>";
//print_r($row);
//echo "</pre> -->";
$image_title	=	$row->node_title;
$overwrite_thumb = isset($row->field_field_overwrite_thumb[0]['raw']['value'])?$row->field_field_overwrite_thumb[0]['raw']['value']:'0';

$image_uri =  isset($row->field_field_video_thumbnail_image[0]['rendered']['#item']["uri"])?$row->field_field_video_thumbnail_image[0]['rendered']['#item']["uri"]:'';
$image_style = isset($row->field_field_video_thumbnail_image[0]['rendered']['#image_style'])?$row->field_field_video_thumbnail_image[0]['rendered']['#image_style']:'';
$image_thumbnail = image_style_url($image_style, $image_uri);
$uri = $row->field_field_video['0']['rendered']['#file']->uri;  // file path as uri: 'public://';
$video_path = file_create_url($uri);
//echo  "Path:".$video_path;
if(!empty($video_path))
{
	$embed = oembedcore_oembed_data($video_path);	
	
	if(!empty($embed->thumbnail_url) && $overwrite_thumb == '0')
	{		
		
?>
<span class="play-icon"></span>
<img width="130" height="75" title="<?php echo $image_title; ?>" alt="<?php echo $image_title; ?>" src="<?php echo $embed->thumbnail_url; ?>" typeof="foaf:Image">
<?php
	}
	else
	{
	?>
    <span class="play-icon"></span>
    <img width="130" height="75" title="<?php echo $image_title; ?>" alt="<?php echo $image_title; ?>" src="<?php echo $image_thumbnail; ?>" typeof="foaf:Image">
    <?php		
	}   
}
else
{
?>
<span class="play-icon"></span>
<img width="130" height="75" title="<?php echo $image_title; ?>" alt="<?php echo $image_title; ?>" src="<?php echo $image_thumbnail; ?>" typeof="foaf:Image">
<?php	
}
?>
