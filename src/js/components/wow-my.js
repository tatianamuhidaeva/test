// window.addEventListener('DOMContentLoaded', function () {
//   'use strict'
//   const DUR = 'data-wow-duration',
//   DELAY = 'data-wow-delay';
//   let waysBlock = document.querySelector('section.ways'),
//       partnersBlock = document.querySelector('section.partners');

//   let waysBlockBottom = waysBlock.getBoundingClientRect().top + window.pageYOffset;

//   window.addEventListener('scroll', function(){
//     if(window.pageYOffset < waysBlockBottom) {
//       let slide = waysBlock.querySelector('.ways-slide');
//       slide.classList.add('fadeIn');
//       slide.style.animationDuration = slide.getAttribute('DUR')
//       slide.style.animationDelay = slide.getAttribute('DELAY')
//     }
//   });

//   // window.onscroll = function() {
//   //   if (avatarElem.classList.contains('fixed') && window.pageYOffset < avatarSourceBottom) {
//   //     avatarElem.classList.remove('fixed');
//   //   } else if (window.pageYOffset > avatarSourceBottom) {
//   //     avatarElem.classList.add('fixed');
//   //   }
//   // };
// });