<footer class="footer">
  <div class="footer-wrap wrap">
    <div class="footer__logo">
      <a href="<?php echo site_url(); ?>">
        <svg class="footer__logo-svg">
          <use xlink:href="#logo" />
        </svg>
      </a>
    </div>

    <?php 
    $post = get_post(305);
    setup_postdata($post);
    $contacts = get_field('contacts');
    ?>
    
    <div class="footer__socials">
      <?php if ($contacts['vk']) :?>
      <a href="<?php echo $contacts['vk']; ?>" class="footer__socials-vk" target="_blank">
        <svg>
          <use xlink:href="#vk" />
        </svg>
      </a>
      <?php 
      endif;
      if ($contacts['odk']):?>
      <a href="<?php echo $contacts['odk']; ?>" class="footer__socials-odk" target="_blank">
        <svg>
          <use xlink:href="#odk" />
        </svg>
      </a>
      <?php 
      endif;
      if ($contacts['insta']):?>
      <a href="<?php echo $contacts['insta']; ?>" class="footer__socials-insta" target="_blank">
        <svg>
          <use xlink:href="#instagram" />
        </svg>
      </a>
      <?php endif; ?>
    </div>

    <div class="footer__address d-none-md">
    <?php if ($contacts['address']) :?>
      <address>Адрес: <?php echo $contacts['address']; ?></address>
      <?php endif; ?>
    </div>
    <div class="footer__info">
      <a href="<?php echo site_url(); ?>/ways" class="footer__info-btn btn">показать мир?</a>
      <?php if ($contacts['phone']) :?>
      <?php
              $pattern = '/[^0-9]/';
              $phone = $contacts['phone'];
              $phone = preg_replace($pattern, "", $phone);
              $phone = substr($phone, 1);
              ?>
      <a href="tel:+7<?php echo $phone ?>" class="footer__info-phone d-none-md"><?php echo $contacts['phone']; ?></a>
      <?php endif; ?>
    </div>
    <?php wp_reset_postdata(); ?>
  </div>
</footer>
</div>

<?php get_template_part('template-parts/popupOrder'); ?>
<?php get_template_part('template-parts/popupRequest'); ?>
<?php get_template_part('template-parts/popupSuccess'); ?>

<div id="svg-sprites">
  <?php
  $src = get_bloginfo('template_directory') . "/img/svg/logo.svg";
  echo file_get_contents($src); ?>
  <?php
  $src =  get_bloginfo('template_directory') . "/img/sprite-svg/icon-arrows.svg";
  echo file_get_contents($src); ?>
  <?php
  $src =  get_bloginfo('template_directory') . "/img/sprite-svg/icon-socials.svg";
  echo file_get_contents($src); ?>
</div>

<?php wp_footer(); ?>

<script>
  new WOW().init();
</script>

</body>

</html>