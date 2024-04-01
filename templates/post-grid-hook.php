<?php
if (!defined('ABSPATH')) exit;  // if direct access


add_filter('post_grid_query_args', 'post_grid_pro_query_args', 10, 2);

function post_grid_pro_query_args($query_args, $args)
{

    $post_grid_options = $args['options'];
    $grid_id = $args['grid_id'];

    $tax_query = isset($query_args['tax_query']) ? $query_args['tax_query'] : array();


    $grid_type = !empty($post_grid_options['grid_type']) ? $post_grid_options['grid_type'] : 'grid';

    $meta_query = !empty($post_grid_options['meta_query']) ? $post_grid_options['meta_query'] : array();
    $meta_query_relation = !empty($post_grid_options['meta_query_relation']) ? $post_grid_options['meta_query_relation'] : 'OR';
    $extra_query_parameter = !empty($post_grid_options['extra_query_parameter']) ? $post_grid_options['extra_query_parameter'] : '';

    $permission_query = !empty($post_grid_options['permission_query']) ? $post_grid_options['permission_query'] : '';
    $ignore_paged = !empty($post_grid_options['ignore_paged']) ? $post_grid_options['ignore_paged'] : 'no';
    $sticky_post_query_type = !empty($post_grid_options['sticky_post_query']['type']) ? $post_grid_options['sticky_post_query']['type'] : 'none';
    $ignore_sticky_posts = !empty($post_grid_options['sticky_post_query']['ignore_sticky_posts']) ? $post_grid_options['sticky_post_query']['ignore_sticky_posts'] : 0;
    $date_query_type = !empty($post_grid_options['date_query']['type']) ? $post_grid_options['date_query']['type'] : 'none';

    $extact_date_year = !empty($post_grid_options['date_query']['extact_date']['year']) ? $post_grid_options['date_query']['extact_date']['year'] : '';
    $extact_date_month = !empty($post_grid_options['date_query']['extact_date']['month']) ? $post_grid_options['date_query']['extact_date']['month'] : '';
    $extact_date_day = !empty($post_grid_options['date_query']['extact_date']['day']) ? $post_grid_options['date_query']['extact_date']['day'] : '';
    $between_two_date_after_year = !empty($post_grid_options['date_query']['between_two_date']['after']['year']) ? $post_grid_options['date_query']['between_two_date']['after']['year'] : '';
    $between_two_date_after_month = !empty($post_grid_options['date_query']['between_two_date']['after']['month']) ? $post_grid_options['date_query']['between_two_date']['after']['month'] : '';
    $between_two_date_after_day = !empty($post_grid_options['date_query']['between_two_date']['after']['day']) ? $post_grid_options['date_query']['between_two_date']['after']['day'] : '';
    $between_two_date_before_year = !empty($post_grid_options['date_query']['between_two_date']['before']['year']) ? $post_grid_options['date_query']['between_two_date']['before']['year'] : '';
    $between_two_date_before_month = !empty($post_grid_options['date_query']['between_two_date']['before']['month']) ? $post_grid_options['date_query']['between_two_date']['before']['month'] : '';
    $between_two_date_before_day = !empty($post_grid_options['date_query']['between_two_date']['before']['day']) ? $post_grid_options['date_query']['between_two_date']['before']['day'] : '';
    $between_two_date_inclusive = !empty($post_grid_options['date_query']['between_two_date']['inclusive']) ? $post_grid_options['date_query']['between_two_date']['inclusive'] : 'true';


    $author_query_type = !empty($post_grid_options['author_query']['type']) ? $post_grid_options['author_query']['type'] : 'none';
    $author__in = !empty($post_grid_options['author_query']['author__in']) ? $post_grid_options['author_query']['author__in'] : '';

    $author__not_in = !empty($post_grid_options['author_query']['author__not_in']) ? $post_grid_options['author_query']['author__not_in'] : '';

    $password_query_type = !empty($post_grid_options['password_query']['type']) ? $post_grid_options['password_query']['type'] : 'none';
    $password_query_has_password = !empty($post_grid_options['password_query']['has_password']) ? $post_grid_options['password_query']['has_password'] : 'null';
    $password_query_post_password = !empty($post_grid_options['password_query']['post_password']) ? $post_grid_options['password_query']['post_password'] : '';


    //echo '<pre>' . var_export($post_grid_options, true) . '</pre>';



    $meta_query_args = array();

    if (!empty($meta_query)) :

        $i = 0;
        foreach ($meta_query as  $meta_queryIndex => $meta_queryData) :
            $arg_type = isset($meta_queryData['arg_type']) ? $meta_queryData['arg_type'] : "";
            $relation = isset($meta_queryData['relation']) ? $meta_queryData['relation'] : "";

            if ($arg_type == 'single') :
                $meta_query_args[$meta_queryIndex]['key'] = isset($meta_queryData['key']) ? $meta_queryData['key'] : "";
                $meta_query_args[$meta_queryIndex]['value'] = do_shortcode(isset($meta_queryData['value']) ? $meta_queryData['value'] : "");
                $meta_query_args[$meta_queryIndex]['compare'] = htmlspecialchars_decode(isset($meta_queryData['compare']) ? $meta_queryData['compare'] : "", ENT_QUOTES);
                $meta_query_args[$meta_queryIndex]['type'] = isset($meta_queryData['type']) ? $meta_queryData['type'] : "";

            elseif ($arg_type == 'group') :
                $group_args = isset($meta_queryData['args']) ? $meta_queryData['args'] : array();

                if (!empty($group_args)) :
                    $meta_query_args[$meta_queryIndex]['relation'] = $relation;
                    foreach ($group_args as $argIndex => $arg) :
                        $meta_query_args[$meta_queryIndex][$argIndex]['key'] = isset($arg['key']) ? $arg['key'] : "";
                        $meta_query_args[$meta_queryIndex][$argIndex]['value'] = do_shortcode(isset($arg['value']) ? $arg['value'] : "");
                        $meta_query_args[$meta_queryIndex][$argIndex]['compare'] = htmlspecialchars_decode(isset($arg['compare']) ? $arg['compare'] : "", ENT_QUOTES);
                        $meta_query_args[$meta_queryIndex][$argIndex]['type'] = isset($arg['type']) ? $arg['type'] : "";
                    endforeach;
                endif;
            endif;
        endforeach;
    endif;

    $meta_query = $meta_query_args;
    if (!empty($meta_query)) {
        $meta_query_relation = array('relation' => $meta_query_relation);
        $meta_query = array_merge(isset($meta_query_relation) ? $meta_query_relation : "", $meta_query);
    }

    if (!empty($meta_query))
        $query_args['meta_query'] = isset($meta_query) ? $meta_query : "";


    /* ################################ Date query ######################################*/

    if ($date_query_type == 'extact_date') {
        $query_args['date_query'] = array(
            'year'  => do_shortcode($extact_date_year),
            'month' => do_shortcode($extact_date_month),
            'day'   => do_shortcode($extact_date_day),
        );
    } elseif ($date_query_type == 'between_two_date') {


        if (!empty($between_two_date_after_year)) {

            $query_args['date_query']['after'] = array(
                'year'  => do_shortcode($between_two_date_after_year),
                'month' => do_shortcode($between_two_date_after_month),
                'day'   => do_shortcode($between_two_date_after_day),
            );
        }


        if (!empty($between_two_date_before_year)) {

            $query_args['date_query']['before'] = array(
                'year'  => do_shortcode($between_two_date_before_year),
                'month' => do_shortcode($between_two_date_before_month),
                'day'   => do_shortcode($between_two_date_before_day),
            );
        }



        if (!empty($between_two_date_inclusive)) {

            $query_args['date_query']['inclusive'] = ($between_two_date_inclusive == 'true') ? true : false;
        }


        // $query_args['date_query'] = array(

        //     array(
        //         'after'    => array(
        //             'year'  => do_shortcode($between_two_date_after_year),
        //             'month' => do_shortcode($between_two_date_after_month),
        //             'day'   => do_shortcode($between_two_date_after_day),
        //         ),
        //         'before'    => array(
        //             'year'  => do_shortcode($between_two_date_before_year),
        //             'month' => do_shortcode($between_two_date_before_month),
        //             'day'   => do_shortcode($between_two_date_before_day),
        //         ),
        //         'inclusive' => $between_two_date_inclusive,
        //     )
        // );
    }


    /* ################################ Permission query ######################################*/

    if ($permission_query == 'enable') {
        $query_args['perm'] = 'readable';
    }


    /* ################################ Password query ######################################*/

    if ($password_query_type == 'has_password') {
        $query_args['has_password'] = isset($password_query_has_password) ? $password_query_has_password : "";
    } elseif ($password_query_type == 'post_password') {
        $query_args['post_password'] = isset($password_query_post_password) ? $password_query_post_password : "";
    }

    /* ################################ Author query ######################################*/

    $author__in = explode(',', $author__in);
    $author__not_in = explode(',', $author__not_in);


    if ($author_query_type == 'author__in') {
        $query_args['author__in'] = isset($author__in) ? $author__in : "";
    } elseif ($author_query_type == 'author__not_in') {
        $query_args['author__not_in'] = isset($author__not_in) ? $author__not_in : "";
    } elseif ($author_query_type == 'author__in_logged') {
        $query_args['author'] = get_current_user_id();
    }



    if ($sticky_post_query_type == 'exclude') {
        $sticky_posts = get_option('sticky_posts');

        $query_args['post__not_in'] = !empty($query_args['post__not_in']) ? array_merge($query_args['post__not_in'], $sticky_posts) : $sticky_posts;
    }





    /* ################################ Archive pages ######################################*/

    //var_dump($ignore_paged);

    if ($ignore_paged == 'no') :
        if (is_category() || is_tag() || is_tax()) {
            $term = get_queried_object();
            $taxonomy = $term->taxonomy;
            $terms = $term->term_id;

            $tax_query[] = array(
                'taxonomy' => $taxonomy,
                'field'    => 'id',
                'terms'    => $terms,
            );


            $query_args['tax_query'] = $tax_query;
        }


        /* ################################ Author pages ######################################*/


        if (is_author()) {


            $author = get_queried_object();
            $author_id = isset($author->ID) ? $author->ID : '';



            if (!empty($author_id))
                $query_args['author'] = $author->ID;
        }


        /* ################################ Search pages ######################################*/

        if (is_search()) {
            $keyword = get_search_query();
            $query_args['s'] = $keyword;
        }


        if (is_year()) {
            $archive_year = get_the_date('Y');

            $query_args['date_query'] = array('year'  => $archive_year);
        }

        if (is_month()) {
            $archive_year = get_the_date('Y');
            $archive_month = get_the_date('m');


            $query_args['date_query'] = array('year'  => $archive_year, 'month' => $archive_month);
        }

        if (is_day()) {
            $archive_year = get_the_date('Y');
            $archive_month = get_the_date('m');
            $archive_day = get_the_date('d');


            $query_args['date_query'] = array('year'  => $archive_year, 'month' => $archive_month, 'day'   => $archive_day);
        }



    endif;

    /*More Query parameter string to array*/
    if (!empty($extra_query_parameter)) {

        $extra_query_parameter = explode('&', $extra_query_parameter);

        foreach ($extra_query_parameter as $parameter) {

            $parameter = do_shortcode($parameter);
            $parameter = explode('=', $parameter);

            if (strpos($parameter[1], ',') !== false) {
                $parameter_args = explode(',', do_shortcode($parameter[1]));
                $query_parameter[$parameter[0]] = $parameter_args;
            } else {
                $query_parameter[$parameter[0]] = ($parameter[1]);
            }
        }
    } else {
        $query_parameter = array();
    }

    $ignore_sticky_posts = (int) $ignore_sticky_posts;


    if (!empty($ignore_sticky_posts))
        $query_args['ignore_sticky_posts'] = $ignore_sticky_posts;



    if (!empty($query_parameter))
        $query_args = array_merge($query_args, $query_parameter);


    if ($grid_type == 'filterable') {
        $query_args['posts_per_page'] = -1;
    }



    return $query_args;
}




add_filter('post_grid_grid_items_class', 'post_grid_pro_grid_items_class', 10, 2);

function post_grid_pro_grid_items_class($class, $args)
{

    $post_grid_options = $args['options'];
    $grid_type = isset($post_grid_options['grid_type']) ? $post_grid_options['grid_type'] : 'grid';

    if ($grid_type == 'grid') {
    } elseif ($grid_type == 'filterable') {
    } elseif ($grid_type == 'slider') {
        $class .= ' owl-carousel';
    } elseif ($grid_type == 'glossary') {
    }


    wp_enqueue_script('post_grid_pro_scripts');
    wp_localize_script('post_grid_pro_scripts', 'post_grid_ajax', array('post_grid_ajaxurl' => admin_url('admin-ajax.php')));

    return $class;
}




add_filter('post_grid_item_classes', 'post_grid_pro_item_classes', 10, 2);

