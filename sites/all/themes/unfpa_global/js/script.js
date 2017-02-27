(function ($) {
  $(document).ready(function () {

    //adiciona o placeholder em browsers que não tem suporte
    Modernizr.load([{
        test: Modernizr.input.placeholder,
        nope: Drupal.settings.basePath + 'js/_pf_placeholder.js'
      }]);

    var bannerIndex = 0;
    var $bannerItem = $('#img_quote .wrapper .banner .item');
    var $bannerCounter = $('.banner_counter');
    var bannerQtd = $bannerItem.size();
    var $li = $('<li></li>');
    var interval;
    var intervalTime = 2000;
    var $breadcrumb = $('.breadcrumb');

    // Insert li in ul.banner_counter in the same number of box in the banner.
    for (var i = 0; i < bannerQtd; i++) {
      var $liClone = $li.clone();
      $bannerCounter.append($liClone);
    }

    var $counterItem = $bannerCounter.find('li');

    // Make the li of ul.banner_counter 'clickable'
    $counterItem.each(function (i) {
      var $this = $(this);
      $this.click(function () {
        clearTimeout(interval);
        var $item = $bannerItem.eq(bannerIndex);
        $item.stop().animate({opacity: 'toggle'}, 500, function () {
          bannerIndex = i;
          var $newItem = $bannerItem.eq(bannerIndex);
          $counterItem.css({'background': '#b5b6a9'});
          $counterItem.eq(bannerIndex).css({'background': '#fff'});
          $newItem.stop().animate({opacity: 'toggle'}, 500, function () {
            interval = setTimeout(changeImage, intervalTime);
          });
        });
      });
    });

    // Give the correctly width to ul.banner_counter.
    $bannerCounter.width(bannerQtd * 28);

    // Insert a 'last' class to the last link of breadcrumb.
    $breadcrumb.find('li:last a').addClass('last');

    // colorbox
    $(".inline-colorbox").colorbox({inline: true, width: "646px"}); // width = video's width + 1px
    $(".view-photo-gallery .views-field-field-photo a").colorbox({rel: "gallery", width: "100%", maxWidth: "900px"});

    /**
     * This method shows the first banner.
     */
    function showImage() {
      var $item = $bannerItem.eq(bannerIndex);
      $counterItem.eq(bannerIndex).css({'background': '#fff'});
      $item.stop().animate({opacity: 'toggle'}, 500, function () {
        interval = setTimeout(changeImage, intervalTime);
      });
    }
    $(".pane-block-newsletter .item form.newsletter .button").click(function () {
      var email_data = $(".pane-block-newsletter .item form.newsletter .txt").val();
      window.location.href = "http://visitor.r20.constantcontact.com/manage/optin?v=001-YNFZmXHhSP25d9kiBTi0ZxtEwaeIcM-UeLsaXPKYoHs5SAGE1WbNakIrfhkc_3wTTkXkKXbHJpBnXtbqkTATg_O174jFAyLQdNkQkPKQAk%3D&MERGE0=" + email_data;
    });
    /**
     * This method hides the currently banner and shows the next one.
     */
    function changeImage() {
      var $item = $bannerItem.eq(bannerIndex);
      $item.stop().animate({opacity: 'toggle'}, 500, function () {
        bannerIndex = bannerIndex + 1;
        if (bannerIndex > (bannerQtd - 1)) {
          bannerIndex = 0;
        }
        var $newItem = $bannerItem.eq(bannerIndex);
        $counterItem.css({'background': '#b5b6a9'});
        $counterItem.eq(bannerIndex).css({'background': '#fff'});
        $newItem.stop().animate({opacity: 'toggle'}, 500, function () {
          interval = setTimeout(changeImage, intervalTime);
        });
      });
    }

    showImage();

    // In #features, take to last .item the 'last' class.
    $('#features').find('.item:last').addClass('last');

    // In #fact_sheets, take to last li the 'last' class.
    $('#fact_sheets').find('li:last').addClass('last');

    // In the #news, take to last .item the 'last' class.
    $('#news').find('.item:last').addClass('last');

    // In #publications, take to last .item the 'last' class.
    $('#publications').find('.item:last').addClass('last');

    // In #social_updates, take to last .item the 'last' class.
    $('#social_updates').find('.item:last').addClass('last');

    // In infographics, take to last .item the last class.
    $('#infographics').find('.item:last').addClass('last');

    // In photographs, take to last .item the last class.
    $('#photographs').find('.item:last').addClass('last');

    // In photographs, take to last .item the last class.
    $('#landing_menu').find('li:first').addClass('first');

    // In stories from the field, take to last .item the last class.
    $('#stories_from_the_field').find('.item:last').addClass('last');

    // In worldwide, last region list
    /*
     $('.region').find('ul:last').addClass('last');
     $('.region .office:nth-child(4n)').addClass('last');
     $('.region:last').addClass('last');
     */
    $('#key_resources .news, #key_resources .publications').find('.item:last').addClass('last');



    $('#header .max_wrapper #block-system-main-menu ul.menu li:last').addClass('last');
    $('#header .max_wrapper .submenu .column:last').addClass('last');
    $('#breadcrumb .max_wrapper ul li:last').addClass('last');
    $('#related-topics .publications li:last').addClass('last');

    // SOF responsive mobile main menu effect

    var windowSize = $(window).width();
    var $close2 = $('#navigation ul.menu li.expanded > a');

    if (windowSize <= 720) {
      $('#navigation ul.menu li.expanded').on({
        mouseenter: function () {
          $close2.css({'pointer-events': 'none'});
        },
        mouseleave: function () {
          //$(this).children('ul.menu').css({'display': 'none'});
        }
      });

      $('#navigation ul.menu li.expanded').on('touchstart', function () {
        $(this).off('mouseenter,mouseleave');
      });

    }

    // EOF responsive mobile main menu effect

    $('#open_text').find('figure').each(function () {
      var $this = $(this);
      var $img = $this.find('img');
      var $iframe = $this.find('iframe');
      if ($img) {
        $this.width($img.width());
      } else if ($iframe) {
        $this.width($iframe.width());
      }
    });



    var initial_title_height = 0;
    $('#header .max_wrapper .submenu').find('.column h1').each(function () {
      var $this = $(this);
      var height = $this.height();
      if (height > initial_title_height) {
        initial_title_height = height;
      }
    });
    $('#header .max_wrapper .submenu').find('.column h1').height(initial_title_height);



    var initial_height = 0;
    $('#header .max_wrapper .submenu').find('.column').each(function () {
      var $this = $(this);
      var height = $this.height();
      if (height > initial_height) {
        initial_height = height;
      }
    });
    $('#header .max_wrapper .submenu').find('.column').height(initial_height);



    $('#header .max_wrapper .submenu').find('.column ul').each(function () {
      var $this = $(this);
      $this.find('li:last').addClass('last');
    });



    $('#header .max_wrapper #block-system-main-menu ul.menu li a').hover(function () {
      $('#header .max_wrapper .submenu').hide();
    });



    $('#header .max_wrapper .submenu').hide();
    $('#header .max_wrapper #block-system-main-menu ul.menu li .has_submenu').each(function () {
      var $this = $(this);
      var target_class = ".submenu." + $this.attr('rel');
      var $submenu = $this.closest('.max_wrapper').find(target_class);
      $this.hover(function () {
        $submenu.show();
      });
    });



    $('#header .max_wrapper .submenu').each(function () {
      var $this = $(this);
      var target_class = '.has_submenu.' + $this.attr('data-parent');
      var $parent = $this.closest('.max_wrapper').find(target_class);
      $this.hover(function () {
        $parent.addClass('hover');
      }, function () {
        $parent.removeClass('hover');
        $this.hide();
      });
    });



    $('.btOffice').click(function (e) {
      e.preventDefault();
      var $this = $(this);
      $('.btOffice').removeClass('active');
      $this.addClass('active');
      var $target = $this.attr('data-target');

      $('.wWHolder:not(.' + $target + ')').hide(function () {
      });
      $('.wWHolder.' + $target + '').show(function () {
      });
    });



    $('.btRegion').click(function (e) {
      e.preventDefault();
      var $this = $(this);
      $('.btRegion').removeClass('active');
      $this.addClass('active');
      var $target = $this.attr('data-target');

      $('.countriesList').find('li.' + $target + '').removeClass('off');
      $('.countriesList').find('li:not(.' + $target + ')').addClass('off');
    });



    var landing_img_recipe = $('#header_landing .max_wrapper .images .photos_recipe');
    function theCounter($recipe) {
      var $counter = $recipe.parent().find('.counter');
      var li = '<li></li>';
      var elements = $recipe.find('a');
      elements.each(function () {
        $counter.append(li);
      });
      var counterMargin = ($counter.width() / 2) * -1;
      $counter.css({'margin-left': counterMargin});
    }
    theCounter(landing_img_recipe);

    var landing_index = 0;
    function toggleImage($recipe) {
      var img = $recipe.find('a');
      var imgQtd = img.size();
      var counter = $recipe.parent().find('.counter');

      img.hide();
      counter.find('li').removeClass('active');
      img.eq(landing_index).stop().animate({opacity: 'toggle'}, 500);
      counter.find('li').eq(landing_index).addClass('active');

      if (landing_index == (imgQtd - 1)) {
        landing_index = 0;
      } else {
        landing_index++;
      }
    }
    toggleImage(landing_img_recipe);
    setInterval(function () {
      toggleImage(landing_img_recipe);
    }, 3500);



    $('#header_landing .max_wrapper .images .photos_recipe a').click(function (e) {
      e.preventDefault();
      location.href = $(this).attr('href');
    });

    // based in http://jsbin.com/uhuto
    function passThrough(e) {
      $('#header_landing .max_wrapper .images .photos_recipe a').each(function () {
        if ($(this).is(':visible') == true) {
          $(this).click();
        }
      });
    }
    $('#header_landing .max_wrapper .images .photos_corners').click(passThrough);




    //featured_content
    if ($('.carousel .thumbs .itens .flow li').length > 0) {
      var timer = 5000;

      var $flow = $('.carousel .thumbs .itens .flow');

      var $arrowLeft = $('.carousel .thumbs .arrow.left');
      var $arrowRight = $('.carousel .thumbs .arrow.right');
      var $actualSlides = $('.carousel .thumbs .itens .flow li').length;
      jQuery('#viewport').carousel($arrowLeft, $arrowRight);

      function trocaBigSlide(li_flag) {
        //.empty().html(string);
        $('.carousel .show').clearQueue().stop().animate({'opacity': '0'}, 'fast', function () {
          $('.carousel .show').html($('.carousel .thumbs .itens .flow li.current div.bigslide').html());
          $('.carousel .show').animate({'opacity': '1'});
        });
      }
      function changeByTime() {
        var isHovered = $('.carousel .show').is(":hover");
        if (!isHovered)
        {
          var $old = $('.carousel .thumbs .itens .flow li.current');
          var index = $old.index() + 1;

          if (index > $actualSlides) {
            index = 1;
          }
//$old.removeClass('current');
//$('.carousel .thumbs .itens .flow li').eq(index).addClass('current');
//          var $oldBullet = $('.carousel .bullets ul li.current');
//          $oldBullet.next().addClass('current');
//          $oldBullet.removeClass('current');
          $('.carousel .bullets ul li.current').removeClass('current');
          $('.carousel .bullets ul li:first-child').addClass('current');
          $('.carousel .thumbs .itens .flow li').eq(index).click();

          $arrowRight.click();
          //trocaBigSlide();
        }
        else
        {
          $('.carousel .bullets ul li.current').removeClass('current');
          $('.carousel .bullets ul li:first-child').addClass('current');
          /*clearInterval(intervalo);

           intervalo = setInterval(function () {
           changeByTime();
           }, timer);*/

          if (!$("#featured_content_vertical .carousel .thumbs .itens ul").hasClass("stop"))
          {
            clearInterval(intervalo);
            intervalo = setInterval(function () {
              changeByTime();
            }, timer);
          }

        }
      }


      function changeByStep() {

        $flow.clearQueue().stop().animate({'left': '-' + (stepFlow * (currentStep - 1)) + 'px'}, function () {

          if (currentStep == maxStep) {
//          $arrowRight.css('opacity','0.2');
          } else {
            $arrowRight.css('opacity', '1');
          }
          if (currentStep == 1) {
//          $arrowLeft.css('opacity','0.2');
          } else {
            $arrowLeft.css('opacity', '1');
          }

        });
      }

      //var widthFlow = 0;
      var qtdeSlides = $('.carousel .thumbs .itens .flow li').length;
      var widthThumb = 180 + 20;//180 +20;
      var stepFlow = 580 + 20;//580+20;

      $flow.css('width', (qtdeSlides * widthThumb) + 'px');

      $('.carousel .thumbs .itens .flow li:first-child').addClass('current');
      $('.carousel .show').html($('.carousel .thumbs .itens .flow li.current div.bigslide').html());

      //bullets
      var qtdeBullets = qtdeSlides % 3 != 0 ? (qtdeSlides / 3) + 1 : (qtdeSlides / 3);
      qtdeBullets = Math.floor(qtdeBullets);
      var maxStep = qtdeBullets;
      var currentStep = 1;
      var widthbullet = 8 + 20;
      widthBullets = widthbullet * qtdeBullets - 20;
      for (var i = qtdeBullets - 1; i > 0; i--) {
        $('.carousel .bullets ul').append($('<li><a href="javascript:;">o</a></li>'));
      }
      ;
      $('.carousel .bullets ul li:first-child').addClass('current');
      $('.carousel .bullets').css('width', widthBullets + 'px');
//    $arrowLeft.css('opacity','0.2');

      $('.carousel .thumbs .itens .flow li').click(function () {
        if (!$(this).hasClass('current')) {
          $(this).parent().find('.current').removeClass('current');
          $(this).addClass('current');
          //var li_flag  = $(this).attr('id');

          /*clearInterval(intervalo);

           intervalo = setInterval(function () {
           changeByTime();
           }, timer);*/

          if (!$("#featured_content_vertical .carousel .thumbs .itens ul").hasClass("stop"))
          {
            clearInterval(intervalo);
            intervalo = setInterval(function () {
              changeByTime();
            }, timer);
          }


          trocaBigSlide();
        }
      });

      $('.carousel .mobile-arrow.right').click(function () {
        var $current_slide = $(this).siblings('.thumbs').find('.current');
        if ($current_slide.prev().length > 0) {
          $current_slide.prev().addClass('current');
        }
        else {
          $(this).siblings('.thumbs').children('#viewport').children('.flow').children('li').last().addClass('current');
        }
        $current_slide.removeClass('current');
        //var li_flag  = $(this).attr('id');
        /*clearInterval(intervalo);

         intervalo = setInterval(function () {
         changeByTime();
         }, timer);*/

        if (!$("#featured_content_vertical .carousel .thumbs .itens ul").hasClass("stop"))
        {
          clearInterval(intervalo);
          var intervalo = setInterval(function () {
            changeByTime();
          }, timer);
        }


        var $hide = $('.carousel .hide');
        var $show = $('.carousel .show');
        var $bigslide = $('.carousel .thumbs .itens .flow li.current div.bigslide');
        $hide.css({left: '100%'});
        $hide.html($bigslide.html());
        $hide.animate({left: 0}, function () {
          $show.html($bigslide.html());
        });
      });

      $('.carousel .mobile-arrow.left').click(function () {
        var $current_slide = $(this).siblings('.thumbs').find('.current');
        if ($current_slide.next().length > 0) {
          $current_slide.next().addClass('current');
        }
        else {
          $(this).siblings('.thumbs').children('#viewport').children('.flow').children('li').first().addClass('current');
        }
        $current_slide.removeClass('current');
        //var li_flag  = $(this).attr('id');
        /*clearInterval(intervalo);

         intervalo = setInterval(function () {
         changeByTime();
         }, timer);*/

        if (!$("#featured_content_vertical .carousel .thumbs .itens ul").hasClass("stop"))
        {
          clearInterval(intervalo);
          var intervalo = setInterval(function () {
            changeByTime();
          }, timer);
        }

        var $hide = $('.carousel .hide');
        var $show = $('.carousel .show');
        var $bigslide = $('.carousel .thumbs .itens .flow li.current div.bigslide');
        $hide.css({left: '-100%'});
        $hide.html($bigslide.html());
        $hide.animate({left: 0}, function () {
          $show.html($bigslide.html());
        });
      });

      $('#featured_content_vertical .carousel').bind('swipeleft', function () {
        $('.carousel .mobile-arrow.right').click();
      });

      $('#featured_content_vertical .carousel').bind('swiperight', function () {
        $('.carousel .mobile-arrow.left').click();
      });


      /*var intervalo = setInterval(function () {
       changeByTime();
       }, timer);*/

      if (!$("#featured_content_vertical .carousel .thumbs .itens ul").hasClass("stop"))
      {
        var intervalo = setInterval(function () {
          changeByTime();
        }, timer);
      }


      $('.carousel .bullets ul li').click(function () {
        var $this = $(this);
        if (!$this.hasClass('current')) {
          $this.parent().find('.current').removeClass('current');
          $this.addClass('current');
          //console.log($(this).index());
          currentStep = $this.index() + 1;
          changeByStep();
        }
      });

      /*/
       $arrowRight.click(function (){
       if (currentStep < maxStep && !$flow.is(':animated')) {
       $flow.clearQueue().stop().animate({'top':'-='+stepFlow+'px'},function(){
       currentStep++;
       if (currentStep == maxStep) {
       $arrowRight.css('opacity','0.2');
       }else{
       $arrowRight.css('opacity','1');
       }
       if (currentStep == 1) {
       $arrowLeft.css('opacity','0.2');
       }else{
       $arrowLeft.css('opacity','1');
       }

       var $old = $('.carousel .bullets ul li.current');
       $old.next().addClass('current');
       $old.removeClass('current');
       });
       }
       });
       $arrowLeft.click(function (){
       if (currentStep > 1 && !$flow.is(':animated')) {
       $flow.clearQueue().stop().animate({'top':'+='+stepFlow+'px'},function(){
       currentStep--;
       if (currentStep == maxStep) {
       $arrowRight.css('opacity','0.2');
       }else{
       $arrowRight.css('opacity','1');
       }
       if (currentStep == 1) {
       $arrowLeft.css('opacity','0.2');
       }else{
       $arrowLeft.css('opacity','1');
       }
       var $old = $('.carousel .bullets ul li.current');
       $old.prev().addClass('current');
       $old.removeClass('current');
       });
       }
       });
       /**/
    }
    //END featured_content


    var $gal = $("#dvEvents").find(".gallery");
    $gal.find("img:odd").css("margin-left", "20px");


    // #statistic_map_combo
    if ($('#statistic_map_combo').size() > 0) {
      $('#statistic_map_combo').find('.select').clickoutside(function () {
        $('#statistic_map_combo').find('.country').hide();
      });
    }

    $('#statistic_map_combo').find('.country-name').hover(function () {
      $(this).addClass('active');
    }, function () {
      $(this).removeClass('active');
    }).click(function (e) {
      $(this).closest('#statistic_map_combo').find('.country').toggle();
    });

    $('#statistic_map_combo').find('.country li').hover(function () {
      $(this).addClass('active');
    }, function () {
      $(this).removeClass('active');
    }).click(function (e) {
      var $this = $(this);
      var tClass = $this.attr('data-value');
      var tText = $this.text();
      $this.closest('#statistic_map_combo').find('.country').hide();
      $this.closest('#statistic_map_combo').find('.country-name').text(tText);
      $this.closest('#statistic_map_combo').find('.country-value').val(tClass);
    });

    // unfpa worldwide
    $('#unfpa_worldwide').find('.selector .selected').hover(function () {
      $(this).addClass('hover');
    }, function () {
      $(this).removeClass('hover');
    }).click(function (e) {
      e.stopPropagation();
      $(this).closest('.selector').find('.list').toggle();
    });

    $('#unfpa_worldwide').find('.selector').clickoutside(function () {
      $(this).find('.list').hide();
    });

    $('#unfpa_worldwide').find('.pin').click(function (e) {
      e.preventDefault();
      e.stopPropagation();
      $('.map_item.quick-active').find('.quick-info').hide();
      $('#unfpa_worldwide .map_item.quick-active').removeClass('quick-active');
      $('#unfpa_worldwide .pin.active').removeClass('active');
      $(this).addClass('active');
      $('.map_item').find('.info').hide();
      $(this).closest('.map_item').find('.info').toggle();
      $('.map_item').removeClass('active');
      $(this).closest('.map_item').addClass('active');
    });

    $('#unfpa_worldwide').find('.map_item.office_country').hide();

    $('#unfpa_worldwide').find('.close').click(function (e) {
      e.preventDefault();
      e.stopPropagation();
      $(this).closest('.info').hide();
      $('#unfpa_worldwide .pin.active').removeClass('active');
      $('.map_item').removeClass('active');
    });

    $('#unfpa_worldwide').find('.list li a').click(function (e) {
      e.preventDefault();
      e.stopPropagation();
      var $this = $(this);
      var text = $this.text();
      var href = $this.attr('href');
      var classActive = '.' + href;
      $this.closest('.selector').find('.selected').text(text);
      $this.closest('.list').hide();
      $('#unfpa_worldwide').find('.map_item').hide();
      $('#unfpa_worldwide').find(classActive).show();
    });

    //featured publications
    $('#featured_publication, #new_releases').find('.buttons').find('.items:last').addClass('last');
    $('.select_list').find('li:last').addClass('last');
    $('.select_value').hover(function () {
      $(this).addClass('hover');
    }, function () {
      $(this).removeClass('hover');
    }).click(function (e) {
      e.preventDefault();
      var list = $(this).closest('.box').find('.select_list');
      list.toggle();
      $('.box').css('z-index', '1');
      $(this).closest('.box').css('z-index', '1000');
    }).closest('.box').find('ul li a').click(function (e) {
      e.preventDefault();
      var $this = $(this);
      var $input = $this.closest('.box').find('.real_value');
      var $span = $this.closest('.box').find('.select_value');
      var $list = $this.closest('.select_list');
      var value = $this.attr('href');
      var text = $this.text();
      $input.val(value);
      $span.text(text);
      $list.hide();
    });

    $('.box').each(function () {
      $(this).clickoutside(function () {
        $(this).find('.select_list').hide();
      });
    });

    $('#new_releases').find('.pagination').find('ul').css('margin-left', ($('#new_releases').find('.pagination').find('ul').width() / 2 * -1));
    $('#new_releases').find('.pagination').find('.inactive').click(function (e) {
      e.preventDefault();
    });

    $('.ie7').find('.clearfix').append('<div class="ie7Hack"></div>');

    $(".decision .text").expander({
      slicePoint: 150,
      expandText: 'Show more',
      userCollapseText: 'Show less'
    });

    $('#mobile-menu-icon').click(function () {
      $('.region-navigation').slideToggle();
    });

    $('.view-vw-events.event-list .selected-event').click(function () {
      $('.view-vw-events.event-list .select-list').slideToggle();
    });

    $('.view-vw-events.event-list .bluelink').click(function () {
      $('.view-vw-events.event-list .selected-event').html($(this).text());
    });

    //Javascript for executive board event page Upcoming/Past menu toggle
    $('.view-exbo-events.event-list .selected-event').click(function () {
      $('.view-exbo-events.event-list .select-list').slideToggle();
    });
    $('.view-exbo-events.event-list .bluelink').click(function () {
      $('.view-exbo-events.event-list .selected-event').html($(this).text());
    });


    $('.view-job.job-list .selected-job').click(function () {
      $('.view-job.job-list .select-list').slideToggle();
    });

    $('.view-job.job-list .bluelink').click(function () {
      $('.view-job.job-list .selected-event').html($(this).text());
    });

    $('#featured_content_vertical .carousel .thumbs .itens .flow li a').click(function (e) {
      e.preventDefault();
    });

    $('#featured_content_vertical .carousel .thumbs .itens .flow li a').dblclick(function () {
      window.location.href = $(this).attr('href');
    });

    $('body').on('click', '.expand-topic a', function (e) {
      e.preventDefault();
      if ($('.expand-topic a').hasClass('less')) {
        $('.expand-topic a').text('Read more').removeClass('less');
        $('#expanded-block').slideUp();
        $('html, body').animate({scrollTop: $('#overview-block').offset().top}, 500);
      }
      else {
        $('.expand-topic a').text('Close').addClass('less');
        $('#expanded-block').slideDown();
        $('html, body').animate({scrollTop: $('#expanded-block').offset().top}, 500);
        responsiveVideo();
      }
    });
    $('body').delegate('#custom-data-portal-form .activities-checkboxes .form-item input.activities-checkboxes', 'click', function () {
      var ischecked = $(this).prop("checked");
      $('input.activities-checkboxes').prop("checked", false);
      $(this).prop("checked", ischecked);
      if ($(this).parent().is(':first-child')) {
        $(this).parent('.form-item').siblings('.form-item').children('input').prop("checked", ischecked);
      }
    });

    if ($('.views-field-field-color .field-content').text().length > 0) {
      var topic_banner_bg = $('.views-field-field-color .field-content').text();
      $('.views-field-field-color').parent('.views-row').css({background: topic_banner_bg});
    }

    $('body').on('click', '.pa-container .program-parent-title', function () {
      if (!$(this).hasClass('active')) {
        $('.pa-container .program-parent-title.active').siblings('.program-wrapper').slideUp();
        $('.pa-container .program-parent-title.active').siblings('.program-parent-wrapper').slideDown();
        $('.pa-container .program-parent-title.active').removeClass('active');
        $(this).addClass('active');
        $(this).siblings('.program-wrapper').slideDown();
        $(this).siblings('.program-parent-wrapper').slideUp();
      }
      else {
        $(this).siblings('.program-wrapper').slideUp();
        $(this).siblings('.program-parent-wrapper').slideDown();
        $(this).removeClass('active');
      }
    });

    // Topic page on hover news/publications image show description scroller.
    $('body').on('mouseenter', '.view-vw-related-topics-terms.view-display-id-related_topic_news_terms .views-row, .view-vw-related-topics-terms.view-display-id-related_topic_publications_terms .views-row', function () {
      var scroll_by = $(this).find('.description-scroller').height() - $(this).find('.description-container').height();
      if (scroll_by > 0) {
        $(this).find('.description-scroller').animate({marginTop: -scroll_by}, scroll_by * 100);
      }
    }).on('mouseleave', '.view-vw-related-topics-terms.view-display-id-related_topic_news_terms .views-row, .view-vw-related-topics-terms.view-display-id-related_topic_publications_terms .views-row', function () {
      $(this).find('.description-scroller').stop(true, true).css({marginTop: 0});
    });

    $('.item-list ul.pager').each(function () {
      var $pagerItemList = $(this).parent('.item-list');
      if ($pagerItemList.siblings('.view-footer').length > 0) {
        $pagerItemList.css({float: 'left'});
        $pagerItemList.siblings('.view-footer').css({float: 'right'});
      }
    });

    $('#slideshow-detail-page #slideshow-main .flexslider').flexslider({
      smoothHeight: true,
      slideshow: false,
      controlNav: false,
      prevText: "",
      nextText: ""
    });
    $('#slideshow-main .flexslider').flexslider({
      slideshow: false,
      controlNav: false,
      prevText: "",
      nextText: ""
    });
    $('.flexslider').flexslider({
      slideshowSpeed: 5000,
      pauseOnHover: true,
      directionNav: false
    });

    $('.slider-for').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      fade: false,
      asNavFor: '.slider-nav',
      autoplay: Drupal.settings.home_slider_switch,
      arrows: false,
      prevArrow: '<div class="slick-prev"></div>',
      nextArrow: '<div class="slick-next"></div>',
      responsive: [
        {
          breakpoint: 767,
          settings: {
            arrows: true
          }
        }
      ]
    });
    $('.slider-nav').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      asNavFor: '.slider-for',
      centerMode: true,
      focusOnSelect: true,
      prevArrow: '<div class="slick-prev"></div>',
      nextArrow: '<div class="slick-next"></div>',
      variableWidth: true
    });

    $('.slider-nav a').click(function (e) {
      e.preventDefault();
    });

    $('.slider-nav a').dblclick(function (e) {
      window.location.replace($(this).attr("href"));
    });

