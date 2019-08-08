<?php
$flag = $arrTour['flag'];
$wayName = $arrTour['wayName'];
$tourName = $arrTour['tourName'];
$duration = $arrTour['duration'];
$fly = $arrTour['fly'];
$price = $arrTour['price'];
$personsLabel = $arrTour['personsLabel'];
$cost = $arrTour['cost'];

$post = get_post();
if ((get_post_type( get_the_ID()) == 'ways_and_tours') && ($wayName)){
?>

<div class="popup-overlay" id="popup-order">
  <div class="popup-wrap">
    <div class="popup__logo">
      <svg class="popup__logo-svg">
        <use xlink:href="#logo" />
      </svg>
    </div>
    <div class="popup__order-wrapper popup-wrapper">
      <div class="popup__close popup-order__close">&#10006;</div>
      <h2 class="popup__order-title popup__title">заказ тура</h2>
      <form class="popup__order-form bid__form">
        <input type="tel" class="popup__order-input input" id="order_phone" name="phone" placeholder="Ваш телефон" required>
        <div class="popup__order-info">
          <div class="popup__order-row">
            <span class="popup__order-cell country">
              <img src="<?php echo $flag['url'] ?>" alt="<?php echo $flag['alt'] ?>">
              <?php echo $wayName; ?>
              <input type="hidden" name="wayName" value="<?php echo $wayName ?>">
            </span>
            <span class="popup__order-cell">
              <?php echo $tourName; ?>
              <input type="hidden" name="tourName" value="<?php echo $tourName ?>">
            </span>
          </div>
          <div class="popup__order-row">
            <span class="popup__order-cell">
              на <?php echo $duration; ?> ночей
              <input type="hidden" name="duration" value="<?php echo $duration ?>">
            </span>
            <span class="popup__order-cell">
              Вылет <?php echo $fly; ?>
              <input type="hidden" name="fly" value="<?php echo $fly ?>">
            </span>
          </div>
        </div>
        <div class="popup__order-price">
          Стоимость на <?php echo $personsLabel; ?> 
          <br>
          <?php echo $cost?> Р
          <input type="hidden" name="personsLabel" value="<?php echo $personsLabel ?>">
          <input type="hidden" name="cost" value="<?php echo $cost ?>">
        </div>

        <div class="popup__order-terms terms">
              <input type="checkbox" class="popup__order-checkbox" id="popup__order-terms" name="terms" checked>
              <label for="popup__order-terms">Я согласен на обработку моих личных данных</label>
            </div>
        <button class="popup__order-btn btn" type="submit">отправить заявку</button>
      </form>
    </div>
  </div>

</div>

<?php } ?>