<?php
/**
 * Elite Driving Academy Theme Customizer
 *
 * @package Elite_Driving_Academy
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 */
function elite_driving_academy_customize_register($wp_customize) {

    // Hero Section
    $wp_customize->add_section('hero_section', array(
        'title'    => esc_html__('Hero Section', 'elite-driving-academy'),
        'priority' => 30,
    ));

    // Hero Badge Text
    $wp_customize->add_setting('hero_badge_text', array(
        'default'           => 'Award Winning Academy',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_badge_text', array(
        'label'   => esc_html__('Hero Badge Text', 'elite-driving-academy'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    // Hero Title Line 1
    $wp_customize->add_setting('hero_title_line1', array(
        'default'           => 'Drive Your Future',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title_line1', array(
        'label'   => esc_html__('Hero Title Line 1', 'elite-driving-academy'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    // Hero Title Line 2
    $wp_customize->add_setting('hero_title_line2', array(
        'default'           => 'With Confidence',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('hero_title_line2', array(
        'label'   => esc_html__('Hero Title Line 2', 'elite-driving-academy'),
        'section' => 'hero_section',
        'type'    => 'text',
    ));

    // Contact Information Section
    $wp_customize->add_section('contact_info', array(
        'title'    => esc_html__('Contact Information', 'elite-driving-academy'),
        'priority' => 35,
    ));

    // Contact Phone
    $wp_customize->add_setting('contact_phone', array(
        'default'           => '+1 (555) 123-4567',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_phone', array(
        'label'   => esc_html__('Phone Number', 'elite-driving-academy'),
        'section' => 'contact_info',
        'type'    => 'text',
    ));

    // Contact Email
    $wp_customize->add_setting('contact_email', array(
        'default'           => 'info@elitedrivingacademy.com',
        'sanitize_callback' => 'sanitize_email',
    ));
    $wp_customize->add_control('contact_email', array(
        'label'   => esc_html__('Email Address', 'elite-driving-academy'),
        'section' => 'contact_info',
        'type'    => 'email',
    ));

    // Contact Address
    $wp_customize->add_setting('contact_address', array(
        'default'           => '123 Main Street, City, State 12345',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('contact_address', array(
        'label'   => esc_html__('Address', 'elite-driving-academy'),
        'section' => 'contact_info',
        'type'    => 'text',
    ));

    // Social Media Section
    $wp_customize->add_section('social_media', array(
        'title'    => esc_html__('Social Media', 'elite-driving-academy'),
        'priority' => 40,
    ));

    // Facebook URL
    $wp_customize->add_setting('facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('facebook_url', array(
        'label'   => esc_html__('Facebook URL', 'elite-driving-academy'),
        'section' => 'social_media',
        'type'    => 'url',
    ));

    // Twitter URL
    $wp_customize->add_setting('twitter_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('twitter_url', array(
        'label'   => esc_html__('Twitter URL', 'elite-driving-academy'),
        'section' => 'social_media',
        'type'    => 'url',
    ));

    // Instagram URL
    $wp_customize->add_setting('instagram_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('instagram_url', array(
        'label'   => esc_html__('Instagram URL', 'elite-driving-academy'),
        'section' => 'social_media',
        'type'    => 'url',
    ));

    // LinkedIn URL
    $wp_customize->add_setting('linkedin_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control('linkedin_url', array(
        'label'   => esc_html__('LinkedIn URL', 'elite-driving-academy'),
        'section' => 'social_media',
        'type'    => 'url',
    ));
}
add_action('customize_register', 'elite_driving_academy_customize_register');

/**
 * Render the site title for the selective refresh partial.
 */
function elite_driving_academy_customize_partial_blogname() {
    bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 */
function elite_driving_academy_customize_partial_blogdescription() {
    bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function elite_driving_academy_customize_preview_js() {
    wp_enqueue_script('elite-driving-academy-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), '1.0.0', true);
}
add_action('customize_preview_init', 'elite_driving_academy_customize_preview_js');