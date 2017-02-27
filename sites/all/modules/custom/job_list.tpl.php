<?php
/**
 * @file
 * The custom template used to theme a job list block on Job page.
 */
if (count($data['job_list']) > 0) {
  ?>
  <ul class="jobs_list">
    <?php
    $job_option_param = $data["job_detail_params"];
    foreach ($data['job_list'] as $id => $arr) {
      $job_title = trim($arr[0]);
      $job_id = trim($arr[1]);
      $jd_op_array = array('PostingSeq' => 1, 'JobOpeningId' => $job_id);
      $jd_final_options = array_merge($job_option_param, $jd_op_array);
      $job_option_array = drupal_http_build_query($jd_final_options);
      $job_id_url = $data["job_url"] . "?" . $job_option_array;
      ?>
      <li><a href="<?php echo $job_id_url; ?>" target="_blank" title="<?php echo $job_title; ?>"><?php echo $job_title; ?></a></li>
    <?php }
    ?>
  </ul>
  <div class="browse-all"><a href="https://erecruit.partneragencies.org/erecruit.html" target="_blank" class="more"><?php echo t("View all Vacancies"); ?></a></div>
    <?php
  }
  else {
    ?>
  <div><?php echo t("Content not available"); ?></div>
  <?php
}
