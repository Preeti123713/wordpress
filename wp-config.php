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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

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
define('AUTH_KEY',         'p7fR2|y.wy?!_-(nQe1t+M)|%e`ER,+z!q9?w,qj7uR!nRD!O-yBtNo)kmn(9KT ');
define('SECURE_AUTH_KEY',  '/|!3(VU v|sH!n XQG19j/lItVMc!qCt^3*P|]D-|f+}]1I# o+kCoq_J{aPm[^*');
define('LOGGED_IN_KEY',    '9!.:Pl[SJV.L[aWxN%dpcaPA+(%r+4~)wLK`dt %`x0lPL{$=vrnDm|,!IOHy@>;');
define('NONCE_KEY',        ']|-G{2O7D(.{)qBj9(xuGOE7x>L%%E8NL(6.RmENv;(/q7<h`bvS[vy}*$9M734}');
define('AUTH_SALT',        '`#-|bCTJ)7opyo16ZSAc2_&T%~QB81/c_EOLqwaP3iyEShOm)I FE-[4z+7swJAE');
define('SECURE_AUTH_SALT', 'dwr[4op6==,N)VC%ee>99[Lz|zvs!5@UA_p7|uw|?tXk8?Zo`1!xQ|13oN)xv@||');
define('LOGGED_IN_SALT',   '?JF;]JAXiTEC .Ulv|K,MvY;|N-WYJP)(%^jJp7s/H+ ppz a(Z9X%b{o+v29|q{');
define('NONCE_SALT',       '_%3EfS:&*A!UGKgbb+;Q~{#K8/XwBdGP5ULz.l*bzr8+`1?.uO;|$B0:^dD+!WG^');

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', false );
define('WP_DEBUG_DISPLAY', false);

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
