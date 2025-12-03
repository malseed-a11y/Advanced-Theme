<?php

if (function_exists('vc_map')) {
    vc_map(
        [
            'name'        => 'About Us Section',
            'base'        => 'about_us_section',
            'category'    => 'My Widgets',
            'description' => 'About us block with 3 cards',
            'params'      => [

                [
                    'type'        => 'textfield',
                    'heading'     => 'Main Title',
                    'param_name'  => 'main_title',
                    'value'       => 'حول الشركة',
                ],
                [
                    'type'        => 'textarea',
                    'heading'     => 'Main Text',
                    'param_name'  => 'main_text',
                    'value'       => 'انطلقت Growink في أوائل عام 2021 كمظلة لمشاريع التجارة الإلكترونية التي تأسست من قبل 2P ابتداءً من عام 2016. تهدف الشركة إلى الاستثمار والتوسع في مختلف القطاعات التجارية، وتسعى لتحقيق مزيد من النمو والتوسع من خلال مبادرات ومشاريع متنوعة تستهدف العديد من الأسواق المحلية والعالمية.',
                ],

                // Card 1
                [
                    'type'        => 'attach_image',
                    'heading'     => 'Message Icon',
                    'param_name'  => 'message_icon',
                ],
                [
                    'type'        => 'textfield',
                    'heading'     => 'Message Title',
                    'param_name'  => 'message_title',
                    'value'       => 'الرسالة',
                ],
                [
                    'type'        => 'textarea',
                    'heading'     => 'Message Text',
                    'param_name'  => 'message_text',
                    'value'       => 'التوسع الاستثماري في مختلف قطاعات التجارة، وتحقيق مزيد من النمو من خلال مبادرات ومشاريع متنوعة تستهدف العديد من الأسواق المحلية والعالمية',
                ],

                // Card 2
                [
                    'type'        => 'attach_image',
                    'heading'     => 'Vision Icon',
                    'param_name'  => 'vision_icon',
                ],
                [
                    'type'        => 'textfield',
                    'heading'     => 'Vision Title',
                    'param_name'  => 'vision_title',
                    'value'       => 'الرؤية',
                ],
                [
                    'type'        => 'textarea',
                    'heading'     => 'Vision Text',
                    'param_name'  => 'vision_text',
                    'value'       => 'نطمح لابتكار مشاريع تجارية ذات كفاءة عالية، متبعين أفضل نماذج العمل نجاحاً',
                ],
                // Card 3
                [
                    'type'        => 'param_group',
                    'heading'     => 'Goals List',
                    'param_name'  => 'goals_group',
                    'description' => 'Add unlimited new goals',
                    'params'      => [
                        [
                            'type'        => 'attach_image',
                            'heading'     => 'Goals Icon',
                            'param_name'  => 'goals_icon',
                        ],
                        [
                            'type'        => 'textfield',
                            'heading'     => 'Goals Title',
                            'param_name'  => 'goals_title',
                            'value'       => 'الأهداف',
                        ],
                        [
                            'type'        => 'textarea',
                            'heading'     => 'Goals Text',
                            'param_name'  => 'goals_text',
                            'value'       => 'تهدف الشركة إلى الاستثمار والتوسع في مختلف القطاعات التجارية، وتسعى لتحقيق مزيد من النمو والتوسع من خلال مبادرات ومشاريع متنوعة تستهدف العديد من الأسواق المحلية والعالمية.',
                        ],
                    ],

                ]
            ],
        ]


    );
}
