<?php
add_shortcode('our_values_section', 'our_values_section_shortcode');

function our_values_section_shortcode($atts)
{
    if (function_exists('vc_map_get_attributes')) {
        $atts = vc_map_get_attributes('our_values_section', $atts);
    }

    $atts = shortcode_atts([
        'section_title' => '',
        'values_group'  => '',
    ], $atts);

    $values = [];
    if (!empty($atts['values_group'])) {
        $values = vc_param_group_parse_atts($atts['values_group']);
    }
    ob_start();
?>
    <section id="our-values" class="our-values normal-margin">
        <div class="container">

            <h2 class="growink-title large-title primary-title-color bold-title">
                <?php echo esc_html($atts['section_title']); ?>
            </h2>

            <div class="values-box-holder">

                <div class="decor top-decor">
                    <?php include get_template_directory() . '/dist/imgs/yellow-rec-decor.svg'; ?>
                </div>

                <div class="decor bottom-decor">
                    <?php include get_template_directory() . '/dist/imgs/yellow-cir-decor.svg'; ?>
                </div>

                <div class="values-box blurry-bg">

                    <?php foreach ($values as $item): ?>
                        <?php
                        $title = isset($item['value_title']) ? $item['value_title'] : '';
                        $icon  = !empty($item['value_icon'])
                            ? wp_get_attachment_image_url((int)$item['value_icon'], 'full')
                            : '';
                        ?>

                        <div class="value-item">
                            <span><?php echo esc_html($title); ?></span>
                            <?php if (!empty($icon)): ?>
                                <img data-src="<?php echo esc_url($icon); ?>" class="lazyload" alt="">
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </section>
<?php
    return ob_get_clean();
}
