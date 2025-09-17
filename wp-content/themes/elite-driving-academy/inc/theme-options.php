<?php
/**
 * Theme Options for Elite Driving Academy
 *
 * @package Elite_Driving_Academy
 */

// Prevent direct access
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Add theme options page
 */
function elite_driving_academy_add_admin_page() {
    add_theme_page(
        'Elite Driving Academy Settings',
        'Theme Options',
        'manage_options',
        'elite-driving-academy',
        'elite_driving_academy_admin_page_callback'
    );
}
add_action('admin_menu', 'elite_driving_academy_add_admin_page');

/**
 * Admin page callback
 */
function elite_driving_academy_admin_page_callback() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e('Elite Driving Academy Theme Options', 'elite-driving-academy'); ?></h1>
        <p><?php esc_html_e('Use the WordPress Customizer to modify theme settings.', 'elite-driving-academy'); ?></p>
        <p>
            <a href="<?php echo esc_url(admin_url('customize.php')); ?>" class="button button-primary">
                <?php esc_html_e('Open Customizer', 'elite-driving-academy'); ?>
            </a>
        </p>

        <div class="theme-info">
            <h2><?php esc_html_e('Theme Information', 'elite-driving-academy'); ?></h2>
            <table class="widefat">
                <tr>
                    <td><?php esc_html_e('Theme Name:', 'elite-driving-academy'); ?></td>
                    <td>Elite Driving Academy</td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Version:', 'elite-driving-academy'); ?></td>
                    <td>1.0.0</td>
                </tr>
                <tr>
                    <td><?php esc_html_e('Author:', 'elite-driving-academy'); ?></td>
                    <td>Faisal Islam</td>
                </tr>
            </table>
        </div>

        <div class="theme-features">
            <h2><?php esc_html_e('Theme Features', 'elite-driving-academy'); ?></h2>
            <ul>
                <li><?php esc_html_e('Custom Post Types for Instructors and Testimonials', 'elite-driving-academy'); ?></li>
                <li><?php esc_html_e('WordPress Customizer Integration', 'elite-driving-academy'); ?></li>
                <li><?php esc_html_e('Responsive Design', 'elite-driving-academy'); ?></li>
                <li><?php esc_html_e('Premium Animations and Effects', 'elite-driving-academy'); ?></li>
                <li><?php esc_html_e('Contact Form with AJAX', 'elite-driving-academy'); ?></li>
                <li><?php esc_html_e('SEO Optimized', 'elite-driving-academy'); ?></li>
            </ul>
        </div>
    </div>
    <?php
}