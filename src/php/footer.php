<footer class="footer">
      <div class="footer__wrap wrap">
    мирфутер
      </div>
    </footer>
  </div>

  <?php 
  $src = get_template_directory_uri() ;
  $src .=  "/img/logo.svg";
  echo file_get_contents($src); ?>

  <?php 
  $src = get_template_directory_uri() ;
  $src .=  "/img/svg/sprite/arrows.svg";
  echo file_get_contents($src); ?>
  
<?php wp_footer() ?>
</body>

</html>