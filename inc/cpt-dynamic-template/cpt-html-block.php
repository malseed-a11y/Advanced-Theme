<?php
if (!defined('ABSPATH')) {
    exit;
}


function html_block_cpt()
{

    $labels = array(
        'name' => 'HTML Blocks',
        'singular_name' => 'HTML Block',
        'menu_name' => 'HTML Blocks',
        'all_items' => 'All HTML Blocks',
        'add_new' => 'Add New',
        'add_new_item' => 'Add New HTML Block',
        'edit_item' => 'Edit HTML Block',
        'new_item' => 'New HTML Block',
        'view_item' => 'View HTML Block',
        'search_items' => 'Search HTML Blocks',
        'not_found' => 'No HTML Blocks found',
        'not_found_in_trash' => 'No HTML Blocks found in Trash',
    );

    $args = array(
        'label' => 'HTML Block',
        'labels' => $labels,
        'supports' => array('title', 'editor'),
        'public' => true,
        'show_ui' => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-editor-code',
        'rewrite' => array('slug' => 'html-block'),

    );

    register_post_type('html_blocks', $args);
}
add_action('init', 'html_block_cpt', 0);


// https://wpcodetips.com/customization/97/ Hrere how we add the custom columns

function add_html_blocks_columns($columns)
{
    $columns['html_block_id'] = 'Html Block ID';
    // $columns['featured_image'] = 'Featured Image';
    return $columns;
}
add_filter('manage_html_blocks_posts_columns', 'add_html_blocks_columns','html_blocks', 10, 1);

function display_html_blocks_columns($column, $post_id)
{
    if ($column === 'html_block_id') {
        echo '<input type="text" value="' . esc_attr($post_id) . '" readonly />';
    }

    // if ($column === 'featured_image') {
    //     $thumb = get_the_post_thumbnail($post_id, array(60, 60));
    //     echo $thumb ? $thumb : '—';
    // }
}
add_action('manage_html_blocks_posts_custom_column', 'display_html_blocks_columns', 10, 2);
