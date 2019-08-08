'use strict'
window.addEventListener('DOMContentLoaded', function () {

  var stepsSwiper = new Swiper('#ways-ind-slider', {
    slidesPerView: 3,
    slidesPerGroup: 1,
    loop: true,
    // spaceBetween: 30,
    navigation: {
      prevEl: '.ways-ind__arrow-prev',
      nextEl: '.ways-ind__arrow-next',
    },
    slideActiveClass: 'ways-ind-slide--active',
    centeredSlides: true,
    speed: 500,
    breakpoints: {
      992: {
        slidesPerView: 1,
        slidesPerGroup: 1,
        spaceBetween: 1,
        pagination: {
          el: '.ways-ind__pagination',
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
    spaceBetween: 4,
    pagination: {
      el: '.reviews__pagination',
      clickable: true
    },
    navigation: {
      prevEl: '.reviews__arrow-prev',
      nextEl: '.reviews__arrow-next',

    }
  });


  // let galleryThumbsSlider = document.querySelectorAll('gallery-thumbs-slider-container');

  let topSliders = document.querySelectorAll('.gallery-top-slider');
  let thumbsSliders = document.querySelectorAll('.gallery-thumbs-slider');
  let $i = 0;
  thumbsSliders.forEach(thumbsSlider => {
    $i++;
    let thumbsSliderContainer = thumbsSlider.querySelector('#gallery-thumbs-slider');
    thumbsSliderContainer.id = thumbsSliderContainer.id + "-" + $i;

    let thumbsSlides = thumbsSlider.querySelectorAll('.gallery-thumbs-slide');
    let slidesPerViewThumbs = 4;
    if (thumbsSlides.length < 4) {
      slidesPerViewThumbs = thumbsSlides.length;
    }
    let slideW = parseInt(getComputedStyle(thumbsSlides[0]).width);
    let paddings = parseInt(getComputedStyle(thumbsSlider).paddingLeft);
    thumbsSlider.style.width = (slideW * slidesPerViewThumbs + 17 * (slidesPerViewThumbs - 1) + 2 * paddings) + "px";

    var galleryThumbsSwiper = new Swiper("#" + thumbsSliderContainer.id, {
      spaceBetween: 17,
      slidesPerView: slidesPerViewThumbs,
      loop: true,
      loopedSlides: 4, //looped slides should be the same
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      // navigation: {
      //   prevEl: '.gallery-thumbs__arrow-prev',
      //   nextEl: '.gallery-thumbs__arrow-next',
      // },
      breakpoints: {
        450: {
          spaceBetween: 7
        }
      }
    });

    let topSliderContainer = topSliders[$i - 1].querySelector('#gallery-top-slider');
    topSliderContainer.id = topSliderContainer.id + "-" + $i;

    var galleryTopSwiper = new Swiper("#" + topSliderContainer.id, {
      slidesPerView: 1,
      loop: true,
      loopedSlides: 5, //looped slides should be the same
      navigation: {
        prevEl: '.gallery-thumbs__arrow-prev',
        nextEl: '.gallery-thumbs__arrow-next',
      },
      thumbs: {
        swiper: galleryThumbsSwiper,
      }
    });
  });
});