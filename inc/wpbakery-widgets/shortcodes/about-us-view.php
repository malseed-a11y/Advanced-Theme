<?php
add_shortcode('about_us_section', 'about_us_section_shortcode');

function about_us_section_shortcode($atts)
{
    if (function_exists('vc_map_get_attributes')) {
        $atts = vc_map_get_attributes('about_us_section', $atts);
    }

    $atts = shortcode_atts([
        'main_title'    => '',
        'main_text'     => '',
        'message_icon'  => '',
        'message_title' => '',
        'message_text'  => '',
        'vision_icon'   => '',
        'vision_title'  => '',
        'vision_text'   => '',
        'goals_group'    => '',
    ], $atts, 'about_us_section');

    $goals = [];
    if (!empty($atts['goals_group'])) {
        $goals = vc_param_group_parse_atts($atts['goals_group']);
    }

    $message_icon_url = wp_get_attachment_image_url(absint($atts['message_icon']), 'full');
    $vision_icon_url  = wp_get_attachment_image_url(absint($atts['vision_icon']), 'full');

    ob_start();
?>
    <section id="about-us" class="about-us-section my-5">
        <div class="container">
            <div class="about-us-holder">

                <h2 class="growink-title large-title primary-title-color bold-title">
                    <?php echo esc_html($atts['main_title']); ?>
                </h2>

                <p class="growink-paragraph mb-2">
                    <?php echo esc_html($atts['main_text']); ?>
                </p>

                <div class="about-us-cards my-5">
                    <div class="decor top-decor">
                        <?php include get_template_directory() . '/dist/imgs/green-rec-decor.svg'; ?>
                    </div>

                    <div class="decor bottom-decor">
                        <?php include get_template_directory() . '/dist/imgs/green-cir-decor.svg'; ?>
                    </div>

                    <div class="about-us-item about-message blurry-bg">
                        <div class="about-us-item-title">
                            <img
                                src="<?php echo esc_url($message_icon_url); ?>"
                                alt=""
                                class="lazyload">

                            <span><?php echo esc_html($atts['message_title']); ?></span>
                        </div>

                        <div class="about-us-item-desc">
                            <span class="growink-paragraph">
                                <?php echo esc_html($atts['message_text']); ?>
                            </span>
                        </div>
                    </div>

                    <div class="about-us-item about-vision blurry-bg">
                        <div class="about-us-item-title">
                            <img
                                data-src="<?php echo esc_url($vision_icon_url); ?>"
                                alt="<?php echo esc_html($atts['vision_title']); ?>"
                                class="lazyload">

                            <span><?php echo esc_html($atts['vision_title']); ?></span>
                        </div>

                        <div class="about-us-item-desc">
                            <span class="growink-paragraph">
                                <?php echo esc_html($atts['vision_text']); ?>
                            </span>
                        </div>
                    </div>
                    <?php foreach ($goals as $goal) :
                        $title = isset($goal['goals_title']) ? $goal['goals_title'] : '';
                        $text  = isset($goal['goals_text']) ? $goal['goals_text'] : '';
                        $icon  = !empty($goal['goals_icon'])
                            ? wp_get_attachment_image_url(absint($goal['goals_icon']), 'full')
                            : '';
                    ?>

                        <div class="about-us-item about-mission blurry-bg">
                            <div class="about-us-item-title">
                                <img
                                    data-src="<?php echo esc_url($icon); ?>"
                                    alt=""
                                    class="lazyload">

                                <span><?php echo esc_html($title); ?></span>
                            </div>

                            <div class="about-us-item-desc">
                                <span class="growink-paragraph">
                                    <?php echo esc_attr($text); ?>
                                </span>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
<?php

    return ob_get_clean();
}
