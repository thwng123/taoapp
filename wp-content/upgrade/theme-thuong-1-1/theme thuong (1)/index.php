<?php get_header(); ?>

<main id="primary" class="thuong-main">
    <?php
    if ( have_posts() ) :
        // Bắt đầu vòng lặp
        while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h2 class="entry-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>
                </header>

                <div class="entry-content">
                    <?php the_excerpt(); ?>
                </div>
            </article>
        <?php
        endwhile;

        // Phân trang
        the_posts_pagination();

    else :
        // Nếu không có bài viết
        echo '<p>Không có bài viết nào.</p>';
    endif;
    ?>
</main><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
