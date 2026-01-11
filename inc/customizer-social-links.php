<?php
// make a customizer that add social midea icon & link
if (!defined('ABSPATH')) {
    exit;
}

function growink_register_social_customizer($wp_customize)
{


    $wp_customize->add_section(
        'theme_social_section',
        array(
            'title'       => __('Social Links', 'growink'),
            'description' => __('Customize the social links of the theme.', 'growink'),
            'priority'    => 30,
        )
    );

    // X link
    $wp_customize->add_setting('x_social_link', array(
        'default'           => '',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
    ));


    $wp_customize->add_control('x_social_link', array(
        'section'     => 'theme_social_section',
        'label'       => __('Social Media X Link', 'growink'),
        'type'        => 'url',
    ));

    // facebook link
    $wp_customize->add_setting('facebook_social_link', array(
        'default'           => '',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
    ));


    $wp_customize->add_control('facebook_social_link', array(
        'section'     => 'theme_social_section',
        'label'       => __('Social Media Facebook Link', 'growink'),
        'type'        => 'url',
    ));

    // linkedin link
    $wp_customize->add_setting('linkedin_social_link', array(
        'default'           => '',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'esc_url_raw',
    ));


    $wp_customize->add_control('linkedin_social_link', array(
        'section'     => 'theme_social_section',
        'label'       => __('Social Media LinkedIn Link', 'growink'),
        'type'        => 'url',
    ));
}
add_action('customize_register', 'growink_register_social_customizer');