//        responsiveMap();
//        responsiveVideo();
//        alignNewsBlocks();
    if ($(window).width() > 720) {
      $('.panel-col-top .pane-custom-home-banner-featured-banner-list').after($('.stay_connected'));
    }
    else {
      $('.panel-col-bottom .pane-vw-events').after($('.stay_connected'));
    }

    $(window).load(function () {
      responsiveMap();
      responsiveVideo();
      alignNewsBlocks();
      rearrangeBlocks();
      dataHeight();
      flexiableJobBody();
      if ($('body').hasClass('node-type-ct-feature')) {
        responsiveFeatures();
        var window_width = $(window).width();
        var $slides = $('.view-field-collection-view.view-display-id-feature_slides_block .views-row');
        var $slidesBlock = $('.view-field-collection-view.view-display-id-feature_slides_block');
        var $header = $('header');
        var $htmlBody = $('html, body');
        var totalSlides = $slides.length;
        var i = totalSlides;
        var j = -200;
        var slider_pagination = "<div id='slider-pagination'><ul>";
        for (var k = 0; k < totalSlides; k++) {
          var l = j;
          j += 1000;
          slider_pagination += "<li data-" + l + "='background-position:-175px -9px' data-" + (l + 1) + "='background-position:-200px -9px' data-" + j + "='background-position:-200px -9px' data-" + (j + 1) + "='background-position:-175px -9px'></li>";
        }
        slider_pagination += "</ul></div>";
        $slidesBlock.append(slider_pagination);
        var $sliderPagination = $('#slider-pagination');
        var $sliderPaginationList = $('#slider-pagination li');
        $sliderPagination.css({'z-index': totalSlides});
        if (window_width >= 768) {
          var $featureTitle = $('.view-feature .views-field-title');
          var $featureFooter = $('.view-field-collection-view.view-display-id-feature_slides_block .view-footer');
          var $featureRelNews = $('#feature-related-news');
          $sliderPagination.attr('data-0', 'display:block');
          var header_height = $header.outerHeight();
          $header.css({position: 'fixed', width: '100%'});
          $header.attr('data-0', 'top:0px;');
          $header.attr('data-' + header_height, 'top:-' + header_height + 'px;');
          $featureTitle.attr('data-0', 'opacity: 1; z-index: 20;');
          $featureTitle.attr('data-' + header_height, 'opacity: 0; z-index: 0;');
          $featureFooter.attr('data-0', 'opacity: 1; z-index: 20;');
          $featureFooter.attr('data-' + header_height, 'opacity: 0; z-index: 0;');
          j = 0;
          $slides.each(function () {
            var $this = $(this);
            var $slideCopy = $this.find('.slide-copy');
            var $slideCredit = $this.find('.views-field-field-photo-credit');
            //totalSlides += $this.width();
            //$this.width($this.width());
            var slide_height = $this.outerHeight();
            $this.css({zIndex: i--});
            if ($slideCopy.hasClass('left')) {
              $slideCopy.attr('data-' + j, 'left: -100%; opacity: 0;');
            }
            if ($slideCopy.hasClass('right')) {
              $slideCopy.attr('data-' + j, 'right: -100%; opacity: 0;');
            }
            $slideCredit.attr('data-' + j, 'opacity: 0;');
            j += 200;
            if ($slideCopy.hasClass('left')) {
              $slideCopy.attr('data-' + j, 'left: 0%; opacity: 1;');
            }
            if ($slideCopy.hasClass('right')) {
              $slideCopy.attr('data-' + j, 'right: 0%; opacity: 1;');
            }
            $slideCredit.attr('data-' + j, 'opacity: 1;');
            j += 200;
            $slideCopy.attr('data-' + j, 'top: 0px;');
            $this.attr('data-' + j, 'top: 0px;');
            $slideCredit.attr('data-' + j, 'bottom:0px;');
            j += 400;
            $slideCopy.attr('data-' + j, 'top: -' + slide_height + 'px;');
            $slideCredit.attr('data-' + j, 'bottom:' + slide_height + 'px;');
            if (!$this.hasClass('views-row-last')) {
              $this.attr('data-' + j, 'top: -' + slide_height + 'px;');
            }
            else {
              $slideCredit.attr('data-' + j, 'opacity: 0;');
            }
            j += 200;
          });
          j -= 200;
          $sliderPagination.attr('data-' + j, 'display:none');
          $featureRelNews.attr('data-' + j, 'opacity:0; top:400px;z-index:0;');
          j += 100;
          $featureRelNews.attr('data-' + j, 'opacity:1; top:200px;z-index:' + totalSlides + ';');
          if (window_width <= 768) {
            $featureRelNews.attr('data-' + j, 'opacity:1; top:0px;z-index:' + totalSlides + ';');
            j += $featureRelNews.height();
            $featureRelNews.attr('data-' + j, 'top:-' + $featureRelNews.height() + 'px');
          }
          if (window_width > 768) {
            $header.attr('data-' + j, 'top:-' + header_height + 'px;');
            $header.attr('data-' + (j + header_height), 'top:0px;');
          }
          var s = skrollr.init({
            skrollrBody: 'skrollr-body'
          });
          $slidesBlock.css({visibility: 'visible'});
          $sliderPaginationList.click(function () {
            $htmlBody.animate({scrollTop: ($(this).index() * 1000) + 400}, 2000);
          });

          $slides.click(function () {
            if ($(this).next().length > 0) {
              $htmlBody.animate({scrollTop: (($(this).index() + 1) * 1000) + 400}, 2000);
            }
          });
        }
        else {
          $('#slider-pagination li:nth-child(1)').addClass('active');
          $sliderPaginationList.click(function () {
            $sliderPaginationList.removeClass('active');
            $(this).addClass('active');
            var index = $(this).index() + 1;
            var scrollTo = $('.view-field-collection-view.view-display-id-feature_slides_block .views-row-' + index).offset().top;
            $htmlBody.animate({scrollTop: scrollTo}, 1000);
          });

          $slides.click(function () {
            var index = $(this).index() + 2;
            var scrollTo = $('.view-field-collection-view.view-display-id-feature_slides_block .views-row-' + index).offset().top;
            $htmlBody.animate({scrollTop: scrollTo}, 1000);
            $sliderPaginationList.removeClass('active');
            $('#slider-pagination li:nth-child(' + (index) + ')').addClass('active');
          });

        }
      }
    });

    $(window).resize(function () {
      responsiveMap();
      responsiveVideo();
      alignNewsBlocks();
      rearrangeBlocks();
      responsiveFeatures();
      dataHeight();
      flexiableJobBody();
    });

