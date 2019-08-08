<?php
/*
Template Name: One-tour template
Template Post Type: ways_and_tours
*/
?>
<?php 
$post = get_post(); 
$id = $post->ID;
$parent_id = $post->post_parent;
$post= get_post($parent_id);

$wayName = $post->post_title;
$flag = get_field('way-flag');

$post = get_post($id); 
$post->post_content = '<span  class="one-tour__way">' . wp_get_attachment_image($flag['ID'], 'full') .
'<span>' . $wayName . '</span></span>';
?>
<?php get_header(); ?>


<div class="one-tour">
  <?php get_template_part('template-parts/tblock'); ?>

  <?php
$tourName = get_the_title();
$duration = get_field('tour_duration');
$fly = get_field('tour_fly');
$price = get_field('tour_cost-fuzzy');
$persons = get_field('tour_count-persons');
$personsLabel = $persons['label'];
$cost = get_field('tour_cost') * $persons['value'];

$arr = array(
  'flag' => $flag,
  'wayName' => $wayName, 
  'tourName' => $tourName,
  'duration' => $duration, 
  'fly'  => $fly,
  'price' => $price ,
  'personsLabel' => $personsLabel,
  'cost' => $cost
);
set_query_var( 'arrTour', $arr );
?>
  <div class="one-tour-wrap wrap">
    <main class="main">
      <div class="main-wrap wrap-page">
        <div class="one-tour__info">
          <?php  ?>
          <span>Вылет <?php the_field('tour_fly'); ?></span>
          <span> на <?php the_field('tour_duration'); ?> ночей</span>
        </div>
        <h2 class="one-tour__title title"><?php the_field('tour_subtitle'); ?></h2>
        <?php the_field('tour_description-before'); ?>
        
            <?php get_template_part('template-parts/layout', 'gallery') ?>
            
        <?php the_field('tour_description-after'); ?>

          <table class="one-tour-table">
            <tbody>
              <tr class="one-tour-table__row">
                <th class="one-tour-table__cell caption">Включено:</th>
                <td class="one-tour-table__cell info">
                  <?php
                  $objects = get_field_object('tour_include');
                  $includes = $objects['value'];

                  if ($includes) :
                    foreach ($includes as $include) :
                      echo $objects['choices'][$include];
                      if ($include != end($includes)) echo ", ";
                    endforeach;
                  endif;

                  ?>

                </td>
              </tr>
              <tr class="one-tour-table__row">
                <th class="one-tour-table__cell caption">Тип номера:</th>
                <td class="one-tour-table__cell info">
                  <?php the_field('tour_type-room'); ?>
                </td>
              </tr>
              <tr class="one-tour-table__row">
                <th class="one-tour-table__cell caption">Услуги:</th>
                <td class="one-tour-table__cell info">
                  <?php
                  $objects = get_field_object('tour_service');
                  $includes = $objects['value'];

                  if ($includes) :
                    foreach ($includes as $include) :
                      echo $objects['choices'][$include];
                      if ($include != end($includes)) echo ", ";
                    endforeach;
                  endif;

                  ?>
                </td>
              </tr>
              <tr class="one-tour-table__row">
                <th class="one-tour-table__cell caption">Территория:</th>
                <td class="one-tour-table__cell info">
                  <?php
                  $objects = get_field_object('tour_area');
                  $includes = $objects['value'];

                  if ($includes) :
                    ?>
                    <ul>
                      <?php foreach ($includes as $include) : ?>
                        <li><?php echo $objects['choices'][$include]; ?> </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </td>
              </tr>
              <tr class="one-tour-table__row">
                <th class="one-tour-table__cell caption">Питание:</th>
                <td class="one-tour-table__cell info">
                  <?php
                  $objects = get_field_object('tour_food');
                  $includes = $objects['value'];

                  if ($includes) :
                    ?>
                    <ul>
                      <?php foreach ($includes as $include) : ?>
                        <li><?php echo $objects['choices'][$include]; ?> </li>
                      <?php endforeach; ?>
                    </ul>
                  <?php endif; ?>
                </td>
              </tr>
            </tbody>
            <tfoot>
              <tr class="one-tour-table__footer">
                <td class="one-tour-table__footer-cell" colspan="2">
                  <div class="one-tour-table__footer-cell-wrap">
                    Стоимость на
                    <?php
                    $persons = get_field('tour_count-persons');
                    $cost = get_field('tour_cost') * $persons['value'];
                    echo " " . $persons['label'] . ":";
                    ?>
                    <span class="one-tour-table__footer-price"><?php echo number_format($cost, 0, ',', " "); ?> Р</span>

                      <button class="one-tour-table__footer-btn btn btn-y btn-order">заполнить заявку на тур</button>
                  </div>
                </td>
              </tr>
            </tfoot>
          </table>

        </div>
    </main>
    <aside class="aside">
      <?php get_template_part('template-parts/banner'); ?>
    </aside>
  </div>
</div>

<?php get_footer(); ?>