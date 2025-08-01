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
                    <div class="entry-meta">
                        <span class="posted-on">Ngày đăng: <?php echo get_the_date(); ?></span>
                        <span class="byline"> | Tác giả: <?php the_author(); ?></span>
                    </div>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    <?php the_tags( '<span class="tag-links">Tags: ', ', ', '</span>' ); ?>
                </footer>

            </article>

            <?php
            // Hiển thị bình luận
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
            ?>

        <?php endwhile;
    else :
        echo '<p>Không tìm thấy bài viết.</p>';
    endif;
    ?>
</main><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
