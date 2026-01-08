<?php

if (function_exists('vc_map')) {
    vc_map([
        'name'        => 'HTML Block',
        'base'        => 'html_block',
        'category'    => 'My Widgets',
        'description' => 'Insert  HTML Block  ID',

        'params'      => [

            [
                'type'        => 'textfield',
                'heading'     => 'Block ID',
                'param_name'  => 'block_id',
                'description' => 'Insert HTML Block ID ',
            ],

        ],
    ]);
}
