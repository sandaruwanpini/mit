<?php
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
define( 'DB_NAME', 'mit' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

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
define( 'AUTH_KEY',         'X@dVw0](6FaE%w8My:!#[b5AkuKM)Oq0,0$Z)F.Ng%HY!R+XYvFX6DL??B-C:1X{' );
define( 'SECURE_AUTH_KEY',  'Q|Jg+k?Zo`J7ekey&oJePiXXRQ|bTk7Y`w?,ji||b(tzp_89{B7Y[2.X&HR^,nF.' );
define( 'LOGGED_IN_KEY',    '`D{diAcQp_$f4YWHuV/`KxlnWv>s=I]?kK=sr-;/YvnZ>f)*{c{Fh7L1Y>HLqw.;' );
define( 'NONCE_KEY',        'ea0&8COqOv).B>VUK^+gX,I[UWG`1qb/{=;%in<>0_Ms@^j;zb3SgS;rT{#iTf:p' );
define( 'AUTH_SALT',        'NyRuc+E2cxTly4*t=ZVL;QLTr/[[#+usI#lfZXO7f8|&2ZknZq!_$gK2o?P3e3sZ' );
define( 'SECURE_AUTH_SALT', '=w9yG[qh29MS*Dw6i@D3JUpq`S}t4e2R0-(?M&~bW++~[ui@2]-GmjMl3DLlO*A!' );
define( 'LOGGED_IN_SALT',   '{{5+Mr^M)w_xT$a4?:}xBR50b}]pGIwTgua`Og=jtJ`&&yd_AsX,# q$-J`a6Uc$' );
define( 'NONCE_SALT',       'Rm57J]#eZ74!k<zw]q{#B|$Ho(!uJ;u,JdzhW}+!.9-{9eo[c%-[ BjXP6.f&&N{' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
