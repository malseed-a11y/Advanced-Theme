<?php

/**
 * Theme Font Customizer (Refresh Transport)
 *
 * @package growink
 */

function growink_register_font_customizer($wp_customize)
{
    $wp_customize->add_section(
        'theme_typography_section',
        [
            'title'       => __('Typography', 'growink'),
            'description' => __('Customize the main font settings of the theme.', 'growink'),
            'priority'    => 30,
        ]
    );

    $fonts = [
        'serif'          => 'Default Serif',
        'sans-serif'     => 'Default Sans-Serif',
        'Arial, sans-serif' => 'Arial',
        'Verdana, sans-serif' => 'Verdana',
        'Georgia, serif' => 'Georgia',
        'Tahoma, sans-serif' => 'Tahoma',
        'Times New Roman, serif' => 'Times New Roman',
        'Cairo, sans-serif'         => ' Cairo',
        'Changa, sans-serif'        => ' Changa',
        'Lateef, serif'             => ' Lateef',
        'Lalezar, cursive'          => ' Lalezar',
        'Tajawal, sans-serif'       => ' Tajawal',
    ];

    $setting_id = 'theme_main_font_family';

    $wp_customize->add_setting(
        $setting_id,
        [
            'default'           => 'sans-serif',
            'transport'         => 'refresh',
            'sanitize_callback' => 'sanitize_text_field',
        ]
    );

    $wp_customize->add_control(
        $setting_id,
        [
            'label'   => __('Select Main Font', 'growink'),
            'section' => 'theme_typography_section',
            'type'    => 'select',
            'choices' => $fonts,
        ]
    );
}
add_action('customize_register', 'growink_register_font_customizer');


function growink_output_customizer_font_css()
{
    $font_family = esc_attr(get_theme_mod('theme_main_font_family', 'sans-serif'));

?>
    <style id="growink-customizer-font">
        :root {
            --theme-main-font: <?php echo $font_family ?>;
        }

        * {
            font-family: var(--theme-main-font) !important
        }
    </style>
<?php
}

add_action('wp_head', 'growink_output_customizer_font_css', 20);
