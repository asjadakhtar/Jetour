<?php
/**
 * Theme Functions and Definitions
 *
 * @package Jetour
 * @version 1.0.0
 * @author Asjad
 * This file contains the core functionality for the WordPress theme.
 * It handles theme setup, asset management, custom post types,
 * and other essential features.
 */

if (!defined('ABSPATH')) {
    exit;
}

defined('THEME_DIR') || define('THEME_DIR', get_template_directory());
defined('THEME_URI') || define('THEME_URI', get_template_directory_uri());

/*
 * WordPress Theme Security
 */
require_once THEME_DIR . '/php/theme-settings/security.php';

/*
 * WordPress Theme Support
 */
require_once THEME_DIR . '/php/theme-settings/support.php';

/*
 * WordPress Theme Enqueue
 */
require_once THEME_DIR . '/php/theme-settings/enqueue.php';

/*
 * Custom Fields
 */
require_once THEME_DIR . '/php/custom-fields/config.php';

/*
 * WordPress Theme Components - Functions of predefined components
 */
require_once THEME_DIR . '/php/theme-settings/components.php';

/*
 * Custom Post Types
 */
require_once THEME_DIR . '/php/custom-post-types/config.php';





// ✅ Show server-side path in the WordPress Media Library
if ( is_admin() ) {
    add_filter('attachment_fields_to_edit', 'show_server_file_path_in_media', 10, 2);
}

function show_server_file_path_in_media($form_fields, $post) {
    // Only show the real server path to users with a high-level capability
    if ( ! current_user_can( 'manage_options' ) ) {
        return $form_fields;
    }

    $file_path = get_attached_file($post->ID);
    if ($file_path) {
        // Only display the path to trusted admin users and escape output
        $form_fields['server_file_path'] = array(
            'label' => 'Server File Path',
            'input' => 'html',
            'html'  => '<input type="text" readonly value="' . esc_attr($file_path) . '" style="width:100%; background:#f3f4f6; border:1px solid #ccc; padding:6px;">'
        );
    }
    return $form_fields;
}

