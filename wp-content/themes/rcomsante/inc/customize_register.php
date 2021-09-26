<?php
defined('ABSPATH') or die('');

function register_logo(WP_Customize_Manager $manager)
{

    $manager->add_section('rcomsante_apparence', [
        'title' => __('Theme apparence')
    ]);

    $manager->add_setting('logo', [
        'sanitize_callback' => 'esc_url_raw'
    ]);

    $manager->add_control(new WP_Customize_Image_Control($manager, 'logo', [
        'label' => __('Logo', 'rcomsante'),
        'section' => 'rcomsante_apparence'
    ]));
}
add_action('customize_register', 'register_logo');
