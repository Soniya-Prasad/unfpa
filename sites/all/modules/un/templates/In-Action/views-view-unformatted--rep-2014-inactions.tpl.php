<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * $rows array is customized: each item in array (a row) is now array and
 * contains 'markup' and 'subsection_id' keys.
 *
 * @see un_preprocess_views_view_unformatted().
 *
 * @ingroup views_templates
 */
?>

<?php foreach ($rows as $id => $row): ?>

  <div class="subsection section-4<?php print $row['subsection_id']; ?>" data-section="4<?php print $row['subsection_id']; ?>">
    <div class="sc-anchor" id="Section4<?php print $row['subsection_id']; ?>"></div>
    <div class="subsection-content">
      <?php print $row['markup']; ?>
    </div>
  </div>

<?php endforeach; ?>
