/**
* @file
* General logic used by this module.
*
* Contains stuff like:
* - development helpers
* - initialization stuff
* - back to top link handling
* - featured stories behaviours
* - main nav onload animation.
*/
(function ($) {



/**
 * Initialize Drupal.sowp object if it doesn't exist.
 */
Drupal.sowp = Drupal.sowp || {};



/**
 * Additional global variables.
 */
Drupal.sowp.timers = {
  equalHeightStories: null
};



/**
 * Development stuff.
 */
$(document).ready(function () {
  if (1 == 2) {
    $('body').prepend('<div class="js-debug" style="position: fixed; top: 0; left: 0; background: red; color: white; z-index: 9999; line-height: 1em; padding: 2px;"></div>');

    $('.js-debug').text(window.innerWidth + 'px');

    $(window).resize(function () {
      $('.js-debug').text(window.innerWidth + 'px');
    });
  }
});



/**
 * Measures viewport width instead of document width.
 * Document width would return width without scrollbar.
 */
Drupal.sowp.viewportWidth = function () {
  var e = window;
  var a = 'inner';

  if (!('innerWidth' in window)) {
    a = 'client';
    e = document.documentElement || document.body;
  }

  return e[a + 'Width'];
};



/**
 * Device type detection.
 */
Drupal.sowp.deviceCheck = {
  init: function () {
    window.isMobile = this.isMobile();
    window.isIpad = this.isIpad();
    window.isDesktop = this.isDesktop();
  },
  isMobile: function () {
    return (jQuery.browser.mobile ? true : false);
  },
  isIpad: function () {
    return (navigator.userAgent.match(/iPad/i) != null);
  },
  isDesktop: function () {
    return (jQuery.browser.mobile || Drupal.sowp.deviceCheck.isIpad() ? false : true);
  },
  is768plus: function () {
    return (Drupal.sowp.viewportWidth() > 768);
  },
  backgroundSize: function () {
    return (Modernizr.backgroundsize ? true : false);
  }
};



/**
 * Call device detection right away.
 */
Drupal.sowp.deviceCheck.init();



/**
 * Equal height.
 */
Drupal.sowp.equalHeight = function ($items) {
  if ($items.length > 0) {
    // First reset whatever might have been previously set.
    $items.css({'min-height': 0});

    // Work out equal height.
    var top_height = 0;
    $items.each(function () {
      var current_height = $(this).outerHeight();
      if (top_height < current_height) {
        top_height = current_height;
      }
    });
    $items.css({'min-height': top_height});
  }
};



/**
 * Featured stories equal height.
 */
Drupal.sowp.equalHeightStories = function () {
  clearTimeout(Drupal.sowp.timers.equalHeightStories);

  Drupal.sowp.timers.equalHeightStories = setTimeout(function () {
    $('.swp-stories').each(function () {
      var $items = $(this).find('.stories-list .js-equal-height');

      // Now match height of all items.
      if (Drupal.sowp.deviceCheck.is768plus()) {
        Drupal.sowp.equalHeight($items);
      }
    });
  }, 200);
};



/**
 * Social sites sharing popup.
 */
Drupal.sowp.sharePopup = function (url) {
  // Setup popup window.
  var width = 600;
  var height = 600;
  //var left = ($(window).width() - width)  / 2;
  //var top = ($(window).height() - height) / 2;

  var opts =
    'width=' + width + ',height=' + height +
    //',left=' + left + ',top=' + top +
    ',toolbars=0,scrollbars=1,resizable=1';

  // Open popup window.
  window.open(url, Drupal.t('Sharing'), opts);
};



/**
 * Checks if element is vertically within the viewport.
 *
 * 'el' param - is DOM element, not jQuery one.
 *
 * 'delay' param - allows to to delay (in pixels) the moment when el becomes
 * treated as visible/invisible in viewport.
 *
 * http://stackoverflow.com/a/21627295
 */
Drupal.sowp.elemIsVisible = function (el, delay) {
  var top = el.getBoundingClientRect().top;
  var bottom = el.getBoundingClientRect().bottom;

  // Take into account that this object might be not visible
  // because of parent container overflow hidden.
  var rect;
  el = el.parentNode;

  do {
    rect = el.getBoundingClientRect();
    if (top <= rect.bottom === false) {
      return false;
    }
    el = el.parentNode;
  }
  while (el != document.body);

  // If object is visible in its parent container then return regular calculation.
  return top + delay <= document.documentElement.clientHeight && bottom >= 0 + delay;
};


/**
 * Get random integer within a defined range.
 */
Drupal.sowp.getRandomInt = function (min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
};



/**
 * SOWP Initialize.
 */
Drupal.behaviors.sowpInitialize = {
  attach: function (context, settings) {
    $('.swp', context).once('sowpInitialize', function () {
      var $swp = $(this);

      // Add class to body (used to enable css transitions upon full page load).
      $swp.addClass('swp-loaded');

      // Set device class to .swp (used by css).
      if (window.isDesktop) {
        $swp.addClass('swp-desktop');
      }
      else {
        $swp.addClass('swp-mobile');
      }
    });
  }
};



/**
 * Navigation on load animation and on scroll fade in.
 */
Drupal.behaviors.sowpNavAnimate = {
  attach: function (context, settings) {
    $('.swp-nav', context).once('sowpNavAnimate', function () {
      var $nav = $(this);
      
      // Navigation on load animation.
      var $links = $nav.find('ul a');
      var cls = 'js-hover';

      // Using css transitions.
      setTimeout(function () {
        $links.eq(0).addClass(cls)
      }, 1000);
      setTimeout(function () {
        $links.eq(1).addClass(cls)
      }, 1100);
      setTimeout(function () {
        $links.eq(2).addClass(cls)
      }, 1200);
      setTimeout(function () {
        $links.eq(3).addClass(cls)
      }, 1300);
      setTimeout(function () {
        $links.eq(4).addClass(cls)
      }, 1400);
      setTimeout(function () {
        $links.eq(0).removeClass(cls)
      }, 1500);
      setTimeout(function () {
        $links.eq(1).removeClass(cls)
      }, 1600);
      setTimeout(function () {
        $links.eq(2).removeClass(cls)
      }, 1700);
      setTimeout(function () {
        $links.eq(3).removeClass(cls)
      }, 1800);
      setTimeout(function () {
        $links.eq(4).removeClass(cls)
      }, 1900);

      // Navigation on scroll fade in and fade out (2016).
      if ($('.swp').hasClass('swp-2016')) {
        var nav_displayed = false;
        var $trigger_element = $('.js-nav-fadein');

        // Handles checking if nav should fade in or out, and does so.
        var nav_fading = function() {
          var window_scroll_top = $(window).scrollTop();
          var element_scroll_top = $trigger_element.offset().top;
          
          if (window_scroll_top > element_scroll_top && !nav_displayed) {
            $nav.fadeIn();
            nav_displayed = true;
          }
          else if (element_scroll_top > window_scroll_top && nav_displayed) {
            $nav.fadeOut();
            nav_displayed = false;
          }
        };
        
        $(window).load(nav_fading);
        $(window).scroll(nav_fading);
        $(window).resize(nav_fading);
      }
    });
  }
};



/**
 * Back to top link behaviour.
 */
Drupal.behaviors.sowpBackToTop = {
  attach: function (context, settings) {
    $('.swp-gotop', context).once('sowpeBackToTop', function () {

      var $link = $(this);
      var $window = $(window);

      function showHide() {
        if ($window.scrollTop() > 200) {
          $link.fadeIn(500);
        }
        else {
          $link.fadeOut(500);
        }
      }

      // Show/hide on load.
      showHide();

      // Window scroll.
      $window.scroll(function () {
        showHide();
      });

      // Links click.
      $link.click(function (e) {
        e.preventDefault();
        $link.blur();

        $('html, body').scrollTop(4000).animate(
          {scrollTop: $('.section-cover').offset().top + 3},
          {duration: 1000, easing: 'easeInOutExpo'}
        );

        // Also remove hash if its there.
        history.pushState("", document.title, window.location.pathname);
      });

      // Links hover effect.
      $link.mouseenter(function () {
        $link.animate({'opacity': 0.1}, 100, function () {
          $link.css({'opacity': 1});
        });
      });
    });
  }
};



/**
 * SOWP 2016 image grid behavior.
 */
Drupal.behaviors.sowpImageGrid = {
  attach: function (context, settings) {
    $('.swp-imagegrid', context).once('sowpImageGrid', function () {
      var $grid = $(this);
      var $grid_items = $grid.find('.swp-grid-item');
      var $wish_preview = $grid.find('.swp-grid-wish-preview');
      var $wish = $grid.find('.swp-grid-wish-preview-content');
      var item_active = false;

      // Grid items.
      $grid_items.each(function() {
        var $item = $(this);
        var wish_text =
          '<strong class="wild-font">' + Drupal.t('My One Wish...') + '</strong>' +
          $item.find('.swp-grid-item-wish').html();
        var color = $item.find('.swp-grid-item-wish').attr('data-color');
        
        $item.hover(function() {
          if (!$item.hasClass('active') && !item_active) {
            $wish.html(wish_text).css({'color': 'rgb(' + color + ')'});
            $wish_preview.show();
          }
        }, function() {
          if (!$item.hasClass('active') && !item_active) {
            $wish_preview.hide();
          }
        });

        $item.click(function() {
          $grid_items.not($item).removeClass('active');
          
          if ($item.hasClass('active')) {
            $wish_preview.hide();
            $item.removeClass('active');
            item_active = false;
          }
          // If mobile then toggle display of wish on click.
          else if (Drupal.sowp.deviceCheck.isMobile()) {
            $wish.html(wish_text).css({'color': 'rgb(' + color + ')'});
            $wish_preview.show();
            $item.addClass('active');
            item_active = true;
          }
        });
      });
    });
  }
};



/**
 * Featured stories opening and expanding.
 */
Drupal.behaviors.sowpFeatStories = {
  attach: function (context, settings) {

    // Featured stories equal height.

    $('html', context).once('sowpFeatStories', function () {
      Drupal.sowp.equalHeightStories();
      $(window).resize(function () {
        Drupal.sowp.equalHeightStories();
      });
    });

    // Showing and hiding of featured story details, body expanding.

    $('.swp-stories', context).once('sowpFeatStories', function () {
      var $wrapper = $(this);
      var $links_list = $wrapper.find('.stories-list');
      var $links = $wrapper.find('.stories-list button');
      var $stories = $wrapper.find('.swp-story');
      var $story_close = $stories.find('.story-close');
      
      // Remove thumb image title attribute.
      $links_list.find('img').attr('title', null);

      // Story opening, body scrolling.

      $links.each(function (index) {
        $(this).click(function () {
          $stories.hide();
          $links_list.hide();

          var $story = $stories.eq(index);

          // Story FadeIn.
          $story.fadeIn();

          // Story body scrolling.
          var $body = $story.find('.story-body');
          var $body_inner = $body.find('.story-body-inner');

          var $showlinks_wrap = $story.find('.story-showall');
          var $showlink = $story.find('.story-showall .st-show');
          var $hidelink = $story.find('.story-showall .st-hide');

          $showlinks_wrap.hide();
          $showlink.hide();
          $hidelink.hide();

          if ($body.height() < $body_inner.height()) {
            $showlinks_wrap.show(0);
            $showlink.show(0);
            $showlink.click(function () {
              $body.css({'max-height': 'none'});
              $showlink.hide();
              $hidelink.show(0);
            });
            $hidelink.click(function () {
              $body.attr('style', '');
              $hidelink.hide();
              $showlink.show(0);
              $('body, html').animate({scrollTop: $body.offset().top - 60}, 1);
            });
          }
        });
      });

      // Story closing.
      $story_close.click(function () {
        $stories.fadeOut();
        $links_list.fadeIn();
        $stories.find('.story-body').css({'max-height': ''})
      });
    });

    // Featured story image cycle.

    $('.story-img-slider', context).once('sowpFeatStories', function () {
      var $slider = $(this);
      var $slides = $slider.find('.story-images ul');

      if ($slides.find('li').length > 1) {
        // Build controls.
        $slider.append('<a class="imgs-prev color-bg" href="javascript:;" title="' +
          Drupal.t('Previous image') + '"><span class="triangle"></span></a>');
        $slider.append('<a class="imgs-next color-bg" href="javascript:;" title="' +
          Drupal.t('Next image') + '"><span class="triangle"></span></a>');
        $slider.append('<div class="imgs-pager"></div>');

        // Cycle.
        $slides.cycle({
          pauseOnHover: true,
          speed: 1200,
          timeout: 0,
          fx: 'scrollHorz',
          slides: '> li',
          swipe: true,
          autoHeight: 'calc',
          prev: $slider.find('.imgs-prev'),
          next: $slider.find('.imgs-next'),
          pager: $slider.find('.imgs-pager')
        });

        $slider.find('.imgs-pager span').each(function (index) {
          $(this)
            .addClass('color-bg')
            .attr({'title': Drupal.t('Display image no ') + (index + 1)});
        });
      }
    });
  }
};



/**
 * Social links behaviour.
 */
Drupal.behaviors.sowpSocialLinks = {
  attach: function (context, settings) {
    $('.swp-share a', context).once('sowpSocialLinks', function () {
      var $lnk = $(this);

      // If we are here then js is working in browser - remove target _blank attribute
      // and replace the value of href so these links use only their onclick attribute.
      $lnk.attr({'target': '', 'href': 'javascript:;'});
    });
  }
};



/**
 * Animate charts onload, onscroll and do things onresize.
 */
Drupal.behaviors.sowpAnimatedCharts = {
  attach: function (context, settings) {
    $('.swp-multisvg', context).once('sowpAnimatedCharts', function () {
      var $multisvg = $(this);
      var $svgs = $multisvg.find('img.anim');
      var $svg_1 = $multisvg.find('.anim-base');
      var $svg_2 = $multisvg.find('.anim-grid');
      var $svg_3 = $multisvg.find('.anim-bars');
      var $xlabel = $multisvg.find('.swp-multisvg-xlabel img');
      var timeout;

      // On load stuff.

      if (Drupal.sowp.deviceCheck.is768plus()) {
        $svgs.hide();
        $svg_2.height('0%');
        $svg_3.height('0%');
        $xlabel.css({'opacity': 0});

        // Check if chart is in viewport + 150 pixels.
        setTimeout(function () {
          var is_in_viewport = Drupal.sowp.elemIsVisible($multisvg.get(0), 150);

          if (is_in_viewport) {
            $xlabel.animate({'opacity': 1}, 300);
            $svg_1.fadeIn(300, function () {
              $svg_2.show(0).animate({'height': '100%'}, 800, 'easeOutBounce', function () {
                $svg_3.show(0).animate({'height': '100%'}, 800, 'easeOutCirc');
              });
            });
          }
        }, 200);
      }

      // On Scroll Stuff.

      // Show/hide chart svgs on scroll.
      $(document).scroll(function () {
        if (Drupal.sowp.deviceCheck.is768plus()) {
          clearTimeout(timeout);
          timeout = setTimeout(function () {
            // Check if chart is in viewport + 150 pixels.
            var is_in_viewport = Drupal.sowp.elemIsVisible($multisvg.get(0), 150);

            if (is_in_viewport) {
              $xlabel.animate({'opacity': 1}, 300);
              $svg_1.fadeIn(300, function () {
                $svg_2.show(0).animate({'height': '100%'}, 800, 'easeOutBounce', function () {
                  $svg_3.show(0).animate({'height': '100%'}, 800, 'easeOutCirc');
                });
              });
            }
            // Not in viewport - hide it so it animtes again when comes back into view.
            else if ($svg_2.is(':visible')) {
              // Need to make sure we are already 300px away.
              if (!Drupal.sowp.elemIsVisible($multisvg.get(0), -300)) {
                $svgs.hide();
                $svg_2.height('0%');
                $svg_3.height('0%');
                $xlabel.css({'opacity': 0});
              }
            }
          }, 200);
        }
      });

      // On Resize

      $(document).resize(function () {
        if (!Drupal.sowp.deviceCheck.is768plus()) {
          $svgs.show(0).height('100%');
        }
      });
    });
  }
};



/**
 * Causes animation of specific chart. Used by chart slider to animate on slide change.
 */
Drupal.sowp.animateChart = function ($multisvg, wait) {
  var $svgs = $multisvg.find('img.anim');
  var $svg_1 = $multisvg.find('.anim-base');
  var $svg_2 = $multisvg.find('.anim-grid');
  var $svg_3 = $multisvg.find('.anim-bars');
  var $xlabel = $multisvg.find('.swp-multisvg-xlabel img');

  if (Drupal.sowp.deviceCheck.is768plus()) {
    $svgs.hide();
    $svg_2.height('0%');
    $svg_3.height('0%');
    $xlabel.css({'opacity': 0});
    
    setTimeout(function () {
      $xlabel.animate({'opacity': 1}, 300);
      $svg_1.fadeIn(300, function () {
        $svg_2.show(0).animate({'height': '100%'}, 800, 'easeOutBounce', function () {
          $svg_3.show(0).animate({'height': '100%'}, 800, 'easeOutCirc');
        });
      });
    }, wait);
  }
};



/**
 * Animated charts prev/next slider.
 */
Drupal.behaviors.sowpChartsSlider = {
  attach: function (context, settings) {
    $('.charts-changer', context).once('sowpChartsSlider', function () {
      // jQuqery selectors.
      var $wrapper = $(this);
      var $parent = $wrapper.parents('.swp-chart-charts');
      var $slider = $wrapper.find('.charts-changer-items');
      var $slides = $slider.find('.swp-chart-chart');

      // Cycle Animation.

      if ($slides.length > 1) {
        // Build controls.
        $wrapper.after('<div class="chart-controls"><div class="chart-controls-inner"></div></div>');
        var $controls = $parent.find('.chart-controls-inner');

        var $prev = $('<a class="chart-prev color-text" href="javascript:;" title="' +
          Drupal.t('Previous chart') + '"><span class="icon-go-prev"></span></a>');
        $prev.appendTo($controls);
        var $next = $('<a class="chart-next color-text" href="javascript:;" title="' +
          Drupal.t('Next chart') + '"><span class="icon-go-next"></span></a>');
        $next.appendTo($controls);
        var $pager = $('<div class="chart-pager"></div>');
        $pager.appendTo($controls);

        // Cycle.
        $slider.cycle({
          pauseOnHover: true,
          speed: 1000,
          timeout: 0,
          fx: 'fade',
          slides: '> .swp-chart-chart',
          swipe: true,
          autoHeight: 'calc',
          prev: $prev,
          next: $next,
          pager: $pager
        });

        // Customize pager.
        $pager.find('span').each(function (index) {
          $(this)
            .addClass('color-bg')
            .attr({'title': Drupal.t('Display chart no ') + (index + 1)});
        });

        // Animate charts after slide change.
        $slider.on('cycle-before',
          function (event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
            var $curr_slide = $(incomingSlideEl);
            var $multisvg = $curr_slide.find('.swp-multisvg');
            Drupal.sowp.animateChart($multisvg, 1000);
          }
        );
      }
    });
  }
};



/**
 * Chart node: Image Slider.
 */
Drupal.behaviors.sowpImageSlider = {
  attach: function (context, settings) {
    $('.swp-chart-imgslider', context).once('sowpImageSlider', function () {
      // Outer div.
      var $wrapper = $(this);
      // <ul> wrapper div.
      var $slider = $wrapper.find('.swp-imgslider');
      // <ul>.
      var $slides = $slider.find('ul');

      if ($slides.find('li').length > 1) {
        // Build controls.
        $slider.append('<a class="imgs-prev color-text" href="javascript:;" title="' +
          Drupal.t('Previous image') + '"><span class="icon-go-prev"></span></a>');
        $slider.append('<a class="imgs-next color-text" href="javascript:;" title="' +
          Drupal.t('Next image') + '"><span class="icon-go-next"></span></a>');
        $wrapper.append('<div class="imgs-pager"></div>');

        // Create .slide-caption with captions - first caption visible initially.
        $wrapper.append('<div class="imgslider-captions sb-font"></div>');
        var $captions = $wrapper.find('.imgslider-captions');

        $slides.find('li').each(function (index) {
          var caption = $(this).find('.slide-caption-src').html();
          var $cp = $('<div>' + caption + '</div>');

          if (index > 0) {
            $cp.fadeTo(0, 0);
          }

          $captions.append($cp);
        });
        var $caption_divs = $wrapper.find('.imgslider-captions > *');

        // $captions div needs js set min height same as tallest caption div.
        var captionsTimeout;
        var captionsHeight = function () {
          clearTimeout(captionsTimeout);
          captionsTimeout = setTimeout(function () {
            var h = 0;
            $caption_divs.each(function () {
              var h2 = $(this).height();
              if (h2 > h) {
                h = h2;
              }
            });
            $captions.css({'min-height': h + 'px'});
          }, 200);
        };
        captionsHeight();
        $(window).resize(captionsHeight());

        // Cycle.
        $slides.cycle({
          pauseOnHover: true,
          speed: 1200,
          fx: 'scrollHorz',
          slides: '> li',
          swipe: true,
          autoHeight: 'calc',
          prev: $slider.find('.imgs-prev'),
          next: $slider.find('.imgs-next'),
          pager: $wrapper.find('.imgs-pager')
        });

        // Customize pager.
        $wrapper.find('.imgs-pager span').each(function (index) {
          $(this)
            .addClass('color-bg')
            .attr({'title': Drupal.t('Display image no ') + (index + 1)});
        });

        // Switch display of captions after slide changed.
        $slides.on('cycle-after',
          function (event, optionHash, outgoingSlideEl, incomingSlideEl, forwardFlag) {
            var index = $(incomingSlideEl).attr('data-slide-index');
            $caption_divs.fadeTo(0, 0);
            $caption_divs.eq(index).fadeTo(500, 1);
          }
        );
      }
    });
  }
};



/**
 * Animate bubble map markers in a neverending blinking loop.
 * Only animating markers if they are in the viewport (to improve page js performance).
 */
Drupal.behaviors.sowpAnimateBubblemapMarkers = {
  attach: function (context, settings) {
    $('.swp-bubblemap', context).once('sowpAnimateBubblemapMarkers', function () {
      var $bubblemap = $(this);
      var $locations = false;
      // Animation interval.
      var interval;
      // onScroll() timeout.
      var timeout;
      // If markers are already animating.
      var animating = false;

      // Set timeout to make sure the simplemap library has already created $locations (martkers).

      setTimeout(function () {
        var $locations = $bubblemap.find('[class^="sm_location_"]');

        // Start animating onload if map is visible in viewport.

        var is_in_viewport = Drupal.sowp.elemIsVisible($bubblemap.get(0), 0);
        if (is_in_viewport) {
          interval = setInterval(function () {
            $locations.fadeTo(200, 0.5).fadeTo(500, 1);
          }, 1000);
          animating = true;
        }

        // Animate markers when they come into viewport.
        // Otherwise disable their animation.

        $(document).scroll(function () {
          clearTimeout(timeout);
          timeout = setTimeout(function () {
            var is_in_viewport = Drupal.sowp.elemIsVisible($bubblemap.get(0), 0);

            // Animate if in viewport and not animating already.
            if (is_in_viewport && !animating) {
              clearInterval(interval);
              interval = setInterval(function () {
                $locations.fadeTo(200, 0.5).fadeTo(500, 1);
              }, 1000);
              animating = true;
            }
            // Stop animation if not in viewport and still animating.
            else if (!is_in_viewport && animating) {
              clearInterval(interval);
              $locations.fadeTo(0, 1);
              animating = false;
            }
          }, 200);
        });

      }, 1000);
    });
  }
};



/*
 * Venn graph behaviour.
 */
Drupal.behaviors.sowpVennDiagram = {
  attach: function (context, settings) {
    $('.swp-venndiag', context).once('sowpVennDiagram', function () {
      var $venn = $(this);
      var $circles = $venn.find('.swp-circle');
      var $info_text = $venn.find('.venn-info-text');

      var circles_displayed = false;
      var timeout;

      // Helper function that creates icon div container.

      var createIconMarkup = function (icon) {
        return '<div class="venn-info-icon"><span class="icon-venn-' + icon + '"></span></div>';
      };

      // Function for animating a circle.

      var animateCircle = function ($circle, delay) {
        setTimeout(function () {
          var $txt = $circle.find('.circle-text');
          $txt.hide();

          $circle.css({'transform': 'scale(1)', '-webkit-transform': 'scale(1)'});

          // Delay text fade in by the same ammount of ms as it takes for all circles
          // to do their zooming animation.
          setTimeout(function () {
            $txt.fadeIn(500);
          }, 1200);
        }, delay);
      };

      // Animate circles on load if they are in viewport.

      setTimeout(function () {
        var is_in_viewport = Drupal.sowp.elemIsVisible($venn.get(0), 150);
        if (is_in_viewport) {
          animateCircle($circles.eq(0), 0);
          animateCircle($circles.eq(1), 200);
          animateCircle($circles.eq(2), 400);
          animateCircle($circles.eq(3), 600);
          animateCircle($circles.eq(4), 800);
          animateCircle($circles.eq(5), 1000);
          circles_displayed = true;
        }
      }, 200);

      // Animate circles when they come into viewport onScroll.

      $(document).scroll(function () {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
          // Check if venn graph is in viewport + 150 pixels.
          var is_in_viewport = Drupal.sowp.elemIsVisible($venn.get(0), 150);
          if (is_in_viewport && !circles_displayed) {
            animateCircle($circles.eq(0), 0);
            animateCircle($circles.eq(1), 200);
            animateCircle($circles.eq(2), 400);
            animateCircle($circles.eq(3), 600);
            animateCircle($circles.eq(4), 800);
            animateCircle($circles.eq(5), 1000);
            circles_displayed = true;
          }
          // Not in viewport - hide zoom out circles so they animte again when back into view.
          else if (!is_in_viewport && circles_displayed) {
            if (!Drupal.sowp.elemIsVisible($venn.get(0), -300)) {
              $circles.css({
                'transform': 'scale(0.0001)',
                '-webkit-transform': 'scale(0.0001)'
              });
              circles_displayed = false;
            }
          }
        }, 200);
      });

      // Circles hover effect, circles click.

      $circles.each(function () {
        var $circle = $(this);
        var color = $circle.attr('data-color');

        // Hover.
        $circle.hover(function () {
          $circle.stop(true).animate({
            'backgroundColor': 'rgba(' + color + ', 0.8)',
            'borderColor': 'rgba(255, 255, 255, 0.8)'
          }, 500);
        }, function () {
          $circle.animate({
            'backgroundColor': 'rgba(' + color + ', 0.38)',
            'borderColor': 'rgba(255, 255, 255, 0.38)'
          }, 500);
        });

        // Click.
        $circle.click(function () {
          // Switch info text.
          $info_text.stop(true).fadeOut(500, function () {
            var attr_ico = $circle.attr('data-icon');
            var attr_inf = $circle.attr('data-info');
            var html = createIconMarkup(attr_ico) + attr_inf;

            $info_text
              .css({'color': 'rgba(' + color + ')'})
              .html(html)
              .fadeIn(500);
          });

          // Animate circle.
          $circle.css({'transition': 'transform 0.1s'});
          $circle.css({
            'transform': 'scale(0.9)',
            '-webkit-transform': 'scale(0.9)'
          });
          setTimeout(function () {
            $circle.css({
              'transform': 'scale(1)',
              '-webkit-transform': 'scale(1)'
            });
          }, 100);
          setTimeout(function () {
            $circle.css({'transition': 'transform 0.7s'});
          }, 200);
        });
      });
    });
  }
};



