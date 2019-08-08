<?php
/*
Template Name: One-way template
Template Post Type: ways_and_tours
*/
?>

<?php get_header(); ?>


<div class="way-one">
  <?php get_template_part('template-parts/tblock'); ?>
  <div class="way-one-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">
        <?php

        $images = get_field('way-gallery');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)

        if ($images) : ?>

          <div class="way-one-slider">
            <div class="way-one-slider-container swiper-container" id="way-one-slider">
              <div class="way-one-slider-wrapper swiper-wrapper">

                <?php foreach ($images as $image) : ?>
                  <div class="way-one-slide swiper-slide">
                    <?php echo wp_get_attachment_image($image['ID'], $size); ?>
                  </div>
                <?php endforeach; ?>

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
        <?php endif; ?>
        <!-- table PRICE -->

        <?php get_template_part('template-parts/price-table'); ?>
        <!-- end table PRICE -->

        <?php comments_template(); ?>
        

      </div>
    </main>
    <aside class="aside">
      <?php get_template_part('template-parts/banner'); ?>
    </aside>
  </div>
</div>

<?php get_footer(); ?>