function post_grid_pro_item_classes($class, $args)
{

    $post_grid_options = $args['options'];
    $grid_type = isset($post_grid_options['grid_type']) ? $post_grid_options['grid_type'] : 'grid';
    $post_id = $args['post_id'];

    if ($grid_type == 'grid') {
    } elseif ($grid_type == 'filterable') {
        $class['post_term_slug'] = post_grid_term_slug_list($post_id);
        $class['mix'] = 'mix';
    } elseif ($grid_type == 'slider') {
    } elseif ($grid_type == 'glossary') {
        $class['post_term_slug'] = post_grid_term_slug_list($post_id);
        $class['mix'] = 'mix';
        $glossary_str = get_the_title($post_id);
        $glossary_cha = isset($glossary_str[0]) ? $glossary_str[0] : '';
        $class['glossary'] = $glossary_cha;
    }


    wp_enqueue_script('post_grid_pro_scripts');
    wp_localize_script('post_grid_pro_scripts', 'post_grid_ajax', array('post_grid_ajaxurl' => admin_url('admin-ajax.php')));

    return $class;
}

add_filter('post_grid_masonry_load', 'post_grid_pro_masonry_load', 10, 2);

function post_grid_pro_masonry_load($return, $args)
{

    $post_grid_options = $args['options'];
    $grid_type = isset($post_grid_options['grid_type']) ? $post_grid_options['grid_type'] : 'grid';
    //$post_id = $args['post_id'];

    if ($grid_type == 'grid') {

        $return = true;
    } elseif ($grid_type == 'filterable') {
        $return = true;
    } elseif ($grid_type == 'slider') {

        $return = false;
    } elseif ($grid_type == 'glossary') {
        $return = true;
    }


    return $return;
}

add_filter('post_grid_grid_layouts', 'post_grid_pro_grid_layouts', 10);

function post_grid_pro_grid_layouts($grid_layout_args)
{

    $grid_layout_args['layout_1_N'] = array('name' => '1 - N',  'thumb' => post_grid_plugin_url . 'assets/admin/images/layout_1_N.png',);
    $grid_layout_args['layout_N_1'] = array('name' => 'N - 1',  'thumb' => post_grid_plugin_url . 'assets/admin/images/layout_N_1.png',);
    $grid_layout_args['layout_1_N_1'] = array('name' => '1 - N - 1',  'thumb' => post_grid_plugin_url . 'assets/admin/images/layout_1_N_1.png',);
    $grid_layout_args['layout_L_R'] = array('name' => 'L - R',  'thumb' => post_grid_plugin_url . 'assets/admin/images/layout_L_R.png',);



    return $grid_layout_args;
}







add_action('post_grid_loop_top', 'post_grid_pro_glossary_navs', 10);

function post_grid_pro_glossary_navs($args)
{
    $post_grid_options = $args['options'];
    $grid_id = (int)$args['grid_id'];

    $grid_type = isset($post_grid_options['grid_type']) ? $post_grid_options['grid_type'] : 'grid';
    if ($grid_type != 'glossary') return;

    $nav_top_filter_style = !empty($post_grid_options['nav_top']['filter_style']) ? $post_grid_options['nav_top']['filter_style'] : 'inline';
    $filter_all_text = !empty($post_grid_options['nav_top']['filter_all_text']) ? $post_grid_options['nav_top']['filter_all_text'] : __('All', 'post-grid');


?><div class="grid-nav-top">
        <div class="nav-filter">
            <?php
            if ($nav_top_filter_style == 'inline') {

                global $wp_query;
                $get_glossary_index = post_grid_pro_glossary_index($wp_query);
                $count_glossary_index = array_count_values($get_glossary_index);

                ksort($count_glossary_index);



                if (!empty($count_glossary_index)) {
            ?>
                    <div class="filter filter-<?php echo esc_attr($grid_id); ?>" data-filter="all"><?php echo esc_html($filter_all_text); ?></div>
                    <?php
                    foreach ($count_glossary_index as $index => $count) {

                        if (!empty($index)) :
                    ?>
                            <div class="filter filter-<?php echo esc_attr($grid_id); ?>" terms-id="<?php echo esc_attr($index); ?>" data-filter=".<?php echo esc_attr($index); ?>"><?php echo esc_attr($index); ?></div>
            <?php

                        endif;
                    }
                }
            }
            ?>
        </div>
    </div>

<?php


}

add_action('post_grid_container', 'post_grid_pro_filterable_navs', 10);

