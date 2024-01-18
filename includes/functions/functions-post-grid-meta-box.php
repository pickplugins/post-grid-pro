<?php
if (!defined('ABSPATH')) exit;  // if direct access

add_filter('post_grid_view_types', 'post_grid_pro_view_types');

function post_grid_pro_view_types($view_types)
{


    $view_types['filterable'] = array('name' => 'Filterable',   'thumb' => post_grid_plugin_url . 'assets/images/filterable.png',);
    $view_types['glossary'] = array('name' => 'Glossary',  'thumb' => post_grid_plugin_url . 'assets/images/glossary.png',);
    $view_types['slider'] = array('name' => 'Carousel',   'thumb' => post_grid_plugin_url . 'assets/images/carousel.png',);




    return $view_types;
}



add_filter('post_grid_pagination_types', 'post_grid_pro_pagination_types');

function post_grid_pro_pagination_types($types)
{


    $types['ajax_pagination'] = __('Ajax Pagination', 'post-grid-pro');
    $types['next_previous'] = __('Next-Previous', 'post-grid-pro');
    $types['jquery'] = __('Filterable pagination', 'post-grid-pro');
    $types['loadmore'] = __('Load More', 'post-grid-pro');


    return $types;
}

add_filter('post_grid_metabox_tabs', 'post_grid_pro_metabox_tabs');

function post_grid_pro_metabox_tabs($tabs)
{

    global $post;
    $post_id = $post->ID;
    $post_grid_meta_options = get_post_meta($post_id, 'post_grid_meta_options', true);
    $grid_type =     $post_types = !empty($post_grid_meta_options['grid_type']) ? $post_grid_meta_options['grid_type'] : 'grid';
    $current_tab = isset($post_grid_meta_options['current_tab']) ? $post_grid_meta_options['current_tab'] : 'query_post';



    $tabs[] = array(
        'id' => 'filterable',
        'title' => sprintf(__('%s Filterable', 'post-grid'), '<i class="fas fa-server"></i>'),
        'priority' => 60,
        'active' => ($current_tab == 'filterable') ? true : false,
        'data_visible' => 'filterable',
        'hidden' => (($grid_type == 'grid') ? true : false) || (($grid_type == 'slider') ? true : false) || (($grid_type == 'glossary') ? true : false)  || (($grid_type == 'timeline') ? true : false) || (($grid_type == 'tiles') ? true : false) || (($grid_type == 'justified') ? true : false) || (($grid_type == 'masonry') ? true : false),
    );

    $tabs[] = array(
        'id' => 'slider',
        'title' => sprintf(__('%s Carousel', 'post-grid'), '<i class="fas fa-layer-group"></i>'),
        'priority' => 65,
        'active' => ($current_tab == 'slider') ? true : false,
        'data_visible' => 'slider',
        'hidden' => (($grid_type == 'grid') ? true : false)  || (($grid_type == 'glossary') ? true : false) || (($grid_type == 'filterable') ? true : false) || (($grid_type == 'timeline') ? true : false) || (($grid_type == 'tiles') ? true : false) || (($grid_type == 'justified') ? true : false) || (($grid_type == 'masonry') ? true : false),
    );

    $tabs[] = array(
        'id' => 'glossary',
        'title' => sprintf(__('%s Glossary', 'post-grid'), '<i class="fas fa-ellipsis-h"></i>'),
        'priority' => 70,
        'active' => ($current_tab == 'glossary') ? true : false,
        'data_visible' => 'glossary',
        'hidden' => (($grid_type == 'grid') ? true : false) || (($grid_type == 'slider') ? true : false) || (($grid_type == 'filterable') ? true : false) || (($grid_type == 'timeline') ? true : false) || (($grid_type == 'tiles') ? true : false) || (($grid_type == 'justified') ? true : false) || (($grid_type == 'masonry') ? true : false),
    );



    //    $tabs[] = array(
    //        'id' => 'timeline',
    //        'title' => sprintf(__('%s Timeline','post-grid'),'<i class="fas fa-hourglass-half"></i>'),
    //        'priority' => 80,
    //        'active' => ($current_tab == 'timeline') ? true : false,
    //        'data_visible' => 'timeline',
    //        'hidden' => ($grid_type == 'grid')? true : false || ($grid_type == 'slider')? true : false || ($grid_type == 'glossary')? true : false || ($grid_type == 'filterable')? true : false || ($grid_type == 'collapsible') ? true : false,
    //    );


    return $tabs;
}



add_action('post_grid_metabox_tabs_content_query_post', 'post_grid_pro_settings_tabs_content_query_post', 20, 2);

