<?php
set_query_var( 'isWay', false );
if ((get_post_type() != 'ways_and_tours')){
  //get all ways
  $ways = new WP_Query(array('post_type' => 'ways_and_tours', 'post_status' => 'publish', 'posts_per_page' => -1, 'post_parent' => 0));
  if ($ways->have_posts()) :

?>

<table class="price-table">
      <tbody>
        <?php 
        while ($ways->have_posts()) : $ways->the_post();
?>
            <?php get_template_part('template-parts/price-table-row'); ?>

            <?php
          
              endwhile;//end ways
            endif;
            ?>
            <?php get_template_part('template-parts/price-table-footer'); ?>

<?php
} else {
  //This is WAY
   
  set_query_var( 'isWay', true );
?>
<table class="price-table">
      <tbody>

<?php get_template_part('template-parts/price-table-row'); ?>


<?php get_template_part('template-parts/price-table-footer'); ?>
          <? }//end else?>

