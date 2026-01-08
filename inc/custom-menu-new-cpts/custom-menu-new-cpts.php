<?php
add_action('admin_menu', 'my_custom_settings_menu');
function my_custom_settings_menu()
{
    add_menu_page(
        'CPTS Maker',
        'CPTS Maker',
        'manage_options',
        'maker_settings_page',
        'maker_settings_page_html',
        'dashicons-admin-customizer',
        4
    );
}

add_action('admin_init', 'maker_register_settings');
function maker_register_settings()
{

    register_setting('maker_settings_group', 'maker_data');

    add_settings_section('main_section', 'main settings', null, 'maker_settings_page');

    $fields = [
        'slug' => ['label' => 'Slug', 'type' => 'text'],
        'singular_name' => ['label' => 'Singular Name', 'type' => 'text'],
        'plural_name' => ['label' => 'Plural Name', 'type' => 'text'],
        'icon' => ['label' => 'CPT Icon', 'type' => 'text'],
        'supports' => ['label' => 'Supports', 'type' => 'text'],
        'is_public' => ['label' => 'Is Public', 'type' => 'checkbox'],
        'has_archive' => ['label' => 'Has Archive', 'type' => 'checkbox'],
        'show_in_rest' => ['label' => 'Show in REST API', 'type' => 'checkbox'],
        'hierarchical' => ['label' => 'Is It Hierarchical', 'type' => 'checkbox'],
        'menu_position' => ['label' => 'Menu Position', 'type' => 'number'],
    ];

    foreach ($fields as $id => $info) {
        add_settings_field(
            $id,
            $info['label'],
            'maker_callback',
            'maker_settings_page',
            'main_section',
            ['id' => $id, 'type' => $info['type']]
        );
    }
}

function maker_callback($args)
{
    $options = get_option('maker_data', []);
    $id = $args['id'];
    $value = isset($options[$id]) ? $options[$id] : '';


    if ($args['type'] === 'text') {
        echo '<input type="text" name="maker_data[' . esc_attr($id) . ']" value="' . esc_attr($value) . '">';
    }
    if ($args['type'] === 'checkbox') {

        echo '<input type="checkbox" name="maker_data[' . esc_attr($id) . ']" value="1" >';
    }
    if ($args['type'] === 'number') {

        echo '<input type="number" name="maker_data[' . esc_attr($id) . ']" value="' . esc_attr($value) . '" >';
    }
}

function maker_settings_page_html()
{
    if (!current_user_can('manage_options')) {
        return;
    }
?>
    <div class="wrap">
        <h1>CPTS Maker</h1>
        <form method="post" action="options.php">
            <?php

            settings_fields('maker_settings_group');
            do_settings_sections('maker_settings_page');
            submit_button('Make a New CPT');
            ?>
        </form>
    </div>
<?php
}

add_action('init', 'create_custom_post_type_dynamically');
function create_custom_post_type_dynamically()
{
    $args = get_option('maker_data', []);

    if (empty($args['slug']) || empty($args['singular_name'])) {
        return;
    }

    $slug = sanitize_title($args['slug']);
    $singular = sanitize_text_field($args['singular_name']);
    $plural =  sanitize_text_field($args['plural_name']);
    $menu_icon = sanitize_text_field($args['icon']);

    $supports = array_map('trim', explode(',', $args['supports']));

    $is_public = isset($args['is_public']) && $args['is_public'] == 1;
    $has_archive = isset($args['has_archive']) && $args['has_archive'] == 1;
    $show_in_rest = isset($args['show_in_rest']) && $args['show_in_rest'] == 1;
    $hierarchical = isset($args['hierarchical']) && $args['hierarchical'] == 1;

    $menu_position = isset($args['menu_position']) ? absint($args['menu_position']) : null;


    $labels = [
        'name'               => $plural,
        'singular_name'      => $singular,
        'menu_name'          => $plural,
        'add_new'            => 'Add New ' . $singular,
        'add_new_item'       => 'Add New ' . $singular,
        'edit_item'          => 'Edit ' . $singular,
        'new_item'           => 'New ' . $singular,
        'view_item'          => 'View ' . $singular,
        'search_items'       => 'Search ' . $plural,
        'not_found'          => 'No  found',
        'not_found_in_trash' => 'No found in Trash',
        'all_items'          => 'All ' . $plural,
        'archives'           => $plural . ' Archives',
    ];

    $post_type_args = [
        'labels'             => $labels,
        'public'             => $is_public,
        'publicly_queryable' => $is_public,

        'capability_type'    => 'post',
        'has_archive'        => $has_archive,
        'hierarchical'       => $hierarchical,
        'menu_position'      => $menu_position,
        'show_in_rest'       => $show_in_rest,
        'menu_icon'          => $menu_icon,
        'supports'           => $supports,
        'rewrite'            => ['slug' => $slug, 'with_front' => false],
    ];

    register_post_type($slug, $post_type_args);
}