function post_grid_pro_settings_tabs_content_query_post($tab, $post_id)
{

    $settings_tabs_field = new settings_tabs_field();


    $post_grid_meta_options = get_post_meta($post_id, 'post_grid_meta_options', true);

    $meta_query = !empty($post_grid_meta_options['meta_query']) ? $post_grid_meta_options['meta_query'] : array();
    $meta_query_relation = !empty($post_grid_meta_options['meta_query_relation']) ? $post_grid_meta_options['meta_query_relation'] : 'OR';
    $extra_query_parameter = !empty($post_grid_meta_options['extra_query_parameter']) ? $post_grid_meta_options['extra_query_parameter'] : '';

    $permission_query = !empty($post_grid_meta_options['permission_query']) ? $post_grid_meta_options['permission_query'] : '';
    $ignore_archive = !empty($post_grid_meta_options['ignore_archive']) ? $post_grid_meta_options['ignore_archive'] : '';
    $sticky_post_query_type = !empty($post_grid_meta_options['sticky_post_query']['type']) ? $post_grid_meta_options['sticky_post_query']['type'] : 'none';
    $ignore_sticky_posts = !empty($post_grid_meta_options['sticky_post_query']['ignore_sticky_posts']) ? $post_grid_meta_options['sticky_post_query']['ignore_sticky_posts'] : 0;
    $date_query_type = !empty($post_grid_meta_options['date_query']['type']) ? $post_grid_meta_options['date_query']['type'] : 'none';

    $extact_date_year = !empty($post_grid_meta_options['date_query']['extact_date']['year']) ? $post_grid_meta_options['date_query']['extact_date']['year'] : '';
    $extact_date_month = !empty($post_grid_meta_options['date_query']['extact_date']['month']) ? $post_grid_meta_options['date_query']['extact_date']['month'] : '';
    $extact_date_day = !empty($post_grid_meta_options['date_query']['extact_date']['day']) ? $post_grid_meta_options['date_query']['extact_date']['day'] : '';
    $between_two_date_after_year = !empty($post_grid_meta_options['date_query']['between_two_date']['after']['year']) ? $post_grid_meta_options['date_query']['between_two_date']['after']['year'] : '';
    $between_two_date_after_month = !empty($post_grid_meta_options['date_query']['between_two_date']['after']['month']) ? $post_grid_meta_options['date_query']['between_two_date']['after']['month'] : '';
    $between_two_date_after_day = !empty($post_grid_meta_options['date_query']['between_two_date']['after']['day']) ? $post_grid_meta_options['date_query']['between_two_date']['after']['day'] : '';
    $between_two_date_before_year = !empty($post_grid_meta_options['date_query']['between_two_date']['before']['year']) ? $post_grid_meta_options['date_query']['between_two_date']['before']['year'] : '';
    $between_two_date_before_month = !empty($post_grid_meta_options['date_query']['between_two_date']['before']['month']) ? $post_grid_meta_options['date_query']['between_two_date']['before']['month'] : '';
    $between_two_date_before_day = !empty($post_grid_meta_options['date_query']['between_two_date']['before']['day']) ? $post_grid_meta_options['date_query']['between_two_date']['before']['day'] : '';
    $between_two_date_inclusive = !empty($post_grid_meta_options['date_query']['between_two_date']['inclusive']) ? $post_grid_meta_options['date_query']['between_two_date']['inclusive'] : 'true';


    $author_query_type = !empty($post_grid_meta_options['author_query']['type']) ? $post_grid_meta_options['author_query']['type'] : 'none';
    $author__in = !empty($post_grid_meta_options['author_query']['author__in']) ? $post_grid_meta_options['author_query']['author__in'] : '';

    $author__in_logged = !empty($post_grid_meta_options['author_query']['author__in_logged']) ? $post_grid_meta_options['author_query']['author__in_logged'] : '';

    $author__not_in = !empty($post_grid_meta_options['author_query']['author__not_in']) ? $post_grid_meta_options['author_query']['author__not_in'] : '';

    $password_query_type = !empty($post_grid_meta_options['password_query']['type']) ? $post_grid_meta_options['password_query']['type'] : 'none';
    $password_query_has_password = !empty($post_grid_meta_options['password_query']['has_password']) ? $post_grid_meta_options['password_query']['has_password'] : 'null';
    $password_query_post_password = !empty($post_grid_meta_options['password_query']['post_password']) ? $post_grid_meta_options['password_query']['post_password'] : '';


?>



    <div class="section">
        <div class="section-title">Advance Query</div>
        <p class="description section-description">Set the option for advance query settings.</p>



        <?php
        ob_start();
        ?>
        <script>
            jQuery(document).ready(function($) {

                $(document).on('click', '.add-meta-query', function(e) {
                    var arg_type = $(this).attr('arg_type');
                    var index = $.now();

                    var arg_single_html = '<div class="item">\n' +
                        '                <div class="header">\n' +
                        '                    <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fa fa-times"></i></span>\n' +
                        '                    <span class="move pg-tooltip" title="<?php echo __("Move", 'post-grid'); ?>"><i class="fa fa-bars"></i></span>\n' +
                        '                    <span class="expand">\n' +
                        '                     <i class="fas fa-expand"></i>\n' +
                        '                     <i class="fas fa-compress"></i>\n' +
                        '                      </span><span class="expand">Single Query</span>\n' +
                        '                </div>\n' +
                        '                <div class="options">\n' +
                        '                    <input type="hidden" name="post_grid_meta_options[meta_query][' + index + '][arg_type]" value="single" /><br>\n' +
                        '                    <?php echo __("Key", 'post-grid'); ?><br />\n' +
                        '                    <input type="text" name="post_grid_meta_options[meta_query][' + index + '][key]" value="" /><br>\n' +
                        '                    <?php echo __("Value", 'post-grid'); ?><br />\n' +
                        '                    <input type="text" name="post_grid_meta_options[meta_query][' + index + '][value]" value="" /><br>\n' +
                        '                    <?php echo __("Compare", 'post-grid'); ?><br />\n' +
                        '                    <input type="text" name="post_grid_meta_options[meta_query][' + index + '][compare]" value="" /><br>\n' +
                        '                    <?php echo __("Type", 'post-grid'); ?><br />\n' +
                        '                    <input type="text" name="post_grid_meta_options[meta_query][' + index + '][type]" value="" /><br>\n' +
                        '                </div>\n' +
                        '            </div>';


                    var arg_group_html = '<div class="item">\n' +
                        '                <div class="header">\n' +
                        '                    <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fa fa-times"></i></span>\n' +
                        '                    <span class="move pg-tooltip" title="<?php echo __("Move", 'post-grid'); ?>"><i class="fa fa-bars"></i></span>\n' +
                        '                    <span class="expand">\n' +
                        '                       <i class="fas fa-expand"></i>\n' +
                        '                        <i class="fas fa-compress"></i>\n' +
                        '                   </span><span class="expand">Group Query</span> \n' +
                        '                </div>\n' +
                        '                <div class="options">\n' +
                        '                    <input type="hidden" name="post_grid_meta_options[meta_query][' + index + '][arg_type]" value="group" />\n' +
                        '                           Relation: <label>\n' +
                        '                               <input checked type="radio" name="post_grid_meta_options[meta_query][' + index + '][relation]" value="OR" />OR\n' +
                        '                          </label>\n' +
                        '                           <label>\n' +
                        '                               <input type="radio" name="post_grid_meta_options[meta_query][' + index + '][relation]" value="AND" />AND\n' +
                        '                           </label><br>\n' +
                        '                    <div class="button add-meta-query-child " index="' + index + '"><?php _e("Add", 'post-grid'); ?></div><br><br>\n' +
                        '                    <div class="group-query-list group-query-list-' + index + ' expandable">\n' +
                        '                    </div>\n' +
                        '                </div>\n' +
                        '            </div>';


                    if (arg_type == 'single') {
                        $('.meta-query-list').append(arg_single_html);

                    } else if (arg_type == 'group') {
                        $('.meta-query-list').append(arg_group_html);
                    }

                })

                $(document).on('click', '.add-meta-query-child', function(e) {

                    var index = $(this).attr('index');
                    var child_index = $.now();
                    var arg_html = '<div><div><span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fa fa-times"></i></span><br><?php echo __("Key", 'post-grid'); ?><br />\n' +
                        '        <input type="text" name="post_grid_meta_options[meta_query][' + index + '][args][' + child_index + '][key]" value="" /><br>\n' +
                        '        <?php echo __("Value", 'post-grid'); ?><br />\n' +
                        '        <input type="text" name="post_grid_meta_options[meta_query][' + index + '][args][' + child_index + '][value]" value="" /><br>\n' +
                        '        <?php echo __("Compare", 'post-grid'); ?><br />\n' +
                        '        <input type="text" name="post_grid_meta_options[meta_query][' + index + '][args][' + child_index + '][compare]" value="" /><br>\n' +
                        '        <?php echo __("Type", 'post-grid'); ?><br />\n' +
                        '        <input type="text" name="post_grid_meta_options[meta_query][' + index + '][args][' + child_index + '][type]" value="" /><br><hr></div></div>';

                    $('.group-query-list-' + index).append(arg_html);
                })
            })
        </script>
        <div class="button add-meta-query" arg_type="single"><?php _e('Add Single', 'post-grid'); ?></div>
        <div class="button add-meta-query" arg_type="group"><?php _e('Add Group', 'post-grid'); ?></div>
        <br><br>
        <div class="meta-query-list expandable">

            <?php
            if (!empty($meta_query)) :
                foreach ($meta_query as  $meta_queryIndex => $meta_queryData) :
                    $arg_type = $meta_queryData['arg_type'];

                    if ($arg_type == 'single') :
            ?>
                        <div class="item">
                            <div class="header">
                                <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fa fa-times"></i></span>
                                <span class="move pg-tooltip" title="<?php echo __("Move", 'post-grid'); ?>"><i class="fa fa-bars"></i></span>
                                <span class="expand">
                                    <i class="fas fa-expand"></i>
                                    <i class="fas fa-compress"></i>
                                </span>
                                <span class="expand">Single Query</span>

                            </div>
                            <div class="options">
                                <input type="hidden" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][arg_type]" value="single" /><br>
                                <?php echo __("Key", 'post-grid'); ?><br />
                                <input type="text" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][key]" value="<?php echo $meta_queryData['key']; ?>" /><br>
                                <?php echo __("Value", 'post-grid'); ?><br />
                                <input type="text" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][value]" value="<?php echo $meta_queryData['value']; ?>" /><br>
                                <?php echo __("Compare", 'post-grid'); ?><br />
                                <input type="text" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][compare]" value="<?php echo $meta_queryData['compare']; ?>" /><br>
                                <?php echo __("Type", 'post-grid'); ?><br />
                                <input type="text" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][type]" value="<?php echo $meta_queryData['type']; ?>" /><br>
                            </div>
                        </div>
                    <?php


                    elseif ($arg_type == 'group') :
                        $args = isset($meta_queryData['args']) ? $meta_queryData['args'] : array();
                        $relation = isset($meta_queryData['relation']) ? $meta_queryData['relation'] : array();

                    ?>
                        <div class="item">
                            <div class="header">
                                <span class="remove" onclick="jQuery(this).parent().parent().remove()"><i class="fa fa-times"></i></span>
                                <span class="move pg-tooltip" title="<?php echo __('Move', 'post-grid'); ?>"><i class="fa fa-bars"></i></span>
                                <span class="expand">
                                    <i class="fas fa-expand"></i>
                                    <i class="fas fa-compress"></i>
                                </span>
                                <span class="expand">Group Query</span>

                            </div>
                            <div class="options">
                                <input type="hidden" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][arg_type]" value="group" />
                                Relation:<br>
                                <label><input <?php if ($relation == 'OR') echo 'checked'; ?> type="radio" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][relation]" value="OR" />OR</label>
                                <label><input <?php if ($relation == 'AND') echo 'checked'; ?> type="radio" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][relation]" value="AND" />AND</label>
                                <br><br />
                                <div class="button add-meta-query-child" index="<?php echo $meta_queryIndex; ?>"><?php _e('Add', 'post-grid'); ?></div><br /><br />
                                <div class="group-query-list group-query-list-<?php echo $meta_queryIndex; ?> expandable">

                                    <?php
                                    if (!empty($args)) :
                                        foreach ($args as $argIndex => $arg) {

                                    ?>
                                            <div class="">
                                                <div class="">
                                                    <span class="remove"><i class="fa fa-times"></i></span><br />
                                                    <input type="hidden" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][args][<?php echo $argIndex; ?>][arg_type]" value="single" /><br>
                                                    <?php echo __("Key", 'post-grid'); ?><br />
                                                    <input type="text" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][args][<?php echo $argIndex; ?>][key]" value="<?php echo $arg['key']; ?>" /><br>
                                                    <?php echo __("Value", 'post-grid'); ?><br />
                                                    <input type="text" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][args][<?php echo $argIndex; ?>][value]" value="<?php echo $arg['value']; ?>" /><br>
                                                    <?php echo __("Compare", 'post-grid'); ?><br />
                                                    <input type="text" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][args][<?php echo $argIndex; ?>][compare]" value="<?php echo $arg['compare']; ?>" /><br>
                                                    <?php echo __("Type", 'post-grid'); ?><br />
                                                    <input type="text" name="post_grid_meta_options[meta_query][<?php echo $meta_queryIndex; ?>][args][<?php echo $argIndex; ?>][type]" value="<?php echo $arg['type']; ?>" /><br>
                                                </div>
                                            </div>
                                    <?php
                                        }
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>

            <?php
                    endif;
                endforeach;
            else :

            endif;
            ?>
        </div>

        <script>
            jQuery(document).ready(function($) {
                $(".meta-query-list").sortable({
                    revert: "invalid",
                    handle: '.header'
                });

            })
        </script>
        <?php

        $html = ob_get_clean();

        $args = array(
            'id'        => 'meta_query',
            'title'        => __('Meta query', 'post-grid'),
            'details'    => 'Query post by meta key & value, Reference: https://codex.wordpress.org/Class_Reference/WP_Query#Custom_Field_Parameters',
            'type'        => 'custom_html',
            'html'        => $html,


        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'meta_query_relation',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Meta query relation', 'post-grid'),
            'details'    => __('Choose meta query relation.', 'post-grid'),
            'type'        => 'radio',
            //'for'		=> $taxonomy,
            //'multiple'		=> true,
            'value'        => $meta_query_relation,
            'default'        => 'OR',
            'args'        => array(
                'OR' => __('OR', 'post-grid'),
                'AND' => __('AND', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);



        $args = array(
            'id'        => 'extra_query_parameter',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Extra query parameter', 'post-grid'),
            'details'    => __('You can add extra query parameter as string, ex: <code>post__in=1,2,3&post__not_in=1,2,3</code>', 'post-grid'),
            'type'        => 'textarea',
            'value'        => $extra_query_parameter,
            'default'        => '',
        );

        $settings_tabs_field->generate_field($args, $post_id);



        $args = array(
            'id'        => 'permission_query',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Permission parameters', 'post-grid'),
            'details'    => __('Show posts if user has the appropriate capability, please follow the reference https://codex.wordpress.org/Class_Reference/WP_Query#Permission_Parameters', 'post-grid'),
            'type'        => 'radio',
            'multiple'        => true,
            'value'        => $permission_query,
            'default'        => 'disable',
            'args'        => array(
                'enable' => __('Enable', 'post-grid'),
                'disable' => __('Disable', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'ignore_archive',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Ignore archive query', 'post-grid'),
            'details'    => __('Ignore query post dynamically on archive page, like category, tag, search page.', 'post-grid'),
            'type'        => 'radio',
            'multiple'        => true,
            'value'        => $ignore_archive,
            'default'        => 'yes',
            'args'        => array(
                'yes' => __('Yes', 'post-grid'),
                'no' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);


        ob_start();

        ?>
        <div class="expandable">

            <div class="item">
                <div class="header">
                    <span class="expand  ">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($sticky_post_query_type == 'none') echo 'checked'; ?> name="post_grid_meta_options[sticky_post_query][type]" value="none" />
                    <span class="expand">None</span>
                </div>
                <div class="options">
                    No query for sticky post.
                </div>
            </div>
            <div class="item">
                <div class="header">
                    <span class="expand">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($sticky_post_query_type == 'include') echo 'checked'; ?> name="post_grid_meta_options[sticky_post_query][type]" value="include" />
                    <span class="expand">Include sticky post</span>
                </div>
                <div class="options">
                    Display only sticky post.
                </div>
            </div>
            <div class="item">
                <div class="header">
                    <span class="expand">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($sticky_post_query_type == 'exclude') echo 'checked'; ?> name="post_grid_meta_options[sticky_post_query][type]" value="exclude" />
                    <span class="expand">Exclude sticky post</span>
                </div>
                <div class="options">
                    Sticky post will be excluded from query.
                </div>
            </div>

        </div>
        <p class="option-info">Sticky posts at top:</p>
        <select name="post_grid_meta_options[sticky_post_query][ignore_sticky_posts]">
            <option <?php if ($ignore_sticky_posts == 0) echo 'selected'; ?> value="0">Yes</option>
            <option <?php if ($ignore_sticky_posts == 1) echo 'selected'; ?> value="1">No</option>
        </select>
        <?php

        $html = ob_get_clean();

        $args = array(
            'id'        => 'sticky_post_query',
            'title'        => __('Sticky post query', 'post-grid'),
            'details'    => '',
            'type'        => 'custom_html',
            'html'        => $html,


        );

        $settings_tabs_field->generate_field($args, $post_id);



        ob_start();

        ?>
        <div class="expandable">

            <div class="item">
                <div class="header">
                    <span class="expand  ">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($date_query_type == 'none') echo 'checked'; ?> name="post_grid_meta_options[date_query][type]" value="none" />
                    <span class="expand">None</span>


                </div>
                <div class="options">

                    No date parameters.

                </div>
            </div>


            <div class="item">
                <div class="header">
                    <span class="expand">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($date_query_type == 'extact_date') echo 'checked'; ?> name="post_grid_meta_options[date_query][type]" value="extact_date" />
                    <span class="expand">Exact date</span>


                </div>
                <div class="options">
                    Year
                    <input type="text" placeholder="<?php echo date('Y'); ?>" name="post_grid_meta_options[date_query][extact_date][year]" value="<?php if (!empty($extact_date_year)) echo $extact_date_year; ?>" />
                    <br />
                    Month
                    <input type="text" placeholder="<?php echo date('m'); ?>" name="post_grid_meta_options[date_query][extact_date][month]" value="<?php if (!empty($extact_date_month)) echo $extact_date_month; ?>" />
                    <br />
                    Day
                    <input type="text" placeholder="<?php echo date('d'); ?>" name="post_grid_meta_options[date_query][extact_date][day]" value="<?php if (!empty($extact_date_day)) echo $extact_date_day; ?>" />


                </div>
            </div>


            <div class="item">
                <div class="header">
                    <span class="expand">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($date_query_type == 'between_two_date') echo 'checked'; ?> name="post_grid_meta_options[date_query][type]" value="between_two_date" />
                    <span class="expand">Between two date</span>

                </div>
                <div class="options">
                    <strong>After</strong><br /><br />
                    Year
                    <input type="text" placeholder="<?php echo date('Y'); ?>" name="post_grid_meta_options[date_query][between_two_date][after][year]" value="<?php if (!empty($between_two_date_after_year)) echo $between_two_date_after_year; ?>" />

                    <br />
                    Month
                    <input type="text" placeholder="<?php echo date('m'); ?>" name="post_grid_meta_options[date_query][between_two_date][after][month]" value="<?php if (!empty($between_two_date_after_month)) echo $between_two_date_after_month; ?>" />
                    <br />
                    Day
                    <input type="text" placeholder="<?php echo date('d'); ?>" name="post_grid_meta_options[date_query][between_two_date][after][day]" value="<?php if (!empty($between_two_date_after_day)) echo $between_two_date_after_day; ?>" />
                    <br />


                    <strong>Before</strong><br /><br />

                    Year
                    <input type="text" placeholder="<?php echo date('Y'); ?>" name="post_grid_meta_options[date_query][between_two_date][before][year]" value="<?php if (!empty($between_two_date_before_year)) echo $between_two_date_before_year; ?>" />
                    <br />
                    Month
                    <input type="text" placeholder="<?php echo date('m'); ?>" name="post_grid_meta_options[date_query][between_two_date][before][month]" value="<?php if (!empty($between_two_date_before_month)) echo $between_two_date_before_month; ?>" />
                    <br />
                    Day
                    <input type="text" placeholder="<?php echo date('d'); ?>" name="post_grid_meta_options[date_query][between_two_date][before][day]" value="<?php if (!empty($between_two_date_before_day)) echo $between_two_date_before_day; ?>" />
                    <br />
                    <br />

                    Inclusive:<br />
                    <label> <input type="radio" name="post_grid_meta_options[date_query][between_two_date][inclusive]" <?php if ($between_two_date_inclusive == 'true') echo 'checked'; ?> value="true" />True</label>
                    <label> <input type="radio" name="post_grid_meta_options[date_query][between_two_date][inclusive]" <?php if ($between_two_date_inclusive == 'false') echo 'checked'; ?> value="false" />False</label>



                </div>
            </div>

        </div>
        <?php

        $html = ob_get_clean();

        $args = array(
            'id'        => 'date_query',
            'title'        => __('Date parameters', 'post-grid'),
            'details'    => 'Add date parameter to query post, please follow the reference https://codex.wordpress.org/Class_Reference/WP_Query#Date_Parameters',
            'type'        => 'custom_html',
            'html'        => $html,


        );

        $settings_tabs_field->generate_field($args, $post_id);


        ob_start();

        ?>
        <div class="expandable">

            <div class="item">
                <div class="header">
                    <span class="expand  ">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($author_query_type == 'none') echo 'checked'; ?> name="post_grid_meta_options[author_query][type]" value="none" />
                    <span class="expand">None</span>

                </div>
                <div class="options">

                    No author parameters.

                </div>
            </div>
            <div class="item">
                <div class="header">
                    <span class="expand">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($author_query_type == 'author__in_logged') echo 'checked'; ?> name="post_grid_meta_options[author_query][type]" value="author__in_logged" />
                    <span class="expand">Logged in Author</span>

                </div>

            </div>

            <div class="item">
                <div class="header">
                    <span class="expand">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($author_query_type == 'author__in') echo 'checked'; ?> name="post_grid_meta_options[author_query][type]" value="author__in" />
                    <span class="expand">Include authors</span>

                </div>
                <div class="options">
                    Author ids, comma separated<br />
                    <input type="text" placeholder="<?php echo __('1,5,9', 'post-grid'); ?>" name="post_grid_meta_options[author_query][author__in]" value="<?php if (!empty($author__in)) echo $author__in; ?>" />

                </div>
            </div>


            <div class="item">
                <div class="header">
                    <span class="expand">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($author_query_type == 'author__not_in') echo 'checked'; ?> name="post_grid_meta_options[author_query][type]" value="author__not_in" />

                    <span class="expand">Exclude authors</span>
                </div>
                <div class="options">
                    Author ids, comma separated<br />
                    <input type="text" placeholder="<?php echo __('2,4,10', 'post-grid'); ?>" name="post_grid_meta_options[author_query][author__not_in]" value="<?php if (!empty($author__not_in)) echo $author__not_in; ?>" />

                </div>
            </div>

        </div>
        <?php
        $html = ob_get_clean();

        $args = array(
            'id'        => 'author_query',
            'title'        => __('Author parameters', 'post-grid'),
            'details'    => 'Add author parameter to query post, please follow the reference https://codex.wordpress.org/Class_Reference/WP_Query#Author_Parameters',
            'type'        => 'custom_html',
            'html'        => $html,


        );

        $settings_tabs_field->generate_field($args, $post_id);

        ob_start();

        ?>
        <div class="expandable">



            <div class="item">
                <div class="header">
                    <span class="expand  ">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($password_query_type == 'none') echo 'checked'; ?> name="post_grid_meta_options[password_query][type]" value="none" />
                    <span class="expand">None</span>

                </div>
                <div class="options">

                    No password parameters

                </div>
            </div>



            <div class="item">
                <div class="header">
                    <span class="expand">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($password_query_type == 'has_password') echo 'checked'; ?> name="post_grid_meta_options[password_query][type]" value="has_password" />
                    <span class="expand">Display only password protected posts</span>

                </div>
                <div class="options">
                    <label>
                        <input type="radio" <?php if ($password_query_has_password == 'true') echo 'checked'; ?> name="post_grid_meta_options[password_query][has_password]" value="true" /> Display only password protected posts.
                    </label>
                    <br>
                    <label>
                        <input type="radio" <?php if ($password_query_has_password == 'false') echo 'checked'; ?> name="post_grid_meta_options[password_query][has_password]" value="false" /> Display only posts without passwords.
                    </label>
                    <br>
                    <label>
                        <input type="radio" <?php if ($password_query_has_password == 'null') echo 'checked'; ?> name="post_grid_meta_options[password_query][has_password]" value="null" /> Display only posts with and without passwords.
                    </label>

                </div>
            </div>



            <div class="item">
                <div class="header">
                    <span class="expand">
                        <i class="fas fa-expand"></i>
                        <i class="fas fa-compress"></i>
                    </span>
                    <input type="radio" <?php if ($password_query_type == 'post_password') echo 'checked'; ?> name="post_grid_meta_options[password_query][type]" value="post_password" />
                    <span class="expand">Posts with particular password.</span>

                </div>
                <div class="options">
                    Post password:<br>
                    <input type="text" placeholder="password" name="post_grid_meta_options[password_query][post_password]" value="<?php echo $password_query_post_password; ?>" />
                    </label>
                </div>
            </div>

        </div>
        <?php

        $html = ob_get_clean();

        $args = array(
            'id'        => 'password_query',
            'title'        => __('Password parameters', 'post-grid'),
            'details'    => 'Post query based on post password, please follow the reference https://codex.wordpress.org/Class_Reference/WP_Query#Password_Parameters',
            'type'        => 'custom_html',
            'html'        => $html,


        );

        $settings_tabs_field->generate_field($args, $post_id);

        ?>

    </div>
<?php
}





add_action('post_grid_metabox_tabs_content_slider', 'post_grid_metabox_tabs_content_slider', 10, 2);

function post_grid_metabox_tabs_content_slider($tab, $post_id)
{

    $settings_tabs_field = new settings_tabs_field();



    $post_grid_meta_options = get_post_meta($post_id, 'post_grid_meta_options', true);

    $slider_navs = !empty($post_grid_meta_options['slider_navs']) ? $post_grid_meta_options['slider_navs'] : 'true';
    $slider_navs_text_prev = !empty($post_grid_meta_options['slider_navs_text_prev']) ? $post_grid_meta_options['slider_navs_text_prev'] : '';
    $slider_navs_text_next = !empty($post_grid_meta_options['slider_navs_text_next']) ? $post_grid_meta_options['slider_navs_text_next'] : '';

    $slider_navs_position = !empty($post_grid_meta_options['slider_navs_position']) ? $post_grid_meta_options['slider_navs_position'] : 'top-left';
    $slider_navs_style = !empty($post_grid_meta_options['slider_navs_style']) ? $post_grid_meta_options['slider_navs_style'] : 'round';

    $slider_dots = !empty($post_grid_meta_options['slider_dots']) ? $post_grid_meta_options['slider_dots'] : 'true';
    $slider_dots_style = !empty($post_grid_meta_options['slider_dots_style']) ? $post_grid_meta_options['slider_dots_style'] : 'round';

    $slider_auto_play = !empty($post_grid_meta_options['slider_auto_play']) ? $post_grid_meta_options['slider_auto_play'] : 'true';
    $slider_auto_play_timeout = !empty($post_grid_meta_options['slider_auto_play_timeout']) ? $post_grid_meta_options['slider_auto_play_timeout'] : '2000';
    $slider_auto_play_speed = !empty($post_grid_meta_options['slider_auto_play_speed']) ? $post_grid_meta_options['slider_auto_play_speed'] : '3000';

    $slider_rewind = !empty($post_grid_meta_options['slider_rewind']) ? $post_grid_meta_options['slider_rewind'] : 'false';
    $slider_loop = !empty($post_grid_meta_options['slider_loop']) ? $post_grid_meta_options['slider_loop'] : 'false';
    $slider_center = !empty($post_grid_meta_options['slider_center']) ? $post_grid_meta_options['slider_center'] : 'false';
    $slider_autoplayHoverPause = !empty($post_grid_meta_options['slider_autoplayHoverPause']) ? $post_grid_meta_options['slider_autoplayHoverPause'] : 'true';
    $slider_navSpeed = !empty($post_grid_meta_options['slider_navSpeed']) ? $post_grid_meta_options['slider_navSpeed'] : '2000';
    $slider_dotsSpeed = !empty($post_grid_meta_options['slider_dotsSpeed']) ? $post_grid_meta_options['slider_dotsSpeed'] : '3000';
    $slider_touchDrag = !empty($post_grid_meta_options['slider_touchDrag']) ? $post_grid_meta_options['slider_touchDrag'] : 'true';
    $slider_mouseDrag = !empty($post_grid_meta_options['slider_mouseDrag']) ? $post_grid_meta_options['slider_mouseDrag'] : 'true';

    $slider_column_desktop = !empty($post_grid_meta_options['slider_column_desktop']) ? $post_grid_meta_options['slider_column_desktop'] : '4';
    $slider_column_tablet = !empty($post_grid_meta_options['slider_column_tablet']) ? $post_grid_meta_options['slider_column_tablet'] : '2';
    $slider_column_mobile = !empty($post_grid_meta_options['slider_column_mobile']) ? $post_grid_meta_options['slider_column_mobile'] : '1';

    $slider_navs_bg_color = !empty($post_grid_meta_options['slider_navs_bg_color']) ? $post_grid_meta_options['slider_navs_bg_color'] : '';
    $slider_navs_text_color = !empty($post_grid_meta_options['slider_navs_text_color']) ? $post_grid_meta_options['slider_navs_text_color'] : '';
    $slider_dots_bg_color = !empty($post_grid_meta_options['slider_dots_bg_color']) ? $post_grid_meta_options['slider_dots_bg_color'] : '';



?>
    <div class="section">
        <div class="section-title">Carousel slider settings</div>
        <p class="description section-description">Customize the carousel settings</p>

        <?php


        ob_start();

        ?>
        <div class="">
            <?php echo __('Desktop:(min-width:1024px)', 'post-grid'); ?><br>
            <input type="text" name="post_grid_meta_options[slider_column_desktop]" value="<?php echo $slider_column_desktop; ?>" />
        </div>
        <br>
        <div class="">
            <?php echo __('Tablet:( min-width:768px )', 'post-grid'); ?><br>
            <input type="text" name="post_grid_meta_options[slider_column_tablet]" value="<?php echo $slider_column_tablet; ?>" />
        </div>
        <br>
        <div class="">
            <?php echo __(' Mobile:( min-width : 320px )', 'post-grid'); ?><br>
            <input type="text" name="post_grid_meta_options[slider_column_mobile]" value="<?php echo $slider_column_mobile; ?>" />
        </div>
        <?php

        $html = ob_get_clean();

        $args = array(
            'id'        => 'slider_column',
            'title'        => __('Slider column number', 'post-grid'),
            'details'    => __('Set custom number of column count for different devices', 'post-grid'),
            'type'        => 'custom_html',
            'html'        => $html,


        );

        $settings_tabs_field->generate_field($args, $post_id);






        $args = array(
            'id'        => 'slider_navs',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Display slider navs', 'post-grid'),
            'details'    => __('Display or hide slider navigation.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $slider_navs,
            'default'        => 'true',
            'args'        => array(
                'true' => __('Yes', 'post-grid'),
                'false' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'nav_text',
            'title'        => __('Navigation text', 'woocommerce-products-slider'),
            'details'    => __('Navigation previous & next text.', 'woocommerce-products-slider'),
            'type'        => 'option_group',
            'options'        => array(
                array(
                    'id'        => 'slider_navs_text_prev',
                    'parent'        => 'post_grid_meta_options',
                    'title'        => __('Previous text', 'woocommerce-products-slider'),
                    'details'    => __('Set previous icon, you could use <a href="https://fontawesome.com/icons">fontawesome</a> icon html here.', 'woocommerce-products-slider'),
                    'type'        => 'text',
                    'value'        => $slider_navs_text_prev,
                    'default'        => '',
                    'placeholder'   => '',
                ),
                array(
                    'id'        => 'slider_navs_text_next',
                    'parent'        => 'post_grid_meta_options',
                    'title'        => __('Next text', 'woocommerce-products-slider'),
                    'details'    => __('Set next icon, you could use <a href="https://fontawesome.com/icons">fontawesome</a> icon html here', 'woocommerce-products-slider'),
                    'type'        => 'text',
                    'value'        => $slider_navs_text_next,
                    'default'        => '',
                    'placeholder'   => '',
                ),
            ),

        );

        $settings_tabs_field->generate_field($args);


        $args = array(
            'id'        => 'slider_navs_position',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slider navs position', 'post-grid'),
            'details'    => __('Set position you want to display navs.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $slider_navs_position,
            'default'        => 'top-left',
            'args'        => array(
                'top-left' => __('Top Left', 'post-grid'),
                'top-right' => __('Top Right', 'post-grid'),
                'middle' => __('Middle', 'post-grid'),
                'bottom-left' => __('Bottom Left', 'post-grid'),
                'bottom-right' => __('Bottom Right', 'post-grid'),

            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'slider_navs_style',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slider navs style', 'post-grid'),
            'details'    => __('Set style you want to display navs. ex: flat, round, border, semi-round, square, shadow', 'post-grid'),
            'type'        => 'text',
            'value'        => $slider_navs_style,
            'default'        => 'flat',

        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'slider_navs_bg_color',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Navs background color', 'post-grid'),
            'details'    => __('Set custom background color for slider navs', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $slider_navs_bg_color,
            'default'        => '',

        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'slider_navs_text_color',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Navs text color', 'post-grid'),
            'details'    => __('Set custom text color for slider navs', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $slider_navs_text_color,
            'default'        => '',

        );

        $settings_tabs_field->generate_field($args, $post_id);



        $args = array(
            'id'        => 'slider_dots',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Display slider dots', 'post-grid'),
            'details'    => __('Display or hide slider dots.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $slider_dots,
            'default'        => 'true',
            'args'        => array(
                'true' => __('Yes', 'post-grid'),
                'false' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'slider_dots_style',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slider dots style', 'post-grid'),
            'details'    => __('Set style you want to display dots. ex: round, semi-round, square, shadow, border', 'post-grid'),
            'type'        => 'text',
            'value'        => $slider_dots_style,
            'default'        => 'round',
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'slider_dots_bg_color',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Dots background color', 'post-grid'),
            'details'    => __('Set custom background color for slider dots', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $slider_dots_bg_color,
            'default'        => '',

        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'slider_auto_play',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slider auto play', 'post-grid'),
            'details'    => __('Enable or disable slider auto play.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $slider_auto_play,
            'default'        => 'true',
            'args'        => array(
                'true' => __('Yes', 'post-grid'),
                'false' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);



        $args = array(
            'id'        => 'slider_auto_play_timeout',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slide auto play timeout', 'post-grid'),
            'details'    => __('Set custom value for slide auto play timeout, ex: 2000, 1000 = 1 second', 'post-grid'),
            'type'        => 'text',
            'value'        => $slider_auto_play_timeout,
            'default'        => '2000',
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'slider_auto_play_speed',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slide auto play speed', 'post-grid'),
            'details'    => __('Set custom value for slide auto play speed, ex: 2000, 1000 = 1 second', 'post-grid'),
            'type'        => 'text',
            'value'        => $slider_auto_play_speed,
            'default'        => '3000',
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'slider_navSpeed',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slide speed', 'post-grid'),
            'details'    => __('Set custom value for slide speed, ex: 2000, 1000 = 1 second', 'post-grid'),
            'type'        => 'text',
            'value'        => $slider_navSpeed,
            'default'        => '3000',
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'slider_dotsSpeed',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Pagination slide speed', 'post-grid'),
            'details'    => __('Set custom value for pagination/dots slide speed, ex: 2000, 1000 = 1 second', 'post-grid'),
            'type'        => 'text',
            'value'        => $slider_dotsSpeed,
            'default'        => '3000',
        );

        $settings_tabs_field->generate_field($args, $post_id);






        $args = array(
            'id'        => 'slider_rewind',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slider rewind', 'post-grid'),
            'details'    => __('Enable or disable slider rewind.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $slider_rewind,
            'default'        => 'false',
            'args'        => array(
                'true' => __('Yes', 'post-grid'),
                'false' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'slider_loop',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slider loop', 'post-grid'),
            'details'    => __('Enable or disable slider loop.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $slider_loop,
            'default'        => 'false',
            'args'        => array(
                'true' => __('Yes', 'post-grid'),
                'false' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'slider_center',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slider center', 'post-grid'),
            'details'    => __('Enable or disable slider center, you will need to set column count odd number to enable this.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $slider_center,
            'default'        => 'false',
            'args'        => array(
                'true' => __('Yes', 'post-grid'),
                'false' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'slider_autoplayHoverPause',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slider stop on Hover', 'post-grid'),
            'details'    => __('Enable or disable slider stop on hover', 'post-grid'),
            'type'        => 'radio',
            'value'        => $slider_autoplayHoverPause,
            'default'        => 'true',
            'args'        => array(
                'true' => __('Yes', 'post-grid'),
                'false' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'slider_touchDrag',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slider touch drag enable', 'post-grid'),
            'details'    => __('Enable or disable slider touch drag', 'post-grid'),
            'type'        => 'radio',
            'value'        => $slider_touchDrag,
            'default'        => 'true',
            'args'        => array(
                'true' => __('Yes', 'post-grid'),
                'false' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'slider_mouseDrag',
            'parent'        => 'post_grid_meta_options',
            'title'        => __('Slider mouse drag enable', 'post-grid'),
            'details'    => __('Enable or disable slider mouse drag', 'post-grid'),
            'type'        => 'radio',
            'value'        => $slider_mouseDrag,
            'default'        => 'true',
            'args'        => array(
                'true' => __('Yes', 'post-grid'),
                'false' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);



        ?>

    </div>
<?php


}


add_action('post_grid_metabox_tabs_content_collapsible', 'post_grid_metabox_tabs_content_collapsible', 10, 2);

function post_grid_metabox_tabs_content_collapsible($tab, $post_id)
{

    $settings_tabs_field = new settings_tabs_field();

    $post_grid_meta_options = get_post_meta($post_id, 'post_grid_meta_options', true);

    $collapsible_options = !empty($post_grid_meta_options['collapsible']) ? $post_grid_meta_options['collapsible'] : array();


    $header_selector = !empty($collapsible_options['header_selector']) ? $collapsible_options['header_selector'] : '';
    $body_selector = !empty($collapsible_options['body_selector']) ? $collapsible_options['body_selector'] : '';


?>
    <div class="section">
        <div class="section-title"><?php echo __('Collapsible settings', 'post-grid'); ?></div>
        <p class="description section-description"><?php echo __('Choose collapsible settings.', 'post-grid'); ?></p>

        <?php


        $args = array(
            'id'        => 'header_selector',
            'parent'        => 'post_grid_meta_options[collapsible]',
            'title'        => __('Collapsible header selector', 'post-grid'),
            'details'    => __('Write collapsible header selector class.', 'post-grid'),
            'type'        => 'text',
            'value'        => $header_selector,
            'default'        => '',

        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'body_selector',
            'parent'        => 'post_grid_meta_options[collapsible]',
            'title'        => __('Collapsible content selector', 'post-grid'),
            'details'    => __('Write collapsible content selector class.', 'post-grid'),
            'type'        => 'text',
            'value'        => $body_selector,
            'default'        => '',

        );

        $settings_tabs_field->generate_field($args, $post_id);






        ?>


    </div>


<?php

}


add_action('post_grid_metabox_tabs_content_filterable', 'post_grid_metabox_tabs_content_filterable', 10, 2);

function post_grid_metabox_tabs_content_filterable($tab, $post_id)
{

    $settings_tabs_field = new settings_tabs_field();

    $post_grid_meta_options = get_post_meta($post_id, 'post_grid_meta_options', true);

    $taxonomies = !empty($post_grid_meta_options['taxonomies']) ? $post_grid_meta_options['taxonomies'] : array();

    $nav_top_filter = !empty($post_grid_meta_options['nav_top']['filter']) ? $post_grid_meta_options['nav_top']['filter'] : 'yes';
    $nav_top_filter_style = !empty($post_grid_meta_options['nav_top']['filter_style']) ? $post_grid_meta_options['nav_top']['filter_style'] : 'inline';
    $nav_top_filter_toggle = !empty($post_grid_meta_options['nav_top']['filter_toggle']) ? $post_grid_meta_options['nav_top']['filter_toggle'] : 'no';

    $logicWithinGroup = !empty($post_grid_meta_options['nav_top']['logicWithinGroup']) ? $post_grid_meta_options['nav_top']['logicWithinGroup'] : 'or';
    $logicBetweenGroups = !empty($post_grid_meta_options['nav_top']['logicBetweenGroups']) ? $post_grid_meta_options['nav_top']['logicBetweenGroups'] : 'and';


    $filterable_post_per_page = !empty($post_grid_meta_options['nav_top']['filterable_post_per_page']) ? $post_grid_meta_options['nav_top']['filterable_post_per_page'] : '6';
    $filterable_font_size = !empty($post_grid_meta_options['nav_top']['filterable_font_size']) ? $post_grid_meta_options['nav_top']['filterable_font_size'] : '14px';
    $filterable_navs_margin = !empty($post_grid_meta_options['nav_top']['filterable_navs_margin']) ? $post_grid_meta_options['nav_top']['filterable_navs_margin'] : '5px';

    $filterable_font_color = !empty($post_grid_meta_options['nav_top']['filterable_font_color']) ? $post_grid_meta_options['nav_top']['filterable_font_color'] : '#999';
    $filterable_bg_color = !empty($post_grid_meta_options['nav_top']['filterable_bg_color']) ? $post_grid_meta_options['nav_top']['filterable_bg_color'] : '#fff';
    $filterable_active_bg_color = !empty($post_grid_meta_options['nav_top']['filterable_active_bg_color']) ? $post_grid_meta_options['nav_top']['filterable_active_bg_color'] : '#ddd';
    $filter_all_text = !empty($post_grid_meta_options['nav_top']['filter_all_text']) ? $post_grid_meta_options['nav_top']['filter_all_text'] : 'All';
    $active_filter = !empty($post_grid_meta_options['nav_top']['active_filter']) ? $post_grid_meta_options['nav_top']['active_filter'] : '';
    $display_post_count = !empty($post_grid_meta_options['nav_top']['display_post_count']) ? $post_grid_meta_options['nav_top']['display_post_count'] : 'no';
    $display_sort_filter = !empty($post_grid_meta_options['nav_top']['display_sort_filter']) ? $post_grid_meta_options['nav_top']['display_sort_filter'] : 'no';

    $filter_type = !empty($post_grid_meta_options['nav_top']['filter_type']) ? $post_grid_meta_options['nav_top']['filter_type'] : 'single';


    $enable_multi_filter = !empty($post_grid_meta_options['nav_top']['enable_multi_filter']) ? $post_grid_meta_options['nav_top']['enable_multi_filter'] : 'no';
    $filter_by = !empty($post_grid_meta_options['nav_top']['filter_by']) ? $post_grid_meta_options['nav_top']['filter_by'] : 'taxonomy';
    $multi_filter_group = !empty($post_grid_meta_options['nav_top']['multi_filter_group']) ? $post_grid_meta_options['nav_top']['multi_filter_group'] : array();


    $categories = !empty($post_grid_meta_options['categories']) ? $post_grid_meta_options['categories'] : array();


    $filterable = !empty($post_grid_meta_options['filterable']) ? $post_grid_meta_options['filterable'] : [];

    $filterable_gutter = isset($filterable['gutter']) ? $filterable['gutter'] : 20;

    $columns_desktop = !empty($filterable['columns']['desktop']) ? $filterable['columns']['desktop'] : '3';
    $columns_tablet = !empty($filterable['columns']['tablet']) ? $filterable['columns']['tablet'] : '2';
    $columns_mobile = !empty($filterable['columns']['mobile']) ? $filterable['columns']['mobile'] : '1';






?>
    <div class="section">
        <div class="section-title">Filterable settings</div>
        <p class="description section-description">Customize the filterable settings</p>
        <?php






        ob_start();

        ?>
        <div class="">
            Desktop:(min-width:1024px)<br>
            <input placeholder="250px or 30% or column number(3)" type="number" name="post_grid_meta_options[filterable][columns][desktop]" value="<?php echo esc_attr($columns_desktop); ?>" />
        </div>
        <br>
        <div class="">
            Tablet:( min-width: 768px and max-width: 1023px )<br>
            <input placeholder="250px or 30% or column number(3)" type="number" name="post_grid_meta_options[filterable][columns][tablet]" value="<?php echo esc_attr($columns_tablet); ?>" />
        </div>
        <br>
        <div class="">
            Mobile:( max-width : 767px, )<br>
            <input placeholder="250px or 30% or column number(3)" type="number" name="post_grid_meta_options[filterable][columns][mobile]" value="<?php echo esc_attr($columns_mobile); ?>" />
        </div>
        <?php

        $html = ob_get_clean();

        $args = array(
            'id'        => 'html',
            'title'        => __('Filterable Column number', 'post-grid'),
            'details'    => __('Number of columns for responsive device', 'post-grid'),
            'type'        => 'custom_html',
            'html'        => $html,


        );

        $settings_tabs_field->generate_field($args, $post_id);




        $args = array(
            'id'        => 'gutter',
            'parent'        => 'post_grid_meta_options[filterable]',
            'title'        => __('Filterable gutter', 'post-grid'),
            'details'    => __('Set custom gutter size of filterable. ex: 5', 'post-grid'),
            'type'        => 'number',
            'value'        => $filterable_gutter,
            'default'        => '20',

        );

        $settings_tabs_field->generate_field($args, $post_id);
















        $args = array(
            'id'        => 'filter',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Filterable menu display', 'post-grid'),
            'details'    => __('Hide or display filterable menu.', 'post-grid'),
            'type'        => 'radio',
            'multiple'        => true,
            'value'        => $nav_top_filter,
            'default'        => 'yes',
            'args'        => array(
                'yes' => __('Yes', 'post-grid'),
                'no' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);




        $args = array(
            'id'        => 'filterable_post_per_page',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Number of items per page', 'post-grid'),
            'details'    => __('Set custom value post per page for filterable.', 'post-grid'),
            'type'        => 'text',
            'value'        => $filterable_post_per_page,
            'default'        => '6',
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'filterable_font_size',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Navs font size', 'post-grid'),
            'details'    => __('Set custom value filterable nav item font size.', 'post-grid'),
            'type'        => 'text',
            'value'        => $filterable_font_size,
            'default'        => '14px',
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'filterable_navs_margin',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Navs margin', 'post-grid'),
            'details'    => __('Set custom value filterable nav item margin. ex: 5px or 5px 10px', 'post-grid'),
            'type'        => 'text',
            'value'        => $filterable_navs_margin,
            'default'        => '5px',
        );



        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'filterable_font_color',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Navs font color', 'post-grid'),
            'details'    => __('Set custom value filterable nav item font color.', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $filterable_font_color,
            'default'        => '#999',
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'filterable_bg_color',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Navs background color', 'post-grid'),
            'details'    => __('Set custom value filterable nav item background color.', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $filterable_bg_color,
            'default'        => '#fff',
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'filterable_active_bg_color',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Navs active background color', 'post-grid'),
            'details'    => __('Set custom value filterable nav item active background color.', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $filterable_active_bg_color,
            'default'        => '#ddd',
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'filter_all_text',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Custom text for All', 'post-grid'),
            'details'    => __('Set custom text for default all text.', 'post-grid'),
            'type'        => 'text',
            'value'        => $filter_all_text,
            'default'        => 'All',
        );

        $settings_tabs_field->generate_field($args, $post_id);




        ob_start();


        if (!empty($taxonomies)) {
            foreach ($taxonomies as $taxonomy => $taxonomyData) {
                $terms = !empty($taxonomyData['terms']) ? $taxonomyData['terms'] : array();
                $terms_relation = !empty($taxonomyData['terms_relation']) ? $taxonomyData['terms_relation'] : 'OR';
                $checked = !empty($taxonomyData['checked']) ? $taxonomyData['checked'] : '';
                if (!empty($terms) && !empty($checked)) {
                    $terms_ids[$taxonomy] = $terms;
                }
            }
        }

        //var_dump($terms_ids);
        ?>

        <div class="active-filter-container">
            <select class="" name="post_grid_meta_options[nav_top][active_filter]">
                <?php

                echo '<option  value="all">' . __('All', 'post-grid') . '</option>';


                if (!empty($terms_ids))
                    foreach ($terms_ids as $taxonomy => $ids) {
                        foreach ($ids as $index => $term_id) {

                            //$tax_terms = explode(',',$tax_terms);

                            //$terms_info = get_term_by('id', $term_id, $taxonomy);
                            $terms_info = get_term($term_id, $taxonomy);
                            //var_dump($terms_info);

                            if ($active_filter == $terms_info->slug) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }

                            echo '<option ' . $selected . '  value="' . $terms_info->slug . '">' . $terms_info->name . '</option>';
                        }
                    }

                ?>
            </select>


        </div>
        <?php


        $html = ob_get_clean();

        $args = array(
            'id'        => 'active_filter',
            'title'        => __('Default active filter for filterable grid', 'post-grid'),
            'details'    => __('Set custom number of column count for different devices', 'post-grid'),
            'type'        => 'custom_html',
            'html'        => $html,


        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'display_post_count',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Display post count', 'post-grid'),
            'details'    => __('Display inline or dropdown style filterable menu.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $display_post_count,
            'default'        => 'no',
            'args'        => array(
                'no' => __('No', 'post-grid'),
                'yes' => __('Yes', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);





        $args = array(
            'id'        => 'filter_by',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Filter by', 'post-grid'),
            'details'    => __('Display inline or dropdown style filterable menu.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $filter_by,
            'default'        => 'taxonomy',
            'args'        => array(
                'taxonomy' => __('Taxonomy & Terms', 'post-grid'),
                'custom' => __('Custom', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'filter_type',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Filter type', 'post-grid'),
            'details'    => __('Display inline or dropdown style filterable menu.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $filter_type,
            'default'        => 'no',
            'args'        => array(
                'single' => __('Single', 'post-grid'),
                'group' => __('Group', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'filter_style',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Single filter menu style', 'post-grid'),
            'details'    => __('Display inline or dropdown style filterable menu.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $nav_top_filter_style,
            'default'        => 'inline',
            'args'        => array(
                'inline' => __('Inline', 'post-grid'),
                'dropdown' => __('Dropdown', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'filter_toggle',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Enable filter toggle ', 'post-grid'),
            'details'    => __('Enable filterbale navs toggle.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $nav_top_filter_toggle,
            'default'        => 'no',
            'args'        => array(
                'yes' => __('Yes', 'post-grid'),
                'no' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'logicWithinGroup',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('logic Within Group', 'post-grid'),
            'details'    => __('Select logic within group.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $logicWithinGroup,
            'default'        => 'yes',
            'args'        => array(
                'or' => __('OR', 'post-grid'),
                'and' => __('AND', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'logicBetweenGroups',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('logic Between Groups ', 'post-grid'),
            'details'    => __('Select logic between groups.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $logicBetweenGroups,
            'default'        => 'and',
            'args'        => array(
                'or' => __('OR', 'post-grid'),
                'and' => __('AND', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);



        $args = array(
            'id'        => 'display_sort_filter',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Display sort filter', 'post-grid'),
            'details'    => __('Display inline or dropdown style filterable menu.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $display_sort_filter,
            'default'        => 'yes',
            'args'        => array(
                'yes' => __('Yes', 'post-grid'),
                'no' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $teams_fields = array(

            array(
                'id'        => 'name',
                'title'        => __('Group name', 'team'),
                'details'    => __('Write name here.', 'team'),
                'type'        => 'text',
                'value'        => '',
                'default'        => '',
                'placeholder'        => 'Size or Color',
            ),

            array(
                'id'        => 'name_display',
                'title'        => __('Display group name', 'team'),
                'details'    => __('Choose to display or hider group title.', 'team'),
                'type'        => 'select',
                'value'        => '',
                'default'        => 'or',
                'args'        => array(
                    'no' => __('No', 'post-grid'),
                    'yes' => __('Yes', 'post-grid'),

                ),
            ),

            array(
                'id'        => 'type',
                'title'        => __('Type', 'team'),
                'details'    => __('Write details text here.', 'team'),
                'type'        => 'select',
                'value'        => '',
                'default'        => 'taxonomy',
                'args'        => array(
                    'inline' => __('Inline', 'post-grid'),
                    'dropdown' => __('Dropdown', 'post-grid'),
                    'radio' => __('Radio', 'post-grid'),
                    'checkbox' => __('Checkbox', 'post-grid'),
                ),
            ),
            array(
                'id'        => 'data_logic',
                'title'        => __('Data logic', 'team'),
                'details'    => __('Write details text here.', 'team'),
                'type'        => 'select',
                'value'        => '',
                'default'        => 'or',
                'args'        => array(
                    'or' => __('Or', 'post-grid'),
                    'and' => __('And', 'post-grid'),
                ),
            ),


            array(
                'id'        => 'filter_args',
                'title'        => __('Filter arguments', 'team'),
                'details'    => __('Write name here.', 'team'),
                'type'        => 'text',
                'value'        => '',
                'default'        => '',
                'placeholder'        => 'Filter 1 | filterSlug , Filter 1 | filterSlug',
            ),







        );


        $teams_fields = apply_filters('teams_fields', $teams_fields);


        $args = array(
            'id'        => 'multi_filter_group',
            'parent'        => 'post_grid_meta_options[nav_top]',
            'title'        => __('Custom filters', 'text-domain'),
            'details'    => __('Put your team members here', 'text-domain'),
            'collapsible' => true,
            'type'        => 'repeatable',
            'limit'        => 10,
            'title_field'        => 'name',
            'value'        => $multi_filter_group,
            'fields'    => $teams_fields,
        );

        $settings_tabs_field->generate_field($args);







        ?>
    </div>
<?php
}



add_action('post_grid_metabox_tabs_content_glossary', 'post_grid_metabox_tabs_content_glossary', 10, 2);

function post_grid_metabox_tabs_content_glossary($tab, $post_id)
{

    $settings_tabs_field = new settings_tabs_field();


    $post_grid_meta_options = get_post_meta($post_id, 'post_grid_meta_options', true);

    $taxonomies = !empty($post_grid_meta_options['taxonomies']) ? $post_grid_meta_options['taxonomies'] : array();

    $glossary_filter = !empty($post_grid_meta_options['glossary']['filter']) ? $post_grid_meta_options['glossary']['filter'] : 'yes';
    $glossary_filter_style = !empty($post_grid_meta_options['glossary']['filter_style']) ? $post_grid_meta_options['glossary']['filter_style'] : 'inline';
    $post_per_page = !empty($post_grid_meta_options['glossary']['post_per_page']) ? $post_grid_meta_options['glossary']['post_per_page'] : '6';
    $font_size = !empty($post_grid_meta_options['glossary']['font_size']) ? $post_grid_meta_options['glossary']['font_size'] : '14px';
    $navs_margin = !empty($post_grid_meta_options['glossary']['navs_margin']) ? $post_grid_meta_options['glossary']['navs_margin'] : '5px';

    $font_color = !empty($post_grid_meta_options['glossary']['font_color']) ? $post_grid_meta_options['glossary']['font_color'] : '#999';
    $bg_color = !empty($post_grid_meta_options['glossary']['bg_color']) ? $post_grid_meta_options['glossary']['bg_color'] : '#fff';
    $active_bg_color = !empty($post_grid_meta_options['glossary']['active_bg_color']) ? $post_grid_meta_options['glossary']['active_bg_color'] : '#ddd';
    $filter_all_text = !empty($post_grid_meta_options['glossary']['filter_all_text']) ? $post_grid_meta_options['glossary']['filter_all_text'] : 'All';
    $active_filter = !empty($post_grid_meta_options['glossary']['active_filter']) ? $post_grid_meta_options['glossary']['active_filter'] : '';
    $display_post_count = !empty($post_grid_meta_options['glossary']['display_post_count']) ? $post_grid_meta_options['glossary']['display_post_count'] : 'no';
    $display_sort_filter = !empty($post_grid_meta_options['glossary']['display_sort_filter']) ? $post_grid_meta_options['glossary']['display_sort_filter'] : 'no';

    $filter_type = !empty($post_grid_meta_options['glossary']['filter_type']) ? $post_grid_meta_options['glossary']['filter_type'] : 'single';


    $enable_multi_filter = !empty($post_grid_meta_options['glossary']['enable_multi_filter']) ? $post_grid_meta_options['glossary']['enable_multi_filter'] : 'no';
    $filter_by = !empty($post_grid_meta_options['glossary']['filter_by']) ? $post_grid_meta_options['glossary']['filter_by'] : 'taxonomy';
    $multi_filter_group = !empty($post_grid_meta_options['glossary']['multi_filter_group']) ? $post_grid_meta_options['glossary']['multi_filter_group'] : array();


    $categories = !empty($post_grid_meta_options['categories']) ? $post_grid_meta_options['categories'] : array();


    $glossary = !empty($post_grid_meta_options['glossary']) ? $post_grid_meta_options['glossary'] : [];

    $glossary_gutter = isset($glossary['gutter']) ? $glossary['gutter'] : 20;

    $columns_desktop = !empty($glossary['columns']['desktop']) ? $glossary['columns']['desktop'] : '3';
    $columns_tablet = !empty($glossary['columns']['tablet']) ? $glossary['columns']['tablet'] : '2';
    $columns_mobile = !empty($glossary['columns']['mobile']) ? $glossary['columns']['mobile'] : '1';







?>
    <div class="section">
        <div class="section-title">Glossary settings</div>
        <p class="description section-description">Customize the glossary settings</p>
        <?php






        ob_start();

        ?>
        <div class="">
            Desktop:(min-width:1024px)<br>
            <input placeholder="250px or 30% or column number(3)" type="number" name="post_grid_meta_options[glossary][columns][desktop]" value="<?php echo esc_attr($columns_desktop); ?>" />
        </div>
        <br>
        <div class="">
            Tablet:( min-width: 768px and max-width: 1023px )<br>
            <input placeholder="250px or 30% or column number(3)" type="number" name="post_grid_meta_options[glossary][columns][tablet]" value="<?php echo esc_attr($columns_tablet); ?>" />
        </div>
        <br>
        <div class="">
            Mobile:( max-width : 767px, )<br>
            <input placeholder="250px or 30% or column number(3)" type="number" name="post_grid_meta_options[glossary][columns][mobile]" value="<?php echo esc_attr($columns_mobile); ?>" />
        </div>
        <?php

        $html = ob_get_clean();

        $args = array(
            'id'        => 'html',
            'title'        => __('Glossary Column number', 'post-grid'),
            'details'    => __('Number of columns for responsive device', 'post-grid'),
            'type'        => 'custom_html',
            'html'        => $html,


        );

        $settings_tabs_field->generate_field($args, $post_id);





        $args = array(
            'id'        => 'gutter',
            'parent'        => 'post_grid_meta_options[glossary]',
            'title'        => __('glossary gutter', 'post-grid'),
            'details'    => __('Set custom gutter size of glossary. ex: 5', 'post-grid'),
            'type'        => 'number',
            'value'        => $glossary_gutter,
            'default'        => '20',

        );

        $settings_tabs_field->generate_field($args, $post_id);













        $args = array(
            'id'        => 'filter',
            'parent'        => 'post_grid_meta_options[glossary]',
            'title'        => __('Filterable menu display', 'post-grid'),
            'details'    => __('Hide or display filterable menu.', 'post-grid'),
            'type'        => 'radio',
            'multiple'        => true,
            'value'        => $glossary_filter,
            'default'        => 'yes',
            'args'        => array(
                'yes' => __('Yes', 'post-grid'),
                'no' => __('No', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);




        $args = array(
            'id'        => 'post_per_page',
            'parent'        => 'post_grid_meta_options[glossary]',
            'title'        => __('Number of items per page', 'post-grid'),
            'details'    => __('Set custom value post per page for filterable.', 'post-grid'),
            'type'        => 'text',
            'value'        => $post_per_page,
            'default'        => '6',
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'font_size',
            'parent'        => 'post_grid_meta_options[glossary]',
            'title'        => __('Navs font size', 'post-grid'),
            'details'    => __('Set custom value filterable nav item font size.', 'post-grid'),
            'type'        => 'text',
            'value'        => $font_size,
            'default'        => '14px',
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'navs_margin',
            'parent'        => 'post_grid_meta_options[glossary]',
            'title'        => __('Navs margin', 'post-grid'),
            'details'    => __('Set custom value filterable nav item margin. ex: 5px or 5px 10px', 'post-grid'),
            'type'        => 'text',
            'value'        => $navs_margin,
            'default'        => '5px',
        );



        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'font_color',
            'parent'        => 'post_grid_meta_options[glossary]',
            'title'        => __('Navs font color', 'post-grid'),
            'details'    => __('Set custom value filterable nav item font color.', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $font_color,
            'default'        => '#999',
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'bg_color',
            'parent'        => 'post_grid_meta_options[glossary]',
            'title'        => __('Navs background color', 'post-grid'),
            'details'    => __('Set custom value filterable nav item background color.', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $bg_color,
            'default'        => '#fff',
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'active_bg_color',
            'parent'        => 'post_grid_meta_options[glossary]',
            'title'        => __('Navs active background color', 'post-grid'),
            'details'    => __('Set custom value filterable nav item active background color.', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $active_bg_color,
            'default'        => '#ddd',
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'filter_all_text',
            'parent'        => 'post_grid_meta_options[glossary]',
            'title'        => __('Custom text for All', 'post-grid'),
            'details'    => __('Set custom text for default all text.', 'post-grid'),
            'type'        => 'text',
            'value'        => $filter_all_text,
            'default'        => 'All',
        );

        $settings_tabs_field->generate_field($args, $post_id);




        ob_start();


        if (!empty($taxonomies)) {
            foreach ($taxonomies as $taxonomy => $taxonomyData) {
                $terms = !empty($taxonomyData['terms']) ? $taxonomyData['terms'] : array();
                $terms_relation = !empty($taxonomyData['terms_relation']) ? $taxonomyData['terms_relation'] : 'OR';
                $checked = !empty($taxonomyData['checked']) ? $taxonomyData['checked'] : '';
                if (!empty($terms) && !empty($checked)) {
                    $terms_ids[$taxonomy] = $terms;
                }
            }
        }

        //var_dump($terms_ids);
        ?>

        <div class="active-filter-container">
            <select class="" name="post_grid_meta_options[glossary][active_filter]">
                <?php

                echo '<option  value="all">' . __('All', 'post-grid') . '</option>';


                if (!empty($terms_ids))
                    foreach ($terms_ids as $taxonomy => $ids) {
                        foreach ($ids as $index => $term_id) {

                            //$tax_terms = explode(',',$tax_terms);

                            //$terms_info = get_term_by('id', $term_id, $taxonomy);
                            $terms_info = get_term($term_id, $taxonomy);
                            //var_dump($terms_info);

                            if ($active_filter == $terms_info->slug) {
                                $selected = 'selected';
                            } else {
                                $selected = '';
                            }

                            echo '<option ' . $selected . '  value="' . $terms_info->slug . '">' . $terms_info->name . '</option>';
                        }
                    }

                ?>
            </select>


        </div>
        <?php


        $html = ob_get_clean();

        $args = array(
            'id'        => 'active_filter',
            'title'        => __('Default active filter for filterable grid', 'post-grid'),
            'details'    => __('Set custom number of column count for different devices', 'post-grid'),
            'type'        => 'custom_html',
            'html'        => $html,


        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'display_post_count',
            'parent'        => 'post_grid_meta_options[glossary]',
            'title'        => __('Display post count', 'post-grid'),
            'details'    => __('Display inline or dropdown style filterable menu.', 'post-grid'),
            'type'        => 'radio',
            'value'        => $display_post_count,
            'default'        => 'no',
            'args'        => array(
                'no' => __('No', 'post-grid'),
                'yes' => __('Yes', 'post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);



        $args = array(
            'id'        => 'filter_style',
            'parent'        => 'post_grid_meta_options[glossary]',
            'title'        => __('Single filter menu style', 'post-grid'),
            'details'    => __('Display inline or dropdown style filterable menu.', 'post-grid'),
            'type'        => 'radio',
            'multiple'        => true,
            'value'        => $glossary_filter_style,
            'default'        => 'inline',
            'args'        => array(
                'inline' => __('Inline', 'post-grid'),
                //'dropdown'=>__('Dropdown','post-grid'),
            ),
        );

        $settings_tabs_field->generate_field($args, $post_id);


        //        $args = array(
        //            'id'		=> 'display_sort_filter',
        //            'parent'		=> 'post_grid_meta_options[glossary]',
        //            'title'		=> __('Display sort filter','post-grid'),
        //            'details'	=> __('Display inline or dropdown style filterable menu.','post-grid'),
        //            'type'		=> 'radio',
        //            'value'		=> $display_sort_filter,
        //            'default'		=> 'yes',
        //            'args'		=> array(
        //                'yes'=>__('Yes','post-grid'),
        //                'no'=>__('No','post-grid'),
        //            ),
        //        );
        //
        //        $settings_tabs_field->generate_field($args, $post_id);


        $teams_fields = array(

            array(
                'id'        => 'name',
                'title'        => __('Group name', 'team'),
                'details'    => __('Write name here.', 'team'),
                'type'        => 'text',
                'value'        => '',
                'default'        => '',
                'placeholder'        => 'Size or Color',
            ),

            array(
                'id'        => 'name_display',
                'title'        => __('Display group name', 'team'),
                'details'    => __('Choose to display or hider group title.', 'team'),
                'type'        => 'select',
                'value'        => '',
                'default'        => 'or',
                'args'        => array(
                    'no' => __('No', 'post-grid'),
                    'yes' => __('Yes', 'post-grid'),

                ),
            ),

            array(
                'id'        => 'type',
                'title'        => __('Type', 'team'),
                'details'    => __('Write details text here.', 'team'),
                'type'        => 'select',
                'value'        => '',
                'default'        => 'taxonomy',
                'args'        => array(
                    'inline' => __('Inline', 'post-grid'),
                    'dropdown' => __('Dropdown', 'post-grid'),
                    'radio' => __('Radio', 'post-grid'),
                    'checkbox' => __('Checkbox', 'post-grid'),
                ),
            ),
            array(
                'id'        => 'data_logic',
                'title'        => __('Data logic', 'team'),
                'details'    => __('Write details text here.', 'team'),
                'type'        => 'select',
                'value'        => '',
                'default'        => 'or',
                'args'        => array(
                    'or' => __('Or', 'post-grid'),
                    'and' => __('And', 'post-grid'),
                ),
            ),


            array(
                'id'        => 'filter_args',
                'title'        => __('Filter arguments', 'team'),
                'details'    => __('Write name here.', 'team'),
                'type'        => 'text',
                'value'        => '',
                'default'        => '',
                'placeholder'        => 'Filter 1 | filterID , Filter 1 | filterID',
            ),







        );


        $teams_fields = apply_filters('teams_fields', $teams_fields);


        $args = array(
            'id'        => 'multi_filter_group',
            'parent'        => 'post_grid_meta_options[glossary]',
            'title'        => __('Custom filters', 'text-domain'),
            'details'    => __('Put your team members here', 'text-domain'),
            'collapsible' => true,
            'type'        => 'repeatable',
            'limit'        => 10,
            'title_field'        => 'name',
            'value'        => $multi_filter_group,
            'fields'    => $teams_fields,
        );

        $settings_tabs_field->generate_field($args);







        ?>
    </div>
<?php
}




add_action('post_grid_metabox_tabs_content_timeline', 'post_grid_metabox_tabs_content_timeline', 10, 2);

function post_grid_metabox_tabs_content_timeline($tab, $post_id)
{

    $settings_tabs_field = new settings_tabs_field();
    $post_grid_meta_options = get_post_meta($post_id, 'post_grid_meta_options', true);

    $timeline_arrow_bg_color = !empty($post_grid_meta_options['timeline']['arrow_bg_color']) ? $post_grid_meta_options['timeline']['arrow_bg_color'] : '#eee';
    $timeline_arrow_size = !empty($post_grid_meta_options['timeline']['arrow_size']) ? $post_grid_meta_options['timeline']['arrow_size'] : '13px';
    $timeline_bg_color = !empty($post_grid_meta_options['timeline']['timeline_bg_color']) ? $post_grid_meta_options['timeline']['timeline_bg_color'] : '#eee';


    $timeline_bubble_bg_color = !empty($post_grid_meta_options['timeline']['bubble_bg_color']) ? $post_grid_meta_options['timeline']['bubble_bg_color'] : '#ddd';
    $timeline_bubble_border_color = !empty($post_grid_meta_options['timeline']['bubble_border_color']) ? $post_grid_meta_options['timeline']['bubble_border_color'] : '#fff';




?>
    <div class="section">
        <div class="section-title">Timeline Settings</div>
        <p class="description section-description">Customize the timeline.</p>



        <?php

        $args = array(
            'id'        => 'timeline_bg_color',
            'parent'        => 'post_grid_meta_options[timeline]',
            'title'        => __('Timeline color', 'post-grid'),
            'details'    => __('Choose timeline color.', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $timeline_bg_color,
            'default'        => '#ddd',
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'arrow_bg_color',
            'parent'        => 'post_grid_meta_options[timeline]',
            'title'        => __('Timeline arrow background color', 'post-grid'),
            'details'    => __('Choose timeline arrow background color.', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $timeline_arrow_bg_color,
            'default'        => '#ddd',
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'arrow_size',
            'parent'        => 'post_grid_meta_options[timeline]',
            'title'        => __('Timeline arrow size', 'post-grid'),
            'details'    => __('Custom arrow size for arrow', 'post-grid'),
            'type'        => 'text',
            'value'        => $timeline_arrow_size,
            'default'        => '13px',
        );

        $settings_tabs_field->generate_field($args, $post_id);


        $args = array(
            'id'        => 'bubble_bg_color',
            'parent'        => 'post_grid_meta_options[timeline]',
            'title'        => __('Timeline bubble color', 'post-grid'),
            'details'    => __('Choose timeline bubble color.', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $timeline_bubble_bg_color,
            'default'        => '#ddd',
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'bubble_border_color',
            'parent'        => 'post_grid_meta_options[timeline]',
            'title'        => __('Timeline bubble border color', 'post-grid'),
            'details'    => __('Choose timeline bubble border color.', 'post-grid'),
            'type'        => 'colorpicker',
            'value'        => $timeline_bubble_border_color,
            'default'        => '#ddd',
        );

        $settings_tabs_field->generate_field($args, $post_id);



        ?>

    </div>

<?php

}


add_action('post_grid_metabox_tabs_content_pagination', 'post_grid_pro_metabox_tabs_content_pagination', 30, 2);

function post_grid_pro_metabox_tabs_content_pagination($tab, $post_id)
{

    $settings_tabs_field = new settings_tabs_field();
    $post_grid_meta_options = get_post_meta($post_id, 'post_grid_meta_options', true);

    $load_more_text = !empty($post_grid_meta_options['pagination']['load_more_text']) ? $post_grid_meta_options['pagination']['load_more_text'] : '';
    $load_more_loading_icon = !empty($post_grid_meta_options['pagination']['load_more_loading_icon']) ? $post_grid_meta_options['pagination']['load_more_loading_icon'] : '';
    $no_posts_text = !empty($post_grid_meta_options['pagination']['no_posts_text']) ? $post_grid_meta_options['pagination']['no_posts_text'] : '';




?>
    <div class="section">
        <?php

        $args = array(
            'id'        => 'load_more_text',
            'parent'        => 'post_grid_meta_options[pagination]',
            'title'        => __('Load more text', 'post-grid'),
            'details'    => __('Set custom load more text.', 'post-grid'),
            'type'        => 'text',
            'value'        => $load_more_text,
            'default'        => '',
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'no_posts_text',
            'parent'        => 'post_grid_meta_options[pagination]',
            'title'        => __('No posts text', 'post-grid'),
            'details'    => __('Set custom no more posts text.', 'post-grid'),
            'type'        => 'text',
            'value'        => $no_posts_text,
            'default'        => '',
        );

        $settings_tabs_field->generate_field($args, $post_id);

        $args = array(
            'id'        => 'load_more_loading_icon',
            'parent'        => 'post_grid_meta_options[pagination]',
            'title'        => __('Loading icon', 'post-grid'),
            'details'    => __('Set custom load more loading icon.', 'post-grid'),
            'type'        => 'text',
            'value'        => $load_more_loading_icon,
            'default'        => '',
            'placeholder'        => esc_html('<i class="fas fa-spinner fa-pulse"></i>'),

        );

        $settings_tabs_field->generate_field($args, $post_id);


        ?>



    </div>

<?php

}
