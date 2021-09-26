<?php
defined('ABSPATH') or die('');

function montheme_title_separator()
{
    return '|';
}
add_filter('document_title_separator', 'montheme_title_separator');
