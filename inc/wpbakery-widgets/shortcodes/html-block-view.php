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
        // make sure it's the correct post type
        if ($post->post_type !== 'html_blocks') return '';
        $block_content =  $post->post_content;
        ob_start();
?>
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
