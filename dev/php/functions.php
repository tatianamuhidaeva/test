<?php

require(ABSPATH . '/mailer/PHPMailerAutoload.php');

$post = get_post(305);
setup_postdata($post);
$contacts = get_field('contacts');

$email_from = $contacts['email'];
$name_from = '';
$email_to = $contacts['email'];

wp_reset_postdata();


if (function_exists('add_theme_support')) {
  add_theme_support('menus');
  add_theme_support('post-thumbnails');
  //		add_theme_support('custom-logo');
  add_theme_support('template-parts');

  //		add_image_size('hero', 1920, 810, true);
  add_image_size('about', 1920, 1000, true);
  //		add_image_size('service', 147, 147, true);
  //		add_image_size('services-slider', 550, 220, true);
  //		add_image_size('we', 445, 198, true);
}

add_action('wp_enqueue_scripts', 'project_styles');
function project_styles()
{
  wp_enqueue_style('main', get_stylesheet_directory_uri() . '/style.min.css', array(), null);
}

add_action('wp_enqueue_scripts', 'project_scripts'); // хук автоматом сработает во время wp_head
function project_scripts()
{
  	// отменяем зарегистрированный jQuery
	wp_deregister_script('jquery-core');
	wp_deregister_script('jquery');

	// регистрируем
	wp_register_script( 'jquery-core', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.js', false, null, true );
	wp_register_script( 'jquery', false, array('jquery-core'), null, true );

	// подключаем
  wp_enqueue_script( 'jquery' );
  
  wp_register_script('libs', get_stylesheet_directory_uri() . '/js/libs.min.js', array(), null, true);
  wp_enqueue_script('libs');

  wp_register_script('plugins', get_stylesheet_directory_uri() . '/js/plugins.min.js', array(), null, true);
  wp_enqueue_script('plugins');

  wp_register_script('main', get_stylesheet_directory_uri() . '/js/main.js', array('plugins', 'libs'), null, true);
  wp_enqueue_script('main');

}
add_action('after_setup_theme', function () {
  register_nav_menus([
    'header_menu' => 'Меню в шапке',
    'footer_menu' => 'Меню в подвале'
  ]);
});



add_action('init', 'blockusers_init');
function blockusers_init()
{
  if (is_user_logged_in()) {
    if (
      is_admin() && !current_user_can('administrator') &&
      !(defined('DOING_AJAX') && DOING_AJAX)
    ) {
      wp_redirect(home_url());
      exit;
    }
  }
}

## Отключает новый редактор блоков в WordPress (Гутенберг).
## ver: 1.0
if ('disable_gutenberg') {
  add_filter('use_block_editor_for_post_type', '__return_false', 100);

  // Move the Privacy Policy help notice back under the title field.
  add_action('admin_init', function () {
    remove_action('admin_notices', ['WP_Privacy_Policy_Content', 'notice']);
    add_action('edit_form_after_title', ['WP_Privacy_Policy_Content', 'notice']);
  });
}

//Изменение картинки логотипа, ссылки и title в wp-admin
if (1) {
  // Картинка (логотип)
  add_action('login_head', 'wp_login_logo_img_url');
  function wp_login_logo_img_url()
  {
    echo '
              <style>
                  .login h1 a{ background-image: url( ' . get_template_directory_uri() . '/img/logo.svg ) !important; background-size: 145px 38px !important;width: 145px !important ;height: 38px !important; transition: all 0.4s }
                  .login h1 a:hover{opacity: 0.7; transition: all 0.4s}
          .login{text-align: center}
              </style>';
  }
  // Cсылка логотипа
  add_filter('login_headerurl', 'wp_login_logo_link_url');
  function wp_login_logo_link_url($url)
  {
    return home_url();
  }
  // Атрибут title у ссылки логотипа
  add_filter('login_headertitle', 'wp_login_logo_title_attr');
  function wp_login_logo_title_attr($title)
  {
    $title = get_bloginfo('name');
    return $title;
  }
}

 // /*Подзагрузка AJAX*/
 add_action('wp_enqueue_scripts', 'myajax_data', 100);
 function myajax_data()
 {
   wp_localize_script(
     'main',
     'myajax',
     array(
       'url' => admin_url('admin-ajax.php')
     )
   );
 }


/* Register Customizer */
add_action('customize_register', 'mir_customize_register');
function mir_customize_register($wp_customize) {

  // Header setting ////////////////////////////////////////////////////////////////////////////////////////////////////////
  $wp_customize->add_section(
    'contacts_settings',
    array(
      'title'      => 'Контактная информация',
      'priority'   => 30,
      'description' => 'укажите номер телефона, адрес, email для рассылки и ссылки на соц.сети'
    )
  );

  //телефон
  $wp_customize->add_setting(
    'phone',
    array(
      'default' => '8 800 999 999',
      'transport' => 'refresh', // or postMessage
    )
  );

  $wp_customize->add_control(
    'phone',
    array(
      'label' => 'Укажите номер телефона',
      'description' => 'Будет указан в шапке и подвале',
      'section' => 'contacts_settings',
      'type' => 'text',
    )
  );


  //адрес
  $wp_customize->add_setting(
    'address',
    array(
      'default' => 'Адрес: Тухачевского, 15',
      'transport' => 'refresh', // or postMessage
    )
  );

  $wp_customize->add_control(
    'address',
    array(
      'label' => 'Укажите адрес',
      'description' => 'Будет указан в подвале',
      'section' => 'contacts_settings',
      'type' => 'text',
    )
  );

  //email
  $wp_customize->add_setting(
    'email',
    array(
      'default' => 'test@t-code.ru',
      'transport' => 'refresh', // or postMessage
    )
  );

  $wp_customize->add_control(
    'email',
    array(
      'label' => 'Укажите email на который будут приходить письма',
      'description' => '',
      'section' => 'contacts_settings',
      'type' => 'text',
    )
  );

  //vk
  $wp_customize->add_setting(
    'vk',
    array(
      'default' => 'https://vk.com/',
      'transport' => 'refresh', // or postMessage
    )
  );

  $wp_customize->add_control(
    'vk',
    array(
      'label' => 'Укажите ссылку ВКонтакте',
      'description' => 'для ссылки на иконке в подвале',
      'section' => 'contacts_settings',
      'type' => 'text',
    )
  );

  //odk
  $wp_customize->add_setting(
    'odk',
    array(
      'default' => 'https://ok.ru/',
      'transport' => 'refresh', // or postMessage
    )
  );

  $wp_customize->add_control(
    'odk',
    array(
      'label' => 'Укажите ссылку Одноклассники',
      'description' => 'для ссылки на иконке в подвале',
      'section' => 'contacts_settings',
      'type' => 'text',
    )
  );

  //insta
  $wp_customize->add_setting(
    'insta',
    array(
      'default' => 'https://www.instagram.com/',
      'transport' => 'refresh', // or postMessage
    )
  );

  $wp_customize->add_control(
    'insta',
    array(
      'label' => 'Укажите ссылку на Инстаграмм',
      'description' => 'для ссылки на иконке в подвале',
      'section' => 'contacts_settings',
      'type' => 'text',
    )
  );
}

/**
 * @see https://wp-kama.ru/filecode/wp-includes/update.php
 * @author Kama (https://wp-kama.ru)
 */
if (is_admin()) {
  // отключим проверку обновлений при любом заходе в админку...
  remove_action('admin_init', '_maybe_update_core');
  remove_action('admin_init', '_maybe_update_plugins');
  remove_action('admin_init', '_maybe_update_themes');

  // отключим проверку обновлений при заходе на специальную страницу в админке...
  remove_action('load-plugins.php', 'wp_update_plugins');
  remove_action('load-themes.php', 'wp_update_themes');

  // оставим принудительную проверку при заходе на страницу обновлений...
  //remove_action( 'load-update-core.php', 'wp_update_plugins' );
  //remove_action( 'load-update-core.php', 'wp_update_themes' );

  // внутренняя страница админки "Update/Install Plugin" или "Update/Install Theme" - оставим не мешает...
  //remove_action( 'load-update.php', 'wp_update_plugins' );
  //remove_action( 'load-update.php', 'wp_update_themes' );

  // событие крона не трогаем, через него будет проверяться наличие обновлений - тут все отлично!
  //remove_action( 'wp_version_check', 'wp_version_check' );
  //remove_action( 'wp_update_plugins', 'wp_update_plugins' );
  //remove_action( 'wp_update_themes', 'wp_update_themes' );

  add_filter('pre_site_transient_browser_' . md5($_SERVER['HTTP_USER_AGENT']), '__return_true');
}

// Добавляем миниатюры записи в таблицу записей в админке
if (1) {
  add_action('init', 'add_post_thumbs_in_post_list_table', 20);
  function add_post_thumbs_in_post_list_table()
  {
    // проверяем какие записи поддерживают миниатюры
    $supports = get_theme_support('post-thumbnails');
    // $ptype_names = array('post','page'); // указывает типы для которых нужна колонка отдельно
    // Определяем типы записей автоматически
    if (!isset($ptype_names)) {
      if ($supports === true) {
        $ptype_names = get_post_types(array('public' => true), 'names');
        $ptype_names = array_diff($ptype_names, array('attachment'));
      }
      // для отдельных типов записей
      elseif (is_array($supports)) {
        $ptype_names = $supports[0];
      }
    }
    // добавляем фильтры для всех найденных типов записей
    foreach ($ptype_names as $ptype) {
      add_filter("manage_{$ptype}_posts_columns", 'add_thumb_column');
      add_action("manage_{$ptype}_posts_custom_column", 'add_thumb_value', 10, 2);
    }
  }
  // добавляем колонку
  function add_thumb_column($columns)
  {
    // подправляем ширину колонки через css
    add_action('admin_notices', function () {
      echo '
                  <style>
                      .column-thumbnail{ width:80px; text-align:center; }
                  </style>';
    });
    $num = 1; // после какой по счету колонки вставлять новые
    $new_columns = array('thumbnail' => __('Thumbnail'));
    return array_slice($columns, 0, $num) + $new_columns + array_slice($columns, $num);
  }
  // заполняем колонку
  function add_thumb_value($colname, $post_id)
  {
    if ('thumbnail' == $colname) {
      $width  = $height = 45;
      // миниатюра
      if ($thumbnail_id = get_post_meta($post_id, '_thumbnail_id', true)) {
        $thumb = wp_get_attachment_image($thumbnail_id, array($width, $height), true);
      }
      // из галереи...
      elseif ($attachments = get_children(array(
        'post_parent'    => $post_id,
        'post_mime_type' => 'image',
        'post_type'      => 'attachment',
        'numberposts'    => 1,
        'order'          => 'DESC',
      ))) {
        $attach = array_shift($attachments);
        $thumb = wp_get_attachment_image($attach->ID, array($width, $height), true);
      }
      echo empty($thumb) ? ' ' : $thumb;
    }
  }
}

// Отправка формы
add_action('wp_ajax_bid_form', 'bid_form');
add_action('wp_ajax_nopriv_bid_form', 'bid_form');
function bid_form()
{
  global $email_from;
  global $name_from;
  global $email_to;
  $mail = new PHPMailer;
  $mail->setFrom($email_from, $name_from);
  $mail->addAddress($email_to);
  $mail->IsHTML(true);
  $mail->CharSet = 'UTF-8';

  $form = $_POST['form'];

  $mail->Subject = 'Письмо с сайта';
  $echo = "Ваше сообщение отправлено";

  $mail->Body = '';

  $mail->Body .= '<table style="margin: auto;padding:20px 30px 10px; width: 100%;max-width: 380px;border: 1px solid #dfdfdf;"><tr><td><h2 style="margin: 0 0 10px;font-size: 18px;text-align: center;">Заявка с сайта</h2></td></tr>';

  foreach ($form as $data) {
    switch ($data['name']) {
      case 'subject':
        $mail->Subject = $data['value'];
        break;

      case 'name':
        $mail->Body .= '<tr><td style="padding-bottom:10px;width: 100%;color:#888;text-transform:uppercase;font-size:14px;">Имя:</td></tr> <tr><td style="padding: 10px 15px;color: black;border: 1px solid #dfdfdf;">' . $data['value'] . '</td></tr> <tr><td><br></td></tr>';
        break;

      // case 'email':
      //   $mail->Body .= '<tr><td style="padding-bottom:10px;width: 100%;color:#888;text-transform:uppercase;font-size:14px;">Фамилия:</td></tr> <tr><td style="padding: 10px 15px;color: black;border: 1px solid #dfdfdf;">' . $data['value'] . '</td></tr> <tr><td><br></td></tr>';
      //   break;

      case 'phone':
        $mail->Body .= '<tr><td style="padding-bottom:10px;width: 100%;color:#888;text-transform:uppercase;font-size:14px;">Номер телефона:</td></tr> <tr><td style="padding: 10px 15px;color: black;border: 1px solid #dfdfdf;">' . $data['value'] . '</td></tr> <tr><td><br></td></tr>';
        break;

      case 'message':
        $mail->Body .= '<tr><td style="padding-bottom:10px;width: 100%;color:#888;text-transform:uppercase;font-size:14px;">Комментарий:</td></tr> <tr><td style="padding: 10px 15px;color: black;border: 1px solid #dfdfdf;">' . $data['value'] . '</td></tr> <tr><td><br></td></tr>';
        break;

      case 'wayName':
        $mail->Body .= '<tr><td style="padding-bottom:10px;width: 100%;color:#888;text-transform:uppercase;font-size:14px;">Направление:</td></tr> <tr><td style="padding: 10px 15px;color: black;border: 1px solid #dfdfdf;">' . $data['value'] . '</td></tr> <tr><td><br></td></tr>';
        break;

      case 'tourName':
        $mail->Body .= '<tr><td style="padding-bottom:10px;width: 100%;color:#888;text-transform:uppercase;font-size:14px;">Тур:</td></tr> <tr><td style="padding: 10px 15px;color: black;border: 1px solid #dfdfdf;">' . $data['value'] . '</td></tr> <tr><td><br></td></tr>';
        break;

      case 'duration':
        $mail->Body .= '<tr><td style="padding-bottom:10px;width: 100%;color:#888;text-transform:uppercase;font-size:14px;">На сколько ночей:</td></tr> <tr><td style="padding: 10px 15px;color: black;border: 1px solid #dfdfdf;">' . ' на '. $data['value'] . ' ночей ' . '</td></tr> <tr><td><br></td></tr>';
        break;

      case 'fly':
        $mail->Body .= '<tr><td style="padding-bottom:10px;width: 100%;color:#888;text-transform:uppercase;font-size:14px;">Вылет:</td></tr> <tr><td style="padding: 10px 15px;color: black;border: 1px solid #dfdfdf;">' . ' на '. $data['value'] . '</td></tr> <tr><td><br></td></tr>';
        break;

      case 'personsLabel':
        $mail->Body .= '<tr><td style="padding-bottom:10px;width: 100%;color:#888;text-transform:uppercase;font-size:14px;">Стоимость на ' . $data['value'] . '</td></tr> ';
        break;

      case 'cost':
        $mail->Body .= '<tr><td style="padding: 10px 15px;color: black;border: 1px solid #dfdfdf;">' . $data['value'] . ' Р ' . '</td></tr> <tr><td><br></td></tr>';
        break;
        
        


      case 'echo':
        $echo = $data['value'];
        break;
    }
  }

  $mail->Body .= '</table>';

  $result = $mail->Send();

  echo $echo;

  die();
};

function cc_mime_types($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');

setcookie(TEST_COOKIE, 'WP Cookie check', 0, COOKIEPATH, COOKIE_DOMAIN);
if (SITECOOKIEPATH != COOKIEPATH)
  setcookie(TEST_COOKIE, 'WP Cookie check', 0, SITECOOKIEPATH, COOKIE_DOMAIN);

//Исключаем не нужные табы
add_action('admin_menu', 'remove_menus');
function remove_menus()
{
  global $menu;
  $restricted = array(
    // __('Pages'),
    // __('Comments'),
    // __('Appearance')
  );
  end($menu);
  while (prev($menu)) {
    $value = explode(' ', $menu[key($menu)][0]);
    if (in_array(($value[0] != NULL ? $value[0] : ""), $restricted)) {
      unset($menu[key($menu)]);
    }
  }
}


// BREADCRUMBS of Kama

/**
 * Хлебные крошки для WordPress (breadcrumbs)
 *
 * @param  string [$sep  = '']      Разделитель. По умолчанию ' » '
 * @param  array  [$l10n = array()] Для локализации. См. переменную $default_l10n.
 * @param  array  [$args = array()] Опции. См. переменную $def_args
 * @return string Выводит на экран HTML код
 *
 * version 3.3.2
 */
function kama_breadcrumbs($sep = ' » ', $l10n = array(), $args = array())
{
  $kb = new Kama_Breadcrumbs;
  echo $kb->get_crumbs($sep, $l10n, $args);
}

class Kama_Breadcrumbs
{

  public $arg;

  // Локализация
  static $l10n = array(
    'home'       => 'Главная',
    'paged'      => 'Страница %d',
    '_404'       => 'Ошибка 404',
    'search'     => 'Результаты поиска по запросу - <b>%s</b>',
    'author'     => 'Архив автора: <b>%s</b>',
    'year'       => 'Архив за <b>%d</b> год',
    'month'      => 'Архив за: <b>%s</b>',
    'day'        => '',
    'attachment' => 'Медиа: %s',
    'tag'        => 'Записи по метке: <b>%s</b>',
    'tax_tag'    => '%1$s из "%2$s" по тегу: <b>%3$s</b>',
    // tax_tag выведет: 'тип_записи из "название_таксы" по тегу: имя_термина'.
    // Если нужны отдельные холдеры, например только имя термина, пишем так: 'записи по тегу: %3$s'
  );

  // Параметры по умолчанию
  static $args = array(
    'on_front_page'   => true,  // выводить крошки на главной странице
    'show_post_title' => true,  // показывать ли название записи в конце (последний элемент). Для записей, страниц, вложений
    'show_term_title' => true,  // показывать ли название элемента таксономии в конце (последний элемент). Для меток, рубрик и других такс
    'title_patt'      => '<span class="kb_title">%s</span>', // шаблон для последнего заголовка. Если включено: show_post_title или show_term_title
    'last_sep'        => true,  // показывать последний разделитель, когда заголовок в конце не отображается
    'markup'          => 'schema.org', // 'markup' - микроразметка. Может быть: 'rdf.data-vocabulary.org', 'schema.org', '' - без микроразметки
    // или можно указать свой массив разметки:
    // array( 'wrappatt'=>'<div class="kama_breadcrumbs">%s</div>', 'linkpatt'=>'<a href="%s">%s</a>', 'sep_after'=>'', )
    'priority_tax'    => array('category'), // приоритетные таксономии, нужно когда запись в нескольких таксах
    'priority_terms'  => array(), // 'priority_terms' - приоритетные элементы таксономий, когда запись находится в нескольких элементах одной таксы одновременно.
    // Например: array( 'category'=>array(45,'term_name'), 'tax_name'=>array(1,2,'name') )
    // 'category' - такса для которой указываются приор. элементы: 45 - ID термина и 'term_name' - ярлык.
    // порядок 45 и 'term_name' имеет значение: чем раньше тем важнее. Все указанные термины важнее неуказанных...
    'nofollow' => false, // добавлять rel=nofollow к ссылкам?

    // служебные
    'sep'             => '',
    'linkpatt'        => '',
    'pg_end'          => '',
  );

  function get_crumbs($sep, $l10n, $args)
  {
    global $post, $wp_query, $wp_post_types;

    self::$args['sep'] = $sep;

    // Фильтрует дефолты и сливает
    $loc = (object) array_merge(apply_filters('kama_breadcrumbs_default_loc', self::$l10n), $l10n);
    $arg = (object) array_merge(apply_filters('kama_breadcrumbs_default_args', self::$args), $args);

    $arg->sep = '<span class="kb_sep">' . $arg->sep . '</span>'; // дополним

    // упростим
    $sep = &$arg->sep;
    $this->arg = &$arg;

    // микроразметка ---
    if (1) {
      $mark = &$arg->markup;

      // Разметка по умолчанию
      if (!$mark) $mark = array(
        'wrappatt'  => '<div class="kama_breadcrumbs">%s</div>',
        'linkpatt'  => '<a href="%s">%s</a>',
        'sep_after' => '',
      );
      // rdf
      elseif ($mark === 'rdf.data-vocabulary.org') $mark = array(
        'wrappatt'   => '<div class="kama_breadcrumbs" prefix="v: http://rdf.data-vocabulary.org/#">%s</div>',
        'linkpatt'   => '<span typeof="v:Breadcrumb"><a href="%s" rel="v:url" property="v:title">%s</a>',
        'sep_after'  => '</span>', // закрываем span после разделителя!
      );
      // schema.org
      elseif ($mark === 'schema.org') $mark = array(
        'wrappatt'   => '<div class="kama_breadcrumbs" itemscope itemtype="http://schema.org/BreadcrumbList">%s</div>',
        'linkpatt'   => '<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a href="%s" itemprop="item"><span itemprop="name">%s</span></a></span>',
        'sep_after'  => '',
      );

      elseif (!is_array($mark))
        die(__CLASS__ . ': "markup" parameter must be array...');

      $wrappatt  = $mark['wrappatt'];
      $arg->linkpatt  = $arg->nofollow ? str_replace('<a ', '<a rel="nofollow"', $mark['linkpatt']) : $mark['linkpatt'];
      $arg->sep      .= $mark['sep_after'] . "\n";
    }

    $linkpatt = $arg->linkpatt; // упростим

    $q_obj = get_queried_object();

    // может это архив пустой таксы?
    $ptype = null;
    if (empty($post)) {
      if (isset($q_obj->taxonomy))
        $ptype = &$wp_post_types[get_taxonomy($q_obj->taxonomy)->object_type[0]];
    } else $ptype = &$wp_post_types[$post->post_type];

    // paged
    $arg->pg_end = '';
    if (($paged_num = get_query_var('paged')) || ($paged_num = get_query_var('page')))
      $arg->pg_end = $sep . sprintf($loc->paged, (int) $paged_num);

    $pg_end = $arg->pg_end; // упростим

    $out = '';

    if (is_front_page()) {
      return $arg->on_front_page ? sprintf($wrappatt, ($paged_num ? sprintf($linkpatt, get_home_url(), $loc->home) . $pg_end : $loc->home)) : '';
    }
    // страница записей, когда для главной установлена отдельная страница.
    elseif (is_home()) {
      $out = $paged_num ? (sprintf($linkpatt, get_permalink($q_obj), esc_html($q_obj->post_title)) . $pg_end) : esc_html($q_obj->post_title);
    } elseif (is_404()) {
      $out = $loc->_404;
    } elseif (is_search()) {
      $out = sprintf($loc->search, esc_html($GLOBALS['s']));
    } elseif (is_author()) {
      $tit = sprintf($loc->author, esc_html($q_obj->display_name));
      $out = ($paged_num ? sprintf($linkpatt, get_author_posts_url($q_obj->ID, $q_obj->user_nicename) . $pg_end, $tit) : $tit);
    } elseif (is_year() || is_month() || is_day()) {
      $y_url  = get_year_link($year = get_the_time('Y'));

      if (is_year()) {
        $tit = sprintf($loc->year, $year);
        $out = ($paged_num ? sprintf($linkpatt, $y_url, $tit) . $pg_end : $tit);
      }
      // month day
      else {
        $y_link = sprintf($linkpatt, $y_url, $year);
        $m_url  = get_month_link($year, get_the_time('m'));

        if (is_month()) {
          $tit = sprintf($loc->month, get_the_time('F'));
          $out = $y_link . $sep . ($paged_num ? sprintf($linkpatt, $m_url, $tit) . $pg_end : $tit);
        } elseif (is_day()) {
          $m_link = sprintf($linkpatt, $m_url, get_the_time('F'));
          $out = $y_link . $sep . $m_link . $sep . get_the_time('l');
        }
      }
    }
    // Древовидные записи
    elseif (is_singular() && $ptype->hierarchical) {
      $out = $this->_add_title($this->_page_crumbs($post), $post);
    }
    // Таксы, плоские записи и вложения
    else {
      $term = $q_obj; // таксономии

      // определяем термин для записей (включая вложения attachments)
      if (is_singular()) {
        // изменим $post, чтобы определить термин родителя вложения
        if (is_attachment() && $post->post_parent) {
          $save_post = $post; // сохраним
          $post = get_post($post->post_parent);
        }

        // учитывает если вложения прикрепляются к таксам древовидным - все бывает :)
        $taxonomies = get_object_taxonomies($post->post_type);
        // оставим только древовидные и публичные, мало ли...
        $taxonomies = array_intersect($taxonomies, get_taxonomies(array('hierarchical' => true, 'public' => true)));

        if ($taxonomies) {
          // сортируем по приоритету
          if (!empty($arg->priority_tax)) {
            usort($taxonomies, function ($a, $b) use ($arg) {
              $a_index = array_search($a, $arg->priority_tax);
              if ($a_index === false) $a_index = 9999999;

              $b_index = array_search($b, $arg->priority_tax);
              if ($b_index === false) $b_index = 9999999;

              return ($b_index === $a_index) ? 0 : ($b_index < $a_index ? 1 : -1); // меньше индекс - выше
            });
          }

          // пробуем получить термины, в порядке приоритета такс
          foreach ($taxonomies as $taxname) {
            if ($terms = get_the_terms($post->ID, $taxname)) {
              // проверим приоритетные термины для таксы
              $prior_terms = &$arg->priority_terms[$taxname];
              if ($prior_terms && count($terms) > 2) {
                foreach ((array) $prior_terms as $term_id) {
                  $filter_field = is_numeric($term_id) ? 'term_id' : 'slug';
                  $_terms = wp_list_filter($terms, array($filter_field => $term_id));

                  if ($_terms) {
                    $term = array_shift($_terms);
                    break;
                  }
                }
              } else
                $term = array_shift($terms);

              break;
            }
          }
        }

        if (isset($save_post)) $post = $save_post; // вернем обратно (для вложений)
      }

      // вывод

      // все виды записей с терминами или термины
      if ($term && isset($term->term_id)) {
        $term = apply_filters('kama_breadcrumbs_term', $term);

        // attachment
        if (is_attachment()) {
          if (!$post->post_parent)
            $out = sprintf($loc->attachment, esc_html($post->post_title));
          else {
            if (!$out = apply_filters('attachment_tax_crumbs', '', $term, $this)) {
              $_crumbs    = $this->_tax_crumbs($term, 'self');
              $parent_tit = sprintf($linkpatt, get_permalink($post->post_parent), get_the_title($post->post_parent));
              $_out = implode($sep, array($_crumbs, $parent_tit));
              $out = $this->_add_title($_out, $post);
            }
          }
        }
        // single
        elseif (is_single()) {
          if (!$out = apply_filters('post_tax_crumbs', '', $term, $this)) {
            $_crumbs = $this->_tax_crumbs($term, 'self');
            $out = $this->_add_title($_crumbs, $post);
          }
        }
        // не древовидная такса (метки)
        elseif (!is_taxonomy_hierarchical($term->taxonomy)) {
          // метка
          if (is_tag())
            $out = $this->_add_title('', $term, sprintf($loc->tag, esc_html($term->name)));
          // такса
          elseif (is_tax()) {
            $post_label = $ptype->labels->name;
            $tax_label = $GLOBALS['wp_taxonomies'][$term->taxonomy]->labels->name;
            $out = $this->_add_title('', $term, sprintf($loc->tax_tag, $post_label, $tax_label, esc_html($term->name)));
          }
        }
        // древовидная такса (рибрики)
        else {
          if (!$out = apply_filters('term_tax_crumbs', '', $term, $this)) {
            $_crumbs = $this->_tax_crumbs($term, 'parent');
            $out = $this->_add_title($_crumbs, $term, esc_html($term->name));
          }
        }
      }
      // влоежния от записи без терминов
      elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $parent_link = sprintf($linkpatt, get_permalink($parent), esc_html($parent->post_title));
        $_out = $parent_link;

        // вложение от записи древовидного типа записи
        if (is_post_type_hierarchical($parent->post_type)) {
          $parent_crumbs = $this->_page_crumbs($parent);
          $_out = implode($sep, array($parent_crumbs, $parent_link));
        }

        $out = $this->_add_title($_out, $post);
      }
      // записи без терминов
      elseif (is_singular()) {
        $out = $this->_add_title('', $post);
      }
    }

    // замена ссылки на архивную страницу для типа записи
    $home_after = apply_filters('kama_breadcrumbs_home_after', '', $linkpatt, $sep, $ptype);

    if ('' === $home_after) {
      // Ссылка на архивную страницу типа записи для: отдельных страниц этого типа; архивов этого типа; таксономий связанных с этим типом.
      if (
        $ptype && $ptype->has_archive && !in_array($ptype->name, array('post', 'page', 'attachment'))
        && (is_post_type_archive() || is_singular() || (is_tax() && in_array($term->taxonomy, $ptype->taxonomies)))
      ) {
        $pt_title = $ptype->labels->name;

        // первая страница архива типа записи
        if (is_post_type_archive() && !$paged_num)
          $home_after = sprintf($this->arg->title_patt, $pt_title);
        // singular, paged post_type_archive, tax
        else {
          $home_after = sprintf($linkpatt, get_post_type_archive_link($ptype->name), $pt_title);

          $home_after .= (($paged_num && !is_tax()) ? $pg_end : $sep); // пагинация
        }
      }
    }

    $before_out = sprintf($linkpatt, home_url(), $loc->home) . ($home_after ? $sep . $home_after : ($out ? $sep : ''));

    $out = apply_filters('kama_breadcrumbs_pre_out', $out, $sep, $loc, $arg);

    $out = sprintf($wrappatt, $before_out . $out);

    return apply_filters('kama_breadcrumbs', $out, $sep, $loc, $arg);
  }

  function _page_crumbs($post)
  {
    $parent = $post->post_parent;

    $crumbs = array();
    while ($parent) {
      $page = get_post($parent);
      $crumbs[] = sprintf($this->arg->linkpatt, get_permalink($page), esc_html($page->post_title));
      $parent = $page->post_parent;
    }

    return implode($this->arg->sep, array_reverse($crumbs));
  }

  function _tax_crumbs($term, $start_from = 'self')
  {
    $termlinks = array();
    $term_id = ($start_from === 'parent') ? $term->parent : $term->term_id;
    while ($term_id) {
      $term       = get_term($term_id, $term->taxonomy);
      $termlinks[] = sprintf($this->arg->linkpatt, get_term_link($term), esc_html($term->name));
      $term_id    = $term->parent;
    }

    if ($termlinks)
      return implode($this->arg->sep, array_reverse($termlinks)) /*. $this->arg->sep*/;
    return '';
  }

  // добалвяет заголовок к переданному тексту, с учетом всех опций. Добавляет разделитель в начало, если надо.
  function _add_title($add_to, $obj, $term_title = '')
  {
    $arg = &$this->arg; // упростим...
    $title = $term_title ? $term_title : esc_html($obj->post_title); // $term_title чиститься отдельно, теги моугт быть...
    $show_title = $term_title ? $arg->show_term_title : $arg->show_post_title;

    // пагинация
    if ($arg->pg_end) {
      $link = $term_title ? get_term_link($obj) : get_permalink($obj);
      $add_to .= ($add_to ? $arg->sep : '') . sprintf($arg->linkpatt, $link, $title) . $arg->pg_end;
    }
    // дополняем - ставим sep
    elseif ($add_to) {
      if ($show_title)
        $add_to .= $arg->sep . sprintf($arg->title_patt, $title);
      elseif ($arg->last_sep)
        $add_to .= $arg->sep;
    }
    // sep будет потом...
    elseif ($show_title)
      $add_to = sprintf($arg->title_patt, $title);

    return $add_to;
  }
}

/**
 * Изменения:
 * 3.3 - новые хуки: attachment_tax_crumbs, post_tax_crumbs, term_tax_crumbs. Позволяют дополнить крошки таксономий.
 * 3.2 - баг с разделителем, с отключенным 'show_term_title'. Стабилизировал логику.
 * 3.1 - баг с esc_html() для заголовка терминов - с тегами получалось криво...
 * 3.0 - Обернул в класс. Добавил опции: 'title_patt', 'last_sep'. Доработал код. Добавил пагинацию для постов.
 * 2.5 - ADD: Опция 'show_term_title'
 * 2.4 - Мелкие правки кода
 * 2.3 - ADD: Страница записей, когда для главной установлена отделенная страница.
 * 2.2 - ADD: Link to post type archive on taxonomies page
 * 2.1 - ADD: $sep, $loc, $args params to hooks
 * 2.0 - ADD: в фильтр 'kama_breadcrumbs_home_after' добавлен четвертый аргумент $ptype
 * 1.9 - ADD: фильтр 'kama_breadcrumbs_default_loc' для изменения локализации по умолчанию
 * 1.8 - FIX: заметки, когда в рубрике нет записей
 * 1.7 - Улучшена работа с приоритетными таксономиями.
 */

add_filter( 'the_content', 'filter_function_name_11' );
function filter_function_name_11( $content ) {
	// Фильтр...

	return $content;
}