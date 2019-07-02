// header-swiper
var swiper = new Swiper('#main-swiper', {
  fadeEffect: {
    crossFade: true
  },
  navigation: {
    nextEl: '.swiper-button-next--header',
    prevEl: '.swiper-button-prev--header',
  },
  pagination: {
    el: '.swiper-pagination',
    type: 'bullets',
    clickable: true,
  },
  loop: true,
  // autoplay: {
  //   delay: 2300,
  // },
  fadeEffect: {
    crossFade: true
  },
  speed: 800,
  watchSlidesProgress: true,
  watchVisibility: true,
  disableOnInteraction: true,
});


  $('#form-open').click(function() {
    $('.sidebar__svg--arrow').toggleClass('is-rotate');
    $('#form-reserve').toggleClass('is-show');
  });

  // главный слайдер
  $('.main__btn').click(function() {
    $('.swiper-slide__wrapper').toggleClass('is-active');
    $('.main__btn').toggleClass('is-active');
    $('.special__select-link').toggleClass('is-active');
    $('.main__svg').toggleClass('is-rotate');
    $('.special__wrapper').toggleClass('is-active');
  });

  $('.btn-season').click(function() {
    $('.swiper-slide__wrapper').toggleClass('is-active');
    $('.special__svg').toggleClass('is-rotate');
    $('.main__btn').toggleClass('is-active');
    $('.special__select-link').toggleClass('is-active');
    $('.special__wrapper').toggleClass('is-active');
  });

  $('.nav-mobile__item').click(function() {
    $(this).children('.nav-mobile__submenu').toggleClass('is-active');
    $(this).children('.nav-mobile__link').toggleClass('is-active');
  });

// more swiper
  var swiper = new Swiper('#slider-more', {
    fadeEffect: {
      crossFade: true
    },
    navigation: {
      nextEl: '.swiper-button-next--more',
      prevEl: '.swiper-button-prev--more',
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'fraction',
      renderFraction: function (currentClass, totalClass) {
        return '<span class="uppercase">фото</span> ' + '<span class=" ' + currentClass + '"> </span>' +
               '<span >из</span> ' +
               '<span class="' + totalClass + '"></span>';
    },
    },

    loop: true,
    autoplay: {
      delay: 2300,
    },
    speed: 600,
    fadeEffect: {
      crossFade: true
    },
  });