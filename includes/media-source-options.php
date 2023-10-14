<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

function post_grid_pro_media_source_list($sources){

    $sources['custom_thumb'] = __('Custom thumb','post-grid');
    $sources['font_awesome'] = __('Font awesome','post-grid');
    //$sources['first_gallery'] = __('First gallery','post-grid');
    $sources['first_youtube'] = __('First youtube','post-grid');
    $sources['custom_youtube'] = __('Custom youtube','post-grid');

    $sources['first_vimeo'] = __('First vimeo','post-grid');
    $sources['custom_vimeo'] = __('Custom vimeo','post-grid');

    $sources['first_dailymotion'] = __('First dailymotion','post-grid');
    $sources['custom_dailymotion'] = __('Custom dailymotion','post-grid');

    $sources['first_mp3'] = __('First MP3','post-grid');
    $sources['custom_mp3'] = __('Custom MP3','post-grid');

    $sources['first_soundcloud'] = __('First soundcloud','post-grid');
    $sources['custom_soundcloud'] = __('Custom soundcloud','post-grid');

    $sources['custom_video'] = __('Custom video','post-grid');



    return $sources;

}

add_filter('post_grid_media_source_list', 'post_grid_pro_media_source_list');





add_action('media_source_options_custom_thumb', 'media_source_options_custom_thumb');

function media_source_options_custom_thumb($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][custom_thumb]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);


//    $args = array(
//        'id'		=> 'image_size',
//        'parent' => $input_name.'[media][media_source][custom_thumb]',
//        'title'		=> __('Image size','post-grid'),
//        'details'	=> __('Select media image size','post-grid'),
//        'type'		=> 'select',
//        'value'		=> $image_size,
//        'default'		=> 'large',
//        'args'		=> post_grid_image_sizes(),
//    );
//
//    $settings_tabs_field->generate_field($args);

    $args = array(
        'id'		=> 'link_to',
        'css_id'		=> $index.'_link_to',
        'parent' => $input_name.'[media][media_source][custom_thumb]',
        'title'		=> __('Link to','post-grid'),
        'details'	=> __('Choose link to featured image.','post-grid'),
        'type'		=> 'select',
        'value'		=> $link_to,
        'default'		=> 'post_link',
        'args'		=> array(
            'post_link'=> __('Post link', 'post-grid'),
            'none'=> __('None', 'post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);


    $args = array(
        'id'		=> 'link_target',
        'css_id'		=> $index.'_link_target',
        'parent' => $input_name.'[media][media_source][custom_thumb]',
        'title'		=> __('Link target','post-grid'),
        'details'	=> __('Choose link target.','post-grid'),
        'type'		=> 'select',
        'value'		=> $link_target,
        'default'		=> '_self',
        'args'		=> array(
            '_blank'=> __('_blank', 'post-grid'),
            '_parent'=> __('_parent', 'post-grid'),
            '_self'=> __('_self', 'post-grid'),
            '_top'=> __('_top', 'post-grid'),

        ),
    );

    $settings_tabs_field->generate_field($args);


}




add_action('media_source_options_font_awesome', 'media_source_options_font_awesome');

function media_source_options_font_awesome($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][font_awesome]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);



    $args = array(
        'id'		=> 'link_to',
        'css_id'		=> $index.'_link_to',
        'parent' => $input_name.'[media][media_source][font_awesome]',
        'title'		=> __('Link to','post-grid'),
        'details'	=> __('Choose link to featured image.','post-grid'),
        'type'		=> 'select',
        'value'		=> $link_to,
        'default'		=> 'post_link',
        'args'		=> array(
            'post_link'=> __('Post link', 'post-grid'),
            'none'=> __('None', 'post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);


    $args = array(
        'id'		=> 'link_target',
        'css_id'		=> $index.'_link_target',
        'parent' => $input_name.'[media][media_source][font_awesome]',
        'title'		=> __('Link target','post-grid'),
        'details'	=> __('Choose link target.','post-grid'),
        'type'		=> 'select',
        'value'		=> $link_target,
        'default'		=> '_self',
        'args'		=> array(
            '_blank'=> __('_blank', 'post-grid'),
            '_parent'=> __('_parent', 'post-grid'),
            '_self'=> __('_self', 'post-grid'),
            '_top'=> __('_top', 'post-grid'),

        ),
    );

    $settings_tabs_field->generate_field($args);


}



add_action('media_source_options_first_youtube', 'media_source_options_first_youtube');

function media_source_options_first_youtube($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][first_youtube]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);



}

add_action('media_source_options_custom_youtube', 'media_source_options_custom_youtube');

function media_source_options_custom_youtube($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][custom_youtube]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);



}



