</main>

<!-- Premium Footer -->
<footer class="footer">
    <div class="footer-content">
        <div class="footer-section">
            <div class="footer-logo">
                <?php if (has_custom_logo()) : ?>
                    <?php the_custom_logo(); ?>
                <?php else : ?>
                    <div class="logo-icon">
                        <i class="fas fa-car"></i>
                    </div>
                    <div class="logo-text">
                        <span class="logo-main"><?php echo esc_html(get_bloginfo('name')); ?></span>
                        <span class="logo-sub"><?php echo esc_html(get_bloginfo('description')); ?></span>
                    </div>
                <?php endif; ?>
            </div>
            <p class="footer-desc">
                <?php
                $footer_description = get_theme_mod('footer_description', 'Professional driving instruction with modern techniques and experienced instructors. Your journey to safe driving starts here.');
                echo esc_html($footer_description);
                ?>
            </p>
            <div class="social-links">
                <?php if (get_theme_mod('facebook_url')) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('facebook_url')); ?>" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a>
                <?php endif; ?>
                <?php if (get_theme_mod('twitter_url')) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('twitter_url')); ?>" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a>
                <?php endif; ?>
                <?php if (get_theme_mod('instagram_url')) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('instagram_url')); ?>" target="_blank" rel="noopener"><i class="fab fa-instagram"></i></a>
                <?php endif; ?>
                <?php if (get_theme_mod('linkedin_url')) : ?>
                    <a href="<?php echo esc_url(get_theme_mod('linkedin_url')); ?>" target="_blank" rel="noopener"><i class="fab fa-linkedin-in"></i></a>
                <?php endif; ?>
            </div>
        </div>

        <div class="footer-section">
            <h4>Quick Links</h4>
            <?php if (is_active_sidebar('footer-1')) : ?>
                <?php dynamic_sidebar('footer-1'); ?>
            <?php else : ?>
                <ul class="footer-links">
                    <li><a href="<?php echo esc_url(home_url('/')); ?>">Home</a></li>
                    <li><a href="#features">Features</a></li>
                    <li><a href="#pricing">Pricing</a></li>
                    <li><a href="#instructors">Instructors</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            <?php endif; ?>
        </div>

        <div class="footer-section">
            <h4>Services</h4>
            <?php if (is_active_sidebar('footer-2')) : ?>
                <?php dynamic_sidebar('footer-2'); ?>
            <?php else : ?>
                <ul class="footer-links">
                    <li><a href="#">Beginner Lessons</a></li>
                    <li><a href="#">Advanced Training</a></li>
                    <li><a href="#">Test Preparation</a></li>
                    <li><a href="#">Defensive Driving</a></li>
                    <li><a href="#">Fleet Training</a></li>
                </ul>
            <?php endif; ?>
        </div>

        <div class="footer-section">
            <h4>Contact Info</h4>
            <?php if (is_active_sidebar('footer-3')) : ?>
                <?php dynamic_sidebar('footer-3'); ?>
            <?php else : ?>
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span><?php echo esc_html(get_theme_mod('contact_phone', '+1 (555) 123-4567')); ?></span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span><?php echo esc_html(get_theme_mod('contact_email', 'info@elitedrivingacademy.com')); ?></span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <span><?php echo esc_html(get_theme_mod('contact_address', '123 Main Street, City, State 12345')); ?></span>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-bottom-content">
            <p>&copy; <?php echo date('Y'); ?> <?php echo esc_html(get_bloginfo('name')); ?>. <?php esc_html_e('All rights reserved.', 'elite-driving-academy'); ?></p>
            <div class="footer-links-bottom">
                <a href="#"><?php esc_html_e('Privacy Policy', 'elite-driving-academy'); ?></a>
                <a href="#"><?php esc_html_e('Terms of Service', 'elite-driving-academy'); ?></a>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button -->
<button id="scrollToTop" class="scroll-to-top">
    <i class="fas fa-chevron-up"></i>
</button>

<?php wp_footer(); ?>
</body>
</html>