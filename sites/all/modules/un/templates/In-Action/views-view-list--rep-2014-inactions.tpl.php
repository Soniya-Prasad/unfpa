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

<ul>
  <?php foreach ($rows as $id => $row): ?>
    <li data-section="4<?php print $row['subsection_id']; ?>">
      <a href="#Section4<?php print $row['subsection_id']; ?>"><?php print $row['markup']; ?></a>
    </li>
  <?php endforeach; ?>
</ul>
