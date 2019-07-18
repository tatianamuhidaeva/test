'use strict'
window.addEventListener('DOMContentLoaded', function () {

  var stepsSwiper = new Swiper('#ways-slider', {
    slidesPerView: 3,
    slidesPerGroup: 1,
    loop: true,
    // spaceBetween: 30,
    navigation: {
      prevEl: '.ways__arrow-prev',
      nextEl: '.ways__arrow-next',
    },
    slideActiveClass: 'ways-slide--active',
    centeredSlides: true,
    speed: 500,
    breakpoints: {
      992: {
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 1,
        pagination: {
          el: '.ways__pagination',
          type: 'bullets',
          clickable: true
        }
      }
    }
  });

  var waysOneSwiper = new Swiper('#way-one-slider', {
    // init: false,
    slidesPerView: 4,
    loop: true,
    // spaceBetween: 18,

    navigation: {
      prevEl: '.way-one__arrow-prev',
      nextEl: '.way-one__arrow-next',
    },
    breakpoints: {
      1366: {
        slidesPerView: 3,
        spaceBetween: 1
      },
      992: {
        slidesPerView: 2,
        spaceBetween: 1
      },
      576: {
        slidesPerView: 1,
        spaceBetween: 1
      }
    }
  });
  var reviewsSwiper = new Swiper('#reviews-slider', {
    slidesPerView: 1,
    loop: true,
    spaceBetween: 5,
    pagination: {
      el: '.reviews__pagination',
      clickable: true
    },
    navigation: {
      prevEl: '.reviews__arrow-prev',
      nextEl: '.reviews__arrow-next',
    
    }
  });
  var galleryThumbsSwiper = new Swiper('#gallery-thumbs-slider', {
    spaceBetween: 17,
    slidesPerView: 4,
    loop: true,
    loopedSlides: 5, //looped slides should be the same
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    navigation: {
      prevEl: '.gallery-thumbs__arrow-prev',
      nextEl: '.gallery-thumbs__arrow-next',
    
    },
    breakpoints: {
      576: {
        slidesPerView: 3
        // spaceBetween: 1
      },
      450: {
        slidesPerView: 3,
        spaceBetween: 7,
      }
    }
  });
  var galleryTopSwiper = new Swiper('#gallery-top-slider', {
    slidesPerView: 1,
    loop: true,
    // spaceBetween: 10,
    loopedSlides: 5, //looped slides should be the same

    thumbs: {
      swiper: galleryThumbsSwiper,
    }
  });
  var gameSwiper = new Swiper('#game-slider', {
    slidesPerView: 1,
    allowTouchMove: false,
    effect: 'fade',
    pagination: {
      el: '.game__pagination',
      clickable: true //нужно убрать
    },
  });

  // if (window.innerWidth <= 992) {
  //   waysOneSwiper.init();
  // }


  // window.addEventListener('resize', function () {
  //   if (this.innerWidth <= 992) {
  //     waysOneSwiper.init();
  //   } else {
  //     waysOneSwiper.destroy();
  //   }
  // })

});