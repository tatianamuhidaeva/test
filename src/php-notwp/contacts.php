<?php include('header.php') ?>


<div class="contacts">
  <?php include('widgets/tblock.php') ?>
  <div class="contacts-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">
        <address class="contacts__items">
          <section class="contacts__item">
            <h2 class="contacts__item-title">Адрес</h2>
            <span class="contacts__item-info">ТЦ Рублев, Иркутск,
              Чехова, 19, 2 этаж, офис 215</span>
          </section>
          <section class="contacts__item">
            <h2 class="contacts__item-title">Телефон</h2>
            <a class="contacts__item-info" href="tel:+73952600655">+7 (3952) 600-655</a>
          </section>
          <section class="contacts__item">
            <h2 class="contacts__item-title">Email</h2>
            <a class="contacts__item-info">sales@mir-travels.ru</a>
          </section>
          <section class="contacts__item">
            <h2 class="contacts__item-title">Время работы</h2>
            <span class="contacts__item-info">ПН - ПТ 10.00 - 19.00</span>
            <span class="contacts__item-info">СБ - ВС выходной</span>
          </section>
        </address>

        <section class="feedback">
          <h2 class="feedback__title">Бесплатная консльтация</h2>
          <form class="feedback-form">

            <div class="feedback-form__row">
              <input type="text" class="feedback-form__input input" id="feedback-form__name" name="name" placeholder="Ваше имя" required>
              <input type="text" class="feedback-form__input input" id="feedback-form__phone" name="phone" placeholder="Ваш телефон" required>
            </div>
            
            <div class="feedback-form__row">
              <textarea class="feedback-form__textarea textarea" id="feedback-form__message" name="message" cols="50" rows="30" placeholder="Ваш телефон"></textarea>
            </div>

            <div class="feedback-form__terms terms">
              <input type="checkbox" class="feedback-form__checkbox" id="feedback-form__terms" name="terms" checked>
              <label for="feedback-form__terms">Я согласен на обработку моих личных данных</label>
            </div>
            <button class="feedback-form__btn btn btn-o">отправить</button>
          </form>
        </section>
  </div>
  </main>
  <aside class="aside">
    <?php include('widgets/banner.php') ?>
  </aside>
</div>
</div>

<?php include('footer.php'); ?>