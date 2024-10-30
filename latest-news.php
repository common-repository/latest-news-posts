<?php
/*
Plugin Name: Latest News, Posts, Articles
Description: Responsive Latest News/Posts/Feeds/Articles is easy to use. You can add as many News/Posts/Feeds/Articles as you want. 
If you want to modify or want to add extra features, please contact the owner faferdaus@gmail.com.
Author: Ferdaus Alom
Author URI: https://ferdausalom.site
Version: 1.0.0
Requires at least: 5.0
Requires PHP: 5.0
Text Domain: latest_news
*/

// Make sure we don't expose any info if called directly
if (!defined('ABSPATH')) {
    echo esc_html('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

// Load Composer autoloader
$lnpa_autoload_file = __DIR__ . '/vendor/autoload.php';
if (file_exists($lnpa_autoload_file)) {
    require_once $lnpa_autoload_file;
}

// Register your plugin's namespace with Composer
$loader = new \Composer\Autoload\ClassLoader();
$loader->addPsr4('ResponsiveLatestNews\\', __DIR__ . '/Classes');
$loader->register();

// Define plugin constants 
define('LNPA_VERSION', '1.0.0');
define('LNPA__PLUGIN_DIR', plugin_dir_path(__FILE__));
define('LNPA__PLUGIN_URL', plugin_dir_url(__FILE__));

// Include required classes 
use ResponsiveLatestNews\LNPA_Enqueue_Scripts;
use ResponsiveLatestNews\LNPA_Short_Codes;
use ResponsiveLatestNews\LNPA_Carbon_Fields;


class Plugin_LNPA_Bootstrap
{
    // Init plugin 
    public function __construct()
    {
        add_action('plugins_loaded', array($this, 'LNPA_run_classes'));
    }

    // Instantiate required classes 
    public function LNPA_run_classes()
    {
        new LNPA_Enqueue_Scripts;
        new LNPA_Short_Codes;
        new LNPA_Carbon_Fields;
    }
}

new Plugin_LNPA_Bootstrap;
