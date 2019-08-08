<?php get_header(); ?>


<div class="ways-page">
  <?php get_template_part('template-parts/tblock'); ?>
  <div class="ways-page-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">
        <?php
        $wpb_all_query = new WP_Query(array('post_type' => 'ways_and_tours', 'post_status' => 'publish', 'posts_per_page' => -1, 'post_parent' => 0)); ?>
        <?php if ($wpb_all_query->have_posts()) : ?>
          <div class="ways-page__items">
            <?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>

              <div class="ways-page__item">
                <div class="ways-page__item__body">
                  <div class="ways-page__item__bg">
                    <?php $bg = get_field('way-bg');
                    $size = 'full'; ?>
                    <?php if ($bg) : ?>
                      <?php echo wp_get_attachment_image($bg['ID'], $size); ?>
                    <?php endif; ?>
                  </div>
                  <div class="ways-page__item__caption">
                    <a href="<?php the_permalink() ?>">
                      <?php the_title(); ?>
                    </a>
                    <div class="ways-page__item__flag">
                      <?php $flag = get_field('way-flag');
                      $size = 'full'; ?>
                      <?php if ($flag) : ?>
                        <?php echo wp_get_attachment_image($flag['ID'], $size); ?>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          </div>
        <?php endif; ?>
      </div>
    </main>
    <aside class="aside">
      <?php get_template_part('template-parts/banner'); ?>
    </aside>
  </div>
</div>
<?php get_footer(); ?>