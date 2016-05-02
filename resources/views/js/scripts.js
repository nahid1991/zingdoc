
/*----------------------------------*/
/*      Adding Caresoul
/*----------------------------------*/
$(document).ready(function(){
  $('.tabs-slide').bxSlider({
    slideWidth:323,
    moveSlides: 1,
    minSlides: 1,
    maxSlides: 4,
    pager: false,
    controls: true,
    slideMargin: 0
  });
});

/*----------------------------------*/
/*      Adding doctor img caresoul
/*----------------------------------*/
$(document).ready(function(){
  $('.doctor-profile-caresoul').bxSlider({
    slideWidth:210,
    moveSlides: 1,
    minSlides: 1,
    maxSlides: 4,
    pager: false,
    controls: true,
    slideMargin: 13
  });
});

/*----------------------------------*/
/*      Adding Entity Dashboard caresoul
/*----------------------------------*/
$(document).ready(function(){
  $('.entity-dashborad-caresoul').bxSlider({
    slideWidth:222,
    moveSlides: 1,
    minSlides: 1,
    maxSlides: 4,
    pager: false,
    controls: true,
    slideMargin:4
  });
});


/*----------------------------------*/
/*      Adding classes to lists
/*----------------------------------*/

$(document).ready(function() {      
    $("ul li:first-child").addClass("first-child");
    $("ul li:last-child").addClass("last-child");
}); 

/*----------------------------------*/
/*      prettyPhoto plugin
/*----------------------------------*/

$(document).ready(function(){
    $("a[data-rel^='prettyPhoto']").prettyPhoto({
        deeplinking:false,
        default_width: 600,
        default_height: 400,
        overlay_gallery: false
    });

    $("a[data-rel^='gallery']").prettyPhoto({
        deeplinking:false,
        overlay_gallery: false
    });
});

/*----------------------------------*/
/*         Image overlay
/*----------------------------------*/

$(document).ready(function(){
    $('.image-overlay a').hover(function () {
            $(this).find('.image-overlay-bg').stop(true, true).animate({opacity: 0.6}, 300 );
        }, function () {
            $(this).find('.image-overlay-bg').stop(true, true).animate({opacity: 0}, 300 );
        }
    );
    $('.video-overlay a').hover(function () {
            $(this).find('.video-overlay-bg').stop(true, true).animate({opacity: 0.6}, 300 );
        }, function () {
            $(this).find('.video-overlay-bg').stop(true, true).animate({opacity: 0}, 300 );
        }
    );
    $('.audio-overlay a').hover(function () {
            $(this).find('.audio-overlay-bg').stop(true, true).animate({opacity: 0.6}, 300 );
        }, function () {
            $(this).find('.audio-overlay-bg').stop(true, true).animate({opacity: 0}, 300 );
        }
    );
    $('.link-overlay a').hover(function () {
            $(this).find('.link-overlay-bg').stop(true, true).animate({opacity: 0.6}, 300 );
        }, function () {
            $(this).find('.link-overlay-bg').stop(true, true).animate({opacity: 0}, 300 );
        }
    );
    $('.gallery-overlay a').hover(function () {
            $(this).find('.gallery-overlay-bg').stop(true, true).animate({opacity: 0.6}, 300 );
        }, function () {
            $(this).find('.gallery-overlay-bg').stop(true, true).animate({opacity: 0}, 300 );
        }
    );

    /* Overlay Append */    
    $(".image-overlay a[data-rel^='gallery']").append("<span class='image-overlay-bg'></span>");
    $(".video-overlay a[data-rel^='gallery']").append("<span class='video-overlay-bg'></span>");
    $(".audio-overlay a[data-rel^='gallery']").append("<span class='audio-overlay-bg'></span>");
    $(".link-overlay a[data-rel^='gallery']").append("<span class='link-overlay-bg'></span>");
    $(".gallery-overlay a[data-rel^='gallery']").append("<span class='gallery-overlay-bg'></span>");
});


