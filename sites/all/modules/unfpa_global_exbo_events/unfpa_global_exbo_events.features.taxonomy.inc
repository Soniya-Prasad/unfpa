<?php
/**
 * @file
 * unfpa_global_exbo_events.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function unfpa_global_exbo_events_taxonomy_default_vocabularies() {
  return array(
    'thematic_area' => array(
      'name' => 'Thematic Area',
      'machine_name' => 'thematic_area',
      'description' => 'Thematic Area Category for Publication and News Content Type',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 1,
      'language' => 'und',
      'i18n_mode' => 1,
      'rdf_mapping' => array(
        'rdftype' => array(
          0 => 'skos:ConceptScheme',
        ),
        'name' => array(
          'predicates' => array(
            0 => 'dc:title',
          ),
        ),
        'description' => array(
          'predicates' => array(
            0 => 'rdfs:comment',
          ),
        ),
      ),
    ),
  );
}
