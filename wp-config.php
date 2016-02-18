<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'slics');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '}s|:m|J0.~|m=n#qg:iWlcF#jh~tw6[:2|3`*ypo[J-ql?w%+b$|0-TgsMaH+`Z5');
define('SECURE_AUTH_KEY',  '~N+e!4)>H-R)VG-7me51!2u6Kh(|FFf$4?,ZM+JNZUnqkPq1:kjhY=$<A/yAW|Z-');
define('LOGGED_IN_KEY',    '?|mnvGNvvy:DCaI+rVh#u(re<_na+9cLoYc,.)gJq-1!K>9}YVH-`:C+.m~R?5]`');
define('NONCE_KEY',        '9sRwl%z/?B x&)-(mF+ty;9|0WiaU+L%d,N3cPjpM-*KPP 2&WH6}[QT!tgggr^|');
define('AUTH_SALT',        'GJ|@B-u%fdxNp1=JFj7s&Lb<Z}W:qgI-Fr]%ov&#}(27J^klJJ<N~Ws,[enJBPGQ');
define('SECURE_AUTH_SALT', 'ULq]d8XloZ{JM*|p+>*!*b@)wW59LUQ6m-,^9J:b}Xa|LK`}@K0y$+mM[{-+}up*');
define('LOGGED_IN_SALT',   '*8%+ggz-Vt}t(%3p+Ff4%f14CC>-aVo^?I&*WH4A>3p_`,t+g!j|u!v2|KSmm3x3');
define('NONCE_SALT',       '8YXImT_X.VDv:|`LA#+)ITd*YA|Rw|c7+u YAm+x.0e/)Btn@,IG|N7Bf[G/2O-3');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
