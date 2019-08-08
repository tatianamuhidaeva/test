'use strict';
window.addEventListener('DOMContentLoaded', function () {

  function maskTel(selector, mask, placeholder) {
    const XCHAR = "x";

    let tels = document.querySelectorAll(selector);
    tels.forEach(tel => {
      const placeholderDef = tel.placeholder;

      function autoInsert(mask, pos) {
        for (let i = pos; i < mask.length; i++) {
          if (mask[i] != XCHAR) {
            tel.value += mask[i];
          } else {
            break;
          }
        }
      }

      if (placeholder) {
        tel.setAttribute('placeholder', mask.replace(new RegExp(XCHAR, 'g'), '_'));
      }

      tel.addEventListener('keypress', function (e) {
        let place = tel.value.length;
        autoInsert(mask, place);
        place = tel.value.length;
        if ((e.key != mask[place] && mask[place] != XCHAR) ||
          (mask[place] == XCHAR && e.key.match(/\D/))) {
          e.preventDefault();
        }
      });

      tel.addEventListener('focusin', function (e) {
        tel.setAttribute('placeholder', mask.replace(new RegExp(XCHAR, 'g'), '_'));
      });
      tel.addEventListener('focusout', function (e) {
        tel.setAttribute('placeholder', placeholderDef);
      });
    });
  }

  maskTel('input[type="tel"]', '+7 (xxx) xxx xx xx', false);
});