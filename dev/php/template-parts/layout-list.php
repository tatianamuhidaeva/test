 <?php 
 $title = get_sub_field('title');
 $list = get_sub_field('items');
if ($title) : ?>
<h3 class="one-article__subtitle"><?php the_sub_field('title'); ?></h3>
<?php endif;
if(  $list  ):
  ?>
            <ul>
            <?php 
            foreach($list as $elem) :
              ?>
              <li><?php echo $elem['item'] ?></li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>