<?php
/**
 * Testimonials Slider Template Part
 *
 * @package Elite_Driving_Academy
 */

// Query testimonials
$testimonials_query = new WP_Query(array(
    'post_type' => 'testimonial',
    'posts_per_page' => 6,
    'post_status' => 'publish'
));

if ($testimonials_query->have_posts()) :
?>
    <div class="testimonial-track">
        <?php while ($testimonials_query->have_posts()) : $testimonials_query->the_post();
            $client_name = get_post_meta(get_the_ID(), '_testimonial_client_name', true);
            $client_location = get_post_meta(get_the_ID(), '_testimonial_client_location', true);
            $rating = get_post_meta(get_the_ID(), '_testimonial_rating', true);
            $package = get_post_meta(get_the_ID(), '_testimonial_package', true);
        ?>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('thumbnail', array('alt' => $client_name ? $client_name : get_the_title())); ?>
                        <?php else : ?>
                            <i class="fas fa-user"></i>
                        <?php endif; ?>
                    </div>
                    <div class="testimonial-info">
                        <h4 class="client-name"><?php echo $client_name ? esc_html($client_name) : get_the_title(); ?></h4>
                        <?php if ($client_location) : ?>
                            <p class="client-location"><?php echo esc_html($client_location); ?></p>
                        <?php endif; ?>
                        <?php if ($package) : ?>
                            <span class="package-badge"><?php echo esc_html(ucfirst($package)); ?> <?php esc_html_e('Package', 'elite-driving-academy'); ?></span>
                        <?php endif; ?>
                    </div>
                    <?php if ($rating) : ?>
                        <div class="testimonial-rating">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <i class="fas fa-star <?php echo $i <= intval($rating) ? 'active' : ''; ?>"></i>
                            <?php endfor; ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="testimonial-content">
                    <i class="fas fa-quote-left"></i>
                    <p><?php echo wp_trim_words(get_the_content(), 30); ?></p>
                </div>
            </div>
        <?php endwhile; ?>
    </div>
    <div class="testimonial-controls">
        <button class="testimonial-btn prev-btn">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="testimonial-btn next-btn">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    <div class="testimonial-dots"></div>
<?php
    wp_reset_postdata();
else :
    // Default testimonials if none are created
    $default_testimonials = array(
        array(
            'name' => 'Jessica Martinez',
            'location' => 'Downtown',
            'rating' => 5,
            'package' => 'Professional',
            'content' => 'Amazing experience! Sarah was so patient and helped me build confidence behind the wheel. Passed my test on the first try thanks to the excellent preparation. Highly recommend Elite Driving Academy!'
        ),
        array(
            'name' => 'Alex Thompson',
            'location' => 'Westside',
            'rating' => 5,
            'package' => 'Premium',
            'content' => 'The instructors here are top-notch. Michael made learning to drive enjoyable and stress-free. The modern cars and professional approach made all the difference. Worth every penny!'
        ),
        array(
            'name' => 'Maria Gonzalez',
            'location' => 'Northbrook',
            'rating' => 5,
            'package' => 'Starter',
            'content' => 'As a nervous driver, Emily was exactly what I needed. She was patient, encouraging, and helped me overcome my fears. The progress tracking really helped me see my improvement.'
        ),
        array(
            'name' => 'James Wilson',
            'location' => 'Eastgate',
            'rating' => 5,
            'package' => 'Professional',
            'content' => 'Fantastic driving school! The flexible scheduling worked perfectly with my busy schedule. David provided excellent instruction and helped me become a confident driver.'
        ),
        array(
            'name' => 'Lisa Chen',
            'location' => 'Riverside',
            'rating' => 5,
            'package' => 'Premium',
            'content' => 'The premium package was worth it for the comprehensive training. The mock tests and highway training really prepared me well. Professional service throughout!'
        ),
        array(
            'name' => 'Robert Brown',
            'location' => 'Hillcrest',
            'rating' => 5,
            'package' => 'Starter',
            'content' => 'Great value for money! The starter package gave me everything I needed to get started. The pick-up and drop-off service was very convenient. Highly recommended!'
        )
    );
?>
    <div class="testimonial-track">
        <?php foreach ($default_testimonials as $testimonial) : ?>
            <div class="testimonial-card">
                <div class="testimonial-header">
                    <div class="testimonial-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="testimonial-info">
                        <h4 class="client-name"><?php echo esc_html($testimonial['name']); ?></h4>
                        <p class="client-location"><?php echo esc_html($testimonial['location']); ?></p>
                        <span class="package-badge"><?php echo esc_html($testimonial['package']); ?> <?php esc_html_e('Package', 'elite-driving-academy'); ?></span>
                    </div>
                    <div class="testimonial-rating">
                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                            <i class="fas fa-star <?php echo $i <= $testimonial['rating'] ? 'active' : ''; ?>"></i>
                        <?php endfor; ?>
                    </div>
                </div>
                <div class="testimonial-content">
                    <i class="fas fa-quote-left"></i>
                    <p><?php echo esc_html($testimonial['content']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="testimonial-controls">
        <button class="testimonial-btn prev-btn">
            <i class="fas fa-chevron-left"></i>
        </button>
        <button class="testimonial-btn next-btn">
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
    <div class="testimonial-dots"></div>
<?php endif; ?>