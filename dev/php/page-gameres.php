<?php get_header(); ?>

<div class="game-res">
  <?php get_template_part('template-parts/tblock'); ?>
  <div class="game-res-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">
        <div class="game-res-wrapper">
          <?php

          $cong = get_field('congratulations');
          $btn_tour = get_field('btn_tour');
          $btn_game = get_field('btn_game');
          $text_discount = get_field('text-discount');

          parse_str($_SERVER['QUERY_STRING'], $resultTest);

          $sumPoints = 0; //Итоговое кол-во баллов

          foreach ($resultTest as $key => $item) {
            if (preg_match("/quest/", $key)){
              $sumPoints += $item;
            } elseif (preg_match("/discount/", $key)){
              $discount = $item;
            }

          }

          $params = get_field('result');

          $country = get_field('country-default');

          foreach ($params  as  $param) {
            if ($sumPoints <= $param['uppervalue']) {
              $country = $param['country'];
              break;
            }
          }

          if ($country) {
            $post = $country;
            setup_postdata($post);
            ?>

            <div class="game-res-congratulations">
              <span class="game-res-congratulations__text"><?php echo $cong ?></span>
              <h2 class="game-res-congratulations__title"><?php the_title(); ?></h2>
            </div>

            <?php
            $tours = get_children([
              'post_parent' => get_the_ID(),
              'post_type'   => 'ways_and_tours',
              'numberposts' => 1,
              'post_status' => 'publish'
            ]);
            if ($tours) {
              $i = 0;
              foreach ($tours as $tour) {
                $i++;
                $post = $tour;
                setup_postdata($post);

                get_template_part('template-parts/layout', 'gallery');
              }
            }
            wp_reset_postdata();
            ?>
            <?php
            $post = $country;
            setup_postdata($post);
            ?>
                        <div class="gallery-wrap">
            </div>
            <div class="game-res__info">
            <h2 class="game-res__info-title title"><?php echo $text_discount; ?></h2>
                    <strong class="game-res__info-discount"><?php echo $discount; ?>%</strong>
                  </div>
            <div class="game-res-content">
              <?php get_template_part('template-parts/price-table'); ?>

            </div>
            <?php
            wp_reset_postdata();
          }
          ?>
        </div>
        <a href="<?php echo site_url(); ?>/game" class="game-res__btn btn btn-y"><?php echo $btn_game; ?></a>
      </div>
    </main>
  </div>
</div>

<?php get_footer(); ?>