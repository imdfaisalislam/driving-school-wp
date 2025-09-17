<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'driving_school_wp' );

/** Database username */
define( 'DB_USER', 'wp_user' );

/** Database password */
define( 'DB_PASSWORD', 'wp_password' );

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
define('AUTH_KEY',         '9K]9b}f5NKVXHVW,iZB.}ulP/vZ@CquuOj]sy:#2Z .SAOV[Ik5D-#y-%_KOn?]M');
define('SECURE_AUTH_KEY',  'Qbkfih><6(T<*[o9RpXSg#z0d++cf.9zJevg&Eqp@m;$_sa#46OCs-h3YGrbI-MV');
define('LOGGED_IN_KEY',    '0Q+rpZ;3B;(A|;Sj(hO|>z1}|u}Y^0p+*|=zuG 5D5/%GIr]zv [Tf&1x=P@5blK');
define('NONCE_KEY',        'S bz16%Z.v*NI){>#o+`9[$y@E_gbB[#~M.#y/Y-8k1lN{br&2g[eGO2@lwe5z2=');
define('AUTH_SALT',        'Cisa;9Z3o@hsR@$y+T9[ /RtB1maVlo0D6]5.RMsPepzWknDL<inE~3CmyA1JCW(');
define('SECURE_AUTH_SALT', '7k1w+M1G>yMjd9W[|pniN+uuG_Qz5-7M=}Z`0f~ ~z)-P%?l2*T}9Fcj52Ykm$pu');
define('LOGGED_IN_SALT',   '||Z@XH(mgkZ0uK,;BQnK7|,5qg`ut]]w#t$y[*zm]_Xvd1l/w#:[CX?x]umxDHmw');
define('NONCE_SALT',       'LCQ]*0eF(H*fJyK]A]+;#x.X-|Vya-sgxNB]^|F[nI%-6V|N~zQc:!0[H_h9*o.[');

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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define( 'WP_DEBUG', false );

/**
 * WordPress Security and Performance Optimizations
 */

// Disable file editing in WordPress admin
define( 'DISALLOW_FILE_EDIT', true );

// Force SSL for admin and logins
define( 'FORCE_SSL_ADMIN', true );

// Increase memory limit
define( 'WP_MEMORY_LIMIT', '256M' );

// Enable WordPress auto-updates for minor releases
define( 'WP_AUTO_UPDATE_CORE', 'minor' );

// Set automatic updates for plugins and themes
define( 'WP_AUTO_UPDATE_PLUGINS', false );
define( 'WP_AUTO_UPDATE_THEMES', false );

// WordPress Cache settings
define( 'WP_CACHE', true );

// Limit post revisions
define( 'WP_POST_REVISIONS', 3 );

// Empty trash auto-delete (days)
define( 'EMPTY_TRASH_DAYS', 30 );

// Increase upload file size limit
@ini_set( 'upload_max_size' , '128M' );
@ini_set( 'post_max_size', '128M' );
@ini_set( 'max_execution_time', '300' );

/* Add any custom values between this line and the "stop editing" line. */

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';