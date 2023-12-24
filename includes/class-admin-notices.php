<?php
if (!defined('ABSPATH')) exit; // if direct access 

class class_post_grid_pro_notices
{

    public function __construct()
    {

        add_action('admin_notices', array($this, 'free_version_missing'));
        //add_action('admin_notices', array( $this, 'import_layouts' ));

    }

    public function free_version_missing()
    {

        $active_plugins = get_option('active_plugins');

        ob_start();

        if (!in_array('post-grid/post-grid.php', (array) $active_plugins)) :
?>
            <div class="update-nag">
                <?php
                echo sprintf(__('<a href="%s">Combo Blocks</a> plugin free version is required to work <strong>Combo Blocks Pro</strong> version. <a href="%s">Search and install</a> ', 'post-grid-pro'), 'https://wordpress.org/plugins/post-grid/', admin_url() . 'plugin-install.php?s=post+grid+pickplugins&tab=search&type=term')
                ?>
            </div>
        <?php
        endif;


        echo ob_get_clean();
    }

    public function import_layouts()
    {

        $post_grid_info = get_option('post_grid_info');
        $import_pro_layouts = isset($post_grid_info['import_pro_layouts']) ? $post_grid_info['import_pro_layouts'] : '';

        ob_start();

        if ($import_pro_layouts != 'done') :
        ?>
            <div class="update-nag">
                <?php
                echo sprintf(__('Combo Blocks Pro require import pro layouts, please <a href="%s">click here</a> to go import page', 'post-grid-pro'), admin_url() . 'edit.php?post_type=post_grid&page=post-grid-settings&tab=help_support')
                ?>
            </div>
<?php
        endif;


        echo ob_get_clean();
    }
}

new class_post_grid_pro_notices();
