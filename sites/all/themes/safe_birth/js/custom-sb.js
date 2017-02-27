(function ($) {
  $(document).ready(function () {
    // To show the intro banner on first visit.
    var visited = localStorage.getItem('visited');
    if (!visited) {
      localStorage.setItem('visited', true);
    }

    var W = $(window).width(),
      H = $(window).height();
    $('.intro-page').height(H).width(W);
    $('.bg-img #cycler').height(H).width(W);
    $('.bg-img #cycler img').height(H).width(W);

    $('.cb-slideshow li span.image').height(H).width(W);

    $("#baby-head").on("click", function (e) {
      e.preventDefault();
      $('.intro-page.page').hide();
      $('#container').addClass('active');
      $('#container').animate({
        scrollTop: 0}, 1000);
      $('#header').css({'position': 'fixed', 'top': '0'});
      setTimeout(function () {
        $('body').removeClass('is-intro-page');
      }, 2000);

    });

    $(".mobile-menu-icon-container a").click(function () {
      $('#nav').toggle();
    });

    $("#explore").click(function () {
      $('.intro-page.page').hide();
      $('#container').addClass('active');
      $('#container').animate({
        scrollTop: 0}, 1000);
      $('#header').css({'position': 'fixed', 'top': '0'});
      setTimeout(function () {
        $('body').removeClass('is-intro-page');
      }, 2000);
    });

    $(".image-section-container .hover-effect").mouseover(function () {
      var currentOverlay = $(this).children('.image-overlay');
      $(currentOverlay).css({"display": "block", "overflow": "hidden"});
    });

    $(".image-section-container .hover-effect").mouseleave(function () {
      var currentOverlay = $(this).children('.image-overlay');
      $(currentOverlay).css('display', 'none');
    });

    $('#nav li a').click(function (e) {
      if (!visited) {
        e.preventDefault();
      }
      $('#nav li a.active').removeClass('active');
      $(this).addClass('active');
      var getID = '#'+$(this).attr('name');
      $(getID).addClass('active');
      if (W <= 480) {
        $('html, body').animate({
          scrollTop: $(getID).offset().top - 95
        }, 1000);
      }
      else {
        $('html, body').animate({
          scrollTop: $(getID).offset().top - 172
        }, 1000);
      }
    });

    var header_height = $("#header").height();
    $(".safebirth-body").css('margin-top', header_height);

    $('.center-wrapper').addClass('clearfix inside-wrapper-spacer');
    $(".center-wrapper").wrapAll("<div class='news-wrapper clearfix grey-background' />");
    $(".center-wrapper .panel-panel").wrapAll("<div class='column-wrapper clearfix' />");
  });

  $(window).load(function () {
    // To align the news banner, country and related news on three column
    // news detail page.
    if ($('body').hasClass('news-detail-page')) {
      var top = $('#news-detail-page-template .views-field-body').position().top;
      $('#news-detail-page-template.panel-3col-stacked .panel-col, #news-detail-page-template .panel-col-last').css({top: top});
    }
  });
})(jQuery);
