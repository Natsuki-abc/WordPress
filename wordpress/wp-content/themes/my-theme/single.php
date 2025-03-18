<?php get_header(); ?>

<main class="site-main post-content-area">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                <header class="entry-header">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="post-meta">
                        投稿日：<span class="post-date"><?php echo get_the_date(); ?></span>
                    </div>

                    <h1 class="entry-title"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>

                    <?php
                    wp_link_pages(
                        array(
                            'before' => '<div class="page-links">' . esc_html__('Pages:', 'your-theme-textdomain'),
                            'after'  => '</div>',
                        )
                    );
                    ?>
                </div>

                <footer class="entry-footer">
                    <div class="post-navigation">
                        <div class="nav-previous"><?php previous_post_link('%link', '<span class="nav-subtitle">' . esc_html__('Previous Post', 'your-theme-textdomain') . '</span> <span class="nav-title">%title</span>'); ?></div>
                        <div class="nav-next"><?php next_post_link('%link', '<span class="nav-subtitle">' . esc_html__('Next Post', 'your-theme-textdomain') . '</span> <span class="nav-title">%title</span>'); ?></div>
                    </div>
                </footer>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
