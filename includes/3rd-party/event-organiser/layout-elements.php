<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_filter('post_grid_layout_elements','post_grid_pro_eo_layout_elements');

function post_grid_pro_eo_layout_elements($elements_group){

    $elements_group['event-organiser'] = array(
        'group_title'=>'Event Organiser',
        'items'=>array(
            'eo_event_cat'=>array('name' =>__('Event categories','post-grid')),
            'eo_event_tag'=>array('name' =>__('Event tags','post-grid')),
            'eo_event_start_date'=>array('name' =>__('Event start date','post-grid')),
            'eo_event_end_date'=>array('name' =>__('Event end date','post-grid')),
            'eo_event_start_time'=>array('name' =>__('Event start time','post-grid')),
            'eo_event_end_time'=>array('name' =>__('Event end time','post-grid')),
            'eo_venue_name'=>array('name' =>__('Venue name','post-grid')),
            'eo_venue_address'=>array('name' =>__('Venue address','post-grid')),
            'eo_venue_excerpt'=>array('name' =>__('Venue excerpt','post-grid')),
            'eo_event_rsvp_time'=>array('name' =>__('Cut-Off time','post-grid')),
            
        ),
    );

    return $elements_group;
}


add_action('post_grid_layout_element_option_eo_event_cat','post_grid_layout_element_option_eo_event_cat');
function post_grid_layout_element_option_eo_event_cat($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

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

            <span class="expand"><?php echo __('Event Organiser - Categories','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'max_count',
                'parent' => $input_name.'[eo_event_cat]',
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
                'parent' => $input_name.'[eo_event_cat]',
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
                'parent' => $input_name.'[eo_event_cat]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Categories: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[eo_event_cat]',
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
                'parent' => $input_name.'[eo_event_cat]',
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
                'parent' => $input_name.'[eo_event_cat]',
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
                'parent' => $input_name.'[eo_event_cat]',
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
                'parent' => $input_name.'[eo_event_cat]',
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
                'parent' => $input_name.'[eo_event_cat]',
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
                'parent' => $input_name.'[eo_event_cat]',
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



add_action('post_grid_layout_element_eo_event_cat', 'post_grid_layout_element_eo_event_cat');

function post_grid_layout_element_eo_event_cat($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $link_target = isset($element['link_target']) ? $element['link_target'] : '';
    $max_count = !empty($element['max_count']) ? (int) $element['max_count'] : 3;
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $separator = !empty($element['separator']) ? $element['separator'] : ', ';


    $term_list = wp_get_post_terms( $post_id, 'event-category', array( 'fields' => 'all' ) );

    $eo_event_cat_html = '';
    $term_total_count = count($term_list);
    $max_term_limit = ($term_total_count < $max_count) ? $term_total_count : $max_count ;

    if(empty($term_list)) return;

    $i = 0;;
    foreach ($term_list as $term){
        if($i >= $max_count) continue;

        $term_id = isset($term->term_id) ? $term->term_id : '';
        $term_name = isset($term->name) ? $term->name : '';
        $term_link = get_term_link($term_id);

        $eo_event_cat_html .= '<a target="'.esc_attr($link_target).'" href="'.esc_url_raw($term_link).'">'.esc_html($term_name).'</a>';
        if( $i+1 < $max_term_limit){ $eo_event_cat_html .= $separator;}

        $i++;
    }

    //var_dump($eo_event_cat_html);

    ?>
    <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> eo_event_cat ">
        <?php echo sprintf($wrapper_html, $eo_event_cat_html); ?>
    </div>
    <?php
}


add_action('post_grid_layout_element_css_eo_event_cat', 'post_grid_layout_element_css_eo_event_cat', 10);
function post_grid_layout_element_css_eo_event_cat($args){


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



add_action('post_grid_layout_element_option_eo_event_tag','post_grid_layout_element_option_eo_event_tag');
function post_grid_layout_element_option_eo_event_tag($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

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

            <span class="expand"><?php echo __('Event Organiser - Tags','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'max_count',
                'parent' => $input_name.'[eo_event_tag]',
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
                'parent' => $input_name.'[eo_event_tag]',
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
                'parent' => $input_name.'[eo_event_tag]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Tags: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[eo_event_tag]',
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
                'parent' => $input_name.'[eo_event_tag]',
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
                'parent' => $input_name.'[eo_event_tag]',
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
                'parent' => $input_name.'[eo_event_tag]',
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
                'parent' => $input_name.'[eo_event_tag]',
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
                'parent' => $input_name.'[eo_event_tag]',
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
                'parent' => $input_name.'[eo_event_tag]',
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



add_action('post_grid_layout_element_eo_event_tag', 'post_grid_layout_element_eo_event_tag');

function post_grid_layout_element_eo_event_tag($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $link_target = isset($element['link_target']) ? $element['link_target'] : '';
    $max_count = !empty($element['max_count']) ? (int) $element['max_count'] : 3;
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $separator = !empty($element['separator']) ? $element['separator'] : ', ';


    $term_list = wp_get_post_terms( $post_id, 'event-tag', array( 'fields' => 'all' ) );

    $eo_event_tag_html = '';
    $term_total_count = count($term_list);
    $max_term_limit = ($term_total_count < $max_count) ? $term_total_count : $max_count ;

    if(empty($term_list)) return;

    $i = 0;;
    foreach ($term_list as $term){
        if($i >= $max_count) continue;

        $term_id = isset($term->term_id) ? $term->term_id : '';
        $term_name = isset($term->name) ? $term->name : '';
        $term_link = get_term_link($term_id);

        $eo_event_tag_html .= '<a target="'.esc_attr($link_target).'" href="'.esc_url_raw($term_link).'">'.esc_html($term_name).'</a>';
        if( $i+1 < $max_term_limit){ $eo_event_tag_html .= $separator;}

        $i++;
    }

    //var_dump($eo_event_tag_html);

    ?>
    <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> eo_event_tag ">
        <?php echo sprintf($wrapper_html, $eo_event_tag_html); ?>
    </div>
    <?php
}


add_action('post_grid_layout_element_css_eo_event_tag', 'post_grid_layout_element_css_eo_event_tag', 10);
function post_grid_layout_element_css_eo_event_tag($args){


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




add_action('post_grid_layout_element_option_eo_event_start_date','post_grid_layout_element_option_eo_event_start_date');
function post_grid_layout_element_option_eo_event_start_date($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $date_format = isset($element_data['date_format']) ? $element_data['date_format'] : '';

    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $wrapper_margin = isset($element_data['wrapper_margin']) ? $element_data['wrapper_margin'] : '';
    $text_color = isset($element_data['text_color']) ? $element_data['text_color'] : '';

    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Event Organiser - Event start date','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[eo_event_start_date]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Start Date: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'date_format',
                'css_id'		=> $element_index.'_date_format',
                'parent' => $input_name.'[eo_event_start_date]',
                'title'		=> __('Date format','post-grid'),
                'details'	=> __('Write date format, use <code>Y-m-d</code>.','post-grid'),
                'type'		=> 'text',
                'value'		=> $date_format,
                'default'		=> '',
                'placeholder'		=> 'Y-m-d',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[eo_event_start_date]',
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
                'parent' => $input_name.'[eo_event_start_date]',
                'title'		=> __('Font size','post-grid'),
                'details'	=> __('Choose font size.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '16px',

            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_color',
                'css_id'		=> $element_index.'_text_color',
                'parent' => $input_name.'[eo_event_start_date]',
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
                'parent' => $input_name.'[eo_event_start_date]',
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
                'parent' => $input_name.'[eo_event_start_date]',
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
                'parent' => $input_name.'[eo_event_start_date]',
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



add_action('post_grid_layout_element_eo_event_start_date', 'post_grid_layout_element_eo_event_start_date');

function post_grid_layout_element_eo_event_start_date($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'Y-m-d';



    $event_start_date = eo_get_the_start($date_format, $post_id);

    if(!empty($event_start_date)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> eo_event_start_date ">
            <?php echo sprintf($wrapper_html, $event_start_date); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_eo_event_start_date', 'post_grid_layout_element_css_eo_event_start_date', 10);
function post_grid_layout_element_css_eo_event_start_date($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

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

        <?php if(!empty($css_hover)): ?>
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php echo $css_hover; ?>
        }
        <?php endif; ?>
    </style>
    <?php
}


add_action('post_grid_layout_element_option_eo_event_end_date','post_grid_layout_element_option_eo_event_end_date');
function post_grid_layout_element_option_eo_event_end_date($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $date_format = isset($element_data['date_format']) ? $element_data['date_format'] : '';

    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $wrapper_margin = isset($element_data['wrapper_margin']) ? $element_data['wrapper_margin'] : '';
    $text_color = isset($element_data['text_color']) ? $element_data['text_color'] : '';

    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Event Organiser - Event end date','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[eo_event_end_date]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'End Date: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'date_format',
                'css_id'		=> $element_index.'_date_format',
                'parent' => $input_name.'[eo_event_end_date]',
                'title'		=> __('Date format','post-grid'),
                'details'	=> __('Write date format, use <code>Y-m-d</code>.','post-grid'),
                'type'		=> 'text',
                'value'		=> $date_format,
                'default'		=> '',
                'placeholder'		=> 'Y-m-d',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[eo_event_end_date]',
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
                'parent' => $input_name.'[eo_event_end_date]',
                'title'		=> __('Font size','post-grid'),
                'details'	=> __('Choose font size.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '16px',

            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_color',
                'css_id'		=> $element_index.'_text_color',
                'parent' => $input_name.'[eo_event_end_date]',
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
                'parent' => $input_name.'[eo_event_end_date]',
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
                'parent' => $input_name.'[eo_event_end_date]',
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
                'parent' => $input_name.'[eo_event_end_date]',
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



add_action('post_grid_layout_element_eo_event_end_date', 'post_grid_layout_element_eo_event_end_date');

function post_grid_layout_element_eo_event_end_date($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'Y-m-d';

    $event_end_date = eo_get_the_end($date_format, $post_id);

    if(!empty($event_end_date)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> eo_event_end_date ">
            <?php echo sprintf($wrapper_html, $event_end_date); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_eo_event_end_date', 'post_grid_layout_element_css_eo_event_end_date', 10);
function post_grid_layout_element_css_eo_event_end_date($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

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

        <?php if(!empty($css_hover)): ?>
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php echo $css_hover; ?>
        }
        <?php endif; ?>
    </style>
    <?php
}


add_action('post_grid_layout_element_option_eo_event_start_time','post_grid_layout_element_option_eo_event_start_time');
function post_grid_layout_element_option_eo_event_start_time($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $date_format = isset($element_data['date_format']) ? $element_data['date_format'] : 'h:i:s A';

    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $wrapper_margin = isset($element_data['wrapper_margin']) ? $element_data['wrapper_margin'] : '';
    $text_color = isset($element_data['text_color']) ? $element_data['text_color'] : '';

    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Event Organiser - Event start time','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[eo_event_start_time]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Start time: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'date_format',
                'css_id'		=> $element_index.'_date_format',
                'parent' => $input_name.'[eo_event_start_time]',
                'title'		=> __('Date format','post-grid'),
                'details'	=> __('Write date format, use <code>h:i:s A</code>.','post-grid'),
                'type'		=> 'text',
                'value'		=> $date_format,
                'default'		=> '',
                'placeholder'		=> 'h:i:s A',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[eo_event_start_time]',
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
                'parent' => $input_name.'[eo_event_start_time]',
                'title'		=> __('Font size','post-grid'),
                'details'	=> __('Choose font size.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '16px',

            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_color',
                'css_id'		=> $element_index.'_text_color',
                'parent' => $input_name.'[eo_event_start_time]',
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
                'parent' => $input_name.'[eo_event_start_time]',
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
                'parent' => $input_name.'[eo_event_start_time]',
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
                'parent' => $input_name.'[eo_event_start_time]',
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



add_action('post_grid_layout_element_eo_event_start_time', 'post_grid_layout_element_eo_event_start_time');

function post_grid_layout_element_eo_event_start_time($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'c';

    $event_start_time = eo_get_the_start($date_format, $post_id);

    if(!empty($event_start_time)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> eo_event_start_time ">
            <?php echo sprintf($wrapper_html, $event_start_time); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_eo_event_start_time', 'post_grid_layout_element_css_eo_event_start_time', 10);
function post_grid_layout_element_css_eo_event_start_time($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

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

        <?php if(!empty($css_hover)): ?>
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php echo $css_hover; ?>
        }
        <?php endif; ?>
    </style>
    <?php
}


add_action('post_grid_layout_element_option_eo_event_end_time','post_grid_layout_element_option_eo_event_end_time');
function post_grid_layout_element_option_eo_event_end_time($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $date_format = isset($element_data['date_format']) ? $element_data['date_format'] : '';

    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $wrapper_margin = isset($element_data['wrapper_margin']) ? $element_data['wrapper_margin'] : '';
    $text_color = isset($element_data['text_color']) ? $element_data['text_color'] : '';

    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Event Organiser - Event end time','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[eo_event_end_time]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'End time: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'date_format',
                'css_id'		=> $element_index.'_date_format',
                'parent' => $input_name.'[eo_event_end_time]',
                'title'		=> __('Date format','post-grid'),
                'details'	=> __('Write date format, use <code>h:i:s A</code>.','post-grid'),
                'type'		=> 'text',
                'value'		=> $date_format,
                'default'		=> '',
                'placeholder'		=> 'h:i:s A',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[eo_event_end_time]',
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
                'parent' => $input_name.'[eo_event_end_time]',
                'title'		=> __('Font size','post-grid'),
                'details'	=> __('Choose font size.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '16px',

            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_color',
                'css_id'		=> $element_index.'_text_color',
                'parent' => $input_name.'[eo_event_end_time]',
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
                'parent' => $input_name.'[eo_event_end_time]',
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
                'parent' => $input_name.'[eo_event_end_time]',
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
                'parent' => $input_name.'[eo_event_end_time]',
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



add_action('post_grid_layout_element_eo_event_end_time', 'post_grid_layout_element_eo_event_end_time');

function post_grid_layout_element_eo_event_end_time($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'h:i:s A';


    $event_end_time = eo_get_the_end($date_format, $post_id);

    if(!empty($event_end_time)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> eo_event_end_time ">
            <?php echo sprintf($wrapper_html, $event_end_time); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_eo_event_end_time', 'post_grid_layout_element_css_eo_event_end_time', 10);
function post_grid_layout_element_css_eo_event_end_time($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

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

        <?php if(!empty($css_hover)): ?>
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php echo $css_hover; ?>
        }
        <?php endif; ?>
    </style>
    <?php
}


add_action('post_grid_layout_element_option_eo_venue_name','post_grid_layout_element_option_eo_venue_name');
function post_grid_layout_element_option_eo_venue_name($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';


    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $wrapper_margin = isset($element_data['wrapper_margin']) ? $element_data['wrapper_margin'] : '';
    $text_color = isset($element_data['text_color']) ? $element_data['text_color'] : '';

    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Event Organiser - Venue name','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[eo_venue_name]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output. link ex: <code>&lt;a href="%2$s">%1$s&lt;/a> </code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Venue: %s',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[eo_venue_name]',
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
                'parent' => $input_name.'[eo_venue_name]',
                'title'		=> __('Font size','post-grid'),
                'details'	=> __('Choose font size.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '16px',

            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_color',
                'css_id'		=> $element_index.'_text_color',
                'parent' => $input_name.'[eo_venue_name]',
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
                'parent' => $input_name.'[eo_venue_name]',
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
                'parent' => $input_name.'[eo_venue_name]',
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
                'parent' => $input_name.'[eo_venue_name]',
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



add_action('post_grid_layout_element_eo_venue_name', 'post_grid_layout_element_eo_venue_name');

function post_grid_layout_element_eo_venue_name($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';

    $event_spaces = get_post_meta($post_id,'_event_spaces', true);

    $venue_id = eo_get_venue($post_id);
    $venue_name = eo_get_venue_name($venue_id);
    $venue_link = eo_get_venue_link( $venue_id );
    //var_dump($venue_name);

    if(!empty($venue_name)):

        $venue_name = sprintf($wrapper_html, $venue_name, $venue_link );

        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> eo_venue_name ">
            <?php echo $venue_name; ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_eo_venue_name', 'post_grid_layout_element_css_eo_venue_name', 10);
function post_grid_layout_element_css_eo_venue_name($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

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

        <?php if(!empty($css_hover)): ?>
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php echo $css_hover; ?>
        }
        <?php endif; ?>
    </style>
    <?php
}


add_action('post_grid_layout_element_option_eo_venue_address','post_grid_layout_element_option_eo_venue_address');
function post_grid_layout_element_option_eo_venue_address($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $wrapper_margin = isset($element_data['wrapper_margin']) ? $element_data['wrapper_margin'] : '';
    $text_color = isset($element_data['text_color']) ? $element_data['text_color'] : '';

    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Event Organiser - Venue address','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[eo_venue_address]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>{address}</code> to replace output. elements: <code>{address}, {city}, {state}, {postcode}, {country}</code>','post-grid'),
                'type'		=> 'textarea',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Address: {address}',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[eo_venue_address]',
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
                'parent' => $input_name.'[eo_venue_address]',
                'title'		=> __('Font size','post-grid'),
                'details'	=> __('Choose font size.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '16px',

            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_color',
                'css_id'		=> $element_index.'_text_color',
                'parent' => $input_name.'[eo_venue_address]',
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
                'parent' => $input_name.'[eo_venue_address]',
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
                'parent' => $input_name.'[eo_venue_address]',
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
                'parent' => $input_name.'[eo_venue_address]',
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



add_action('post_grid_layout_element_eo_venue_address', 'post_grid_layout_element_eo_venue_address');

function post_grid_layout_element_eo_venue_address($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';

    $venue_id = eo_get_venue($post_id);
    $address_details = eo_get_venue_address($venue_id);

    $vars = array(
        '{address}'=> isset($address_details['address']) ? $address_details['address'] : '',
        '{city}'=> isset($address_details['city']) ? $address_details['city'] : '',
        '{state}'=> isset($address_details['state']) ? $address_details['state'] : '',
        '{postcode}'=> isset($address_details['postcode']) ? $address_details['postcode'] : '',
        '{country}'=> isset($address_details['country']) ? $address_details['country'] : '',


    );



    if(!empty($address_details)):

        $address_html = strtr($wrapper_html, $vars);


        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> eo_venue_address ">
            <?php echo wpautop($address_html); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_eo_venue_address', 'post_grid_layout_element_css_eo_venue_address', 10);
function post_grid_layout_element_css_eo_venue_address($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

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

        <?php if(!empty($css_hover)): ?>
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php echo $css_hover; ?>
        }
        <?php endif; ?>
    </style>
    <?php
}






add_action('post_grid_layout_element_option_eo_venue_excerpt','post_grid_layout_element_option_eo_venue_excerpt');
function post_grid_layout_element_option_eo_venue_excerpt($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $word_count = isset($element_data['word_count']) ? $element_data['word_count'] : '';

    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $wrapper_margin = isset($element_data['wrapper_margin']) ? $element_data['wrapper_margin'] : '';
    $text_color = isset($element_data['text_color']) ? $element_data['text_color'] : '';

    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Event Organiser - Venue excerpt','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[eo_venue_excerpt]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Cut-Off date: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'word_count',
                'css_id'		=> $element_index.'_date_format',
                'parent' => $input_name.'[eo_venue_excerpt]',
                'title'		=> __('Word count','post-grid'),
                'details'	=> __('Write word count.','post-grid'),
                'type'		=> 'text',
                'value'		=> $word_count,
                'default'		=> '',
                'placeholder'		=> '30',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[eo_venue_excerpt]',
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
                'parent' => $input_name.'[eo_venue_excerpt]',
                'title'		=> __('Font size','post-grid'),
                'details'	=> __('Choose font size.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '16px',

            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_color',
                'css_id'		=> $element_index.'_text_color',
                'parent' => $input_name.'[eo_venue_excerpt]',
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
                'parent' => $input_name.'[eo_venue_excerpt]',
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
                'parent' => $input_name.'[eo_venue_excerpt]',
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
                'parent' => $input_name.'[eo_venue_excerpt]',
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



add_action('post_grid_layout_element_eo_venue_excerpt', 'post_grid_layout_element_eo_venue_excerpt');

function post_grid_layout_element_eo_venue_excerpt($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $word_count = !empty($element['word_count']) ? $element['word_count'] : '';

    $venue_id = eo_get_venue($post_id);

    $venue_excerpt = eo_get_venue_excerpt( $venue_id, $word_count = 55 );

    if(!empty($venue_excerpt)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> eo_venue_excerpt ">
            <?php echo sprintf($wrapper_html, $venue_excerpt); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_eo_venue_excerpt', 'post_grid_layout_element_css_eo_venue_excerpt', 10);
function post_grid_layout_element_css_eo_venue_excerpt($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

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

        <?php if(!empty($css_hover)): ?>
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php echo $css_hover; ?>
        }
        <?php endif; ?>
    </style>
    <?php
}





add_action('post_grid_layout_element_option_eo_event_rsvp_time','post_grid_layout_element_option_eo_event_rsvp_time');
function post_grid_layout_element_option_eo_event_rsvp_time($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $date_format = isset($element_data['date_format']) ? $element_data['date_format'] : 'h:i:s A';

    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $wrapper_margin = isset($element_data['wrapper_margin']) ? $element_data['wrapper_margin'] : '';
    $text_color = isset($element_data['text_color']) ? $element_data['text_color'] : '';

    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('Event Organiser - Cut-Off time','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[eo_event_rsvp_time]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Cut-Off time: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'date_format',
                'css_id'		=> $element_index.'_date_format',
                'parent' => $input_name.'[eo_event_rsvp_time]',
                'title'		=> __('Date format','post-grid'),
                'details'	=> __('Write date format, use <code>h:i:s A</code>.','post-grid'),
                'type'		=> 'text',
                'value'		=> $date_format,
                'default'		=> '',
                'placeholder'		=> 'h:i:s A',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[eo_event_rsvp_time]',
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
                'parent' => $input_name.'[eo_event_rsvp_time]',
                'title'		=> __('Font size','post-grid'),
                'details'	=> __('Choose font size.','post-grid'),
                'type'		=> 'text',
                'value'		=> $font_size,
                'default'		=> '',
                'placeholder'		=> '16px',

            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'text_color',
                'css_id'		=> $element_index.'_text_color',
                'parent' => $input_name.'[eo_event_rsvp_time]',
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
                'parent' => $input_name.'[eo_event_rsvp_time]',
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
                'parent' => $input_name.'[eo_event_rsvp_time]',
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
                'parent' => $input_name.'[eo_event_rsvp_time]',
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



add_action('post_grid_layout_element_eo_event_rsvp_time', 'post_grid_layout_element_eo_event_rsvp_time');

function post_grid_layout_element_eo_event_rsvp_time($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'Y-m-d';


    $event_rsvp_time = get_post_meta($post_id,'_event_rsvp_time', true);

    $event_rsvp_time_obj = new DateTime($event_rsvp_time);
    $event_rsvp_time_formatted = $event_rsvp_time_obj->format($date_format);

    if(!empty($event_rsvp_time_formatted)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> eo_event_rsvp_time ">
            <?php echo sprintf($wrapper_html, $event_rsvp_time_formatted); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_eo_event_rsvp_time', 'post_grid_layout_element_css_eo_event_rsvp_time', 10);
function post_grid_layout_element_css_eo_event_rsvp_time($args){


    $index = isset($args['index']) ? $args['index'] : '';
    $element = isset($args['element']) ? $args['element'] : array();
    $layout_id = isset($args['layout_id']) ? $args['layout_id'] : '';

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

        <?php if(!empty($css_hover)): ?>
        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?>:hover{
        <?php echo $css_hover; ?>
        }
        <?php endif; ?>
    </style>
    <?php
}
