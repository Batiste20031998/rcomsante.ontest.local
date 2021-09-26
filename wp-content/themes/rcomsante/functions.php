<?php
function montheme_register_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css');
    wp_register_style('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js', ['popper', 'jquery'], false, true);
    wp_register_script('popper', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js', [], false, true);
    wp_register_script('slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', ['jquery'], false, true);
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.slim.min.js', [], false, true);
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('slick');
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('slick');
}
add_action('wp_enqueue_scripts', 'montheme_register_assets');
/* ---------------------------------------------------------------------------------------------------------------------------------------------- */
function montheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
}
add_action('after_setup_theme', 'montheme_supports');
/* ---------------------------------------------------------------------------------------------------------------------------------------------- */
function montheme_title_separator()
{
    return '|';
}
add_filter('document_title_separator', 'montheme_title_separator');
/* ---------------------------------------------------------------------------------------------------------------------------------------------- */
function register_navwalker()
{
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme', 'register_navwalker');
/* ---------------------------------------------------------------------------------------------------------------------------------------------- */
function prefix_bs5_dropdown_data_attribute($atts, $item, $args)
{
    if (is_a($args->walker, 'WP_Bootstrap_Navwalker')) {
        if (array_key_exists('data-toggle', $atts)) {
            unset($atts['data-toggle']);
            $atts['data-bs-toggle'] = 'dropdown';
        }
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'prefix_bs5_dropdown_data_attribute', 20, 3);
/* ----------------------------------------------------------------------------------------------------------------------------------------------- */
function montheme_types()
{
    register_post_type('carousel-frontpage', [
        'label' => 'Carousel page d\'accueil',
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'custom-field'],
        'show_in_rest' => true,
        'has_archive' => true,
    ]);

    register_post_type('last-speakers', [
        'label' => 'Précédents Intervenants',
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'custom-field'],
        'show_in_rest' => true,
        'has_archive' => true,
    ]);

    register_post_type('rocs-palmares', [
        'label' => 'Les Rocs Palmarès',
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'custom-field'],
        'show_in_rest' => true,
        'has_archive' => true,
    ]);

    register_post_type('rocs-programme', [
        'label' => 'Les Rocs Programme',
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'custom-field'],
        'show_in_rest' => true,
        'has_archive' => true,
    ]);
}
add_action('init', 'montheme_types');
