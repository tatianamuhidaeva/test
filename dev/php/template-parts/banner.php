<div class="bann">
  <?php $imageV = get_field('ban-img-v');
  $imageH = get_field('ban-img-h');
  ?>
  <picture class="bann-img">
    <?php if (!empty($imageV)) { ?>
    <source media="(max-width: 992px)" srcset="<?php echo $imageV['url']; ?>">
    <?php } else { ?>
    <source media="(max-width: 992px)" srcset="<?php bloginfo('template_directory'); ?>/img/static/banner/ban-col.jpg">
    <?php } ?>
  <?php if (!empty($imageH)) { ?>
    <source media="(min-width: 993px) and (max-width: 1684px)" srcset="<?php echo $imageH['url']; ?>">
  <?php } else { ?>
    <source media="(min-width: 993px) and (max-width: 1684px)" srcset="<?php bloginfo('template_directory'); ?>/img/static/banner/ban-row.png">
  <?php } ?>
  <?php if (!empty($imageV)) { ?>
    <source media="(min-width: 1685px)" srcset="<?php echo $imageV['url']; ?>">
    <img src="<?php echo $imageV['url']; ?>" alt="<?php echo $imageV['alt']; ?>">

  <?php } else { ?>

    <source media="(min-width: 1685px)" srcset="<?php bloginfo('template_directory'); ?>/img/static/banner/ban-col.jpg">
    <img src="<?php bloginfo('template_directory'); ?>/img/static/banner/ban-col.jpg" alt="">
  
  <?php } ?>

  </picture>
  <?php $link = get_field('ban-btn-href'); ?>
  <div class="bann-btn-wrap">
  <?php if ((!empty($link)) ): ?>
    <a href="<?echo esc_url($link['url'])?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>" class="bann__btn btn btn-y"><?echo esc_html($link['title'])?></a>
  <?php else : ?>
    <a href="<?php echo site_url(); ?>/game/" target="_self" class="bann__btn btn btn-y">Пройти тест</a>
  <?php endif;  ?>
  </div>
</div>