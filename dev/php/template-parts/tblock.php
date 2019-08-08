<section class="tblock">
  <div class="tblock-wrap wrap">
    <div class="tblock-wrap-page wrap-page">
      <!-- breadcrumbs -->
      <?php if( function_exists('kama_breadcrumbs') ) kama_breadcrumbs(' / '); ?>
      <!-- end breadcrumbs -->
      <?php //$post = get_post(); ?>
      <?php while(have_posts()):
        the_post(); ?>
      <div class="tblock-info">
        <h1 class="tblock__title"><?php the_title(); ?></h1>
        <?php if((strlen($post->post_content) > 0) && ($post->post_type != 'post')) { ?>

          <div class="tblock__text">
            <?php // echo $post->post_content;
            the_content();
            ?>
          </div>
        <?php } 
        endwhile;?>
      </div>
    </div>
  </div>
</section>