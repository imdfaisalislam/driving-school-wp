<?php
/**
 * The front page template file
 *
 * @package Elite_Driving_Academy
 */

get_header(); ?>

<!-- Premium Hero Section -->
<section id="home" class="hero">
    <div class="hero-background">
        <div class="hero-pattern"></div>
        <div class="floating-elements">
            <div class="float-element element-1"><i class="fas fa-steering-wheel"></i></div>
            <div class="float-element element-2"><i class="fas fa-road"></i></div>
            <div class="float-element element-3"><i class="fas fa-traffic-light"></i></div>
            <div class="float-element element-4"><i class="fas fa-certificate"></i></div>
        </div>
    </div>
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-award"></i>
                <span><?php echo esc_html(get_theme_mod('hero_badge_text', 'Award Winning Academy')); ?></span>
            </div>
            <h1 class="hero-title">
                <span class="title-line"><?php echo esc_html(get_theme_mod('hero_title_line1', 'Drive Your Future')); ?></span>
                <span class="title-highlight"><?php echo esc_html(get_theme_mod('hero_title_line2', 'With Confidence')); ?></span>
            </h1>
            <p class="hero-description">
                <?php echo esc_html(get_theme_mod('hero_description', 'Join the premier driving academy with certified expert instructors, modern vehicles, and a proven track record of success. Your journey to becoming a confident driver starts here.')); ?>
            </p>
            <div class="hero-stats">
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div class="stat-content">
                        <span class="stat-number" data-count="<?php echo esc_attr(get_theme_mod('stat_students', '5000')); ?>">0</span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('stat_students_label', 'Happy Students')); ?></span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-trophy"></i></div>
                    <div class="stat-content">
                        <span class="stat-number" data-count="<?php echo esc_attr(get_theme_mod('stat_passrate', '98')); ?>">0</span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('stat_passrate_label', 'Pass Rate')); ?></span>
                    </div>
                </div>
                <div class="stat-card">
                    <div class="stat-icon"><i class="fas fa-star"></i></div>
                    <div class="stat-content">
                        <span class="stat-number" data-count="<?php echo esc_attr(get_theme_mod('stat_rating', '4.9')); ?>">0</span>
                        <span class="stat-label"><?php echo esc_html(get_theme_mod('stat_rating_label', 'Rating')); ?></span>
                    </div>
                </div>
            </div>
            <div class="hero-buttons">
                <a href="#contact" class="btn btn-premium">
                    <span><?php echo esc_html(get_theme_mod('hero_button1_text', 'Start Your Journey')); ?></span>
                    <i class="fas fa-arrow-right"></i>
                </a>
                <a href="<?php echo esc_url(get_theme_mod('hero_video_url', '#')); ?>" class="btn btn-glass">
                    <i class="fas fa-play-circle"></i>
                    <span><?php echo esc_html(get_theme_mod('hero_button2_text', 'Watch Demo')); ?></span>
                </a>
            </div>
        </div>
        <div class="hero-visual">
            <div class="car-showcase">
                <?php
                $hero_image = get_theme_mod('hero_car_image');
                if ($hero_image) :
                ?>
                    <img src="<?php echo esc_url($hero_image); ?>" alt="<?php esc_attr_e('Modern Car', 'elite-driving-academy'); ?>" class="car-image">
                <?php else : ?>
                    <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 400 300'%3E%3Cdefs%3E%3ClinearGradient id='carGrad' x1='0%25' y1='0%25' x2='100%25' y2='100%25'%3E%3Cstop offset='0%25' style='stop-color:%233b82f6;stop-opacity:1' /%3E%3Cstop offset='100%25' style='stop-color:%238b5cf6;stop-opacity:1' /%3E%3C/linearGradient%3E%3C/defs%3E%3Cpath d='M 50 150 L 100 120 L 250 120 L 300 150 L 350 150 L 350 200 L 300 200 L 280 200 A 30 30 0 0 1 220 200 L 180 200 A 30 30 0 0 1 120 200 L 50 200 Z' fill='url(%23carGrad)' /%3E%3Ccircle cx='150' cy='200' r='25' fill='%23333' /%3E%3Ccircle cx='250' cy='200' r='25' fill='%23333' /%3E%3Crect x='120' y='140' width='40' height='30' fill='%23fff' opacity='0.3' /%3E%3Crect x='180' y='140' width='40' height='30' fill='%23fff' opacity='0.3' /%3E%3C/svg%3E" alt="<?php esc_attr_e('Modern Car', 'elite-driving-academy'); ?>" class="car-image">
                <?php endif; ?>
                <div class="car-glow"></div>
            </div>
            <div class="achievement-badges">
                <div class="badge-item">
                    <i class="fas fa-medal"></i>
                    <span><?php echo esc_html(get_theme_mod('badge1_text', 'Best School 2024')); ?></span>
                </div>
                <div class="badge-item">
                    <i class="fas fa-shield-alt"></i>
                    <span><?php echo esc_html(get_theme_mod('badge2_text', 'Safety Certified')); ?></span>
                </div>
            </div>
        </div>
    </div>
    <div class="hero-scroll">
        <div class="scroll-indicator">
            <span><?php esc_html_e('Scroll to explore', 'elite-driving-academy'); ?></span>
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>
</section>

