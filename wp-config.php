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
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'nhakhoasaomy');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'F~})c.-]5f}KPT[%dm<=+=2I+5e_x/dO2*<LUil*=HU(xz1+bbEGeC HK%Ik(rLo');
define('SECURE_AUTH_KEY',  'FElhltJ|/y]9 n3+~3H:i VvU_tdthFX6Beytch4].w7eF^x[{`uDxtLK`luD6a!');
define('LOGGED_IN_KEY',    'D7ncYDV+ce|oCDqg#].`a`v^)m0-m[Y>(7ei+~.l~em4Rp~S}FWue{?lCkMs{1aR');
define('NONCE_KEY',        'W^r*12}$a)X cfTfi+}Yu#=WjNftFAyuLoY`objutV 10]I_)k.lb${7Q;VVlb)+');
define('AUTH_SALT',        'y:wi n07BKtSG] c9;I^B!P+{*X#B~[F|y~d]Nr_ x}S,&DraI$HoqT&-%Uu^[eG');
define('SECURE_AUTH_SALT', ')Hg%*!f2[Y<>X&gKm|#+CYfy*D8>`mL+-$C5qBiWO7)e><#DJ^]0Bc]c|2%R$_I+');
define('LOGGED_IN_SALT',   'qWN=-c?}UM%.gR3weIQ`6=3a*]Hxlwbp0k1IKNOK33MHtFtjByeNOE1YE#^I/5:w');
define('NONCE_SALT',       'Y-ma|]t9HzcMR{3,+@RNdB}]L^[c0G8,/:h~~}Ci5JbKsEa&M#JgOq)r2_Jg{TR,');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'smdental_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
