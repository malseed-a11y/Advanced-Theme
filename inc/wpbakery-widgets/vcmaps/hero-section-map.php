<?php

if (function_exists('vc_map')) {
    vc_map([
        'name'        => 'Slider Images Hero Section',
        'base'        => 'hero_images',
        'category'    => 'My Widgets',
        'description' => 'Hero section slider with multiple images',
        'params'      => [
            [
                'type'        => 'param_group',
                'heading'     => 'Slides',
                'param_name'  => 'slides',
                'description' => 'Add slides with image and attribute.',
                'params'      => [
                    [
                        'type'        => 'attach_image',
                        'heading'     => 'Slide Image',
                        'param_name'  => 'slide_image',
                        'description' => 'Upload/select the slide background image.',
                    ],
                    [
                        'type'        => 'textfield',
                        'heading'     => 'Slide Alt',
                        'param_name'  => 'slide_alt',
                        'description' => 'Optional description of the image.',
                    ],
                ],
            ],
        ],
    ]);
}
