<!DOCTYPE html>
<html lang="ru">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Мир объединяет</title>
  <link rel="icon" href="<?php bloginfo('template_directory') ?>/favicon.ico" type="image/x-icon" />
  <link rel="shortcut icon" href="<?php bloginfo('template_directory') ?>/favicon.ico" type="image/x-icon" />
  <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  <?php wp_head() ?>
</head>

<body>
  <div id="container">
    <header class="header" id="header">
      <div class="header-wrap wrap">
        <div class="header__logo">
          <svg class="header__logo-svg">
            <use xlink:href="#logo" />
          </svg>
        </div>
        <nav class="header__nav">
          <ul class="header__nav-items">
            <li class="header__nav-item"><a href="#" class="header__nav-link">Направления</a></li>
            <li class="header__nav-item"><a href="#" class="header__nav-link">Туры</a></li>
            <li class="header__nav-item"><a href="#" class="header__nav-link">Блог</a></li>
            <li class="header__nav-item"><a href="#" class="header__nav-link">Контакты</a></li>
          </ul>
        </nav>
        <div class="header__info">
          <a href="tel:8800999999" class="header__info-phone">8 800 999 999</a>
          <a href="#" class="header__info-btn btn">показать мир?</a>
        </div>
      </div>
    </header>