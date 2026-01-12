<?php
if (!function_exists('html_block_shortcode')) {
    function html_block_shortcode($atts)
    {

        $atts = shortcode_atts([
            'block_id' => '',
        ], $atts, 'html_block');

        // validate block ID
        $block_id = absint($atts['block_id']);
        if (!$block_id) {
            return '';
        }
        //get the post  by ID
        $post = get_post(($block_id));
        if (!$post) {
            return '';
        }
        // Source - https://stackoverflow.com/a
        // Posted by shagshag
        // Retrieved 2026-01-12, License - CC BY-SA 4.0


        // make sure it's the correct post type
        if ($post->post_type !== 'html_blocks') return '';
        $block_content =  $post->post_content;
        ob_start();
?>
        <style type="text/css" data-type="vc_shortcodes-custom-css">
            <?php echo get_post_meta($block_id, '_wpb_shortcodes_custom_css', true); ?>
        </style>
        <section class="normal-margin">
            <div class="container">
                <?php echo apply_filters('the_content', $block_content); ?>
            </div>
        </section>

<?php
        return   ob_get_clean();
    }
}
add_shortcode('html_block', 'html_block_shortcode');
