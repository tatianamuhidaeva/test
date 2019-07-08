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

 
});