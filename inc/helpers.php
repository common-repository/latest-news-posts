<?php

if (!defined('ABSPATH')) {
    echo esc_html('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

// Die and dump 
if (!function_exists('lnpa_dd')) {
    function lnpa_dd($data)
    {
        echo '<pre>';
        die(highlight_string("<?php\n\$data =\n" . var_export($data, true) . ";\n?>"));
        echo '</pre>';
    }
}

// Carbon fields option value to show
if (!function_exists('lnpa_option_val')) {
    function lnpa_option_val($option_id)
    {
        if (is_numeric($option_id)) {

            return absint(carbon_get_theme_option($option_id));
        } else {

            return esc_html(carbon_get_theme_option($option_id));
        }
    }
}

if (!function_exists('lnpa_limit_words')) {
    function lnpa_limit_words($content, $limit)
    {
        $content = strip_tags($content);
        $content = wp_trim_words($content, $limit, '...');

        return $content;
    }
}
