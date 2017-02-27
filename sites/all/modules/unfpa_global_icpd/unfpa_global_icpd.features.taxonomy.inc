<?php
/**
 * @file
 * unfpa_global_icpd.features.taxonomy.inc
 */

/**
 * Implements hook_taxonomy_default_vocabularies().
 */
function unfpa_global_icpd_taxonomy_default_vocabularies() {
  return array(
    'icpd_tag' => array(
      'name' => 'ICPD tag',
      'machine_name' => 'icpd_tag',
      'description' => 'Tag for ICPD Resources',
      'hierarchy' => 0,
      'module' => 'taxonomy',
      'weight' => 0,
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
