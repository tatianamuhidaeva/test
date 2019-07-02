
//   $('#btn-menu-mob').click(function(e) {
//       e.preventDefault();
//       $('.header__svg-mob').addClass('is-active');

//       $('#menu-mobile').animate({ 
//         right: '0px' 
//         }, 300);
//       $('#menu-mobile').animate({ 
//         right: '0px' 
//         }, 300);
//     $('body').css('overflow', 'hidden');
//     $('.page').animate({ 
//         right: '190px' 
//     }, 200); 
// });

// $('.menu-mobile__svg-close').click(function(e) {
//     e.preventDefault();
//     $('.header__svg-mob').removeClass('is-active');
//     $('#menu-mobile').animate({ 
//       right: '-207px' 
//   }, 300);
//   $('body').css('overflow', 'auto');
//   $('.page').animate({ 
//       right: '0px' 
//   }, 200); 
// });

  $('#btn-menu-mob').click(function(e) {
    e.preventDefault();
    $('.header__svg-mob').toggleClass('is-active');
    $('#menu-mobile').toggleClass('is-show') ;
    $('body').toggleClass('is-hidden');
    $('.page').toggleClass('is-active'); 
    $('.nav-mobile__submenu').toggleClass('is-active', false); 
    $('.nav-mobile__link').toggleClass('is-active', false);
});

$('.menu-mobile__close').click(function(e) {
    e.preventDefault();
    $('.header__svg-mob').toggleClass('is-active', false);
    $('#menu-mobile').toggleClass('is-show', false) ;
    $('body').toggleClass('is-hidden', false);
    $('.page').toggleClass('is-active', false); 
    $('.nav-mobile__submenu').toggleClass('is-active', false); 
    $('.nav-mobile__link').toggleClass('is-active', false);
});

// scrollbar

$(function() {
  $(".special__scroll-double").scroll(function() {
    $(".special__scroll-wrapper").scrollLeft($(".special__scroll-double").scrollLeft());
  });
  $(".special__scroll-wrapper").scroll(function() {
    $(".special__scroll-double").scrollLeft($(".special__scroll-wrapper").scrollLeft());
  });
});

// меню
$(function () {
 
  $(window).scroll(function(event) {
      if($(this).scrollTop() > 150) {
      // $(".float__nav").fadeIn();
      $(".float__nav").addClass('is-show')
  }
  else {
      $(".float__nav").removeClass('is-show')
  }
  });

});