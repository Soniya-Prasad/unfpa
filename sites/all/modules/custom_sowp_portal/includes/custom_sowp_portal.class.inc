<?php

/**
 * @file
 * Include file for Custom SOWP portal
 */
drupal_get_path('module', 'custom_sowp_portal');

/**
 * Class CSP is used for custom SOWP Portal functionality
 */
class CSP {

  /**
   * This function is used to get the data for related category
   * @param type $cid_arr
   * @return type
   */
  public function get_data($cid_arr) {

    $query = db_select(' tbl_sowp_data', 'd');
    $query->join('country_code', 'c', 'c.cc = d.c_code');
    $query->join('tbl_sowp_category', 's', 's.cid = d.c_id');
    $query->fields('d');
    $query->fields('c');
    $query->fields('s');
    $query->condition('d.c_id', $cid_arr);
    $query->orderBy('c.c_name', "ASC");
    $result = $query->execute()->fetchAll();
    return $result;
  }

  /**
   * This function is used to get the color code for map based on corresponding category
   * @param type $cid
   * @return array
   */
  public function get_color_code_sowp($cid) {
    $q_cc = db_select('sowp_color_code', 'c');
    $q_cc->fields('c');
    $q_cc->condition('c.cid', $cid);
    $res_cc = $q_cc->execute()->fetchAll();
    $color_code_arr = array(); // Contains the Support Outcomes Array
    foreach ($res_cc as $key => $cc_val) {
      $cc = $cc_val->color_code;
      $cc_per = $cc_val->upto_percent;
      $color_code_arr[$cc] = $cc_per;
    }

    return $color_code_arr;
  }

  /**
   * This function returns the color array for the scale color below the map
   * @param type $cid
   * @return array
   */
  public function get_scale_color($cid) {
    $color_code = array();
    //$percent_array = array(90, 50, 0);
    $q_cc = db_select('sowp_color_code', 'c');
    $q_cc->fields('c');
    $q_cc->condition('c.cid', $cid);
    //$q_cc->condition('c.upto_percent', $percent_array, 'IN');
    $res_cc = $q_cc->execute()->fetchAll();
    foreach ($res_cc as $key => $cc_val) {
      $color_code[$key] = $cc_val->color_code;
    }
    return $color_code;
  }

}
