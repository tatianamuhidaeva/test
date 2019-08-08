<?php get_header(); ?>


<div class="hot-tours">
    <?php get_template_part('template-parts/tblock'); ?>
  <div class="hot-tours-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">

        <!-- table PRICE -->
        <?php include('template-parts/price-table.php') ?>
        <!-- end table PRICE -->
      </div>
    </main>
    <aside class="aside">
      <?php get_template_part('template-parts/banner'); ?>
    </aside>
  </div>
</div>

<?php get_footer();?>