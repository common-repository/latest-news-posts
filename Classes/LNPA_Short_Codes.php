<?php

namespace ResponsiveLatestNews;

if (!defined('ABSPATH')) {
    echo esc_html('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

class LNPA_Short_Codes
{
    // Init shortcode 
    public function __construct()
    {
        add_shortcode('lnpa-latest-news', array($this, 'lnpa_latest_news'));
    }

    // Include latest news in the front-end
    public function lnpa_latest_news()
    {
        ob_start();
        include LNPA__PLUGIN_DIR . 'views/latest-news.php';
        $output = ob_get_clean();
        return $output;
    }
}