/**
 * Polaroid photos behaviour.
 */
Drupal.behaviors.sowpPolaroid = {
  attach: function (context, settings) {
    $('.swp-polaroid', context).once('sowpPolaroid', function () {
      var $polaroid = $(this);
      var $preview = $polaroid.find('.polaroid-photo');
      var $items = $polaroid.find('.polaroid-item');
      var angle_timeout;

      // Random CSS rotate angle.
      var randomAngle = function($elem, deg) {
        var rand_angle = Drupal.sowp.getRandomInt(-Math.abs(deg), deg);
        $elem.css({'transform': 'rotate(' + rand_angle.toString() + 'deg)'});
      };

      // Hiding preview and then showing next preview.
      var switchPreview = function(img, caption, color) {
        $preview.animate({'top': '150%'}, 500, function() {
          showPreview(img, caption, color);
        });
      };

      // Showing preview.
      var showPreview = function(img, caption, color) {
        // Prepare HTML.
        var preview_html = '<img src="' + img + '" alt="" />' +
          '<div class="polaroid-caption sb-font" style="color: ' + color + '">' + caption +'</div>';

        // Show preview.
        $preview.html(preview_html);

        // Set margins.
        var margin_left = $preview.outerWidth() / 2;
        var margin_top = ($preview.outerHeight() / 2) + 15;
        $preview.css({
          'margin-left': '-' + margin_left.toString() + 'px',
          'margin-top': '-' + margin_top.toString() + 'px'
        });

        // Animte slide to top.
        $preview.stop().animate({'top': '50%'}, 500);
        clearTimeout(angle_timeout);
        angle_timeout = setTimeout(function() {
          randomAngle($preview, 6);
        }, 50);
      };

      // Parse items.
      $items.each(function() {
        var $item = $(this);
        var $item_inner = $item.find('.polaroid-item-inner');
        var preview_src = $item.find('.polaroid-full').attr('src');
        var preview_caption = $item.find('.polaroid-txt').html();
        
        // Randomize angle on load.
        randomAngle($item, 14);

        // Handle click.
        $item.click(function() {
          // Ignore clicks on active item.
          if (!$item.hasClass('active')) {
            // Style active thumb.
            $item.addClass('active');

            // Deactivate other active item.
            $items.not($item).each(function() {
              var $other_item = $(this);

              if ($other_item.hasClass('active')) {
                var $other_item_inner = $other_item.find('.polaroid-item-inner');
                $other_item.removeClass('active');
                
                // Randomize angle on deactive other item.
                randomAngle($other_item, 14);
              }
            });
            
            // Get active item color.
            var color = $item_inner.css('border-top-color');

            // Show preview.
            if ($preview.hasClass('photo-active')) {
              switchPreview(preview_src, preview_caption, color);
            }
            else {
              showPreview(preview_src, preview_caption, color);
              $preview.addClass('photo-active');
            }
          }
        });

        // Randomize angle on mouse leave (if item is not active).
        $item.mouseleave(function() {
          if (!$item.hasClass('active')) {
            randomAngle($item, 14);
          }
        });
      });

      // Activate random item onload.
      setTimeout(function() {
        $items[Math.floor(Math.random() * $items.length)].click();
      }, 2000);

      var resize_timeout;
      // Reposition preview on resize.
      $(window).resize(function() {
        clearTimeout(resize_timeout);
        resize_timeout = setTimeout(function() {
          var margin_left = $preview.outerWidth() / 2;
          var margin_top = ($preview.outerHeight() / 2) + 15;
          $preview.css({
            'margin-left': '-' + margin_left.toString() + 'px',
            'margin-top': '-' + margin_top.toString() + 'px'
          });
        }, 300);
      });
    });
  }
};