function post_grid_pro_filterable_navs($args)
{
    $post_grid_options = $args['options'];
    $grid_id = (int) $args['grid_id'];

    $grid_type = isset($post_grid_options['grid_type']) ? $post_grid_options['grid_type'] : 'grid';
    if ($grid_type != 'filterable') return;


    $taxonomies = !empty($post_grid_options['taxonomies']) ? $post_grid_options['taxonomies'] : array();

    $nav_top_filter = !empty($post_grid_options['nav_top']['filter']) ? $post_grid_options['nav_top']['filter'] : 'yes';
    $nav_top_filter_style = !empty($post_grid_options['nav_top']['filter_style']) ? $post_grid_options['nav_top']['filter_style'] : 'inline';
    $filterable_post_per_page = !empty($post_grid_options['nav_top']['filterable_post_per_page']) ? $post_grid_options['nav_top']['filterable_post_per_page'] : '6';
    $filterable_font_size = !empty($post_grid_options['nav_top']['filterable_font_size']) ? $post_grid_options['nav_top']['filterable_font_size'] : '14px';
    $filterable_navs_margin = !empty($post_grid_options['nav_top']['filterable_navs_margin']) ? $post_grid_options['nav_top']['filterable_navs_margin'] : '5px';

    $filterable_font_color = !empty($post_grid_options['nav_top']['filterable_font_color']) ? $post_grid_options['nav_top']['filterable_font_color'] : '#999';
    $filterable_bg_color = !empty($post_grid_options['nav_top']['filterable_bg_color']) ? $post_grid_options['nav_top']['filterable_bg_color'] : '#fff';
    $filterable_active_bg_color = !empty($post_grid_options['nav_top']['filterable_active_bg_color']) ? $post_grid_options['nav_top']['filterable_active_bg_color'] : '#ddd';
    $filter_all_text = !empty($post_grid_options['nav_top']['filter_all_text']) ? $post_grid_options['nav_top']['filter_all_text'] : 'All';
    $active_filter = !empty($post_grid_options['nav_top']['active_filter']) ? $post_grid_options['nav_top']['active_filter'] : '';
    $display_post_count = !empty($post_grid_options['nav_top']['display_post_count']) ? $post_grid_options['nav_top']['display_post_count'] : 'no';
    $display_sort_filter = !empty($post_grid_options['nav_top']['display_sort_filter']) ? $post_grid_options['nav_top']['display_sort_filter'] : 'no';

    $filter_type = !empty($post_grid_options['nav_top']['filter_type']) ? $post_grid_options['nav_top']['filter_type'] : 'single';
    $filter_all_text = !empty($post_grid_options['nav_top']['filter_all_text']) ? $post_grid_options['nav_top']['filter_all_text'] : 'All';


    $enable_multi_filter = !empty($post_grid_options['nav_top']['enable_multi_filter']) ? $post_grid_options['nav_top']['enable_multi_filter'] : 'no';
    $filter_by = !empty($post_grid_options['nav_top']['filter_by']) ? $post_grid_options['nav_top']['filter_by'] : 'taxonomy';
    $multi_filter_group = !empty($post_grid_options['nav_top']['multi_filter_group']) ? $post_grid_options['nav_top']['multi_filter_group'] : array();
    $filter_toggle = !empty($post_grid_options['nav_top']['filter_toggle']) ? $post_grid_options['nav_top']['filter_toggle'] : 'yes';


    $categories = !empty($post_grid_options['categories']) ? $post_grid_options['categories'] : array();

    if ($nav_top_filter == 'no') return '';

?>
    <div class="grid-nav-top">
        <div class="nav-filter">
            <form>

                <?php


                if ($filter_by == 'taxonomy') {


                    if ($filter_type == 'single') :


                        if ($nav_top_filter_style == 'inline') :

                            foreach ($taxonomies as $taxonomy => $taxonomyData) {
                                $terms = !empty($taxonomyData['terms']) ? $taxonomyData['terms'] : array();
                                $terms_relation = !empty($taxonomyData['terms_relation']) ? $taxonomyData['terms_relation'] : 'OR';
                                $checked = !empty($taxonomyData['checked']) ? $taxonomyData['checked'] : '';
                                if (!empty($terms) && !empty($checked)) {
                                    $terms_ids[$taxonomy] = $terms;
                                }
                            }


                            if (!empty($terms_ids)) :
                ?>

                                <div class="filter-group">

                                    <div class="filter filter-<?php echo esc_attr($grid_id); ?>" data-filter="all">
                                        <span class="filter-name"><?php echo esc_html($filter_all_text); ?></span>
                                    </div>

                                    <?php
                                    foreach ($terms_ids as $tax_name => $ids) {

                                        foreach ($ids as  $id) {
                                            $term = get_term($id, $tax_name);
                                            $term_slug = isset($term->slug) ? $term->slug : '';
                                            $term_name = isset($term->name) ? $term->name : '';
                                            $term_count = isset($term->count) ? $term->count : '';
                                    ?>
                                            <div class="filter filter-<?php echo esc_attr($grid_id); ?>" terms-id="<?php echo esc_attr($id); ?>" <?php if ($filter_toggle == 'yes') : ?> data-toggle=".<?php echo esc_attr($term_slug); ?>" <?php else : ?> data-filter=".<?php echo esc_attr($term_slug); ?>" <?php endif; ?>>
                                                <span class="filter-name"><?php echo esc_attr($term_name); ?></span>
                                                <?php if ($display_post_count == 'yes') : ?>
                                                    <span class="filter-name">(<?php echo esc_attr($term_count); ?>)</span>
                                                <?php endif; ?>
                                            </div>
                                    <?php
                                        }
                                    }

                                    ?>


                                </div>



                                <?php if ($display_sort_filter == 'yes') : ?>
                                    <div class="filter-group">
                                        <div class="filter filter-<?php echo esc_attr($grid_id); ?>" data-sort="default:asc">Asc</div>
                                        <div class="filter filter-<?php echo esc_attr($grid_id); ?>" data-sort="default:desc">Desc</div>
                                    </div>
                                <?php endif; ?>


                            <?php


                            endif;

                        elseif ($nav_top_filter_style == 'dropdown') :
                            ?>
                            <div class="filter-group">
                                <select id="FilterSelect" class="filter">
                                    <?php
                                    if (!empty($taxonomies)) {
                                        foreach ($taxonomies as $taxonomy => $taxonomyData) {
                                            $terms = !empty($taxonomyData['terms']) ? $taxonomyData['terms'] : array();
                                            $terms_relation = !empty($taxonomyData['terms_relation']) ? $taxonomyData['terms_relation'] : 'OR';
                                            $checked = !empty($taxonomyData['checked']) ? $taxonomyData['checked'] : '';
                                            if (!empty($terms) && !empty($checked)) {
                                                $terms_ids[$taxonomy] = $terms;
                                            }
                                        }
                                    ?>
                                        <option value="all"><?php echo esc_html($filter_all_text); ?></option>
                                        <?php
                                        foreach ($terms_ids as $tax_name => $ids) {
                                            foreach ($ids as  $id) {
                                                $term = get_term($id, $tax_name);
                                                $term_slug = isset($term->slug) ? $term->slug : '';
                                                $term_name = isset($term->name) ? $term->name : '';
                                        ?>
                                                <option data-mixitup-control terms-id="<?php //echo $term_info[0]; 
                                                                                        ?>" <?php if ($filter_toggle == 'yes') : ?> data-toggle=".<?php echo esc_attr($term_slug); ?>" <?php else : ?> data-filter=".<?php echo esc_attr($term_slug); ?>" <?php endif; ?> value=".<?php echo esc_attr($term_slug); ?>"><?php echo esc_attr($term_name); ?></option>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                </select>
                            </div>

                            <?php
                        endif;



                    elseif ($filter_type == 'group') :


                        if ($nav_top_filter_style == 'inline') :

                            foreach ($taxonomies as $taxonomy => $taxonomyData) {
                                $terms = !empty($taxonomyData['terms']) ? $taxonomyData['terms'] : array();
                                $terms_relation = !empty($taxonomyData['terms_relation']) ? $taxonomyData['terms_relation'] : 'OR';
                                $checked = !empty($taxonomyData['checked']) ? $taxonomyData['checked'] : '';
                                if (!empty($terms) && !empty($checked)) {
                                    $terms_ids[$taxonomy] = $terms;
                                }
                            }


                            if (!empty($terms_ids)) :
                            ?>

                                <div class="filter-group" data-filter-group>
                                    <button class="filter filter-<?php echo esc_attr($grid_id); ?>" type="reset"><?php echo esc_attr($filter_all_text); ?></button>
                                </div>


                                <?php
                                foreach ($terms_ids as $tax_name => $ids) {

                                ?>
                                    <div class="filter-group" data-filter-group>


                                        <?php

                                        foreach ($ids as  $id) {
                                            $term = get_term($id, $tax_name);
                                            $term_slug = isset($term->slug) ? $term->slug : '';
                                            $term_name = isset($term->name) ? $term->name : '';
                                            $term_count = isset($term->count) ? $term->count : '';
                                        ?>
                                            <div class="filter filter-<?php echo esc_attr($grid_id); ?>" terms-id="<?php echo esc_attr($id); ?>" <?php if ($filter_toggle == 'yes') : ?> data-toggle=".<?php echo esc_attr($term_slug); ?>" <?php else : ?> data-filter=".<?php echo esc_attr($term_slug); ?>" <?php endif; ?>>
                                                <span class="filter-name"><?php echo esc_attr($term_name); ?></span>
                                                <?php if ($display_post_count == 'yes') : ?>
                                                    <span class="filter-name">(<?php echo esc_attr($term_count); ?>)</span>
                                                <?php endif; ?>

                                            </div>
                                        <?php
                                        }

                                        ?>


                                    </div>
                                <?php

                                }

                                ?>
                                <?php if ($display_sort_filter == 'yes') : ?>
                                    <div class="filter-group" data-filter-group>
                                        <div class="filter filter-<?php echo esc_attr($grid_id); ?>" data-sort="default:asc">Asc</div>
                                        <div class="filter filter-<?php echo esc_attr($grid_id); ?>" data-sort="default:desc">Desc</div>
                                    </div>
                                <?php endif; ?>


                            <?php


                            endif;

                        elseif ($nav_top_filter_style == 'dropdown') :
                            ?>
                            <select id="FilterSelect" class="filter">
                                <?php
                                if (!empty($taxonomies)) {
                                    foreach ($taxonomies as $taxonomy => $taxonomyData) {
                                        $terms = !empty($taxonomyData['terms']) ? $taxonomyData['terms'] : array();
                                        $terms_relation = !empty($taxonomyData['terms_relation']) ? $taxonomyData['terms_relation'] : 'OR';
                                        $checked = !empty($taxonomyData['checked']) ? $taxonomyData['checked'] : '';
                                        if (!empty($terms) && !empty($checked)) {
                                            $terms_ids[$taxonomy] = $terms;
                                        }
                                    }
                                ?>
                                    <option value="all"><?php echo esc_attr($filter_all_text); ?></option>
                                    <?php
                                    foreach ($terms_ids as $tax_name => $ids) {
                                        foreach ($ids as  $id) {
                                            $term = get_term($id, $tax_name);
                                            $term_slug = isset($term->slug) ? $term->slug : '';
                                            $term_name = isset($term->name) ? $term->name : '';
                                    ?>
                                            <option terms-id="<?php //echo $term_info[0]; 
                                                                ?>" value=".<?php echo esc_attr($term_slug); ?>"><?php echo esc_attr($term_name); ?></option>
                                <?php
                                        }
                                    }
                                }
                                ?>
                            </select>

                        <?php
                        endif;
                    endif;
                } else {


                    if ($filter_type == 'single') {



                        ?>


                        <div class="filter filter-<?php echo esc_attr($grid_id); ?>" data-filter="all">
                            <?php echo esc_attr($filter_all_text); ?>
                        </div>



                        <?php


                        foreach ($multi_filter_group as $groupIndex => $groupData) :

                            $group_name = isset($groupData['name']) ? $groupData['name'] : '';
                            $group_name_display = isset($groupData['name_display']) ? $groupData['name_display'] : '';

                            $group_type = isset($groupData['type']) ? $groupData['type'] : 'inline';
                            $group_data_logic = isset($groupData['data_logic']) ? $groupData['data_logic'] : 'or';
                            $group_filter_args = isset($groupData['filter_args']) ? $groupData['filter_args'] : array();


                            $group_filter_args = explode(',', $group_filter_args);



                        ?>

                            <?php

                            if ($group_type == 'inline') :

                                foreach ($group_filter_args as $filterData) :
                                    $filter = explode('|', $filterData);

                                    $filter_name = isset($filter[0]) ? $filter[0] : '';
                                    $filter_id = isset($filter[1]) ? str_replace(' ', '', $filter[1]) : '';

                                    if (!empty($filter_name)) :
                            ?>
                                        <div class="filter filter-<?php echo esc_attr($grid_id); ?>" <?php if ($filter_toggle == 'yes') : ?> data-toggle="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" <?php else : ?> data-filter="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" <?php endif; ?>>
                                            <span class="filter-name"><?php echo esc_attr($filter_name); ?></span>
                                        </div>
                                <?php
                                    endif;




                                endforeach;

                            elseif ($group_type == 'dropdown') :

                                ?>
                                <select class="filter">
                                    <?php

                                    foreach ($group_filter_args as $filterData) :
                                        $filter = explode('|', $filterData);

                                        $filter_name = isset($filter[0]) ? $filter[0] : '';
                                        $filter_id = isset($filter[1]) ? str_replace(' ', '', $filter[1]) : '';


                                    ?>
                                        <option data-filter="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" value="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>">
                                            <span class="filter-name"><?php echo esc_attr($filter_name); ?></span>
                                        </option>
                                    <?php


                                    endforeach;

                                    ?>
                                </select>
                                <?php



                            elseif ($group_type == 'radio') :

                                foreach ($group_filter_args as $filterData) :
                                    $filter = explode('|', $filterData);
                                    $filter_name = isset($filter[0]) ? $filter[0] : '';
                                    $filter_id = isset($filter[1]) ? str_replace(' ', '', $filter[1]) : '';
                                ?>
                                    <label>
                                        <input name="<?php echo esc_attr($groupIndex); ?>" type="radio" data-filter="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" value="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" />
                                        <span class="filter-name"><?php echo esc_attr($filter_name); ?></span>
                                    </label>
                                <?php
                                endforeach;


                            elseif ($group_type == 'checkbox') :

                                foreach ($group_filter_args as $filterData) :
                                    $filter = explode('|', $filterData);
                                    $filter_name = isset($filter[0]) ? $filter[0] : '';
                                    $filter_id = isset($filter[1]) ? str_replace(' ', '', $filter[1]) : '';
                                ?>
                                    <label>
                                        <input name="<?php echo esc_attr($groupIndex); ?>" type="checkbox" data-filter="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . $filter_id; ?>" value="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" />
                                        <span class="filter-name"><?php echo esc_attr($filter_name); ?></span>
                                    </label>
                            <?php
                                endforeach;

                            endif;



                            ?>
                        <?php

                        endforeach;

                        ?>


                        <?php if ($display_sort_filter == 'yes') : ?>
                            <div class="filter-group" data-filter-group data-logic="or">
                                <div class="filter filter-<?php echo esc_attr($grid_id); ?>" data-sort="default:asc">Asc</div>
                                <div class="filter filter-<?php echo esc_attr($grid_id); ?>" data-sort="default:desc">Desc</div>
                            </div>
                        <?php endif; ?>






                    <?php







                    } else {


                    ?>


                        <div class="filter-group" data-filter-group data-logic="or">
                            <button class="filter filter-<?php echo esc_attr($grid_id); ?>" type="reset"><?php echo esc_attr($filter_all_text); ?></button>
                        </div>

                        <?php


                        foreach ($multi_filter_group as $groupIndex => $groupData) :

                            $group_name = isset($groupData['name']) ? $groupData['name'] : '';
                            $group_name_display = isset($groupData['name_display']) ? $groupData['name_display'] : '';

                            $group_type = isset($groupData['type']) ? $groupData['type'] : 'inline';
                            $group_data_logic = isset($groupData['data_logic']) ? $groupData['data_logic'] : 'or';
                            $group_filter_args = isset($groupData['filter_args']) ? $groupData['filter_args'] : array();


                            $group_filter_args = explode(',', $group_filter_args);



                        ?>
                            <div class="filter-group" data-filter-group data-logic="<?php echo esc_attr($group_data_logic); ?>">
                                <?php if (!empty($group_name) && $group_name_display == 'yes') : ?>
                                    <div class="filter-group-title"><?php echo esc_attr($group_name); ?></div>
                                <?php endif; ?>
                                <?php

                                if ($group_type == 'inline') :

                                    foreach ($group_filter_args as $filterData) :
                                        $filter = explode('|', $filterData);

                                        $filter_name = isset($filter[0]) ? $filter[0] : '';
                                        $filter_id = isset($filter[1]) ? str_replace(' ', '', $filter[1]) : '';

                                        if (!empty($filter_name)) :
                                ?>
                                            <div class="filter filter-<?php echo esc_attr($grid_id); ?>" <?php if ($filter_toggle == 'yes') : ?> data-toggle="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" <?php else : ?> data-filter="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" <?php endif; ?>>
                                                <span class="filter-name"><?php echo esc_attr($filter_name); ?></span>
                                            </div>
                                    <?php
                                        endif;




                                    endforeach;

                                elseif ($group_type == 'dropdown') :

                                    ?>
                                    <select class="filter">
                                        <?php

                                        foreach ($group_filter_args as $filterData) :
                                            $filter = explode('|', $filterData);

                                            $filter_name = isset($filter[0]) ? $filter[0] : '';
                                            $filter_id = isset($filter[1]) ? str_replace(' ', '', $filter[1]) : '';


                                        ?>
                                            <option data-filter="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" value="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>">
                                                <span class="filter-name"><?php echo esc_attr($filter_name); ?></span>
                                            </option>
                                        <?php


                                        endforeach;

                                        ?>
                                    </select>
                                    <?php



                                elseif ($group_type == 'radio') :

                                    foreach ($group_filter_args as $filterData) :
                                        $filter = explode('|', $filterData);
                                        $filter_name = isset($filter[0]) ? $filter[0] : '';
                                        $filter_id = isset($filter[1]) ? str_replace(' ', '', $filter[1]) : '';
                                    ?>
                                        <label>
                                            <input name="<?php echo esc_attr($groupIndex); ?>" type="radio" data-filter="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" value="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" />
                                            <span class="filter-name"><?php echo esc_attr($filter_name); ?></span>
                                        </label>
                                    <?php
                                    endforeach;


                                elseif ($group_type == 'checkbox') :

                                    foreach ($group_filter_args as $filterData) :
                                        $filter = explode('|', $filterData);
                                        $filter_name = isset($filter[0]) ? $filter[0] : '';
                                        $filter_id = isset($filter[1]) ? str_replace(' ', '', $filter[1]) : '';
                                    ?>
                                        <label>
                                            <input name="<?php echo esc_attr($groupIndex); ?>" type="checkbox" data-filter="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" value="<?php echo ($filter_id == 'all' || $filter_id == '') ? 'all' : '.' . esc_attr($filter_id); ?>" />
                                            <span class="filter-name"><?php echo esc_attr($filter_name); ?></span>
                                        </label>
                                <?php
                                    endforeach;

                                endif;



                                ?>
                            </div>
                        <?php

                        endforeach;

                        ?>


                        <?php if ($display_sort_filter == 'yes') : ?>
                            <div class="filter-group" data-filter-group data-logic="or">
                                <div class="filter filter-<?php echo esc_attr($grid_id); ?>" data-sort="default:asc">Asc</div>
                                <div class="filter filter-<?php echo esc_attr($grid_id); ?>" data-sort="default:desc">Desc</div>
                            </div>
                        <?php endif; ?>






                <?php



                    }
                }




                ?>
            </form>
        </div> <!-- .nav-filter -->


    </div>

<?php


}






add_action('post_grid_container', 'post_grid_container_scripts', 90);

function post_grid_container_scripts($args)
{
    wp_enqueue_script('post_grid_pro_scripts');
}




add_action('post_grid_container', 'post_grid_pro_scripts_slider', 90);

function post_grid_pro_scripts_slider($args)
{
    $post_grid_options = $args['options'];


    $grid_type = isset($post_grid_options['grid_type']) ? $post_grid_options['grid_type'] : 'grid';

    if ($grid_type != 'slider') return;

    $grid_id = $args['grid_id'];

    wp_enqueue_script('owl-carousel');
    wp_enqueue_style('owl-carousel');


    $slider_navs = !empty($post_grid_options['slider_navs']) ? $post_grid_options['slider_navs'] : 'true';
    $slider_navs_position = !empty($post_grid_options['slider_navs_position']) ? $post_grid_options['slider_navs_position'] : 'top-left';
    $slider_navs_style = !empty($post_grid_options['slider_navs_style']) ? $post_grid_options['slider_navs_style'] : 'round';

    $slider_dots = !empty($post_grid_options['slider_dots']) ? $post_grid_options['slider_dots'] : 'true';
    $slider_dots_style = !empty($post_grid_options['slider_dots_style']) ? $post_grid_options['slider_dots_style'] : 'round';

    $slider_auto_play = !empty($post_grid_options['slider_auto_play']) ? $post_grid_options['slider_auto_play'] : 'true';
    $slider_auto_play_timeout = !empty($post_grid_options['slider_auto_play_timeout']) ? $post_grid_options['slider_auto_play_timeout'] : '2000';
    $slider_auto_play_speed = !empty($post_grid_options['slider_auto_play_speed']) ? $post_grid_options['slider_auto_play_speed'] : '3000';

    $slider_rewind = !empty($post_grid_options['slider_rewind']) ? $post_grid_options['slider_rewind'] : 'false';
    $slider_loop = !empty($post_grid_options['slider_loop']) ? $post_grid_options['slider_loop'] : 'false';
    $slider_center = !empty($post_grid_options['slider_center']) ? $post_grid_options['slider_center'] : 'false';
    $slider_autoplayHoverPause = !empty($post_grid_options['slider_autoplayHoverPause']) ? $post_grid_options['slider_autoplayHoverPause'] : 'true';
    $slider_navSpeed = !empty($post_grid_options['slider_navSpeed']) ? $post_grid_options['slider_navSpeed'] : '2000';
    $slider_dotsSpeed = !empty($post_grid_options['slider_dotsSpeed']) ? $post_grid_options['slider_dotsSpeed'] : '3000';
    $slider_touchDrag = !empty($post_grid_options['slider_touchDrag']) ? $post_grid_options['slider_touchDrag'] : 'true';
    $slider_mouseDrag = !empty($post_grid_options['slider_mouseDrag']) ? $post_grid_options['slider_mouseDrag'] : 'true';

    $slider_column_desktop = !empty($post_grid_options['slider_column_desktop']) ? $post_grid_options['slider_column_desktop'] : '4';
    $slider_column_tablet = !empty($post_grid_options['slider_column_tablet']) ? $post_grid_options['slider_column_tablet'] : '2';
    $slider_column_mobile = !empty($post_grid_options['slider_column_mobile']) ? $post_grid_options['slider_column_mobile'] : '1';



    $post_grid_settings = get_option('post_grid_settings');
    $font_aw_version = isset($post_grid_settings['font_aw_version']) ? $post_grid_settings['font_aw_version'] : 'none';

    if ($font_aw_version == 'v_5') {
        $navigation_text_prev = '<i class="fas fa-chevron-left"></i>';
        $navigation_text_next = '<i class="fas fa-chevron-right"></i>';
    } elseif ($font_aw_version == 'v_4') {
        $navigation_text_prev = '<i class="fa fa-chevron-left"></i>';
        $navigation_text_next = '<i class="fa fa-chevron-right"></i>';
    } else {
        $navigation_text_prev = '<i class="fas fa-chevron-left"></i>';
        $navigation_text_next = '<i class="fas fa-chevron-right"></i>';
    }


    $navigation_text_prev = !empty($post_grid_options['slider_navs_text_prev']) ? $post_grid_options['slider_navs_text_prev'] : $navigation_text_prev;
    $navigation_text_next = !empty($post_grid_options['slider_navs_text_next']) ? $post_grid_options['slider_navs_text_next'] : $navigation_text_next;
    $slider_dots_style = !empty($post_grid_options['slider_dots_style']) ? $post_grid_options['slider_dots_style'] : '';


?>
    <script>
        jQuery(document).ready(function($) {
            $("<?php echo '#post-grid-' . esc_attr($grid_id); ?> .grid-items").owlCarousel({
                items: 3,
                responsiveClass: true,
                responsive: {
                    0: {
                        items: <?php echo esc_attr($slider_column_mobile); ?>,

                    },
                    600: {
                        items: <?php echo esc_attr($slider_column_tablet); ?>,

                    },
                    900: {
                        items: <?php echo esc_attr($slider_column_tablet); ?>,

                    },
                    1000: {
                        items: <?php echo esc_attr($slider_column_desktop); ?>,

                    }
                },
                loop: <?php echo esc_attr($slider_loop); ?>,
                rewind: <?php echo esc_attr($slider_rewind); ?>,
                center: <?php echo esc_attr($slider_center); ?>,
                autoplay: <?php echo esc_attr($slider_auto_play); ?>,
                autoplaySpeed: <?php echo esc_attr($slider_auto_play_speed); ?>,
                autoplayTimeout: <?php echo esc_attr($slider_auto_play_timeout); ?>,
                autoplayHoverPause: <?php echo esc_attr($slider_autoplayHoverPause); ?>,
                nav: <?php echo esc_attr($slider_navs); ?>,
                navContainerClass: 'owl-nav <?php echo esc_attr($slider_navs_position); ?> <?php echo esc_attr($slider_navs_style); ?>',
                navText: ['<?php echo wp_kses_post($navigation_text_prev); ?>', '<?php echo wp_kses_post($navigation_text_next); ?>'],
                //dotsContainer: '.owl-dots',
                dots: <?php echo esc_attr($slider_dots); ?>,
                dotsClass: 'owl-dots <?php echo esc_attr($slider_dots_style); ?>',
                navSpeed: <?php echo esc_attr($slider_navSpeed); ?>,
                dotsSpeed: <?php echo esc_attr($slider_dotsSpeed); ?>,
                touchDrag: <?php echo esc_attr($slider_touchDrag); ?>,
                mouseDrag: <?php echo esc_attr($slider_mouseDrag); ?>,
                autoHeight: true,

            });

        });
    </script>
<?php

}













add_action('post_grid_container', 'post_grid_pro_scripts_filterable', 90);

function post_grid_pro_scripts_filterable($args)
{
    $post_grid_options = $args['options'];


    $grid_type = isset($post_grid_options['grid_type']) ? $post_grid_options['grid_type'] : 'grid';


    if ($grid_type != 'filterable' && $grid_type != 'glossary') return;

    $grid_id = $args['grid_id'];


    $max_num_pages = !empty($post_grid_options['pagination']['max_num_pages']) ? $post_grid_options['pagination']['max_num_pages'] : 5;


    $filterable_post_per_page = !empty($post_grid_options['nav_top']['filterable_post_per_page']) ? $post_grid_options['nav_top']['filterable_post_per_page'] : '6';
    $filter_type = !empty($post_grid_options['nav_top']['filter_type']) ? $post_grid_options['nav_top']['filter_type'] : 'single';

    $logicWithinGroup = !empty($post_grid_options['nav_top']['logicWithinGroup']) ? $post_grid_options['nav_top']['logicWithinGroup'] : 'or';
    $logicBetweenGroups = !empty($post_grid_options['nav_top']['logicBetweenGroups']) ? $post_grid_options['nav_top']['logicBetweenGroups'] : 'or';


    $pagination_prev_text = !empty($post_grid_options['pagination']['prev_text']) ? $post_grid_options['pagination']['prev_text'] : __('« Previous', 'post-grid');
    $pagination_next_text = !empty($post_grid_options['pagination']['next_text']) ? $post_grid_options['pagination']['next_text'] : __('Next »', 'post-grid');


    $active_filter = !empty($post_grid_options['nav_top']['active_filter']) ? $post_grid_options['nav_top']['active_filter'] : '';

    $filter = isset($_GET['filter']) ? $_GET['filter'] : $active_filter;

    wp_enqueue_script('masonry');
    wp_enqueue_script('imagesloaded');

    wp_enqueue_script('mixitup');
    wp_enqueue_script('mixitup_multifilter');
    wp_enqueue_script('mixitup_pagination');


?>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

    <script>
        jQuery(document).ready(function($) {
            var containerEl = document.querySelector('<?php echo '#post-grid-' . esc_attr($grid_id); ?> .grid-items');
            var mixer = mixitup(containerEl, {
                callbacks: {
                    onMixStart: function(state, futureState) {
                        //console.log('Starting operation...');
                        //msnry.destroy();
                    },
                    onMixEnd: function(state) {
                        //console.log('Operation complete');
                    }
                },
                selectors: {
                    control: '.filter-<?php echo esc_attr($grid_id); ?>',
                    target: '.item',
                    pageList: '.pager-list-<?php echo esc_attr($grid_id); ?>',
                },
                pagination: {
                    limit: <?php echo esc_attr($filterable_post_per_page); ?>,
                    maxPagers: <?php echo esc_attr($max_num_pages); ?>,
                },
                templates: {
                    pagerPrev: '<span class="pager filter-<?php echo esc_attr($grid_id); ?> ${classNames}" data-page="prev"><?php echo esc_attr($pagination_prev_text); ?></span>',
                    pagerNext: '<span class="pager filter-<?php echo esc_attr($grid_id); ?> ${classNames}" data-page="next"><?php echo esc_attr($pagination_next_text); ?></span>',
                    pager: '<span class="pager filter-<?php echo esc_attr($grid_id); ?> ${classNames}" data-page="${pageNumber}">${pageNumber}</span>',
                },
                <?php
                if ($filter_type == 'group') : ?>multifilter: {
                    enable: true,
                    logicWithinGroup: '<?php echo esc_attr($logicWithinGroup); ?>',
                    logicBetweenGroups: '<?php echo esc_attr($logicBetweenGroups); ?>',
                },
                <?php
                endif;
                if (!empty($filter) && $filter != 'all') {
                ?>load: {
                    filter: ".<?php echo esc_attr($filter); ?>"
                },
            <?php
                }
            ?>
            });
            jQuery(function($) {
                var filterSelect = $('#FilterSelect');
                filterSelect.on('change', function() {
                    //console.log(this.value);
                    //console.log(mixer);
                    mixer.filter(this.value);
                })
            })

        })
    </script>

<?php


}





add_action('post_grid_pagination_next_previous', 'post_grid_pagination_next_previous', 10, 2);

function post_grid_pagination_next_previous($args, $post_grid_wp_query)
{

    $grid_id = $args['grid_id'];

    $post_grid_options = $args['options'];

    if (get_query_var('paged')) {
        $paged = get_query_var('paged');
    } elseif (get_query_var('page')) {
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }

    $max_num_pages = isset($post_grid_wp_query->max_num_pages) ? $post_grid_wp_query->max_num_pages : 0;

    $pagination_prev_text = !empty($post_grid_options['pagination']['prev_text']) ? $post_grid_options['pagination']['prev_text'] : __('« Previous', 'post-grid');
    $pagination_next_text = !empty($post_grid_options['pagination']['next_text']) ? $post_grid_options['pagination']['next_text'] : __('Next »', 'post-grid');
    $pagination_max_num_pages = !empty($post_grid_options['pagination']['max_num_pages']) ? $post_grid_options['pagination']['max_num_pages'] : $max_num_pages;

    $pagination_font_size = !empty($post_grid_options['pagination']['font_size']) ? $post_grid_options['pagination']['font_size'] : '17px';
    $pagination_font_color = !empty($post_grid_options['pagination']['font_color']) ? $post_grid_options['pagination']['font_color'] : '#646464';
    $pagination_bg_color = !empty($post_grid_options['pagination']['bg_color']) ? $post_grid_options['pagination']['bg_color'] : '#646464';
    $pagination_active_bg_color = !empty($post_grid_options['pagination']['active_bg_color']) ? $post_grid_options['pagination']['active_bg_color'] : '#4b4b4b';


?>
    <div class="paginate next-previous">
        <?php
        next_posts_link($pagination_prev_text);
        previous_posts_link($pagination_next_text);
        ?>
    </div>

    <style type="text/css">
        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .paginate.next-previous a'; ?> {
            font-size: <?php echo esc_attr($pagination_font_size); ?>;
            color: <?php echo esc_attr($pagination_font_color); ?>;
            background: <?php echo esc_attr($pagination_bg_color); ?>;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .paginate.next-previous a:hover'; ?> {
            background: <?php echo esc_attr($pagination_active_bg_color); ?>;
        }
    </style>
<?php

}


add_action('post_grid_pagination_jquery', 'post_grid_pagination_jquery', 90);

function post_grid_pagination_jquery($args)
{
    $post_grid_options = $args['options'];

    $grid_type = isset($post_grid_options['grid_type']) ? $post_grid_options['grid_type'] : 'grid';


    if ($grid_type != 'filterable' && $grid_type != 'glossary') return;

    $grid_id = $args['grid_id'];
    $pagination_font_size = !empty($post_grid_options['pagination']['font_size']) ? $post_grid_options['pagination']['font_size'] : '17px';
    $pagination_font_color = !empty($post_grid_options['pagination']['font_color']) ? $post_grid_options['pagination']['font_color'] : '#646464';
    $pagination_bg_color = !empty($post_grid_options['pagination']['bg_color']) ? $post_grid_options['pagination']['bg_color'] : '#646464';
    $pagination_active_bg_color = !empty($post_grid_options['pagination']['active_bg_color']) ? $post_grid_options['pagination']['active_bg_color'] : '#4b4b4b';

?>
    <div class="pagination">
        <div class="pager-list mixitup-page-list pager-list-<?php echo esc_attr($grid_id); ?>"></div>
    </div>
    <style type="text/css">
        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .pagination .pager'; ?> {
            font-size: <?php echo esc_attr($pagination_font_size); ?>;
            color: <?php echo esc_attr($pagination_font_color); ?>;
            background: <?php echo esc_attr($pagination_bg_color); ?>;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .pagination .pager.active'; ?>,
        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .pagination .pager.mixitup-control-active'; ?> {
            background: <?php echo esc_attr($pagination_active_bg_color); ?>;
        }
    </style>
<?php

}

add_action('post_grid_pagination_loadmore', 'post_grid_pagination_loadmore', 10, 2);

function post_grid_pagination_loadmore($args, $post_grid_wp_query)
{

    $grid_id = $args['grid_id'];

    $post_grid_options = $args['options'];

    if (get_query_var('paged')) {
        $paged = get_query_var('paged');
    } elseif (get_query_var('page')) {
        $paged = get_query_var('page');
    } else {
        $paged = 1;
    }


    $pagination_prev_text = !empty($post_grid_options['pagination']['prev_text']) ? $post_grid_options['pagination']['prev_text'] : __('« Previous', 'post-grid');
    $pagination_next_text = !empty($post_grid_options['pagination']['next_text']) ? $post_grid_options['pagination']['next_text'] : __('Next »', 'post-grid');
    $posts_per_page = !empty($post_grid_options['posts_per_page']) ? $post_grid_options['posts_per_page'] : 10;

    $pagination_font_size = !empty($post_grid_options['pagination']['font_size']) ? $post_grid_options['pagination']['font_size'] : '17px';
    $pagination_font_color = !empty($post_grid_options['pagination']['font_color']) ? $post_grid_options['pagination']['font_color'] : '#646464';
    $pagination_bg_color = !empty($post_grid_options['pagination']['bg_color']) ? $post_grid_options['pagination']['bg_color'] : '#646464';
    $pagination_active_bg_color = !empty($post_grid_options['pagination']['active_bg_color']) ? $post_grid_options['pagination']['active_bg_color'] : '#4b4b4b';
    $load_more_text = !empty($post_grid_options['pagination']['load_more_text']) ? $post_grid_options['pagination']['load_more_text'] : __('Load more', 'post-grid');
    $load_more_loading_icon = !empty($post_grid_options['pagination']['load_more_loading_icon']) ? $post_grid_options['pagination']['load_more_loading_icon'] : '';

    $post_grid_settings = get_option('post_grid_settings');
    $font_aw_version = isset($post_grid_settings['font_aw_version']) ? $post_grid_settings['font_aw_version'] : '';

    if (empty($load_more_loading_icon)) {
        if ($font_aw_version == 'v_5') {
            $load_more_loading_icon = '<i class="fas fa-spinner fa-pulse"></i>';
        } elseif ($font_aw_version == 'v_4') {
            $load_more_loading_icon = '<i class="fa fa-spinner fa-pulse"></i>';
        }
    }


    if (!empty($paged)) {
        $paged = $paged + 1;
    }

?>
    <div id="load-more-<?php echo esc_attr($grid_id); ?>" grid_id="<?php echo esc_attr($grid_id); ?>" class="load-more" paged="<?php echo esc_attr($paged); ?>" per_page="<?php echo esc_attr($posts_per_page); ?>">
        <span class="load-more-text"><?php echo wp_kses_post($load_more_text); ?></span>
        <span class="load-more-spinner"><?php echo wp_kses_post($load_more_loading_icon); ?></span>
    </div>
    <style type="text/css">
        <?php echo '#post-grid-' . esc_attr($grid_id); ?><?php echo ' #load-more-' . esc_attr($grid_id); ?> {
            font-size: <?php echo esc_attr($pagination_font_size); ?>;
            color: <?php echo esc_attr($pagination_font_color); ?>;
            background: <?php echo esc_attr($pagination_bg_color); ?>;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id); ?><?php echo ' #load-more-' . esc_attr($grid_id) . ' .loading'; ?> {
            background: <?php echo esc_attr($pagination_active_bg_color); ?>;
        }
    </style>
<?php

}



add_action('post_grid_view_type_css_slider', 'post_grid_view_type_css_slider', 90);

function post_grid_view_type_css_slider($args)
{

    $post_grid_options = $args['options'];
    $grid_id = $args['grid_id'];

    $items_height_style = !empty($post_grid_options['item_height']['style']) ? $post_grid_options['item_height']['style'] : 'auto_height';
    $items_height_style_tablet = !empty($post_grid_options['item_height']['style_tablet']) ? $post_grid_options['item_height']['style_tablet'] : 'auto_height';
    $items_height_style_mobile = !empty($post_grid_options['item_height']['style_mobile']) ? $post_grid_options['item_height']['style_mobile'] : 'auto_height';

    $items_fixed_height = !empty($post_grid_options['item_height']['fixed_height']) ? $post_grid_options['item_height']['fixed_height'] : '220px';
    $items_fixed_height_tablet = !empty($post_grid_options['item_height']['fixed_height_tablet']) ? $post_grid_options['item_height']['fixed_height_tablet'] : '220px';
    $items_fixed_height_mobile = !empty($post_grid_options['item_height']['fixed_height_mobile']) ? $post_grid_options['item_height']['fixed_height_mobile'] : '220px';

    $items_margin = isset($post_grid_options['margin']) ? $post_grid_options['margin'] : '';
    $item_padding = isset($post_grid_options['item_padding']) ? $post_grid_options['item_padding'] : '';

    $items_media_height_style = !empty($post_grid_options['media_height']['style']) ? $post_grid_options['media_height']['style'] : 'auto_height';
    $items_media_fixed_height = !empty($post_grid_options['media_height']['fixed_height']) ? $post_grid_options['media_height']['fixed_height'] : '';

    $pagination_font_size = !empty($post_grid_options['pagination']['font_size']) ? $post_grid_options['pagination']['font_size'] : '17px';
    $pagination_font_color = !empty($post_grid_options['pagination']['font_color']) ? $post_grid_options['pagination']['font_color'] : '#646464';
    $pagination_bg_color = !empty($post_grid_options['pagination']['bg_color']) ? $post_grid_options['pagination']['bg_color'] : '#646464';
    $pagination_active_bg_color = !empty($post_grid_options['pagination']['active_bg_color']) ? $post_grid_options['pagination']['active_bg_color'] : '#4b4b4b';


    if ($items_height_style == 'auto_height') {
        $items_height = 'auto';
    } elseif ($items_height_style == 'fixed_height') {
        $items_height = $items_fixed_height;
    } elseif ($items_height_style == 'max_height') {
        $items_height = $items_fixed_height;
    } else {
        $items_height = '220px';
    }

    if ($items_media_height_style == 'auto_height') {
        $items_media_height = 'auto';
    } elseif ($items_media_height_style == 'fixed_height') {
        $items_media_height = $items_media_fixed_height;
    } elseif ($items_media_height_style == 'max_height') {
        $items_media_height = $items_media_fixed_height;
    } else {
        $items_media_height = '220px';
    }

    $container_padding = isset($post_grid_options['container']['padding']) ? $post_grid_options['container']['padding'] : '';
    $container_bg_color = isset($post_grid_options['container']['bg_color']) ? $post_grid_options['container']['bg_color'] : '';
    $container_bg_image = isset($post_grid_options['container']['bg_image']) ? $post_grid_options['container']['bg_image'] : '';
    $items_bg_color_type = isset($post_grid_options['items_bg_color_type']) ? $post_grid_options['items_bg_color_type'] : '';
    $items_bg_color = isset($post_grid_options['items_bg_color']) ? $post_grid_options['items_bg_color'] : '#fff';

    $slider_dots_bg_color = isset($post_grid_options['slider_dots_bg_color']) ? $post_grid_options['slider_dots_bg_color'] : '#1e73be';
    $slider_navs_bg_color = isset($post_grid_options['slider_navs_bg_color']) ? $post_grid_options['slider_navs_bg_color'] : '#1e73be';
    $slider_navs_text_color = isset($post_grid_options['slider_navs_text_color']) ? $post_grid_options['slider_navs_text_color'] : '#ffffff';


?>
    <style type="text/css">
        <?php echo '#post-grid-' . esc_attr($grid_id); ?> {
            <?php if (!empty($container_padding)) : ?>padding: <?php echo esc_attr($container_padding); ?>;
            <?php endif; ?><?php if (!empty($container_bg_color)) : ?>background-color: <?php echo esc_attr($container_bg_color); ?>;
            <?php endif; ?><?php if (!empty($container_bg_image)) : ?>background-image: url(<?php echo esc_attr($container_bg_image); ?>);
            <?php endif; ?>
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
            <?php if (!empty($items_margin)) : ?>margin: <?php echo esc_attr($items_margin); ?>;
            <?php endif; ?><?php if (!empty($item_padding)) : ?>padding: <?php echo esc_attr($item_padding); ?>;
            <?php endif; ?><?php if ($items_bg_color_type == 'fixed') : ?>background: <?php echo esc_attr($items_bg_color); ?>;
            <?php endif; ?>
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item .layer-media'; ?> {
            overflow: hidden;
            <?php
            if ($items_media_height_style == 'fixed_height' || $items_media_height_style == 'auto_height') {
                echo 'height:' . esc_attr($items_media_height) . ';';
            } elseif ($items_media_height_style == 'max_height') {
                echo 'max-height:' . esc_attr($items_media_height) . ';';
            } else {
                echo 'height:' . esc_attr($items_media_height) . ';';
            }
            ?>
        }


        @media only screen and (min-width: 0px) and (max-width: 767px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php
                if ($items_height_style == 'fixed_height') {
                    echo 'height:' . esc_attr($items_height) . ';';
                } elseif ($items_height_style == 'max_height') {
                    echo 'max-height:' . esc_attr($items_height) . ';';
                } elseif ($items_height_style == 'auto_height') {
                    echo 'height:auto;';
                } else {
                    echo 'height:auto;';
                }
                ?>
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 1023px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php
                if ($items_height_style_tablet == 'fixed_height') {
                    echo 'height:' . esc_attr($items_fixed_height_tablet) . ';';
                } elseif ($items_height_style_tablet == 'max_height') {
                    echo 'max-height:' . esc_attr($items_fixed_height_tablet) . ';';
                } elseif ($items_height_style_tablet == 'auto_height') {
                    echo 'max-height:auto;';
                } else {
                    echo 'height:auto;';
                }
                ?>
            }
        }

        @media only screen and (min-width: 1024px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php
                if ($items_height_style == 'fixed_height') {
                    echo 'height:' . esc_attr($items_height) . ';';
                } elseif ($items_height_style == 'max_height') {
                    echo 'max-height:' . esc_attr($items_height) . ';';
                } elseif ($items_height_style == 'auto_height') {
                    echo 'height:auto;';
                } else {
                    echo 'height:auto;';
                }
                ?>
            }
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-dots'; ?> {
            text-align: center;
            width: 100%;
            margin: 30px 0 0;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-dots .owl-dot span'; ?> {
            background: <?php echo esc_attr($slider_dots_bg_color); ?>;
            display: inline-block;
            margin: 5px 7px;
            outline: none;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-dots .owl-dot.active'; ?>,
        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-dots .owl-dot:hover'; ?> {
            background: <?php echo esc_attr($slider_dots_bg_color); ?>;
        }


        .owl-dots {
            padding-top: 25px;
        }

        .round span {
            width: 20px !important;
            height: 20px !important;
            border-radius: 50px !important;
        }

        .square span {
            width: 20px !important;
            height: 20px !important;
            border-radius: 0px !important;
        }

        .semi-round span {
            width: 20px !important;
            height: 20px !important;
            border-radius: 4px !important;
        }

        .dotsThemes3 span {
            width: 20px !important;
            height: 10px !important;
            border-radius: 4px !important;
        }

        .dotsThemes4 span {
            width: 30px !important;
            height: 10px !important;
            border-radius: 50px !important;
        }

        .dotsThemes5 span {
            width: 30px !important;
            height: 10px !important;
            border-radius: 50% !important;
        }

        .dotsThemes6 span {
            width: 10px !important;
            height: 21px !important;
        }

        .shadow span {
            width: 20px !important;
            height: 20px !important;
            box-shadow: 0 0 0px 3px rgba(0, 0, 0, 0.3);
        }


        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav button'; ?> {
            background: <?php echo esc_attr($slider_navs_bg_color); ?>;
            color: <?php echo esc_attr($slider_navs_text_color); ?>;
            margin: 0 5px;
            outline: none;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav.top-right'; ?> {
            position: absolute;
            right: 15px;
            top: 15px;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav.top-left'; ?> {
            position: absolute;
            left: 15px;
            top: 15px;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav.bottom-left'; ?> {
            position: absolute;
            left: 15px;
            bottom: 15px;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav.bottom-right'; ?> {
            position: absolute;
            right: 15px;
            bottom: 15px;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav.middle-fixed'; ?> {
            position: absolute;
            top: 50%;
            transform: translate(0, -50%);
            width: 100%;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav.middle-fixed .owl-next'; ?> {
            float: right;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . '.owl-nav.middle-fixed .owl-prev'; ?> {
            float: left;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav.middle'; ?> {
            position: absolute;
            top: 50%;
            transform: translate(0, -50%);
            width: 100%;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav.middle .owl-next'; ?> {
            float: right;
            right: -20%;
            position: absolute;
            transition: all ease 1s 0s;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ':hover .owl-nav.middle .owl-next'; ?> {
            right: 0;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav.middle .owl-prev'; ?> {
            left: -20%;
            position: absolute;
            transition: all ease 1s 0s;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ':hover .owl-nav.middle .owl-prev'; ?> {
            left: 0;
            position: absolute;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav.flat button'; ?> {
            padding: 5px 20px !important;
            border-radius: 0;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav.border button'; ?> {
            padding: 5px 20px !important;
            border: 2px solid #777;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . '.owl-nav.semi-round button'; ?> {
            padding: 5px 20px !important;
            border-radius: 8px;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .owl-nav.round button'; ?> {
            border-radius: 50px;
            width: 50px;
            height: 50px;
        }
    </style>
<?php


}


add_action('post_grid_view_type_css_glossary', 'post_grid_view_type_css_glossary', 90);

function post_grid_view_type_css_glossary($args)
{

    $post_grid_options = $args['options'];
    $grid_id = $args['grid_id'];

    $items_width_desktop = isset($post_grid_options['width']['desktop']) ? $post_grid_options['width']['desktop'] : '';
    $items_width_tablet = isset($post_grid_options['width']['tablet']) ? $post_grid_options['width']['tablet'] : '';
    $items_width_mobile = isset($post_grid_options['width']['mobile']) ? $post_grid_options['width']['mobile'] : '';

    $items_height_style = !empty($post_grid_options['item_height']['style']) ? $post_grid_options['item_height']['style'] : 'auto_height';
    $items_height_style_tablet = !empty($post_grid_options['item_height']['style_tablet']) ? $post_grid_options['item_height']['style_tablet'] : 'auto_height';
    $items_height_style_mobile = !empty($post_grid_options['item_height']['style_mobile']) ? $post_grid_options['item_height']['style_mobile'] : 'auto_height';

    $items_fixed_height = !empty($post_grid_options['item_height']['fixed_height']) ? $post_grid_options['item_height']['fixed_height'] : '220px';
    $items_fixed_height_tablet = !empty($post_grid_options['item_height']['fixed_height_tablet']) ? $post_grid_options['item_height']['fixed_height_tablet'] : '220px';
    $items_fixed_height_mobile = !empty($post_grid_options['item_height']['fixed_height_mobile']) ? $post_grid_options['item_height']['fixed_height_mobile'] : '220px';

    $items_margin = isset($post_grid_options['margin']) ? $post_grid_options['margin'] : '';
    $item_padding = isset($post_grid_options['item_padding']) ? $post_grid_options['item_padding'] : '';

    $items_media_height_style = !empty($post_grid_options['media_height']['style']) ? $post_grid_options['media_height']['style'] : 'auto_height';
    $items_media_fixed_height = !empty($post_grid_options['media_height']['fixed_height']) ? $post_grid_options['media_height']['fixed_height'] : '';



    if ($items_height_style == 'auto_height') {
        $items_height = 'auto';
    } elseif ($items_height_style == 'fixed_height') {
        $items_height = $items_fixed_height;
    } elseif ($items_height_style == 'max_height') {
        $items_height = $items_fixed_height;
    } else {
        $items_height = '220px';
    }

    if ($items_media_height_style == 'auto_height') {
        $items_media_height = 'auto';
    } elseif ($items_media_height_style == 'fixed_height') {
        $items_media_height = $items_media_fixed_height;
    } elseif ($items_media_height_style == 'max_height') {
        $items_media_height = $items_media_fixed_height;
    } else {
        $items_media_height = '220px';
    }

    $container_padding = isset($post_grid_options['container']['padding']) ? $post_grid_options['container']['padding'] : '';
    $container_bg_color = isset($post_grid_options['container']['bg_color']) ? $post_grid_options['container']['bg_color'] : '';
    $container_bg_image = isset($post_grid_options['container']['bg_image']) ? $post_grid_options['container']['bg_image'] : '';


    $items_bg_color_type = isset($post_grid_options['items_bg_color_type']) ? $post_grid_options['items_bg_color_type'] : '';
    $items_bg_color = isset($post_grid_options['items_bg_color']) ? $post_grid_options['items_bg_color'] : '#fff';


?>
    <style type="text/css">
        <?php echo '#post-grid-' . esc_attr($grid_id); ?> {
            <?php if (!empty($container_padding)) : ?>padding: <?php echo esc_attr($container_padding); ?>;
            <?php endif; ?><?php if (!empty($container_bg_color)) : ?>background-color: <?php echo esc_attr($container_bg_color); ?>;
            <?php endif; ?><?php if (!empty($container_bg_image)) : ?>background-image: url(<?php echo esc_attr($container_bg_image); ?>);
            <?php endif; ?>
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
            <?php if (!empty($items_margin)) : ?>margin: <?php echo esc_attr($items_margin); ?>;
            <?php endif; ?><?php if (!empty($item_padding)) : ?>padding: <?php echo esc_attr($item_padding); ?>;
            <?php endif; ?><?php if ($items_bg_color_type == 'fixed') : ?>background: <?php echo esc_attr($items_bg_color); ?>;
            <?php endif; ?>
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item .layer-media'; ?> {
            overflow: hidden;
            <?php
            if ($items_media_height_style == 'fixed_height' || $items_media_height_style == 'auto_height') {
                echo 'height:' . esc_attr($items_media_height) . ';';
            } elseif ($items_media_height_style == 'max_height') {
                echo 'max-height:' . esc_attr($items_media_height) . ';';
            } else {
                echo 'height:' . esc_attr($items_media_height) . ';';
            }
            ?>
        }

        @media only screen and (min-width: 0px) and (max-width: 767px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php if (!empty($items_width_mobile)) : ?>width: <?php echo esc_attr($items_width_mobile); ?>;
                <?php endif; ?><?php
                                if ($items_height_style == 'fixed_height') {
                                    echo 'height:' . esc_attr($items_height) . ';';
                                } elseif ($items_height_style == 'max_height') {
                                    echo 'max-height:' . esc_attr($items_height) . ';';
                                } elseif ($items_height_style == 'auto_height') {
                                    echo 'height:auto;';
                                } else {
                                    echo 'height:auto;';
                                }
                                ?>
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 1023px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php if (!empty($items_width_tablet)) : ?>width: <?php echo esc_attr($items_width_tablet); ?>;
                <?php endif; ?><?php
                                if ($items_height_style_tablet == 'fixed_height') {
                                    echo 'height:' . esc_attr($items_fixed_height_tablet) . ';';
                                } elseif ($items_height_style_tablet == 'max_height') {
                                    echo 'max-height:' . esc_attr($items_fixed_height_tablet) . ';';
                                } elseif ($items_height_style_tablet == 'auto_height') {
                                    echo 'max-height:auto;';
                                } else {
                                    echo 'height:auto;';
                                }
                                ?>
            }
        }

        @media only screen and (min-width: 1024px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php if (!empty($items_width_desktop)) : ?>width: <?php echo esc_attr($items_width_desktop); ?>;
                <?php endif; ?><?php
                                if ($items_height_style == 'fixed_height') {
                                    echo 'height:' . esc_attr($items_height) . ';';
                                } elseif ($items_height_style == 'max_height') {
                                    echo 'max-height:' . esc_attr($items_height) . ';';
                                } elseif ($items_height_style == 'auto_height') {
                                    echo 'height:auto;';
                                } else {
                                    echo 'height:auto;';
                                }
                                ?>
            }
        }


        <?php

        $filterable_font_size = !empty($post_grid_options['nav_top']['filterable_font_size']) ? $post_grid_options['nav_top']['filterable_font_size'] : '14px';
        $filterable_navs_margin = !empty($post_grid_options['nav_top']['filterable_navs_margin']) ? $post_grid_options['nav_top']['filterable_navs_margin'] : '5px';

        $filterable_font_color = !empty($post_grid_options['glossary']['font_color']) ? $post_grid_options['glossary']['font_color'] : '#999';
        $filterable_bg_color = !empty($post_grid_options['glossary']['bg_color']) ? $post_grid_options['glossary']['bg_color'] : '#fff';
        $filterable_active_bg_color = !empty($post_grid_options['glossary']['active_bg_color']) ? $post_grid_options['glossary']['active_bg_color'] : '#ddd';

        ?><?php echo '#post-grid-' . esc_attr($grid_id); ?>.nav-filter .filter {
            font-size: <?php echo esc_attr($filterable_font_size); ?>;
            color: <?php echo esc_attr($filterable_font_color); ?>;
            background: <?php echo esc_attr($filterable_bg_color); ?>;
            margin: <?php echo esc_attr($filterable_navs_margin); ?>;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id); ?>.nav-filter .filter:hover,
        <?php echo '#post-grid-' . esc_attr($grid_id); ?>.nav-filter .filter.mixitup-control-active {
            background: <?php echo esc_attr($filterable_active_bg_color); ?>;
        }

        .post-grid .grid-nav-top .nav-filter {
            text-align: center;
            padding: 20px 0;
        }

        .filter-group {
            display: inline-block;
            margin: 10px;
        }

        .post-grid .nav-filter .filter {
            background: rgba(220, 220, 220, 0.3) none repeat scroll 0 0;
            color: #333;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            margin: 5px 5px;
            padding: 3px 15px;
        }
    </style>
<?php


}



