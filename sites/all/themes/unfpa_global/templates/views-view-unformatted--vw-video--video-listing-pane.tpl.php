<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php
$i = 1;
foreach ($rows as $id => $row): ?>
  <div<?php if ($classes_array[$id] && $i<4) { print ' class="' . $classes_array[$id] .'"';  } else { print ' class="' . $classes_array[$id] .' no_margin"';  } ?>>
    <?php print $row; ?>
  </div>
<?php if($i==4) { $i=0;} $i++; endforeach; ?>
