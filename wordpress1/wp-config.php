<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'itjobs');

/** MySQL database username */
define('DB_USER', 'ITjobs');

/** MySQL database password */
define('DB_PASSWORD', 'leopard90');

/** MySQL hostname */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         '-:XTc8WzvPD?%%V>#{KU2.Ef1nuN~gZR-h5l.jVf~[3D2L0OYOTxNo(b1`XZ~+Az');
define('SECURE_AUTH_KEY',  'tg*v<*7}+qmJ+cOWP|E>7=A,B)?/{a#cP=7DNMu_:6KF-va8|0G1/xA8t84N14B ');
define('LOGGED_IN_KEY',    '-Qxa]sP2wJ3|Bl}4WS=:O5H@bM>jsr+Z4|}5g&ps.{uc+`c%@5yuPL=,9q{([uQc');
define('NONCE_KEY',        '>u;h@J@7BEP(-c`xvIHk#rHIz9~M9p%7K:Pyv>_>xySktT46=_ h!K(BV (T`YKj');
define('AUTH_SALT',        'pP]?5{y~^h`<imQ$eSD#v=iFV`~UKF|zX+X mS-/EVSNh;GZ[k$1^nx:sB9lDzbX');
define('SECURE_AUTH_SALT', 'z3vDmPysn{U)-)L3M2E1BIQ=ggYaSj+72:OF}jc+cK|-:k89Zq|O/>oF.#2aaxUH');
define('LOGGED_IN_SALT',   '-02,pWCRj6(dN<,VU(bLj-Vxn*)o1a8If l;K0&?7JLEr*G|#Mwm OQF##.Al/B!');
define('NONCE_SALT',       'zop(-+C=)_`P6-1H*8SMwP RlA}0*7C},b)Rc+r{L..^Ln_(^7X TW]`oJ,uuR+.');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
