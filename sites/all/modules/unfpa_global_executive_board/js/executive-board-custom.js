(function ($) {
  $(document).ready(function () {
    // trigger click on first element of languages list on reset button click.
    $('#edit-clear').click(function () {
      $('div#exbo-events-detail-form-filters div#edit-avail-lang:first').find('input').iCheck('update');
    });
    // Apply masonry effect on exbo evnets and session documents on ajax.
    $(document).ajaxComplete(function () {
      customMasonry();
    });

    // Make memnbership link active on bureau members page.
    if ($('.bureau-members').hasClass('active')) {
      $('.pane-innerpg-menu-innerpg-menu .pane-content ul.menu li:first a').addClass('active');
    }

    //JavaScript to your HTML to launch iCheck plugin
    $('.inner-page.eb-page .square-input-element input').iCheck({
      checkboxClass: 'icheckbox_futurico',
      radioClass: 'iradio_futurico',
      increaseArea: '20%'
    });
    $('.exbo-filter-wrapper .form-type-radios input').iCheck({
      checkboxClass: 'icheckbox_polaris',
      radioClass: 'iradio_polaris',
      increaseArea: '-10%'
    });

    $('.grey-background').hide();

    // Jquery to close tooltip on close button click.
    $('#cpd-tooltip span.close-button').click(function () {
      $('.grey-background').fadeOut(800);
      $('#cpd-tooltip').fadeOut(800);
    });

    customMasonry();

  });
  // Returns masonary effect description for exbo events and session documents.
  function customMasonry() {
    // Jquery to masonry effect to board document blocks.
    $('.documents-wrapper').masonry({
      itemSelector: '.country-documents-wrapper',
      // Other masonry options.
      stagger: 30,
      transitionDuration: '0.2s',
      resize: true,
      percentPosition: true
    });
  }
})(jQuery);
