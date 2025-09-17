<?php
/**
 * The main template file
 *
 * @package Elite_Driving_Academy
 */

get_header(); ?>

<div class="container main-content">
    <div class="content-area">
        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="post-content">
                            <header class="entry-header">
                                <h2 class="entry-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>
                                <div class="entry-meta">
                                    <span class="posted-on">
                                        <i class="fas fa-calendar"></i>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    <span class="byline">
                                        <i class="fas fa-user"></i>
                                        <?php the_author(); ?>
                                    </span>
                                </div>
                            </header>

                            <div class="entry-summary">
                                <?php the_excerpt(); ?>
                            </div>

                            <footer class="entry-footer">
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php esc_html_e('Read More', 'elite-driving-academy'); ?>
                                    <i class="fas fa-arrow-right"></i>
                                </a>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'prev_text' => '<i class="fas fa-chevron-left"></i>' . esc_html__('Previous', 'elite-driving-academy'),
                    'next_text' => esc_html__('Next', 'elite-driving-academy') . '<i class="fas fa-chevron-right"></i>',
                ));
                ?>
            </div>

        <?php else : ?>
            <div class="no-posts">
                <h2><?php esc_html_e('Nothing Found', 'elite-driving-academy'); ?></h2>
                <p><?php esc_html_e('It looks like nothing was found at this location.', 'elite-driving-academy'); ?></p>
            </div>
        <?php endif; ?>
    </div>

    <?php if (is_active_sidebar('sidebar-1')) : ?>
        <aside class="sidebar">
            <?php dynamic_sidebar('sidebar-1'); ?>
        </aside>
    <?php endif; ?>
</div>

<?php get_footer(); ?>