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
define('DB_NAME', 'belgra19_belgradehangover');

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
define('AUTH_KEY',         'LK4^9}_w`u+PN]>r>JM#6O>i+ F2^Jh3P_L`9(^Q_Nzd6hBv:_q9diI?ftq^!:Sv');
define('SECURE_AUTH_KEY',  '//L6G}RTDTk)N#1V?j?TbL!v)cO3D4DLZ=u =oPHx|45(v~h-3MT!O;.1/HMYvDJ');
define('LOGGED_IN_KEY',    'K}od36*L[^-KIA 0B5 |(ByF{S{/V} Gt>!W`MdaqiA4{c8pwv X7TXhBn=?Cgj&');
define('NONCE_KEY',        'Ybf:||yn;;Dd(byEPYnEm(fCX^*]E_~qj RKX:90B*FD@Qs`KMAJxU>A`pb.C60Q');
define('AUTH_SALT',        'v:Rxo)C}md-N29$NZJLNDRV;[kj+RQbG)DVs%A]F3gY)l]T0fSgQ^lpK|0Zc?[/f');
define('SECURE_AUTH_SALT', '+)b-&/qW7n2O.HA846]HPgp8}*3A}LuR^9<k +|f0iY9+x#-8X(T|]%,g!=Kb{xd');
define('LOGGED_IN_SALT',   'O1@|!=1 wk`fP7FORv/v74];lb00Xjcey-v?#d;Z7>8De:bxT`[&;Be0bm*$@0*N');
define('NONCE_SALT',       '5jUY8#Z7X^%3w|n,)5a0=&^@LUZl#}ASzh4/.BnFfmYZpj0LZ3hdN?|Rc]`T?xon');

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
define('WP_DEBUG', true);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

define('DISALLOW_FILE_EDIT', true);

// OST SDK API LIBRARY

require_once(ABSPATH . 'vendor/autoload.php');

global $ostObj;
global $cUUID;
$cUUID = "5abb3f55-fa71-4bc5-9e62-3abaf2b5ee1e";

$params = array();
$params['apiKey'] = '834d6a9e52cce298ceff'; 
$params['apiSecret'] = 'cb125fced14db694abda84c13ffc47ca5f994711dec6f2cd32d0c8ea872282ae';
$params['apiBaseUrl'] = 'https://sandboxapi.ost.com/v1.1';

$ostObj = new OSTSdk($params);