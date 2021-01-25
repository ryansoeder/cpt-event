<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://ryansoeder.github.io/
 * @since             1.0.0
 * @package           Cpt_Event
 *
 * @wordpress-plugin
 * Plugin Name:       CPT Event
 * Plugin URI:        https://github.com/ryansoeder/cpt-event
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Ryan Soeder
 * Author URI:        https://ryansoeder.github.io/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       cpt-event
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CPT_EVENT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-cpt-event-activator.php
 */
function activate_cpt_event() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cpt-event-activator.php';
	Cpt_Event_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-cpt-event-deactivator.php
 */
function deactivate_cpt_event() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-cpt-event-deactivator.php';
	Cpt_Event_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_cpt_event' );
register_deactivation_hook( __FILE__, 'deactivate_cpt_event' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-cpt-event.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_cpt_event() {

	$plugin = new Cpt_Event();
	$plugin->run();

}
run_cpt_event();
