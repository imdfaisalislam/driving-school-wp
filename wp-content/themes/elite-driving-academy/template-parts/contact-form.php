<?php
/**
 * Contact Form Template Part
 *
 * @package Elite_Driving_Academy
 */
?>

<div class="contact-grid">
    <div class="contact-info">
        <h3><?php esc_html_e('Get in Touch', 'elite-driving-academy'); ?></h3>
        <p><?php esc_html_e('Ready to start your driving journey? Contact us today for a free consultation.', 'elite-driving-academy'); ?></p>

        <div class="contact-items">
            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-phone"></i>
                </div>
                <div class="contact-details">
                    <h4><?php esc_html_e('Phone', 'elite-driving-academy'); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('contact_phone', '+1 (555) 123-4567')); ?></p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-envelope"></i>
                </div>
                <div class="contact-details">
                    <h4><?php esc_html_e('Email', 'elite-driving-academy'); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('contact_email', 'info@elitedrivingacademy.com')); ?></p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="contact-details">
                    <h4><?php esc_html_e('Address', 'elite-driving-academy'); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('contact_address', '123 Main Street, City, State 12345')); ?></p>
                </div>
            </div>

            <div class="contact-item">
                <div class="contact-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <div class="contact-details">
                    <h4><?php esc_html_e('Hours', 'elite-driving-academy'); ?></h4>
                    <p><?php echo esc_html(get_theme_mod('contact_hours', 'Mon-Fri: 8AM-8PM, Sat-Sun: 9AM-5PM')); ?></p>
                </div>
            </div>
        </div>
    </div>

    <div class="contact-form-container">
        <form class="contact-form" id="contactForm">
            <h3><?php esc_html_e('Send us a Message', 'elite-driving-academy'); ?></h3>

            <div class="form-group">
                <div class="form-row">
                    <div class="form-field">
                        <input type="text" id="firstName" name="firstName" required>
                        <label for="firstName"><?php esc_html_e('First Name', 'elite-driving-academy'); ?></label>
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="form-field">
                        <input type="text" id="lastName" name="lastName" required>
                        <label for="lastName"><?php esc_html_e('Last Name', 'elite-driving-academy'); ?></label>
                        <i class="fas fa-user"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-row">
                    <div class="form-field">
                        <input type="email" id="email" name="email" required>
                        <label for="email"><?php esc_html_e('Email Address', 'elite-driving-academy'); ?></label>
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="form-field">
                        <input type="tel" id="phone" name="phone" required>
                        <label for="phone"><?php esc_html_e('Phone Number', 'elite-driving-academy'); ?></label>
                        <i class="fas fa-phone"></i>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="form-field">
                    <select id="package" name="package" required>
                        <option value=""><?php esc_html_e('Select Package', 'elite-driving-academy'); ?></option>
                        <option value="starter"><?php esc_html_e('Starter Package', 'elite-driving-academy'); ?></option>
                        <option value="professional"><?php esc_html_e('Professional Package', 'elite-driving-academy'); ?></option>
                        <option value="premium"><?php esc_html_e('Premium Package', 'elite-driving-academy'); ?></option>
                        <option value="custom"><?php esc_html_e('Custom Package', 'elite-driving-academy'); ?></option>
                    </select>
                    <i class="fas fa-graduation-cap"></i>
                </div>
            </div>

            <div class="form-group">
                <div class="form-field">
                    <textarea id="message" name="message" rows="5" required></textarea>
                    <label for="message"><?php esc_html_e('Your Message', 'elite-driving-academy'); ?></label>
                    <i class="fas fa-comment"></i>
                </div>
            </div>

            <div class="form-group">
                <div class="form-checkbox">
                    <input type="checkbox" id="newsletter" name="newsletter">
                    <label for="newsletter"><?php esc_html_e('Subscribe to our newsletter for driving tips and updates', 'elite-driving-academy'); ?></label>
                </div>
            </div>

            <button type="submit" class="btn btn-premium form-submit">
                <span><?php esc_html_e('Send Message', 'elite-driving-academy'); ?></span>
                <i class="fas fa-paper-plane"></i>
            </button>

            <div class="form-status"></div>
        </form>
    </div>
</div>