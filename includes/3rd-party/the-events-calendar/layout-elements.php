<?php
if ( ! defined('ABSPATH')) exit;  // if direct access

add_filter('post_grid_layout_elements','post_grid_pro_tec_layout_elements');

function post_grid_pro_tec_layout_elements($elements_group){

    $elements_group['tec'] = array(
        'group_title'=>'The Events Calendar',
        'items'=>array(
            'tec_event_cat'=>array('name' =>__('Event categories','post-grid')),
            'tec_event_tag'=>array('name' =>__('Event tags','post-grid')),
            'tec_EventStartDate'=>array('name' =>__('Event start date','post-grid')),
            'tec_EventEndDate'=>array('name' =>__('Event end date','post-grid')),
            'tec_EventURL'=>array('name' =>__('Event URL','post-grid')),
            'tec_EventCost'=>array('name' =>__('Event cost','post-grid')),
            'tec_venue_address'=>array('name' =>__('Venue address','post-grid')),
            'tec_venue_city'=>array('name' =>__('Venue city','post-grid')),
            'tec_venue_country'=>array('name' =>__('Venue country','post-grid')),

            'tec_venue_province'=>array('name' =>__('Venue province','post-grid')),
            'tec_venue_zip'=>array('name' =>__('Venue zip','post-grid')),
            'tec_venue_phone'=>array('name' =>__('Venue phone','post-grid')),
            'tec_venue_url'=>array('name' =>__('Venue URL','post-grid')),
            'tec_venue_map'=>array('name' =>__('Venue Map','post-grid')),
            'tec_organizer_phone'=>array('name' =>__('Organizer Phone','post-grid')),
            'tec_organizer_website'=>array('name' =>__('Organizer Website','post-grid')),
            'tec_organizer_email'=>array('name' =>__('Organizer Email','post-grid')),


        ),
    );

    return $elements_group;
}


