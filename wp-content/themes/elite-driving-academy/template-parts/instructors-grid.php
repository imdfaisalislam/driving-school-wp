<?php
/**
 * Instructors Grid Template Part
 *
 * @package Elite_Driving_Academy
 */

// Query instructors
$instructors_query = new WP_Query(array(
    'post_type' => 'instructor',
    'posts_per_page' => 4,
    'post_status' => 'publish'
));

if ($instructors_query->have_posts()) :
    while ($instructors_query->have_posts()) : $instructors_query->the_post();
        $experience = get_post_meta(get_the_ID(), '_instructor_experience', true);
        $specialization = get_post_meta(get_the_ID(), '_instructor_specialization', true);
        $rating = get_post_meta(get_the_ID(), '_instructor_rating', true);
        $languages = get_post_meta(get_the_ID(), '_instructor_languages', true);
?>
        <div class="instructor-card">
            <div class="instructor-image">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('medium', array('alt' => get_the_title())); ?>
                <?php else : ?>
                    <div class="default-avatar">
                        <i class="fas fa-user"></i>
                    </div>
                <?php endif; ?>
                <div class="instructor-overlay">
                    <div class="instructor-rating">
                        <?php if ($rating) : ?>
                            <span class="rating-stars">
                                <?php for ($i = 1; $i <= 5; $i++) : ?>
                                    <i class="fas fa-star <?php echo $i <= floatval($rating) ? 'active' : ''; ?>"></i>
                                <?php endfor; ?>
                            </span>
                            <span class="rating-number"><?php echo esc_html($rating); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="instructor-info">
                <h4 class="instructor-name"><?php the_title(); ?></h4>
                <?php if ($specialization) : ?>
                    <p class="instructor-specialization"><?php echo esc_html($specialization); ?></p>
                <?php endif; ?>
                <div class="instructor-details">
                    <?php if ($experience) : ?>
                        <div class="detail-item">
                            <i class="fas fa-calendar-alt"></i>
                            <span><?php echo esc_html($experience); ?> <?php esc_html_e('years experience', 'elite-driving-academy'); ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if ($languages) : ?>
                        <div class="detail-item">
                            <i class="fas fa-globe"></i>
                            <span><?php echo esc_html($languages); ?></span>
                        </div>
                    <?php endif; ?>
                </div>
                <?php if (get_the_excerpt()) : ?>
                    <p class="instructor-bio"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                <?php endif; ?>
            </div>
        </div>
<?php
    endwhile;
    wp_reset_postdata();
else :
    // Default instructors if none are created
    $default_instructors = array(
        array(
            'name' => 'Sarah Johnson',
            'specialization' => 'Highway & City Driving',
            'experience' => '8',
            'rating' => '4.9',
            'languages' => 'English, Spanish',
            'bio' => 'Expert instructor specializing in confidence building and defensive driving techniques.'
        ),
        array(
            'name' => 'Michael Chen',
            'specialization' => 'Test Preparation',
            'experience' => '12',
            'rating' => '4.8',
            'languages' => 'English, Mandarin',
            'bio' => 'Dedicated to helping students pass their driving tests with comprehensive preparation.'
        ),
        array(
            'name' => 'Emily Rodriguez',
            'specialization' => 'Beginner Lessons',
            'experience' => '6',
            'rating' => '5.0',
            'languages' => 'English, Spanish, French',
            'bio' => 'Patient and encouraging instructor perfect for nervous or first-time drivers.'
        ),
        array(
            'name' => 'David Thompson',
            'specialization' => 'Advanced Training',
            'experience' => '15',
            'rating' => '4.9',
            'languages' => 'English',
            'bio' => 'Advanced driving techniques and performance improvement specialist.'
        )
    );

    foreach ($default_instructors as $instructor) :
?>
        <div class="instructor-card">
            <div class="instructor-image">
                <div class="default-avatar">
                    <i class="fas fa-user"></i>
                </div>
                <div class="instructor-overlay">
                    <div class="instructor-rating">
                        <span class="rating-stars">
                            <?php for ($i = 1; $i <= 5; $i++) : ?>
                                <i class="fas fa-star <?php echo $i <= floatval($instructor['rating']) ? 'active' : ''; ?>"></i>
                            <?php endfor; ?>
                        </span>
                        <span class="rating-number"><?php echo esc_html($instructor['rating']); ?></span>
                    </div>
                </div>
            </div>
            <div class="instructor-info">
                <h4 class="instructor-name"><?php echo esc_html($instructor['name']); ?></h4>
                <p class="instructor-specialization"><?php echo esc_html($instructor['specialization']); ?></p>
                <div class="instructor-details">
                    <div class="detail-item">
                        <i class="fas fa-calendar-alt"></i>
                        <span><?php echo esc_html($instructor['experience']); ?> <?php esc_html_e('years experience', 'elite-driving-academy'); ?></span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-globe"></i>
                        <span><?php echo esc_html($instructor['languages']); ?></span>
                    </div>
                </div>
                <p class="instructor-bio"><?php echo esc_html($instructor['bio']); ?></p>
            </div>
        </div>
<?php
    endforeach;
endif;
?>