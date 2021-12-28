<?php
/** Enable W3 Total Cache */
define('WP_CACHE', true); // Added by W3 Total Cache

/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'quepasa' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'kuroda' );

/** MySQL hostname */
define( 'DB_HOST', '127.0.0.1' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ' 2EnS;ca4gJjQ X:9ZH_/>hR1Cb9NEO!6pWI!4JWo&x]GfiIF.T!1Y?`IR|J:<SI' );
define( 'SECURE_AUTH_KEY',  '$jTwD4:q-V*iT5,Miq`8NaE@sqOKrG#%HpaVAL&!8&3Q>k.X)!@xyf(^L-@SP!EV' );
define( 'LOGGED_IN_KEY',    ':uJ:qjZ`sIghVdp>7Zeiet[QP*-3lIxDk&{S8r]<$1cWJtt@*BJ,G!NV,jc8h2+C' );
define( 'NONCE_KEY',        '!q_PJaTVB_Az6k] uAda7dANJclT^t!W/r3%wh6<@LuO~3aC6O{<;x#i#x`#PM+n' );
define( 'AUTH_SALT',        'BhTnB06zsA`{H-s@s+4jA&}3EU]4t}jaAG0,|#KI )p{|(Y+JQ0Zng<*M4-t7=gZ' );
define( 'SECURE_AUTH_SALT', '5_K5rkDJY>D.3)aaK@&()tfc?MA>lXkmqD#MjcZ=fn *3Z)B-:A|46!cAI+:;a>v' );
define( 'LOGGED_IN_SALT',   '^!.H-`y3&a}Yu-rT-~yLJAJ[w*BJXwoY8,/SGEfKFpephVu%z83LqBh3RK_V@]6<' );
define( 'NONCE_SALT',       ';I &f5oe=Jx&t=wzSDW&x_+[?9d06gtc^QfDFEgzvPRfAD)Yy?X<o0JHt{RNl$ST' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'qpf_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
