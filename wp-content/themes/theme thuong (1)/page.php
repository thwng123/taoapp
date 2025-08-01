<?php get_header(); ?>

<main id="primary" class="site-main">
    <?php
    if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title">
                        <?php the_title(); ?>
                    </h1>
                </header>

                <div class="entry-content">
                    <?php
                    the_content();

                    // Hiển thị phân trang nếu nội dung page chia thành nhiều trang
                    wp_link_pages( array(
                        'before' => '<div class="page-links">Trang: ',
                        'after'  => '</div>',
                    ) );
                    ?>
                </div>
            </article>
        <?php
        endwhile;
    else :
        echo '<p>Không tìm thấy nội dung.</p>';
    endif;
    ?>
</main><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
