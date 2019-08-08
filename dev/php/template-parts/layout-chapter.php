<section>
<h2 class="one-article__subtitle">
  <?php the_sub_field('title') ?>
</h2>

<?php
if( have_rows('flexible-part') ):

// перебираем данные
while ( have_rows('flexible-part') ) : the_row();
 get_template_part('template-parts/layout', get_row_layout());
endwhile; //конец цикла частей блога

endif;
?>
</section>