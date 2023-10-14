<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_filter('post_grid_layout_elements','post_grid_pro_layout_elements_advance');

function post_grid_pro_layout_elements_advance($elements_group){

    $elements_group['advance'] = array(
        'group_title'=>'Advance',
        'items'=>array(
            'meta_key'=>array('name' =>__('Custom meta field','post-grid')),
            'html'=>array('name' =>__('Custom HTML','post-grid')),
            'custom_taxonomy'=>array('name' =>__('Taxonomy & terms','post-grid')),
        ),

    );




    return $elements_group;
}




add_action('post_grid_layout_element_option_meta_key','post_grid_layout_element_option_meta_key');
function post_grid_layout_element_option_meta_key($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $field_id = isset($element_data['field_id']) ? $element_data['field_id'] : '';
    $word_count = isset($element_data['word_count']) ? $element_data['word_count'] : '';

    $wrapper_html = !empty($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '%s';
    $enable_autoembed = isset($element_data['enable_autoembed']) ? $element_data['enable_autoembed'] : '';
    $enable_shortcode = isset($element_data['enable_shortcode']) ? $element_data['enable_shortcode'] : '';
    $enable_wpautop = isset($element_data['enable_wpautop']) ? $element_data['enable_wpautop'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';
    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';



    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Custom meta field','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'field_id',
                'css_id'		=> $element_index.'_text',
                'parent' => $input_name.'[meta_key]',
                'title'		=> __('Meta key','post-grid'),
                'details'	=> __('Write meta key or field name.','post-grid'),
                'type'		=> 'text',
                'value'		=> $field_id,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[meta_key]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output. ex: <code>Value: %s</code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Value: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
              'id'		=> 'word_count',
              'css_id'		=> $element_index.'_text',
              'parent' => $input_name.'[meta_key]',
              'title'		=> __('Max word count','post-grid'),
              'details'	=> __('Lmit by word count.','post-grid'),
              'type'		=> 'text',
              'value'		=> $word_count,
              'default'		=> '',
              'placeholder'		=> '30',
            );

            $settings_tabs_field->generate_field($args);



//            $args = array(
//                'id'		=> 'enable_autoembed',
//                'parent' => $input_name.'[meta_key]',
//                'title'		=> __('Enable autoembed','accordions'),
//                'details'	=> __('Enable autoembed for content.','accordions'),
//                'type'		=> 'select',
//                'value'		=> $enable_autoembed,
//                'default'		=> 'no',
//                'args'		=> array(
//                    'no'	=> __('No','accordions'),
//                    'yes'	=> __('Yes','accordions'),
//                ),
//            );
//
//            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'enable_shortcode',
                'parent' => $input_name.'[meta_key]',
                'title'		=> __('Enable shortcode','accordions'),
                'details'	=> __('Enable shortcode for content.','accordions'),
                'type'		=> 'select',
                'value'		=> $enable_shortcode,
                'default'		=> 'no',
                'args'		=> array(
                    'no'	=> __('No','accordions'),
                    'yes'	=> __('Yes','accordions'),
                ),
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'enable_wpautop',
                'parent' => $input_name.'[meta_key]',
                'title'		=> __('Enable wpautop','accordions'),
                'details'	=> __('Enable wpautop for content.','accordions'),
                'type'		=> 'select',
                'value'		=> $enable_wpautop,
                'default'		=> 'no',
                'args'		=> array(
                    'no'	=> __('No','accordions'),
                    'yes'	=> __('Yes','accordions'),
                ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_meta_key',
                'parent' => $input_name.'[meta_key]',
                'title'		=> __('Color','post-grid'),
                'details'	=> __('Title text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[meta_key]',
                'title'		=> __('Font size','post-grid'),
                'details'	=> __('Set font size.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '14px',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'font_family',
                'css_id'		=> $element_index.'_font_family',
                'parent' => $input_name.'[meta_key]',
                'title'		=> __('Font family','post-grid'),
                'details'	=> __('Set font family.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_family,
                'default'		=> '',
                'placeholder'		=> 'Open Sans',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[meta_key]',
                'title'		=> __('Margin','post-grid'),
                'details'	=> __('Set margin.','post-grid'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_align',
                'css_id'		=> $element_index.'_text_align',
                'parent' => $input_name.'[meta_key]',
                'title'		=> __('Text align','post-grid'),
                'details'	=> __('Choose text align.','post-grid'),
                'type'		=> 'select',
                'value'		=> $text_align,
                'default'		=> 'left',
                'args'		=> array('left'=> __('Left', 'post-grid'),'right'=> __('Right', 'post-grid'),'center'=> __('Center', 'post-grid') ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'css',
                'css_id'		=> $element_index.'_css',
                'parent' => $input_name.'[meta_key]',
                'title'		=> __('Custom CSS','post-grid'),
                'details'	=> __('Set csutom CSS.','post-grid'),
                'type'		=> 'textarea',
                'value'		=> $css,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'css_hover',
                'css_id'		=> $element_index.'_css_hover',
                'parent' => $input_name.'[meta_key]',
                'title'		=> __('Hover CSS','post-grid'),
                'details'	=> __('Set hover custom CSS.','post-grid'),
                'type'		=> 'textarea',
                'value'		=> $css_hover,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            ob_start();
            ?>
            <textarea readonly type="text"  onclick="this.select();">.element_<?php echo $element_index?>{}</textarea>
            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'use_css',
                'title'		=> __('Use of CSS','post-grid'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','post-grid'),
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);

            ?>

        </div>
    </div>
    <?php

}



add_action('post_grid_layout_element_meta_key', 'post_grid_layout_element_meta_key');
function post_grid_layout_element_meta_key($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $field_id = isset($element['field_id']) ? $element['field_id'] : '';
    $word_count = isset($element['word_count']) ? $element['word_count'] : '';

  $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    //$enable_autoembed = isset($element['enable_autoembed']) ? $element['enable_autoembed'] : '';
    $enable_shortcode = isset($element['enable_shortcode']) ? $element['enable_shortcode'] : '';
    $enable_wpautop = isset($element['enable_wpautop']) ? $element['enable_wpautop'] : '';




    $field_value = get_post_meta($post_id, $field_id, true );

    if(!empty($field_value)):


//        if($enable_autoembed =='yes'){
//
//            $WP_Embed = new WP_Embed();
//            $field_value = $WP_Embed->autoembed($field_value);
//        }

        if($enable_wpautop =='yes'){
            $field_value = wpautop($field_value);
        }

        if($enable_shortcode =='yes'){
            $field_value = do_shortcode($field_value);
        }

        if(!empty($word_count)){
          $field_value = wp_trim_words($field_value, $word_count, '');

        }

        $field_value = sprintf($wrapper_html, $field_value);


        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> meta_key ">
            <?php echo $field_value; ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_meta_key', 'post_grid_layout_element_css_meta_key', 10);
function post_grid_layout_element_css_meta_key($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($element['color']) ? $element['color'] : '';
    $font_size = isset($element['font_size']) ? $element['font_size'] : '';
    $font_family = isset($element['font_family']) ? $element['font_family'] : '';
    $margin = isset($element['margin']) ? $element['margin'] : '';
    $text_align = isset($element['text_align']) ? $element['text_align'] : 'left';

    $css = isset($element['css']) ? $element['css'] : '';
    $css_hover = isset($element['css_hover']) ? $element['css_hover'] : '';

    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>{
        <?php if(!empty($color)): ?>
            color: <?php echo $color; ?>;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>
        <?php if(!empty($font_family)): ?>
            font-family: <?php echo $font_family; ?>;
        <?php endif; ?>
        <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
        <?php endif; ?>
        <?php if(!empty($text_align)): ?>
            text-align: <?php echo $text_align; ?>;
        <?php endif; ?>
        <?php if(!empty($css)): ?>
        <?php echo $css; ?>
        <?php endif; ?>
        }
        <?php if(!empty($css_hover)): ?>
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php echo $css_hover; ?>
        }
        <?php endif; ?>
    </style>
    <?php
}




add_action('post_grid_layout_element_option_custom_taxonomy','post_grid_layout_element_option_custom_taxonomy');
function post_grid_layout_element_option_custom_taxonomy($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $taxonomy = isset($element_data['taxonomy']) ? $element_data['taxonomy'] : '';
    $max_count = isset($element_data['max_count']) ? $element_data['max_count'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $wrapper_margin = isset($element_data['wrapper_margin']) ? $element_data['wrapper_margin'] : '';
    $link_color = isset($element_data['link_color']) ? $element_data['link_color'] : '';
    $text_color = isset($element_data['text_color']) ? $element_data['text_color'] : '';

    $separator = isset($element_data['separator']) ? $element_data['separator'] : '';
    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Taxonomy & terms','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php
            $args = array(
                'id'		=> 'taxonomy',
                'parent' => $input_name.'[custom_taxonomy]',
                'title'		=> __('Taxonomy','post-grid'),
                'details'	=> __('Write taxonomy','post-grid'),
                'type'		=> 'text',
                'value'		=> $taxonomy,
                'default'		=> '',
                'placeholder'		=> 'product_cat',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'max_count',
                'parent' => $input_name.'[custom_taxonomy]',
                'title'		=> __('Max count','post-grid'),
                'details'	=> __('Write max count','post-grid'),
                'type'		=> 'text',
                'value'		=> $max_count,
                'default'		=> 3,
                'placeholder'		=> '3',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'separator',
                'css_id'		=> $element_index.'_position_color',
                'parent' => $input_name.'[custom_taxonomy]',
                'title'		=> __('Link separator','post-grid'),
                'details'	=> __('Choose link separator.','post-grid'),
                'type'		=> 'text',
                'value'		=> $separator,
                'default'		=> '',
                'placeholder'		=> ', ',

            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[custom_taxonomy]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace category output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Tags: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[custom_taxonomy]',
                'title'		=> __('Margin','post-grid'),
                'details'	=> __('Set margin.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[custom_taxonomy]',
                'title'		=> __('Font size','post-grid'),
                'details'	=> __('Choose font size.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '16px',

            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'link_color',
                'css_id'		=> $element_index.'_link_color',
                'parent' => $input_name.'[custom_taxonomy]',
                'title'		=> __('Link color','post-grid'),
                'details'	=> __('Choose link color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $link_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'text_color',
                'css_id'		=> $element_index.'_text_color',
                'parent' => $input_name.'[custom_taxonomy]',
                'title'		=> __('Text color','post-grid'),
                'details'	=> __('Choose text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $text_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_align',
                'css_id'		=> $element_index.'_text_align',
                'parent' => $input_name.'[custom_taxonomy]',
                'title'		=> __('Text align','post-grid'),
                'details'	=> __('Choose text align.','post-grid'),
                'type'		=> 'select',
                'value'		=> $text_align,
                'default'		=> 'left',
                'args'		=> array('left'=> __('Left', 'post-grid'),'right'=> __('Right', 'post-grid'),'center'=> __('Center', 'post-grid') ),
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'css',
                'css_id'		=> $element_index.'_css',
                'parent' => $input_name.'[custom_taxonomy]',
                'title'		=> __('Custom CSS','post-grid'),
                'details'	=> __('Set csutom CSS.','post-grid'),
                'type'		=> 'textarea',
                'value'		=> $css,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'css_hover',
                'css_id'		=> $element_index.'_css_hover',
                'parent' => $input_name.'[custom_taxonomy]',
                'title'		=> __('Hover CSS','post-grid'),
                'details'	=> __('Set hover custom CSS.','post-grid'),
                'type'		=> 'textarea',
                'value'		=> $css_hover,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            ob_start();
            ?>
            <textarea readonly type="text"  onclick="this.select();">.element_<?php echo $element_index?>{}
.element_<?php echo $element_index?> a{}</textarea>
            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'use_css',
                'title'		=> __('Use of CSS','post-grid'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','post-grid'),
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);

            ?>

        </div>
    </div>
    <?php

}



add_action('post_grid_layout_element_custom_taxonomy', 'post_grid_layout_element_custom_taxonomy');

function post_grid_layout_element_custom_taxonomy($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $link_target = isset($element['link_target']) ? $element['link_target'] : '';
    $taxonomy = isset($element['taxonomy']) ? $element['taxonomy'] : '';

    $max_count = !empty($element['max_count']) ? (int) $element['max_count'] : 3;
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $separator = !empty($element['separator']) ? $element['separator'] : ', ';

    //var_dump($taxonomy);


    $term_list = wp_get_post_terms( $post_id, $taxonomy, array( 'fields' => 'all' ) );

    //var_dump($term_list);



    $custom_taxonomy_html = '';
    $term_total_count = is_array($term_list) ? count($term_list) : 0;
    $max_term_limit = ($term_total_count < $max_count) ? $term_total_count : $max_count ;

    if(empty($term_list)) return;


    $i = 0;
    foreach ($term_list as $term){
        if($i >= $max_count) continue;

        $term_id = isset($term->term_id) ? $term->term_id : '';
        $term_name = isset($term->name) ? $term->name : '';
        $term_link = get_term_link($term_id);

        $custom_taxonomy_html .= '<a target="'.esc_attr($link_target).'" href="'.esc_url_raw($term_link).'">'.esc_html($term_name).'</a>';
        if( $i+1 < $max_term_limit){ $custom_taxonomy_html .= $separator;}

        $i++;
    }

    //var_dump($custom_taxonomy_html);

    ?>
    <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> custom_taxonomy ">
        <?php echo sprintf($wrapper_html, $custom_taxonomy_html); ?>
    </div>
    <?php
}


add_action('post_grid_layout_element_css_custom_taxonomy', 'post_grid_layout_element_css_custom_taxonomy', 10);
function post_grid_layout_element_css_custom_taxonomy($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $link_color = isset($element['link_color']) ? $element['link_color'] : '';
    $text_color = isset($element['text_color']) ? $element['text_color'] : '';

    $font_size = isset($element['font_size']) ? $element['font_size'] : '';
    $font_family = isset($element['font_family']) ? $element['font_family'] : '';
    $margin = isset($element['margin']) ? $element['margin'] : '';
    $text_align = isset($element['text_align']) ? $element['text_align'] : '';
    $css = isset($element['css']) ? $element['css'] : '';
    $css_hover = isset($element['css_hover']) ? $element['css_hover'] : '';
    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>{
        <?php if(!empty($text_color)): ?>
            color: <?php echo $text_color; ?>;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>
        <?php if(!empty($font_family)): ?>
            font-family: <?php echo $font_family; ?>;
        <?php endif; ?>
        <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
        <?php endif; ?>
        <?php if(!empty($text_align)): ?>
            text-align: <?php echo $text_align; ?>;
        <?php endif; ?>
        <?php if(!empty($css)): ?>
        <?php echo $css; ?>
        <?php endif; ?>
        }
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> a{
        <?php if(!empty($link_color)): ?>
            color: <?php echo $link_color; ?>;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>
        <?php if(!empty($font_family)): ?>
            font-family: <?php echo $font_family; ?>;
        <?php endif; ?>
        }
        <?php if(!empty($css_hover)): ?>
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php echo $css_hover; ?>
        }
        <?php endif; ?>
    </style>
    <?php
}






add_action('post_grid_layout_element_option_html','post_grid_layout_element_option_html');
function post_grid_layout_element_option_html($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = !empty($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '%s';
    $enable_autoembed = isset($element_data['enable_autoembed']) ? $element_data['enable_autoembed'] : '';
    $enable_shortcode = isset($element_data['enable_shortcode']) ? $element_data['enable_shortcode'] : '';
    $enable_wpautop = isset($element_data['enable_wpautop']) ? $element_data['enable_wpautop'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';
    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';



    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Custom HTML','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php



            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[html]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write html here or [custom_shortcode]','post-grid'),
                'type'		=> 'textarea',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Custom HTML or write [custom_shortcode]',
            );

            $settings_tabs_field->generate_field($args);


            //            $args = array(
            //                'id'		=> 'enable_autoembed',
            //                'parent' => $input_name.'[html]',
            //                'title'		=> __('Enable autoembed','accordions'),
            //                'details'	=> __('Enable autoembed for content.','accordions'),
            //                'type'		=> 'select',
            //                'value'		=> $enable_autoembed,
            //                'default'		=> 'no',
            //                'args'		=> array(
            //                    'no'	=> __('No','accordions'),
            //                    'yes'	=> __('Yes','accordions'),
            //                ),
            //            );
            //
            //            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'enable_shortcode',
                'parent' => $input_name.'[html]',
                'title'		=> __('Enable shortcode','accordions'),
                'details'	=> __('Enable shortcode for content.','accordions'),
                'type'		=> 'select',
                'value'		=> $enable_shortcode,
                'default'		=> 'yes',
                'args'		=> array(
                    'no'	=> __('No','accordions'),
                    'yes'	=> __('Yes','accordions'),
                ),
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'enable_wpautop',
                'parent' => $input_name.'[html]',
                'title'		=> __('Enable wpautop','accordions'),
                'details'	=> __('Enable wpautop for content.','accordions'),
                'type'		=> 'select',
                'value'		=> $enable_wpautop,
                'default'		=> 'yes',
                'args'		=> array(
                    'no'	=> __('No','accordions'),
                    'yes'	=> __('Yes','accordions'),
                ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_html',
                'parent' => $input_name.'[html]',
                'title'		=> __('Color','post-grid'),
                'details'	=> __('Title text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[html]',
                'title'		=> __('Font size','post-grid'),
                'details'	=> __('Set font size.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '14px',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'font_family',
                'css_id'		=> $element_index.'_font_family',
                'parent' => $input_name.'[html]',
                'title'		=> __('Font family','post-grid'),
                'details'	=> __('Set font family.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_family,
                'default'		=> '',
                'placeholder'		=> 'Open Sans',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[html]',
                'title'		=> __('Margin','post-grid'),
                'details'	=> __('Set margin.','post-grid'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_align',
                'css_id'		=> $element_index.'_text_align',
                'parent' => $input_name.'[html]',
                'title'		=> __('Text align','post-grid'),
                'details'	=> __('Choose text align.','post-grid'),
                'type'		=> 'select',
                'value'		=> $text_align,
                'default'		=> 'left',
                'args'		=> array('left'=> __('Left', 'post-grid'),'right'=> __('Right', 'post-grid'),'center'=> __('Center', 'post-grid') ),
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'css',
                'css_id'		=> $element_index.'_css',
                'parent' => $input_name.'[html]',
                'title'		=> __('Custom CSS','post-grid'),
                'details'	=> __('Set csutom CSS.','post-grid'),
                'type'		=> 'textarea',
                'value'		=> $css,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'css_hover',
                'css_id'		=> $element_index.'_css_hover',
                'parent' => $input_name.'[html]',
                'title'		=> __('Hover CSS','post-grid'),
                'details'	=> __('Set hover custom CSS.','post-grid'),
                'type'		=> 'textarea',
                'value'		=> $css_hover,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            ob_start();
            ?>
            <textarea readonly type="text"  onclick="this.select();">.element_<?php echo $element_index?>{}</textarea>
            <?php

            $html = ob_get_clean();

            $args = array(
                'id'		=> 'use_css',
                'title'		=> __('Use of CSS','post-grid'),
                'details'	=> __('Use following class selector to add custom CSS for this element.','post-grid'),
                'type'		=> 'custom_html',
                'html'		=> $html,

            );

            $settings_tabs_field->generate_field($args);

            ?>

        </div>
    </div>
    <?php

}



add_action('post_grid_layout_element_html', 'post_grid_layout_element_html');
function post_grid_layout_element_html($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $field_id = isset($element['field_id']) ? $element['field_id'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    //$enable_autoembed = isset($element['enable_autoembed']) ? $element['enable_autoembed'] : '';
    $enable_shortcode = isset($element['enable_shortcode']) ? $element['enable_shortcode'] : '';
    $enable_wpautop = isset($element['enable_wpautop']) ? $element['enable_wpautop'] : '';





    if(!empty($wrapper_html)):


//        if($enable_autoembed =='yes'){
//
//            $WP_Embed = new WP_Embed();
//            $field_value = $WP_Embed->autoembed($field_value);
//        }

        if($enable_wpautop =='yes'){
            $wrapper_html = wpautop($wrapper_html);
        }

        if($enable_shortcode =='yes'){
            $wrapper_html = do_shortcode($wrapper_html);
        }



        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> html ">
            <?php echo $wrapper_html; ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_html', 'post_grid_layout_element_css_html', 10);
function post_grid_layout_element_css_html($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($element['color']) ? $element['color'] : '';
    $font_size = isset($element['font_size']) ? $element['font_size'] : '';
    $font_family = isset($element['font_family']) ? $element['font_family'] : '';
    $margin = isset($element['margin']) ? $element['margin'] : '';
    $text_align = isset($element['text_align']) ? $element['text_align'] : 'left';

    $css = isset($element['css']) ? $element['css'] : '';
    $css_hover = isset($element['css_hover']) ? $element['css_hover'] : '';

    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>{
        <?php if(!empty($color)): ?>
            color: <?php echo $color; ?>;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>
        <?php if(!empty($font_family)): ?>
            font-family: <?php echo $font_family; ?>;
        <?php endif; ?>
        <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
        <?php endif; ?>
        <?php if(!empty($text_align)): ?>
            text-align: <?php echo $text_align; ?>;
        <?php endif; ?>
        <?php if(!empty($css)): ?>
        <?php echo $css; ?>
        <?php endif; ?>
        }
        <?php if(!empty($css_hover)): ?>
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php echo $css_hover; ?>
        }
        <?php endif; ?>
    </style>
    <?php
}


add_filter('post_grid_link_to_args', 'post_grid_link_to_args');
function post_grid_link_to_args($args){

	$args['custom_link'] = __('Custom Link', 'post-grid');

	return $args;

}