/**
 * Pop Map behavior.
 */
Drupal.behaviors.sowpPopMap = {
  attach: function (context, settings) {
    $('.swp-popmap', context).once('sowpPopMap', function () {
      var $map = $(this);
      var $dots = $map.find('.dot');
      var $popups = $map.find('.dot-popup');
      var $photos = $map.find('.dot-popup-imgs-cycle');
      var $button_close = $map.find('.dot-popup-close');

      // Hide all popups function.
      var hideAllPopups = function() {
        if ($map.width() > 635) {
          $dots.removeAttr('style');
          $popups.fadeOut();
        }
      };

      // Open popup on dot click.
      $dots.each(function() {
        var $dot = $(this);
        var $button = $dot.find('.dot-button');
        var $popup = $dot.find('.dot-popup');

        $button.click(function(e) {
          e.stopPropagation();

          // Hide all popups.
          hideAllPopups();

          // Show the popup of the clicked dot.
          $dot.css('z-index', 999);

          // Setup popup position.
          var cur_popup_width = $popup.outerWidth();
          var limited_space = $dot.offset().left + cur_popup_width;

          if (limited_space > $map.width()) {
            $popup.addClass('is-right');
          }
          else {
            $popup.removeClass('is-right');
          }

          $popup.fadeIn();
        });
      });

      // Close popup on map click.
      $map.click(function() {
          hideAllPopups();
      });
      
      // Since $popups are children of $map, prevent $map click when clicking $popups.
      $popups.click(function(e) {
        e.stopPropagation();
      });

      // Close popup on .dot-popup-close click.
      $button_close.click(function() {
          hideAllPopups();
      });
      
      // Popup photos cycle.
      $photos.each(function() {
        var $slider = $(this);
        var $slides = $slider.find('ul');

        if ($slides.find('li').length > 1) {
          // Build controls.
          $slider.append('<button class="imgs-prev" title="' +
            Drupal.t('Previous image') + '">&nbsp;</button>');
          $slider.append('<button class="imgs-next" title="' +
            Drupal.t('Next image') + '">&nbsp;</button>');

          // Cycle.
          $slides.cycle({
            pauseOnHover: true,
            speed: 500,
            timeout: 0,
            fx: 'scrollHorz',
            allowWrap: false,
            slides: '> li',
            swipe: true,
            autoHeight: 'calc',
            prev: $slider.find('.imgs-prev'),
            next: $slider.find('.imgs-next')
          });
        }
      });
    });
  }
};



