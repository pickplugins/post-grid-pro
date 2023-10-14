<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_filter('post_grid_layout_elements','post_grid_pro_em_layout_elements');

function post_grid_pro_em_layout_elements($elements_group){

    $elements_group['events-manager'] = array(
        'group_title'=>'Events Manager',
        'items'=>array(
            'em_event_cat'=>array('name' =>__('Event categories','post-grid')),
            'em_event_tag'=>array('name' =>__('Event tags','post-grid')),
            'em_event_start_date'=>array('name' =>__('Event start date','post-grid')),
            'em_event_end_date'=>array('name' =>__('Event end date','post-grid')),
            'em_event_start_time'=>array('name' =>__('Event start time','post-grid')),
            'em_event_end_time'=>array('name' =>__('Event end time','post-grid')),
            'em_event_spaces'=>array('name' =>__('Event spaces','post-grid')),
            'em_event_rsvp_spaces'=>array('name' =>__('Max Spaces','post-grid')),
            'em_event_rsvp_date'=>array('name' =>__('Cut-Off Date','post-grid')),
            'em_event_rsvp_time'=>array('name' =>__('Cut-Off time','post-grid')),

        ),
    );

    return $elements_group;
}


add_action('post_grid_layout_element_option_em_event_cat','post_grid_layout_element_option_em_event_cat');
function post_grid_layout_element_option_em_event_cat($parameters){

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

            <span class="expand"><?php echo __('Events Manager - Categories','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'max_count',
                'parent' => $input_name.'[em_event_cat]',
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
                'parent' => $input_name.'[em_event_cat]',
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
                'parent' => $input_name.'[em_event_cat]',
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
                'parent' => $input_name.'[em_event_cat]',
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
                'parent' => $input_name.'[em_event_cat]',
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
                'parent' => $input_name.'[em_event_cat]',
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
                'parent' => $input_name.'[em_event_cat]',
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
                'parent' => $input_name.'[em_event_cat]',
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
                'parent' => $input_name.'[em_event_cat]',
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
                'parent' => $input_name.'[em_event_cat]',
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



add_action('post_grid_layout_element_em_event_cat', 'post_grid_layout_element_em_event_cat');

function post_grid_layout_element_em_event_cat($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $link_target = isset($element['link_target']) ? $element['link_target'] : '';
    $max_count = !empty($element['max_count']) ? (int) $element['max_count'] : 3;
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $separator = !empty($element['separator']) ? $element['separator'] : ', ';


    $term_list = wp_get_post_terms( $post_id, 'event-categories', array( 'fields' => 'all' ) );

    $em_event_cat_html = '';
    $term_total_count = count($term_list);
    $max_term_limit = ($term_total_count < $max_count) ? $term_total_count : $max_count ;

    if(empty($term_list)) return;

    $i = 0;;
    foreach ($term_list as $term){
        if($i >= $max_count) continue;

        $term_id = isset($term->term_id) ? $term->term_id : '';
        $term_name = isset($term->name) ? $term->name : '';
        $term_link = get_term_link($term_id);

        $em_event_cat_html .= '<a target="'.esc_attr($link_target).'" href="'.esc_url_raw($term_link).'">'.esc_html($term_name).'</a>';
        if( $i+1 < $max_term_limit){ $em_event_cat_html .= $separator;}

        $i++;
    }

    //var_dump($em_event_cat_html);

    ?>
    <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> em_event_cat ">
        <?php echo sprintf($wrapper_html, $em_event_cat_html); ?>
    </div>
    <?php
}


add_action('post_grid_layout_element_css_em_event_cat', 'post_grid_layout_element_css_em_event_cat', 10);
function post_grid_layout_element_css_em_event_cat($args){


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



add_action('post_grid_layout_element_option_em_event_tag','post_grid_layout_element_option_em_event_tag');
function post_grid_layout_element_option_em_event_tag($parameters){

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

            <span class="expand"><?php echo __('Events Manager - Tags','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'max_count',
                'parent' => $input_name.'[em_event_tag]',
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
                'parent' => $input_name.'[em_event_tag]',
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
                'parent' => $input_name.'[em_event_tag]',
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
                'parent' => $input_name.'[em_event_tag]',
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
                'parent' => $input_name.'[em_event_tag]',
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
                'parent' => $input_name.'[em_event_tag]',
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
                'parent' => $input_name.'[em_event_tag]',
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
                'parent' => $input_name.'[em_event_tag]',
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
                'parent' => $input_name.'[em_event_tag]',
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
                'parent' => $input_name.'[em_event_tag]',
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



add_action('post_grid_layout_element_em_event_tag', 'post_grid_layout_element_em_event_tag');

function post_grid_layout_element_em_event_tag($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $link_target = isset($element['link_target']) ? $element['link_target'] : '';
    $max_count = !empty($element['max_count']) ? (int) $element['max_count'] : 3;
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $separator = !empty($element['separator']) ? $element['separator'] : ', ';


    $term_list = wp_get_post_terms( $post_id, 'event-tags', array( 'fields' => 'all' ) );

    $em_event_tag_html = '';
    $term_total_count = count($term_list);
    $max_term_limit = ($term_total_count < $max_count) ? $term_total_count : $max_count ;

    if(empty($term_list)) return;

    $i = 0;;
    foreach ($term_list as $term){
        if($i >= $max_count) continue;

        $term_id = isset($term->term_id) ? $term->term_id : '';
        $term_name = isset($term->name) ? $term->name : '';
        $term_link = get_term_link($term_id);

        $em_event_tag_html .= '<a target="'.esc_attr($link_target).'" href="'.esc_url_raw($term_link).'">'.esc_html($term_name).'</a>';
        if( $i+1 < $max_term_limit){ $em_event_tag_html .= $separator;}

        $i++;
    }

    //var_dump($em_event_tag_html);

    ?>
    <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> em_event_tag ">
        <?php echo sprintf($wrapper_html, $em_event_tag_html); ?>
    </div>
    <?php
}


add_action('post_grid_layout_element_css_em_event_tag', 'post_grid_layout_element_css_em_event_tag', 10);
function post_grid_layout_element_css_em_event_tag($args){


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




add_action('post_grid_layout_element_option_em_event_start_date','post_grid_layout_element_option_em_event_start_date');
function post_grid_layout_element_option_em_event_start_date($parameters){

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

            <span class="expand"><?php echo __('Events Manager - Event start date','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[em_event_start_date]',
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
                'parent' => $input_name.'[em_event_start_date]',
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
                'parent' => $input_name.'[em_event_start_date]',
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
                'parent' => $input_name.'[em_event_start_date]',
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
                'parent' => $input_name.'[em_event_start_date]',
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
                'parent' => $input_name.'[em_event_start_date]',
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
                'parent' => $input_name.'[em_event_start_date]',
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
                'parent' => $input_name.'[em_event_start_date]',
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



add_action('post_grid_layout_element_em_event_start_date', 'post_grid_layout_element_em_event_start_date');

function post_grid_layout_element_em_event_start_date($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'Y-m-d';


    $event_start_date = get_post_meta($post_id,'_event_start_date', true);

    $event_start_date_obj = new DateTime($event_start_date);
    $event_start_date_formatted = $event_start_date_obj->format($date_format);

    if(!empty($event_start_date_formatted)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> em_event_start_date ">
            <?php echo sprintf($wrapper_html, $event_start_date_formatted); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_em_event_start_date', 'post_grid_layout_element_css_em_event_start_date', 10);
function post_grid_layout_element_css_em_event_start_date($args){


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


add_action('post_grid_layout_element_option_em_event_end_date','post_grid_layout_element_option_em_event_end_date');
function post_grid_layout_element_option_em_event_end_date($parameters){

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

            <span class="expand"><?php echo __('Events Manager - Event end date','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[em_event_end_date]',
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
                'parent' => $input_name.'[em_event_end_date]',
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
                'parent' => $input_name.'[em_event_end_date]',
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
                'parent' => $input_name.'[em_event_end_date]',
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
                'parent' => $input_name.'[em_event_end_date]',
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
                'parent' => $input_name.'[em_event_end_date]',
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
                'parent' => $input_name.'[em_event_end_date]',
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
                'parent' => $input_name.'[em_event_end_date]',
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



add_action('post_grid_layout_element_em_event_end_date', 'post_grid_layout_element_em_event_end_date');

function post_grid_layout_element_em_event_end_date($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'Y-m-d';


    $event_start_date = get_post_meta($post_id,'_event_end_date', true);

    $event_start_date_obj = new DateTime($event_start_date);
    $event_start_date_formatted = $event_start_date_obj->format($date_format);

    if(!empty($event_start_date_formatted)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> em_event_end_date ">
            <?php echo sprintf($wrapper_html, $event_start_date_formatted); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_em_event_end_date', 'post_grid_layout_element_css_em_event_end_date', 10);
function post_grid_layout_element_css_em_event_end_date($args){


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


add_action('post_grid_layout_element_option_em_event_start_time','post_grid_layout_element_option_em_event_start_time');
function post_grid_layout_element_option_em_event_start_time($parameters){

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

            <span class="expand"><?php echo __('Events Manager - Event start time','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[em_event_start_time]',
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
                'parent' => $input_name.'[em_event_start_time]',
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
                'parent' => $input_name.'[em_event_start_time]',
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
                'parent' => $input_name.'[em_event_start_time]',
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
                'parent' => $input_name.'[em_event_start_time]',
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
                'parent' => $input_name.'[em_event_start_time]',
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
                'parent' => $input_name.'[em_event_start_time]',
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
                'parent' => $input_name.'[em_event_start_time]',
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



add_action('post_grid_layout_element_em_event_start_time', 'post_grid_layout_element_em_event_start_time');

function post_grid_layout_element_em_event_start_time($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'c';


    $event_start_time = get_post_meta($post_id,'_event_start_time', true);

    $event_start_time_obj = new DateTime($event_start_time);
    $event_start_time_formatted = $event_start_time_obj->format($date_format);

    if(!empty($event_start_time_formatted)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> em_event_start_time ">
            <?php echo sprintf($wrapper_html, $event_start_time_formatted); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_em_event_start_time', 'post_grid_layout_element_css_em_event_start_time', 10);
function post_grid_layout_element_css_em_event_start_time($args){


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


add_action('post_grid_layout_element_option_em_event_end_time','post_grid_layout_element_option_em_event_end_time');
function post_grid_layout_element_option_em_event_end_time($parameters){

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

            <span class="expand"><?php echo __('Events Manager - Event end time','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[em_event_end_time]',
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
                'parent' => $input_name.'[em_event_end_time]',
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
                'parent' => $input_name.'[em_event_end_time]',
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
                'parent' => $input_name.'[em_event_end_time]',
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
                'parent' => $input_name.'[em_event_end_time]',
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
                'parent' => $input_name.'[em_event_end_time]',
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
                'parent' => $input_name.'[em_event_end_time]',
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
                'parent' => $input_name.'[em_event_end_time]',
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



add_action('post_grid_layout_element_em_event_end_time', 'post_grid_layout_element_em_event_end_time');

function post_grid_layout_element_em_event_end_time($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'h:i:s A';


    $event_end_time = get_post_meta($post_id,'_event_end_time', true);

    $event_end_time_obj = new DateTime($event_end_time);
    $event_end_time_formatted = $event_end_time_obj->format($date_format);

    if(!empty($event_end_time_formatted)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> em_event_end_time ">
            <?php echo sprintf($wrapper_html, $event_end_time_formatted); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_em_event_end_time', 'post_grid_layout_element_css_em_event_end_time', 10);
function post_grid_layout_element_css_em_event_end_time($args){


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


add_action('post_grid_layout_element_option_em_event_spaces','post_grid_layout_element_option_em_event_spaces');
function post_grid_layout_element_option_em_event_spaces($parameters){

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

            <span class="expand"><?php echo __('Events Manager - Event spaces','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[em_event_spaces]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Event spaces: %s',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[em_event_spaces]',
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
                'parent' => $input_name.'[em_event_spaces]',
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
                'parent' => $input_name.'[em_event_spaces]',
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
                'parent' => $input_name.'[em_event_spaces]',
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
                'parent' => $input_name.'[em_event_spaces]',
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
                'parent' => $input_name.'[em_event_spaces]',
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



add_action('post_grid_layout_element_em_event_spaces', 'post_grid_layout_element_em_event_spaces');

function post_grid_layout_element_em_event_spaces($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';

    $event_spaces = get_post_meta($post_id,'_event_spaces', true);

    if(!empty($event_spaces)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> em_event_spaces ">
            <?php echo sprintf($wrapper_html, $event_spaces); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_em_event_spaces', 'post_grid_layout_element_css_em_event_spaces', 10);
function post_grid_layout_element_css_em_event_spaces($args){


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


add_action('post_grid_layout_element_option_em_event_rsvp_spaces','post_grid_layout_element_option_em_event_rsvp_spaces');
function post_grid_layout_element_option_em_event_rsvp_spaces($parameters){

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

            <span class="expand"><?php echo __('Events Manager - Event max spaces','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[em_event_rsvp_spaces]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Max Spaces: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[em_event_rsvp_spaces]',
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
                'parent' => $input_name.'[em_event_rsvp_spaces]',
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
                'parent' => $input_name.'[em_event_rsvp_spaces]',
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
                'parent' => $input_name.'[em_event_rsvp_spaces]',
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
                'parent' => $input_name.'[em_event_rsvp_spaces]',
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
                'parent' => $input_name.'[em_event_rsvp_spaces]',
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



add_action('post_grid_layout_element_em_event_rsvp_spaces', 'post_grid_layout_element_em_event_rsvp_spaces');

function post_grid_layout_element_em_event_rsvp_spaces($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'Y-m-d';


    $event_rsvp_spaces = get_post_meta($post_id,'_event_rsvp_spaces', true);

    if(!empty($event_rsvp_spaces)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> em_event_rsvp_spaces ">
            <?php echo sprintf($wrapper_html, $event_rsvp_spaces); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_em_event_rsvp_spaces', 'post_grid_layout_element_css_em_event_rsvp_spaces', 10);
function post_grid_layout_element_css_em_event_rsvp_spaces($args){


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






add_action('post_grid_layout_element_option_em_event_rsvp_date','post_grid_layout_element_option_em_event_rsvp_date');
function post_grid_layout_element_option_em_event_rsvp_date($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $date_format = isset($element_data['date_format']) ? $element_data['date_format'] : 'Y-m-d';

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

            <span class="expand"><?php echo __('Events Manager - Cut-Off date','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[em_event_rsvp_date]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>%s</code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Cut-Off date: %s',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'date_format',
                'css_id'		=> $element_index.'_date_format',
                'parent' => $input_name.'[em_event_rsvp_date]',
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
                'parent' => $input_name.'[em_event_rsvp_date]',
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
                'parent' => $input_name.'[em_event_rsvp_date]',
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
                'parent' => $input_name.'[em_event_rsvp_date]',
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
                'parent' => $input_name.'[em_event_rsvp_date]',
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
                'parent' => $input_name.'[em_event_rsvp_date]',
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
                'parent' => $input_name.'[em_event_rsvp_date]',
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



add_action('post_grid_layout_element_em_event_rsvp_date', 'post_grid_layout_element_em_event_rsvp_date');

function post_grid_layout_element_em_event_rsvp_date($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'Y-m-d';


    $event_rsvp_date = get_post_meta($post_id,'_event_rsvp_date', true);

    $event_rsvp_date_obj = new DateTime($event_rsvp_date);
    $event_rsvp_date_formatted = $event_rsvp_date_obj->format($date_format);

    if(!empty($event_rsvp_date_formatted)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> em_event_rsvp_date ">
            <?php echo sprintf($wrapper_html, $event_rsvp_date_formatted); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_em_event_rsvp_date', 'post_grid_layout_element_css_em_event_rsvp_date', 10);
function post_grid_layout_element_css_em_event_rsvp_date($args){


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





add_action('post_grid_layout_element_option_em_event_rsvp_time','post_grid_layout_element_option_em_event_rsvp_time');
function post_grid_layout_element_option_em_event_rsvp_time($parameters){

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

            <span class="expand"><?php echo __('Events Manager - Cut-Off time','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[em_event_rsvp_time]',
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
                'parent' => $input_name.'[em_event_rsvp_time]',
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
                'parent' => $input_name.'[em_event_rsvp_time]',
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
                'parent' => $input_name.'[em_event_rsvp_time]',
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
                'parent' => $input_name.'[em_event_rsvp_time]',
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
                'parent' => $input_name.'[em_event_rsvp_time]',
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
                'parent' => $input_name.'[em_event_rsvp_time]',
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
                'parent' => $input_name.'[em_event_rsvp_time]',
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



add_action('post_grid_layout_element_em_event_rsvp_time', 'post_grid_layout_element_em_event_rsvp_time');

function post_grid_layout_element_em_event_rsvp_time($args){

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
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> em_event_rsvp_time ">
            <?php echo sprintf($wrapper_html, $event_rsvp_time_formatted); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_em_event_rsvp_time', 'post_grid_layout_element_css_em_event_rsvp_time', 10);
function post_grid_layout_element_css_em_event_rsvp_time($args){


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
