<footer class="footer">
      <div class="footer-wrap wrap">
      <div class="footer__logo">
          <svg class="footer__logo-svg">
            <use xlink:href="#logo" />
          </svg>
        </div>

        <div class="footer__socials">
        <svg class="footer__socials-vk">
              <use xlink:href="#vk" />
            </svg>
        <svg class="footer__socials-odk">
              <use xlink:href="#odk" />
            </svg>
        <svg class="footer__socials-insta">
              <use xlink:href="#instagram" />
            </svg>
        </div>

        <div class="footer__address">
          <address>Адрес: Тухачевского, 15</address>
        </div>
        <div class="footer__info">
          <a href="#" class="footer__info-btn btn">показать мир?</a>
          <a href="tel:8800999999" class="footer__info-phone">8 800 999 999</a>
        </div>
      </div>
    </footer>
  </div>

  <div id="svg-sprites">
  <?php 
  $src = get_template_directory_uri() ;
  $src .=  "/img/logo.svg";
  echo file_get_contents($src); ?>

  <?php 
  $src = get_template_directory_uri() ;
  $src .=  "/img/svg/sprite/arrows.svg";
  echo file_get_contents($src); ?>
  <?php 
  $src = get_template_directory_uri() ;
  $src .=  "/img/svg/sprite/socials.svg";
  echo file_get_contents($src); ?>
  </div>

  
<?php wp_footer() ?>
</body>

</html>