<?php

namespace ResponsiveLatestNews;

if (!defined('ABSPATH')) {
    echo esc_html('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

class LNPA_Enqueue_Scripts
{
    // Init scripts 
    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'enqueue_lnpa_scripts'));
        add_action('admin_enqueue_scripts', array($this, 'crb_enqueue_custom_carbon_fields_styles'));
    }

    // Enqueue scripts
    public function enqueue_lnpa_scripts()
    {
        wp_enqueue_style('lnpa-main', LNPA__PLUGIN_URL  . 'assets/css/lnpa-main.css', array(), LNPA_VERSION, 'all');

        if (!wp_script_is('jquery', 'enqueued')) {
            wp_enqueue_script('jquery');
        }
    }

    // Enqueue carbon-fields css
    public function crb_enqueue_custom_carbon_fields_styles()
    {
        wp_enqueue_style('carbon-fields-custom-theme', LNPA__PLUGIN_URL  . 'assets/css/carbon-fields-theme.css', array(), LNPA_VERSION, 'all');
    }
}
