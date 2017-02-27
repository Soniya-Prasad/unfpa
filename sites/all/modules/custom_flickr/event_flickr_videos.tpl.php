<script type="text/javascript">
  Shadowbox.init({continuous:true,slideshowDelay:3});
</script>
<div class="gallery">
    <?php
      ///echo "<pre>In Template::";
   // print_r($data);
    //echo "</pre>"; 
    if(isset($data['photo'])){
	?>
     <p>Click on the thumbnails below to view images bigger</p>
     <?php
		$attributes = array();
		foreach($data['photo'] as $key => $val){ 
		 $img_theme = image_style_url('banner_home_large',$val['img']); 
		 ?>
         
		 <a href="<?php echo $val['img']; ?>" rel="shadowbox[gallery]" title="<?php echo $val['title']; ?>">
          <?php   print theme('image', array(
            'path' => $val['img_thumb'],
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