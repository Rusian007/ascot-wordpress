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
define( 'DB_NAME', 'ascot' );

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
define( 'AUTH_KEY',         'Ub,5f1TObHscXk_P8G!$yHF+w1aT|LP|S-RwZs}W,<9bzF>Tg8=fS6Fw{s{NCFE{' );
define( 'SECURE_AUTH_KEY',  '7<CfF*|T[,q|m#pGZtkvceoc~6Tt!qLilU**i!CW_1577V#Z0e15]&*2k+I_yh&~' );
define( 'LOGGED_IN_KEY',    'pYt6 w:hb0)m1%poI}f@Zg#jM+.pL0.9GAV+~2C3G8fTy[CS:Pv3a},9r|q)s?Sz' );
define( 'NONCE_KEY',        'l-xzS);uC<uRb5S);`X{2}@:GlEMxe~J@BO2T{DT@v?t5iXdZ}AEZ$5ZW#J-O)>7' );
define( 'AUTH_SALT',        'hnG%!}pnbH1N@w9r0#h{7~+Zvs,p[Y,3SX<07+>U0a@5Hh|Vd^9$*/N=2JtS fum' );
define( 'SECURE_AUTH_SALT', 'hUHg<o^a[[Hc3G-7.RZ:]Jsf|YZl}lPDQYH )fyt0zHW+ie*n&r$R,vY,mB^C1C`' );
define( 'LOGGED_IN_SALT',   'v*kbXO=PyRY}civpP6#e%6JSz@8Q*Yr,u[OZ9LG2i?mf4E6fsp>)dMgo6|GHLFij' );
define( 'NONCE_SALT',       '[<41@aXh4b~#mLd &r{ ;k:]<$xR959goK^=#j}h^dF1G^79u~=6-:bq`IXbm(l]' );

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
