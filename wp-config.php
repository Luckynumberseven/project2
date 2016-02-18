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
define('DB_NAME', 'project2');

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
define('AUTH_KEY',         '1LhONo@$8Pj!M]y5&88{A+My_{A(M~Z3hY+I1@SEd2zG.mmJ,,k6(=_{v^qC&&t2');
define('SECURE_AUTH_KEY',  'D#J_MXiY!0nx7a1w&~_mWk_{maX+|Jk-oZ/<NfP6zwl:@mXUpVC%EoY,SO%)C+%c');
define('LOGGED_IN_KEY',    's.xpKAvg&:SED)rJNZuM??RO$-4Hpo&4D3xI$YmZ7h0zlB-Sf6/k.&vH&W=!F3_|');
define('NONCE_KEY',        '`p.-{+=+ soO3$4a#1uw+Y{iKmK3.ua3ntpc^@69]T/nBx_-o>w=MZmIeBBvhN>O');
define('AUTH_SALT',        '-_Gl:t?EZA93S4MNE[m2rK0%41y3;ty9,`]%|us;4yOalS@NY$X|qd{.y~@@|nbW');
define('SECURE_AUTH_SALT', 'K#avqa?zq:av) 0dFBisBiL~+ C@R7UWz13;YiiU;8z,U2I/JOI+Kf;I2>96YAa.');
define('LOGGED_IN_SALT',   'XpI-W~t]<5;-~:-BzIIX]lFgr$0%MQR;o[=b1v}tJXUI U<Vn,.#|Nk;n}#Rbr*+');
define('NONCE_SALT',       ';I-HT.KYNxDj-2wfxPQ5yi*sAJj7xWdo:e7fo|p%sE:QQ?.dBAilnSk2UF7q-Ggv');

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
