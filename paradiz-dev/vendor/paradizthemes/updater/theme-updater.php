<?php
/**
 * Easy Digital Downloads Theme Updater
 *
 * @package paradiz
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	include( dirname( __FILE__ ) . '/theme-updater-admin.php' );
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'https://www.designrest.com', // Site where EDD is hosted
		'item_name'      => 'Paradiz: Multipurpose Theme โดยคนไทยเพื่อคนไทย', // Name of theme
		'theme_slug'     => 'paradiz', // Theme slug
		'version'        => '1.0.0', // The current version of this theme
		'author'         => 'YourPlans', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => '', // Optional, allows for a custom license renewal link
		'beta'           => false, // Optional, set to true to opt into beta versions
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'paradiz' ),
		'enter-key'                 => __( 'Enter Paradiz theme license key. You can find from <a href="https://www.designrest.com/my-account/" target="_blank">Account Page</a>.', 'paradiz' ),
		'license-key'               => __( 'License Key', 'paradiz' ),
		'license-action'            => __( 'License Action', 'paradiz' ),
		'deactivate-license'        => __( 'Deactivate License', 'paradiz' ),
		'activate-license'          => __( 'Activate License', 'paradiz' ),
		'status-unknown'            => __( 'License status is unknown.', 'paradiz' ),
		'renew'                     => __( 'Renew?', 'paradiz' ),
		'unlimited'                 => __( 'unlimited', 'paradiz' ),
		'license-key-is-active'     => __( 'License key is active.', 'paradiz' ),
		'expires%s'                 => __( 'Expires %s.', 'paradiz' ),
		'expires-never'             => __( 'Lifetime License.', 'paradiz' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'paradiz' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'paradiz' ),
		'license-key-expired'       => __( 'License key has expired.', 'paradiz' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'paradiz' ),
		'license-is-inactive'       => __( 'License is inactive.', 'paradiz' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'paradiz' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'paradiz' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'paradiz' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'paradiz' ),
		'update-available'          => __( '<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'paradiz' ),
	)

);
