<?php

function theme_support()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_support');

function theme_menus()
{
    $locations = [
        'primary' => 'Desktop primary',
        'footer' => 'Footer menu items',
    ];
    register_nav_menus($locations);
}
add_action('init', 'theme_menus');

function register_scripts_and_styles()
{
    $version = wp_get_theme()->get('Version');

    wp_enqueue_style(
        'theme-styles',
        get_template_directory_uri() . '/style.css',
        [],
        $version,
        'all'
    );

    // Enqueue jQuery from the WordPress core
    wp_enqueue_script('jquery');

    // Enqueue your custom JavaScript file that depends on jQuery
    wp_enqueue_script(
        'Parallax',
        get_template_directory_uri() . '/assets/js/parallax.min.js',
        ['jquery'],
        null,
        true
    );

    // Enqueue AOS styles
    wp_enqueue_style(
        'AOS_animate',
        'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css',
        false,
        '2.1.1'
    );

    // Enqueue AOS script library in footer
    wp_enqueue_script(
        'AOS',
        'https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js',
        false,
        '2.1.1',
        true
    );

    // Enqueue the script that initializes AOS
    wp_enqueue_script(
        'theme-js',
        get_template_directory_uri() . '/assets/js/script.js',
        ['AOS'],
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'register_scripts_and_styles');

function register_google_fonts()
{
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Baskervville&family=Poppins:ital,wght@0,400;0,600;1,400&display=swap'
    );
}
add_action('wp_enqueue_scripts', 'register_google_fonts');

// Customizer File
require get_template_directory() . '/customizer.php';

/**
 * Custom post types
 */
function custom_post_type_registration()
{
    $labels = [
        'name' => _x('References', 'Post Type General Name'),
        'singular_name' => _x('Reference', 'Post Type Singular Name'),
        'menu_name' => __('References'),
        'all_items' => __('All References'),
        'view_item' => __('View Reference'),
        'add_new_item' => __('Add New Reference'),
        'add_new' => __('Add New'),
        'edit_item' => __('Edit Reference'),
        'update_item' => __('Update Reference'),
        'search_items' => __('Search Reference'),
        'not_found' => __('References Not Found'),
        'not_found_in_trash' => __('Reference not found in Trash'),
    ];

    $args = [
        'public' => true,
        'label' => 'References',
        'labels' => $labels,
        'supports' => [
            'title',
            'editor',
            'excerpt',
            'author',
            'thumbnail',
            'revisions',
            'custom-fields',
        ],
        'hierarchical' => false,
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'show_in_nav_menus' => true,
        'show_in_admin_bar' => true,
        'menu_position' => 5,
        'can_export' => true,
        'has_archive' => true,
        'exclude_from_search' => false,
        'publicly_queryable' => true,
        'capability_type' => 'post',
        'show_in_rest' => true,
    ];
    register_post_type('references', $args);
}
add_action('init', 'custom_post_type_registration');

/**
 * Add Featured Reference Select Meta Box
 */
function add_featured_reference_meta_box()
{
    add_meta_box(
        'featured_reference_meta_box',
        'Select Featured Reference',
        'display_featured_reference_meta_box',
        'references',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_featured_reference_meta_box');

function display_featured_reference_meta_box($post)
{
    $featured_reference_id = get_theme_mod('featured_reference_id');
    $references = get_posts(['post_type' => 'references']);

    echo '<label for="featured_reference_id">Select Featured Reference:</label>';
    echo '<select name="featured_reference_id" id="featured_reference_id">';
    echo '<option value="">None</option>';

    foreach ($references as $reference_item) {
        echo '<option value="' .
            $reference_item->ID .
            '" ' .
            selected(
                $featured_reference_id,
                $reference_item->ID,
                false
            ) .
            '>' .
            get_the_title($reference_item->ID) .
            '</option>';
    }
    echo '</select>';
}

function save_featured_reference_meta_box()
{
    if (array_key_exists('featured_reference_id', $_POST)) {
        set_theme_mod(
            'featured_reference_id',
            $_POST['featured_reference_id']
        );
    }
}
add_action('save_post', 'save_featured_reference_meta_box');

?>