add_action('media_source_options_first_vimeo', 'media_source_options_first_vimeo');

function media_source_options_first_vimeo($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][first_vimeo]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);



}



add_action('media_source_options_custom_vimeo', 'media_source_options_custom_vimeo');

function media_source_options_custom_vimeo($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][custom_vimeo]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);



}


add_action('media_source_options_first_dailymotion', 'media_source_options_first_dailymotion');

function media_source_options_first_dailymotion($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][first_dailymotion]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);



}




add_action('media_source_options_custom_dailymotion', 'media_source_options_custom_dailymotion');

function media_source_options_custom_dailymotion($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][custom_dailymotion]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);



}




add_action('media_source_options_first_mp3', 'media_source_options_first_mp3');

function media_source_options_first_mp3($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][first_mp3]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);



}



add_action('media_source_options_custom_mp3', 'media_source_options_custom_mp3');

function media_source_options_custom_mp3($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][custom_mp3]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);



}


add_action('media_source_options_first_soundcloud', 'media_source_options_first_soundcloud');

function media_source_options_first_soundcloud($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][first_soundcloud]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);



}





add_action('media_source_options_custom_soundcloud', 'media_source_options_custom_soundcloud');

function media_source_options_custom_soundcloud($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][custom_soundcloud]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);



}



add_action('media_source_options_custom_video', 'media_source_options_custom_video');

function media_source_options_custom_video($media_source){
    $settings_tabs_field = new settings_tabs_field();


    $index = isset($media_source['index']) ? $media_source['index'] : '';
    $input_name = isset($media_source['input_name']) ? $media_source['input_name'] : '';
    $source_data = isset($media_source['source_data']) ? $media_source['source_data'] : '';



    $margin = isset($source_data['margin']) ? $source_data['margin'] : '';
    $enable = isset($source_data['enable']) ? $source_data['enable'] : '';
    $image_size = isset($source_data['image_size']) ? $source_data['image_size'] : '';
    $link_to = isset($source_data['link_to']) ? $source_data['link_to'] : '';
    $link_target = isset($source_data['link_target']) ? $source_data['link_target'] : '';


    $args = array(
        'id'		=> 'enable',
        'parent' => $input_name.'[media][media_source][custom_video]',
        'title'		=> __('Enable','post-grid'),
        'details'	=> __('Enable or disable this media source.','post-grid'),
        'type'		=> 'radio',
        'value'		=> $enable,
        'default'		=> 'no',
        'args'		=> array(
            'no'=>__('No','post-grid'),
            'yes'=>__('Yes','post-grid'),
        ),
    );

    $settings_tabs_field->generate_field($args);



}




add_action('post_grid_media', 'post_grid_media_custom_source', 10, 2);

