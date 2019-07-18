<?php include('header.php') ?>


<div class="way-one">
  <?php include('widgets/tblock.php') ?>
  <div class="way-one-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">
        <div class="way-one-slider">
          <div class="way-one-slider-container swiper-container" id="way-one-slider">
            <div class="way-one-slider-wrapper swiper-wrapper">

              <div class="way-one-slide swiper-slide">
                <img src="../img/content/way-one/way-one_pic1.png" alt="">
              </div>
              <div class="way-one-slide swiper-slide">
                <img src="../img/content/way-one/way-one_pic2.png" alt="">
              </div>
              <div class="way-one-slide swiper-slide">
                <img src="../img/content/way-one/way-one_pic3.png" alt="">
              </div>
              <div class="way-one-slide swiper-slide">
                <img src="../img/content/way-one/way-one_pic4.png" alt="">
              </div>

            </div>
            <div class="way-one__arrow way-one__arrow-prev arrow arrow-prev swiper-button-prev d-none d-block-xlg" id="way-one__prev">
              <svg class="way-one__arrow-svg">
                <use xlink:href="#prev" />
              </svg>
            </div>
            <div class="way-one__arrow way-one__arrow-next arrow arrow-next swiper-button-next d-none d-block-xlg" id="way-one__next">
              <svg class="way-one__arrow-svg">
                <use xlink:href="#next" />
              </svg>
            </div>
          </div>
        </div>
        <!-- table PRICE -->
        <?php include('widgets/price-table.php') ?>
        <!-- end table PRICE -->

        <!-- REVIEWS -->
        <section class="reviews">
          <h2 class="reviews__title title">Отзывы наших клиентов</h2>
          <div class="reviews-slider">
            <div class="reviews-slider-container swiper-container" id="reviews-slider">
              <div class="reviews-slider-wrapper swiper-wrapper">
                <div class="reviews-slide swiper-slide">
                  <div class="reviews-slide__img">
                    <img src="../img/content/reviews/reviews-pic1.jpg" alt="">
                  </div>
                  <div class="reviews-slide__content">
                    <h3 class="reviews-slide__content-title">Татьяна и Николай</h3>
                    <p class="reviews-slide__content-paragraph">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
                    </p>
                  </div>
                </div>
                <div class="reviews-slide swiper-slide">
                  <div class="reviews-slide__img">
                    <img src="../img/content/reviews/reviews-pic1.jpg" alt="">
                  </div>
                  <div class="reviews-slide__content">
                    <h3 class="reviews-slide__content-title">Татьяна и Николай</h3>
                    <p class="reviews-slide__content-paragraph">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
                    </p>
                  </div>
                </div>
                <div class="reviews-slide swiper-slide">
                  <div class="reviews-slide__img">
                    <img src="../img/content/reviews/reviews-pic1.jpg" alt="">
                  </div>
                  <div class="reviews-slide__content">
                    <h3 class="reviews-slide__content-title">Татьяна и Николай</h3>
                    <p class="reviews-slide__content-paragraph">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
                    </p>
                  </div>
                </div>
                <div class="reviews-slide swiper-slide">
                  <div class="reviews-slide__img">
                    <img src="../img/content/reviews/reviews-pic1.jpg" alt="">
                  </div>
                  <div class="reviews-slide__content">
                    <h3 class="reviews-slide__content-title">Татьяна и Николай</h3>
                    <p class="reviews-slide__content-paragraph">
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean euismod bibendum laoreet. Proin gravida dolor sit amet lacus accumsan et viverra justo commodo. Proin sodales pulvinar sic tempor. Sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Nam fermentum, nulla luctus pharetra vulputate, felis tellus mollis orci, sed rhoncus pronin sapien nunc accuan eget.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <div class="reviews__pagination swiper-pagination">
            </div>
            <div class="reviews__arrow reviews__arrow-prev arrow arrow-prev swiper-button-prev" id="reviews__prev">
              <svg class="reviews__arrow-svg">
                <use xlink:href="#prev" />
              </svg>
            </div>
            <div class="reviews__arrow reviews__arrow-next arrow arrow-next swiper-button-next" id="reviews__next">
              <svg class="reviews__arrow-svg">
                <use xlink:href="#next" />
              </svg>
            </div>
          </div>
        </section>
        <!-- end REVIEWS -->
      </div>
    </main>
    <aside class="aside">
      <?php include('widgets/banner.php') ?>
    </aside>
  </div>
</div>

<?php include('footer.php'); ?>