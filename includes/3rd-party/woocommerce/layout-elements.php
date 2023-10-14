<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_filter('post_grid_layout_elements','post_grid_pro_woo_layout_elements');

function post_grid_pro_woo_layout_elements($elements_group){

    $elements_group['woocommerce'] = array(
        'group_title'=>'WooCommerce',
        'items'=>array(
            'wc_add_to_cart'=>array('name' =>__('Add to cart','post-grid')),
            'wc_full_price'=>array('name' =>__('Full price','post-grid')),
            'wc_sale_price'=>array('name' =>__('Sale price','post-grid')),
            'wc_regular_price'=>array('name' =>__('Regular price','post-grid')),
            'wc_rating_star'=>array('name' =>__('Star rating ','post-grid')),
            'wc_rating_text'=>array('name' =>__('Text rating','post-grid')),

            'wc_categories'=>array('name' =>__('Categories','post-grid')),
            'wc_tags'=>array('name' =>__('Tags','post-grid')),
            'wc_gallery'=>array('name' =>__('gallery','post-grid')),
            'wc_sku'=>array('name' =>__('SKU','post-grid')),

        ),
    );

    return $elements_group;
}


add_action('post_grid_layout_element_option_wc_add_to_cart','post_grid_layout_element_option_wc_add_to_cart');
function post_grid_layout_element_option_wc_add_to_cart($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';


    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $hover_color = isset($element_data['hover_color']) ? $element_data['hover_color'] : '';

    $background_color = isset($element_data['background_color']) ? $element_data['background_color'] : '';
    $hover_background_color = isset($element_data['hover_background_color']) ? $element_data['hover_background_color'] : '';

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

            <span class="expand"><?php echo __('Woo - Add to cart','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php



            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_add_to_cart]',
                'title'		=> __('Text Color','post-grid'),
                'details'	=> __('Button text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'hover_color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_add_to_cart]',
                'title'		=> __('Text hover color','post-grid'),
                'details'	=> __('Button hover text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $hover_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);
            $args = array(
                'id'		=> 'background_color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_add_to_cart]',
                'title'		=> __('Background Color','post-grid'),
                'details'	=> __('Button background color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $background_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'hover_background_color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_add_to_cart]',
                'title'		=> __('Hover background Color','post-grid'),
                'details'	=> __('Button background hover color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $hover_background_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[wc_add_to_cart]',
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
                'parent' => $input_name.'[wc_add_to_cart]',
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
                'parent' => $input_name.'[wc_add_to_cart]',
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
                'parent' => $input_name.'[wc_add_to_cart]',
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
                'parent' => $input_name.'[wc_add_to_cart]',
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
                'parent' => $input_name.'[wc_add_to_cart]',
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
.element_<?php echo $element_index?> p{}
.element_<?php echo $element_index?> a{}
.element_<?php echo $element_index?> .added_to_cart{}</textarea>
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



add_action('post_grid_layout_element_wc_add_to_cart', 'post_grid_layout_element_wc_add_to_cart');
function post_grid_layout_element_wc_add_to_cart($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';



        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wc_add_to_cart ">
            <?php echo (do_shortcode('[add_to_cart show_price="false" id="'.$post_id.'"]')); ?>
        </div>
    <?php


}



add_action('post_grid_layout_element_css_wc_add_to_cart', 'post_grid_layout_element_css_wc_add_to_cart', 10);
function post_grid_layout_element_css_wc_add_to_cart($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($element['color']) ? $element['color'] : '';
    $hover_color = isset($element['hover_color']) ? $element['hover_color'] : '';

    $background_color = isset($element['background_color']) ? $element['background_color'] : '';
    $hover_background_color = isset($element['hover_background_color']) ? $element['hover_background_color'] : '';

    $font_size = isset($element['font_size']) ? $element['font_size'] : '';
    $font_family = isset($element['font_family']) ? $element['font_family'] : '';
    $margin = isset($element['margin']) ? $element['margin'] : '';
    $text_align = isset($element['text_align']) ? $element['text_align'] : 'left';

    $css = isset($element['css']) ? $element['css'] : '';
    $css_hover = isset($element['css_hover']) ? $element['css_hover'] : '';

    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> a{
        <?php if(!empty($color)): ?>
            color: <?php echo $color; ?>;
        <?php endif; ?>
        <?php if(!empty($background_color)): ?>
            background-color: <?php echo $background_color; ?>;
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

        <?php if(!empty($css)): ?>
        <?php echo $css; ?>
        <?php endif; ?>
        }

        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> .added_to_cart{
            padding: 2px 10px;
        }
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> p{
        <?php if(!empty($text_align)): ?>
            text-align: <?php echo $text_align; ?>;
        <?php endif; ?>
        }

        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> a:hover{
        <?php if(!empty($hover_background_color)): ?>
            background-color: <?php echo $hover_background_color; ?>;
        <?php endif; ?>
        <?php if(!empty($hover_color)): ?>
            color: <?php echo $hover_color; ?>;
        <?php endif; ?>
        <?php if(!empty($css_hover)): ?>
        <?php echo $css_hover; ?>
        <?php endif; ?>
        }

    </style>
    <?php
}







add_action('post_grid_layout_element_option_wc_full_price','post_grid_layout_element_option_wc_full_price');
function post_grid_layout_element_option_wc_full_price($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $hover_color = isset($element_data['hover_color']) ? $element_data['hover_color'] : '';

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

            <span class="expand"><?php echo __('Woo - Full price','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_full_price]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Price wrapper html. ex: <code>Price: %s</code>, <code>%s</code> will replace by output','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Price: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_full_price]',
                'title'		=> __('Text Color','post-grid'),
                'details'	=> __('Price text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'hover_color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_full_price]',
                'title'		=> __('Text hover color','post-grid'),
                'details'	=> __('Price hover text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $hover_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[wc_full_price]',
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
                'parent' => $input_name.'[wc_full_price]',
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
                'parent' => $input_name.'[wc_full_price]',
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
                'parent' => $input_name.'[wc_full_price]',
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
                'parent' => $input_name.'[wc_full_price]',
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
                'parent' => $input_name.'[wc_full_price]',
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



add_action('post_grid_layout_element_wc_full_price', 'post_grid_layout_element_wc_full_price');
function post_grid_layout_element_wc_full_price($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';

    $wrapper_html = isset($element['wrapper_html']) ?  $element['wrapper_html'] : '%s';

    $product = wc_get_product($post_id);

    $wc_full_price_html = $product->get_price_html();

    if(!empty($wc_full_price_html)):

        $wc_full_price_html = sprintf($wrapper_html, $wc_full_price_html);
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wc_full_price ">
            <?php echo ($wc_full_price_html); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wc_full_price', 'post_grid_layout_element_css_wc_full_price', 10);
function post_grid_layout_element_css_wc_full_price($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($element['color']) ? $element['color'] : '';
    $hover_color = isset($element['hover_color']) ? $element['hover_color'] : '';

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


        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php if(!empty($hover_color)): ?>
            color: <?php echo $hover_color; ?>;
        <?php endif; ?>
        <?php if(!empty($css_hover)): ?>
        <?php echo $css_hover; ?>
        <?php endif; ?>
        }


    </style>
    <?php
}





add_action('post_grid_layout_element_option_wc_sale_price','post_grid_layout_element_option_wc_sale_price');
function post_grid_layout_element_option_wc_sale_price($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $currency_position = isset($element_data['currency_position']) ? $element_data['currency_position'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $hover_color = isset($element_data['hover_color']) ? $element_data['hover_color'] : '';

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

            <span class="expand"><?php echo __('Woo - Sale price','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_sale_price]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Price wrapper html. ex: <code>Price: %s</code>, <code>%s</code> will replace by output','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Price: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'currency_position',
                'css_id'		=> $element_index.'_text_align',
                'parent' => $input_name.'[wc_sale_price]',
                'title'		=> __('Currency position','post-grid'),
                'details'	=> __('Choose currency position.','post-grid'),
                'type'		=> 'select',
                'value'		=> $currency_position,
                'default'		=> 'left',
                'args'		=> array('left'=> __('Left', 'post-grid'),'right'=> __('Right', 'post-grid'),'none'=> __('None', 'post-grid') ),
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_sale_price]',
                'title'		=> __('Text Color','post-grid'),
                'details'	=> __('Price text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'hover_color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_sale_price]',
                'title'		=> __('Text hover color','post-grid'),
                'details'	=> __('Price hover text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $hover_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[wc_sale_price]',
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
                'parent' => $input_name.'[wc_sale_price]',
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
                'parent' => $input_name.'[wc_sale_price]',
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
                'parent' => $input_name.'[wc_sale_price]',
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
                'parent' => $input_name.'[wc_sale_price]',
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
                'parent' => $input_name.'[wc_sale_price]',
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



add_action('post_grid_layout_element_wc_sale_price', 'post_grid_layout_element_wc_sale_price');
function post_grid_layout_element_wc_sale_price($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';

    $wrapper_html = !empty($element['wrapper_html']) ?  $element['wrapper_html'] : '%s';
    $currency_position = isset($element['currency_position']) ?  $element['currency_position'] : 'left';

    $product = wc_get_product($post_id);

    $currency_symbol = get_woocommerce_currency_symbol();
    $sale_price = $product->get_sale_price();

    if(!empty($sale_price)):

        if($currency_position == 'left'){
            $sale_price = $currency_symbol.$sale_price;

        }else{
            $sale_price = $sale_price.$currency_symbol;

        }

        $wc_sale_price_html = sprintf($wrapper_html, $sale_price);

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wc_sale_price ">
            <?php echo ($wc_sale_price_html); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wc_sale_price', 'post_grid_layout_element_css_wc_sale_price', 10);
function post_grid_layout_element_css_wc_sale_price($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($element['color']) ? $element['color'] : '';
    $hover_color = isset($element['hover_color']) ? $element['hover_color'] : '';

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


        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php if(!empty($hover_color)): ?>
            color: <?php echo $hover_color; ?>;
        <?php endif; ?>
        <?php if(!empty($css_hover)): ?>
        <?php echo $css_hover; ?>
        <?php endif; ?>
        }


    </style>
    <?php
}





add_action('post_grid_layout_element_option_wc_regular_price','post_grid_layout_element_option_wc_regular_price');
function post_grid_layout_element_option_wc_regular_price($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $currency_position = isset($element_data['currency_position']) ? $element_data['currency_position'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $hover_color = isset($element_data['hover_color']) ? $element_data['hover_color'] : '';

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

            <span class="expand"><?php echo __('Woo - Regular price','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_regular_price]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Price wrapper html. ex: <code>Price: %s</code>, <code>%s</code> will replace by output','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Price: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'currency_position',
                'css_id'		=> $element_index.'_text_align',
                'parent' => $input_name.'[wc_regular_price]',
                'title'		=> __('Currency position','post-grid'),
                'details'	=> __('Choose currency position.','post-grid'),
                'type'		=> 'select',
                'value'		=> $currency_position,
                'default'		=> 'left',
                'args'		=> array('left'=> __('Left', 'post-grid'),'right'=> __('Right', 'post-grid'),'none'=> __('None', 'post-grid') ),
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_regular_price]',
                'title'		=> __('Text Color','post-grid'),
                'details'	=> __('Price text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'hover_color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_regular_price]',
                'title'		=> __('Text hover color','post-grid'),
                'details'	=> __('Price hover text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $hover_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[wc_regular_price]',
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
                'parent' => $input_name.'[wc_regular_price]',
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
                'parent' => $input_name.'[wc_regular_price]',
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
                'parent' => $input_name.'[wc_regular_price]',
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
                'parent' => $input_name.'[wc_regular_price]',
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
                'parent' => $input_name.'[wc_regular_price]',
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



add_action('post_grid_layout_element_wc_regular_price', 'post_grid_layout_element_wc_regular_price');
function post_grid_layout_element_wc_regular_price($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';

    $wrapper_html = !empty($element['wrapper_html']) ?  $element['wrapper_html'] : '%s';
    $currency_position = isset($element['currency_position']) ?  $element['currency_position'] : 'left';

    $product = wc_get_product($post_id);

    $currency_symbol = get_woocommerce_currency_symbol();
    $sale_price = $product->get_regular_price();

    if(!empty($sale_price)):

        if($currency_position == 'left'){
            $sale_price = $currency_symbol.$sale_price;

        }else{
            $sale_price = $sale_price.$currency_symbol;

        }

        $wc_regular_price_html = sprintf($wrapper_html, $sale_price);

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wc_regular_price ">
            <?php echo ($wc_regular_price_html); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wc_regular_price', 'post_grid_layout_element_css_wc_regular_price', 10);
function post_grid_layout_element_css_wc_regular_price($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($element['color']) ? $element['color'] : '';
    $hover_color = isset($element['hover_color']) ? $element['hover_color'] : '';

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


        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php if(!empty($hover_color)): ?>
            color: <?php echo $hover_color; ?>;
        <?php endif; ?>
        <?php if(!empty($css_hover)): ?>
        <?php echo $css_hover; ?>
        <?php endif; ?>
        }


    </style>
    <?php
}




add_action('post_grid_layout_element_option_wc_rating_star','post_grid_layout_element_option_wc_rating_star');
function post_grid_layout_element_option_wc_rating_star($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $float = isset($element_data['float']) ? $element_data['float'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $hover_color = isset($element_data['hover_color']) ? $element_data['hover_color'] : '';

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

            <span class="expand"><?php echo __('Woo - Rating star','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wc_rating_star]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Price wrapper html. ex: <code>Rating: %s</code>, <code>%s</code> will replace by output','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Rating: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'float',
                'css_id'		=> $element_index.'_float',
                'parent' => $input_name.'[wc_rating_star]',
                'title'		=> __('Float','post-grid'),
                'details'	=> __('Choose rating float.','post-grid'),
                'type'		=> 'select',
                'value'		=> $float,
                'default'		=> 'left',
                'args'		=> array('left'=> __('Left', 'post-grid'),'right'=> __('Right', 'post-grid'),'none'=> __('None', 'post-grid') ),
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_rating_star]',
                'title'		=> __('Text Color','post-grid'),
                'details'	=> __('Price text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'hover_color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_rating_star]',
                'title'		=> __('Text hover color','post-grid'),
                'details'	=> __('Price hover text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $hover_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[wc_rating_star]',
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
                'parent' => $input_name.'[wc_rating_star]',
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
                'parent' => $input_name.'[wc_rating_star]',
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
                'parent' => $input_name.'[wc_rating_star]',
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
                'parent' => $input_name.'[wc_rating_star]',
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
                'parent' => $input_name.'[wc_rating_star]',
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



add_action('post_grid_layout_element_wc_rating_star', 'post_grid_layout_element_wc_rating_star');
function post_grid_layout_element_wc_rating_star($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';

    $wrapper_html = !empty($element['wrapper_html']) ?  $element['wrapper_html'] : '%s';

    $product = wc_get_product($post_id);

    $rating = $product->get_average_rating();
    $rating = (($rating/5)*100);

    if(!empty($rating)):
        $rating_html = '<div class="woocommerce woocommerce-product-rating"><div class="star-rating" style="color:#444; padding-bottom:10px;" title="'.__('Rated', 'post-grid').' '.$rating.'"><span style="width:'.$rating.'%;"></span></div></div>';
        $rating_html = sprintf($wrapper_html, $rating_html);

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wc_rating_star ">
            <?php echo ($rating_html); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wc_rating_star', 'post_grid_layout_element_css_wc_rating_star', 10);
function post_grid_layout_element_css_wc_rating_star($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($element['color']) ? $element['color'] : '';
    $hover_color = isset($element['hover_color']) ? $element['hover_color'] : '';
    $float = isset($element['float']) ? $element['float'] : 'left';

    $font_size = isset($element['font_size']) ? $element['font_size'] : '';
    $font_family = isset($element['font_family']) ? $element['font_family'] : '';
    $margin = isset($element['margin']) ? $element['margin'] : '';
    $text_align = isset($element['text_align']) ? $element['text_align'] : 'left';

    $css = isset($element['css']) ? $element['css'] : '';
    $css_hover = isset($element['css_hover']) ? $element['css_hover'] : '';

    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>{



        <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
        <?php endif; ?>
        <?php if(!empty($css)): ?>
        <?php echo $css; ?>
        <?php endif; ?>
        }
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> .star-rating{
        <?php if(!empty($float)): ?>
            float: <?php echo $float; ?>;
        <?php endif; ?>
        <?php if(!empty($color)): ?>
            color: <?php echo $color; ?> !important;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
            height: <?php echo $font_size; ?>;
            line-height: unset;
        <?php endif; ?>

        }
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> .star-rating:hover{

        <?php if(!empty($hover_color)): ?>
            color: <?php echo $hover_color; ?> !important;
        <?php endif; ?>
        }

        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{

        <?php if(!empty($css_hover)): ?>
        <?php echo $css_hover; ?>
        <?php endif; ?>
        }


    </style>
    <?php
}



add_action('post_grid_layout_element_option_wc_rating_text','post_grid_layout_element_option_wc_rating_text');
function post_grid_layout_element_option_wc_rating_text($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $hover_color = isset($element_data['hover_color']) ? $element_data['hover_color'] : '';

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

            <span class="expand"><?php echo __('Woo - Rating text','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wc_rating_text]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Price wrapper html. ex: <code>Rating: %s</code>, <code>%s</code> will replace by output','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Rating: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_rating_text]',
                'title'		=> __('Text Color','post-grid'),
                'details'	=> __('Price text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'hover_color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_rating_text]',
                'title'		=> __('Text hover color','post-grid'),
                'details'	=> __('Price hover text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $hover_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[wc_rating_text]',
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
                'parent' => $input_name.'[wc_rating_text]',
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
                'parent' => $input_name.'[wc_rating_text]',
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
                'parent' => $input_name.'[wc_rating_text]',
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
                'parent' => $input_name.'[wc_rating_text]',
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
                'parent' => $input_name.'[wc_rating_text]',
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



add_action('post_grid_layout_element_wc_rating_text', 'post_grid_layout_element_wc_rating_text');
function post_grid_layout_element_wc_rating_text($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';

    $wrapper_html = !empty($element['wrapper_html']) ?  $element['wrapper_html'] : '%s';

    $product = wc_get_product($post_id);

    $rating = $product->get_average_rating();
    //$rating = (($rating/5)*100);

    if(!empty($rating)):

        $rating_html = ' '.sprintf(__('%s out of 5', 'post-grid'), $rating);
        $rating_html = sprintf($wrapper_html, $rating_html);

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wc_rating_text ">
            <?php echo ($rating_html); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wc_rating_text', 'post_grid_layout_element_css_wc_rating_text', 10);
function post_grid_layout_element_css_wc_rating_text($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($element['color']) ? $element['color'] : '';
    $hover_color = isset($element['hover_color']) ? $element['hover_color'] : '';
    $float = isset($element['float']) ? $element['float'] : 'left';

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
            color: <?php echo $color; ?> !important;
        <?php endif; ?>
        <?php if(!empty($text_align)): ?>
            text-align: <?php echo $text_align; ?>;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>
        <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
        <?php endif; ?>
        <?php if(!empty($css)): ?>
        <?php echo $css; ?>
        <?php endif; ?>
        }


        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php if(!empty($hover_color)): ?>
            color: <?php echo $hover_color; ?> !important;
        <?php endif; ?>
        <?php if(!empty($css_hover)): ?>
        <?php echo $css_hover; ?>
        <?php endif; ?>
        }


    </style>
    <?php
}




add_action('post_grid_layout_element_option_wc_categories','post_grid_layout_element_option_wc_categories');
function post_grid_layout_element_option_wc_categories($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $float = isset($element_data['float']) ? $element_data['float'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $hover_color = isset($element_data['hover_color']) ? $element_data['hover_color'] : '';

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

            <span class="expand"><?php echo __('Woo - Categories','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wc_categories]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Price wrapper html. ex: <code>Categories: %s</code>, <code>%s</code> will replace by output','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Categories: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_categories]',
                'title'		=> __('Text Color','post-grid'),
                'details'	=> __('Price text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'hover_color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_categories]',
                'title'		=> __('Text hover color','post-grid'),
                'details'	=> __('Price hover text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $hover_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[wc_categories]',
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
                'parent' => $input_name.'[wc_categories]',
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
                'parent' => $input_name.'[wc_categories]',
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
                'parent' => $input_name.'[wc_categories]',
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
                'parent' => $input_name.'[wc_categories]',
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
                'parent' => $input_name.'[wc_categories]',
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



add_action('post_grid_layout_element_wc_categories', 'post_grid_layout_element_wc_categories');
function post_grid_layout_element_wc_categories($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;


    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';

    $wrapper_html = !empty($element['wrapper_html']) ?  $element['wrapper_html'] : '%s';

    $product = wc_get_product($post_id);

    $categories = wc_get_product_category_list($post_id);


    if(!empty($categories)):
        $categories_html = sprintf($wrapper_html, $categories);

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wc_categories ">
            <?php echo ($categories_html); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wc_categories', 'post_grid_layout_element_css_wc_categories', 10);
function post_grid_layout_element_css_wc_categories($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($element['color']) ? $element['color'] : '';
    $hover_color = isset($element['hover_color']) ? $element['hover_color'] : '';

    $font_size = isset($element['font_size']) ? $element['font_size'] : '';
    $font_family = isset($element['font_family']) ? $element['font_family'] : '';
    $margin = isset($element['margin']) ? $element['margin'] : '';
    $text_align = isset($element['text_align']) ? $element['text_align'] : 'left';

    $css = isset($element['css']) ? $element['css'] : '';
    $css_hover = isset($element['css_hover']) ? $element['css_hover'] : '';

    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>{
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
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

        <?php if(!empty($color)): ?>
            color: <?php echo $color; ?> !important;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>

        }

        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> a:hover{
        <?php if(!empty($hover_color)): ?>
            color: <?php echo $hover_color; ?> !important;
        <?php endif; ?>

        }

        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> a:hover{
        <?php if(!empty($css_hover)): ?>
        <?php echo $css_hover; ?>
        <?php endif; ?>
        }

    </style>
    <?php
}





add_action('post_grid_layout_element_option_wc_tags','post_grid_layout_element_option_wc_tags');
function post_grid_layout_element_option_wc_tags($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $float = isset($element_data['float']) ? $element_data['float'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $hover_color = isset($element_data['hover_color']) ? $element_data['hover_color'] : '';

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

            <span class="expand"><?php echo __('Woo - Tags','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wc_tags]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Price wrapper html. ex: <code>Tags: %s</code>, <code>%s</code> will replace by output','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Tags: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_tags]',
                'title'		=> __('Text Color','post-grid'),
                'details'	=> __('Price text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'hover_color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_tags]',
                'title'		=> __('Text hover color','post-grid'),
                'details'	=> __('Price hover text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $hover_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[wc_tags]',
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
                'parent' => $input_name.'[wc_tags]',
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
                'parent' => $input_name.'[wc_tags]',
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
                'parent' => $input_name.'[wc_tags]',
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
                'parent' => $input_name.'[wc_tags]',
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
                'parent' => $input_name.'[wc_tags]',
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



add_action('post_grid_layout_element_wc_tags', 'post_grid_layout_element_wc_tags');
function post_grid_layout_element_wc_tags($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;


    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';

    $wrapper_html = !empty($element['wrapper_html']) ?  $element['wrapper_html'] : '%s';

    $product = wc_get_product($post_id);

    $categories = wc_get_product_category_list($post_id);


    if(!empty($categories)):
        $categories_html = sprintf($wrapper_html, $categories);

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wc_tags ">
            <?php echo ($categories_html); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wc_tags', 'post_grid_layout_element_css_wc_tags', 10);
function post_grid_layout_element_css_wc_tags($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($element['color']) ? $element['color'] : '';
    $hover_color = isset($element['hover_color']) ? $element['hover_color'] : '';

    $font_size = isset($element['font_size']) ? $element['font_size'] : '';
    $font_family = isset($element['font_family']) ? $element['font_family'] : '';
    $margin = isset($element['margin']) ? $element['margin'] : '';
    $text_align = isset($element['text_align']) ? $element['text_align'] : 'left';

    $css = isset($element['css']) ? $element['css'] : '';
    $css_hover = isset($element['css_hover']) ? $element['css_hover'] : '';

    ?>
    <style type="text/css">
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>{
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
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

        <?php if(!empty($color)): ?>
            color: <?php echo $color; ?> !important;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>

        }

        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> a:hover{
        <?php if(!empty($hover_color)): ?>
            color: <?php echo $hover_color; ?> !important;
        <?php endif; ?>

        }

        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> a:hover{
        <?php if(!empty($css_hover)): ?>
        <?php echo $css_hover; ?>
        <?php endif; ?>
        }

    </style>
    <?php
}




add_action('post_grid_layout_element_option_wc_gallery','post_grid_layout_element_option_wc_gallery');
function post_grid_layout_element_option_wc_gallery($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $column_count = isset($element_data['column_count']) ? $element_data['column_count'] : '';

    $margin = isset($element_data['margin']) ? $element_data['margin'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';



    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Woo - Gallery','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'column_count',
                'css_id'		=> $element_index.'_column_count',
                'parent' => $input_name.'[wc_gallery]',
                'title'		=> __('Column count','post-grid'),
                'details'	=> __('Write column count.','post-grid'),
                'type'		=> 'text',
                'value'		=> $column_count,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[wc_gallery]',
                'title'		=> __('Margin','post-grid'),
                'details'	=> __('Set margin.','post-grid'),
                'type'		=> 'text',
                'value'		=> $margin,
                'default'		=> '',
                'placeholder'		=> '5px 0',
            );

            $settings_tabs_field->generate_field($args);





            $args = array(
                'id'		=> 'css',
                'css_id'		=> $element_index.'_css',
                'parent' => $input_name.'[wc_gallery]',
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
                'parent' => $input_name.'[wc_gallery]',
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



add_action('post_grid_layout_element_wc_gallery', 'post_grid_layout_element_wc_gallery');
function post_grid_layout_element_wc_gallery($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $acf_key = isset($element['acf_key']) ? $element['acf_key'] : '';

    $text = isset($element['text']) ?  $element['text'] : '';

    //var_dump($acf_key);

    $product = wc_get_product($post_id);

    $attachment_ids = $product->get_gallery_image_ids();

    //var_dump($attachment_ids);

    if(!empty($attachment_ids)):

        $wc_gallery_html = '';
        ?>

        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wc_gallery ">

            <?php
            foreach($attachment_ids as $id){

                ?>
                <a target="_blank" href="<?php echo wp_get_attachment_url($id); ?>"><img src="<?php echo wp_get_attachment_thumb_url($id); ?>" /></a>
                <?php
            }

            ?>
        </div>

        <?php
    endif;


    //endif;

}



add_action('post_grid_layout_element_css_wc_gallery', 'post_grid_layout_element_css_wc_gallery', 10);
function post_grid_layout_element_css_wc_gallery($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $column_count = isset($element['column_count']) ? $element['column_count'] : '';

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
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> a{
            display: inline-block;
            width: <?php echo (100)/$column_count; ?>%;
            margin: 0;
            padding: 0;
            float: left;
        }
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> img{
            box-shadow: none;
            border-radius: 0;
            padding:0px;
            width: 95%;
        }

        <?php if(!empty($css_hover)): ?>
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php echo $css_hover; ?>
        }
        <?php endif; ?>
    </style>
    <?php
}





add_action('post_grid_layout_element_option_wc_sku','post_grid_layout_element_option_wc_sku');
function post_grid_layout_element_option_wc_sku($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';

    $color = isset($element_data['color']) ? $element_data['color'] : '';
    $hover_color = isset($element_data['hover_color']) ? $element_data['hover_color'] : '';

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

            <span class="expand"><?php echo __('Woo - SKU','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[wc_sku]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Price wrapper html. ex: <code>SKU: %s</code>, <code>%s</code> will replace by output','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'SKU: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_sku]',
                'title'		=> __('Text Color','post-grid'),
                'details'	=> __('Price text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'hover_color',
                'css_id'		=> $element_index.'_wc_add_to_cart',
                'parent' => $input_name.'[wc_sku]',
                'title'		=> __('Text hover color','post-grid'),
                'details'	=> __('Price hover text color.','post-grid'),
                'type'		=> 'colorpicker',
                'value'		=> $hover_color,
                'default'		=> '',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'font_size',
                'css_id'		=> $element_index.'_font_size',
                'parent' => $input_name.'[wc_sku]',
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
                'parent' => $input_name.'[wc_sku]',
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
                'parent' => $input_name.'[wc_sku]',
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
                'parent' => $input_name.'[wc_sku]',
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
                'parent' => $input_name.'[wc_sku]',
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
                'parent' => $input_name.'[wc_sku]',
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



add_action('post_grid_layout_element_wc_sku', 'post_grid_layout_element_wc_sku');
function post_grid_layout_element_wc_sku($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $title = get_the_title($post_id);

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';

    $wrapper_html = !empty($element['wrapper_html']) ?  $element['wrapper_html'] : '%s';

    $product = wc_get_product($post_id);

    $sku = $product->get_sku();

    //var_dump($sku);

    if(!empty($sku)):

        $sku_html = sprintf($wrapper_html, $sku);

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> wc_sku ">
            <?php echo ($sku_html); ?>
        </div>
    <?php
    endif;

}



add_action('post_grid_layout_element_css_wc_sku', 'post_grid_layout_element_css_wc_sku', 10);
function post_grid_layout_element_css_wc_sku($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

    $color = isset($element['color']) ? $element['color'] : '';
    $hover_color = isset($element['hover_color']) ? $element['hover_color'] : '';
    $float = isset($element['float']) ? $element['float'] : 'left';

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
            color: <?php echo $color; ?> !important;
        <?php endif; ?>
        <?php if(!empty($text_align)): ?>
            text-align: <?php echo $text_align; ?>;
        <?php endif; ?>
        <?php if(!empty($font_size)): ?>
            font-size: <?php echo $font_size; ?>;
        <?php endif; ?>
        <?php if(!empty($margin)): ?>
            margin: <?php echo $margin; ?>;
        <?php endif; ?>
        <?php if(!empty($css)): ?>
        <?php echo $css; ?>
        <?php endif; ?>
        }


        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php if(!empty($hover_color)): ?>
            color: <?php echo $hover_color; ?> !important;
        <?php endif; ?>
        <?php if(!empty($css_hover)): ?>
        <?php echo $css_hover; ?>
        <?php endif; ?>
        }


    </style>
    <?php
}
