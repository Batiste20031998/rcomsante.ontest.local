<?php
defined('ABSPATH') or die('');

function montheme_register_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css');
    wp_register_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_register_style('slickdefault', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js', [], false, true);
    wp_register_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], false, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js', [], false, true);
    wp_register_script('main', get_template_directory_uri() . '/js/main.js', [], false, true);
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('slick');
    wp_enqueue_style('slickdefault');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('slick');
    wp_enqueue_script('main');
}
add_action('wp_enqueue_scripts', 'montheme_register_assets');
