<?php

if (function_exists('vc_map')) {
    vc_map([
        'name'        => 'Contact Us Section',
        'base'        => 'contact_section',
        'category'    => 'My Widgets',
        'description' => 'Contact section with Contact Form 7',
        'params'      => [

            [
                'type'       => 'textfield',
                'heading'    => 'Section Title',
                'param_name' => 'section_title',
                'value'      => 'اتصل بنا',
            ],

            [
                'type'       => 'textfield',
                'heading'    => 'Contact Form 7 Shortcode',
                'param_name' => 'form_shortcode',
                'value'      => '[contact-form-7 id="7f79f34" title="Contact Form"]',
                'description' => 'Paste your CF7 shortcode here',
            ],

        ],
    ]);
}
