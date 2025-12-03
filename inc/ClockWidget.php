<?php


class ClockWidget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'growink_clock_widget',
            __('Growink Clock Widget', 'growink'),
            [
                'description' => __('A widget that displays a dynamic digital clock.', 'growink'),
            ]
        );
    }


    public function widget($args, $instance)
    {

?>
        <div class="clock-display-container">

            <span id="time" class="clock-time">--:--:--</span>

            <span id="ampm" class="clock-ampm">--</span>

            <span id="time-emoji" class="clock-emoji"></span>
        </div>
    <?php

    }


    public function form($instance)
    {
        $title = !empty($instance['title']) ? $instance['title'] : __('Clock', 'growink');
    ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php _e('Title:', 'growink'); ?>
            </label>
            <input
                class="widefat"
                id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                type="text"
                value="<?php echo esc_attr($title); ?>">
        </p>

<?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = [];
        $instance['title'] = sanitize_text_field($new_instance['title']);
        return $instance;
    }
}

add_action('widgets_init', function () {
    register_widget('ClockWidget');
});
