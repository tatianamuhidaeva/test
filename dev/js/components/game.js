'use strict'
window.addEventListener('DOMContentLoaded', function () {

  let form = document.getElementById('game-form');

  var gameSwiper = new Swiper('#game-slider', {
    slidesPerView: 1,
    allowTouchMove: false,
    // effect: 'fade',
    pagination: {
      el: '.game__pagination',
      // clickable: true //нужно убрать
    },
  });

  let gameSlides = document.querySelectorAll('.game-slide');
  gameSlides.forEach(gameSlide => {
    let radios = gameSlide.querySelectorAll('input[type="radio"]');
    radios.forEach(radio => {
      radio.addEventListener('change', function () {
        if (gameSlide != gameSlides[gameSlides.length - 1]){
          setTimeout(
            function(){gameSwiper.slideNext()},
            500
          );
        } else {
          form.submit();
        }
      })
    })
  });


 

});