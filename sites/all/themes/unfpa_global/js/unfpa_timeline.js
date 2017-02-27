/*
 * Timeline JS Initialization.
 */
$(document).ready(function () {
  if ($('#timeline').length > 0) {
    var $nid = $('.timeline-wrapper').attr('id');
    var ajaxPath = Drupal.settings.basePath + Drupal.settings.pathPrefix;
    var timeline = new TL.Timeline('timeline', ajaxPath + 'timeline-data/' + $nid, {scale_factor: 1});
    window.onresize = function () {
      timeline.updateDisplay();
    };
  }
});
