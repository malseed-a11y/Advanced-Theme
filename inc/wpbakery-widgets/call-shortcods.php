<?php


require_once get_template_directory() . '/inc/wpbakery-widgets/shortcodes/about-us-view.php';
require_once get_template_directory() . '/inc/wpbakery-widgets/shortcodes/hero-section-view.php';
require_once get_template_directory() . '/inc/wpbakery-widgets/shortcodes/our-values-view.php';
require_once get_template_directory() . '/inc/wpbakery-widgets/shortcodes/statistics-view.php';
require_once get_template_directory() . '/inc/wpbakery-widgets/shortcodes/contact-section-view.php';


add_action('vc_before_init', function () {

    require_once get_template_directory() . '/inc/wpbakery-widgets/vcmaps/about-us-map.php';
    require_once get_template_directory() . '/inc/wpbakery-widgets/vcmaps/hero-section-map.php';
    require_once get_template_directory() . '/inc/wpbakery-widgets/vcmaps/our-values-map.php';
    require_once get_template_directory() . '/inc/wpbakery-widgets/vcmaps/st
    require_once get_template_directory() . '/inc/wpbakery-widgets/vcmaps/contact-section-map.php';
});
