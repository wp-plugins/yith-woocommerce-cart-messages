<?php
/*
* Plugin Name: YITH WooCommerce Cart Messages Premium
* Plugin URI: http://yithemes.com/themes/plugins/yith-woocommerce-cart-messages
* Description: YITH WooCommerce Cart Messages Premium is a plugin for add custom messages to your customers
* Author: Yithemes
* Text Domain: ywcm
* Version: 1.0.1
* Author URI: http://yithemes.com/
* Text Domain: ywcm
* Domain Path: /languages/
*/


if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

if ( ! function_exists( 'is_plugin_active' ) ) {
    require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}


// Woocommerce installation check _________________________

if ( ! function_exists( 'WC' ) ) {
    function ywcm_install_premium_woocommerce_admin_notice() {
        ?>
        <div class="updated">
            <p><?php _e( 'You can\'t activate the plugin if you haven\'t activate woocommerce in advance.', 'ywcm' ); ?></p>
        </div>
    <?php
    }
    add_action( 'admin_notices', 'ywcm_install_premium_woocommerce_admin_notice' );
    return ;
}

// Free version deactivation if installed __________________

if( ! function_exists( 'yit_deactive_free_version' ) ) {
    require_once 'plugin-fw/yit-deactive-plugin.php';
}
yit_deactive_free_version( 'YITH_YWCM_FREE_INIT', plugin_basename( __FILE__ ) );


// Load YWCM text domain ___________________________________

load_plugin_textdomain( 'ywcm', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


// Define constants ________________________________________

if ( defined( 'YITH_YWCM_VERSION' ) ) {
    return;
}else{
    define( 'YITH_YWCM_VERSION', '1.0' );
}

if ( ! defined( 'YITH_YWCM_PREMIUM' ) ) {
    define( 'YITH_YWCM_PREMIUM', '1' );
}

if ( ! defined( 'YITH_YWCM_FILE' ) ) {
	define( 'YITH_YWCM_FILE', __FILE__ );
}

if ( ! defined( 'YITH_YWCM_DIR' ) ) {
	define( 'YITH_YWCM_DIR', plugin_dir_path( __FILE__ ) );
}

if ( ! defined( 'YITH_YWCM_URL' ) ) {
	define( 'YITH_YWCM_URL', plugins_url( '/', __FILE__ ) );
}

if ( ! defined( 'YITH_YWCM_ASSETS_URL' ) ) {
	define( 'YITH_YWCM_ASSETS_URL', YITH_YWCM_URL . 'assets' );
}

if ( ! defined( 'YITH_YWCM_TEMPLATE_PATH' ) ) {
	define( 'YITH_YWCM_TEMPLATE_PATH', YITH_YWCM_DIR . 'templates' );
}

if ( ! defined( 'YITH_YWCM_INIT' ) ) {
	define( 'YITH_YWCM_INIT', plugin_basename( __FILE__ ) );
}

if ( ! defined( 'YITH_YWCM_SLUG' ) ) {
	define( 'YITH_YWCM_SLUG', 'yith-woocommerce-cart-messages' );
}

if ( ! defined( 'YITH_YWCM_SECRET_KEY' ) ) {
	define( 'YITH_YWCM_SECRET_KEY', 't0mx22f19jkH2AP9TSPU' );
}

// Load required classes and functions _________________________

require_once( YITH_YWCM_DIR . 'yith-cart-messages-functions.php' );
require_once( YITH_YWCM_DIR . 'class.yith-woocommerce-cart-messages.php' );
require_once( YITH_YWCM_DIR . 'class.yith-woocommerce-cart-messages-premium.php' );
require_once( YITH_YWCM_DIR . 'class.yith-woocommerce-cart-message.php' );

global $YWCM_Instance;
$YWCM_Instance = new YWCM_Cart_Messages_Premium();
