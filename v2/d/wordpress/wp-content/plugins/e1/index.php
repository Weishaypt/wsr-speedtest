<?php
/*
Plugin Name: E1
Description: Make a plugin that when activated, insert a new menu item on admin, and when accessed, shows a Title: "Plugin works!".
Version: 4.1.9
*/

add_action('wp_enqueue_scripts', 'e1_enqueue_scripts');

add_shortcode('social-tags', function () {
    return
<<<HTML
<div class="social-links">
<div class="facebook">
<i class="fab fa-facebook-f"></i>
</div>
<div class="pinterest">
<i class="fab fa-pinterest"></i>
</div>
<div class="twitter">
<i class="fab fa-twitter"></i>
</div>
<div class="tumblr">
<i class="fab fa-tumblr"></i>
</div>
</div>
HTML;

});
function e1_enqueue_scripts() {
    wp_enqueue_style('e1-fa', plugin_dir_url(__FILE__) . '/fontawesome/css/all.css');
    wp_enqueue_style('e1-style', plugin_dir_url(__FILE__) . '/style.css');
}