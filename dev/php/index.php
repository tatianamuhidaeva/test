<?php get_header(); ?>
<main id="main-ind">
  <section class="main-ind">
    <header class="main-ind-wrap wrap">
      <h1><?php echo get_bloginfo('title') ?></h1>
      <div class="main-ind__title d-none-md">
        <img class="main-ind__title-img" src="<?php bloginfo('template_directory'); ?>/img/static/world-unites.png" alt="Мир объединяет">
        <div class="main-ind__title-compass"></div>
        <div class="main-ind__title-romb-top d-none-lg"></div>
        <div class="main-ind__title-romb-right d-none-lg"></div>
        <div class="main-ind__title-romb-bottom d-none-lg"></div>
        <div class="main-ind__title-romb-left d-none-lg"></div>
        <span class="main-ind__subtitle">направления</span>
      </div>
      <div class="main-ind__title d-none d-block-md">
        <img class="main-ind__title-img" src="<?php bloginfo('template_directory'); ?>/img/static/world-unites-md.png" alt="Мир объединяет">
        <span class="main-ind__subtitle">направления</span>
      </div>
    </header>
  </section>
  <section class="ways-ind">
    <div class="ways-ind-wrap wrap">
      <h2 class="ways-ind__title title-index"><?php the_field('title_1') ?></h2>

      <?php
      $wpb_all_query = new WP_Query(array('post_type' => 'ways_and_tours', 'post_status' => 'publish', 'posts_per_page' => -1, 'post_parent' => 0)); ?>
      <?php if ($wpb_all_query->have_posts()) : ?>
        <div class="ways-ind-slider">
          <div class="ways-ind-slider-container swiper-container" id="ways-ind-slider">
            <div class="ways-ind-slider-wrapper swiper-wrapper">
              <?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>

                <div class="ways-ind-slide swiper-slide wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                  <div class="ways-ind-slide__body">
                    <div class="ways-ind-slide__bg">
                      <?php $bg = get_field('way-bg');
                      $size = 'full'; ?>
                      <?php if ($bg) : ?>
                        <?php echo wp_get_attachment_image($bg['ID'], $size); ?>
                      <?php endif; ?>
                    </div>
                    <div class="ways-ind-slide__caption">
                      <a href="<?php the_permalink() ?>">
                        <?php the_title(); ?>
                      </a>
                      <div class="ways-ind-slide__flag">
                        <?php $flag = get_field('way-flag');
                        $size = 'full'; ?>
                        <?php if ($flag) : ?>
                          <?php echo wp_get_attachment_image($flag['ID'], $size); ?>
                        <?php endif; ?>
                      </div>
                      <div class="ways-ind-slide__decor-left">
                        <?php $flag = get_field('way-decor-left');
                        $size = 'full'; ?>
                        <?php if ($flag) : ?>
                          <img src="<?php echo $flag['url']; ?>" alt="<?php echo $flag['alt']; ?>">
                        <?php endif; ?>
                      </div>
                      <div class="ways-ind-slide__decor-right">
                        <?php $flag = get_field('way-decor-right');
                        $size = 'full'; ?>
                        <?php if ($flag) : ?>
                          <img src="<?php echo $flag['url']; ?>" alt="<?php echo $flag['alt']; ?>">
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>



                  <?php

                  $tours = get_children([
                    'post_parent' => get_the_ID(),
                    'post_type'   => 'ways_and_tours',
                    'numberposts' => -1,
                    'post_status' => 'publish'
                  ]);

                  if ($tours) {
                    $i = 0;
                    $minPrice = -1;
                    foreach ($tours as $tour) {
                      $i++;
                      $post = $tour;
                      setup_postdata($post);
                      if (($minPrice < 0) || ($minPrice > get_field('tour_cost-fuzzy'))) {
                        $minPrice = get_field('tour_cost-fuzzy');
                      }
                      wp_reset_postdata();
                    }
                      ?>
                      <div class="ways-ind-slide__info d-none-md">
                        от <?php echo $minPrice; ?> руб.
                      </div>
                      <?php
                  }
                  ?>

                </div>

              <?php endwhile; ?>

            </div>
            <div class="ways-ind__pagination swiper-pagination d-none d-block-md">
            </div>
            <div class="ways-ind__arrow ways-ind__arrow-prev arrow arrow-prev swiper-button-prev" id="ways-ind__prev">
              <svg class="ways-ind__arrow-svg">
                <use xlink:href="#prev" />
              </svg>
            </div>
            <div class="ways-ind__arrow ways-ind__arrow-next arrow arrow-next swiper-button-next" id="ways-ind__next">
              <svg class="ways-ind__arrow-svg">
                <use xlink:href="#next" />
              </svg>
            </div>
          </div>
          </div>
        <?php endif; ?>
      </div>
  </section>
  <?php
  the_post();
  ?>
  <div class="ocean-ind">
    <div class="ocean-ind-wrap wrap">
      <section class="partners-ind">
        <h2 class="partners-ind__title title-index"><?php the_field('title_2') ?></h2>
        <div class="partners-ind__octopus wow fadeInUp" data-wow-duration="2s">
          <div class="partners-ind__compass wow rotateSmall" data-wow-duration="2s">
            <div class="partners-ind__compass-logo">
              <svg class="partners-ind__compass-logo-svg">
                <use xlink:href="#logo" />
              </svg>
            </div>
            <?php
            $images = get_field('partners_logo');
            if ($images) : ?>
              <ul class="partners-ind__items">
                <?php
                $i = 0;
                foreach ($images as $image) :
                  $i++; ?>
                  <li class="partners-ind__item partners-ind__item-<?php echo $i ?> wow fadeIn" data-wow-delay="2s">
                    <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
                  </li>
                <?php endforeach; ?>
              </ul>
            <?php endif; ?>
          </div>
        </div>
        <div class="partners-ind__description wow fadeIn" data-wow-delay="3s">
          <?php the_field('text') ?>
        </div>
      </section>
      <section class="promo-ind wow fadeIn">
        <div class="promo-ind-num">
          <img class="promo-ind__island wow moveUpDown" data-wow-duration="12s" data-wow-iteration="infinite" src="<?php bloginfo('template_directory'); ?>/img/static/island-zero.png" alt="остров">
          <div class="promo-ind__rub wow moveUpDown" data-wow-delay="0.5s" data-wow-duration="5s" data-wow-iteration="infinite"> &#8381;</div>
        </div>
        <h2 class="promo-ind__text wow moveUpDown" data-wow-delay="1s" data-wow-duration="5s" data-wow-iteration="infinite">
          наценка <br> на все <br> туры
        </h2>
        <div class="promo-ind__boat wow moveUpDown" data-wow-duration="2s" data-wow-delay="6s" data-wow-iteration="infinite">
          <img class="wow boat" data-wow-duration="5s" src="<?php bloginfo('template_directory'); ?>/img/static/boat.png" alt="лодка">
        </div>
      </section>
    </div>
  </div>
  <section class="game-ind">
    <div class="game-ind-wrap wrap">
      <div class="game-ind-svg">
        <svg width="100%" height="675">
          <symbol id="mask-coral" viewBox="0 0 1920 2900" preserveAspectRatio="xMinYMax slice">
            <defs>
              <style>
                .cls-1 {
                  fill: #fff;
                  fill-rule: evenodd;
                }
              </style>
            </defs>
            <path class="cls-1" d="M-265.168,3726.02s5.439-1.28,8.524,0-2.3,7.52,0,8.52,7.458-2.13,7.458-2.13,3.447-3.13,5.326-1.06-3.5,10.71,0,10.65,5.9-10.59,8.525-9.59,0.482,7.62,3.2,8.52,9.84-6.55,11.72-9.58,6.273-4.2,9.59-3.2,1.64,7.43,5.326,8.52,2.984-2.2,6.394-4.26,8.4-6.55,12.784-5.32,10.443,6.27,12.786,3.19,1.918-8.5,6.392-11.71,13.963,3.81,15.982-1.07-2.435-9.75,1.065-11.72,1.919-8.08,6.393-8.52,14.844-3.64,17.047-10.65c1.417,4.85-1.51,13.34,3.2,13.85s9.7-4.8,14.917-4.26,10.35-1.37,11.719-6.39,9.424-10.77,13.85-10.65c2.435,4.01,8.22,3.75,11.72,1.06,4.242,2.53,14.38,4.7,19.178,0,5.54-3.21,15.26-12.21,22.374-8.52s8.728,13.31,17.047,11.72,11.323-3.55,14.916,0c6.743,8.64,22.347-7.97,29.832-8.52s3.264,13.42,18.112,11.71,17.669-18.11,28.766-17.04,24.71,9.03,29.832,7.46c6.187,2.92,8.73,6.99,14.917,7.45s7.107-5.74,14.915-6.39,16.281,0.09,19.178-4.26,1.5-7.92,3.2-10.65-4.426-6.77-1.065-10.65,7.757-4.82,14.916-4.26,9.238-2.88,12.785-3.2,5.116,6.34,8.524,1.07,3.125-13.35,9.589-15.98,16.7,2.91,22.374-3.2,3.4-7.04,7.458-12.78,5.07-12.09-1.065-21.3c1.277-3.6,2.15-5.1,3.2-9.59s-0.628-9.17,0-10.65,5.765-3.06,6.392,1.06,3.588,6.9,2.131,11.72c1.648,2.51,6.392,0,6.392,0s3.96,0.37,5.328,3.2,6,4.58,7.458,2.13,3.866-8.25,5.327-10.65-0.628-12.28,2.131-11.72,1.457,8.98,3.2,10.65,1.735,6.62,5.328,7.46,9.98-5.7,10.654-2.13-3.408,6.11-4.262,8.52-3.962,8.92-2.13,11.71,0.808,14.77,5.326,13.85,7.9-5.65,10.654-8.52,5.4-6.81,8.524-4.26-3.407,6.85,0,7.46,10.305-23.67,14.917-23.44c-0.113,4.78-7.577,12.04-2.132,15.98s14.917,2.13,14.917,2.13-1.693,5.88,2.13,7.46,12.065,13.79,17.048,11.71,2.291-5.37,3.2-9.58-7.948-6.68-6.393-9.59,0.9-2.23,4.262-4.26,0.67-7.83,3.2-10.65,0.669,7.63,4.262,8.52,7.526,4.49,10.655,5.32,6.644,9.4,10.653,8.53,8.359-2.69,9.589-6.4-4.8-5.51-3.2-8.52,9.934,10.84,12.785,4.26-1.23-7.41-2.13-11.71-6.557-7.69-7.459-11.72-3.452-7-8.522-6.39c1.693-1.29,6.32-2.69,4.261-5.33s-6.393-4.26-6.393-4.26a13.36,13.36,0,0,1-3.2-3.19,10.193,10.193,0,0,0-5.328-3.2l-3.2-4.26a12.016,12.016,0,0,1,4.262-3.19c2.759-1.25,5.533,2.4,7.458,0s2.476-6.03,5.328-6.39,2.429-2.6,5.326-2.13-0.72,5.09,1.066,7.45-6.418,4.67-3.2,8.52a6.681,6.681,0,0,0,7.458,2.13s5.395-9.73,8.524-7.45,1.364,9.07,5.326,10.65,7.017,7.17,10.655,5.32,9.888-5.56,11.72-11.71c3.361-.55,6.46-4.64,9.589-6.39s8.523-8.52,8.523-8.52a52.521,52.521,0,0,0,4.262-11.72c1.045-5.46-.582-7.37,4.262-10.65,5.538-2.27,13.315-4.45,11.719-10.65s-6.279-6.45-2.131-12.79,14.52-24.13,15.982-31.95,2.43-16.68,6.392-15.98,4.839,11.34,7.458,14.91c1.3,1.78,2.794,12.81,2.132,22.37-0.669,9.66-3.481,17.85,0,19.17,6.927,2.65,4.864-16.62,8.523-17.04s12.946,25.27,15.982,20.24-10.681-21.54-8.524-25.56,2.846-8.25,5.327-5.33-3.222,8.22,1.066,10.65,7.849,8.06,8.523,14.91-1.97,9.29,2.131,9.59,3.357-6.02,6.393-5.33,5.395,6.76,6.393,3.2-3.548-20.43,1.064-20.24c3.871,2.14,1.55,16.72,5.328,15.98s6.367-8.2,4.261-12.78-5.352-11.17-2.13-17.04,3.588-7.51,7.457-6.4,13.269,15.14,13.852,20.24-19.3,5.19-12.786,13.85,19.919-6.76,22.374-4.26-4.7,13.29,2.131,17.04c10.957,11.44,12.785-13.85,12.785-13.85s1.886-20.4,7.458-23.43c2.316-1.26,5.045.66,8.729,7.64,4.51,8.54,3.585,30.6,12.581,24.32,6.709-4.69,3.011-16.82,4.262-19.18s13.975,2.75,11.719-5.32-14.916-14.92-14.916-14.92l-4.262-7.45s6.427-3.37,3.2-11.72c4.922-.01,12.262-4.43,13.85-8.52,4.043-2.93-.2,12.61,4.262,15.98s1.236,9.66,5.326,8.52,8.384-8.24,10.655-12.78,0.219-12.29,5.327-11.72,2.3,11.38,7.458,11.72,12.078,0.07,13.851,3.19-0.8,7.86,3.2,7.46,11.72-9.59,11.72-9.59,4.989-17.24,14.915-18.11,7.306,6.24,10.654,5.33,5.917-5.8,11.72-5.33,7.863,0.64,12.785,2.13,12.589,0.02,13.851-6.39c4.969,0.9,7.4,7.58,12.785,8.53s17.035-6.09,18.112-12.79,3.277,0.82,9.59,3.2,8.233-6.92,10.654-10.65,8.12,15.48,11.72,14.91c13.771-2.16,5.268-18.17,11.72-22.37s8.927,8.74,11.72,3.2,9.112-9.79,9.588-11.72-1.125-8.12,2.132-8.52,16.153,19.34,21.308,14.91,2.131-8.52,2.131-8.52,8.186-2.89,4.262-7.46-7.425,3.19-11.72,0-17.894-17.75-20.243-20.23c-0.219-2.63-.8-8.91-6.393-10.66-2.813-3.18-9.589-9.58-9.589-9.58s1.609-7.15-3.2-8.52c3.07-1.43,7.458,0,7.458,0s10.732,4.15,1.065-13.85c4.924,0.85,6.055-2.56,5.327-6.39,2.84,0.2,6.935-.99,10.655,1.06s5.175,5.18,8.523,2.13,4.48-2.74,5.328-7.45,0.588-12.06,6.392-11.72,1.562,9.94,6.393,9.59,2.038-7.97,7.458-7.46,2.859,16.27,8.523,15.98,10.655-18.11,10.655-18.11,0.681-15.16,4.261-15.98c3.859,1.92,7.458-5.32,7.458-5.32a22.1,22.1,0,0,1,8.524,7.45c3.627,5.34,10.594,24.29,15.982,17.05s1.065-25.57,1.065-25.57,10.548,0.68,10.654-6.39-7.458-14.91-7.458-14.91,7.306-5.06,1.066-11.72c5.619,1.13,5.082-4.13,13.85,3.2s6.843-.02,8.524-2.13-5.328-10.65-5.328-10.65,7.26-5.02,5.328-8.53-11.687-2.42-15.982,0c-6.148.71-15.24-.6-17.047-2.13s10.5-1.95,5.328-11.71-10.655-3.2-10.655-3.2,7.361-6.75,3.2-11.71-7.459,1.06-7.459,1.06-6.447-1.78-8.523,1.07-10.655,1.06-10.655,1.06-5.363-5.56-5.327-9.59,3.1-9.6,14.916-8.52,14.574-15.56,14.916-20.23-5.327-3.2-5.327-3.2,5.97-3.92,10.655,0,7.871-1.98,8.523-7.46,3.424-4.76,7.458-4.26c4.554-.2,15.01-8.19,20.244-8.52s18.377,2.05,22.377,2.13,6.8-6.38,11.72-1.06c0.14,6.39.53,6.2,7.45,7.45s1.75,3.66,6.4,4.26,4.64-3.36,7.45-2.13,4.7,7.08,9.59,5.33,13.85-11.72,13.85-11.72a3.947,3.947,0,0,0,4.27,2.13c3.21-.39,14.94-13.9,22.37-15.97s16.43-10.86,17.05-17.05c3.23-4.31,19.56-11.31,21.31-15.97,5.53,4.21,11.11.38,12.78-3.2s11.81-10.69,12.79-13.85c0.98-3.25-3.2-13.84-3.2-13.84s11.96-10.46,21.31-3.2-2.62,13.93,3.2,19.17,18.04,9.3,19.17,17.05-5.79,37.77,22.38,40.47c-4.41,9.37-1.24,16.54,4.26,17.04s20.88-2.17,22.37-6.39,6.17,8.08,9.59,10.65,17.05-4.26,17.05-4.26,12.12-8.82,18.11-1.06-5.21,13.86,1.07,15.98,18.42,1.92,21.31-5.33,3.93-33.59,19.17-31.95,13.45,17.28,20.25,17.04,10.63,34.83-9.59,44.74-59.88,22.01-53.27,28.75,23,0.4,26.63,3.2-47.12,34.54-43.68,43.67,49.52-22.17,56.47-15.98-14.13,19.11-8.53,21.31,30.43-6.77,34.1-18.11-1.73,18.36,4.26,20.24-8.74,42.94-1.07,45.8,21.13-18.35,22.38-28.76,3.39-11.11,7.46-9.59,13.79,1.19,12.78,18.11-9.39,54.08,2.13,53.26,12.91-41.34,18.11-42.61,7.15,8.82,12.79,5.33-0.39-16.8-8.52-21.3c-2.87-5.72,17.09-11.13,24.5-5.33s-4.81,34.08,2.13,39.41c-0.94,8.98-3.65,15.53,3.2,15.98s19.35-21.2,18.11-31.96c4.99,4.69,14.05,17.35,19.18,12.79s-1.44-24.1-10.66-25.57c-3.12-3.14,1.36-7.56,6.4-6.39s4.06,9.55,9.59,11.72,10.65-9.59,10.65-9.59,6.45,8.26,12.79,10.65,12.78-9.58,12.78-9.58l7.46,5.32,8.52-5.32s10.81,6.04,10.66,9.58,1.62,15.82,11.72,15.98,6.39-17.04,6.39-17.04,9.92-5.96,9.59,2.13,11.69,7.76,15.98-4.26,6.02-8.81,13.85-12.78,12.88-14.06,18.11-10.66-3.07,7.48,3.2,10.66,19.18-23.44,19.18-23.44-0.17,15.01,10.65,19.17,15.17-8.01,17.05-12.78,3.77-34.42,19.18-33.02,6.15,14.97,17.04,14.91,18.12-10.65,18.12-10.65-9.38,22.01,5.32,24.5,9.59-5.32,9.59-5.32,12.3-18.15,12.79-30.89c6.57-6.22,8.7,28.72,21.31,26.62s-1.01-25.78,6.39-25.56,0.87,46.83,6.39,51.13c19.88,15.49,13.59-35.94,15.98-39.41s15.38-1.2,17.05,10.65-6.82,15.64-3.2,23.43,20.25-15.97,20.25-15.97,14.69-12.13,22.37,9.58-2.08,73.86,14.92,67.11,1.03-26.67,5.32-29.83,15.06,42.75,26.64,31.96-5.87-24.91,1.07-31.96,20.01,18.22,24.5,11.72-4.26-30.89-4.26-30.89,8.72-26.69,25.57,0,0-2466.48,0-2466.48H-295Z" transform="translate(0 -842)" />
          </symbol>
          <pattern id="pattern-wave" width="300" height="303" patternUnits="userSpaceOnUse" patternContentUnits="userSpaceOnUse">
            <image width="300" height="303" xlink:href="<?php bloginfo('template_directory'); ?>/img/static/bg/pattern-wave.jpg" />
          </pattern>
          <mask id="mask">
            <use xlink:href="#mask-coral" />
          </mask>

          <g mask="url(#mask)">
            <rect id="substrate-coral" width="1921" height="630" style="fill: url(<?php get_page_link(); ?>#pattern-wave);" />
            <!-- <rect width="1921" height="630" fill="#ff0000" /> -->
          </g>
        </svg>
      </div>
      <div class="game-ind-fishes">

        <img src="<?php bloginfo('template_directory'); ?>/img/static/main-fishes/fishtail.png" alt="рыбка" class="game-ind-fishes__fish game-ind-fishes__fish-tail wow fishTail">
        <img src="<?php bloginfo('template_directory'); ?>/img/static/main-fishes/fish-1.png" alt="рыбка" class="game-ind-fishes__fish game-ind-fishes__fish-1 d-none-md fish1">
        <img src="<?php bloginfo('template_directory'); ?>/img/static/main-fishes/fish-2.png" alt="рыбка" class="game-ind-fishes__fish game-ind-fishes__fish-2 d-none-md fish2">
        <img src="<?php bloginfo('template_directory'); ?>/img/static/main-fishes/fish-3.png" alt="рыбка" class="game-ind-fishes__fish game-ind-fishes__fish-3 d-none-md fish3">
        <img src="<?php bloginfo('template_directory'); ?>/img/static/main-fishes/fish-4.png" alt="рыбка" class="game-ind-fishes__fish game-ind-fishes__fish-4 d-none-md fishGroup">
        <img src="<?php bloginfo('template_directory'); ?>/img/static/main-fishes/fish-2.png" alt="рыбка" class="game-ind-fishes__fish game-ind-fishes__fish-5 d-none-md fish2">
        <img src="<?php bloginfo('template_directory'); ?>/img/static/main-fishes/fish-3.png" alt="рыбка" class="game-ind-fishes__fish game-ind-fishes__fish-6 d-none-xlg fish3">
        <img src="<?php bloginfo('template_directory'); ?>/img/static/main-fishes/fish-4.png" alt="рыбка" class="game-ind-fishes__fish game-ind-fishes__fish-7 d-none-xlg fish3">


        <img src="<?php bloginfo('template_directory'); ?>/img/static/main-fishes/fish-group.png" alt="рыбка" class="game-ind-fishes__fish game-ind-fishes__fish-group-1 fishGroup">
        <img src="<?php bloginfo('template_directory'); ?>/img/static/main-fishes/fish-group-2.png" alt="рыбка" class="game-ind-fishes__fish game-ind-fishes__fish-group-2 fish2">
      </div>

      <div class="game-ind-content wow fadeInUp" data-wow-duration="2s">
        <h2 class="game-ind__title title-index">
          Где живут русалки?
        </h2>
        <p class="game-ind__subtitle">Ответь и получи шанс их увидеть</p>

        <a href="game/" class="game-ind__btn btn btn-y">хотите узнать?</a>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>