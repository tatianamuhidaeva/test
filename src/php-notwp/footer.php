<footer class="footer">
  <div class="footer-wrap wrap">
    <div class="footer__logo">
      <a href="#">
        <svg class="footer__logo-svg">
          <use xlink:href="#logo" />
        </svg>
      </a>
    </div>

    <div class="footer__socials">
      <a href="#" class="footer__socials-vk">
      <svg>
        <use xlink:href="#vk" />
      </svg>
      </a>
      <a href="#" class="footer__socials-odk">
      <svg>
        <use xlink:href="#odk" />
      </svg>
      </a>

      <a href="#" class="footer__socials-insta">
      <svg>
        <use xlink:href="#instagram" />
      </svg>
      </a>
    </div>

    <div class="footer__address d-none-md">
      <address>Адрес: Тухачевского, 15</address>
    </div>
    <div class="footer__info">
      <a href="#" class="footer__info-btn btn">показать мир?</a>
      <a href="tel:8800999999" class="footer__info-phone d-none-md">8 800 999 999</a>
    </div>
  </div>
</footer>
</div>

<div id="svg-sprites">
  <?php
  echo file_get_contents('../img/logo.svg') ?>

  <?php
  // $src = get_template_directory_uri();
  $src =  "../img/svg/sprite/arrows.svg";
  echo file_get_contents($src); ?>
  <?php
  // $src = get_template_directory_uri();
  $src =  "../img/svg/sprite/socials.svg";
  echo file_get_contents($src); ?>
</div>


<?php wp_footer() ?>
</body>

</html>