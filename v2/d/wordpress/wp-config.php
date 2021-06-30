<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://ru.wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define( 'DB_NAME', 'wp' );

/** Имя пользователя MySQL */
define( 'DB_USER', 'root' );

/** Пароль к базе данных MySQL */
define( 'DB_PASSWORD', '' );

/** Имя сервера MySQL */
define( 'DB_HOST', 'localhost' );

/** Кодировка базы данных для создания таблиц. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Схема сопоставления. Не меняйте, если не уверены. */
define( 'DB_COLLATE', '' );

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '*2dIuDvc>,_2CA}BxI~%R[TtlVb`=(5}TH{!*4)<pU%D7h3*W{D!lZ|6_SKWQtmD' );
define( 'SECURE_AUTH_KEY',  'Fr&`OZr*[r( OIb+_7o/3E^+HGeQeM2JyU5BJ ,Y.[.r6CUa@7!hxoRh/4vdug#q' );
define( 'LOGGED_IN_KEY',    'byWFhZ+NgRH(VMt,s/&&#wZ&#~Qe0=Q!jtSS:TLt`bNVqnfnp?3HithbG11j`lt}' );
define( 'NONCE_KEY',        'Qb*cQS?:|C1{.bP+<| G_|9:2@%X_{3hg.AFhwXmh8E&?l_{k1<{0x5;_H{rwJUY' );
define( 'AUTH_SALT',        '}[8%*Q%I63GVLkc!>*i7jR-rNU!$+@>Nq35Y]|FP^?BUCsoEjg]C F[8-fS}7oQt' );
define( 'SECURE_AUTH_SALT', 'K.;xC=gIaP^.{`jDou`b9,/X_ IkO9Q20H.(tj|_r+^cIX(-KlVS&&&pqK9`7MAI' );
define( 'LOGGED_IN_SALT',   'T |W2T4q|#Asu>?I?ZbL,& EguDt.mCDQ#=D%k72&A}F*i(lzN.}/o&2@*}~5Ld4' );
define( 'NONCE_SALT',       '4$uj3CDgu)|gzkCwfCd/q{_#=@D=A}IH{FW9_f&aZ[AkC%H.n?0A(Y36kZBN!7s3' );

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 *
 * Информацию о других отладочных константах можно найти в документации.
 *
 * @link https://ru.wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Инициализирует переменные WordPress и подключает файлы. */
require_once ABSPATH . 'wp-settings.php';
