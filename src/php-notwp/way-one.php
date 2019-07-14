<?php include('header.php') ?>


<div class="way-one">
  <?php include('components/tblock.php') ?>
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
            <div class="way-one__arrow way-one__arrow-prev arrow arrow-prev swiper-button-prev d-none" id="way-one__prev">
              <svg class="way-one__arrow-svg">
                <use xlink:href="#prev" />
              </svg>
            </div>
            <div class="way-one__arrow way-one__arrow-next arrow arrow-next swiper-button-next d-none" id="ways__next">
              <svg class="ways__arrow-svg">
                <use xlink:href="#next" />
              </svg>
            </div>
          </div>
        </div>
        <!-- table PRICE -->
        <?php include('components/price-table.php') ?>
        <!-- end table PRICE -->
    </main>
    <aside class="aside">
      <?php include('components/banner.php') ?>
    </aside>
  </div>
</div>
<link rel="stylesheet" href="../style-page.css">
<script src="../js/plugins/swiper.min.js"></script>
<script src="../js/components/swiperсustomize.js"></script>
<script src="../js/components/toggle-menu.js"></script>
<?php include('footer.php'); ?>