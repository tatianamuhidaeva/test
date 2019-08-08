
         <?php
          $wayName = get_the_title();
          $flagimg = get_field('way-flag');

            $tours = get_children( [
              'post_parent' => get_the_ID(),
              'post_type'   => 'ways_and_tours', 
              'numberposts' => -1,
              'post_status' => 'publish'
            ] );

            if( $tours ){
              $i = 0;
              foreach($tours as $tour) {
                $i++;
                $post = $tour;
                setup_postdata($post);
                // $tour = $tours[$i-1];
            ?>
              <tr class="price-table__row <?php if($i == 1) { ?>is-first-row<?php } ?>">
              <td class="price-table__cell">
                <div class="caption <?php if($i != 1) echo 'd-none d-block-md' ?>" >
                  <img src="<?php echo $flagimg['url'] ?>" alt="<?php echo $flagimg['alt'] ?>">
                  <span><?php echo $wayName; ?></span>
                </div>
              </td>
              <td class="price-table__cell">
                <span><?php the_title(); ?></span>
              </td>
              <td class="price-table__cell">
                <span>Вылет <?php the_field('tour_fly'); ?></span>
              </td>
              <td class="price-table__cell">
                <span> на <?php the_field('tour_duration'); ?> ночей</span>
              </td>
              <td class="price-table__cell price">
                <span> от <?php the_field('tour_cost-fuzzy'); ?> руб.</span>
              </td>
              <td class="price-table__cell button">
                <a href="<?php the_permalink(); ?>" class="price-table__btn btn btn-o">хочу поехать</a>
              </td>
            </tr>
  <?php
                  }//end foreach tours
                  wp_reset_postdata();
                } else {
                  if ($isWay > 0) {
?>
              <tr class="price-table__row <?php if($i == 1) { ?>is-first-row<?php } ?>">
              <td class="price-table__cell" colspan="6">
                  
                  Туров в этом направлении пока нет, но совсем скоро они появятся!
                </td>
            </tr>
            <?php
                  }
                } //endif

  ?>