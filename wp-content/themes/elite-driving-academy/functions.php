<?php
/**
 * Elite Driving Academy Theme Functions
 *
 * @package Elite_Driving_Academy
 * @since 1.0.0
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Theme Setup
 */
function elite_driving_academy_setup() {
    // Add theme support for various features
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-logo');
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // Add support for custom header
    add_theme_support('custom-header', array(
        'default-image' => '',
        'width' => 1920,
        'height' => 1080,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Add support for custom background
    add_theme_support('custom-background', array(
        'default-color' => 'ffffff',
    ));

    // Register navigation menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'elite-driving-academy'),
        'footer' => esc_html__('Footer Menu', 'elite-driving-academy'),
    ));

    // Add support for responsive embeds
    add_theme_support('responsive-embeds');

    // Add support for editor styles
    add_theme_support('editor-styles');
    add_editor_style('assets/css/editor-style.css');
}
add_action('after_setup_theme', 'elite_driving_academy_setup');

/**
 * Enqueue scripts and styles
 */
function elite_driving_academy_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style(
        'elite-driving-academy-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap',
        array(),
        '1.0.0'
    );

    // Enqueue Font Awesome
    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css',
        array(),
        '6.0.0'
    );

    // Enqueue main stylesheet
    wp_enqueue_style(
        'elite-driving-academy-style',
        get_template_directory_uri() . '/assets/css/style.css',
        array('elite-driving-academy-fonts', 'font-awesome'),
        '1.0.0'
    );

    // Enqueue main JavaScript
    wp_enqueue_script(
        'elite-driving-academy-script',
        get_template_directory_uri() . '/assets/js/script.js',
        array('jquery'),
        '1.0.0',
        true
    );

    // Localize script for AJAX
    wp_localize_script('elite-driving-academy-script', 'elite_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('elite_nonce'),
    ));

    // Enqueue comment reply script
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'elite_driving_academy_scripts');

/**
 * Register widget areas
 */
function elite_driving_academy_widgets_init() {
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'elite-driving-academy'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'elite-driving-academy'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 1', 'elite-driving-academy'),
        'id' => 'footer-1',
        'description' => esc_html__('Footer widget area 1.', 'elite-driving-academy'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 2', 'elite-driving-academy'),
        'id' => 'footer-2',
        'description' => esc_html__('Footer widget area 2.', 'elite-driving-academy'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 3', 'elite-driving-academy'),
        'id' => 'footer-3',
        'description' => esc_html__('Footer widget area 3.', 'elite-driving-academy'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => esc_html__('Footer 4', 'elite-driving-academy'),
        'id' => 'footer-4',
        'description' => esc_html__('Footer widget area 4.', 'elite-driving-academy'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'elite_driving_academy_widgets_init');

/**
 * Custom Post Types
 */
require get_template_directory() . '/inc/custom-post-types.php';

/**
 * Customizer additions
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Theme Options
 */
require get_template_directory() . '/inc/theme-options.php';

/**
 * AJAX Handlers
 */
require get_template_directory() . '/inc/ajax-handlers.php';

/**
 * Add custom body classes
 */
function elite_driving_academy_body_classes($classes) {
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    if (is_front_page()) {
        $classes[] = 'front-page';
    }

    return $classes;
}
add_filter('body_class', 'elite_driving_academy_body_classes');

/**
 * Excerpt length
 */
function elite_driving_academy_excerpt_length($length) {
    return 30;
}
add_filter('excerpt_length', 'elite_driving_academy_excerpt_length');

/**
 * Excerpt more
 */
function elite_driving_academy_excerpt_more($more) {
    return '...';
}
add_filter('excerpt_more', 'elite_driving_academy_excerpt_more');