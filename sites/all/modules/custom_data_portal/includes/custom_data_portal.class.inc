<?php

drupal_get_path('module', 'custom_data_portal');

/**
 *
 * @author anand
 * Class CDP for Custom Data portal module functionality
 */
class CDP {

  private $so_array = array();

  /* public function __construct() {

    $this->setOutcomes();
    } */

  private function setOutcomes() {
    $q = db_select('support_outcomes', 's')->fields('s')->execute();
    $res = $q->fetchAll();
    // print_r($res);
    $so_arr = array(); // Contains the Support Outcomes Array
    $temp_label = "";
    $first_parent = TRUE;
    $i = 1;
    foreach ($res as $key => $so) {
      $project_type = $so->project_type;
      $so_label = $so->short_text;
      $so_sublabel = $so->descr;
      $so_title = $so->short_text;
      $outcome_number = $so->Outcome_number;
      $Long_name = $so->Long_name;
      $outcome_text = $so->Outcome_text;

      if ($temp_label != $so_label) {
        $so_arr['P' . $i]['type'] = $project_type;
        $so_arr['P' . $i]['label'] = $so_label;
        $so_arr['P' . $i]['outcomes'] = $so_label;
        $so_arr['P' . $i]['title'] = $so_title;
        $so_arr['P' . $i]['outcome_number'] = $outcome_number;
        $so_arr['P' . $i]['outcome_text'] = $Long_name;
        $so_arr['P' . $i]['Parent_text'] = $outcome_text;
        $temp_label = $so_label;
        $i++;
      }
      $so_arr[$project_type]['type'] = $project_type;
      $so_arr[$project_type]['label'] = $so_label;
      $so_arr[$project_type]['outcomes'] = $so_sublabel;
      $so_arr[$project_type]['title'] = $so_title;
      $so_arr[$project_type]['outcome_number'] = $outcome_number;
      $so_arr[$project_type]['outcome_text'] = $Long_name;

      ;
    }
    $this->so_array = $so_arr;
  }

  public function getOutcomes() {
    $this->setOutcomes();
    return $this->so_array;
  }

  public function getColorCodePercent() {
    $q_cc = db_select('dataportal_cc', 'c')->fields('c')->execute();
    $res_cc = $q_cc->fetchAll();
    $color_code_arr = array(); // Contains the Support Outcomes Array
    foreach ($res_cc as $key => $cc_val) {
      $cc = $cc_val->color_code;
      $cc_per = $cc_val->upto_percent;
      $color_code_arr[$cc] = $cc_per;
    }

    return $color_code_arr;
  }

  public function getPAColorCode() {
    $q_cc = db_select('dataportal_pa_colorcode', 'c')->fields('c')->execute();
    $res_cc = $q_cc->fetchAll();
    $color_code_arr = array(); // Contains the Support Outcomes Array
    foreach ($res_cc as $key => $cc_val) {
      $cc = $cc_val->color_code;
      $cc_per = $cc_val->upto_percent;
      $color_code_arr[$cc] = $cc_per;
    }

    return $color_code_arr;
  }

  public function getDonorColorCodePercent() {
    $q_cc = db_select('donor_cc', 'c')->fields('c')->execute();
    $res_cc = $q_cc->fetchAll();
    $color_code_arr = array();
    foreach ($res_cc as $key => $cc_val) {
      $cc = $cc_val->color_code;
      $cc_per = $cc_val->upto_percent;
      $color_code_arr[$cc] = $cc_per;
    }

    return $color_code_arr;
  }

  public function getCommonColorCodePercent() {
    $q_cc = db_select('dataportal_colorcode', 'c')->fields('c')->execute();
    $res_cc = $q_cc->fetchAll();
    $color_code_arr = array();
    foreach ($res_cc as $key => $cc_val) {
      $cc = $cc_val->color_code;
      $cc_per = $cc_val->upto_percent;
      $color_code_arr[$cc] = $cc_per;
    }

    return $color_code_arr;
  }

  public function getPAColorCodePercent() {
    $q_cc = db_select('dataportal_colorcode', 'c')->fields('c')->execute();
    $res_cc = $q_cc->fetchAll();
    $color_code_arr = array();
    foreach ($res_cc as $key => $cc_val) {
      $cc = $cc_val->color_code;
      $cc_per = $cc_val->upto_percent;
      $color_code_arr[$cc] = $cc_per;
    }

    return $color_code_arr;
  }

  public function getActivitylist($activity_arr) {

    $selected_activity_arr = array();
    //$act_list = "";
    foreach ($activity_arr as $key => $value) {
      if (!empty($value)) {
        $selected_activity_arr[] = $value;
      }
    }
    //$act_list = implode(",",$selected_activity_arr);
    return $selected_activity_arr;
  }

  public function getDataPAC() {

    $query = db_select('iatifinal', 'i');
    $query->join('support_outcomes', 's', 's.project_type = i.outcome');
    $query->fields('i');
    $query->fields('s');
    //$query->condition('i.field_office', $c_code);
    //$query->condition('i.outcome', array('XX'),'NOT IN');
    //$query->condition('myfield', , 'NOT IN');
    $query->orderBy('i.year', "ASC");
    $query->orderBy('i.outcome', "ASC");
    $result = $query->execute()->fetchAll();

    return $result;
  }

}

?>