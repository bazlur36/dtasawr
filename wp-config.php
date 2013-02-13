<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wp_tasawr');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', 'root');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'i)kzs]5$_2,B6U3@<{iM:xi@v>%-!0^^%(b^,$)&gbB=q]fzF?iD7`HF@(m`Q!qJ');
define('SECURE_AUTH_KEY',  '^SQ-S0/*t^>vS9at*.U!__*TaB<FoK}@6/R9R40J3qwJf#Vwp5/`)##>QavfR3V/');
define('LOGGED_IN_KEY',    'f%S0o~%wN;vg=yBO/eNX31(nI{#Mvy9[OiA]HrL&)PG}.Ks8VX9Hd@=ol5]By%1N');
define('NONCE_KEY',        'R<Fw,wDEil[,$G=4.v~bo+LPvs7r^Hrgx4en+MT{,Tv?qWv[YWzv^<K6o|]M=[#~');
define('AUTH_SALT',        'oG]XAMq--*}U~+s$DRcB7:|C1rMWC:c-Q)}Fjk()[l+LyZu{Y+~xjL^3<v05 Oo@');
define('SECURE_AUTH_SALT', '~>t&c%tzBx_vQT;8r6j~KkN(4b.;;9R Z4T09g$(pVEa:6lmUAK57|t(U%K&O[P_');
define('LOGGED_IN_SALT',   '%Bl1;;*#4EFFJJ[HuFfaEBf_7&|Bx/-T^+|r+7oyJ$<LGgC)m~11S[2@uIs|?<CJ');
define('NONCE_SALT',       'os-hx!Ut)9fntAWMRGBq,WFs!=iW;I bnlb`iWwP0mh#N3w[M,_.+iFD3t-P?ASK');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'tsr_';

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
 * language support.
 */
define('WPLANG', '');

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

