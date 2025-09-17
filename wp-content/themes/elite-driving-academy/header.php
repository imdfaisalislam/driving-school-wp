<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<!-- Premium Loading Screen -->
<div class="loader-wrapper">
    <div class="loader">
        <div class="car-loader">
            <i class="fas fa-car"></i>
        </div>
        <div class="road"></div>
    </div>
</div>

<!-- Premium Header -->
<header class="header">
    <nav class="navbar">
        <div class="nav-container">
            <div class="nav-logo">
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

            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'menu_class' => 'nav-menu',
                'container' => false,
                'fallback_cb' => 'elite_driving_academy_default_menu',
            ));
            ?>

            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>
    </nav>
</header>

<main>

<?php
/**
 * Default menu fallback
 */
function elite_driving_academy_default_menu() {
    echo '<ul class="nav-menu">';
    echo '<li><a href="' . esc_url(home_url('/')) . '" class="nav-link active">Home</a></li>';
    echo '<li><a href="#features" class="nav-link">Features</a></li>';
    echo '<li><a href="#pricing" class="nav-link">Pricing</a></li>';
    echo '<li><a href="#testimonials" class="nav-link">Reviews</a></li>';
    echo '<li><a href="#instructors" class="nav-link">Instructors</a></li>';
    echo '<li><a href="#contact" class="nav-link">Contact</a></li>';
    echo '<li><a href="#contact" class="nav-cta">Get Started</a></li>';
    echo '</ul>';
}
?>