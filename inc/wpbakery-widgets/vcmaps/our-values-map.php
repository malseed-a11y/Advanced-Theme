<?php

if (function_exists('vc_map')) {
    vc_map([
        'name'        => 'Our Values Section',
        'base'        => 'our_values_section',
        'category'    => 'My Widgets',
        'description' => 'Dynamic values list',
        'params'      => [

            [
                'type'       => 'textfield',
                'heading'    => 'Section Title',
                'param_name' => 'section_title',
                'value'      => 'قيمنا',
            ],

            [
                'type'        => 'param_group',
                'heading'     => 'Values List',
                'param_name'  => 'values_group',
                'description' => 'Add unlimited value items',
                'params'      => [
                    [
                        'type'       => 'textfield',
                        'heading'    => 'Value Title',
                        'param_name' => 'value_title',
                    ],
                    [
                        'type'       => 'attach_image',
                        'heading'    => 'Value Icon',
                        'param_name' => 'value_icon',
                    ],
                ],
            ],

        ],
    ]);
}