add_action('post_grid_view_type_css_filterable', 'post_grid_view_type_css_filterable', 90);

function post_grid_view_type_css_filterable($args)
{

    $post_grid_options = $args['options'];
    $grid_id = $args['grid_id'];

    $items_width_desktop = isset($post_grid_options['width']['desktop']) ? $post_grid_options['width']['desktop'] : '';
    $items_width_tablet = isset($post_grid_options['width']['tablet']) ? $post_grid_options['width']['tablet'] : '';
    $items_width_mobile = isset($post_grid_options['width']['mobile']) ? $post_grid_options['width']['mobile'] : '';

    $items_width_desktop = (strpos($items_width_desktop, 'px') === false && strpos($items_width_desktop, '%') === false) ? (int)$items_width_desktop : $items_width_desktop;

    $items_width_tablet = (strpos($items_width_tablet, 'px') === false && strpos($items_width_tablet, '%') === false) ? (int)$items_width_tablet : $items_width_tablet;
    $items_width_mobile = (strpos($items_width_mobile, 'px') === false && strpos($items_width_mobile, '%') === false) ? (int)$items_width_mobile : $items_width_mobile;



    $items_height_style = !empty($post_grid_options['item_height']['style']) ? $post_grid_options['item_height']['style'] : 'auto_height';
    $items_height_style_tablet = !empty($post_grid_options['item_height']['style_tablet']) ? $post_grid_options['item_height']['style_tablet'] : 'auto_height';
    $items_height_style_mobile = !empty($post_grid_options['item_height']['style_mobile']) ? $post_grid_options['item_height']['style_mobile'] : 'auto_height';

    $items_fixed_height = !empty($post_grid_options['item_height']['fixed_height']) ? $post_grid_options['item_height']['fixed_height'] : '220px';
    $items_fixed_height_tablet = !empty($post_grid_options['item_height']['fixed_height_tablet']) ? $post_grid_options['item_height']['fixed_height_tablet'] : '220px';
    $items_fixed_height_mobile = !empty($post_grid_options['item_height']['fixed_height_mobile']) ? $post_grid_options['item_height']['fixed_height_mobile'] : '220px';

    $items_margin = isset($post_grid_options['margin']) ? $post_grid_options['margin'] : '';
    $item_padding = isset($post_grid_options['item_padding']) ? $post_grid_options['item_padding'] : '';

    $items_media_height_style = !empty($post_grid_options['media_height']['style']) ? $post_grid_options['media_height']['style'] : 'auto_height';
    $items_media_fixed_height = !empty($post_grid_options['media_height']['fixed_height']) ? $post_grid_options['media_height']['fixed_height'] : '';



    if ($items_height_style == 'auto_height') {
        $items_height = 'auto';
    } elseif ($items_height_style == 'fixed_height') {
        $items_height = $items_fixed_height;
    } elseif ($items_height_style == 'max_height') {
        $items_height = $items_fixed_height;
    } else {
        $items_height = '220px';
    }

    if ($items_media_height_style == 'auto_height') {
        $items_media_height = 'auto';
    } elseif ($items_media_height_style == 'fixed_height') {
        $items_media_height = $items_media_fixed_height;
    } elseif ($items_media_height_style == 'max_height') {
        $items_media_height = $items_media_fixed_height;
    } else {
        $items_media_height = '220px';
    }

    $container_padding = isset($post_grid_options['container']['padding']) ? $post_grid_options['container']['padding'] : '';
    $container_bg_color = isset($post_grid_options['container']['bg_color']) ? $post_grid_options['container']['bg_color'] : '';
    $container_bg_image = isset($post_grid_options['container']['bg_image']) ? $post_grid_options['container']['bg_image'] : '';

    $items_bg_color_type = isset($post_grid_options['items_bg_color_type']) ? $post_grid_options['items_bg_color_type'] : '';
    $items_bg_color = isset($post_grid_options['items_bg_color']) ? $post_grid_options['items_bg_color'] : '#fff';








    $filterable = !empty($post_grid_options['filterable']) ? $post_grid_options['filterable'] : [];

    $filterable_gutter = isset($filterable['gutter']) ? (int) $filterable['gutter'] : 20;


    $columns_desktop = !empty($filterable['columns']['desktop']) ? (int) $filterable['columns']['desktop'] : 3;
    $columns_tablet = !empty($filterable['columns']['tablet']) ? (int) $filterable['columns']['tablet'] : 2;
    $columns_mobile = !empty($filterable['columns']['mobile']) ? (int) $filterable['columns']['mobile'] : 1;













?>
    <style type="text/css">
        <?php echo '#post-grid-' . esc_attr($grid_id); ?> {
            overflow: hidden;
            box-sizing: border-box;
            <?php if (!empty($container_padding)) : ?>padding: <?php echo esc_attr($container_padding); ?>;
            <?php endif; ?><?php if (!empty($container_bg_color)) : ?>background-color: <?php echo esc_attr($container_bg_color); ?>;
            <?php endif; ?><?php if (!empty($container_bg_image)) : ?>background-image: url(<?php echo esc_attr($container_bg_image); ?>);
            <?php endif; ?>
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .grid-items'; ?> {
            <?php if (!empty($filterable_gutter)) : ?>margin-right: -<?php echo esc_attr($filterable_gutter); ?>px;
            <?php endif; ?>box-sizing: border-box;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
            /** Column  margin **/
            margin-bottom: <?php echo esc_attr($filterable_gutter . 'px'); ?>;
            padding-right: <?php echo esc_attr($filterable_gutter . 'px'); ?>;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .layer-wrapper'; ?> {

            <?php if ($items_bg_color_type == 'fixed') : ?>background: <?php echo esc_attr($items_bg_color); ?>;
            <?php endif; ?>padding: <?php echo esc_attr($item_padding); ?>;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item .layer-media'; ?> {
            overflow: hidden;
            <?php
            if ($items_media_height_style == 'fixed_height' || $items_media_height_style == 'auto_height') {
                echo 'height:' . esc_attr($items_media_height) . ';';
            } elseif ($items_media_height_style == 'max_height') {
                echo 'max-height:' . esc_attr($items_media_height) . ';';
            } else {
                echo 'height:' . $items_media_height . ';';
            }
            ?>
        }

        @media only screen and (min-width: 0px) and (max-width: 767px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php
                $masonry_gutter_mobile = $filterable_gutter * ($columns_mobile - 1);

                if (is_integer($columns_mobile)) {

                ?>width: calc((100% - <?php echo $masonry_gutter_mobile; ?>px) / <?php echo esc_attr($columns_mobile); ?>);
                <?php
                } else {
                    if (!empty($items_width_mobile)) {
                        echo 'width:' . $items_width_mobile . ';';
                    }
                }


                ?><?php
                    if ($items_height_style == 'fixed_height') {
                        echo 'height:' . esc_attr($items_height) . ';';
                    } elseif ($items_height_style == 'max_height') {
                        echo 'max-height:' . esc_attr($items_height) . ';';
                    } elseif ($items_height_style == 'auto_height') {
                        echo 'height:auto;';
                    } else {
                        echo 'height:auto;';
                    }
                    ?>
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 1023px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php

                $masonry_gutter_tablet = $filterable_gutter * ($columns_tablet - 1);


                if (is_integer($columns_tablet)) {

                ?>width: <?php echo (100 / $columns_tablet); ?>%;
                <?php
                } else {
                    if (!empty($items_width_tablet)) {
                        echo 'width:' . $items_width_tablet . ';';
                    }
                }


                ?><?php
                    if ($items_height_style_tablet == 'fixed_height') {
                        echo 'height:' . esc_attr($items_fixed_height_tablet) . ';';
                    } elseif ($items_height_style_tablet == 'max_height') {
                        echo 'max-height:' . esc_attr($items_fixed_height_tablet) . ';';
                    } elseif ($items_height_style_tablet == 'auto_height') {
                        echo 'max-height:auto;';
                    } else {
                        echo 'height:auto;';
                    }
                    ?>
            }
        }

        @media only screen and (min-width: 1024px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {

                <?php
                $masonry_gutter_desktop = $filterable_gutter * ($columns_desktop - 1);

                if (is_integer($columns_desktop)) {

                ?>width: <?php echo (100 / $columns_desktop); ?>%;
                <?php
                } else {
                    if (!empty($items_width_desktop)) {
                        echo 'width:' . $items_width_desktop . ';';
                    }
                }

                ?><?php
                    if ($items_height_style == 'fixed_height') {
                        echo 'height:' . esc_attr($items_height) . ';';
                    } elseif ($items_height_style == 'max_height') {
                        echo 'max-height:' . esc_attr($items_height) . ';';
                    } elseif ($items_height_style == 'auto_height') {
                        echo 'height:auto;';
                    } else {
                        echo 'height:auto;';
                    }
                    ?>
            }
        }


        <?php

        $filterable_font_size = !empty($post_grid_options['nav_top']['filterable_font_size']) ? $post_grid_options['nav_top']['filterable_font_size'] : '14px';
        $filterable_navs_margin = !empty($post_grid_options['nav_top']['filterable_navs_margin']) ? $post_grid_options['nav_top']['filterable_navs_margin'] : '5px';

        $filterable_font_color = !empty($post_grid_options['nav_top']['filterable_font_color']) ? $post_grid_options['nav_top']['filterable_font_color'] : '#999';
        $filterable_bg_color = !empty($post_grid_options['nav_top']['filterable_bg_color']) ? $post_grid_options['nav_top']['filterable_bg_color'] : '#fff';
        $filterable_active_bg_color = !empty($post_grid_options['nav_top']['filterable_active_bg_color']) ? $post_grid_options['nav_top']['filterable_active_bg_color'] : '#ddd';

        ?><?php echo '#post-grid-' . esc_attr($grid_id) . ' .nav-filter .filter'; ?> {
            font-size: <?php echo esc_attr($filterable_font_size); ?>;
            color: <?php echo esc_attr($filterable_font_color); ?>;
            background: <?php echo esc_attr($filterable_bg_color); ?>;
            margin: <?php echo esc_attr($filterable_navs_margin); ?>;
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .nav-filter .filter:hover'; ?>,
        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .nav-filter .filter.mixitup-control-active'; ?> {
            background: <?php echo esc_attr($filterable_active_bg_color); ?>;
        }

        .post-grid .grid-nav-top .nav-filter {
            text-align: center;
            padding: 20px 0;
        }

        .filter-group {
            display: inline-block;
            margin: 10px;
        }

        .post-grid .nav-filter .filter {
            background: rgba(220, 220, 220, 0.3) none repeat scroll 0 0;
            color: #333;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            margin: 5px 5px;
            padding: 3px 15px;
        }
    </style>
