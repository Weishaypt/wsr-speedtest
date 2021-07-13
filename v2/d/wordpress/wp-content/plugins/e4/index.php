<?php
/*
Plugin Name: E4
Description: Make a plugin that when activated, insert a new menu item on admin, and when accessed, shows a Title: "Plugin works!".
Version: 4.1.9
*/

add_action('admin_menu', 'add_my_page');

function add_my_page () {
    add_menu_page('Plugin works!', 'Plugin', 'read', 'plugin-works', function () {
        echo 'Plugin works!';
    });
}