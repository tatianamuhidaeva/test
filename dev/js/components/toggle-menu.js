'use strict'
window.addEventListener('DOMContentLoaded', function () {
  // -----Control Toggle Menu----
  let body = document.querySelector('body'),
    menu = document.querySelector('.header__nav'),
    btnToggle = document.querySelector('.header__hamburger');

  function openMenu() {
    // menu.classList.remove('d-none-md');
    btnToggle.classList.add('active');
    menu.classList.add('open');
  }

  function closeMenu() {
    // menu.style.opacity = "0";
    // menu.classList.add('fadeOut');
    
    // setTimeout(menu.classList.remove('d-none-md'), 400 );
    // menu.classList.add('animated');

    btnToggle.classList.remove('active');
    menu.classList.remove('open');

  }

  btnToggle.addEventListener('click', function () {
    if (!btnToggle.classList.contains('active')) {
      openMenu();
    } else {
      closeMenu();
    }

  });

  // window.addEventListener('resize', function () {
  //   if (window.innerWidth > 660) {
  //     //Remove transform property from menu
  //     menu.style.transform = "";
  //   }
  // });

});