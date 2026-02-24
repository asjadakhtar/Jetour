<?php
/**
 * Asset Management Functions
 * 
 * Handles the efficient loading of CSS and JavaScript files
 * with proper versioning and dependency management.
 *
 * @package Canal Motor
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit;
}

// Enqueue the fullpage.js library
function enqueue_fullpage_js() {
    wp_enqueue_script(
        'fullpage-js',
        'https://cdnjs.cloudflare.com/ajax/libs/fullpage.js/3.1.0/fullpage.min.js',
        array(),
        '3.1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_fullpage_js');

/**
 * Define asset paths and configurations
 */
// Theme asset manifest - only reference files that exist in the theme to avoid leaks
define('THEME_ASSETS', [
    'css' => [
        'goldman' => [
            'path' => '/assets/fonts/goldman/stylesheet.css',
            'deps' => []
        ],
        'roboto' => [
            'path' => '/assets/fonts/roboto/stylesheet.css',
            'deps' => []
        ],
        'fullpage' => [ 
            'path' => '/node_modules/fullpage/fullpage.min.css',
            'deps' => []
        ],
        'tailwind-output' => [
            'path' => '/assets/css/tailwind-output.css',
            'deps' => []
        ],
        'main' => [
            'path' => '/assets/css/custom.css',
            'deps' => ['fullpage'] // now depends on fullPage CSS
        ],
        'aos' => [
            'path' => '/node_modules/aos/dist/aos.css',
            'deps' => []
        ],
        'swiper' => [
            'path' => '/node_modules/swiper/swiper-bundle.min.css',
            'deps' => []
        ],
    ],
    'js' => [
        'fullpage' => [ 
            'path' => '/node_modules/fullpage/fullpage.min.js',
            'deps' => ['jquery'] 
        ],
        'gsap' => [ 
            'path' => '/node_modules/gsap/gsap.min.js',
            'deps' => [] 
        ],
        // 'swiper' => [
        //     'path' => '/node_modules/swiper/swiper-bundle.min.js',
        //     'deps' => []
        // ],
        // 'aos' => [
        //     'path' => '/node_modules/aos/dist/aos.js',
        //     'deps' => []
        // ],
        'gsap-custom' => [ 
            'path' => '/assets/js/gsap.js',
            'deps' => [] 
        ],
        'main' => [ // Custom JS
            'path' => '/assets/js/custom.js',
            'deps' => ['jquery', 'fullpage', 'gsap'] 
        ]
    ]
]);



/**
 * Enqueue stylesheet with proper version control
 */
function enqueue_theme_style($handle, $path, $deps = []) {
    $full_path = THEME_DIR . $path;
    
    if (!file_exists($full_path)) {
        return;
    }

    wp_enqueue_style(
        $handle,
        THEME_URI . $path,
        $deps,
        filemtime($full_path)
    );
}

/**
 * Enqueue script with proper version control
 */
function enqueue_theme_script($handle, $path, $deps = []) {
    $full_path = THEME_DIR . $path;
    
    if (!file_exists($full_path)) {
        return;
    }

    wp_enqueue_script(
        $handle,
        THEME_URI . $path,
        $deps,
        filemtime($full_path),
        true
    );
}

/**
 * Main enqueue function for all theme assets
 */
function enqueue_theme_assets() {
    // Enqueue Styles
    foreach (THEME_ASSETS['css'] as $handle => $asset) {
        enqueue_theme_style($handle, $asset['path'], $asset['deps']);
    }

    // Enqueue Scripts
    wp_enqueue_script('jquery');  // WordPress core jQuery (enqueue only the handle; WP will provide the file)
    foreach (THEME_ASSETS['js'] as $handle => $asset) {
        enqueue_theme_script($handle, $asset['path'], $asset['deps']);
    }

    // Localize Scripts
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');

// Note: theme supports such as WooCommerce should be declared in support.php (after theme setup)


