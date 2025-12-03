<?php

/**
 * Growink Theme Options - Footer Only
 */

defined('ABSPATH') || exit;

if (! class_exists('Redux')) {
    return;
}

// Option name where Redux data is stored.
$opt_name = 'growink_redux';

$theme = wp_get_theme();

// Basic Redux args.
$args = [
    'opt_name'           => $opt_name,
    'display_name'       => $theme->get('Name'),
    'display_version'    => $theme->get('Version'),
    'menu_type'          => 'menu',
    'allow_sub_menu'     => false,
    'menu_title'         => esc_html__('Growink Options', 'growink'),
    'page_title'         => esc_html__('Growink Options', 'growink'),
    'page_parent'        => 'themes.php',
    'page_priority'      => 90,
    'page_permissions'   => 'manage_options',
    'page_slug'          => $opt_name,
    'admin_bar'          => false,
    'dev_mode'           => false,
    'customizer'         => false,
    'save_defaults'      => true,
    'show_import_export' => false,
];

// Optional footer text inside Redux panel (can remove if not needed).
$args['footer_text'] = '<p>' . esc_html__('Theme options for Growink. Footer settings only.', 'growink') . '</p>';

Redux::set_args($opt_name, $args);

/**
 * Footer Section with a single "footer_text" option
 */
Redux::set_section(
    $opt_name,
    [
        'title' => esc_html__('Footer', 'growink'),
        'id'    => 'footer_section',
        'icon'  => 'el el-website',
        'fields' => [
            [
                'id'       => 'footer_text',
                'type'     => 'text',
                'title'    => esc_html__('Footer Copyright Text', 'growink'),
                'subtitle' => esc_html__('Enter the text to display in the footer copyright area.', 'growink'),
                'default'  => 'جميع الحقوق محفوظة © 2024',
            ],
            [
                'id'          => 'opt-color-title',
                'type'        => 'color',
                'output'      => [
                    'color'     => '.footer_text',
                    'important' => true,
                ],
                'title'       => esc_html__('Site Footer Color', 'growink'),
                'subtitle'    => esc_html__('Pick a footer text color for the theme (default: #000).', 'growink'),
                'default'     => '#000000',

                'transparent' => false,
                'validate'    => 'color',
            ],
        ],
    ]
);