//        var totalSlides = 0;
//        var scrollLimit = 0;
//        var slideBy = 0;


    //var lastScrollTop = 0;
    //var st1 = 150;
    //var prevSlide = 0;
    //var prevScrolltop = 0;
    $(window).scroll(function (e) {
      if ($('body').hasClass('node-type-ct-featured-publication')) {
        if ($(this).scrollTop() > 150) {
          $('#top_menu').css({'position': 'fixed'});
        }
        else {
          $('#top_menu').css({'position': 'absolute'});
        }

        // Default scrollTop position including the fixed menu height of
        // 51 pixels.
        var defaultScrollTop = $(this).scrollTop() + 51;

        // Show Specific Menu as active based on the scrolling of the page.
        if ($('#content-4').offset() && defaultScrollTop > $('#content-4').offset().top) {
          $('#top_menu a').removeClass('active');
          $('#top_menu').find('a[href="#content-4"]').addClass('active');
        }
        else if ($('#content-3').offset() && defaultScrollTop > $('#content-3').offset().top) {
          $('#top_menu a').removeClass('active');
          $('#top_menu').find('a[href="#content-3"]').addClass('active');
        }
        else if ($('#content-2').offset() && defaultScrollTop > $('#content-2').offset().top) {
          $('#top_menu a').removeClass('active');
          $('#top_menu').find('a[href="#content-2"]').addClass('active');
        }
        else if ($('#content-1').offset() && defaultScrollTop > $('#content-1').offset().top) {
          $('#top_menu a').removeClass('active');
          $('#top_menu').find('a[href="#content-1"]').addClass('active');
        }

      }
//            else if ($('body').hasClass('node-type-ct-feature')) {
//                var current_slide = Math.ceil($(this).scrollTop() / 1000);
//                var current_case = Math.ceil(($(this).scrollTop() % 1000) / 250);
//                $('.view-field-collection-view.view-display-id-feature_slides_block .views-row.active').removeClass('active');
//                $('.view-field-collection-view.view-display-id-feature_slides_block .views-row.views-row-' + current_slide).addClass('active');
//                if (current_slide != prevSlide && current_case == 4) {
//                    prevScrolltop = $(this).scrollTop();
//                    prevSlide = current_slide;
//                }
//                if (current_slide == 0) {
//                    $('.view-field-collection-view.view-display-id-feature_slides_block .views-row.views-row-first').find('.slide-number').animate({marginTop: 0, opacity: 0});
//                }
//                slideBy = $(this).scrollTop() - prevScrolltop;
//                var $this = $('.view-field-collection-view.view-display-id-feature_slides_block .views-row.active');
//                if (lastScrollTop <= $(this).scrollTop()) {
//                    switch (current_case) {
//                        case 1:
//                            $this.find('.slide-copy').animate({opacity: 1});
//                            $this.find('.slide-number').animate({marginTop: 0, opacity: 1});
//                            break;
//                        case 2:
//                            $this.find('.slide-headline').animate({marginTop: 0, opacity: 1});
//                            break;
//                        case 3:
//                            $this.find('.views-field-field-photo-credit').animate({marginTop: 0, opacity: 1});
//                            break;
//                        case 4:
//                            if (current_slide != totalSlides) {
//                                $this.find('.views-field-field-photo-credit').animate({bottom: -$this.height()}, 1000);
//                                $this.animate({top: -$this.height()}, 1000);
//                                $this.find('.slide-copy').animate({top: -$this.height()}, 1000);
//                            }
//                            break;
//                    }
//                }
//                else {
//                    switch (current_case) {
//                        case 1:
//                            $this.find('.slide-headline').animate({marginTop: 10, opacity: 0});
//                            break;
//                        case 2:
//                            $this.find('.views-field-field-photo-credit').animate({marginTop: 10, opacity: 0});
//                            break;
//                        case 3:
//                            $this.find('.views-field-field-photo-credit').animate({bottom: 0}, 1000);
//                            $this.animate({top: 0}, 1000);
//                            $this.find('.slide-copy').animate({top: 0}, 1000);
//                            break;
//                        case 4:
//                            $this.next().find('.slide-number').animate({marginTop: 10, opacity: 0});
//                            $this.next().find('.slide-copy').animate({opacity: 0});
//                            break;
//                    }
//                }
//                lastScrollTop = $(this).scrollTop();
//            }
    });

    $('#top_menu a').click(function (e) {
      e.preventDefault();
      var element = $(this).attr('href');
      $('html, body').animate({scrollTop: $(element).offset().top - 50}, 500);
    });

    $('.star').hover(function () {
      $(this).siblings('.text').show();
      $(this).siblings('.arrow').show();
    }, function () {
      $(this).siblings('.text').hide();
      $(this).siblings('.arrow').hide();
    });

    $('.pin').mouseenter(function () {
      if (!$(this).hasClass('active')) {
        //$(this).stop(true, true).animate({width: 10, height: 10, left: "-=3", top: "-=3"});
        $('.map_item').removeClass('quick-active');
        $(this).parent('.map_item').addClass('quick-active');
        $(this).siblings('.quick-info').stop(true, true).fadeIn();
      }
    });

    $('.pin').mouseleave(function () {
      if (!$(this).hasClass('active')) {
        $(this).siblings('.quick-info').stop(true, true).fadeOut();
      }
    });

    /* Preventing click of menu dropdown links */
