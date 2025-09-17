<?php
/**
 * Pricing Cards Template Part
 *
 * @package Elite_Driving_Academy
 */

// Default pricing plans if none are set
$default_pricing = array(
    array(
        'title' => 'Starter',
        'subtitle' => 'Perfect for beginners',
        'monthly_price' => '99',
        'package_price' => '299',
        'features' => array(
            '10 Driving Lessons',
            'Theory Test Preparation',
            'Manual Transmission',
            'Pick-up & Drop-off',
            'Progress Reports'
        ),
        'inactive_features' => array(
            'Mock Test Sessions',
            'Highway Training'
        ),
        'popular' => false
    ),
    array(
        'title' => 'Professional',
        'subtitle' => 'Most popular choice',
        'monthly_price' => '199',
        'package_price' => '599',
        'features' => array(
            '20 Driving Lessons',
            'Theory + Practical Test Prep',
            'Manual & Automatic',
            'Pick-up & Drop-off',
            'Progress Reports',
            'Mock Test Sessions',
            'Highway Training'
        ),
        'inactive_features' => array(
            'Night Driving Training'
        ),
        'popular' => true
    ),
    array(
        'title' => 'Premium',
        'subtitle' => 'Complete mastery',
        'monthly_price' => '299',
        'package_price' => '899',
        'features' => array(
            'Unlimited Lessons',
            'Complete Test Preparation',
            'All Vehicle Types',
            'Pick-up & Drop-off',
            'Detailed Progress Reports',
            'Mock Test Sessions',
            'Highway Training',
            'Night Driving Training',
            'Defensive Driving Course'
        ),
        'inactive_features' => array(),
        'popular' => false
    )
);

$pricing_plans = get_theme_mod('pricing_plans', $default_pricing);

foreach ($pricing_plans as $plan) :
    $card_class = $plan['popular'] ? 'pricing-card popular' : 'pricing-card';
?>
    <div class="<?php echo esc_attr($card_class); ?>">
        <?php if ($plan['popular']) : ?>
            <div class="popular-badge">
                <i class="fas fa-crown"></i>
                <span><?php esc_html_e('Most Popular', 'elite-driving-academy'); ?></span>
            </div>
        <?php endif; ?>

        <div class="card-header">
            <h3 class="card-title"><?php echo esc_html($plan['title']); ?></h3>
            <p class="card-subtitle"><?php echo esc_html($plan['subtitle']); ?></p>
            <div class="card-price">
                <span class="currency">$</span>
                <span class="price monthly-price"><?php echo esc_html($plan['monthly_price']); ?></span>
                <span class="price package-price" style="display:none"><?php echo esc_html($plan['package_price']); ?></span>
                <span class="period">/month</span>
            </div>
        </div>

        <div class="card-features">
            <?php foreach ($plan['features'] as $feature) : ?>
                <div class="feature-item">
                    <i class="fas fa-check-circle"></i>
                    <span><?php echo esc_html($feature); ?></span>
                </div>
            <?php endforeach; ?>

            <?php foreach ($plan['inactive_features'] as $feature) : ?>
                <div class="feature-item inactive">
                    <i class="fas fa-times-circle"></i>
                    <span><?php echo esc_html($feature); ?></span>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="card-footer">
            <a href="#contact" class="btn <?php echo $plan['popular'] ? 'btn-premium' : 'btn-outline'; ?>">
                <span><?php esc_html_e('Choose Plan', 'elite-driving-academy'); ?></span>
                <i class="fas fa-arrow-right"></i>
            </a>
            <p class="guarantee-text">
                <i class="fas fa-shield-alt"></i>
                <?php esc_html_e('30-day money back guarantee', 'elite-driving-academy'); ?>
            </p>
        </div>
    </div>
<?php endforeach; ?>