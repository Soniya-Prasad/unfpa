/**
* @file
* Image preloading and loading bar support (SOWP 2016).
*/
(function ($) {



/**
 * Initialize Drupal.sowp object if it doesn't exist.
 */
Drupal.sowp = Drupal.sowp || {};



/**
 * Preloads images and then calls specified callback function.
 */
Drupal.sowp.preloadImages = function(images, callback) {
  var checklist = images.length;
  var count = checklist;
  var url = location.href;
  var hash = url.split('#!/');
  
  // Function to call upon single image load (or fail to retrieve image).
  var react = function() {
    checklist--;

    // Progress indicator handling.
    var percent = Math.floor((count - checklist) / count * 100);

    // Progress bar.
    $('.swp-loading-bar-inner').css({'width': percent + '%'});

    // Percent display.
    $('.swp-loading-count').text(percent + '%');

    // Background fading from opacity 1 to 0.666.
    var opacity = 1 - (percent / 100) / 3;
    $('.swp-loading').css({'background': 'rgba(0, 0, 0,' + opacity + ')'});

    // Keep scrolling on top (if no url hash).
    if (hash[1] == undefined) {
      window.scrollTo(0, 0);
    }

    // If we are done with preloading.
    if (checklist == 0) {
      callback();
    }
  };
  
  $.each(images, function() {
    $('<img>')
      .load(function() {
        react();
      })
      .error(function() {
        react();
      })
      .attr({src: this});
  });
};



/**
 * Prepare preloader.
 */
Drupal.sowp.preloaderPrepare = function () {
  //Create loading HTML element.
  var logopath = Drupal.settings.sowp.modulePath + '/images/2016/loading-logo.png';
  
  var $preloader = $(
    '<div class="swp-loading"><div class="swp-loading-inner"><div class="swp-loading-content">' +

    '<span class="swp-loading-logo"><img src="' + logopath + '" alt="" /></span>' +

    '<span class="swp-loading-bar"><span class="swp-loading-bar-inner">' +
    '<span class="swp-loading-bar-piece piece-1 girl-color-1"></span>' +
    '<span class="swp-loading-bar-piece piece-2 girl-color-2"></span>' +
    '<span class="swp-loading-bar-piece piece-3 girl-color-3"></span>' +
    '<span class="swp-loading-bar-piece piece-4 girl-color-4"></span>' +
    '<span class="swp-loading-bar-piece piece-5 girl-color-5"></span>' +
    '<span class="swp-loading-bar-piece piece-6 girl-color-6"></span>' +
    '<span class="swp-loading-bar-piece piece-7 girl-color-7"></span>' +
    '<span class="swp-loading-bar-piece piece-8 girl-color-8"></span>' +
    '<span class="swp-loading-bar-piece piece-9 girl-color-9"></span>' +
    '<span class="swp-loading-bar-piece piece-10 girl-color-10"></span>' +
    '</span></span>' +

    '<span class="swp-loading-count">0%</span>' +

    '</div></div></div>'
  );
  
  $('body').prepend($preloader);
};



/**
 * Preload required images.
 */
Drupal.sowp.preloaderPreload = function () {
  //Define CSS background images to preload.
  var path = Drupal.settings.sowp.modulePath + '/images/';

  var images = [
    path + '2016/intro-cover.jpg',
    path + '2016/intro-im10.jpg',
    path + '2016/intro-challenges.jpg',
    path + '2016/intro-opportunities.jpg',
    path + '2016/intro-potential.jpg',
    path + '2016/intro-future.jpg',
    path + '2016/intro-data.jpg'
  ];

  //In addition to CSS images preload some of our actual images
  $('img').each(function() {
    var src = $(this).attr('src');
    images.push(src);
  });

  Drupal.sowp.preloadImages(images, Drupal.sowp.preloaderFinished);
};



/**
 * Callback to run after images loaded.
 */
Drupal.sowp.preloaderFinished = function () {
  setTimeout(function() {
    $('.swp-loading').fadeOut('slow');
  }, 500);
};
  


/**
 * Prepare preloader right away, without using Drupal behaviours.
 */
Drupal.sowp.preloaderPrepare();



/**
 * Launch preloader on DOM ready, without using Drupal behaviours.
 */
$(document).ready(function() {
  Drupal.sowp.preloaderPreload();
});



})(jQuery);
