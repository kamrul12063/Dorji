<?php

/**
 * Plugin Name: Dorji
 */



if (!defined('ABSPATH'))
	exit();
if (!defined('DORJI_PLUGIN_DIR'))
	define('DORJI_PLUGIN_DIR', plugin_dir_path(__FILE__));
if (!defined('DORJI_PLUGIN_URL'))
	define('DORJI_PLUGIN_URL', plugins_url().'/dorji');



if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

} else {
	if ( !function_exists( 'deactivate_plugins' ) ) {
		require_once ABSPATH . '/wp-admin/includes/plugin.php';
	}
	deactivate_plugins('dorji/dorji.php');
	add_action( 'init', function() { echo "<div id=\"message\" class=\"error updated notice is-dismissible\"><p>Install or active woocommerce</p><button type=\"button\" class=\"notice-dismiss\"><span class=\"screen-reader-text\">Dismiss this notice.</span></button></div>";});
}

function dorji_include_assets() {
	//styles
	//wp_enqueue_style("bootstrap", DORJI_PLUGIN_URL . "/assets/css/bootstrap.min.css", '');
	wp_enqueue_style("datatable", DORJI_PLUGIN_URL . "/assets/css/jquery.dataTables.min.css", '');
	wp_enqueue_style("notifybar", DORJI_PLUGIN_URL . "/assets/css/jquery.notifyBar.css", '');
	wp_enqueue_style("style", DORJI_PLUGIN_URL . "/assets/css/style.css", '');
	//scripts
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap.min.js', DORJI_PLUGIN_URL . '/assets/js/bootstrap.min.js', '', true);
	wp_enqueue_script('validation.min.js', DORJI_PLUGIN_URL . '/assets/js/jquery.validate.min.js', '', true);
	wp_enqueue_script('datatable.min.js', DORJI_PLUGIN_URL . '/assets/js/jquery.dataTables.min.js', '', true);
	wp_enqueue_script('jquery.notifyBar.js', DORJI_PLUGIN_URL . '/assets/js/jquery.notifyBar.js', '', true);
	wp_enqueue_script('script.js', DORJI_PLUGIN_URL . '/assets/js/script.js', '', true);
	wp_localize_script("script.js","dorjiajaxurl",admin_url("admin-ajax.php"));
}

add_action("init", "dorji_include_assets");