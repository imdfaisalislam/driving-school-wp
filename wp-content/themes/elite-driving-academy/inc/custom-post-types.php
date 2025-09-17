<?php
/**
 * Custom Post Types for Elite Driving Academy Theme
 *
 * @package Elite_Driving_Academy
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Instructors Custom Post Type
 */
function elite_driving_academy_register_instructors() {
    $labels = array(
        'name'               => esc_html__('Instructors', 'elite-driving-academy'),
        'singular_name'      => esc_html__('Instructor', 'elite-driving-academy'),
        'menu_name'          => esc_html__('Instructors', 'elite-driving-academy'),
        'name_admin_bar'     => esc_html__('Instructor', 'elite-driving-academy'),
        'add_new'            => esc_html__('Add New', 'elite-driving-academy'),
        'add_new_item'       => esc_html__('Add New Instructor', 'elite-driving-academy'),
        'new_item'           => esc_html__('New Instructor', 'elite-driving-academy'),
        'edit_item'          => esc_html__('Edit Instructor', 'elite-driving-academy'),
        'view_item'          => esc_html__('View Instructor', 'elite-driving-academy'),
        'all_items'          => esc_html__('All Instructors', 'elite-driving-academy'),
        'search_items'       => esc_html__('Search Instructors', 'elite-driving-academy'),
        'parent_item_colon'  => esc_html__('Parent Instructors:', 'elite-driving-academy'),
        'not_found'          => esc_html__('No instructors found.', 'elite-driving-academy'),
        'not_found_in_trash' => esc_html__('No instructors found in Trash.', 'elite-driving-academy')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => esc_html__('Driving instructors for the academy.', 'elite-driving-academy'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'instructors'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-groups',
        'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
        'show_in_rest'       => true,
    );

    register_post_type('instructor', $args);
}
add_action('init', 'elite_driving_academy_register_instructors');

/**
 * Register Testimonials Custom Post Type
 */
function elite_driving_academy_register_testimonials() {
    $labels = array(
        'name'               => esc_html__('Testimonials', 'elite-driving-academy'),
        'singular_name'      => esc_html__('Testimonial', 'elite-driving-academy'),
        'menu_name'          => esc_html__('Testimonials', 'elite-driving-academy'),
        'name_admin_bar'     => esc_html__('Testimonial', 'elite-driving-academy'),
        'add_new'            => esc_html__('Add New', 'elite-driving-academy'),
        'add_new_item'       => esc_html__('Add New Testimonial', 'elite-driving-academy'),
        'new_item'           => esc_html__('New Testimonial', 'elite-driving-academy'),
        'edit_item'          => esc_html__('Edit Testimonial', 'elite-driving-academy'),
        'view_item'          => esc_html__('View Testimonial', 'elite-driving-academy'),
        'all_items'          => esc_html__('All Testimonials', 'elite-driving-academy'),
        'search_items'       => esc_html__('Search Testimonials', 'elite-driving-academy'),
        'parent_item_colon'  => esc_html__('Parent Testimonials:', 'elite-driving-academy'),
        'not_found'          => esc_html__('No testimonials found.', 'elite-driving-academy'),
        'not_found_in_trash' => esc_html__('No testimonials found in Trash.', 'elite-driving-academy')
    );

    $args = array(
        'labels'             => $labels,
        'description'        => esc_html__('Student testimonials and reviews.', 'elite-driving-academy'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'testimonials'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'menu_icon'          => 'dashicons-format-quote',
        'supports'           => array('title', 'editor', 'thumbnail'),
        'show_in_rest'       => true,
    );

    register_post_type('testimonial', $args);
}
add_action('init', 'elite_driving_academy_register_testimonials');

/**
 * Add Custom Meta Boxes
 */
function elite_driving_academy_add_meta_boxes() {
    // Instructor meta boxes
    add_meta_box(
        'instructor_details',
        esc_html__('Instructor Details', 'elite-driving-academy'),
        'elite_driving_academy_instructor_meta_box_callback',
        'instructor',
        'normal',
        'high'
    );

    // Testimonial meta boxes
    add_meta_box(
        'testimonial_details',
        esc_html__('Testimonial Details', 'elite-driving-academy'),
        'elite_driving_academy_testimonial_meta_box_callback',
        'testimonial',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'elite_driving_academy_add_meta_boxes');

/**
 * Instructor Meta Box Callback
 */
function elite_driving_academy_instructor_meta_box_callback($post) {
    wp_nonce_field('elite_driving_academy_instructor_meta', 'elite_driving_academy_instructor_nonce');

    $experience = get_post_meta($post->ID, '_instructor_experience', true);
    $specialization = get_post_meta($post->ID, '_instructor_specialization', true);
    $rating = get_post_meta($post->ID, '_instructor_rating', true);
    $languages = get_post_meta($post->ID, '_instructor_languages', true);
    $certifications = get_post_meta($post->ID, '_instructor_certifications', true);

    echo '<table class="form-table">';
    echo '<tr><th><label for="instructor_experience">' . esc_html__('Years of Experience', 'elite-driving-academy') . '</label></th>';
    echo '<td><input type="number" id="instructor_experience" name="instructor_experience" value="' . esc_attr($experience) . '" min="0" max="50" /></td></tr>';

    echo '<tr><th><label for="instructor_specialization">' . esc_html__('Specialization', 'elite-driving-academy') . '</label></th>';
    echo '<td><input type="text" id="instructor_specialization" name="instructor_specialization" value="' . esc_attr($specialization) . '" /></td></tr>';

    echo '<tr><th><label for="instructor_rating">' . esc_html__('Rating', 'elite-driving-academy') . '</label></th>';
    echo '<td><input type="number" id="instructor_rating" name="instructor_rating" value="' . esc_attr($rating) . '" min="1" max="5" step="0.1" /></td></tr>';

    echo '<tr><th><label for="instructor_languages">' . esc_html__('Languages', 'elite-driving-academy') . '</label></th>';
    echo '<td><input type="text" id="instructor_languages" name="instructor_languages" value="' . esc_attr($languages) . '" placeholder="English, Spanish, French" /></td></tr>';

    echo '<tr><th><label for="instructor_certifications">' . esc_html__('Certifications', 'elite-driving-academy') . '</label></th>';
    echo '<td><textarea id="instructor_certifications" name="instructor_certifications" rows="3">' . esc_textarea($certifications) . '</textarea></td></tr>';
    echo '</table>';
}

/**
 * Testimonial Meta Box Callback
 */
function elite_driving_academy_testimonial_meta_box_callback($post) {
    wp_nonce_field('elite_driving_academy_testimonial_meta', 'elite_driving_academy_testimonial_nonce');

    $client_name = get_post_meta($post->ID, '_testimonial_client_name', true);
    $client_location = get_post_meta($post->ID, '_testimonial_client_location', true);
    $rating = get_post_meta($post->ID, '_testimonial_rating', true);
    $package = get_post_meta($post->ID, '_testimonial_package', true);

    echo '<table class="form-table">';
    echo '<tr><th><label for="testimonial_client_name">' . esc_html__('Client Name', 'elite-driving-academy') . '</label></th>';
    echo '<td><input type="text" id="testimonial_client_name" name="testimonial_client_name" value="' . esc_attr($client_name) . '" /></td></tr>';

    echo '<tr><th><label for="testimonial_client_location">' . esc_html__('Client Location', 'elite-driving-academy') . '</label></th>';
    echo '<td><input type="text" id="testimonial_client_location" name="testimonial_client_location" value="' . esc_attr($client_location) . '" /></td></tr>';

    echo '<tr><th><label for="testimonial_rating">' . esc_html__('Rating', 'elite-driving-academy') . '</label></th>';
    echo '<td><select id="testimonial_rating" name="testimonial_rating">';
    for ($i = 1; $i <= 5; $i++) {
        echo '<option value="' . $i . '"' . selected($rating, $i, false) . '>' . $i . ' Star' . ($i > 1 ? 's' : '') . '</option>';
    }
    echo '</select></td></tr>';

    echo '<tr><th><label for="testimonial_package">' . esc_html__('Package Taken', 'elite-driving-academy') . '</label></th>';
    echo '<td><select id="testimonial_package" name="testimonial_package">';
    echo '<option value="starter"' . selected($package, 'starter', false) . '>Starter</option>';
    echo '<option value="professional"' . selected($package, 'professional', false) . '>Professional</option>';
    echo '<option value="premium"' . selected($package, 'premium', false) . '>Premium</option>';
    echo '</select></td></tr>';
    echo '</table>';
}

/**
 * Save Meta Box Data
 */
function elite_driving_academy_save_meta_boxes($post_id) {
    // Check if nonce is valid
    if (!isset($_POST['elite_driving_academy_instructor_nonce']) && !isset($_POST['elite_driving_academy_testimonial_nonce'])) {
        return;
    }

    // Save instructor meta
    if (isset($_POST['elite_driving_academy_instructor_nonce']) && wp_verify_nonce($_POST['elite_driving_academy_instructor_nonce'], 'elite_driving_academy_instructor_meta')) {
        if (isset($_POST['instructor_experience'])) {
            update_post_meta($post_id, '_instructor_experience', sanitize_text_field($_POST['instructor_experience']));
        }
        if (isset($_POST['instructor_specialization'])) {
            update_post_meta($post_id, '_instructor_specialization', sanitize_text_field($_POST['instructor_specialization']));
        }
        if (isset($_POST['instructor_rating'])) {
            update_post_meta($post_id, '_instructor_rating', sanitize_text_field($_POST['instructor_rating']));
        }
        if (isset($_POST['instructor_languages'])) {
            update_post_meta($post_id, '_instructor_languages', sanitize_text_field($_POST['instructor_languages']));
        }
        if (isset($_POST['instructor_certifications'])) {
            update_post_meta($post_id, '_instructor_certifications', sanitize_textarea_field($_POST['instructor_certifications']));
        }
    }

    // Save testimonial meta
    if (isset($_POST['elite_driving_academy_testimonial_nonce']) && wp_verify_nonce($_POST['elite_driving_academy_testimonial_nonce'], 'elite_driving_academy_testimonial_meta')) {
        if (isset($_POST['testimonial_client_name'])) {
            update_post_meta($post_id, '_testimonial_client_name', sanitize_text_field($_POST['testimonial_client_name']));
        }
        if (isset($_POST['testimonial_client_location'])) {
            update_post_meta($post_id, '_testimonial_client_location', sanitize_text_field($_POST['testimonial_client_location']));
        }
        if (isset($_POST['testimonial_rating'])) {
            update_post_meta($post_id, '_testimonial_rating', sanitize_text_field($_POST['testimonial_rating']));
        }
        if (isset($_POST['testimonial_package'])) {
            update_post_meta($post_id, '_testimonial_package', sanitize_text_field($_POST['testimonial_package']));
        }
    }
}
add_action('save_post', 'elite_driving_academy_save_meta_boxes');