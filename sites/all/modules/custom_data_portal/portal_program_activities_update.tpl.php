<?php
/**
 * @file
 * Displays the template for landing page of country after submitting the form
 * for Programme activities of specific country.
 */
?>
<script type="text/javascript" src="https://www.google.com/jsapi"></script>

<?php
$last_selected_year = $data["selected_year"];
?>
<script type="text/javascript">
  (function ($) {
    $('.donut_chart_wrapper').removeClass('active');
    $('.donut_chart_wrapper.donut_chart_wrapper_<?php echo $last_selected_year; ?>').addClass('active');
    $('#donut_chart_tabs li[tabfor="all"]').click();
    $(".bchart-all").css({"visibility": "hidden"});
    $(".bchart_container").removeClass('active');
    $(".bchart_container_" + <?php echo $last_selected_year; ?>).addClass('active');
    $("#donutchart-all-" + <?php echo $last_selected_year; ?>).css({"visibility": "visible"});
    $("#bchart-all-" + <?php echo $last_selected_year; ?>).css({"visibility": "visible"});
    $(".chart_div_container").removeClass('active');
    $(".chart_div_container_" + <?php echo $last_selected_year; ?>).addClass('active');
    $("#chart_div_" + <?php echo $last_selected_year; ?>).css({"visibility": "visible"});
    $(".implementation_chart_container").removeClass('active');
    $(".implementation_chart_container_" + <?php echo $last_selected_year; ?>).addClass('active');
    $("#implemented-all-" + <?php echo $last_selected_year; ?>).css({"visibility": "visible"});
  })(jQuery);
</script>

