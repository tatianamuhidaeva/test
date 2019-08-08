<?php
$image = get_sub_field('img');
if ($image) :
  ?>
  <figure class="one-article-figure">
    <img class="one-article__img" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>">

  </figure>
<? endif; //image
