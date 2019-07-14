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

    breakpoints: {
      1366: {
        slidesPerView: 3,
        spaceBetween: 1,
        navigation: {
          prevEl: '.way-one__arrow-prev',
          nextEl: '.way-one__arrow-next',
        }
      },
      992: {
        slidesPerView: 2,
        spaceBetween: 1,
        navigation: {
          prevEl: '.way-one__arrow-prev',
          nextEl: '.way-one__arrow-next',
        }
      },
      576: {
        slidesPerView: 1,
        spaceBetween: 1,
        navigation: {
          prevEl: '.way-one__arrow-prev',
          nextEl: '.way-one__arrow-next',
        }
      }
    }
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