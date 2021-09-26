<?php
defined('ABSPATH') or die('');

function montheme_types()
{
    register_post_type('carousel-frontpage', [
        'label' => 'Carousel page d\'accueil',
        'public' => true,
        'supports' => ['title', 'editor', 'thumbnail', 'custom-field', 'page-attributes'],
        'show_in_rest' => true,
        'has_archive' => true,
        'hierarchical' => true,
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