/**
 * Slide Tiles behavior.
 */
Drupal.behaviors.sowpDivSlider = {
  attach: function (context, settings) {
    $('.swp-divslider', context).once('sowpDivSlider', function () {
      var $slider = $(this);
      var $slides = $slider.find('> li');
      var $content = $slider.find('.divslider-content');
      var $content_alt = $slider.find('.divslider-alt-content');

      // Slides click handling.
      $slides.each(function() {
        var $slide = $(this);
        var $button = $slide.find('button');
        var bg_src = $slide.find('.divslider-bg').attr('src');
        
        $button.click(function() {
          $slides.removeClass('active').css({'background-image': 'none'});
          $slide.addClass('active').css({'background-image': 'url(' + bg_src + ')'});

          if (Drupal.sowp.viewportWidth() <= 900) {
            $('html, body').animate({
              scrollTop: $slide.offset().top - 100
            }, 1000);
          }
        });
      });
      
      // Adapt slide content width.
      var adaptWidth = function() {
        var slider_width = $slider.outerWidth();
        var collapsed_width = $slides.not('.active').eq(0).outerWidth(true);
        var content_width = slider_width - (collapsed_width * 4);
        
        $content.css({'width': content_width.toString() + 'px'});
        $content_alt.css({'width': content_width.toString() + 'px'});
      };
      
      $(window).resize(function() {
        setTimeout(function() {
          adaptWidth();
        }, 500);
      });

      setTimeout(function() {
        adaptWidth();
      }, 500);
      
      // Activate .active item on load.
      var $active = $slides.filter('.active');
      if ($active.length) {
        $active.eq(0).find('button').click();
      }
    });
  }
};



