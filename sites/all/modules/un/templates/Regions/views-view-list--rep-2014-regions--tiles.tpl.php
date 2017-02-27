<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 *
 * $rows array is customized: each item in array (a row) is now array and
 * contains 'markup' and 'subsection_id' keys.
 *
 * @see un_preprocess_views_view_list().
 *
 * @ingroup views_templates
 */
?>
  
<?php print $list_type_prefix; ?>
  <?php foreach ($rows as $id => $row): ?>
    <li><?php print $row['markup']; ?></li>
  <?php endforeach; ?>
<?php print $list_type_suffix; ?>
