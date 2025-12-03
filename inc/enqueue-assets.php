<?php

$growink_version = wp_get_theme()->get('Version');

function growink_scripts()
{

    // HomePage Style
    // if (is_front_page()) {
    //     wp_enqueue_style('growink-home-style', get_template_directory_uri() . "/dist/css/home.min.css", array('growink-bootstrap-style'), $GLOBALS['growink_version']);
    // }

    // Font Family
    wp_enqueue_style(
        'growink-google-fonts',
        'https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;500;600;700;800;900;1000&family=Changa:wght@400;700&family=Lateef&family=Lalezar&family=Tajawal:wght@400;700&display=swap',
        array(),
        null
    );
    // Bootstrap
    wp_enqueue_style('growink-bootstrap-style', get_template_directory_uri() . "/dist/css/bootstrap.min.css", array(), "5.2.3");

    // Bootstrap Select
    wp_enqueue_style('growink-bootstrap-select-css', 'https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/css/bootstrap-select.min.css', array('growink-bootstrap-style'), '1.14.0');
    wp_enqueue_script('growink-bootstrap-select-js', "https://cdn.jsdelivr.net/npm/bootstrap-select@1.14.0-beta2/dist/js/bootstrap-select.min.js", array('jquery', 'growink-bootstrap-script'), false, true);

    // Fontawesome
    wp_enqueue_style('growink-fontawesome', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css", array());

    // Swiper CDN
    wp_enqueue_style('growink-swiper-style', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.css', array(), '9.2.4');
    wp_enqueue_script('growink-swiper-script', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js', array(), '11.0.5', false);

    // Toastr
    wp_enqueue_style('toastr-css', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css', array(), '2.1.5');
    wp_enqueue_script('toastr-js', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js', array('jquery'), '2.1.5', true);


    // Odometer
    wp_enqueue_style('odometer-css', 'https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/themes/odometer-theme-default.min.css', array(), '0.4.8');
    wp_enqueue_script('odometer-js', 'https://cdnjs.cloudflare.com/ajax/libs/odometer.js/0.4.7/odometer.min.js', array(), '0.4.8', true);

    // Lazyload
    wp_enqueue_script('lazyload-script', "https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js", true);
    /* __End CDN__ */

    /* __Start Scripts__ */
    wp_enqueue_script('growink-script', get_template_directory_uri() . '/dist/js/main.min.js', array(), $GLOBALS['growink_version'], true);


    /* __End Scripts__ */

    // Global Style
    wp_enqueue_style('growink-style', get_template_directory_uri() . "/dist/css/style.min.css", array(), $GLOBALS['growink_version']);

    $style_sheets_will_support_rtl = ['growink-style', 'growink-bootstrap-style'];
    support_rtl($style_sheets_will_support_rtl);

    // Underscore Scripts
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'growink_scripts');

/**
 * Add RTL support to stylesheets
 *
 * @param array $styles_ids
 * @return void
 */
function support_rtl($styles_ids)
{
    foreach ($styles_ids as $style_id):
        wp_style_add_data($style_id, 'rtl', 'replace');
        wp_style_add_data($style_id, 'suffix', '.min');
    endforeach;
}

// Download AR Language And Support Set It As Website Language
$locale = 'ar';
$available_languages = get_available_languages();
if (!in_array($locale, $available_languages)) {
    // Load WordPress core
    require_once(ABSPATH . 'wp-load.php');

    // Initialize the WordPress filesystem
    require_once(ABSPATH . 'wp-admin/includes/file.php');
    WP_Filesystem();
    require_once(ABSPATH . 'wp-admin/includes/translation-install.php');


    $result = wp_download_language_pack('ar'); // language string (ar) on success | false on failure

    if ($result !== false) {
        unset($GLOBALS['wp_local_package']);
        wp_clean_update_cache();
        update_option('WPLANG', 'ar');
        switch_to_locale('ar');
    }
}
/*  Switch The Website Language To English 
	But Exclude Admin Panel.
*/
if (!is_admin()) {

    switch_to_locale('ar');
}

/* __End Scripts__ */