<?php


}


add_action('post_grid_loop_top', 'post_grid_loop_top_timeline');

function post_grid_loop_top_timeline($args)
{

    $post_grid_options = $args['options'];
    $grid_type = isset($post_grid_options['grid_type']) ? $post_grid_options['grid_type'] : 'grid';

    if ($grid_type != 'timeline') return;

?>
    <div class="timeline-line"></div>
<?php

}


add_action('post_grid_item_top', 'post_grid_item_top_timeline_arrow');

function post_grid_item_top_timeline_arrow($args)
{

    $post_grid_options = $args['options'];
    $grid_type = isset($post_grid_options['grid_type']) ? $post_grid_options['grid_type'] : 'grid';

    if ($grid_type != 'timeline') return;

?>
    <span class="timeline-arrow"></span>
<?php

}


add_action('post_grid_view_type_css_timeline', 'post_grid_view_type_css_timeline', 90);

function post_grid_view_type_css_timeline($args)
{

    $post_grid_options = $args['options'];
    $grid_id = $args['grid_id'];


    $items_width_desktop = isset($post_grid_options['width']['desktop']) ? $post_grid_options['width']['desktop'] : '';
    $items_width_tablet = isset($post_grid_options['width']['tablet']) ? $post_grid_options['width']['tablet'] : '';
    $items_width_mobile = isset($post_grid_options['width']['mobile']) ? $post_grid_options['width']['mobile'] : '';

    $items_width_desktop =  '50%';
    $items_width_tablet =  '43%';
    $items_width_mobile =  '90%';


    $items_height_style = !empty($post_grid_options['item_height']['style']) ? $post_grid_options['item_height']['style'] : 'auto_height';
    $items_height_style_tablet = !empty($post_grid_options['item_height']['style_tablet']) ? $post_grid_options['item_height']['style_tablet'] : 'auto_height';
    $items_height_style_mobile = !empty($post_grid_options['item_height']['style_mobile']) ? $post_grid_options['item_height']['style_mobile'] : 'auto_height';

    $items_fixed_height = !empty($post_grid_options['item_height']['fixed_height']) ? $post_grid_options['item_height']['fixed_height'] : '220px';
    $items_fixed_height_tablet = !empty($post_grid_options['item_height']['fixed_height_tablet']) ? $post_grid_options['item_height']['fixed_height_tablet'] : '220px';
    $items_fixed_height_mobile = !empty($post_grid_options['item_height']['fixed_height_mobile']) ? $post_grid_options['item_height']['fixed_height_mobile'] : '220px';

    $items_margin = isset($post_grid_options['margin']) ? $post_grid_options['margin'] : '25px';
    $items_margin = '0px';

    $item_padding = isset($post_grid_options['item_padding']) ? $post_grid_options['item_padding'] : '';

    $items_media_height_style = !empty($post_grid_options['media_height']['style']) ? $post_grid_options['media_height']['style'] : 'auto_height';
    $items_media_fixed_height = !empty($post_grid_options['media_height']['fixed_height']) ? $post_grid_options['media_height']['fixed_height'] : '';



    if ($items_height_style == 'auto_height') {
        $items_height = 'auto';
    } elseif ($items_height_style == 'fixed_height') {
        $items_height = $items_fixed_height;
    } elseif ($items_height_style == 'max_height') {
        $items_height = $items_fixed_height;
    } else {
        $items_height = '220px';
    }

    if ($items_media_height_style == 'auto_height') {
        $items_media_height = 'auto';
    } elseif ($items_media_height_style == 'fixed_height') {
        $items_media_height = $items_media_fixed_height;
    } elseif ($items_media_height_style == 'max_height') {
        $items_media_height = $items_media_fixed_height;
    } else {
        $items_media_height = '220px';
    }

    $container_padding = isset($post_grid_options['container']['padding']) ? $post_grid_options['container']['padding'] : '';
    $container_bg_color = isset($post_grid_options['container']['bg_color']) ? $post_grid_options['container']['bg_color'] : '';
    $container_bg_image = isset($post_grid_options['container']['bg_image']) ? $post_grid_options['container']['bg_image'] : '';

    $items_bg_color_type = isset($post_grid_options['items_bg_color_type']) ? $post_grid_options['items_bg_color_type'] : '';
    $items_bg_color = isset($post_grid_options['items_bg_color']) ? $post_grid_options['items_bg_color'] : '#fff';


    $timeline_arrow_bg_color = !empty($post_grid_options['timeline']['arrow_bg_color']) ? $post_grid_options['timeline']['arrow_bg_color'] : '#eee';
    $timeline_arrow_size = !empty($post_grid_options['timeline']['arrow_size']) ? $post_grid_options['timeline']['arrow_size'] : '13px';
    $timeline_bg_color = !empty($post_grid_options['timeline']['timeline_bg_color']) ? $post_grid_options['timeline']['timeline_bg_color'] : '#eee';


    $timeline_bubble_bg_color = !empty($post_grid_options['timeline']['bubble_bg_color']) ? $post_grid_options['timeline']['bubble_bg_color'] : '#ddd';
    $timeline_bubble_border_color = !empty($post_grid_options['timeline']['bubble_border_color']) ? $post_grid_options['timeline']['bubble_border_color'] : '#fff';



?>
    <style type="text/css">
        <?php echo '#post-grid-' . esc_attr($grid_id); ?> {
            <?php if (!empty($container_padding)) : ?>padding: <?php echo esc_attr($container_padding); ?>;
            <?php endif; ?><?php if (!empty($container_bg_color)) : ?>background-color: <?php echo esc_attr($container_bg_color); ?>;
            <?php endif; ?><?php if (!empty($container_bg_image)) : ?>background-image: url(<?php echo esc_attr($container_bg_image); ?>);
            <?php endif; ?>
        }


        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
            <?php if (!empty($items_margin)) : ?>margin: <?php echo esc_attr($items_margin); ?>;
            <?php endif; ?><?php if (!empty($item_padding)) : ?>padding: <?php echo esc_attr($item_padding); ?>;
            <?php endif; ?><?php if ($items_bg_color_type == 'fixed') : ?>background: #fff0;
            <?php endif; ?>
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item .layer-media'; ?> {
            overflow: hidden;
            <?php
            if ($items_media_height_style == 'fixed_height' || $items_media_height_style == 'auto_height') {
                echo 'height:' . esc_attr($items_media_height) . ';';
            } elseif ($items_media_height_style == 'max_height') {
                echo 'max-height:' . esc_attr($items_media_height) . ';';
            } else {
                echo 'height:' . $items_media_height . ';';
            }
            ?>
        }

        @media only screen and (min-width: 0px) and (max-width: 767px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php if (!empty($items_width_mobile)) : ?>width: <?php echo esc_attr($items_width_mobile); ?>;
                <?php endif; ?><?php
                                if ($items_height_style == 'fixed_height') {
                                    echo 'height:' . esc_attr($items_height) . ';';
                                } elseif ($items_height_style == 'max_height') {
                                    echo 'max-height:' . esc_attr($items_height) . ';';
                                } elseif ($items_height_style == 'auto_height') {
                                    echo 'height:auto;';
                                } else {
                                    echo 'height:auto;';
                                }
                                ?>
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 1023px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php if (!empty($items_width_tablet)) : ?>width: <?php echo esc_attr($items_width_tablet); ?>;
                <?php endif; ?><?php
                                if ($items_height_style_tablet == 'fixed_height') {
                                    echo 'height:' . esc_attr($items_fixed_height_tablet) . ';';
                                } elseif ($items_height_style_tablet == 'max_height') {
                                    echo 'max-height:' . esc_attr($items_fixed_height_tablet) . ';';
                                } elseif ($items_height_style_tablet == 'auto_height') {
                                    echo 'max-height:auto;';
                                } else {
                                    echo 'height:auto;';
                                }
                                ?>
            }
        }

        @media only screen and (min-width: 1024px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php if (!empty($items_width_desktop)) : ?>width: <?php echo esc_attr($items_width_desktop); ?>;
                <?php endif; ?><?php
                                if ($items_height_style == 'fixed_height') {
                                    echo 'height:' . esc_attr($items_height) . ';';
                                } elseif ($items_height_style == 'max_height') {
                                    echo 'max-height:' . esc_attr($items_height) . ';';
                                } elseif ($items_height_style == 'auto_height') {
                                    echo 'height:auto;';
                                } else {
                                    echo 'height:auto;';
                                }
                                ?>
            }
        }

        .post-grid.timeline {
            position: relative;
            text-align: center;
        }

        .post-grid.timeline .layer-wrapper {
            margin: 20px;
        }

        .post-grid.timeline .timeline-line {
            background: <?php echo esc_attr($timeline_bg_color); ?>;
            height: 100%;
            left: 50%;
            position: absolute;
            width: 1px;
        }

        .post-grid.timeline .item:nth-child(2) {
            margin-top: 70px !important
        }

        .post-grid.timeline .item .timeline-arrow {
            width: 0px;
            height: 20px;
            background: #ddd;
        }

        .post-grid.timeline .item.even .timeline-arrow {
            right: 20px;
            top: 45px;
            position: absolute;
        }

        .post-grid.timeline .item.even .timeline-arrow:after {
            left: 100%;
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(201, 201, 201, 0);
            border-left-color: #c9c9c9;
            border-width: 13px;
            margin-top: -13px;
            transform: translateY(-16%);
        }

        .post-grid.timeline .item.even .timeline-bubble {
            position: absolute;
            top: 0%;
            right: -39px;
            width: 7px;
            height: 7px;
            background: #ccc;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.3);
            transform: translateY(-50%);
        }

        .post-grid.timeline .item.odd .timeline-arrow:after {
            right: 100%;
            top: 50%;
            border: solid transparent;
            content: " ";
            height: 0;
            width: 0;
            position: absolute;
            pointer-events: none;
            border-color: rgba(201, 201, 201, 0);
            border-right-color: #c9c9c9;
            border-width: 13px;
            margin-top: -13px;
            transform: translateY(-16%);
        }

        .post-grid.timeline .item.odd .timeline-bubble {
            position: absolute;
            top: 0%;
            left: -38px;
            width: 7px;
            height: 7px;
            background: #ccc;
            border-radius: 50%;
            border: 5px solid #fff;
            box-shadow: 0 0 2px 1px rgba(0, 0, 0, 0.3);
            transform: translateY(-50%);
        }

        .post-grid.timeline .item.odd .timeline-arrow {
            left: 20px;
            top: 45px;
            position: absolute;

        }

        .post-grid.timeline .item.odd .timeline-arrow:after,
        .post-grid.timeline .item.even .timeline-arrow:after {
            border-width: <?php echo esc_attr($timeline_arrow_size); ?>;

        }

        .post-grid.timeline .item .timeline-arrow {
            height: <?php echo esc_attr($timeline_arrow_size); ?>;
        }


        .post-grid.timeline .item.even .timeline-bubble,
        .post-grid.timeline .item.odd .timeline-bubble {
            background: <?php echo esc_attr($timeline_bubble_bg_color); ?>;
            border: 5px solid <?php echo esc_attr($timeline_bubble_border_color); ?>;
        }

        .post-grid.timeline .item.even .timeline-arrow:after {
            border-left-color: <?php echo esc_attr($timeline_arrow_bg_color); ?>;
        }

        .post-grid.timeline .item.odd .timeline-arrow:after {
            border-right-color: <?php echo esc_attr($timeline_arrow_bg_color); ?>;
        }

        .grid-item,
        .grid-sizer {
            width: 47%;
        }

        .gutter-sizer {
            width: 2%;
        }
    </style>
    <?php

    $collapsible = 'true';
    ?>
    <script>
        jQuery(document).ready(function($) {




        })
    </script>
