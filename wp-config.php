<?php
define('WP_AUTO_UPDATE_CORE', 'minor');// This setting is required to make sure that WordPress updates can be properly managed in WordPress Toolkit. Remove this line if this WordPress website is not managed by WordPress Toolkit anymore.
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, and ABSPATH. You can find more information by visiting
 * {@link http://codex.wordpress.org/Editing_wp-config.php Editing wp-config.php}
 * Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'crsuppor_wp');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '4v-$!XH|nL?*Mhg Q_p?uide5t656L.-,!dD3]-=I[u+T|9}C9sOgh7oD-fK(~w+y =HvVC)P?');
define('SECURE_AUTH_KEY',  'jo9~I7;>jJ/-md++H-aw,&b:tO4-*|}0>`eihnObZAti7653G?cJ7[f9Zxs-eh6566RQoBG=O[');
define('LOGGED_IN_KEY',    '3vSwgBD,U(o~&Uo`Mkm|u>tkmm343f(Z_V$9<b`$v{~ytnp!-tvh`PK]EG|E56hgg1Hl&*$cJ:');
define('NONCE_KEY',        '29aQ2nTfuPX^?CzC~>#/q,$0K0tu^Va,I!]rEdf4545hg56h1}7SIxiF63wgz$091-{=./uC9 ');
define('AUTH_SALT',        '(-8>0s00ko:*![rkl@S.kgfb6t5n8R_@[Y.*v|*Lss6!-7E6hgo/>-+e(pfLq}ep; tIk7Hz+%');
define('SECURE_AUTH_SALT', 'Q< De-0[7PCy,F6BB7F}@brio0tPd5K,Rm8XpJE90+pp$a|?0oU4$AH|v.+=*fF2Q3Yi4[69R+');
define('LOGGED_IN_SALT',   'Z:<45($;.~j:b;D&{W:*yOpot_BPyR]dV8@-poC:R=S*^H}pC98McrFy4n*;|VS2o~KL7OGL7J');
define('NONCE_SALT',       'mv$Qk67+0<[8TV./4jytu7n:SB[$[Ly+wuy<]05@4Lh>oQRmyd^h U_XJs1pb%a +i+:+[Wh|?');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