//        $('#header menu #navigation ul.menu li.expanded > a').click(function (e) {
//            alert('hi');
//            e.preventDefault();
//        });


    /* Map zoom function */
    /*
     $('#unfpa_worldwide').click(function (e) {
     var $map = $('#unfpa_worldwide .map-wrapper');
     var mapwidth = $('#unfpa_worldwide img').width();
     var mapheight = $('#unfpa_worldwide img').height();
     if ($(this).hasClass('hover')) {
     $('#unfpa_worldwide .map_item .pin').hide();
     $('#unfpa_worldwide .map_item .info').addClass('hide');
     $map.animate({width: (mapwidth / 2), left: 0, top: 0}, 2000, function () {
     responsiveMap();
     $('#unfpa_worldwide .map_item .pin').show();
     $('#unfpa_worldwide .map_item .info').removeClass('hide');
     $('#unfpa_worldwide').removeClass('hover');
     });
     $(this).off('mousemove');
     }
     else {
     var oleft = Math.ceil($(this).offset().left);
     var otop = Math.ceil($(this).offset().top);
     $('#unfpa_worldwide .wrapper').height(mapheight);
     $('#unfpa_worldwide .map_item .pin').hide();
     $('#unfpa_worldwide .map_item .info').addClass('hide');
     $(this).addClass('hover');
     //var x = window.setInterval(alert('hi'), 1);
     $map.animate({width: (mapwidth * 2), left: oleft - e.pageX, top: otop - e.pageY}, 2000, function () {
     responsiveMap();
     $('#unfpa_worldwide .map_item .pin').show();
     $('#unfpa_worldwide .map_item .info').removeClass('hide');
     $('#unfpa_worldwide').on('mousemove', function (e) {
     $map.css({left: oleft - e.pageX, top: otop - e.pageY});
     });
     });

     }
     });

     */