<?php


}



add_action('post_grid_view_type_css_collapsible', 'post_grid_view_type_css_collapsible', 90);

function post_grid_view_type_css_collapsible($args)
{

    $post_grid_options = $args['options'];
    $grid_id = $args['grid_id'];

    wp_enqueue_script('jquery');
    wp_enqueue_script('jquery-ui-core');
    wp_enqueue_script('jquery-ui-accordion');
    wp_enqueue_style('jquery-ui');


    $items_width_desktop = isset($post_grid_options['width']['desktop']) ? $post_grid_options['width']['desktop'] : '';
    $items_width_tablet = isset($post_grid_options['width']['tablet']) ? $post_grid_options['width']['tablet'] : '';
    $items_width_mobile = isset($post_grid_options['width']['mobile']) ? $post_grid_options['width']['mobile'] : '';

    $items_height_style = !empty($post_grid_options['item_height']['style']) ? $post_grid_options['item_height']['style'] : 'auto_height';
    $items_height_style_tablet = !empty($post_grid_options['item_height']['style_tablet']) ? $post_grid_options['item_height']['style_tablet'] : 'auto_height';
    $items_height_style_mobile = !empty($post_grid_options['item_height']['style_mobile']) ? $post_grid_options['item_height']['style_mobile'] : 'auto_height';

    $items_fixed_height = !empty($post_grid_options['item_height']['fixed_height']) ? $post_grid_options['item_height']['fixed_height'] : '220px';
    $items_fixed_height_tablet = !empty($post_grid_options['item_height']['fixed_height_tablet']) ? $post_grid_options['item_height']['fixed_height_tablet'] : '220px';
    $items_fixed_height_mobile = !empty($post_grid_options['item_height']['fixed_height_mobile']) ? $post_grid_options['item_height']['fixed_height_mobile'] : '220px';

    $items_margin = isset($post_grid_options['margin']) ? $post_grid_options['margin'] : '';
    $item_padding = isset($post_grid_options['item_padding']) ? $post_grid_options['item_padding'] : '';

    $items_media_height_style = !empty($post_grid_options['media_height']['style']) ? $post_grid_options['media_height']['style'] : 'auto_height';
    $items_media_fixed_height = !empty($post_grid_options['media_height']['fixed_height']) ? $post_grid_options['media_height']['fixed_height'] : '';



    if ($items_height_style == 'auto_height') {
        $items_height = 'auto';
    } elseif ($items_height_style == 'fixed_height') {
        $items_height = $items_fixed_height;
    } elseif ($items_height_style == 'max_height') {
        $items_height = $items_fixed_height;
    } else {
        $items_height = '220px';
    }

    if ($items_media_height_style == 'auto_height') {
        $items_media_height = 'auto';
    } elseif ($items_media_height_style == 'fixed_height') {
        $items_media_height = $items_media_fixed_height;
    } elseif ($items_media_height_style == 'max_height') {
        $items_media_height = $items_media_fixed_height;
    } else {
        $items_media_height = '220px';
    }

    $container_padding = isset($post_grid_options['container']['padding']) ? $post_grid_options['container']['padding'] : '';
    $container_bg_color = isset($post_grid_options['container']['bg_color']) ? $post_grid_options['container']['bg_color'] : '';
    $container_bg_image = isset($post_grid_options['container']['bg_image']) ? $post_grid_options['container']['bg_image'] : '';

    $items_bg_color_type = isset($post_grid_options['items_bg_color_type']) ? $post_grid_options['items_bg_color_type'] : '';
    $items_bg_color = isset($post_grid_options['items_bg_color']) ? $post_grid_options['items_bg_color'] : '#fff';


?>
    <style type="text/css">
        <?php echo '#post-grid-' . esc_attr($grid_id); ?> {
            <?php if (!empty($container_padding)) : ?>padding: <?php echo esc_attr($container_padding); ?>;
            <?php endif; ?><?php if (!empty($container_bg_color)) : ?>background-color: <?php echo esc_attr($container_bg_color); ?>;
            <?php endif; ?><?php if (!empty($container_bg_image)) : ?>background-image: url(<?php echo esc_url_raw($container_bg_image); ?>);
            <?php endif; ?>
        }


        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
            <?php if (!empty($items_margin)) : ?>margin: <?php echo esc_attr($items_margin); ?>;
            <?php endif; ?><?php if (!empty($item_padding)) : ?>padding: <?php echo esc_attr($item_padding); ?>;
            <?php endif; ?><?php if ($items_bg_color_type == 'fixed') : ?>background: <?php echo esc_attr($items_bg_color); ?>;
            <?php endif; ?>
        }

        <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item .layer-media'; ?> {
            overflow: hidden;
            <?php
            if ($items_media_height_style == 'fixed_height' || $items_media_height_style == 'auto_height') {
                echo 'height:' . esc_attr($items_media_height) . ';';
            } elseif ($items_media_height_style == 'max_height') {
                echo 'max-height:' . esc_attr($items_media_height) . ';';
            } else {
                echo 'height:' . esc_attr($items_media_height) . ';';
            }
            ?>
        }

        @media only screen and (min-width: 0px) and (max-width: 767px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php if (!empty($items_width_mobile)) : ?>width: <?php echo esc_attr($items_width_mobile); ?>;
                <?php endif; ?><?php
                                if ($items_height_style == 'fixed_height') {
                                    echo 'height:' . esc_attr($items_height) . ';';
                                } elseif ($items_height_style == 'max_height') {
                                    echo 'max-height:' . esc_attr($items_height) . ';';
                                } elseif ($items_height_style == 'auto_height') {
                                    echo 'height:auto;';
                                } else {
                                    echo 'height:auto;';
                                }
                                ?>
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 1023px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php if (!empty($items_width_tablet)) : ?>width: <?php echo esc_attr($items_width_tablet); ?>;
                <?php endif; ?><?php
                                if ($items_height_style_tablet == 'fixed_height') {
                                    echo 'height:' . esc_attr($items_fixed_height_tablet) . ';';
                                } elseif ($items_height_style_tablet == 'max_height') {
                                    echo 'max-height:' . esc_attr($items_fixed_height_tablet) . ';';
                                } elseif ($items_height_style_tablet == 'auto_height') {
                                    echo 'max-height:auto;';
                                } else {
                                    echo 'height:auto;';
                                }
                                ?>
            }
        }

        @media only screen and (min-width: 1024px) {
            <?php echo '#post-grid-' . esc_attr($grid_id) . ' .item'; ?> {
                <?php if (!empty($items_width_desktop)) : ?>width: <?php echo esc_attr($items_width_desktop); ?>;
                <?php endif; ?><?php
                                if ($items_height_style == 'fixed_height') {
                                    echo 'height:' . esc_attr($items_height) . ';';
                                } elseif ($items_height_style == 'max_height') {
                                    echo 'max-height:' . esc_attr($items_height) . ';';
                                } elseif ($items_height_style == 'auto_height') {
                                    echo 'height:auto;';
                                } else {
                                    echo 'height:auto;';
                                }
                                ?>
            }
        }
    </style>
    <?php

    $collapsible = 'true';
    ?>
    <script>
        jQuery(document).ready(function($) {
            accordion_<?php echo esc_attr($grid_id); ?> = $("<?php echo '#post-grid-' . esc_attr($grid_id); ?> .grid-items .layer-wrapper").accordion({
                event: "click",
                navigation: true,
                active: 999,
                collapsible: <?php echo esc_attr($collapsible); ?>,
            });



        })
    </script>
<?php


}
