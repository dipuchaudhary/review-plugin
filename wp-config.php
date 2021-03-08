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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'plugin' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '7j|mkx-_V<<B5,Eyx`RKrV}pIXRyM_IlF#en}~K;$f[y^h3/,SxENokkJ-eiI+:v' );
define( 'SECURE_AUTH_KEY',  '([7!JXR|p.?TMPBX0enhJRnl:+j=V+2k6Nk4_|a)Wx{WLr#n]J-D[@-sod9gn(r)' );
define( 'LOGGED_IN_KEY',    'HVv^oXA>{)/uD/MJ*(w!W}#mR~/(9_}7M^n)iTlUre;z~6!xD^ }|tMf/G4jpX/Y' );
define( 'NONCE_KEY',        ':&Nr201yD74dwx`9YtvmCiYWf[t/uiTQ3|$E?/S]B`fYE:*JA/*vk0>N@QHLI0UM' );
define( 'AUTH_SALT',        'IAJrRjrD]N50U.RRt/Q7B~ecP NiACUz`FLW5l2e7Su$ ^[8.J5}@<^ZPRLBIm^1' );
define( 'SECURE_AUTH_SALT', 'Z3STn#NAkM+2E@g9.c|;>#6P@5L<;8K(5hfCT!&fm]41~[$fmCe6Nsszi6@B3]BB' );
define( 'LOGGED_IN_SALT',   '@@4<E|T0/d1$Ob8M40Ps@^jv25>DJJt:A&ymp`JeV~)ize@+u+NJd_.lP96Eb|MX' );
define( 'NONCE_SALT',       '014QV`0[g`c ERk8^4tg5h&pheWNZ?ps=y;rXip{lp0w[i`Vsv&`f=Rh~qJCYfEv' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