/**
 * Flip Cards behavior.
 */
Drupal.behaviors.sowpFlipCards = {
  attach: function (context, settings) {
    $('.swp-flipcards', context).once('sowpFlipCards', function () {
      var $flipcards = $(this);
      var $cards = $flipcards.find('.flip-item');
      
      $cards.each(function() {
        var $card = $(this);
        $card.click(function() {
          if ($card.hasClass('flipped')) {
            $card.removeClass('flipped');
          }
          else {
            $cards.not($card).removeClass('flipped');
            $card.addClass('flipped');
          }
        });
      });
    });
  }
};



/**
 * Masonry Tiles behavior.
 */
Drupal.behaviors.sowpMasonryTiles = {
  attach: function (context, settings) {
    $('.swp-masonry-tiles', context).once('sowpMasonryTiles', function () {
      var $wrapper = $(this);
      var $tiles = $wrapper.find('.m-tile');

      // Tiles masonry.
      var tilesMasonryInit = function() {
        $wrapper.masonry({
          itemSelector: '.m-tile',
          gutter: 0
        });
        $wrapper.masonry('reloadItems');
      };

      setTimeout(function() {
        tilesMasonryInit();
      }, 500);

      $(window).resize(function() {
        tilesMasonryInit();
      });

      // In viewport animation.
      $tiles.each(function() {
        var $tile = $(this);

        // On load animation.
        if (Drupal.sowp.deviceCheck.is768plus()) {
          $tile.addClass('m-tile-unanimated');
          
          // Check if tile is in viewport + 150 pixels.
          setTimeout(function () {
            var is_in_viewport = Drupal.sowp.elemIsVisible($tile.get(0), 0);

            if (is_in_viewport) {
              $tile.removeClass('m-tile-unanimated');
            }
          }, 1000);
        }

        // On scroll animation.
        $(document).scroll(function () {
          if (Drupal.sowp.deviceCheck.is768plus()) {
            // Check if tile is in viewport + 150 pixels.
            var is_in_viewport = Drupal.sowp.elemIsVisible($tile.get(0), 0);
            var wrapper_in_viewport = Drupal.sowp.elemIsVisible($wrapper.get(0), 0);

            if (is_in_viewport) {
              $tile.removeClass('m-tile-unanimated');
            }
            // Not in viewport - hide it so it animtes again when comes back into view.
            else {
              // Need to make sure we are already 300px away.
              if (!Drupal.sowp.elemIsVisible($wrapper.get(0), -300)) {
                $tiles.addClass('m-tile-unanimated');
              }
            }
          }
        });
      });
      
      // Make sure tiles are visible for small screens.
      var timeout;
      $(window).resize(function() {
        clearTimeout(timeout);
        timeout = setTimeout(function() {
          if (!Drupal.sowp.deviceCheck.is768plus()) {
            $tiles.removeClass('m-tile-unanimated');
          }
        }, 200);
      });
    });
  }
};



