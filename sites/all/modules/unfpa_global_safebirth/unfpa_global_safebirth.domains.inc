<?php
/**
 * @file
 * unfpa_global_safebirth.domains.inc
 */

/**
 * Implements hook_domain_default_domains().
 */
function unfpa_global_safebirth_domain_default_domains() {
  $domains = array();
  $domains['safebirth_unfpa_org'] = array(
    'subdomain' => 'safebirthevenhere.org',
    'sitename' => 'Safe Birth',
    'scheme' => 'http',
    'valid' => 1,
    'weight' => 1,
    'is_default' => 0,
    'machine_name' => 'safebirth_unfpa_org',
  );

  return $domains;
}

/**
 * Implements hook_domain_alias_default_aliases().
 */
function unfpa_global_safebirth_domain_alias_default_aliases() {
  $domain_aliases = array();
  $domain_aliases['safebirth_unfpa_org'] = array();

  return $domain_aliases;
}

/**
 * Implements hook_domain_conf_default_variables().
 */
function unfpa_global_safebirth_domain_conf_default_variables() {
  $domain_variables = array();
  $domain_variables['safebirth_unfpa_org'] = array();

  return $domain_variables;
}

/**
 * Implements hook_domain_theme_default_themes().
 */
function unfpa_global_safebirth_domain_theme_default_themes() {
  $domain_themes = array();
  $domain_themes['safebirth_unfpa_org'] = array(
    'safe_birth' => array(
      'theme' => 'safe_birth',
      'settings' => NULL,
      'status' => 1,
      'filepath' => '',
    ),
  );

  return $domain_themes;
}
