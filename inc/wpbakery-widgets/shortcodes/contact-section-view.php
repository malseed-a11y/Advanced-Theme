<?php
add_shortcode('contact_section', 'contact_section_shortcode');

function contact_section_shortcode($atts)
{
    if (function_exists('vc_map_get_attributes')) {
        $atts = vc_map_get_attributes('contact_section', $atts);
    }

    $atts = shortcode_atts([
        'section_title' => 'اتصل بنا',
        'form_shortcode' => '[contact-form-7 id="7f79f34" title="Contact Form"]',
    ], $atts);

    $section_title = esc_html($atts['section_title']);
    $form_shortcode = sanitize_text_field($atts['form_shortcode']);


    ob_start();
?>
    <section id="contact-us" class="contact-us-section">
        <div class="container">
            <h2 class="growink-title large-title primary-title-color bold-title">
                <?php echo $section_title ?>
            </h2>

            <?php
            // Render the CF7 form
            echo do_shortcode($form_shortcode);
            ?>
        </div>
    </section>
<?php

    return ob_get_clean();
}
