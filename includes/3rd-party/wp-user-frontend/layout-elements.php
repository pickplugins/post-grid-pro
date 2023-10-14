<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_filter('post_grid_layout_elements','post_grid_pro_wpuf_layout_elements', 5);

function post_grid_pro_wpuf_layout_elements($elements_group){

    $elements_group['wpuf'] = array(
        'group_title'=>'WP User Frontend',
        'items'=>array(
            'wpuf_text'=>array('name' =>__('Text','post-grid')),
            'wpuf_textarea'=>array('name' =>__('Textarea','post-grid')),
            'wpuf_dropdown'=>array('name' =>__('Dropdown','post-grid')),
            'wpuf_multi_select'=>array('name' =>__('Multi select','post-grid')),
            'wpuf_radio'=>array('name' =>__('Radio','post-grid')),
            'wpuf_checkbox'=>array('name' =>__('Checkbox','post-grid')),
            'wpuf_url'=>array('name' =>__('Website url','post-grid')),

            'wpuf_email'=>array('name' =>__('Email address','post-grid')),
            'wpuf_image'=>array('name' =>__('Image upload','post-grid')),






        ),
    );

    return $elements_group;
}




add_action('post_grid_layout_element_option_wpuf_text','post_grid_layout_element_option_wpuf_text');
function post_grid_layout_element_option_wpuf_text($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wpuf_key = isset($element_data['wpuf_key']) ? $element_data['wpuf_key'] : '';

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

            <span class="expand"><?php echo __('wpuf Text','post-grid'); ?> - <?php echo $wpuf_key; ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wpuf_key',
                'css_id'		=> $element_index.'_text',
                'parent' => $input_name.'[wpuf_text]',
                'title'		=> __('wpuf key','post-grid'),
                'details'	=> __('Write wpuf meta key or field name.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wpuf_key,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wpuf_text',
                'parent' => $input_name.'[wpuf_text]',
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
                'parent' => $input_name.'[wpuf_text]',
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
                'parent' => $input_name.'[wpuf_text]',
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
                'parent' => $input_name.'[wpuf_text]',
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
                'parent' => $input_name.'[wpuf_text]',
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
                'parent' => $input_name.'[wpuf_text]',
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
                'parent' => $input_name.'[wpuf_text]',
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



add_action('post_grid_layout_element_wpuf_text', 'post_grid_layout_element_wpuf_text');
function post_grid_layout_element_wpuf_text($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wpuf_key = isset($element['wpuf_key']) ? $element['wpuf_key'] : '';

    $text = isset($element['text']) ?  $element['text'] : '';

    //var_dump($wpuf_key);

    $wpuf_value = get_post_meta( $post_id, $wpuf_key, true);

    if(!empty($wpuf_value)):

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wpuf_text ">
            <?php echo esc_html($wpuf_value); ?>
        </div>
        <?php
    endif;

}



add_action('post_grid_layout_element_css_wpuf_text', 'post_grid_layout_element_css_wpuf_text', 10);
function post_grid_layout_element_css_wpuf_text($args){


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





add_action('post_grid_layout_element_option_wpuf_textarea','post_grid_layout_element_option_wpuf_textarea');
function post_grid_layout_element_option_wpuf_textarea($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wpuf_key = isset($element_data['wpuf_key']) ? $element_data['wpuf_key'] : '';

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

            <span class="expand"><?php echo __('wpuf Textarea','post-grid'); ?> - <?php echo $wpuf_key; ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wpuf_key',
                'css_id'		=> $element_index.'_text',
                'parent' => $input_name.'[wpuf_textarea]',
                'title'		=> __('wpuf key','post-grid'),
                'details'	=> __('Write wpuf meta key or field name.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wpuf_key,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wpuf_textarea',
                'parent' => $input_name.'[wpuf_textarea]',
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
                'parent' => $input_name.'[wpuf_textarea]',
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
                'parent' => $input_name.'[wpuf_textarea]',
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
                'parent' => $input_name.'[wpuf_textarea]',
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
                'parent' => $input_name.'[wpuf_textarea]',
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
                'parent' => $input_name.'[wpuf_textarea]',
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
                'parent' => $input_name.'[wpuf_textarea]',
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



add_action('post_grid_layout_element_wpuf_textarea', 'post_grid_layout_element_wpuf_textarea');
function post_grid_layout_element_wpuf_textarea($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wpuf_key = isset($element['wpuf_key']) ? $element['wpuf_key'] : '';

    $text = isset($element['text']) ?  $element['text'] : '';

    //var_dump($wpuf_key);

  $wpuf_value = get_post_meta( $post_id, $wpuf_key, true);

    if(!empty($wpuf_value)):

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wpuf_textarea ">
            <?php echo ($wpuf_value); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wpuf_textarea', 'post_grid_layout_element_css_wpuf_textarea', 10);
function post_grid_layout_element_css_wpuf_textarea($args){


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









add_action('post_grid_layout_element_option_wpuf_email','post_grid_layout_element_option_wpuf_email');
function post_grid_layout_element_option_wpuf_email($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wpuf_key = isset($element_data['wpuf_key']) ? $element_data['wpuf_key'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';
    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';
    $wrapper_html = !empty($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '%s';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';



    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('wpuf Email','post-grid'); ?> - <?php echo $wpuf_key; ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wpuf_key',
                'css_id'		=> $element_index.'_text',
                'parent' => $input_name.'[wpuf_email]',
                'title'		=> __('wpuf key','post-grid'),
                'details'	=> __('Write wpuf meta key or field name.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wpuf_key,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wpuf_email]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output. ex: <code>Email: &lt;a href="mailto:%s">Send mail&lt;/a></code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Email: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wpuf_email',
                'parent' => $input_name.'[wpuf_email]',
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
                'parent' => $input_name.'[wpuf_email]',
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
                'parent' => $input_name.'[wpuf_email]',
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
                'parent' => $input_name.'[wpuf_email]',
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
                'parent' => $input_name.'[wpuf_email]',
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
                'parent' => $input_name.'[wpuf_email]',
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
                'parent' => $input_name.'[wpuf_email]',
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



add_action('post_grid_layout_element_wpuf_email', 'post_grid_layout_element_wpuf_email');
function post_grid_layout_element_wpuf_email($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wpuf_key = isset($element['wpuf_key']) ? $element['wpuf_key'] : '';
    $wrapper_html = isset($element['wrapper_html']) ? $element['wrapper_html'] : '%s';

    $text = isset($element['text']) ?  $element['text'] : '';

    //var_dump($wpuf_key);

  $wpuf_value = get_post_meta( $post_id, $wpuf_key, true);

    if(!empty($wpuf_value)):
        $wpuf_value = sprintf($wrapper_html, $wpuf_value);

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wpuf_email ">
            <?php echo ($wpuf_value); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wpuf_email', 'post_grid_layout_element_css_wpuf_email', 10);
function post_grid_layout_element_css_wpuf_email($args){


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


add_action('post_grid_layout_element_option_wpuf_url','post_grid_layout_element_option_wpuf_url');
function post_grid_layout_element_option_wpuf_url($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wpuf_key = isset($element_data['wpuf_key']) ? $element_data['wpuf_key'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';

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

            <span class="expand"><?php echo __('wpuf URL','post-grid'); ?> - <?php echo $wpuf_key; ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wpuf_key',
                'css_id'		=> $element_index.'_text',
                'parent' => $input_name.'[wpuf_url]',
                'title'		=> __('wpuf key','post-grid'),
                'details'	=> __('Write wpuf meta key or field name.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wpuf_key,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wpuf_url]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output. ex: <code>Link: &lt;a href="%s">Visit link&lt;/a></code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Link: %s',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wpuf_url',
                'parent' => $input_name.'[wpuf_url]',
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
                'parent' => $input_name.'[wpuf_url]',
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
                'parent' => $input_name.'[wpuf_url]',
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
                'parent' => $input_name.'[wpuf_url]',
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
                'parent' => $input_name.'[wpuf_url]',
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
                'parent' => $input_name.'[wpuf_url]',
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
                'parent' => $input_name.'[wpuf_url]',
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



add_action('post_grid_layout_element_wpuf_url', 'post_grid_layout_element_wpuf_url');
function post_grid_layout_element_wpuf_url($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wpuf_key = isset($element['wpuf_key']) ? $element['wpuf_key'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';

    $text = isset($element['text']) ?  $element['text'] : '';

    //var_dump($wpuf_key);

  $wpuf_value = get_post_meta( $post_id, $wpuf_key, true);



    if(!empty($wpuf_value)):
        $wpuf_value = sprintf($wrapper_html, $wpuf_value);
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wpuf_url ">
            <?php echo ($wpuf_value); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wpuf_url', 'post_grid_layout_element_css_wpuf_url', 10);
function post_grid_layout_element_css_wpuf_url($args){


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







add_action('post_grid_layout_element_option_wpuf_image','post_grid_layout_element_option_wpuf_image');
function post_grid_layout_element_option_wpuf_image($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wpuf_key = isset($element_data['wpuf_key']) ? $element_data['wpuf_key'] : '';
    $size = isset($element_data['size']) ? $element_data['size'] : 'thumbnail';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '<img src="%s" />';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';
    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';


    //var_dump($element_data);


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('wpuf Image','post-grid'); ?> - <?php echo $wpuf_key; ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wpuf_key',
                'css_id'		=> $element_index.'_text',
                'parent' => $input_name.'[wpuf_image]',
                'title'		=> __('wpuf key','post-grid'),
                'details'	=> __('Write wpuf meta key or field name.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wpuf_key,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $thumbnail_sizes = array();
            $thumbnail_sizes['full'] = __('Full', '');
            $get_intermediate_image_sizes =  get_intermediate_image_sizes();

            if(!empty($get_intermediate_image_sizes))
              foreach($get_intermediate_image_sizes as $size_key){
                $size_name = str_replace('_', ' ',$size_key);
                $size_name = str_replace('-', ' ',$size_name);

                $thumbnail_sizes[$size_key] = ucfirst($size_name);
              }


            $args = array(
              'id'		=> 'size',
              'css_id'		=> $element_index.'_size',
              'parent' => $input_name.'[wpuf_image]',
              'title'		=> __('Thumbnail size','post-grid'),
              'details'	=> __('Choose thumbnail size.','post-grid'),
              'type'		=> 'select',
              'value'		=> $size,
              'default'		=> 'thumbnail',
              'args'		=> $thumbnail_sizes,
            );


            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wpuf_image]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output. ex: <code>Value: %s</code>, File URL<br> <code>File: &lt;a href="%s">Click to Download&lt;/a> </code>,Image file<br> <code>&lt;img src="%s"/> </code>  ','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Image: <img src="%s" />',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wpuf_image',
                'parent' => $input_name.'[wpuf_image]',
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
                'parent' => $input_name.'[wpuf_image]',
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
                'parent' => $input_name.'[wpuf_image]',
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
                'parent' => $input_name.'[wpuf_image]',
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
                'parent' => $input_name.'[wpuf_image]',
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
                'parent' => $input_name.'[wpuf_image]',
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
                'parent' => $input_name.'[wpuf_image]',
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



add_action('post_grid_layout_element_wpuf_image', 'post_grid_layout_element_wpuf_image');
function post_grid_layout_element_wpuf_image($args){


    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $post_permalink = get_permalink($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wpuf_key = isset($element['wpuf_key']) ? $element['wpuf_key'] : '';
    $size = isset($element['size']) ? $element['size'] : 'thumbnail';

    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '<img src="%s" />';


    //var_dump($wpuf_value);

    $wpuf_value = (int) get_post_meta($post_id, $wpuf_key, true  );

    //echo '<pre style="text-align: left">'.var_export($wpuf_value, true).'</pre>';


    if(!empty($wpuf_value)):


      $wpuf_img = wp_get_attachment_image_src($wpuf_value, $size);
      $wpuf_img_url = isset($wpuf_img[0]) ? $wpuf_img[0] : '';

      $wpuf_img_html = sprintf($wrapper_html, $wpuf_img_url);

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wpuf_image ">

          <?php echo $wpuf_img_html; ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wpuf_image', 'post_grid_layout_element_css_wpuf_image', 10);
function post_grid_layout_element_css_wpuf_image($args){


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




add_action('post_grid_layout_element_option_wpuf_dropdown','post_grid_layout_element_option_wpuf_dropdown');
function post_grid_layout_element_option_wpuf_dropdown($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wpuf_key = isset($element_data['wpuf_key']) ? $element_data['wpuf_key'] : '';
    $item_wrapper_html = !empty($element_data['item_wrapper_html']) ? $element_data['item_wrapper_html'] : '%s';
    $wrapper_html = !empty($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '%s';

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

            <span class="expand"><?php echo __('wpuf Dropdown','post-grid'); ?> - <?php echo $wpuf_key; ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wpuf_key',
                'css_id'		=> $element_index.'_text',
                'parent' => $input_name.'[wpuf_dropdown]',
                'title'		=> __('wpuf key','post-grid'),
                'details'	=> __('Write wpuf meta key or field name.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wpuf_key,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'item_wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wpuf_dropdown]',
                'title'		=> __('Item wrapper html','post-grid'),
                'details'	=> __('Write item wrapper html, use <code>%s</code> to replace output. <br>Return Format: Label or Value<br> ex: <code>Value: %s</code> <br>Return Format: Both(Array)<br> ex: <code>Label: %1$s</code> <code>Value: %2$s</code> list item ex: <code>&lt;li>%1$s : %2$s&lt;/li></code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $item_wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Value: %s',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wpuf_dropdown]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output. ex: <code>Value: %s</code>, <code>Values: %s</code> list item wrapper ex: <code>&lt;ul>%s&lt;/ul></code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Value: %s',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wpuf_dropdown',
                'parent' => $input_name.'[wpuf_dropdown]',
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
                'parent' => $input_name.'[wpuf_dropdown]',
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
                'parent' => $input_name.'[wpuf_dropdown]',
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
                'parent' => $input_name.'[wpuf_dropdown]',
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
                'parent' => $input_name.'[wpuf_dropdown]',
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
                'parent' => $input_name.'[wpuf_dropdown]',
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
                'parent' => $input_name.'[wpuf_dropdown]',
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



add_action('post_grid_layout_element_wpuf_dropdown', 'post_grid_layout_element_wpuf_dropdown');
function post_grid_layout_element_wpuf_dropdown($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wpuf_key = isset($element['wpuf_key']) ? $element['wpuf_key'] : '';
    $item_wrapper_html = !empty($element['item_wrapper_html']) ? $element['item_wrapper_html'] : '%s';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';

    $text = isset($element['text']) ?  $element['text'] : '';

    //var_dump($wpuf_key);
    //var_dump($item_wrapper_html);
    $wpuf_value = get_post_meta( $post_id, $wpuf_key, true );


    //var_dump($wpuf_value);


  $html = '';

    if(!empty($wpuf_value)):

        if(is_array($wpuf_value)){
            foreach ($wpuf_value as $_items){
                //var_dump($_items);



                if(is_array($_items)){
                    $value = $_items['value'];
                    $label = $_items['label'];

                    //$html .= $label.$value;
                    $html .= sprintf($item_wrapper_html, $label, $value);
                }else{
                    $html .= sprintf($wrapper_html, $_items);
                }

            }
        }else{
            $html = sprintf($item_wrapper_html, $wpuf_value);
        }


        $html = sprintf($wrapper_html, $html);

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wpuf_dropdown ">
            <?php echo ($html); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wpuf_dropdown', 'post_grid_layout_element_css_wpuf_dropdown', 10);
function post_grid_layout_element_css_wpuf_dropdown($args){


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




add_action('post_grid_layout_element_option_wpuf_multi_select','post_grid_layout_element_option_wpuf_multi_select');
function post_grid_layout_element_option_wpuf_multi_select($parameters){

  $settings_tabs_field = new settings_tabs_field();

  $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
  $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
  $element_index = isset($parameters['index']) ? $parameters['index'] : '';

  $wpuf_key = isset($element_data['wpuf_key']) ? $element_data['wpuf_key'] : '';
  $item_wrapper_html = !empty($element_data['item_wrapper_html']) ? $element_data['item_wrapper_html'] : '%s';
  $wrapper_html = !empty($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '%s';

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

      <span class="expand"><?php echo __('wpuf Dropdown','post-grid'); ?> - <?php echo $wpuf_key; ?></span>
    </div>
    <div class="element-options options">

      <?php

      $args = array(
        'id'		=> 'wpuf_key',
        'css_id'		=> $element_index.'_text',
        'parent' => $input_name.'[wpuf_multi_select]',
        'title'		=> __('wpuf key','post-grid'),
        'details'	=> __('Write wpuf meta key or field name.','post-grid'),
        'type'		=> 'text',
        'value'		=> $wpuf_key,
        'default'		=> '',
        'placeholder'		=> '',
      );

      $settings_tabs_field->generate_field($args);

      $args = array(
        'id'		=> 'item_wrapper_html',
        'css_id'		=> $element_index.'_wrapper_html',
        'parent' => $input_name.'[wpuf_multi_select]',
        'title'		=> __('Item wrapper html','post-grid'),
        'details'	=> __('Write item wrapper html, use <code>%s</code> to replace output. <br>Return Format: Label or Value<br> ex: <code>Value: %s</code> <br>Return Format: Both(Array)<br> ex: <code>Label: %1$s</code> <code>Value: %2$s</code> list item ex: <code>&lt;li>%1$s : %2$s&lt;/li></code>','post-grid'),
        'type'		=> 'text',
        'value'		=> $item_wrapper_html,
        'default'		=> '',
        'placeholder'		=> 'Value: %s',
      );

      $settings_tabs_field->generate_field($args);


      $args = array(
        'id'		=> 'wrapper_html',
        'css_id'		=> $element_index.'_wrapper_html',
        'parent' => $input_name.'[wpuf_multi_select]',
        'title'		=> __('Wrapper html','post-grid'),
        'details'	=> __('Write wrapper html, use <code>%s</code> to replace output. ex: <code>Value: %s</code>, <code>Values: %s</code> list item wrapper ex: <code>&lt;ul>%s&lt;/ul></code>','post-grid'),
        'type'		=> 'text',
        'value'		=> $wrapper_html,
        'default'		=> '',
        'placeholder'		=> 'Value: %s',
      );

      $settings_tabs_field->generate_field($args);


      $args = array(
        'id'		=> 'color',
        'css_id'		=> $element_index.'_wpuf_multi_select',
        'parent' => $input_name.'[wpuf_multi_select]',
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
        'parent' => $input_name.'[wpuf_multi_select]',
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
        'parent' => $input_name.'[wpuf_multi_select]',
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
        'parent' => $input_name.'[wpuf_multi_select]',
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
        'parent' => $input_name.'[wpuf_multi_select]',
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
        'parent' => $input_name.'[wpuf_multi_select]',
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
        'parent' => $input_name.'[wpuf_multi_select]',
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



add_action('post_grid_layout_element_wpuf_multi_select', 'post_grid_layout_element_wpuf_multi_select');
function post_grid_layout_element_wpuf_multi_select($args){

  $element  = isset($args['element']) ? $args['element'] : array();
  $elementIndex  = isset($args['index']) ? $args['index'] : '';
  $post_id = isset($args['post_id']) ? $args['post_id'] : '';

  if(empty($post_id)) return;

  $title = get_the_title($post_id);

  $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
  $wpuf_key = isset($element['wpuf_key']) ? $element['wpuf_key'] : '';
  $item_wrapper_html = !empty($element['item_wrapper_html']) ? $element['item_wrapper_html'] : '%s';
  $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';

  $text = isset($element['text']) ?  $element['text'] : '';

  //var_dump($wpuf_key);
  //var_dump($item_wrapper_html);
  $wpuf_value = get_post_meta( $post_id, $wpuf_key, true );


  //var_dump($wpuf_value);


  $html = '';

  if(!empty($wpuf_value)):

    if(is_array($wpuf_value)){
      foreach ($wpuf_value as $_items){
        //var_dump($_items);



        if(is_array($_items)){
          $value = $_items['value'];
          $label = $_items['label'];

          //$html .= $label.$value;
          $html .= sprintf($item_wrapper_html, $label, $value);
        }else{
          $html .= sprintf($wrapper_html, $_items);
        }

      }
    }else{
      $html = sprintf($item_wrapper_html, $wpuf_value);
    }


    $html = sprintf($wrapper_html, $html);

    ?>
    <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wpuf_multi_select ">
      <?php echo ($html); ?>
    </div>
  <?php
  endif;

}



add_action('post_grid_layout_element_css_wpuf_multi_select', 'post_grid_layout_element_css_wpuf_multi_select', 10);
function post_grid_layout_element_css_wpuf_multi_select($args){


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












add_action('post_grid_layout_element_option_wpuf_checkbox','post_grid_layout_element_option_wpuf_checkbox');
function post_grid_layout_element_option_wpuf_checkbox($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wpuf_key = isset($element_data['wpuf_key']) ? $element_data['wpuf_key'] : '';
    $item_wrapper_html = !empty($element_data['item_wrapper_html']) ? $element_data['item_wrapper_html'] : '%s';
    $wrapper_html = !empty($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '%s';

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

            <span class="expand"><?php echo __('wpuf Checkbox','post-grid'); ?> - <?php echo $wpuf_key; ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wpuf_key',
                'css_id'		=> $element_index.'_text',
                'parent' => $input_name.'[wpuf_checkbox]',
                'title'		=> __('wpuf key','post-grid'),
                'details'	=> __('Write wpuf meta key or field name.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wpuf_key,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'item_wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wpuf_checkbox]',
                'title'		=> __('Item wrapper html','post-grid'),
                'details'	=> __('Write item wrapper html, use <code>%s</code> to replace output. <br>Return Format: Label or Value<br> ex: <code>Value: %s</code> <br>Return Format: Both(Array)<br> ex: <code>Label: %1$s</code> <code>Value: %2$s</code> list item ex: <code>&lt;li>%1$s : %2$s&lt;/li></code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $item_wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Value: %s',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wpuf_checkbox]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output. ex: <code>Value: %s</code>, <code>Values: %s</code> list item wrapper ex: <code>&lt;ul>%s&lt;/ul></code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Value: %s',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wpuf_checkbox',
                'parent' => $input_name.'[wpuf_checkbox]',
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
                'parent' => $input_name.'[wpuf_checkbox]',
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
                'parent' => $input_name.'[wpuf_checkbox]',
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
                'parent' => $input_name.'[wpuf_checkbox]',
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
                'parent' => $input_name.'[wpuf_checkbox]',
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
                'parent' => $input_name.'[wpuf_checkbox]',
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
                'parent' => $input_name.'[wpuf_checkbox]',
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



add_action('post_grid_layout_element_wpuf_checkbox', 'post_grid_layout_element_wpuf_checkbox');
function post_grid_layout_element_wpuf_checkbox($args){


    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wpuf_key = isset($element['wpuf_key']) ? $element['wpuf_key'] : '';
    $item_wrapper_html = !empty($element['item_wrapper_html']) ? $element['item_wrapper_html'] : '%s';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';

    $text = isset($element['text']) ?  $element['text'] : '';

    //var_dump($wpuf_key);
    //var_dump($item_wrapper_html);
  $wpuf_value = get_post_meta( $post_id, $wpuf_key, true );

    $html = '';

    if(!empty($wpuf_value)):

        if(is_array($wpuf_value)){
            foreach ($wpuf_value as $_items){
                //var_dump($_items);



                if(is_array($_items)){
                    $value = $_items['value'];
                    $label = $_items['label'];

                    //$html .= $label.$value;
                    $html .= sprintf($item_wrapper_html, $label, $value);
                }else{
                    $html .= sprintf($wrapper_html, $_items);
                }

            }
        }else{
            $html = sprintf($item_wrapper_html, $wpuf_value);
        }


        $html = sprintf($wrapper_html, $html);

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wpuf_checkbox ">
            <?php echo ($html); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wpuf_checkbox', 'post_grid_layout_element_css_wpuf_checkbox', 10);
function post_grid_layout_element_css_wpuf_checkbox($args){


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



add_action('post_grid_layout_element_option_wpuf_radio','post_grid_layout_element_option_wpuf_radio');
function post_grid_layout_element_option_wpuf_radio($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wpuf_key = isset($element_data['wpuf_key']) ? $element_data['wpuf_key'] : '';
    $item_wrapper_html = !empty($element_data['item_wrapper_html']) ? $element_data['item_wrapper_html'] : '%s';
    $wrapper_html = !empty($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '%s';

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

            <span class="expand"><?php echo __('wpuf Radio','post-grid'); ?> - <?php echo $wpuf_key; ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wpuf_key',
                'css_id'		=> $element_index.'_text',
                'parent' => $input_name.'[wpuf_radio]',
                'title'		=> __('wpuf key','post-grid'),
                'details'	=> __('Write wpuf meta key or field name.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wpuf_key,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'item_wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wpuf_radio]',
                'title'		=> __('Item wrapper html','post-grid'),
                'details'	=> __('Write item wrapper html, use <code>%s</code> to replace output. <br>Return Format: Label or Value<br> ex: <code>Value: %s</code> <br>Return Format: Both(Array)<br> ex: <code>Label: %1$s</code> <code>Value: %2$s</code> list item ex: <code>&lt;li>%1$s : %2$s&lt;/li></code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $item_wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Value: %s',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wpuf_radio]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output. ex: <code>Value: %s</code>, <code>Values: %s</code> list item wrapper ex: <code>&lt;ul>%s&lt;/ul></code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Value: %s',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wpuf_radio',
                'parent' => $input_name.'[wpuf_radio]',
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
                'parent' => $input_name.'[wpuf_radio]',
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
                'parent' => $input_name.'[wpuf_radio]',
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
                'parent' => $input_name.'[wpuf_radio]',
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
                'parent' => $input_name.'[wpuf_radio]',
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
                'parent' => $input_name.'[wpuf_radio]',
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
                'parent' => $input_name.'[wpuf_radio]',
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



add_action('post_grid_layout_element_wpuf_radio', 'post_grid_layout_element_wpuf_radio');
function post_grid_layout_element_wpuf_radio($args){


    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wpuf_key = isset($element['wpuf_key']) ? $element['wpuf_key'] : '';
    $item_wrapper_html = !empty($element['item_wrapper_html']) ? $element['item_wrapper_html'] : '%s';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';

    $text = isset($element['text']) ?  $element['text'] : '';

    //var_dump($wpuf_key);
    //var_dump($item_wrapper_html);
  $wpuf_value = get_post_meta( $post_id, $wpuf_key, true );

    //var_dump($wpuf_value);

    $html = '';

    if(!empty($wpuf_value)):

        if(is_array($wpuf_value)){


            if(is_array($wpuf_value)){
                $value = $wpuf_value['value'];
                $label = $wpuf_value['label'];

                //$html .= $label.$value;
                $html .= sprintf($item_wrapper_html, $label, $value);
            }else{
                $html .= sprintf($wrapper_html, $wpuf_value);
            }

        }else{
            $html = sprintf($item_wrapper_html, $wpuf_value);
        }


        $html = sprintf($wrapper_html, $html);

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wpuf_radio ">
            <?php echo ($html); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wpuf_radio', 'post_grid_layout_element_css_wpuf_radio', 10);
function post_grid_layout_element_css_wpuf_radio($args){


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


