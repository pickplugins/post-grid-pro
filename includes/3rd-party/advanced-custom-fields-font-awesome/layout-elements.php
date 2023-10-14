<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_filter('post_grid_layout_elements','post_grid_pro_acf_font_awesome_layout_elements', 20);

function post_grid_pro_acf_font_awesome_layout_elements($elements_group){


    $elements_group['acf']['items']['acf_font_awesome'] = array('name' =>__('ACF Font Awesome','post-grid'));



    return $elements_group;
}




add_action('post_grid_layout_element_option_acf_font_awesome','post_grid_layout_element_option_acf_font_awesome');
function post_grid_layout_element_option_acf_font_awesome($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $acf_key = isset($element_data['acf_key']) ? $element_data['acf_key'] : '';

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

            <span class="expand"><?php echo __('ACF - Font Awesome','post-grid'); ?> - <?php echo $acf_key; ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'acf_key',
                'css_id'		=> $element_index.'_text',
                'parent' => $input_name.'[acf_font_awesome]',
                'title'		=> __('ACF key','post-grid'),
                'details'	=> __('Write ACF meta key or field name.','post-grid'),
                'type'		=> 'text',
                'value'		=> $acf_key,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_acf_font_awesome',
                'parent' => $input_name.'[acf_font_awesome]',
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
                'parent' => $input_name.'[acf_font_awesome]',
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
                'parent' => $input_name.'[acf_font_awesome]',
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
                'parent' => $input_name.'[acf_font_awesome]',
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
                'parent' => $input_name.'[acf_font_awesome]',
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
                'parent' => $input_name.'[acf_font_awesome]',
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
                'parent' => $input_name.'[acf_font_awesome]',
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



add_action('post_grid_layout_element_acf_font_awesome', 'post_grid_layout_element_acf_font_awesome');
function post_grid_layout_element_acf_font_awesome($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $acf_key = isset($element['acf_key']) ? $element['acf_key'] : '';

    $acf_value = get_field($acf_key, $post_id );



    if(!empty($acf_value)):

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> acf_font_awesome ">
            <?php echo ($acf_value); ?>
        </div>
        <?php
    endif;

}



add_action('post_grid_layout_element_css_acf_font_awesome', 'post_grid_layout_element_css_acf_font_awesome', 10);
function post_grid_layout_element_css_acf_font_awesome($args){


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