function post_grid_media_custom_source($post_id, $args){

    $source_id = isset($args['source_id']) ? $args['source_id'] : '' ;
    $source_args = isset($args['source_args']) ? $args['source_args'] : '' ;
    $post_settings = isset($args['post_settings']) ? $args['post_settings'] : '';

    $item_post_permalink = apply_filters('post_grid_item_post_permalink', get_permalink($post_id));

    //var_dump($source_id);



    if($source_id == 'custom_thumb'){

        $link_to = isset($source_args['link_to']) ? $source_args['link_to'] : 'post_link';
        $link_target = isset($source_args['link_target']) ? $source_args['link_target'] : '';

        $custom_thumb_source = isset($post_settings['custom_thumb_source']) ? $post_settings['custom_thumb_source'] : '';


        if($link_to=='post_link'){
            ?>
            <a target="<?php echo $link_target; ?>" class="custom" href="<?php echo $item_post_permalink; ?>"><img src="<?php echo $custom_thumb_source; ?>" /></a>
            <?php
        }
        else{
            ?>
            <img class="custom" src="<?php echo $custom_thumb_source; ?>" />
            <?php
        }


    }
    elseif($source_id == 'font_awesome'){

        $link_to = isset($source_args['link_to']) ? $source_args['link_to'] : 'post_link';
        $link_target = isset($source_args['link_target']) ? $source_args['link_target'] : '';

        $font_awesome_icon = isset($post_settings['font_awesome_icon']) ? $post_settings['font_awesome_icon'] : '';
        $font_awesome_icon_color = isset($post_settings['font_awesome_icon_color']) ? $post_settings['font_awesome_icon_color'] : '';
        $font_awesome_icon_size = isset($post_settings['font_awesome_icon_size']) ? $post_settings['font_awesome_icon_size'] : '';


        if($link_to=='post_link'){
            ?>
            <a target="<?php echo $link_target; ?>" class="custom" href="<?php echo $item_post_permalink; ?>"><i style="color:<?php echo $font_awesome_icon_color; ?>;font-size:<?php echo $font_awesome_icon_size; ?>" class="<?php echo $font_awesome_icon; ?>"></i></a>
            <?php
        }
        else{
            ?>
            <i style="color:<?php echo $font_awesome_icon_color; ?>;font-size:<?php echo $font_awesome_icon_size; ?>" class="<?php echo $font_awesome_icon; ?>"></i>
            <?php
        }


    }

    elseif($source_id == 'first_vimeo'){

        $post = get_post($post_id);
        $post_type = $post->post_type;
        //var_dump($post_type);
        $embed_youtube = '';
        $content = do_shortcode( $post->post_content );

        $WP_Embed = new WP_Embed();
        $content = $WP_Embed->autoembed( $content);
        $embeds = get_media_embedded_in_content( $content, 'iframe' );

        foreach($embeds as $key=>$embed){

            if(strchr($embed,'vimeo')){

                $embed_youtube = $embed;
            }

        }

        echo $embed_youtube;


    }elseif($source_id == 'custom_vimeo'){

        $custom_vimeo_id = isset($post_settings['custom_vimeo_id']) ? $post_settings['custom_vimeo_id'] : '';


        if(!empty($custom_vimeo_id)){
            ?>
            <iframe frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="https://player.vimeo.com/video/<?php echo $custom_vimeo_id; ?>"></iframe>
            <?php

        }



    }

    elseif($source_id == 'first_youtube'){

        $post = get_post($post_id);
        $post_type = $post->post_type;
        //var_dump($post_type);
        $embed_youtube = '';

        $content = do_shortcode( $post->post_content );

        $WP_Embed = new WP_Embed();
        $content = $WP_Embed->autoembed( $content);
        $embeds = get_media_embedded_in_content( $content, 'iframe' );

        foreach($embeds as $key=>$embed){

            if(strchr($embed,'youtube')){

                $embed_youtube = $embed;
            }

        }

        echo $embed_youtube;


    }

    elseif($source_id == 'custom_youtube'){

        $custom_youtube_id = isset($post_settings['custom_youtube_id']) ? $post_settings['custom_youtube_id'] : '';


        if(!empty($custom_youtube_id)){
            ?>
            <iframe frameborder="0" allowfullscreen="" src="http://www.youtube.com/embed/<?php echo $custom_youtube_id; ?>?feature=oembed"></iframe>
            <?php

        }



    }

    elseif($source_id == 'first_dailymotion'){

        $post = get_post($post_id);
        $post_type = $post->post_type;
        //var_dump($post_type);
        $embed_youtube = '';
        $content = do_shortcode( $post->post_content );

        $WP_Embed = new WP_Embed();
        $content = $WP_Embed->autoembed( $content);
        $embeds = get_media_embedded_in_content( $content, 'iframe' );

        foreach($embeds as $key=>$embed){

            if(strchr($embed,'dailymotion')){

                $embed_youtube = $embed;
            }

        }

        echo $embed_youtube;


    }


    elseif($source_id == 'custom_dailymotion'){

        $custom_dailymotion_id = isset($post_settings['custom_dailymotion_id']) ? $post_settings['custom_dailymotion_id'] : '';


        if(!empty($custom_dailymotion_id)){
            ?>
            <iframe frameborder="0" allowfullscreen="" mozallowfullscreen="" webkitallowfullscreen="" src="//www.dailymotion.com/embed/video/<?php echo $custom_dailymotion_id; ?>"></iframe>

            <?php

        }



    }


    elseif($source_id == 'first_mp3'){

        $post = get_post($post_id);
        $post_type = $post->post_type;
        //var_dump($post_type);
        $embed_youtube = '';
        $content = do_shortcode( $post->post_content );

        $WP_Embed = new WP_Embed();
        $content = $WP_Embed->autoembed( $content);
        $embeds = get_media_embedded_in_content( $content, 'audio' );

        foreach($embeds as $key=>$embed){

            if(strchr($embed,'mp3')){

                $embed_youtube = $embed;
            }

        }

        echo $embed_youtube;


    }

    elseif($source_id == 'custom_mp3'){

        $custom_mp3_url = isset($post_settings['custom_mp3_url']) ? $post_settings['custom_mp3_url'] : '';


        if(!empty($custom_mp3_url)){

            echo do_shortcode('[audio src="'.$custom_mp3_url.'"]');

        }



    }

    elseif($source_id == 'first_soundcloud'){

        $post = get_post($post_id);
        $post_type = $post->post_type;
        //var_dump($post_type);
        $embed_youtube = '';
        $content = do_shortcode( $post->post_content );

        $WP_Embed = new WP_Embed();
        $content = $WP_Embed->autoembed( $content);
        $embeds = get_media_embedded_in_content( $content, 'iframe' );

        foreach($embeds as $key=>$embed){

            if(strchr($embed,'soundcloud')){

                $embed_youtube = $embed;
            }

        }

        echo $embed_youtube;


    }


    elseif($source_id == 'custom_soundcloud'){

        $custom_soundcloud_id = isset($post_settings['custom_soundcloud_id']) ? $post_settings['custom_soundcloud_id'] : '';


        if(!empty($custom_soundcloud_id)){

            ?>
            <iframe width="100%" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/<?php echo $custom_soundcloud_id; ?>&amp;auto_play=false&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;visual=true"></iframe>
            <?php

        }



    }




    elseif($source_id == 'custom_video'){

        $custom_soundcloud_id = isset($post_settings['custom_soundcloud_id']) ? $post_settings['custom_soundcloud_id'] : '';


        $video_html = '';


        if(!empty($post_settings[0]['custom_video_MP4'])):

            $video_html .= 'mp4="'.$post_settings[0]['custom_video_MP4'].'"';

        elseif (!empty($post_settings[0]['custom_video_WEBM'])):

            $video_html .= 'webm="'.$post_settings[0]['custom_video_WEBM'].'"';

        elseif (!empty($post_settings[0]['custom_video_OGV'])):

            $video_html .= 'ogv="'.$post_settings[0]['custom_video_OGV'].'"';

        endif;

        echo do_shortcode('[video '.$video_html.'][/video]');




    }





}



















