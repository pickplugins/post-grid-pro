<?php
/*
Plugin Name: Post Grid Combo - Pro
Plugin URI: https://www.pickplugins.com/item/post-grid-create-awesome-grid-from-any-post-type-for-wordpress/
Description: Awesome post grid for query post from any post type and display on grid.
Version: 3.3.11
Author: PickPlugins
Author URI: https://www.pickplugins.com/
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

if (!defined('ABSPATH')) exit;  // if direct access 

if (!class_exists('PostGridPro')) {
    class PostGridPro
    {

        public function __construct()
        {

            define('post_grid_pro_plugin_url', plugins_url('/', __FILE__));
            define('post_grid_pro_plugin_dir', plugin_dir_path(__FILE__));
            define('post_grid_pro_plugin_basename', plugin_basename(__FILE__));
            define('post_grid_pro_plugin_name', 'Post Grid - Pro');
            define('post_grid_pro_version', '3.3.11');
            define('post_grid_pro_server_url', 'https://www.pickplugins.com');

            add_action('plugins_loaded', [$this, 'init_plugin']);


            include('includes/3rd-party/3rd-party.php');
            include('includes/layout-elements.php');
            include('includes/media-source-options.php');

            include('templates/post-grid-hook.php');
            include('includes/functions.php');
            //include('includes/post-meta-settings.php');
            //include('includes/functions-post-meta-box.php');
            include('includes/class-post-grid-license.php');
            include('includes/class-admin-notices.php');
            include('includes/metabox-post-options-hook.php');

            include('includes/functions/functions-post-grid-meta-box.php');
            include('includes/functions/functions-post-grid-settings.php');


            add_action('wp_enqueue_scripts', array($this, '_scripts_front'));
            add_action('admin_enqueue_scripts', array($this, '_scripts_admin'));

            add_action('plugins_loaded', array($this, '_textdomain'));

            register_activation_hook(__FILE__, array($this, '_activation'));
            register_deactivation_hook(__FILE__, array($this, '_deactivation'));
        }


        public function _textdomain()
        {

            $locale = apply_filters('plugin_locale', get_locale(), 'post-grid-pro');
            load_textdomain('post-grid-pro', WP_LANG_DIR . '/post-grid/post-grid-' . $locale . '.mo');

            load_plugin_textdomain('post-grid-pro', false, plugin_basename(dirname(__FILE__)) . '/languages/');
        }

        public function _activation()
        {

            /*
             * Custom action hook for plugin activation.
             * Action hook: post_grid_pro_activation
             * */
            do_action('post_grid_pro_activation');
        }

        public function init_plugin()
        {
            $this->enqueue_scripts();
        }

        public function enqueue_scripts()
        {
            add_action('enqueue_block_editor_assets', [$this, 'register_block_editor_assets']);
        }


        public function post_grid_pro_uninstall()
        {

            /*
             * Custom action hook for plugin uninstall/delete.
             * Action hook: post_grid_pro_uninstall
             * */
            do_action('post_grid_pro_uninstall');
        }

        public function _deactivation()
        {

            /*
             * Custom action hook for plugin deactivation.
             * Action hook: post_grid_pro_deactivation
             * */
            do_action('post_grid_pro_deactivation');
        }


        public function _scripts_front()
        {


            wp_register_script('owl-carousel', post_grid_pro_plugin_url . 'assets/frontend/js/owl.carousel.js', array('jquery'));
            wp_register_style('owl-carousel', post_grid_pro_plugin_url . 'assets/frontend/css/owl.carousel.css');

            wp_register_script('post_grid_pro_scripts', post_grid_pro_plugin_url . 'assets/frontend/js/scripts.js', array('jquery'));

            wp_register_script('mixitup', post_grid_pro_plugin_url . 'assets/frontend/js/mixitup.min.js', array('jquery'));
            wp_register_script('mixitup_multifilter', post_grid_pro_plugin_url . 'assets/frontend/js/mixitup-multifilter.js', array('jquery'));
            wp_register_script('mixitup_pagination', post_grid_pro_plugin_url . 'assets/frontend/js/mixitup-pagination.js', array('jquery'));


            wp_enqueue_script('mixitup');
            wp_enqueue_script('mixitup_multifilter');
            wp_enqueue_script('mixitup_pagination');
            wp_enqueue_script('post_grid_pro_scripts');


            /*
             * Custom action hook for scripts front.
             * Action hook: post_grid_pro_scripts_front
             * */
            do_action('post_grid_pro_scripts_front');
        }


        public function _scripts_admin()
        {
            //wp_register_style('post-grid-style', post_grid_pro_plugin_url.'assets/admin/css/style.css');
            //wp_enqueue_style('post-grid-style');



            /*
             * Custom action hook for scripts admin.
             * Action hook: post_grid_pro_scripts_admin
             * */
            do_action('post_grid_pro_scripts_admin');
        }





        public function register_block_editor_assets()
        {


            wp_enqueue_script(
                'post-grid-pro-blocks-build',
                post_grid_pro_plugin_url . 'build/index.js',
                [
                    'wp-blocks',
                    'wp-editor',
                    'wp-i18n',
                    'wp-element',
                    'wp-components',
                    'wp-data'

                ],
                time()

            );
        }
    }
}
new PostGridPro();
