<?php
/**
 * Theme Updater
 *
 * @package drape
 */

// Includes the files needed for the theme updater
if ( !class_exists( 'EDD_Theme_Updater_Admin' ) ) {
	require get_template_directory() . '/inc/updater/theme-updater-admin.php';
}

// Loads the updater classes
$updater = new EDD_Theme_Updater_Admin(

	// Config settings
	$config = array(
		'remote_api_url' => 'http://sharkthemes.com', // Site where EDD is hosted
		'item_name'      => 'Drape', // Name of theme
		'theme_slug'     => 'drape', // Theme slug
		'version'        => '1.0.2', // The current version of this theme
		'author'         => 'Shark Themes', // The author of this theme
		'download_id'    => '', // Optional, used for generating a license renewal link
		'renew_url'      => 'http://sharkthemes.com/my-account' // Optional, allows for a custom license renewal link
	),

	// Strings
	$strings = array(
		'theme-license'             => __( 'Theme License', 'drape' ),
		'enter-key'                 => __( 'Enter your theme license key.', 'drape' ),
		'license-key'               => __( 'License Key', 'drape' ),
		'license-action'            => __( 'License Action', 'drape' ),
		'deactivate-license'        => __( 'Deactivate License', 'drape' ),
		'activate-license'          => __( 'Activate License', 'drape' ),
		'status-unknown'            => __( 'License status is unknown.', 'drape' ),
		'renew'                     => __( 'Renew?', 'drape' ),
		'unlimited'                 => __( 'unlimited', 'drape' ),
		'license-key-is-active'     => __( 'License key is active.', 'drape' ),
		'expires%s'                 => __( 'Expires %s.', 'drape' ),
		'%1$s/%2$-sites'            => __( 'You have %1$s / %2$s sites activated.', 'drape' ),
		'license-key-expired-%s'    => __( 'License key expired %s.', 'drape' ),
		'license-key-expired'       => __( 'License key has expired.', 'drape' ),
		'license-keys-do-not-match' => __( 'License keys do not match.', 'drape' ),
		'license-is-inactive'       => __( 'License is inactive.', 'drape' ),
		'license-key-is-disabled'   => __( 'License key is disabled.', 'drape' ),
		'site-is-inactive'          => __( 'Site is inactive.', 'drape' ),
		'license-status-unknown'    => __( 'License status is unknown.', 'drape' ),
		'update-notice'             => __( "Updating this theme will lose any customizations you have made. 'Cancel' to stop, 'OK' to update.", 'drape' ),
		'update-available'          => __('<strong>%1$s %2$s</strong> is available. <a href="%3$s" class="thickbox" title="%4$s">Check out what\'s new</a> or <a href="%5$s"%6$s>update now</a>.', 'drape' )
	)

);
