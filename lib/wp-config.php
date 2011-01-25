<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'sukrupa_wordpress');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', '127.0.0.1');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'r9|0%VApd`VG|~jM-IAbj^#soUt%{R1%-`x|1]2vPaABR;TteP|Yh3_Ya_R8%orp');
define('SECURE_AUTH_KEY',  '=`*(uTK-dir&jp5#%RSh!A>)~N}|$g|t||*xy^y~.+5w4<s#J-xJm7q@g_P%;u=)');
define('LOGGED_IN_KEY',    'mcq]6jXhh$+}4Q#f65%0#FXfm)8KO%eS)8+S)A^Q3J5EqfMlK6W`Wb`+FPcgF3 y');
define('NONCE_KEY',        ',T*ki)Y8ej@Nr AL~j yMJ@ tV3_=)ATR-z;LN,uD 51r=6@U-^u>_CUYuz+f3+s');
define('AUTH_SALT',        '^dV+,-F=nREwV*SB;&Lq<*^`p[xcUVCjAPZW7]%9A^Lw|SeGQzy_N-wa+Ro$5th2');
define('SECURE_AUTH_SALT', '||4(+CM hc4I!*M |dp-i-Cw|Y-kj W&yH(~nW4x)4c[I|V|1J%M|:KR}tA:a0):');
define('LOGGED_IN_SALT',   '8]-a{@9*Y!Q#i=rr6xJuV~Ej6U+}os+bI,D|VmUmxiv/=!A*@1=UQprb&duE0^ 5');
define('NONCE_SALT',       ';0doioD51nr.L+&N|6tOw6voJYi(-Tn-v;B;H#%]J__AExUVQoB!FD:u{PC<#{4J');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress.  A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de.mo to wp-content/languages and set WPLANG to 'de' to enable German
 * language support.
 */
define ('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
