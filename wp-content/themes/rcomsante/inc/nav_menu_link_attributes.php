<?php
defined('ABSPATH') or die('');

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
