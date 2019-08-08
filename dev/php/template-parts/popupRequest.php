
<div class="popup-overlay" id="popup-request">
  <div class="popup-wrap">
  <div class="popup__logo">
              <svg class="popup__logo-svg">
                <use xlink:href="#logo" />
              </svg>
            </div>
  <div class="popup__request-wrapper  popup-wrapper">
  <div class="popup__close popup-request__close">&#10006;</div>
    <h2 class="popup__request-title popup__title">Заявка на тур</h2>
    <form class="popup__request-form bid__form">
      <input type="tel" class="popup__request-input input" id="request_phone" name="phone" placeholder="Ваш телефон" required>
  <textarea class="popup__request-textarea textarea" name="message" id="request_mess" cols="30" rows="10" placeholder="Куда хотите поехать?"></textarea>

  <div class="popup__request-terms terms">
              <input type="checkbox" class="popup__request-checkbox" id="popup__request-terms" name="terms" checked>
              <label for="popup__request-terms">Я согласен на обработку моих личных данных</label>
            </div>

      <button class="popup__request-btn btn" type="submit">отправить заявку</button>
    </form>
  </div>
  </div>
</div>