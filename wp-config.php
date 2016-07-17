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
define('DB_NAME', 'wpdb');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         'k(Jlk_1kP@yudfE[SNaWN|+FIT{T0J|WK*sV}{VGJLW(duG}E.r=3R&Qe|-WEO/w');
define('SECURE_AUTH_KEY',  'D8F}+^QO+xnt~=8+O>LPRQPO-G}mCkj<K~0D3-}^#`3#Za iEpQ|zSppL8.:33`-');
define('LOGGED_IN_KEY',    'sd=- j2`!8.6T:`?%FDS,2&xT@iD<7vn]t|Dzkfyz~dO6]RwH]y2+SD=((uYl@c9');
define('NONCE_KEY',        'JF2exFyd7( [C9>w-C1W5ADOl+_/w>o})U]x|3+F@8IuCOeL75e@oS;O!&M!K0oO');
define('AUTH_SALT',        'nriyxcjZ`67w$4=22e<lfC}fE,g]S8UCCK4_Ud.xdUI~.p$F#v;0K+O+5&^EgA9o');
define('SECURE_AUTH_SALT', 'hboF1A+Dj%+*?`^fMoL5u$62+.FgJ]8LyCP|H41~7ddV5, B,B<sIcw5A7A_bfj{');
define('LOGGED_IN_SALT',   'b[-x|(Ex/{9M8N2^:sd=OOJTf4-1n[6G)[X]ogwOb=%B#)z6j4k;_4qjr~4|.2t[');
define('NONCE_SALT',       '0Djw{Fqi^~2|EZQ5lq,^@bkp?+Y+(K1zmq9%[p-j-5)&0KHwu76:xb8|d%{_ps+r');

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
