<?php

if (function_exists('vc_map')) {
    vc_map([
        'name'        => 'Statistics Section',
        'base'        => 'statistics_section',
        'category'    => 'My Widgets',
        'description' => 'Company statistics (3 fixed items with icons)',
        'params'      => [

            [
                'type'       => 'textfield',
                'heading'    => 'Section Title',
                'param_name' => 'section_title',
                'value'      => 'الشركة في ارقام',
            ],

            // Statistic 1
            [
                'type'       => 'textfield',
                'heading'    => 'Stat 1 Number',
                'param_name' => 'stat1_value',
                'value'      => '',
            ],
            [
                'type'       => 'textfield',
                'heading'    => 'Stat 1 Title',
                'param_name' => 'stat1_title',
                'value'      => 'عميل سعيد',
            ],
            [
                'type'       => 'attach_image',
                'heading'    => 'Stat 1 Icon',
                'param_name' => 'stat1_icon',
            ],

            // Statistic 2
            [
                'type'       => 'textfield',
                'heading'    => 'Stat 2 Number',
                'param_name' => 'stat2_value',
                'value'      => '',
            ],
            [
                'type'       => 'textfield',
                'heading'    => 'Stat 2 Title',
                'param_name' => 'stat2_title',
                'value'      => 'منتج عالي الجودة',
            ],
            [
                'type'       => 'attach_image',
                'heading'    => 'Stat 2 Icon',
                'param_name' => 'stat2_icon',
            ],

            // Statistic 3
            [
                'type'       => 'textfield',
                'heading'    => 'Stat 3 Number',
                'param_name' => 'stat3_value',
                'value'      => '',
            ],
            [
                'type'       => 'textfield',
                'heading'    => 'Stat 3 Title',
                'param_name' => 'stat3_title',
                'value'      => 'مستودعات محلية للتوصيل السريع',
            ],
            [
                'type'       => 'attach_image',
                'heading'    => 'Stat 3 Icon',
                'param_name' => 'stat3_icon',
            ],
        ],
    ]);
}
