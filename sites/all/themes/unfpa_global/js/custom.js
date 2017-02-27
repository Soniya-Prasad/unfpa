(function ($) {
    $(document).ready(function () {
        $('.videos-home-list .views-row').hide();
        $('.videos-home-list .views-row-1').show();

        $('.videos-home-sub-list .views-row').show();
        $('.videos-home-sub-list .views-row-1').hide();
        //var i=1;
        var divCnt = 1;
        $('.videos-home-sub-list .views-row').each(function () {
            // For First Time Page load put default Divider
            if ($(this).is(":visible"))
            {
                if (divCnt % 2 == 0)
                {
                    $(this).after('<div class="divider-video"></div>');
                }
                divCnt = divCnt + 1;
            }
            //i = i+1;
            // For First Time Page load put default Divider - Ends

            $(this).click(function () {
                var itemId = $(this).attr('id');
                //console.log(itemId);
                $('.videos-home-list .views-row').hide();
                $('.videos-home-list .views-row').each(function () {
                    currVideoId = $(this).attr("id");
                    //alert(itemId+"----"+currVideoId);
                    if (itemId != currVideoId)
                    {
                        var video = $(this).find('iframe');
                        var src = video.attr("src");
                        video.attr("src", "");
                        video.attr("src", src);
                    }
                });

                $('.videos-home-list .' + itemId).fadeIn();
                $('.videos-home-sub-list .views-row').show();
                $(this).hide();
                responsiveVideo();
                // Put Divider based on the click arrangement of videos
                $(".divider-video").remove();
                //var i=1;
                var divCnt = 1;
                $('.videos-home-sub-list .views-row').each(function () {
                    if ($(this).is(":visible"))
                    {
                        if (divCnt % 2 == 0)
                        {
                            $(this).after('<div class="divider-video"></div>');
                        }
                        divCnt = divCnt + 1;
                    }
                    //i = i+1;
                });
            });
        });
//]]>

//For twitter share


        if ($('.st_twitter_custom').length > 0) {

            var res = $("span.st_twitter_custom").attr("via");
            if (res === undefined || res === "")
                res = "UNFPA";
            $(".st_twitter_custom").attr("st_via", res);

        }
        // if ($('.social .st_twitter_custom').length === 0) {
        //$(".social .st_twitter_custom").attr("st_via", "UNFPA");

        //}


        $('body').on('click', '#actvity-selector .select-activity', function () {
            $('#activities-wrapper').slideToggle(function () {
//            $('#custom-data-portal-form .form-submit').toggle();
            });
        });

        $('body').on('click', '#select-all', function () {
            $('#activities-wrapper input[type="checkbox"]').prop('checked', true);
        });

        $('body').on('click', '#remove-all', function () {
            $('#activities-wrapper input[type="checkbox"]').prop('checked', false);
        });

        if ($('.slideshow-image').length > 0) {
            $('.slideshow-image').prepend('<span class="slideshow-image-overlay"></span>');
            $('body').append('<div id="image-slideshow"></div>');
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

                    $('#image-slideshow .flexslider .slides img').load(function () {
                        responsiveSlideshow();
                    });
                }
                // Might want to use 'ui' instead of jQuery('#slider').
                //data: 'slider_value=' + jQuery('#slider').slider('values', 0);
            });

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
        var win_height = $(window).height();
        $('#image-slideshow .flexslider .slides img').each(function () {
            $(this).css({width: 'auto', height: 'auto'});

            if (win_height <= 768) {
                if ($(this).height() > win_height - 100) {
                    $(this).height(win_height - 100);
                }
            }
            else {
                if ($(this).height() > win_height - 300) {
                    $(this).height(win_height - 300);
                }
            }
        });
        //var slide_height = $('#image-slideshow .flexslider .slides').height();
        $('#image-slideshow .flexslider .slides li').each(function () {
            var $caption = $(this).children('.views-field-field-slide-caption');
            var caption_height = $caption.outerHeight();
            if (win_height <= 768) {
                if (win_height - 100 - $(this).height() > caption_height) {
                    $caption.css({bottom: -caption_height});
                }
                else {
                    $caption.css({bottom: $(this).height() - win_height + 100});
                }
            }
            else {
                if (win_height - 300 - $(this).height() > caption_height) {
                    $caption.css({bottom: -caption_height});
                }
                else {
                    $caption.css({bottom: $(this).height() - win_height + 300});
                }
            }

        });
    }

//$(document).ready(function(){
///* Search Control */
//	$("input[name='search_block_form']").val('Search');
//
//	$("input[name='search_block_form']").focus(function () {
//		if ($(this).val() == "Search") {
//			$(this).val("");
//		}
//		$(this).css('text-align', 'left');
//	});
//	$("input[name='search_block_form']").blur(function () {
//		if ($(this).val() == "") {
//			$(this).val("Search");
//		}
//	});
//});
})(jQuery);
