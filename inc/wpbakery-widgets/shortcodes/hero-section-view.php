<?php
add_shortcode('hero_images', 'hero_images_shortcode');
function hero_images_shortcode($atts)
{

    if (function_exists('vc_map_get_attributes')) {
        $atts = vc_map_get_attributes('hero_images', $atts);
    }

    $slides = [];
    if (! empty($atts['slides']) && function_exists('vc_param_group_parse_atts')) {

        $slides = vc_param_group_parse_atts($atts['slides']);
    }



    ob_start();
?>
    <section class="hero-section">
        <div class="hero-section-decor"></div>
        <div class="container-fluid">
            <div class="swiper custom-swiper hero-section-swiper">
                <div class="swiper-wrapper">

                    <?php

                    if (empty($slides) || !is_array($slides)) {
                        return '';
                    }

                    foreach ($slides as $slide) :



                        $image_url = wp_get_attachment_image_url(absint($slide['slide_image']), 'full');

                        if (! $image_url) {
                            continue;
                        } else {
                            $image_url = esc_url($image_url);
                        }

                        $image_alt = ! empty($slide['slide_alt'])
                            ? esc_attr($slide['slide_alt'])
                            : '';


                    ?>
                        <div class="swiper-slide">
                            <img src="<?php echo $image_url; ?>"
                                alt="<?php echo $image_alt; ?>" />
                        </div>
                    <?php endforeach; ?>

                </div>

                <div class="slider-controllers">
                    <div class="start-or-pause" onclick="autoplayController(this)">
                        <span class="controller-btn start-slider"><i class="fa-solid fa-play"></i></span>
                        <span class="controller-btn pause-slider"><i class="fa-solid fa-pause"></i></span>
                    </div>

                    <div class="swiper-pagination hero-section-pagination custom-swiper-pagination"></div>
                </div>
            </div>
        </div>
    </section>
<?php
    return ob_get_clean();
}
