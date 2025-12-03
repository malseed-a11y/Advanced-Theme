<?php

$the_post_id = get_the_ID();


function get_post_thumbnail_image($the_post_id, $size = 'full', $additional_attributes = [])
{
    $custom_thumbnail = null;

    if (!$the_post_id) {
        $the_post_id = get_the_ID();
    }

    if (has_post_thumbnail($the_post_id)) {
        $default_attributes = [
            'loading' => 'lazy',
        ];
        $attributes = array_merge($default_attributes, $additional_attributes);

        $attachment_id = get_post_thumbnail_id($the_post_id);

        $custom_thumbnail = wp_get_attachment_image(
            $attachment_id,
            $size,
            false,
            $attributes
        );
    }

    return $custom_thumbnail;
}

?>

<header class="entry-header ">

    <?php

    if (has_post_thumbnail($the_post_id)) {

    ?>
        <div class="entry-image mb-3">
            <a href="<?php echo esc_url(get_permalink($the_post_id)); ?>">
                <?php
                echo get_post_thumbnail_image($the_post_id, 'featured-large', ['sizes' => '( max-width: 768px ) 100vw, 768px']);
                ?>
            </a>
        </div>

    <?php
    }   ?>

    <?php
    the_title(
        '<h1 class="entry-title growing-title extra-large-title primary-title-color bold-title">',
        '</h1>'
    );
    ?>