<?php get_header(); ?>

<div class="blog">
  <?php 
  
  get_template_part('template-parts/tblock'); ?>
  <div class="blog-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">

        <?php
        $wpb_all_query = new WP_Query(array('post_type' => 'post', 'post_status' => 'publish', 'posts_per_page' => 6)); ?>
        <?php if ($wpb_all_query->have_posts()) : ?>

          <?php
          $iter = 0;
          while ($wpb_all_query->have_posts()) : 
            
            $wpb_all_query->the_post();
            $iter++;

            $mainPart = get_field('group-main');
            if ($mainPart) :

            if ($iter == 1) {
                ?>
                <article class="blog-article article">
                  <?php $image = $mainPart['img'];
                  if ($image) {
                    ?>
                    <figure class="blog-article-figure article-figure">
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="blog-article__img article__img">
                      <a href="<?php echo get_permalink(); ?>" class="blog-article__btn article__btn btn btn-y">читать подробнее</a>
                    </figure>
                  <? } //endif    ?>
                  <div class="blog-article-content article-content">
                    <time datetime="<?php the_time('Y-m-d'); ?>" class="blog-article__time article__time"><?php the_time('d.m.Y'); ?></time>
                    <h2 class="blog-article__title article__title"><?php the_title() ?></h2>
                    <?php echo $mainPart['intro']; ?>
                  </div>
                </article>
                <div class="blog-right">
                  <div class="blog-right__list">
              <?php
            } elseif ($iter >=2 && $iter <=3){
              ?>
                <div class="blog-right-article article">
                <?php $image = $mainPart['img'];
                  if ($image) {
                    ?>
                    <figure class="blog-right-article-figure article-figure">
                      <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="blog-right-article-img article__img">
                      <a href="<?php echo get_permalink(); ?>" class="blog-right-article__btn article__btn btn btn-y">читать подробнее</a>
                    </figure>
                  <? } //endif    ?>

                    <div class="blog-right-article-content article-content">

                      <time datetime="<?php the_time('Y-m-d'); ?>" class="blog-right-article__time article__time"><?php the_time('d.m.Y'); ?></time>
                      <h2 class="blog-right-article__title article__title"><?php the_title() ?></h2>
                    </div>
                  </div>              
              <?php if ($iter == 3){ ?> 
              </div>
            </div> 
          </div>
        </main>
        <aside class="aside">
          <?php get_template_part('template-parts/banner'); ?>
        </aside>
        <aside class="aside">
          <div class="blog-all-articles">    
              <?php
              } 
            } else {   ?>
        <article class="blog-all-article article">
          <?php 
          $image = $mainPart['img'];
         if ($image) {  ?>
          <figure class="blog-all-article-figure article-figure">
            <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" class="blog-all-article__img article__img">
            <a href="<?php echo get_permalink(); ?>" class="blog-all-article__btn article__btn btn btn-y d-none d-block-xlg">читать подробнее</a>
          </figure>
         <?php } ?>
          <div class="blog-all-article-content article-content">

            <time datetime="<?php the_time('Y-m-d'); ?>" class="blog-article__time article__time"><?php the_time('d.m.Y'); ?></time>
            <h2 class="blog-all-article__title article__title"><?php the_title() ?></h2>
            <?php echo $mainPart['intro']; ?>
            <a href="<?php echo get_permalink(); ?>" class="blog-all-article__btn article__btn btn btn-y d-none-xlg">читать подробнее</a>
          </div>
        </article>
                <?php
              }
            endif;
          endwhile;
        endif;
        ?>
      </div>
      <div class="blog-all__pagination">
        <span class="current"></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>

      </div>
      <?php the_posts_pagination(); ?>
    </aside>
  </div>
</div>

<?php get_footer(); ?>