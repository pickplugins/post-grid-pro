<?php
if (!defined('ABSPATH')) exit;  // if direct access

add_filter('post_grid_settings_tabs', 'post_grid_pro_settings_tabs');

function post_grid_pro_settings_tabs($post_grid_settings_tab)
{
    $current_tab = isset($_REQUEST['tab']) ? sanitize_text_field($_REQUEST['tab']) : 'general';



    $post_grid_settings_tab[] = array(
        'id' => 'license_free',
        'title' => __('<i class="fas fa-laptop-code"></i> License', 'post-grid'),
        'priority' => 90,
        'active' => ($current_tab == 'license_free') ? true : false,
    );





    return $post_grid_settings_tab;
}


add_action('post_grid_settings_content_license_free', 'post_grid_settings_content_license_free', 10);

function post_grid_settings_content_license_free($tab)
{


    $post_grid_license = get_option('post_grid_license');
    $license_key = isset($post_grid_license['license_key']) ? $post_grid_license['license_key'] : '';
    $settings_tabs_field = new settings_tabs_field();

    $license_key = isset($post_grid_license['license_key']) ? $post_grid_license['license_key'] : '';

    //var_dump($post_grid_license);


?>
    <div class="section">
        <div class="section-title">License</div>
        <p class="description section-description">Use license to unlock premium features.</p>

        <?php
        ob_start();
        ?>
        <input type="text" name="post_grid_license[license_key]" value="<?php echo $license_key; ?>">

        <?php
        $html = ob_get_clean();
        $args = array(
            'id'        => 'license_key',
            'title'        => __('License key', 'post-grid'),
            'details'    => 'if you already purchased pro version please get your license key here <a target="_blank" href="https://pickplugins.com/my-account/license-keys/">https://pickplugins.com/my-account/license-keys/</a>',
            'type'        => 'custom_html',
            'html'        => $html,
        );
        $settings_tabs_field->generate_field($args);





        if (!empty($license_key)) :
            $class_post_grid_license = new class_post_grid_license2();

            $request_active = $class_post_grid_license->request_active($license_key);
            $request_check = $class_post_grid_license->request_check($license_key);

            // var_dump($request_check);



            $license_status = isset($request_check['license_status']) ? $request_check['license_status'] : '';
            $date_expiry = isset($request_check['date_expiry']) ? $request_check['date_expiry'] : '';
            $date_created = isset($request_check['date_created']) ? $request_check['date_created'] : '';
            $date_renewed = isset($request_check['date_renewed']) ? $request_check['date_renewed'] : '';

            $mgs = isset($request_check['mgs']) ? $request_check['mgs'] : '';



            //$today_date = strtotime(date('Y-m-d'));
            //$expire_date = strtotime($date_expiry);

            //$remaining_date = $expire_date - $today_date;


            //$interval = $today_date->diff($expire_date);

            //var_dump($today_date);
            //var_dump($expire_date);
            //var_dump($remaining_date);

            // $license_status = ($remaining_date < 0) ? 'Expired' : $license_status;


            //var_dump($interval->days);




            ob_start();
        ?>

            <p class="text-lg font-bold <?php echo ($license_status == 'expired') ? 'text-red-600' : 'text-green-600'; ?>">Staus: <?php echo $license_status; ?> </p>
            <p class="text-lg">Expire date: <?php echo $date_expiry; ?></p>
            <p class="text-lg">Created: <?php echo $date_created; ?></p>
            <p class="text-lg">Renewed: <?php echo $date_renewed; ?></p>
            <p class="text-lg">Message: <?php echo $mgs; ?></p>

            <?php if ($license_status == 'expired') { ?>

                <div>
                    <p class="text-lg text-red-600 my-5 font-bold">
                        Your license for Combo Blocks plugin has expried, please <a target="_blank" class="bg-blue-600 text-white hover:text-white over:bg-blue-700 px-5 py-1" href="https://pickplugins.com/post-grid/purchase-license/?licenseKey=<?php echo $license_key; ?>">Renew</a>
                    </p>
                </div>

            <?php }  ?>

        <?php

            $html = ob_get_clean();

            $args = array(
                'id'        => 'license_status',
                //'parent'        => 'post_grid_settings',
                'title'        => __('License status', 'woocommerce-products-slider-pro'),
                'details'    => '',
                'type'        => 'custom_html',
                'html'        => $html,

            );

            $settings_tabs_field->generate_field($args);
        endif;


        ?>

    </div>
<?php
}



add_action('post_grid_settings_save', 'post_grid_pro_settings_save');

function post_grid_pro_settings_save()
{

    $post_grid_license = isset($_POST['post_grid_license']) ?  stripslashes_deep($_POST['post_grid_license']) : array();
    update_option('post_grid_license', $post_grid_license);
}
