(function ($) {

  $(document).ready(function () {
    if ($('.slideshow-image').length > 0) {
      $('.slideshow-image').prepend('<span class="slideshow-image-overlay"></span>');
      $('body').append('<div id="slideshow-main"><div id="image-slideshow"></div></div>');
      $('body').append('<div class="slideshow-close"></div>');
    }

    $('.slideshow-image').click(function (e) {
      e.preventDefault();
      var href = $(this).attr('href');
      var formData = {"n_url": href};
      $.ajax({
        type: 'POST',
        url: '/slideshow/ajax',
        data: formData,
        dataType: 'html',
        beforeSend: function () {
          $('#image-slideshow').addClass('slideshow-open');
          $('.slideshow-close').show();
        },
        success: function (data) {
          $('#image-slideshow').html(data);
          $('#image-slideshow .flexslider').flexslider({
            slideshow: false,
            controlNav: false,
            prevText: "",
            nextText: ""
          });
          responsiveSlideshow();
        }
      });

    });
    $('.view-vw-video.view-display-id-block_home_videos .flexslider').flexslider({
      slideshow: false,
      animation: "slide",
      prevText: "",
      nextText: "",
      controlNav: false,
      animationLoop: false
    });
    $('.view-multimedia.view-display-id-multimedia_block .flexslider').flexslider({
      slideshow: false,
      animation: "slide",
      prevText: "",
      nextText: "",
      controlNav: false,
      animationLoop: false
    });
    $('.view-feature.view-display-id-feature_main_block .flexslider').flexslider({
      slideshow: false,
      animation: "slide",
      prevText: "",
      nextText: "",
      controlNav: false,
      animationLoop: false
    });
    $('.slideshow-close').click(function (e) {
      $(this).hide();
      $('#image-slideshow').html('');
      $('#image-slideshow').removeClass('slideshow-open');
    });

    $(window).resize(function () {
      responsiveSlideshow();
    });
  });

  function responsiveSlideshow() {
    var ht = $('#image-slideshow .views-field-title').outerHeight(true);
    var hd = $('#image-slideshow .views-field-field-date').length > 0 ? $('#image-slideshow .views-field-field-date').outerHeight(true) : 0;
    var hs = $('#image-slideshow').height() - (2 * ht) - hd;
    var ws = $('#image-slideshow').width();
    $('#image-slideshow .flexslider .slides li').each(function () {
      var $img = $(this).find('img');
      var hi = $img.attr('height');
      var wi = $img.attr('width');
      var rs = ws / hs;
      var ri = wi / hi;
      if (rs > ri) {
        var nwi = wi * hs / hi;
        var nhi = hs;
      } else {
        var nwi = ws;
        var nhi = hi * ws / wi;
      }
      $img.height(nhi);
      $img.width(nwi);

      var $caption = $(this).children('.views-field-field-slide-caption');
      var hc = $caption.outerHeight();
      var nhc = hs - nhi + ht;
      if (hc > nhc) {
        $caption.css({bottom: -nhc});
      } else {
        $caption.css({bottom: -hc});
      }
    });
  }

})(jQuery);
