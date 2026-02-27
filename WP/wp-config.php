<?php
define('WP_CACHE', true); // Added by SpeedyCache

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
define( 'DB_NAME', 'harmakko_wp154' );

/** Database username */
define( 'DB_USER', 'harmakko_wp154' );

/** Database password */
define( 'DB_PASSWORD', '8F5)pSc2m]' );

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
define( 'AUTH_KEY',         'qbdzo7fg678ipwzxb3blwuitajppxh4hdj5oa8ixc8x1rkv6sybvmbxwcjgp0bvd' );
define( 'SECURE_AUTH_KEY',  '00ttefenayb0wjwvmxkzeantcpddovgyq4ogphb5qrsdtid5gv7th2paerhmw0pn' );
define( 'LOGGED_IN_KEY',    'epkof0vijsrvaojf4obljtztuot5ljow4se7jbm9kndsr0m3cnkr0sx6dpqyqdrd' );
define( 'NONCE_KEY',        'navvkbcjt7yft7cglivpi9pw5xacufahybkn4nlqbpsmd9chfvhbym0ye2bnphbb' );
define( 'AUTH_SALT',        'nv6v5jkotkns0iidnk6abskqesxq8dhk8wpq8d4p1y4asujyhwwcxhkmyrnj0m46' );
define( 'SECURE_AUTH_SALT', 'ckawxd5zm2j6rdjaznl3rgw27ienp4dkrej8xt7eiwhrr0zfmz4h6v5bfls53oia' );
define( 'LOGGED_IN_SALT',   'vd1ygo8cnwjieksljrufb0galxw9mejtkcpzot6jx8uilim3sykpxogzukwy9akp' );
define( 'NONCE_SALT',       'dcmc9fprs9gwfuclxg6xoytxbv0qzft2fclx9qjjaj33jomni0tqh6cnbd9wjkqp' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 *
 * At the installation time, database tables are created with the specified prefix.
 * Changing this value after WordPress is installed will make your site think
 * it has not been installed.
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/#table-prefix
 */
$table_prefix = 'wpjw_';

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

/* Add any custom values between this line and the "stop editing" line. */

/* Multisite */
define( 'WP_ALLOW_MULTISITE', true );
define( 'MULTISITE', true );
define( 'SUBDOMAIN_INSTALL', false );
define( 'DOMAIN_CURRENT_SITE', 'harmaalwale.com' );
define( 'PATH_CURRENT_SITE', '/WP/' );
define( 'SITE_ID_CURRENT_SITE', 1 );
define( 'BLOG_ID_CURRENT_SITE', 1 );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
