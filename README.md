# true.code

Сайт (v2) студии Верный Код

## Установка

$ git clone git@gitlab.com:truecode/true.code.git

$ npm i

### Установка WP

- Скачать и развернуть Wordpress в папку wp.
- БД скачать с хостинга.
- Настроить подключение к БД в wp-config.php

## config.json

- Указать путь сборки в build
- Для сборки темы WP:
	- proxy.status = true
	- proxy.target = \<domain\>

## Запуск

$ npm start - Режим разработчика

$ npm run build - Сборка для релиза