<?php

namespace ResponsiveLatestNews;

if (!defined('ABSPATH')) {

    echo esc_html('Hi there!  I\'m just a plugin, not much I can do when called directly.');
    exit;
}

use Carbon_Fields\Container;
use Carbon_Fields\Field;
use Carbon_Fields\Carbon_Fields;

class LNPA_Carbon_Fields
{

    // Boot carbon fields plugin 
    public function lnpa_crb_load()
    {
        Carbon_Fields::boot();
    }

    // Register carbon fields and init submenu page 
    public function __construct()
    {
        add_action('carbon_fields_register_fields', array($this, 'lnpa_attach_theme_options'));
        add_action('after_setup_theme', array($this, 'lnpa_crb_load'));
    }

    private function lnpa_get_post_types()
    {
        $post_types_arr =  array();

        $args = array(
            'public'   => true
        );

        $post_types = get_post_types($args, 'names', 'and');
        $post_types = array_diff($post_types, array('page', 'attachment'));

        foreach ($post_types as $post_type) {
            $post_types_arr[$post_type] = ucfirst($post_type);
        }

        return $post_types_arr;
    }

    // Declare carbon fields options
    public function lnpa_attach_theme_options()
    {
        !current_user_can('manage_options');

        Container::make('theme_options', __('LNPA Settings', 'latest_news'))

            ->add_fields(array(
                Field::make('html', 'lnpa_config_help_text')
                    ->set_html('
                    <h2 class="note">Note:</h2>
                    <span>Use this shortcode to show the latest news/post/article <strong>[lnpa-latest-news]</strong><br/> If you want add more options or want to edit the look and feel, color etc. Then contact the plugin owner <strong>faferdaus@gmail.com</strong></span>
                '),
                Field::make('text', 'lnpa_wrapper_width', __('Latest news/post/article Wrapper Width', 'latest_news'))
                    ->set_attribute('placeholder', __('e.g. 1100', 'latest_news'))
                    ->set_help_text(__('Insert total width of Wrapper.', 'latest_news'))
                    ->set_default_value('1100'),

                Field::make('text', 'lnpa_item_max_width', __('Latest news/post/article Single Item Max Width', 'latest_news'))
                    ->set_attribute('placeholder', __('e.g. 388', 'latest_news'))
                    ->set_help_text(__('Insert max width of the Single Item.', 'latest_news'))
                    ->set_default_value('388'),

                Field::make('text', 'lnpa_item_image_height', __('Latest news/post/article Single Item Image Height', 'latest_news'))
                    ->set_attribute('placeholder', __('e.g. 273', 'latest_news'))
                    ->set_help_text(__('Insert Single Item Image Height.', 'latest_news'))
                    ->set_default_value('273'),

                Field::make('text', 'lnpa_item_max_height', __('Latest news/post/article Single Item Max Height', 'latest_news'))
                    ->set_attribute('placeholder', __('e.g. 478', 'latest_news'))
                    ->set_help_text(__('Insert news/post/article Single Item Max height.', 'latest_news'))
                    ->set_default_value('478'),

                Field::make('text', 'lnpa_how_many_news', __('How many news/post/article to show?', 'latest_news'))
                    ->set_attribute('placeholder', __('e.g. 3', 'latest_news'))
                    ->set_help_text(__('Insert, how many news/post/article you want to show at a time?.', 'latest_news'))
                    ->set_default_value('3'),

                Field::make('text', 'lnpa_how_many_words', __('How many words to show?', 'latest_news'))
                    ->set_attribute('placeholder', __('e.g. 20', 'latest_news'))
                    ->set_help_text(__('Insert, how many words you want to show at a time?.', 'latest_news'))
                    ->set_default_value('20'),

                Field::make('select', 'lnpa_post_type', __('Select news/post/article post type.'))
                    ->add_options(array($this, 'lnpa_get_post_types'))
            ));
    }
}
