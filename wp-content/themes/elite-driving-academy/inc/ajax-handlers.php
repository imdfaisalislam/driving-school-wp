<?php
/**
 * AJAX Handlers for Elite Driving Academy Theme
 *
 * @package Elite_Driving_Academy
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Handle contact form submission
 */
function elite_driving_academy_handle_contact_form() {
    // Verify nonce
    if (!wp_verify_nonce($_POST['nonce'], 'elite_nonce')) {
        wp_die(esc_html__('Security check failed', 'elite-driving-academy'));
    }

    // Sanitize form data
    $first_name = sanitize_text_field($_POST['firstName']);
    $last_name = sanitize_text_field($_POST['lastName']);
    $email = sanitize_email($_POST['email']);
    $phone = sanitize_text_field($_POST['phone']);
    $package = sanitize_text_field($_POST['package']);
    $message = sanitize_textarea_field($_POST['message']);
    $newsletter = isset($_POST['newsletter']) ? true : false;

    // Validate required fields
    if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($message)) {
        wp_send_json_error(array(
            'message' => esc_html__('Please fill in all required fields.', 'elite-driving-academy')
        ));
    }

    // Validate email
    if (!is_email($email)) {
        wp_send_json_error(array(
            'message' => esc_html__('Please enter a valid email address.', 'elite-driving-academy')
        ));
    }

    // Prepare email
    $to = get_option('admin_email');
    $subject = sprintf(esc_html__('New Contact Form Submission from %s', 'elite-driving-academy'), get_bloginfo('name'));

    $email_message = sprintf(
        esc_html__("New contact form submission:\n\nName: %s %s\nEmail: %s\nPhone: %s\nPackage: %s\nMessage: %s\nNewsletter: %s", 'elite-driving-academy'),
        $first_name,
        $last_name,
        $email,
        $phone,
        $package,
        $message,
        $newsletter ? esc_html__('Yes', 'elite-driving-academy') : esc_html__('No', 'elite-driving-academy')
    );

    $headers = array(
        'Content-Type: text/plain; charset=UTF-8',
        'From: ' . get_bloginfo('name') . ' <' . get_option('admin_email') . '>',
        'Reply-To: ' . $first_name . ' ' . $last_name . ' <' . $email . '>'
    );

    // Send email
    $sent = wp_mail($to, $subject, $email_message, $headers);

    if ($sent) {
        wp_send_json_success(array(
            'message' => esc_html__('Thank you for your message! We will get back to you soon.', 'elite-driving-academy')
        ));
    } else {
        wp_send_json_error(array(
            'message' => esc_html__('Sorry, there was an error sending your message. Please try again.', 'elite-driving-academy')
        ));
    }
}
add_action('wp_ajax_contact_form', 'elite_driving_academy_handle_contact_form');
add_action('wp_ajax_nopriv_contact_form', 'elite_driving_academy_handle_contact_form');