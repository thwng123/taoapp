
<?php
function mytheme_register_menus() {
    register_nav_menu('primary', __( 'Primary Menu' ));
    register_nav_menu('footer1', __( 'Footer Menu' ));
    register_nav_menu('footer2', __( 'Footer Menu 2' ));
    register_nav_menu('footer3', __( 'Footer Menu 3' ));
    register_nav_menu('menuphu', __( 'Menu Phu' ));

}
add_action( 'after_setup_theme', 'mytheme_register_menus' );

add_filter('use_block_editor_for_post', '__return_false');
function mytheme_setup() {
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mytheme_setup');

function appilix_add_metabox() {
    add_meta_box(
        'appilix_extra_fields',
        'Appilix Extra Fields',
        'appilix_metabox_callback',
        'post',
        'side'
    );
}
add_action('add_meta_boxes', 'appilix_add_metabox');

function appilix_metabox_callback($post) {
    $value = get_post_meta($post->ID, '_appilix_tag', true);
    ?>
    <label for="appilix_tag">Custom Tag:</label>
    <input type="text" id="appilix_tag" name="appilix_tag" value="<?php echo esc_attr($value); ?>" />
    <?php
}

function appilix_save_metabox($post_id) {
    if (array_key_exists('appilix_tag', $_POST)) {
        update_post_meta($post_id, '_appilix_tag', sanitize_text_field($_POST['appilix_tag']));
    }
}
add_action('save_post', 'appilix_save_metabox');
