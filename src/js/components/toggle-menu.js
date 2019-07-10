window.addEventListener('DOMContentLoaded', function () {
  'use strict'
  // -----Control Toggle Menu----
  let body = document.querySelector('body'),
    menu = document.querySelector('.header__nav-items'),
    btnToggle = document.querySelector('.header__nav-hamburger');

  function openMenu() {
    menu.classList.remove('d-none-md');
    menu.classList.add('animated');
    menu.classList.add('fadeIn');
  }

  function closeMenu() {
    // menu.style.opacity = "0";
    menu.classList.add('fadeOut');
    
    setTimeout(menu.classList.remove('d-none-md'), 400 );
    menu.classList.add('animated');

  }

  btnToggle.addEventListener('click', function () {
    if (menu.classList.contains('d-none-md')) {
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