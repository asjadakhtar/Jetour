<?php
/**
 * Custom Post Types & Taxonomies from JSON + Featured Option
 */

/**
 * Register CPTs and taxonomies from JSON
 */
add_action('init', 'register_cpts_from_json');

function register_cpts_from_json() {
    $json_file = __DIR__ . '/register.json'; // Path to JSON file

    if (!file_exists($json_file)) {
        return;
    }

    $cpts = json_decode(file_get_contents($json_file), true);

    if (empty($cpts) || !is_array($cpts)) {
        return;
    }

    foreach ($cpts as $cpt) {
        $post_type = $cpt['post_type'];

        // --- Register Taxonomy if exists ---
        if (!empty($cpt['taxonomy'])) {
            $taxonomy_name = $cpt['taxonomy']['name'];

            register_taxonomy(
                $taxonomy_name,
                [$post_type],
                [
                    'labels'            => $cpt['taxonomy']['labels'],
                    'hierarchical'      => true,
                    'public'            => true,
                    'show_ui'           => true,
                    'show_admin_column' => true,
                    'show_in_nav_menus' => true,
                    'show_tagcloud'     => true,
                    'show_in_rest'      => true,
                ]
            );
        }

        // --- Register Custom Post Type ---
        register_post_type($post_type, [
            'show_in_rest' => true,
            'supports'     => $cpt['supports'],
            'rewrite'      => ['slug' => $cpt['slug']],
            'has_archive'  => true,
            'public'       => true,
            'taxonomies'   => !empty($taxonomy_name) ? [$taxonomy_name] : [],
            'labels'       => $cpt['labels'],
            'menu_icon'    => $cpt['menu_icon'],
        ]);

        // --- Add Featured Option Meta Box if enabled ---
        if (!empty($cpt['has_featured_option']) && $cpt['has_featured_option'] === true) {
            add_action('add_meta_boxes_' . $post_type, 'add_featured_meta_box');
            add_action('save_post_' . $post_type, 'save_featured_meta', 10, 2);
        }
    }
}

/**
 * Add "Featured Option" meta box
 */
function add_featured_meta_box($post) {
    add_meta_box(
        'featured_option',        // ID
        'Featured Option',        // Title
        'featured_meta_html',     // Callback
        $post->post_type,         // Screen
        'side',                   // Context
        'default'                 // Priority
    );
}

/**
 * Render HTML for Featured Option meta box
 */
function featured_meta_html($post) {
    wp_nonce_field('featured_nonce_action', 'featured_nonce');

    $is_featured = get_post_meta($post->ID, '_is_featured', true);
    ?>
    <p>
        <input type="checkbox" id="featured_checkbox" name="featured_checkbox" value="1" <?php checked($is_featured, '1'); ?>>
        <label for="featured_checkbox">Mark this item as featured</label>
    </p>
    <?php
}

/**
 * Save Featured Option meta data
 */
function save_featured_meta($post_id, $post) {
    // Nonce check
    if (!isset($_POST['featured_nonce']) || !wp_verify_nonce($_POST['featured_nonce'], 'featured_nonce_action')) {
        return;
    }

    // Permission check
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Prevent autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    $is_featured = isset($_POST['featured_checkbox']) ? '1' : '0';
    update_post_meta($post_id, '_is_featured', $is_featured);
}
