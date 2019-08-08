<?php get_header(); ?>


<div class="contacts">
  <?php get_template_part('template-parts/tblock'); ?>
  <div class="contacts-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">
        <address class="contacts__items">
          <section class="contacts__item">
            <h2 class="contacts__item-title">Адрес</h2>
            <span class="contacts__item-info">
              <?php the_field('contacts_address'); ?>
            </span>
          </section>
          <section class="contacts__item">
            <h2 class="contacts__item-title">Телефон</h2>
            <a class="contacts__item-info" href="tel:+<?php $string = get_field('contacts_phone');
            $string = preg_replace('~\D+~', '', $string);
            echo $string;
            ?>
          ">
              <?php the_field('contacts_phone'); ?></a>
          </section>
          <section class="contacts__item">
            <h2 class="contacts__item-title">Email</h2>
            <a class="contacts__item-info" href="mailto:<?php the_field('contacts_email'); ?>"><?php the_field('contacts_email'); ?></a>
          </section>
          <section class="contacts__item">
            <h2 class="contacts__item-title">Время работы</h2>
            <span class="contacts__item-info"><?php the_field('contacts_time'); ?></span>
          </section>
        </address>

        <section class="feedback">
          <h2 class="feedback__title">Бесплатная консльтация</h2>
          <form class="feedback-form bid__form">

            <div class="feedback-form__row">
              <input type="text" class="feedback-form__input" id="feedback-form__name" name="name" placeholder="Ваше имя" required>
              <input type="tel" class="feedback-form__input" id="feedback-form__phone" name="phone" placeholder="Ваш телефон" required>
            </div>

            <div class="feedback-form__row">
              <textarea class="feedback-form__textarea" id="feedback-form__message" name="message" cols="50" rows="30" placeholder="Сообщение"></textarea>
            </div>

            <div class="feedback-form__terms terms">
              <input type="checkbox" class="feedback-form__checkbox" id="feedback-form__terms" name="terms" checked>
              <label for="feedback-form__terms">Я согласен на обработку моих личных данных</label>
            </div>
            <button class="feedback-form__btn btn btn-o" type="submit">отправить</button>
          </form>
        </section>
      </div>
    </main>
    <aside class="aside">
      <?php get_template_part('template-parts/banner'); ?>
    </aside>
  </div>
</div>

<?php get_footer(); ?>