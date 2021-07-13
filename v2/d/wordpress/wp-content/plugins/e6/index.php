<?php
/*
Plugin Name: E6
Description: Custom Area (Easy)
Version: 4.1.9
*/

add_action('widgets_init', function () {
    register_sidebar([
        'name' => 'Custom Area',
        'id' => 'custom-area',
        'before_widget' => '<div>',
        'after_widget' => '</div>'
    ]);
});