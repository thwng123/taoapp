<?php get_header(); ?>




<!--Appilix Articles Page Hero Section-->
<section class="appilix_articles_page appilix_section_space_hero">
    <div class="appilix_container">
        <div class="appilix_section_header">
            <h1>
                <?php the_title(); ?>
            </h1>
            <p>
                Khám phá những bài viết thú vị và bổ ích về công nghệ, cuộc sống và nhiều chủ đề khác.
            </p>
        </div>
        <div class="blog_posts">
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = [
                'post_type' => 'post',
                'posts_per_page' => 6,
                'paged' => $paged,
                'category_name' => 'bai-viet' // Thêm dòng này để lọc bài viết thuộc chuyên mục "bai-viet"
            ];
            $query = new WP_Query($args);
            if ($query->have_posts()):
                while ($query->have_posts()): $query->the_post();
            ?>
            <article class="blog_card">
                <header class="card_head">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                    </a>
                    <div class="blog_category">
                        <?php
                        $category = get_the_category();
                        if (!empty($category)) {
                            echo '<a href="' . esc_url(get_category_link($category[0]->term_id)) . '" class="tag t_blue">' . esc_html($category[0]->name) . '</a>';
                        }
                        ?>
                    </div>

                    <?php
                    $custom_tag = get_post_meta(get_the_ID(), '_appilix_tag', true);
                    if ($custom_tag) {
                        echo '<a href="#" class="tag t_green">' . esc_html($custom_tag) . '</a>';
                    }
                    ?>

                    <h2><a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a></h2>
                </header>
                <div class="card_body">
                    <p>
                        <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                    </p>
                </div>
                <footer class="card_footer">
                    <a href="<?php the_permalink(); ?>" class="read_btn">Đọc thêm</a>
                    <span class="post_date">
                        <?php echo get_the_date('d M Y'); ?>
                    </span>
                </footer>
            </article>
            <?php
                endwhile;

                // Pagination
                echo '<div class="pagination">';
                echo paginate_links([
                    'total' => $query->max_num_pages,
                    'prev_text' => '« Trước',
                    'next_text' => 'Sau »',
                ]);
                echo '</div>';
                wp_reset_postdata();
            else:
                echo '<p>Không tìm thấy bài viết nào.</p>';
            endif;
            ?>
        </div>
    </div>
</section>





<div class="appilix_sales_notification" onclick="window.location.href='https://appilix.com/pricing';">
    <span class="user_icon"></span>
    <div class="sale_details">
        <h4><span class="user_name">Ferdousur</span> from <span class="user_location">Dhaka, Bangladesh</span></h4>
        <h5>Just Purchased <span class="plan_title">Android Lifetime</span> Plan</h5>
        <h6>9 hours ago</h6>
    </div>
</div>


<!--Appilix Subscription for News and Updates-->
<section class="appilix_newsletter appilix_section_space_medium">
    <div class="appilix_container">
        <div class="flex_container">
            <div class="appilix_section_header">
                <h2 class="left_then_center">Cập nhật tin tức và bài viết mới nhất</h2>
            </div>
            <div class="newsletter_form">
                <input type="email" autocomplete="off" class="email_input email" placeholder="Địa chỉ email của bạn" onkeyup="field_remove_errors(this)">
                <button type="submit" class="btn" onclick="email_subscription(`https://appilix.com`, `.appilix_newsletter button.btn`, `.appilix_newsletter input.email`)">Đăng ký ngay</button>
            </div>
        </div>
    </div>
</section>

<!--Appilix Section Divider-->
<section class="appilix_sec_divider">
    <hr class="appilix_divider">
</section>

<?php get_footer(); ?><!--Appilix Footer Section-->
