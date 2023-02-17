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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
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
define( 'AUTH_KEY',         '=*YzRkrG(9z>P@,IluLXE15.7[}X&+ 5I%@QvUMbnFTjH~#2M2O4Te+7!6XEz(5j' );
define( 'SECURE_AUTH_KEY',  '|Dh+^&hs{/$Fc=0+wy^|1^@:Mrm>VT^rm?y=s<I#u%Dc/~?;N4ktgYhp(Pxq?!R{' );
define( 'LOGGED_IN_KEY',    'P#_//*tC0oy&hGcvcCz(c[Na=jjM!LgLni+(Y,;cTvIr)?3ut?tTpW91h+<=/81 ' );
define( 'NONCE_KEY',        'IpK7a>R<F*2+sRqNy@TApW#wGJO,cN07&>4K/wEh/CHwlLizJK8kfq-Fbw.gDmdM' );
define( 'AUTH_SALT',        'mN{Z* e1zbg:[;p6Y|Mc2Y?.D.!On2h|]bz/I*G>5&b* 9 v{_]%)ZjjtQ%;8vd5' );
define( 'SECURE_AUTH_SALT', '*7;}qg4fuO7eoPd^W,(`PU4mRHAcm>Pl!j%%p_yTumaRay9Xv5f}|Fy1nD QO:~P' );
define( 'LOGGED_IN_SALT',   '{F/Xc&^pMw&(k{A c+R <.7c.Tx}G`*t/2x5>.(r_-cr_~jEQuZg(qb-YLjS#rm@' );
define( 'NONCE_SALT',       'T/`QF+1HP>:ZK05]W*Ns_4b_TM?KXBN<y81*c0D*&M:v2Y.!O_B_m!ypSu$+WUBX' );

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
