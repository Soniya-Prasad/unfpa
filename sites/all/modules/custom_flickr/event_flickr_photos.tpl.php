<?php global $base_url;  ?>
<script type="text/javascript">
jQuery(document).ready(function($){

  Shadowbox.init({continuous:true,slideshowDelay:3});

  $('#slideitems').after('<div id="nav">').cycle({
        fx:     'scrollHorz',
        speed:  'fast',
        timeout: 5000,
        pager:  '#nav',
       // after:   onAfter,
        next:   '#next',
        prev:   '#prev'
      });

 /* function onAfter() {
    $('#output').html(this.data);
  } */
  
 });
  
</script>
<?php $theme_path = drupal_get_path('theme', variable_get('theme_default', NULL)); ?>
<div id="slideshow">
<img src="<?php echo $base_url.'/'.$theme_path.'/images/slideshow-left.png'; ?>" id="prev">
<img src="<?php echo $base_url.'/'.$theme_path.'/images/slideshow-right.png'; ?>" id="next">
	<div id="slideitems">
    <?php
    /* echo "<pre>In Template::";
    print_r($data);
    echo "</pre>"; */
    if(isset($data['photo'])){
		$attributes = array('width' =>380, 'height' =>215);
		
  		foreach($data['photo'] as $key => $val){ ?>
	
        <a href="<?php echo $val['img']; ?>" rel="shadowbox[slideshow]" title="<?php echo $val['title']; ?>">
			<?php $img_theme = image_style_url('banner_home_large',$val['img']); 
            print theme('image', array(
            'path' => $val['img'],
            'alt' => $val['title'],
            'title' => $val['title'],
            'attributes' => $attributes,
            'getsize' => FALSE,
            ));
            ?>
         </a>   
		
      <?php }	     
    }
    ?>
    </div>
        <div class="clearfix"></div>
        <div id="output"><?php echo $data['description']; ?></div>
</div>