<?php
foreach ($data["activities"] as $year => $arr) {
  ?>
  <div class="pa-container updated-pa-container">
    <div class="program-year-wrapper program-wrapper-<?php echo $year; ?>" style="<?php if ($last_selected_year == $year) { ?>display:block<?php
    }
    else {
      ?>display:none<?php } ?>;">
      <h2><?php echo $data['pa_country_name']; ?> <?php echo $year; ?> Programme Activities data </h2>
      <?php
      foreach ($arr as $cc => $country_code) {
        ?>
        <?php
        foreach ($country_code as $outid_id => $out_arr) {
          ?>
          <div class = "program-child-wrapper">
            <div class="program-parent-title"><?php echo $outid_id; ?> </div>
            <div class="program-parent-wrapper">
              <div class="program-title-wrapper">
                <div class="programs-program-description">
                  <?php
                  foreach ($out_arr as $act_id => $act_arr) {
                    $description = $data["support_outcomes"][$act_id]["par_des"];
                  }
                  echo $description;
                  ?>
                </div>
              </div>
              <div class="program-data-wrapper">
                <div class="projects-project-spec">
                  <div class="projects-project-divider"></div>
                  <div class="projects-project-spec-key">Total Spending:</div>
                  <div class="projects-project-spec-value">
                    <?php
                    $total = 0;
                    foreach ($out_arr as $outcome => $outcome_arr) {
                      $sub_total_budget = array();
                      $sub_total_budget = array_sum($outcome_arr["budget"]);
                      $total += $sub_total_budget;
                    }
                    echo '$' . round($total);
                    ?>
                  </div>
                  <div class="projects-project-divider"></div>
                  <div class="projects-project-spec-key">Implemented by:</div>
                  <div class="projects-project-spec-value">
                    <?php
                    $num_implementer_budget = array();
                    $num_calc_percentage = array();
                    foreach ($out_arr as $outcome => $outcome_arr) {
                      $c = 0;
                      $cnt_implement = $outcome_arr["implemented_by"];
                      krsort($outcome_arr["implemented_by"]);
                      foreach ($outcome_arr["implemented_by"] as $implementer => $sub_tot) {
                        $implementer_budget = array_sum($sub_tot);
                        $calc_percentage = ($implementer_budget / $total) * 100;
                        if (isset($num_implementer_budget[$implementer])) {
                          $num_implementer_budget[$implementer] += $implementer_budget;
                        }
                        else {
                          $num_implementer_budget[$implementer] = $implementer_budget;
                        }
                        if (isset($num_calc_percentage[$implementer])) {
                          $num_calc_percentage[$implementer] += $calc_percentage;
                        }
                        else {
                          $num_calc_percentage[$implementer] = $calc_percentage;
                        }
                        $c++;
                      }
                    }
                    $i = 0;
                    foreach ($num_implementer_budget as $implementer => $value) {
                      echo $implementer . " $" . round($num_implementer_budget[$implementer]) . " (<span class='row$i'>" . round($num_calc_percentage[$implementer]) . "%</span>) <br />";
                      $i++;
                    }
                    ?>
                  </div>
                  <div class="projects-project-divider"></div>
                  <div class="projects-project-spec-key">Funded by:</div>
                  <div class="projects-project-spec-value">
                    <?php
                    $sub_total_budget = array_sum($act_arr["budget"]);
                    ksort($act_arr["funded_by"]);
                    $nc_sum_array = array();
                    $c_sum_array = array();
                    foreach ($out_arr as $act_id => $act_arr) {
                      foreach ($act_arr["funded_by"] as $funder => $sub_tot) {
                        $funder_percentage = (array_sum($sub_tot) / $total) * 100;
                        if ($funder != 'CORE') {
                          $nc_sum_array[] = $funder_percentage;
                        }
                        else {
                          $c_sum_array[] = $funder_percentage;
                        }
                      }
                    }
                    if (count($c_sum_array) > 0) {
                      ?>
                      Regular Resources (<span class='r2'><?php echo round(array_sum($c_sum_array)) . "%"; ?></span>) <br />
                      <?php
                    }
                    if (count($nc_sum_array) > 0) {
                      ?>
                      Other Resources (<span class='r1'><?php echo round(array_sum($nc_sum_array)) . "%"; ?></span>) <br />
                    <?php } ?>
                  </div>
                  <div class="projects-project-divider"></div>
                </div>
              </div>
            </div>
            <?php foreach ($out_arr as $act_id => $act_arr) {
              ?>
              <div class="program-wrapper">
                <div class="program-title-wrapper">
                  <div class="programs-program-title">
                    <?php echo $data["support_outcomes"][$act_id]["label"]; ?>
                  </div>
                  <div class="programs-program-description">
                    <?php echo $data["support_outcomes"][$act_id]["des"]; ?>
                  </div>
                </div>
                <div class="program-data-wrapper">
                  <div class="projects-project-spec">
                    <div class="projects-project-divider"></div>
                    <div class="projects-project-spec-key">Total Spending:</div>
                    <div class="projects-project-spec-value">
                      <?php
                      $sub_total_budget = array_sum($act_arr["budget"]);
                      echo '$' . round($sub_total_budget);
                      ?>
                    </div>
                    <div class="projects-project-divider"></div>
                    <div class="projects-project-spec-key">Implemented by:</div>
                    <div class="projects-project-spec-value">
                      <?php
                      $c = 0;
                      $cnt_implement = $act_arr["implemented_by"];
                      krsort($act_arr["implemented_by"]);
                      foreach ($act_arr["implemented_by"] as $implementer => $sub_tot) {
                        $implementer_budget = array_sum($sub_tot);
                        $calc_percentage = ($implementer_budget / $sub_total_budget) * 100;
                        $num_implementer_budget = round($implementer_budget);
                        $num_calc_percentage = round($calc_percentage);
                        if ($c == $cnt_implement) {
                          echo $implementer . " $" . $num_implementer_budget . " (<span class='row$c'>" . $num_calc_percentage . "%</span>)";
                        }
                        else {
                          echo $implementer . " $" . $num_implementer_budget . " (<span class='row$c'>" . $num_calc_percentage . "%</span>) <br />";
                        }
                        $c++;
                      }
                      ?>
                    </div>
                    <div class="projects-project-divider"></div>
                    <div class="projects-project-spec-key">Funded by:</div>
                    <div class="projects-project-spec-value projects-project-spec-title">
                      <?php
                      $sub_total_budget = array_sum($act_arr["budget"]);
                      ksort($act_arr["funded_by"]);
                      $nc_sum_array = array();
                      $c_sum_array = array();
                      foreach ($act_arr["funded_by"] as $funder => $sub_tot) {
                        $funder_percentage = (array_sum($sub_tot) / $sub_total_budget) * 100;
                        if ($funder != 'CORE') {
                          $nc_sum_array[] = round($funder_percentage);
                        }
                        else {
                          $c_sum_array[] = round($funder_percentage);
                        }
                      }
                      if (count($c_sum_array) > 0) {
                        ?>
                        Regular Resources (<span class='r2'><?php echo array_sum($c_sum_array) . "%"; ?></span>) <br />
                        <?php
                      }
                      if (count($nc_sum_array) > 0) {
                        ?>
                        Other Resources (<span class='r1'><?php echo array_sum($nc_sum_array) . "%"; ?></span>) <br />
                      <?php }
                      ?>
                    </div>
                    <div class="projects-project-divider"></div>
                  </div>
                </div> <!-- program-data-wrapper Ends -->
              </div> <!-- program-wraper Ends -->
              <?php
            }
            ?>
          </div> <!-- program-wraper each year Ends -->
          <?php
        }
      }
      ?>
    </div> <!-- pa-container Ends -->
  </div>
<?php } ?>
