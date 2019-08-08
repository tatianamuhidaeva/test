        <?php
        $args = array(
          'post_id'             => get_post()->ID,
          'post_type'           => 'ways_and_tours',
          'status'              => 'all',
          'count'               => false,
          'date_query'          => null, // See WP_Date_Query
          'hierarchical'        => false,
          'update_comment_meta_cache'  => true,
          'update_comment_post_cache'  => false,
        );
        $comments = get_comments($args);
        ?>
        <!-- REVIEWS -->
        <?php if ($comments = get_comments($args)) { ?>
        <section class="reviews">
          <h2 class="reviews__title title">Отзывы наших клиентов</h2>
          <div class="reviews-slider">
            <div class="reviews-slider-container swiper-container" id="reviews-slider">
              <div class="reviews-slider-wrapper swiper-wrapper">
                <?php
                
                  foreach ($comments as $comment) {

                    $image = get_field('comment_photo', $comment);
                    $size = 'full'; // (thumbnail, medium, large, full or custom size)
                    ?>
                    <div class="reviews-slide swiper-slide">
                      <?php
                      if ($image) {
                        ?>
                        <div class="reviews-slide__img">
                          <?php echo wp_get_attachment_image($image['id'], $size); ?>
                        </div>
                      <?php
                      } else {
                        ?>
                        <div class="reviews-slide__img">
                        <img src="<?php echo get_bloginfo('template_directory') ?>/img/svg/man.svg" alt="">
                      </div>
                      <?php
                      }
                      ?>
                      <div class="reviews-slide__content">
                        <h3 class="reviews-slide__content-title"><?php echo $comment->comment_author; ?></h3>
                      <div class="reviews-slide__content-paragraph">
                        <?php echo $comment->comment_content; ?>                    
                      </div>
                      </div>
                    </div>
                  <?php

                  }
                
                ?>
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
        <?php } //endif;?>
        <!-- end REVIEWS -->