<!-- Premium Features Section -->
<section id="features" class="features">
    <div class="section-container">
        <div class="section-header">
            <span class="section-label"><?php echo esc_html(get_theme_mod('features_label', 'Why Choose Us')); ?></span>
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('features_title', 'Experience Excellence in Every Lesson')); ?></h2>
            <p class="section-description"><?php echo esc_html(get_theme_mod('features_description', 'Our comprehensive approach ensures you become a confident, safe driver')); ?></p>
        </div>
        <div class="features-grid">
            <?php get_template_part('template-parts/features-grid'); ?>
        </div>
    </div>
</section>

<!-- Premium Pricing Section -->
<section id="pricing" class="pricing">
    <div class="section-container">
        <div class="section-header">
            <span class="section-label"><?php echo esc_html(get_theme_mod('pricing_label', 'Investment in Your Future')); ?></span>
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('pricing_title', 'Transparent Pricing, Exceptional Value')); ?></h2>
            <p class="section-description"><?php echo esc_html(get_theme_mod('pricing_description', 'Choose the perfect package for your learning journey')); ?></p>
        </div>
        <div class="pricing-toggle">
            <span class="toggle-label"><?php esc_html_e('Monthly', 'elite-driving-academy'); ?></span>
            <label class="toggle-switch">
                <input type="checkbox" id="pricing-toggle">
                <span class="toggle-slider"></span>
            </label>
            <span class="toggle-label"><?php esc_html_e('Package', 'elite-driving-academy'); ?></span>
            <span class="save-badge"><?php esc_html_e('Save 20%', 'elite-driving-academy'); ?></span>
        </div>
        <div class="pricing-grid">
            <?php get_template_part('template-parts/pricing-cards'); ?>
        </div>
    </div>
</section>

<!-- Premium Instructors Section -->
<section id="instructors" class="instructors">
    <div class="section-container">
        <div class="section-header">
            <span class="section-label"><?php echo esc_html(get_theme_mod('instructors_label', 'Meet Our Team')); ?></span>
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('instructors_title', 'Expert Instructors Ready to Guide You')); ?></h2>
            <p class="section-description"><?php echo esc_html(get_theme_mod('instructors_description', 'Our certified professionals bring years of experience and dedication to your learning journey')); ?></p>
        </div>
        <div class="instructors-grid">
            <?php get_template_part('template-parts/instructors-grid'); ?>
        </div>
    </div>
</section>

<!-- Premium Testimonials Section -->
<section id="testimonials" class="testimonials">
    <div class="testimonials-background">
        <div class="testimonials-pattern"></div>
    </div>
    <div class="section-container">
        <div class="section-header">
            <span class="section-label"><?php echo esc_html(get_theme_mod('testimonials_label', 'Student Success Stories')); ?></span>
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('testimonials_title', 'What Our Students Say')); ?></h2>
            <p class="section-description"><?php echo esc_html(get_theme_mod('testimonials_description', 'Real experiences from our successful graduates')); ?></p>
        </div>
        <div class="testimonials-slider">
            <?php get_template_part('template-parts/testimonials-slider'); ?>
        </div>
    </div>
</section>

<!-- Premium Contact Section -->
<section id="contact" class="contact">
    <div class="section-container">
        <div class="section-header">
            <span class="section-label"><?php echo esc_html(get_theme_mod('contact_label', 'Get In Touch')); ?></span>
            <h2 class="section-title"><?php echo esc_html(get_theme_mod('contact_title', 'Start Your Driving Journey Today')); ?></h2>
            <p class="section-description"><?php echo esc_html(get_theme_mod('contact_description', 'Ready to begin? Contact us for a free consultation and take the first step towards confident driving')); ?></p>
        </div>
        <div class="contact-content">
            <?php get_template_part('template-parts/contact-form'); ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>