//
//    var draggable = false;
//    var org_posx = 0;
//    var org_posy = 0;
//    var map_posx = 0;
//    var map_posy = 0;
//    var $map = $('#unfpa_worldwide');
//    var $map_wrapper = $('#unfpa_worldwide .map-wrapper');
//    //var timer = 0;
//    $('#unfpa_worldwide img').mousedown(function (e) {
//        if ($map.hasClass('hover')) {
//            draggable = true;
//        }
//        org_posx = e.pageX;
//        org_posy = e.pageY;
//        map_posx = $map_wrapper.position().left;
//        map_posy = $map_wrapper.position().top;
////        timer = window.setTimeout(function () {
////            draggable = true;
////        }, 1000);
//        return false;
//    });
//    $('#unfpa_worldwide img').mousemove(function (e) {
//        if (draggable) {
//            $map_wrapper.css({left: e.pageX + map_posx - org_posx, top: e.pageY + map_posy - org_posy});
//        }
//        else {
//            return false;
//        }
//    });
//    $('#unfpa_worldwide img').mouseup(function (e) {
//        draggable = false;
//        if (org_posx == e.pageX && org_posy == e.pageY) {
//            //window.clearTimeout(timer);
//            //var $map_wrapper = $('#unfpa_worldwide .map-wrapper');
//            var mapwidth = $(this).width();
//            var mapheight = $(this).height();
//            if ($map.hasClass('hover')) {
//                $('#unfpa_worldwide .map_item .pin').hide();
//                $('#unfpa_worldwide .map_item .info').addClass('hide');
//                $map_wrapper.animate({width: (mapwidth / 2), left: 0, top: 0}, 2000, function () {
//                    responsiveMap();
//                    $('#unfpa_worldwide .map_item .pin').show();
//                    $('#unfpa_worldwide .map_item .info').removeClass('hide');
//                    $map.removeClass('hover');
//                });
////            $map.off('mousemove');
//            }
//            else {
//                var oleft = Math.round($map.offset().left);
//                var otop = Math.round($map.offset().top);
//                $('#unfpa_worldwide .wrapper').height(mapheight);
//                $('#unfpa_worldwide .map_item .pin').hide();
//                $('#unfpa_worldwide .map_item .info').addClass('hide');
//                $map.addClass('hover');
//                //var x = window.setInterval(alert('hi'), 1);
//                $map_wrapper.animate({width: (mapwidth * 2), left: oleft - e.pageX, top: otop - e.pageY}, 2000, function () {
//                    responsiveMap();
//                    $('#unfpa_worldwide .map_item .pin').show();
//                    $('#unfpa_worldwide .map_item .info').removeClass('hide');
////                $map.on('mousemove', function (e) {
////                    $map_wrapper.css({left: oleft - e.pageX, top: otop - e.pageY});
////                });
//                });
//
//            }
//        }
//        else {
//            return false;
//        }
//    });

