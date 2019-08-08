<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?php echo get_bloginfo( 'title' ) ?></title>
  <link rel="icon" href="<?php echo get_site_url() ?>/favicon.ico" type="image/x-icon" />
  <link rel="icon" href="<?php echo get_site_url() ?>/favicon.png" type="image/x-icon" />
<link rel="shortcut icon" href="<?php echo get_site_url() ?>/favicon.ico" type="image/png" />
<link rel="shortcut icon" href="<?php echo get_site_url() ?>/favicon.jpg" type="image/jpeg" />
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

<?php wp_head(); ?>
</head>

<body>
  <div id="container">
    <?php 
    $addClass = "";
    if (get_page_link() == site_url() . "/"){
      $addClass = "header-index"; 
    }
    ?>
    <header class="header <?php echo $addClass; ?>" id="header">
      <div class="header-wrap wrap">
        <div class="header__logo">
          <a href="<?php echo site_url(); ?>">
            <svg class="header__logo-svg">
              <use xlink:href="#logo" />
            </svg>
          </a>
        </div>
        <div class="header__hamburger d-none d-block-md">
          <span></span>
        </div>
        <nav class="header__nav">

        <?php wp_nav_menu(array(
          'theme_location' => 'header_menu',
          'container' => false,
          'menu_class' => 'header__nav-items',
          'depth' => 0
        )) ?>
        </nav>
        <div class="header__info">
        <?php
              $pattern = '/[^0-9]/';
              $phone = get_theme_mod('phone', '');
              $phone = preg_replace($pattern, "", $phone);
              $phone = substr($phone, 1);
              ?>
          <a href="tel:+7<?php echo $phone ?>" class="header__info-phone">
          <span class="d-none-md"><?php echo get_theme_mod('phone'); ?></span>    
          <img class="d-none d-block-md" src="<?php bloginfo('template_directory'); ?>/img/svg/call-answer.svg" alt="phone">     
        </a>
          <a href="<?php echo site_url(); ?>/ways" class="header__info-btn btn d-none-md">показать мир?</a>
        </div>
      </div>
      </header>