add_action('post_grid_layout_element_option_tec_event_cat','post_grid_layout_element_option_tec_event_cat');
function post_grid_layout_element_option_tec_event_cat($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Categories','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'max_count',
                'parent' => $input_name.'[tec_event_cat]',
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
                'parent' => $input_name.'[tec_event_cat]',
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
                'parent' => $input_name.'[tec_event_cat]',
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
                'parent' => $input_name.'[tec_event_cat]',
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
                'parent' => $input_name.'[tec_event_cat]',
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
                'parent' => $input_name.'[tec_event_cat]',
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
                'parent' => $input_name.'[tec_event_cat]',
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
                'parent' => $input_name.'[tec_event_cat]',
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
                'parent' => $input_name.'[tec_event_cat]',
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
                'parent' => $input_name.'[tec_event_cat]',
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



add_action('post_grid_layout_element_tec_event_cat', 'post_grid_layout_element_tec_event_cat');

function post_grid_layout_element_tec_event_cat($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $link_target = isset($element['link_target']) ? $element['link_target'] : '';
    $max_count = !empty($element['max_count']) ? (int) $element['max_count'] : 3;
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $separator = !empty($element['separator']) ? $element['separator'] : ', ';


    $term_list = wp_get_post_terms( $post_id, 'tribe_events_cat', array( 'fields' => 'all' ) );

    $tec_event_cat_html = '';
    $term_total_count = count($term_list);
    $max_term_limit = ($term_total_count < $max_count) ? $term_total_count : $max_count ;

    if(empty($term_list)) return;

    $i = 0;;
    foreach ($term_list as $term){
        if($i >= $max_count) continue;

        $term_id = isset($term->term_id) ? $term->term_id : '';
        $term_name = isset($term->name) ? $term->name : '';
        $term_link = get_term_link($term_id);

        $tec_event_cat_html .= '<a target="'.esc_attr($link_target).'" href="'.esc_url_raw($term_link).'">'.esc_html($term_name).'</a>';
        if( $i+1 < $max_term_limit){ $tec_event_cat_html .= $separator;}

        $i++;
    }

    //var_dump($tec_event_cat_html);

    ?>
    <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_event_cat ">
        <?php echo sprintf($wrapper_html, $tec_event_cat_html); ?>
    </div>
    <?php
}


add_action('post_grid_layout_element_css_tec_event_cat', 'post_grid_layout_element_css_tec_event_cat', 10);
function post_grid_layout_element_css_tec_event_cat($args){


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


add_action('post_grid_layout_element_option_tec_event_tag','post_grid_layout_element_option_tec_event_tag');
function post_grid_layout_element_option_tec_event_tag($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Tags','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'max_count',
                'parent' => $input_name.'[tec_event_tag]',
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
                'parent' => $input_name.'[tec_event_tag]',
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
                'parent' => $input_name.'[tec_event_tag]',
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
                'parent' => $input_name.'[tec_event_tag]',
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
                'parent' => $input_name.'[tec_event_tag]',
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
                'parent' => $input_name.'[tec_event_tag]',
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
                'parent' => $input_name.'[tec_event_tag]',
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
                'parent' => $input_name.'[tec_event_tag]',
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
                'parent' => $input_name.'[tec_event_tag]',
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
                'parent' => $input_name.'[tec_event_tag]',
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



add_action('post_grid_layout_element_tec_event_tag', 'post_grid_layout_element_tec_event_tag');

function post_grid_layout_element_tec_event_tag($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $link_target = isset($element['link_target']) ? $element['link_target'] : '';
    $max_count = !empty($element['max_count']) ? (int) $element['max_count'] : 3;
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $separator = !empty($element['separator']) ? $element['separator'] : ', ';


    $term_list = wp_get_post_terms( $post_id, 'post_tag', array( 'fields' => 'all' ) );

    $tec_event_tag_html = '';
    $term_total_count = count($term_list);
    $max_term_limit = ($term_total_count < $max_count) ? $term_total_count : $max_count ;

    if(empty($term_list)) return;

    $i = 0;;
    foreach ($term_list as $term){
        if($i >= $max_count) continue;

        $term_id = isset($term->term_id) ? $term->term_id : '';
        $term_name = isset($term->name) ? $term->name : '';
        $term_link = get_term_link($term_id);

        $tec_event_tag_html .= '<a target="'.esc_attr($link_target).'" href="'.esc_url_raw($term_link).'">'.esc_html($term_name).'</a>';
        if( $i+1 < $max_term_limit){ $tec_event_tag_html .= $separator;}

        $i++;
    }

    //var_dump($tec_event_tag_html);

    ?>
    <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_event_tag ">
        <?php echo sprintf($wrapper_html, $tec_event_tag_html); ?>
    </div>
    <?php
}


add_action('post_grid_layout_element_css_tec_event_tag', 'post_grid_layout_element_css_tec_event_tag', 10);
function post_grid_layout_element_css_tec_event_tag($args){


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






add_action('post_grid_layout_element_option_tec_EventStartDate','post_grid_layout_element_option_tec_EventStartDate');
function post_grid_layout_element_option_tec_EventStartDate($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Event Start Date','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_EventStartDate]',
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
                'parent' => $input_name.'[tec_EventStartDate]',
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
                'parent' => $input_name.'[tec_EventStartDate]',
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
                'parent' => $input_name.'[tec_EventStartDate]',
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
                'parent' => $input_name.'[tec_EventStartDate]',
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
                'parent' => $input_name.'[tec_EventStartDate]',
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
                'parent' => $input_name.'[tec_EventStartDate]',
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
                'parent' => $input_name.'[tec_EventStartDate]',
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



add_action('post_grid_layout_element_tec_EventStartDate', 'post_grid_layout_element_tec_EventStartDate');

function post_grid_layout_element_tec_EventStartDate($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'Y-m-d';


    $EventStartDate = get_post_meta($post_id,'_EventStartDate', true);

    $EventStartDate_obj = new DateTime($EventStartDate);
    $EventStartDate_formatted = $EventStartDate_obj->format($date_format);

    if(!empty($EventStartDate_formatted)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_EventStartDate ">
            <?php echo sprintf($wrapper_html, $EventStartDate_formatted); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_EventStartDate', 'post_grid_layout_element_css_tec_EventStartDate', 10);
function post_grid_layout_element_css_tec_EventStartDate($args){


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





add_action('post_grid_layout_element_option_tec_EventEndDate','post_grid_layout_element_option_tec_EventEndDate');
function post_grid_layout_element_option_tec_EventEndDate($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Event End Date','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_EventEndDate]',
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
                'parent' => $input_name.'[tec_EventEndDate]',
                'title'		=> __('Date format','post-grid'),
                'details'	=> __('Write date format, use <code>Y-m-d</code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $date_format,
                'default'		=> '',
                'placeholder'		=> 'Y-m-d',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_EventEndDate]',
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
                'parent' => $input_name.'[tec_EventEndDate]',
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
                'parent' => $input_name.'[tec_EventEndDate]',
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
                'parent' => $input_name.'[tec_EventEndDate]',
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
                'parent' => $input_name.'[tec_EventEndDate]',
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
                'parent' => $input_name.'[tec_EventEndDate]',
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



add_action('post_grid_layout_element_tec_EventEndDate', 'post_grid_layout_element_tec_EventEndDate');

function post_grid_layout_element_tec_EventEndDate($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';
    $date_format = !empty($element['date_format']) ? $element['date_format'] : 'Y-m-d';


    $EventStartDate = get_post_meta($post_id,'_EventEndDate', true);

    $EventStartDate_obj = new DateTime($EventStartDate);
    $EventStartDate_formatted = $EventStartDate_obj->format($date_format);

    if(!empty($EventStartDate_formatted)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_EventEndDate ">
            <?php echo sprintf($wrapper_html, $EventStartDate_formatted); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_EventEndDate', 'post_grid_layout_element_css_tec_EventEndDate', 10);
function post_grid_layout_element_css_tec_EventEndDate($args){


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




add_action('post_grid_layout_element_option_tec_EventURL','post_grid_layout_element_option_tec_EventURL');
function post_grid_layout_element_option_tec_EventURL($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Event URL','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_EventURL]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>Go to event: &lt;a href="%s">Event URL&lt;/a> </code> to replace category output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'URL: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_EventURL]',
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
                'parent' => $input_name.'[tec_EventURL]',
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
                'parent' => $input_name.'[tec_EventURL]',
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
                'parent' => $input_name.'[tec_EventURL]',
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
                'parent' => $input_name.'[tec_EventURL]',
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
                'parent' => $input_name.'[tec_EventURL]',
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



add_action('post_grid_layout_element_tec_EventURL', 'post_grid_layout_element_tec_EventURL');

function post_grid_layout_element_tec_EventURL($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';


    $_EventURL = get_post_meta($post_id,'_EventURL', true);


    if(!empty($_EventURL)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_EventURL ">
            <?php echo sprintf($wrapper_html, $_EventURL); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_EventURL', 'post_grid_layout_element_css_tec_EventURL', 10);
function post_grid_layout_element_css_tec_EventURL($args){


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

        .layout-<?php echo $layout_id; ?> .element_<?php echo $index; ?> a{
        <?php if(!empty($text_color)): ?>
            color: <?php echo $text_color; ?>;
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



add_action('post_grid_layout_element_option_tec_EventCost','post_grid_layout_element_option_tec_EventCost');
function post_grid_layout_element_option_tec_EventCost($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Event Cost','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_EventCost]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>Cost: %s  </code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Cost: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_EventCost]',
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
                'parent' => $input_name.'[tec_EventCost]',
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
                'parent' => $input_name.'[tec_EventCost]',
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
                'parent' => $input_name.'[tec_EventCost]',
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
                'parent' => $input_name.'[tec_EventCost]',
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
                'parent' => $input_name.'[tec_EventCost]',
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



add_action('post_grid_layout_element_tec_EventCost', 'post_grid_layout_element_tec_EventCost');

function post_grid_layout_element_tec_EventCost($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';


    $EventCost = tribe_get_formatted_cost($post_id);


    if(!empty($EventCost)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_EventCost ">
            <?php echo sprintf($wrapper_html, $EventCost); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_EventCost', 'post_grid_layout_element_css_tec_EventCost', 10);
function post_grid_layout_element_css_tec_EventCost($args){


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





add_action('post_grid_layout_element_option_tec_venue_address','post_grid_layout_element_option_tec_venue_address');
function post_grid_layout_element_option_tec_venue_address($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Venue address','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_venue_address]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>Address: %s  </code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Address: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_venue_address]',
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
                'parent' => $input_name.'[tec_venue_address]',
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
                'parent' => $input_name.'[tec_venue_address]',
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
                'parent' => $input_name.'[tec_venue_address]',
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
                'parent' => $input_name.'[tec_venue_address]',
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
                'parent' => $input_name.'[tec_venue_address]',
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



add_action('post_grid_layout_element_tec_venue_address', 'post_grid_layout_element_tec_venue_address');

function post_grid_layout_element_tec_venue_address($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';


    $venue_address = tribe_get_address($post_id);


    if(!empty($venue_address)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_venue_address ">
            <?php echo sprintf($wrapper_html, $venue_address); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_venue_address', 'post_grid_layout_element_css_tec_venue_address', 10);
function post_grid_layout_element_css_tec_venue_address($args){


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




add_action('post_grid_layout_element_option_tec_venue_city','post_grid_layout_element_option_tec_venue_city');
function post_grid_layout_element_option_tec_venue_city($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Venue city','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_venue_city]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>City: %s  </code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'City: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_venue_city]',
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
                'parent' => $input_name.'[tec_venue_city]',
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
                'parent' => $input_name.'[tec_venue_city]',
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
                'parent' => $input_name.'[tec_venue_city]',
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
                'parent' => $input_name.'[tec_venue_city]',
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
                'parent' => $input_name.'[tec_venue_city]',
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



add_action('post_grid_layout_element_tec_venue_city', 'post_grid_layout_element_tec_venue_city');

function post_grid_layout_element_tec_venue_city($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';


    $venue_city = tribe_get_city($post_id);


    if(!empty($venue_city)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_venue_city ">
            <?php echo sprintf($wrapper_html, $venue_city); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_venue_city', 'post_grid_layout_element_css_tec_venue_city', 10);
function post_grid_layout_element_css_tec_venue_city($args){


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



add_action('post_grid_layout_element_option_tec_venue_country','post_grid_layout_element_option_tec_venue_country');
function post_grid_layout_element_option_tec_venue_country($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Venue country','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_venue_country]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>Country: %s  </code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Country: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_venue_country]',
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
                'parent' => $input_name.'[tec_venue_country]',
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
                'parent' => $input_name.'[tec_venue_country]',
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
                'parent' => $input_name.'[tec_venue_country]',
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
                'parent' => $input_name.'[tec_venue_country]',
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
                'parent' => $input_name.'[tec_venue_country]',
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



add_action('post_grid_layout_element_tec_venue_country', 'post_grid_layout_element_tec_venue_country');

function post_grid_layout_element_tec_venue_country($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';


    $venue_country = tribe_get_country($post_id);


    if(!empty($venue_country)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_venue_country ">
            <?php echo sprintf($wrapper_html, $venue_country); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_venue_country', 'post_grid_layout_element_css_tec_venue_country', 10);
function post_grid_layout_element_css_tec_venue_country($args){


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



add_action('post_grid_layout_element_option_tec_venue_province','post_grid_layout_element_option_tec_venue_province');
function post_grid_layout_element_option_tec_venue_province($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Venue province','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_venue_province]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>Province: %s  </code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Province: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_venue_province]',
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
                'parent' => $input_name.'[tec_venue_province]',
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
                'parent' => $input_name.'[tec_venue_province]',
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
                'parent' => $input_name.'[tec_venue_province]',
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
                'parent' => $input_name.'[tec_venue_province]',
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
                'parent' => $input_name.'[tec_venue_province]',
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



add_action('post_grid_layout_element_tec_venue_province', 'post_grid_layout_element_tec_venue_province');

function post_grid_layout_element_tec_venue_province($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';


    $venue_province = tribe_get_province($post_id);


    if(!empty($venue_province)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_venue_province ">
            <?php echo sprintf($wrapper_html, $venue_province); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_venue_province', 'post_grid_layout_element_css_tec_venue_province', 10);
function post_grid_layout_element_css_tec_venue_province($args){


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




add_action('post_grid_layout_element_option_tec_venue_zip','post_grid_layout_element_option_tec_venue_zip');
function post_grid_layout_element_option_tec_venue_zip($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Venue zip','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_venue_zip]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>Zip: %s  </code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Zip: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_venue_zip]',
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
                'parent' => $input_name.'[tec_venue_zip]',
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
                'parent' => $input_name.'[tec_venue_zip]',
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
                'parent' => $input_name.'[tec_venue_zip]',
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
                'parent' => $input_name.'[tec_venue_zip]',
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
                'parent' => $input_name.'[tec_venue_zip]',
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



add_action('post_grid_layout_element_tec_venue_zip', 'post_grid_layout_element_tec_venue_zip');

function post_grid_layout_element_tec_venue_zip($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';


    $venue_zip = tribe_get_zip($post_id);


    if(!empty($venue_zip)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_venue_zip ">
            <?php echo sprintf($wrapper_html, $venue_zip); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_venue_zip', 'post_grid_layout_element_css_tec_venue_zip', 10);
function post_grid_layout_element_css_tec_venue_zip($args){


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




add_action('post_grid_layout_element_option_tec_venue_phone','post_grid_layout_element_option_tec_venue_phone');
function post_grid_layout_element_option_tec_venue_phone($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Venue phone','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_venue_phone]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>Phone: %s  </code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Phone: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_venue_phone]',
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
                'parent' => $input_name.'[tec_venue_phone]',
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
                'parent' => $input_name.'[tec_venue_phone]',
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
                'parent' => $input_name.'[tec_venue_phone]',
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
                'parent' => $input_name.'[tec_venue_phone]',
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
                'parent' => $input_name.'[tec_venue_phone]',
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



add_action('post_grid_layout_element_tec_venue_phone', 'post_grid_layout_element_tec_venue_phone');

function post_grid_layout_element_tec_venue_phone($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';


    $venue_phone = tribe_get_phone($post_id);


    if(!empty($venue_phone)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_venue_phone ">
            <?php echo sprintf($wrapper_html, $venue_phone); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_venue_phone', 'post_grid_layout_element_css_tec_venue_phone', 10);
function post_grid_layout_element_css_tec_venue_phone($args){


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



add_action('post_grid_layout_element_option_tec_venue_url','post_grid_layout_element_option_tec_venue_url');
function post_grid_layout_element_option_tec_venue_url($parameters){

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

            <span class="expand"><?php echo __('The Events Calendar - Venue url','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php


            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_venue_url]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html, use <code>Venue URL: %s  </code> to replace output.','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Venue URL: %s',
            );

            $settings_tabs_field->generate_field($args);



            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_venue_url]',
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
                'parent' => $input_name.'[tec_venue_url]',
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
                'parent' => $input_name.'[tec_venue_url]',
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
                'parent' => $input_name.'[tec_venue_url]',
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
                'parent' => $input_name.'[tec_venue_url]',
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
                'parent' => $input_name.'[tec_venue_url]',
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



add_action('post_grid_layout_element_tec_venue_url', 'post_grid_layout_element_tec_venue_url');

function post_grid_layout_element_tec_venue_url($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';


//    $VenueID = get_post_meta($post_id,'_EventVenueID', true);
//    $venue_url = get_post_meta($VenueID,'_VenueURL', true);

    $venue_website_url = tribe_get_venue_website_url($post_id);


    if(!empty($venue_phone)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_venue_url ">
            <?php echo sprintf($wrapper_html, $venue_website_url); ?>
        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_venue_url', 'post_grid_layout_element_css_tec_venue_url', 10);
function post_grid_layout_element_css_tec_venue_url($args){


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



add_action('post_grid_layout_element_option_tec_venue_map','post_grid_layout_element_option_tec_venue_map');
function post_grid_layout_element_option_tec_venue_map($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';

    $font_size = isset($element_data['font_size']) ? $element_data['font_size'] : '';
    $font_family = isset($element_data['font_family']) ? $element_data['font_family'] : '';
    $wrapper_html = isset($element_data['wrapper_html']) ? $element_data['wrapper_html'] : '';
    $wrapper_margin = isset($element_data['wrapper_margin']) ? $element_data['wrapper_margin'] : '';
    $text_color = isset($element_data['text_color']) ? $element_data['text_color'] : '';
    $api_key = isset($element_data['api_key']) ? $element_data['api_key'] : '';

    $text_align = isset($element_data['text_align']) ? $element_data['text_align'] : '';

    $css = isset($element_data['css']) ? $element_data['css'] : '';
    $css_hover = isset($element_data['css_hover']) ? $element_data['css_hover'] : '';


    ?>
    <div class="item">
        <div class="element-title header ">
            <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fas fa-times"></i></span>
            <span class="sort"><i class="fas fa-sort"></i></span>

            <span class="expand"><?php echo __('The Events Calendar - Venue map','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'map_type',
                'css_id'		=> $element_index.'_map_type',
                'parent' => $input_name.'[tec_venue_map]',
                'title'		=> __('Map type','post-grid'),
                'details'	=> __('Choose map type.','post-grid'),
                'type'		=> 'select',
                'value'		=> $text_align,
                'default'		=> 'dynamic',
                'args'		=> array('dynamic'=> __('Dynamic', 'post-grid'),'static'=> __('Static', 'post-grid'),'link'=> __('Link', 'post-grid') ),
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'api_key',
                'css_id'		=> $element_index.'_api_key',
                'parent' => $input_name.'[tec_venue_map]',
                'title'		=> __('Map api key','post-grid'),
                'details'	=> __('Write api key.','post-grid'),
                'type'		=> 'text',
                'value'		=> $api_key,
                'default'		=> '',
                'placeholder'		=> '',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_venue_map]',
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
                'parent' => $input_name.'[tec_venue_map]',
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
                'parent' => $input_name.'[tec_venue_map]',
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
                'parent' => $input_name.'[tec_venue_map]',
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
                'parent' => $input_name.'[tec_venue_map]',
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
                'parent' => $input_name.'[tec_venue_map]',
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



add_action('post_grid_layout_element_tec_venue_map', 'post_grid_layout_element_tec_venue_map');

function post_grid_layout_element_tec_venue_map($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $map_type = !empty($element['map_type']) ? $element['map_type'] : 'dynamic';
    $api_key = !empty($element['api_key']) ? $element['api_key'] : '';
    $map_size = !empty($element['map_size']) ? $element['map_size'] : '';
    $map_link_text = '';

    $venue_address = tribe_get_address($post_id);
    $tribe_get_map_link = tribe_get_map_link($post_id);
    $venue_city = tribe_get_city($post_id);
    $venue_country = tribe_get_country($post_id);


    if(!empty($venue_address)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_venue_map ">
            <?php

            if($map_type=='dynamic'):
                ?>
                <iframe src="https://www.google.com/maps/embed/v1/place?key=<?php echo $api_key; ?>&q=<?php echo $venue_address; ?>, <?php echo $venue_city; ?>,<?php echo $venue_country; ?>"></iframe>
            <?php

            elseif ($map_type=='static'):

                ?>
                <img src="https://maps.googleapis.com/maps/api/staticmap?center=<?php echo $venue_address; ?>, <?php echo $venue_city; ?>,<?php echo $venue_country; ?>&zoom=13&size=400x400&key=<?php echo $api_key; ?>&size=<?php echo $map_size; ?>"/>
            <?php

            elseif ($map_type=='link'):
                ?>
                <a href="<?php echo $tribe_get_map_link; ?>"><?php echo $map_link_text; ?></a>
            <?php


            endif;

            ?>        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_venue_map', 'post_grid_layout_element_css_tec_venue_map', 10);
function post_grid_layout_element_css_tec_venue_map($args){


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



add_action('post_grid_layout_element_option_tec_organizer_phone','post_grid_layout_element_option_tec_organizer_phone');
function post_grid_layout_element_option_tec_organizer_phone($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';
    $separator = isset($element_data['separator']) ? $element_data['separator'] : '';

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

            <span class="expand"><?php echo __('The Events Calendar - organizer phone','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_organizer_phone]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html. ex: <code>Phone: %s</code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Phone: %s ',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'separator',
                'css_id'		=> $element_index.'_separator',
                'parent' => $input_name.'[tec_organizer_phone]',
                'title'		=> __('Separator','post-grid'),
                'details'	=> __('Write separator.','post-grid'),
                'type'		=> 'text',
                'value'		=> $separator,
                'default'		=> '',
                'placeholder'		=> ', ',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_organizer_phone]',
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
                'parent' => $input_name.'[tec_organizer_phone]',
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
                'parent' => $input_name.'[tec_organizer_phone]',
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
                'parent' => $input_name.'[tec_organizer_phone]',
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
                'parent' => $input_name.'[tec_organizer_phone]',
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
                'parent' => $input_name.'[tec_organizer_phone]',
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



add_action('post_grid_layout_element_tec_organizer_phone', 'post_grid_layout_element_tec_organizer_phone');

function post_grid_layout_element_tec_organizer_phone($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $separator = isset($element['separator']) ? $element['separator'] : '';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';


    $organizer_ids = tribe_get_organizer_ids($post_id);


    if(!empty($organizer_ids)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_organizer_phone ">

            <?php


            $phone_html = '';
            if(!empty($organizer_ids)):

                $organizer_count = count($organizer_ids);
                $count = 1;

                foreach ($organizer_ids as $organizer_id):
                    $phone = tribe_get_organizer_phone( $organizer_id );
                    //$email = tribe_get_organizer_email( $organizer_id );
                    //$website = tribe_get_organizer_website_link( $organizer_id );


                    $phone_html.= '<a href="tel:'.$phone.'">'.$phone.'</a>';


                    if($count<$organizer_count){
                        $phone_html.= $separator;
                    }

                    $count++;
                endforeach;

            endif;

            ?>
            <?php echo sprintf($wrapper_html, $phone_html); ?>

        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_organizer_phone', 'post_grid_layout_element_css_tec_organizer_phone', 10);
function post_grid_layout_element_css_tec_organizer_phone($args){


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



add_action('post_grid_layout_element_option_tec_organizer_email','post_grid_layout_element_option_tec_organizer_email');
function post_grid_layout_element_option_tec_organizer_email($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';
    $separator = isset($element_data['separator']) ? $element_data['separator'] : '';

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

            <span class="expand"><?php echo __('The Events Calendar - organizer email','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_organizer_email]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html. ex: <code>Email: %s</code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Phone: %s ',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'separator',
                'css_id'		=> $element_index.'_separator',
                'parent' => $input_name.'[tec_organizer_email]',
                'title'		=> __('Separator','post-grid'),
                'details'	=> __('Write separator.','post-grid'),
                'type'		=> 'text',
                'value'		=> $separator,
                'default'		=> '',
                'placeholder'		=> ', ',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_organizer_email]',
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
                'parent' => $input_name.'[tec_organizer_email]',
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
                'parent' => $input_name.'[tec_organizer_email]',
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
                'parent' => $input_name.'[tec_organizer_email]',
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
                'parent' => $input_name.'[tec_organizer_email]',
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
                'parent' => $input_name.'[tec_organizer_email]',
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



add_action('post_grid_layout_element_tec_organizer_email', 'post_grid_layout_element_tec_organizer_email');

function post_grid_layout_element_tec_organizer_email($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $separator = isset($element['separator']) ? $element['separator'] : ', ';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';


    $organizer_ids = tribe_get_organizer_ids($post_id);


    if(!empty($organizer_ids)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_organizer_email ">

            <?php


            $phone_html = '';
            if(!empty($organizer_ids)):

                $organizer_count = count($organizer_ids);
                $count = 1;

                foreach ($organizer_ids as $organizer_id):
                    $phone = tribe_get_organizer_email( $organizer_id );
                    //$email = tribe_get_organizer_email( $organizer_id );
                    //$website = tribe_get_organizer_website_link( $organizer_id );


                    $phone_html.= '<a href="mailto:'.$phone.'">'.$phone.'</a>';


                    if($count<$organizer_count){
                        $phone_html.= $separator;
                    }

                    $count++;
                endforeach;

            endif;

            ?>
            <?php echo sprintf($wrapper_html, $phone_html); ?>

        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_organizer_email', 'post_grid_layout_element_css_tec_organizer_email', 10);
function post_grid_layout_element_css_tec_organizer_email($args){


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



add_action('post_grid_layout_element_option_tec_organizer_website','post_grid_layout_element_option_tec_organizer_website');
function post_grid_layout_element_option_tec_organizer_website($parameters){

    $settings_tabs_field = new settings_tabs_field();

    $input_name = isset($parameters['input_name']) ? $parameters['input_name'] : '{input_name}';
    $element_data = isset($parameters['element_data']) ? $parameters['element_data'] : array();
    $element_index = isset($parameters['index']) ? $parameters['index'] : '';
    $separator = isset($element_data['separator']) ? $element_data['separator'] : '';

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

            <span class="expand"><?php echo __('The Events Calendar - organizer website','post-grid'); ?></span>
        </div>
        <div class="element-options options">

            <?php

            $args = array(
                'id'		=> 'wrapper_html',
                'css_id'		=> $element_index.'_wrapper_html',
                'parent' => $input_name.'[tec_organizer_website]',
                'title'		=> __('Wrapper html','post-grid'),
                'details'	=> __('Write wrapper html. ex: <code>Website: %s</code>','post-grid'),
                'type'		=> 'text',
                'value'		=> $wrapper_html,
                'default'		=> '',
                'placeholder'		=> 'Website: %s ',
            );

            $settings_tabs_field->generate_field($args);

            $args = array(
                'id'		=> 'separator',
                'css_id'		=> $element_index.'_separator',
                'parent' => $input_name.'[tec_organizer_website]',
                'title'		=> __('Separator','post-grid'),
                'details'	=> __('Write separator.','post-grid'),
                'type'		=> 'text',
                'value'		=> $separator,
                'default'		=> '',
                'placeholder'		=> ', ',
            );

            $settings_tabs_field->generate_field($args);


            $args = array(
                'id'		=> 'wrapper_margin',
                'css_id'		=> $element_index.'_margin',
                'parent' => $input_name.'[tec_organizer_website]',
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
                'parent' => $input_name.'[tec_organizer_website]',
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
                'parent' => $input_name.'[tec_organizer_website]',
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
                'parent' => $input_name.'[tec_organizer_website]',
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
                'parent' => $input_name.'[tec_organizer_website]',
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
                'parent' => $input_name.'[tec_organizer_website]',
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



add_action('post_grid_layout_element_tec_organizer_website', 'post_grid_layout_element_tec_organizer_website');

function post_grid_layout_element_tec_organizer_website($args){

    $element  = isset($args['element']) ? $args['element'] : array();
    $elementIndex  = isset($args['index']) ? $args['index'] : '';
    $post_id = isset($args['post_id']) ? $args['post_id'] : '';

    if(empty($post_id)) return;

    $custom_class = isset($element['custom_class']) ? $element['custom_class'] : '';
    $separator = isset($element['separator']) ? $element['separator'] : ', ';
    $wrapper_html = !empty($element['wrapper_html']) ? $element['wrapper_html'] : '%s';


    $organizer_ids = tribe_get_organizer_ids($post_id);


    if(!empty($organizer_ids)):
        ?>
        <div class="element element_<?php echo esc_attr($elementIndex); ?> <?php echo esc_attr($custom_class); ?> tec_organizer_website ">

            <?php


            $website_link_html = '';
            if(!empty($organizer_ids)):

                $organizer_count = count($organizer_ids);
                $count = 1;

                foreach ($organizer_ids as $organizer_id):
                    $website_link = tribe_get_organizer_website_link( $organizer_id );

                    $website_link_html .= $website_link;


                    if($count<$organizer_count){
                        $website_link_html.= $separator;
                    }

                    $count++;
                endforeach;

            endif;

            ?>
            <?php echo sprintf($wrapper_html, $website_link_html); ?>

        </div>
    <?php
    endif;
}


add_action('post_grid_layout_element_css_tec_organizer_website', 'post_grid_layout_element_css_tec_organizer_website', 10);
function post_grid_layout_element_css_tec_organizer_website($args){


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







