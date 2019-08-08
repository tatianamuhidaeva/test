'use strict';
window.addEventListener('DOMContentLoaded', function () {

  let body = document.querySelector('body');


  function popupControl(popup, close, btns) {

    function parentsOfElements(elem, cl) {
      let curr = elem;
      while (curr != null) {
        if (curr.classList.contains(cl)) {
          return true;
        }
        curr = curr.parentElement;
      }
      return false;
    }

    close.addEventListener('click', function () {
      popup.classList.remove('d-flex');
      popup.style.opacity = "0";
      body.style.overflow = "";
    });

    popup.addEventListener("click", function (e) {
      if (!parentsOfElements(e.target, "popup-wrap") &&
        !e.target.classList.contains("popup__close")) {
        popup.classList.remove('d-flex');
        popup.style.opacity = "0";
        body.style.overflow = "";
      }
    });

    btns.forEach(btn => {
      btn.addEventListener('click', function () {
        popup.classList.add('d-flex');
        body.style.overflow = "hidden";
        setTimeout(function () {
          popup.style.opacity = "1";
        }, 200)
      });
    });
  }

  let orderBtns = document.querySelectorAll('.btn-order');
  let popupOrder = document.querySelector('#popup-order');
  if ((popupOrder != null) && (popupOrder != "")) {
    let closeOrder = popupOrder.querySelector('.popup-order__close');

    popupControl(popupOrder, closeOrder, orderBtns);
  }

  let requestBtns = document.querySelectorAll('.btn-request');
  let popupRequest = document.querySelector('#popup-request');
  if ((popupRequest != null) && (popupRequest != "")) {
    let closeRequest = popupRequest.querySelector('.popup-request__close');
    popupControl(popupRequest, closeRequest, requestBtns);
  }

  let successBtns = document.querySelectorAll('.btn-success');
  let popupSuccess = document.querySelector('#popup-success');
  if ((popupSuccess != null) && (popupSuccess != "")) {
    let closeSuccess = popupSuccess.querySelector('.popup-success__close');
    popupControl(popupSuccess, closeSuccess, successBtns);
  }

});