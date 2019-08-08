<?php get_header(); ?>


<div class="page404">
    <?php get_template_part('template-parts/tblock'); ?>
  <div class="page404-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">
          <h2>Упс, данной страницы нет на сайте. Вернитесь на 
            <a href="<?php echo site_url(); ?>">
              <i>главную страницу</i>
            </a>
          </h2>
      </div>
    </main>
    <aside class="aside">
      <?php get_template_part('template-parts/banner'); ?>
    </aside>
  </div>
</div>

<?php get_footer();?>