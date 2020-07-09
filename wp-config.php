<?php
define('WP_CACHE', false); // Added by WP Rocket
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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'linkinhr_wp92' );


/** MySQL database username */
// define( 'DB_USER', 'linkinhr_wp92' );
define( 'DB_USER', 'admin' );

/** MySQL database password */
// define( 'DB_PASSWORD', '5Spir8@@G1' );
define( 'DB_PASSWORD', 'admin' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', '
' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'hf3th27q0ic8fwzpyqovbtinxdfwji43evz8abkmunoaej7ncraspragsndbgsno' );
define( 'SECURE_AUTH_KEY',  'lnbk3hmce4vtedkid4sf5scrgdntxrjhkgl3ayqpsw7hudu34bz5l92p4xjcc7vg' );
define( 'LOGGED_IN_KEY',    '8ua3v2yje1gtsysfnrscscrvojid5cqkty095xo1ki06baxc3t84bcf2qnsvfvpc' );
define( 'NONCE_KEY',        'as5kzxrxlrkqtznnzlbh1i7hdgyliv6sql71qjosvpkv2jfllvkh8zy6niolhp7q' );
define( 'AUTH_SALT',        '7dihbdgdyzgaacikhpqtzpnjvfkspzue0io7toogspiq9dvdppogb74k4ms7jtg2' );
define( 'SECURE_AUTH_SALT', '22k4tx9wd0vxcfqurayeipzfuvy4iu8swh2ldwwczp13cagiyi2thasgodbgakga' );
define( 'LOGGED_IN_SALT',   'hdfnkpbemlh91qwbro7vqrhd4oewshb7o7ozxsvndw5yqbsqvg0wjxxjm2m3mfis' );
define( 'NONCE_SALT',       'ceskvbwdsqdl1q6gg1wetng6yjjtf2d3hfodiw8bakxeb6gogbuhfmhqtpolkucv' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp8i_';

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

/* Multisite */
define( 'WP_ALLOW_MULTISITE', false );
define('MULTISITE', false);
define('SUBDOMAIN_INSTALL', false);
// define('DOMAIN_CURRENT_SITE', 'linkinhr.org');
define('DOMAIN_CURRENT_SITE', '192.168.1.8/blog');
define('PATH_CURRENT_SITE', '/');
define('SITE_ID_CURRENT_SITE', 1);
define('BLOG_ID_CURRENT_SITE', 1);

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
