<?php
/*
Plugin Name: E7
Description: Make a widget that list of title of all pages created, with their permalinks;
Version: 4.1.9
*/


class SitemapWidget extends WP_Widget {
    public function __construct()
    {
        parent::__construct(
            'sitemap_widget',
            'Sitemap widget'
        );
    }

    public function widget($args, $instance)
    {
        $args_query = array(
            'post_type' => 'page'

        );
        global $wp_query;
        $wp_query = new WP_Query($args_query);

        echo '<div class="sitemap-widget">Список страниц<ul>';
        while (have_posts()) {
            the_post();
            $title = get_the_title();
            $link = get_the_permalink();
            echo "<li><a href='{$link}'>{$title}</a></li>";
        }
        echo '</div></ul>';
    }
}

add_action('widgets_init', function () {
    register_widget('SitemapWidget');
});