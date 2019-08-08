<?php
/*
Template Name: One-post template
Template Post Type: post
*/
?>

<?php get_header(); ?>

<div class="one-article">
  <?php get_template_part('template-parts/tblock'); ?>
  <div class="one-article-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">
        <article class="one-article">
          
        <?php 
        $mainPart = get_field('group-main');
        if($mainPart) :
          $image = $mainPart['img'];
          $size = 'full'; // (thumbnail, medium, large, full or custom size)
          
          if( $image ) {
          ?>
            <figure class="one-article-figure">
              <img class="one-article__img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
            </figure>
          <? } //endif ?>
          <?php echo $mainPart['intro']; ?>
          <?php echo $mainPart['text']; ?>
        <?php endif;?>
        <?php

// проверяем есть ли данные в гибком содержании
if( have_rows('flexible-blog_part') ):

     // перебираем данные
    while ( have_rows('flexible-blog_part') ) : the_row();
      get_template_part('template-parts/layout', get_row_layout());
    endwhile; //конец цикла частей блога

endif;

?>
        </article>
      </div>
    </main>
    <aside>
    <div class="ya-share2" data-services="vkontakte,facebook,odnoklassniki,moimir"></div>
    <style>
      .ya-share2 {
        padding: 80px 0 60px;
        text-align: center;
      }
      .ya-share2 li::before {
        display: none;
      }
      .ya-share2__container_size_m .ya-share2__badge {
        border-radius: 50%;
        overflow: hidden;
        margin: 0 6px;
      }
      .ya-share2__container_size_m .ya-share2__icon {
        height: 40px;
        width: 40px;
      }
    </style>
    <!-- <div class="one-article-sharing">
      <a href="#" class="one-article-sharing-vk">
      <svg>
        <use xlink:href="#vk" />
      </svg>
      </a>
      <a href="#" class="one-article-sharing-odk">
      <svg>
        <use xlink:href="#odk" />
      </svg>
      </a>

      <a href="#" class="one-article-sharing-insta">
      <svg>
        <use xlink:href="#instagram" />
      </svg>
      </a>
    </div> -->

    </aside>
  </div>
</div>
<script src="https://yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script>
<script src="https://yastatic.net/share2/share.js"></script>
<?php get_footer();?>