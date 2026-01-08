<?php
add_shortcode('statistics_section', 'statistics_section_shortcode');

function statistics_section_shortcode($atts)
{
    if (function_exists('vc_map_get_attributes')) {
        $atts = vc_map_get_attributes('statistics_section', $atts);
    }

    $atts = shortcode_atts([
        'section_title' => 'الشركة في ارقام',

        'stat1_value'   => '',
        'stat1_title'   => 'عميل سعيد',
        'stat1_icon'    => '',

        'stat2_value'   => '',
        'stat2_title'   => 'منتج عالي الجودة',
        'stat2_icon'    => '',

        'stat3_value'   => '',
        'stat3_title'   => 'مستودعات محلية للتوصيل السريع',
        'stat3_icon'    => '',
    ], $atts);

    $stat1_icon_url = ! empty($atts['stat1_icon'])
        ? wp_get_attachment_image_url(absint($atts['stat1_icon']), 'full')
        : '';

    $stat2_icon_url = ! empty($atts['stat2_icon'])
        ? wp_get_attachment_image_url(absint($atts['stat2_icon']), 'full')
        : '';
    $stat3_icon_url = ! empty($atts['stat3_icon'])
        ? wp_get_attachment_image_url(absint($atts['stat3_icon']), 'full')
        : '';

    ob_start();
?>
    <section id="statistics" class="growink-statistics-section normal-margin">
        <div class="section-decor"></div>
        <div class="container">
            <h2 class="growink-title large-title primary-title-color bold-title">
                <?php echo esc_html($atts['section_title']); ?>
            </h2>

            <div class="statistics-holder">
                <div class="decor top-decor">
                    <?php include get_template_directory() . '/dist/imgs/green-rec-decor.svg'; ?>
                </div>

                <div class="decor bottom-decor">
                    <?php include get_template_directory() . '/dist/imgs/blue-cir-decor.svg'; ?>
                </div>

                <div class="statistics-box my-4 my-md-5">

                    <div class="statistic-item happy-clients">
                        <div class="statistic-item-info">
                            <span class="item-value">
                                <span>+</span>
                                <span class="odometer" data-value="<?php echo esc_html($atts['stat1_value']); ?>">
                                    <?php echo esc_html($atts['stat1_value']); ?>
                                </span>
                            </span>
                            <span class="item-title">
                                <?php echo esc_html($atts['stat1_title']); ?>
                            </span>
                        </div>

                        <div class="statistic-item-icon">
                            <img data-src="<?php echo esc_url($stat1_icon_url); ?>" alt="" class="lazyload">
                        </div>
                    </div>

                    <div class="statistic-item high-quality-products">
                        <div class="statistic-item-info">
                            <span class="item-value">
                                <span>+</span>
                                <span class="odometer" data-value="<?php echo esc_html($atts['stat2_value']); ?>">
                                    <?php echo esc_html($atts['stat2_value']); ?>
                                </span>
                            </span>
                            <span class="item-title">
                                <?php echo esc_html($atts['stat2_title']); ?>
                            </span>
                        </div>

                        <div class="statistic-item-icon">
                            <img data-src="<?php echo esc_url($stat2_icon_url); ?>" alt="" class="lazyload">
                        </div>
                    </div>

                    <div class="statistic-item factories">
                        <div class="statistic-item-info">
                            <span class="item-value">
                                <span>+</span>
                                <span class="odometer" data-value="<?php echo esc_html($atts['stat3_value']); ?>">
                                    <?php echo esc_html($atts['stat3_value']); ?>
                                </span>
                            </span>
                            <span class="item-title">
                                <?php echo esc_html($atts['stat3_title']); ?>
                            </span>
                        </div>

                        <div class="statistic-item-icon">
                            <img data-src="<?php echo esc_url($stat3_icon_url); ?>" alt="" class="lazyload">
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </section>
<?php
    return ob_get_clean();
}
