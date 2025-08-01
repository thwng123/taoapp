
<?php
function mytheme_register_menus() {
    register_nav_menu('primary', __( 'Primary Menu' ));
}
add_action( 'after_setup_theme', 'mytheme_register_menus' );