/**
 * Years Timeline behavior.
 */
Drupal.behaviors.sowpYearsTimeline = {
  attach: function (context, settings) {
    $('.swp-years', context).once('sowpMasonryTiles', function () {
      var $years = $(this);

      // Opener pieces.
      var $opener = $years.find('.swp-years-opener');
      var $start_button = $years.find('.start');

      // Info boxes.
      var $data_box_top = $years.find('.top-year-detail');
      var $data_box_bottom = $years.find('.bottom-year-detail');
      var $data_box_top_parent = $data_box_top.parent();
      var $data_box_bottom_parent = $data_box_bottom.parent();

      // Slider controls and slides (years).
      var $slider_control = $years.find('.slider-control');
      var $prev_button = $years.find('.prev-button');
      var $next_button = $years.find('.next-button');
      var $dots_list = $years.find('.year-dots');
      var $dots = $dots_list.find('li');
      var $dots_active = $dots_list.find('li.active');
      var $first_bg = $years.find('.first-slide-bg');
      var $last_bg = $years.find('.last-slide-bg');

      // Other non-jquery variables.
      var dots_list_width = 0;
      var start_position = 0;
      var current_dot = 0;
      var dots_active_acount = $dots_active.length;

      // Opener slide-off animation.
      $start_button.click(function(){
        $opener.css({
          'left': '-100%',
          'opacity': 0
        });
      });

      // Calculate the width of dots wrapper.
      $dots.each(function() {
        dots_list_width += $(this).outerWidth() + parseInt($(this).css('margin-left'));
      });

      // Function for updating dots position.
      var update_dots_position = function(action) {
        // Get active dot.
        var $dot = $dots_active.eq(current_dot);
        
        // Show/hide first and last dot bg and set gap.
        if (current_dot == 0) {
          var gap = 0;
          $first_bg.css('left', 0);
        }
        else {
          var gap = 112;
          $first_bg.css('left', '-100%');
          $last_bg.css('right', '-100%');

          if (current_dot == dots_active_acount - 1) {
            $last_bg.css('right', 0);
          }
        }
        
        // Set dots list position.
        start_position = $slider_control.outerWidth() / 2;
        $dots_list.css({
          'left': start_position - $dot.position().left - gap
        });
        
        // If user changed dot then update texts.
        if (action == 'change') {
          var dot_top_html = $dot.find('.year-top-data').html();
          var dot_bottom_html = $dot.find('.year-bottom-data').html();
          var $dot_top_icon = $dot.find('.year-top-icon');
          var $dot_bottom_icon = $dot.find('.year-bottom-icon');
          
          $data_box_top.animate({'opacity': 0}, 500, function() {
            $data_box_top.html(dot_top_html);
            $data_box_top_parent.css('height', $data_box_top.outerHeight());
            if ($dot_top_icon.length) {
              $data_box_top_parent.css('background-image', 'url(' + $dot_top_icon.attr('src') + ')');
            }
            else {
              $data_box_top_parent.css('background-image', 'none');
            }
            $data_box_top.animate({'opacity': 1}, 500);
          });

          $data_box_bottom.animate({'opacity': 0}, 500, function() {
            $data_box_bottom.html(dot_bottom_html);
            $data_box_bottom_parent.css('height', $data_box_bottom.outerHeight());
            if ($dot_bottom_icon.length) {
              $data_box_bottom_parent.css('background-image', 'url(' + $dot_bottom_icon.attr('src') + ')');
            }
            else {
              $data_box_bottom_parent.css('background-image', 'none');
            }
            $data_box_bottom.animate({'opacity': 1}, 500);
          });

          // Fade out inactive dots.
          $dots_active.removeClass('current');
          $dot.addClass('current');
        }
      };

      // Update dots position on load.
      $dots_list.css({'width': dots_list_width + 'px'}).removeClass('element-invisible');
      update_dots_position('change');

      // Update dots position on window resize.
      $(window).on('resize', function() {
        // Update center point.
        update_dots_position('resize');

        // Update height of content top and bottom.
        $('.slider-top-content-inner').find('.year-detail')
          .css('height', $('.top-year-detail').height());
        $('.slider-bottom-content-inner').find('.year-detail')
          .css('height', $('.bottom-year-detail').height());
      });

      // Handle next button click.
      $next_button.click(function(){
        if (current_dot < dots_active_acount - 1) {
          // Update current dot index.
          current_dot++;

          // Update center point.
          update_dots_position('change');

          // Deactive next button if no more dots.
          if (current_dot == (dots_active_acount - 1)) {
            $next_button.fadeOut();
          }
        }
      });

      // Handle previous button click.
      $prev_button.click(function(){
        if (current_dot > 0) {
          // Update current dot index.
          current_dot--;

          // Update center point.
          update_dots_position('change');
        }
        else {
          $opener.css({
            'left': '0',
            'opacity': 1
          });
        }

        // Activate next button if it was deactivated.
        if (current_dot < (dots_active_acount - 1)) {
          $next_button.fadeIn();
        }
      });
    });
  }
};



