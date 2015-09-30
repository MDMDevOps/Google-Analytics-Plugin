<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.midwestdigitalmarketing.com
 * @since             1.0.0
 * @package           Mpress_Analytics
 *
 * @wordpress-plugin
 * Plugin Name: Mpress Google Analytics
 * Plugin URI: http://www.midwestdigitalmarketing.com
 * Description: This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version: 1.0.1
 * Author: Midwest Digital Marketing
 * Author URI: http://www.midwestdigitalmarketing.com
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: mpress-analytics
 * Domain Path: /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-mpress-analytics-activator.php
 */
function activate_mpress_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mpress-analytics-activator.php';
	Mpress_Analytics_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-mpress-analytics-deactivator.php
 */
function deactivate_mpress_analytics() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-mpress-analytics-deactivator.php';
	Mpress_Analytics_Deactivator::deactivate();
}
/**
 * The code that runs to update the plugin when an update is pushed to the repo
 * This action is documented in includes/class-mpress-analytics-updater.php
 */
function update_mpress_analytics() {
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-mpress-analytics-updater.php';
    if ( is_admin() ) {
        define( 'WP_GITHUB_FORCE_UPDATE', true );
        $config = array(
            'slug'                  => plugin_basename( __FILE__ ),
            'proper_folder_name'    => 'mpress-analytics',
            'api_url'               => 'https://api.github.com/repos/MDMDevOps/Google-Analytics-Plugin',
            'raw_url'               => 'https://raw.github.com/MDMDevOps/Google-Analytics-Plugin/master',
            'github_url'            => 'https://github.com/MDMDevOps/Google-Analytics-Plugin',
            'zip_url'               => 'https://github.com/MDMDevOps/Google-Analytics-Plugin/archive/master.zip',
            'sslverify'             => false,
            'requires'              => '4.0',
            'tested'                => '4.3',
            'readme'                => 'README.md',
            'access_token'          => ''
        );
        $plugin_update = new WP_GitHub_Updater( $config );
    }
}
update_mpress_analytics();

register_activation_hook( __FILE__, 'activate_mpress_analytics' );
register_deactivation_hook( __FILE__, 'deactivate_mpress_analytics' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-mpress-analytics.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_mpress_analytics() {

	$plugin = new Mpress_Analytics();
	$plugin->run();

}
run_mpress_analytics();

// Update Plugin


