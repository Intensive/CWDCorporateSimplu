<?php

define( 'DISALLOW_FILE_EDIT', true );

define( 'BWPS_AWAY_MODE', true );

define( 'WP_CONTENT_DIR', 'I:\www\wamp\www\CWDCorporateSimplu\lkjh' );
define( 'WP_CONTENT_URL', 'http://localhost/CWDCorporateSimplu/lkjh' );

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
define('DB_NAME', 'creativ2_corpostand');

/** MySQL database username */
define('DB_USER', 'creativ2_yitv78h');

/** MySQL database password */
define('DB_PASSWORD', 'GCU*gMseeJ4$(xS,S');

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
define('AUTH_KEY',         'Vg0GB{acXs|Bn kiWw(yIrRd)}=&2 |dWC>-MQ+R+vN^N-rt5N:jP}IoGm^bVIGI');
define('SECURE_AUTH_KEY',  'u-:M1Pdr|d>CfO0Ih/?9DMx6, $~<4|f|@=o`ryTc1/vW^7(*(6=ToD1>r4k8)g3');
define('LOGGED_IN_KEY',    '~X2_;A3i{&-Z[kR~r;)q]<Z4=I-dxknpaJ*|p1+2^^:&@0~;t[]*L}p#}2w)r7Da');
define('NONCE_KEY',        '2@||j-HXa{ymM%^`>ou%u6#b>V8aCd$]`+OloX5,pl$t{<55$p(>AY>-bz:&+rXW');
define('AUTH_SALT',        'cbY[.gk(^;,n$H|?:}Tl<+e o``%]2sLxEWm ,RcxGph5 [Uqpv2JL<UxP*Cx%Yq');
define('SECURE_AUTH_SALT', '@UG|4f ;#ztPAz07I>iB)5/[b.)$/<4lq399-+SWW!W{QhW(P-l+Ij(+C`P?.LxH');
define('LOGGED_IN_SALT',   '+zp!+0r|0;?hWE^*b(z{+R}v &{qJ=4h[YK,NkJfBzf+~p*&mbxaZpzu2h|IZ{J!');
define('NONCE_SALT',       'TC13Eu:jU17%6,@rq]*HJ+=h5nc:+0d[la^I.RwA#ggI>=7|ME#t+ex~UB4]bz9+');

/**#@-*/

/**
* WordPress Database Table prefix.
*
* You can have multiple installations in one database if you give each a unique
* prefix. Only numbers, letters, and underscores please!
*/
$table_prefix  = 'prf_';

/**
* WordPress Localized Language, defaults to English.
*
* Change this to localize WordPress. A corresponding MO file for the chosen
* language must be installed to wp-content/languages. For example, install
* de_DE.mo to wp-content/languages and set WPLANG to 'de_DE' to enable German
* language support.
*/
define('WPLANG', 'ro_RO');

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
