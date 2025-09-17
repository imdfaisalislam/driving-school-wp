<?php
/**
 * Features Grid Template Part
 *
 * @package Elite_Driving_Academy
 */

// Default features if none are set in customizer
$default_features = array(
    array(
        'icon' => 'fas fa-user-tie',
        'title' => 'Expert Instructors',
        'description' => 'Certified professionals with years of experience and patience'
    ),
    array(
        'icon' => 'fas fa-car-side',
        'title' => 'Modern Fleet',
        'description' => 'Latest model vehicles with dual controls for maximum safety'
    ),
    array(
        'icon' => 'fas fa-clock',
        'title' => 'Flexible Schedule',
        'description' => 'Learn at your own pace with convenient timing options'
    ),
    array(
        'icon' => 'fas fa-chart-line',
        'title' => 'Progress Tracking',
        'description' => 'Monitor your improvement with detailed performance reports'
    ),
    array(
        'icon' => 'fas fa-mobile-alt',
        'title' => 'Mobile App',
        'description' => 'Book lessons, track progress, and access materials on the go'
    ),
    array(
        'icon' => 'fas fa-shield-virus',
        'title' => 'Insurance Coverage',
        'description' => 'Full insurance protection during all driving lessons'
    )
);

$features = get_theme_mod('features_list', $default_features);

foreach ($features as $index => $feature) :
?>
    <div class="feature-card">
        <div class="feature-icon">
            <i class="<?php echo esc_attr($feature['icon']); ?>"></i>
        </div>
        <h3><?php echo esc_html($feature['title']); ?></h3>
        <p><?php echo esc_html($feature['description']); ?></p>
    </div>
<?php endforeach; ?>