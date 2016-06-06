jQuery(function($){
'use strict';
  // (function () {
  //   $(window).load(function() {
  //     $('#pre-status').fadeOut();
  //     $('#st-preloader').delay(350).fadeOut('slow');
  //   });
  // }());
  (function () {
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('.scroll-up').fadeIn();
      } else {
        $('.scroll-up').fadeOut();
      }
    });
    $('.scroll-up a').click(function(){
      $('html, body').animate({scrollTop : 0},800);
      return false;
    });
  }());

  (function () {
    $('#header .menu').slicknav({
      prependTo:'.menu-mobile',
      label:''
    })
  }());

  (function () {
      $(".wpb_wrapper").fitVids();
      $(".entry-content").fitVids();
      $(".entry-video").fitVids();
  }());
});