/**
 * Image map with tabs behaviour.
 */
Drupal.behaviors.sowpMapWithTabs = {
  attach: function (context, settings) {
    $('.swp-maptabs', context).once('sowpMapWithTabs', function () {
      var $wrapper = $(this);
      var $map = $wrapper.find('map');
      var $areas = $wrapper.find('area');
      var $img = $wrapper.find('.maptabs-map-img');
      var $tabs = $wrapper.find('.maptabs-tabs');

      $areas.click(function () {
        var this_id = $(this).attr('id');
        var tab_id = '#tab-' + this_id;
        $(tab_id).trigger('click');
        return false;
      });

      $tabs.responsiveTabs({
        startCollapsed: 'false',
        collapsible: 'false',
        activate: function (event, tab) {
          var hoverImage = $tabs.find('.r-tabs-tab').eq(tab.id).attr('data-hoverImage');
          $img.attr('src', hoverImage);
        }
      });

      setTimeout(function () {
        $map.imageMapResize();
      }, 100);
    });
  }
};



/**
 * Timeline behaviour.
 */
Drupal.behaviors.sowpTimeline = {
  attach: function (context, settings) {
    $('.swp-timeline', context).once('sowpTimeline', function () {
      // jQuery objects.
      var $wrapper = $(this);
      var $timeline_wrapper = $wrapper.find('.timeline-chart-wrapper');
      var $timeline = $wrapper.find('.timeline-chart');
      var $canvas = $wrapper.find('.timeline-canvas');
      var $canvas_width = $canvas.width();
      var $scrollbar = $wrapper.find('.timeline-scrollbar');
      // Canvas context and chart.js chart.
      var ctx = $canvas.get(0).getContext("2d");
      var chart;
      // Other vairables.
      var chart_displayed = false;
      var timeout;
      // Timeline Mobile.
      var $timeline_mobile = $wrapper.find('.timeline-mobile');
      var $timeline_mobile_img = $wrapper.find('.timeline-mobile-image');

      // Function used by chart.js to draw numbers/labels inside of points.

      var drawDatasetPointsLabels = function () {
        ctx.fillStyle = '#FFF';
        ctx.textAlign = 'center';
        $(chart.datasets).each(function (idx, dataset) {
          // First dataset is shifted off the scale line.
          // Don't write to the canvas for the null placeholder.
          $(dataset.points).each(function (pdx, pointinfo) {
            if (pointinfo.value !== null) {
              ctx.fillText(pointinfo.value, pointinfo.x, pointinfo.y + 8);
            }
          });
        });
      };

      // Prepare chart data.

      var chart_datas = [
        [33, 40, 36, 60, 35, 17, 2, 7],
        [124, 115, 122, 121, 118, 124, 116, 60]
      ];

      var chart_data = {
        labels: ["2007", "2008", "2009", "2010", "2011", "2012", "2013", "2014"],
        datasets: [
          {
            label: "Conflicts",
            data: [0, 0, 0, 0, 0, 0, 0, 0],
            // Colors.
            fillColor: "rgba(255,255,255,0)",
            strokeColor: "rgba(169,94,165,1)",
            pointColor: "rgba(169,94,165,1)",
            pointStrokeColor: "rgba(169,94,165,1)"
          },
          {
            label: "Disasters",
            data: [0, 0, 0, 0, 0, 0, 0, 0],
            // Colors.
            fillColor: "rgba(255,255,255,0)",
            strokeColor: "rgba(90,163,214,1)",
            pointColor: "rgba(90,163,214,1)",
            pointStrokeColor: "rgba(90,163,214,1)"
          }
        ]
      };

      // Prepare chart options.

      var chart_options = {
        responsive: false,
        showTooltips: false,
        showScale: false,
        scaleShowHorizontalLines: false,
        bezierCurve: false,
        scaleFontSize: 22,
        //scaleFontFamily: "unfpasemibold, sans-serif",
        scaleFontFamily: "RobotoSemibold, sans-serif",
        datasetStrokeWidth: 3,
        pointDotRadius: 25,
        pointDotStrokeWidth: 1,
        onAnimationProgress: function () {
          drawDatasetPointsLabels()
        },
        onAnimationComplete: function () {
          drawDatasetPointsLabels();
        }
      };

      // Create and animate timeline chart on load (if in viewport).

      setTimeout(function () {
        var is_in_viewport = Drupal.sowp.elemIsVisible($timeline.get(0), 150);
        if (is_in_viewport) {
          chart = new Chart(ctx).Line(chart_data, chart_options);
          chart_displayed = true;

          setTimeout(function () {
            updateChart(0);
          }, 1000);
        }
      }, 200);

      // Create+animate / remove timeline chart on scroll (if in viewport).

      $(document).scroll(function () {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
          // Check if timeline chart is in viewport + 150 pixels.
          var is_in_viewport = Drupal.sowp.elemIsVisible($timeline.get(0), 150);

          if (is_in_viewport && !chart_displayed) {
            chart = new Chart(ctx).Line(chart_data, chart_options);
            chart_displayed = true;

            setTimeout(function () {
              updateChart(0);
            }, 1000);
          }
          // Not in viewport - remove chart it so it animtes again when comes back into view.
          else if (!is_in_viewport && chart_displayed) {
            if (!Drupal.sowp.elemIsVisible($timeline.get(0), -300)) {
              $canvas.remove();
              $timeline.append('<canvas class="timeline-canvas" height="429" width="1970"></canvas>');
              $canvas = $wrapper.find('.timeline-canvas');
              ctx = $canvas.get(0).getContext("2d");
              chart_displayed = false;
            }
          }
        }, 200);
      });


      // Current percent gap.

      var curPercentGap = 0;

      // Update chart on window resize.

      $(window).resize(function () {
        clearTimeout(timeout);
        timeout = setTimeout(function () {
          updateChart(curPercentGap);
        }, 200);
      });

      // Update Chart so it animates on scrolling etc.

      var updateChart = function (gap_percent) {
        if (typeof chart !== 'undefined') {
          var $data_length = chart.datasets.length;
        } else {
          var $data_length = 2;
        }
        var $gap_between_circles = 275;
        var $gap = $timeline.width() - $timeline_wrapper.width();
        var $px_per_percent = $gap / 100;
        var $minus_gap = gap_percent * $px_per_percent;
        $timeline.css('left', -$minus_gap + 'px');
        var $timeline_wrapper_width = $timeline_wrapper.width();

        var $lastVisibleCircle = Math.floor(($minus_gap + $timeline_wrapper_width - 24) / $gap_between_circles);

        var $curCircleIndex = $lastVisibleCircle + 1;

        for (var i = 0; i < $data_length; i++) {
          if (typeof chart !== 'undefined') {
            var $total_circle = chart.datasets[i].points.length;
          } else {
            var $total_circle = 8;
          }
          for (var j = 0; j < $total_circle; j++) {
            if (j >= $curCircleIndex) {
              chart.datasets[i].points[j].value = 0;
            } else {
              chart.datasets[i].points[j].value = chart_datas[i][j];
            }
          }
        }

        if (typeof chart !== 'undefined') {
          chart.update();
        }
      };

      var updateChartMobile = function (gap_percent) {
        var $gap = $timeline_mobile_img.width() - $timeline_mobile.width();
        var $px_per_percent = $gap / 100;
        var $minus_gap = gap_percent * $px_per_percent;
        $timeline_mobile_img.css('left', -$minus_gap + 'px');
      };

      // Timeline sliding.

      $scrollbar.slider({
        range: 'max',
        min: 0,
        max: 100,
        value: 0,
        slide: function (event, ui) {
          curPercentGap = ui.value;
          updateChart(curPercentGap);
          updateChartMobile(curPercentGap);
        }
      });
    });
  }
};



})(jQuery);