//    $('#unfpa_worldwide').bind('mousewheel', function (event) {
//        if (event.originalEvent.wheelDelta >= 0) {
//            console.log('Scroll up');
//        }
//        else {
//            console.log('Scroll down');
//        }
//    });


    /* Mark to tweet function*/

    $('body').tweetHighlighted({
      // html node to use as the 'Tweet' button
      node: '<a href="#"><img src="/sites/all/themes/unfpa_global/images/tweet.png" width="90px" height="30px" alt="tweet icon"></a>',
      // class attribute to attach to the node
      cssClass: 'btn btn-primary',
      // minimum length of selected text needed to show the 'Tweet' button
      minLength: 6,
      // maximum length of selected text after which the 'Tweet' button is not shown
      maxLength: 144 * 2,
      // any extra string to attach to every tweet (mostly used to attach urls)
      extra: window.location.href,
      // twitter 'via' handle (basically appends 'via @twitterhandle' to the tweet)
      via: 'UNFPA',
      // arguments to pass to the window.open() function
      popupArgs: 'width=600,height=600,toolbar=0,location=0'
    });

    $('.pencil').on('click', function () {
      $('.thepopover').toggle();
    });

    $('.result_sub_title').each(function () {
      if ($(this).children('.star').length > 0) {
        var infoPosTop = $(this).children('.star').position().top;
        var infoPosLeft = $(this).children('.star').position().left;
        $(this).children('.text').css({top: infoPosTop + 35});
        $(this).children('.arrow').css({left: infoPosLeft + 5});
        if (infoPosLeft > $(this).width() / 2) {
          $(this).children('.text').css({left: 'auto', right: 0});
        }
      }
    });

    var height_arr = [];
    var height_arr_sum = [];

    $('.programme-document').each(function () {
      var $this = $(this);
      height_arr.push($this.outerHeight());

    });



    for (var i = height_arr.length; i < 4; i++) {
      height_arr[i] = 0;
    }

    var n = 0;
    height_arr_sum[0] = Math.abs((height_arr[0] + height_arr[1]) - (height_arr[2] + height_arr[3]));
    height_arr_sum[1] = Math.abs((height_arr[0] + height_arr[2]) - (height_arr[1] + height_arr[3]));
    height_arr_sum[2] = Math.abs((height_arr[0] + height_arr[3]) - (height_arr[1] + height_arr[2]));
    var minval = Math.min.apply(Math, height_arr_sum);
    for (var i = 0; i < height_arr_sum.length; i++) {
      if (minval == height_arr_sum[i]) {
        n = i;
      }
    }



    switch (n) {
      case 0:
        $('.programme-document:eq(0)').css({float: 'left', marginRight: '2%'});
        $('.programme-document:eq(1)').css({float: 'left', marginRight: '2%'});
        $('.programme-document:eq(2)').css({float: 'right', marginRight: 0});
        $('.programme-document:eq(3)').css({float: 'right', marginRight: 0});
        break;
      case 1:
        $('.programme-document:eq(0)').css({float: 'left', marginRight: '2%'});
        $('.programme-document:eq(1)').css({float: 'right', marginRight: 0});
        $('.programme-document:eq(2)').css({float: 'left', marginRight: '2%'});
        $('.programme-document:eq(3)').css({float: 'right', marginRight: 0});
        break;
      case 2:
        $('.programme-document:eq(0)').css({float: 'left', marginRight: '2%'});
        $('.programme-document:eq(1)').css({float: 'right', marginRight: 0});
        $('.programme-document:eq(2)').css({float: 'right', marginRight: 0});
        $('.programme-document:eq(3)').css({float: 'left', marginRight: '2%'});
        break;
    }

    $('#sdg-content .icon, #sdg-content .back-to-top a').click(function (e) {
      e.preventDefault();
      $('html, body').animate({scrollTop: $($(this).attr('href')).offset().top}, 500);
    });

    $('.check-list .yellowlink').click(function () {
      $('.check-list .yellowlink').removeClass('active');
      $(this).addClass('active');
    });

    $('#edit-field-level-tid-1-1, #edit-field-level-tid-1-2').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });

    $(document).ajaxComplete(function () {
      $('#edit-field-level-tid-1-1, #edit-field-level-tid-1-2').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
      stButtons.locateElements();
    });
  });


  function YLatToPixel(lat, width) {
    var containerHeight = 256;
    var siny = bound(Math.sin(lat * (Math.PI / 180)), -0.9999, 0.9999);
    lat = 90 + 0.5 * Math.log((1 + siny) / (1 - siny)) * (-containerHeight / (2 * Math.PI));
    lat *= (width / containerHeight);
    lat += 2;
    return lat;
  }

  function XLngToPixel(lng, width) {
    lng = parseFloat(lng);
    lng += 180;
    lng *= (width / 360);
    lng -= ((width * 31) / 980);
    return lng;
  }

  function bound(value, opt_min, opt_max) {
    if (opt_min !== null)
      value = Math.max(value, opt_min);
    if (opt_max !== null)
      value = Math.min(value, opt_max);
    return value;
  }

  function responsiveMap() {
    $('#unfpa_worldwide').find('.map_item').each(function () {
      var $this = $(this);
      var mapWidth = $('#unfpa_worldwide img').width();
      var cLat = $this.attr('data-ctop');
      var cLng = $this.attr('data-cleft');
      var cTop = YLatToPixel(cLat, mapWidth);
      var cLeft = XLngToPixel(cLng, mapWidth);
      $this.css({top: cTop, left: cLeft});
      if (cLeft > (mapWidth - 260))
        $this.addClass('left');
    });
  }
  function flexiableJobBody() {

    if ($(window).width() > 768) {
      var related_item_height = $('#news-detail-page-template .panel-panel.panel-col-last').height();
      $('#news-detail-page-template .view-job.view-display-id-jon_pane_detail .views-field-body').css('min-height', related_item_height);
    } else
    {
      $('#news-detail-page-template .view-job.view-display-id-jon_pane_detail .views-field-body').css('min-height', 0);
    }
  }

  function alignNewsBlocks() {
    if ($('body').hasClass('news-detail-page')) {
      var top = $('#news-detail-page-template .views-field-body').position().top;
      $('#news-detail-page-template.panel-3col-stacked .panel-col, #news-detail-page-template .panel-col-last').css({top: top});
    }
  }

  function responsiveVideo() {
    $('object, iframe').each(function () {
      var $video = $(this);
      var videoWidth = $video.attr('width');
      var videoRealWidth = $video.width();
      var videoHeight = $video.attr('height');
      var videoRealHeight = Math.round(videoRealWidth * videoHeight / videoWidth);
      $video.css({height: videoRealHeight});
    });
  }

  function rearrangeBlocks() {
    if ($(window).width() > 768) {
      $('.panel-col-top .pane-vw-home-feature-banner').after($('.stay_connected'));
      //For overview section
      $('.panel-col-top .pane-vw-internal-audit-reports-report-list-pane').after($('#overview-block'));
      //Topics Page
      $('.panel-col-top .pane-custom-custom-topic-related-news').after($('#overview-block'));
      //Emergency Sub Page
      $('.panel-col-top .pane-custom-custom-library-1').after($('#overview-block'));
      //For all common
      $('.panel-row-2 .inside').html($('#expanded-block'));
      $('.employment-page .panel-3col-33-stacked .panel-col').before($('.employment-page .panel-3col-33-stacked .panel-col-first'));
    }
    else {
      $('.panel-col-bottom .pane-vw-events').after($('.stay_connected'));
      //For overview section
      $('.panel-col-top .pane-node-field-banner').after($('#overview-block'));
      //Topics Page
      $('.panel-col-top .pane-custom-custom-topic-related-news').before($('#overview-block'));
      //Emergency Sub Page
      $('.panel-col-top .pane-custom-custom-library-1').before($('#overview-block'));
      //For all common
      $('#overview-block').after($('#expanded-block'));
      $('.employment-page .panel-3col-33-stacked .panel-col').after($('.employment-page .panel-3col-33-stacked .panel-col-first'));
    }
  }

  function responsiveFeatures() {
    var win_height = $(window).height();
    var win_width = $(window).width();
    $('.view-field-collection-view.view-display-id-feature_slides_block .views-field-field-image img').each(function () {
      $(this).css({width: 'auto', height: 'auto'});
      $(this).height(win_height);
      $(this).siblings('.slide-overlay').height(win_height);
      if ($(this).width() < win_width) {
        $(this).width(win_width);
        $(this).css({height: 'auto'});
      }
      if ($(this).parents('.views-row').hasClass('left')) {
        $(this).css({right: $(this).width() - win_width});
      }
    });
  }

  function dataHeight() {
    if ($('#sowp-data-block .all_chart_wrapper .data').length > 0) {
      var data_height = 0;
      var temp_data_height = 0;
      $('#sowp-data-block .all_chart_wrapper .data').each(function () {
        data_height = $(this).height() > temp_data_height ? $(this).height() : temp_data_height;
        temp_data_height = data_height;
      });
      $('#sowp-data-block .all_chart_wrapper .data').height(data_height);
    }
  }
}
)(jQuery);
