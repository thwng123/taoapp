<!--Appilix Footer Section-->
<footer class="appilix_footer appilix_section_space_medium">
    <div class="appilix_container">
        <div class="footer_row">
            <div class="footer_info">
                <img class="footer_logo" src="<?php echo get_template_directory_uri(); ?>/images/ipozQPAEgnaK.svg" alt="Appilix">
            </div>
            <div class="column fst_col">
                <div class="footer_links">
                    <h6 class="h6">About</h6>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer1', // Tên location bạn sẽ đăng ký
                        'container' => false, // Không bọc thêm <div>
                        'menu_class' => 'foo_links', // Thêm class vào <ul>
                    ));
                    ?>
                </div>
            </div>
            <div class="column">
                <div class="footer_links">
                    <h6 class="h6">Discover</h6>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer2', // Tên location bạn sẽ đăng ký
                        'container' => false, // Không bọc thêm <div>
                        'menu_class' => 'foo_links', // Thêm class vào <ul>
                    ));
                    ?>
                </div>
            </div>
            <div class="column">
                <div class="footer_links">
                    <h6 class="h6">Resources</h6>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer3', // Tên location bạn sẽ đăng ký
                        'container' => false, // Không bọc thêm <div>
                        'menu_class' => 'foo_links', // Thêm class vào <ul>
                    ));
                    ?>
                </div>
            </div>
            <div class="column">
                <div class="footer_links">
                    <h6 class="h6">Connect With Us</h6>
                    <ul class="footer_socials text_center">
                        <li><a target="_blank" href="https://www.facebook.com/appilix" aria-label="Check Appilix on Facebook"> <i class=" social_icon facebook_icon"></i> </a></li>
                        <li><a target="_blank" href="https://www.linkedin.com/company/appilix" aria-label="Check Appilix on LinkedIn"> <i class="social_icon linkedin_icon"></i> </a></li>
                        <li><a target="_blank" href="https://www.youtube.com/channel/UCMnzi1RKEQ0FStSPYEJ_L4Q" aria-label="Check Appilix on YouTube"><i class="social_icon youtube_icon"></i> </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <hr class="appilix_divider">
        <div class="bottom_footer">
            <div class="footer_copyright">
                <p>© 2025 Appilix. All Rights Reserved</p>
            </div>
            <ul class="bottom_footer_list">
                <li class="last_li">
                    <a href="https://appilix.com/privacy-policy">Privacy Policy</a>
                </li>
                <li class="last_li">
                    <a href="https://appilix.com/terms-conditions">Terms & Conditions</a>
                </li>
            </ul>
        </div>
    </div>
</footer>


<!-- Google tag (gtag.js) -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=G-RPM1G6T3JH"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-RPM1G6T3JH');
</script>

<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/hyApNmLaMbRo.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/qMsAbL3SgzCg.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/SpU7pBDOjm85.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/5LCAjiLBt6wu.js"></script>
<script>
    AOS.init();
</script>
<script>
    function addHttpIfMissing() {
        var websiteInput = document.getElementById('websiteInput');
        var inputValue = websiteInput.value.trim();
        if (!/^https?:\/\//i.test(inputValue)) {
            websiteInput.value = 'https://' + inputValue;
        }
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.popup-youtube').magnificPopup({
            disableOn: 700,
            type: 'iframe',
            mainClass: 'mfp-fade',
            removalDelay: 160,
            preloader: false,
            fixedContentPos: false
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function(){
        setTimeout(function() {
            appilix_show_sales_notification(`https://appilix.com`)
        }, 3000);
    });
</script>
<script>
    if (document.querySelector('.appilix_discount_notification_bar')) {
        calculateDiscountTimeDifference("2025-08-01 06:32:40", "15-05-2025 23:59:59");
    }
</script>


</body></html>