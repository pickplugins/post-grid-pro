<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

include_once( ABSPATH . 'wp-admin/includes/plugin.php' );


if ( is_plugin_active( 'advanced-custom-fields/acf.php' ) ||  is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {

    require_once( post_grid_pro_plugin_dir . 'includes/3rd-party/advanced-custom-fields/layout-elements.php');
}

if ( is_plugin_active( 'advanced-custom-fields-font-awesome/acf-font-awesome.php' ) ) {

    require_once( post_grid_pro_plugin_dir . 'includes/3rd-party/advanced-custom-fields-font-awesome/layout-elements.php');
}


if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {

    require_once( post_grid_pro_plugin_dir . 'includes/3rd-party/woocommerce/layout-elements.php');
}

if ( is_plugin_active( 'easy-digital-downloads/easy-digital-downloads.php' ) ) {

    require_once( post_grid_pro_plugin_dir . 'includes/3rd-party/easy-digital-downloads/layout-elements.php');
}

if ( is_plugin_active( 'the-events-calendar/the-events-calendar.php' ) ) {

    require_once( post_grid_pro_plugin_dir . 'includes/3rd-party/the-events-calendar/layout-elements.php');
}

if ( is_plugin_active( 'events-manager/events-manager.php' ) ) {

    require_once( post_grid_pro_plugin_dir . 'includes/3rd-party/events-manager/layout-elements.php');
}


if ( is_plugin_active( 'custom-field-suite/cfs.php' ) ) {

    require_once( post_grid_pro_plugin_dir . 'includes/3rd-party/custom-field-suite/layout-elements.php');
}



if ( is_plugin_active( 'pods/init.php' ) ) {

    require_once( post_grid_pro_plugin_dir . 'includes/3rd-party/pods/layout-elements.php');
}


if ( is_plugin_active( 'cmb2/init.php' ) ) {

    require_once( post_grid_pro_plugin_dir . 'includes/3rd-party/cmb2/layout-elements.php');
}

if ( is_plugin_active( 'event-organiser/event-organiser.php' ) ) {

    require_once( post_grid_pro_plugin_dir . 'includes/3rd-party/event-organiser/layout-elements.php');
}

if ( is_plugin_active( 'wp-user-frontend/wpuf.php' ) ) {

  require_once( post_grid_pro_plugin_dir . 'includes/3rd-party/wp-user-frontend/layout-elements.php');
}

