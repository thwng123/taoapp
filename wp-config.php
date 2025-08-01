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
define( 'DB_NAME', 'taoapp' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
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
define( 'AUTH_KEY',         'e9&@GzB- CYCp[2izQg[uaXd2WJ2y.8HceyF*BDC(B:-ywW;5qlP,8QLJ{OX7Q_U' );
define( 'SECURE_AUTH_KEY',  'wQbr`+rp$s) PIXtZtt<<Thf70am8SYsR|VJQ`5q_;axxU1u<A@yg@-E;vW}dwNc' );
define( 'LOGGED_IN_KEY',    'k5f@2hd;:l|Ct>cdB?&WDs&*kWh+CZpPYZ}*^E*CU#>@_bLpGDW$Z*NMmQ^/J?v<' );
define( 'NONCE_KEY',        'Y]_G+:0})ERbZKbE AyGcK=M=1^>+02v%Zh}<>V?nym,oR2>nV]fH-q,l4Ih3v.m' );
define( 'AUTH_SALT',        'UTM:l[mlGOlV)zCcfHRG,KQNoee`>~tV:tjlk~8C983E<j/BJHI+h(,57~q-O%1x' );
define( 'SECURE_AUTH_SALT', '|Ug1%e_NDO|M%`EZEC`xmP@E!&$E$CTV5Q&82iDLIdwaX@_eiGG(PHRu]zATaXOX' );
define( 'LOGGED_IN_SALT',   '[tfQbK+juW&h7-*{a}bQkn 4m_soHNqeS0~-uLc#BTBZx]M{Gwq$l[z3VwUc*u[E' );
define( 'NONCE_SALT',       'p!h?u6 6?pj=*z{ue&: Ec4*u<3|MrrJQqcn@L%V=c}Ng&Ju;AlX.CiO/^ jmi}(' );

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

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
define('FS_METHOD','direct');
