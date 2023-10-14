<?php
if (!defined('ABSPATH')) exit;  // if direct access





add_filter('post_grid_js_args', 'post_grid_pro_js_args', 10, 2);

function post_grid_pro_js_args($post_grid_js_args, $args)
{


    $options = isset($args['options']) ? $args['options'] : array();

    $no_posts_text = !empty($options['pagination']['no_posts_text']) ? $options['pagination']['no_posts_text'] : '';

    $post_grid_js_args['no_posts_text'] = $no_posts_text;


    return $post_grid_js_args;
}







function post_grid_pro_glossary_index($wp_query)
{

    $glossary_index = array();

    if ($wp_query->have_posts()) :
        while ($wp_query->have_posts()) : $wp_query->the_post();
            $post_title = get_the_title();

            $glossary_index[] = isset($post_title[0]) ? $post_title[0] : '';

        endwhile;
        wp_reset_query();
        wp_reset_postdata();
    endif;

    return $glossary_index;
}


function post_grid_ajax_load_more()
{



    $grid_id = isset($_POST['grid_id']) ? sanitize_text_field($_POST['grid_id']) : '';
    $paged = isset($_POST['paged']) ? sanitize_text_field($_POST['paged']) : '';
    $terms = isset($_POST['terms']) ? sanitize_text_field($_POST['terms']) : '';


    //$paged = sanitize_text_field($_POST['current_page']);

    $post_grid_options = get_post_meta($grid_id, 'post_grid_meta_options', true);

    $keyword = isset($_POST['keyword']) ? sanitize_text_field($_POST['keyword']) : '';


    $post_types = isset($post_grid_options['post_types']) ? $post_grid_options['post_types'] : array('post');
    $exclude_post_id = isset($post_grid_options['exclude_post_id']) ? $post_grid_options['exclude_post_id'] : '';
    $exclude_post_id = !empty($exclude_post_id) ? array_map('intval', explode(',', $exclude_post_id)) : array();

    $post_status = isset($post_grid_options['post_status']) ? $post_grid_options['post_status'] : 'publish';
    $query_order = isset($post_grid_options['query_order']) ? $post_grid_options['query_order'] : 'DESC';
    $query_orderby = isset($post_grid_options['query_orderby']) ? $post_grid_options['query_orderby'] : array('date');
    $query_orderby = implode(' ', $query_orderby);
    $offset = isset($post_grid_options['offset']) ? (int)$post_grid_options['offset'] : '';
    $posts_per_page = isset($post_grid_options['posts_per_page']) ? $post_grid_options['posts_per_page'] : 10;
    $query_orderby_meta_key = isset($post_grid_options['query_orderby_meta_key']) ? $post_grid_options['query_orderby_meta_key'] : '';


    $taxonomies = !empty($post_grid_options['taxonomies']) ? $post_grid_options['taxonomies'] : array();
    $categories_relation = isset($post_grid_options['categories_relation']) ? $post_grid_options['categories_relation'] : 'OR';

    $query_args = array();



    /* ################################ Tax query ######################################*/

    $tax_query = array();

    if (empty($terms)) {
        foreach ($taxonomies as $taxonomy => $taxonomyData) {

            $terms = !empty($taxonomyData['terms']) ? $taxonomyData['terms'] : array();
            $terms_relation = !empty($taxonomyData['terms_relation']) ? $taxonomyData['terms_relation'] : 'OR';
            $checked = !empty($taxonomyData['checked']) ? $taxonomyData['checked'] : '';

            if (!empty($terms) && !empty($checked)) {
                $tax_query[] = array(
                    'taxonomy' => $taxonomy,
                    'field'    => 'term_id',
                    'terms'    => $terms,
                    'operator'    => $terms_relation,
                );
            }
        }
    } else {



        $taxonomy = isset($_POST['taxonomy']) ? sanitize_text_field($_POST['taxonomy']) : '';


        $tax_query[] = array(
            'taxonomy' => $taxonomy,
            'field'    => 'term_id',
            'terms'    => $terms,
            'operator'    => 'IN',
        );
    }


    $tax_query_relation = array('relation' => $categories_relation);
    $tax_query = array_merge($tax_query_relation, $tax_query);


    /* ################################ Keyword query ######################################*/

    $keyword = isset($_GET['keyword']) ? sanitize_text_field($_GET['keyword']) : $keyword;


    /* ################################ Single pages ######################################*/


    if (is_singular()) :
        $current_post_id = get_the_ID();
        $query_args['post__not_in'] = array($current_post_id);
    endif;



    //
    //    if ( get_query_var('paged') ) {
    //        $paged = get_query_var('paged');
    //    }elseif ( get_query_var('page') ) {
    //        $paged = get_query_var('page');
    //    }else {
    //        $paged = 1;
    //    }




    if (!empty($post_types))
        $query_args['post_type'] = $post_types;

    if (!empty($post_status))
        $query_args['post_status'] = $post_status;

    if (!empty($keyword))
        $query_args['s'] = $keyword;


    if (!empty($exclude_post_id))
        $query_args['post__not_in'] = $exclude_post_id;

    if (!empty($query_order))
        $query_args['order'] = $query_order;

    if (!empty($query_orderby))
        $query_args['orderby'] = $query_orderby;

    if (!empty($query_orderby_meta_key))
        $query_args['meta_key'] = $query_orderby_meta_key;

    if (!empty($posts_per_page))
        $query_args['posts_per_page'] = (int)$posts_per_page;

    if (!empty($paged))
        $query_args['paged'] = $paged;

    if (!empty($offset))
        $query_args['offset'] = $offset + (($paged - 1) * $posts_per_page);


    if (!empty($tax_query))
        $query_args['tax_query'] = $tax_query;



    $query_args = apply_filters('post_grid_ajax_query_args', $query_args, $grid_id);
    // $query_args = apply_filters('post_grid_query_args', $query_args, $args);


    //echo '<pre>'.var_export($query_args, true).'</pre>';

    $post_grid_wp_query = new WP_Query($query_args);

    //$wp_query = $post_grid_wp_query;

    $args['options'] = $post_grid_options;
    //echo '<pre>'.var_export($post_grid_wp_query, true).'</pre>';

    $response = array();
    $pagination_prev_text = !empty($post_grid_options['pagination']['prev_text']) ? $post_grid_options['pagination']['prev_text'] : __('« Previous', 'post-grid');
    $pagination_next_text = !empty($post_grid_options['pagination']['next_text']) ? $post_grid_options['pagination']['next_text'] : __('Next »', 'post-grid');

    $loop_count = 0;



    ob_start();

    if ($post_grid_wp_query->have_posts()) :
        ob_start();
        while ($post_grid_wp_query->have_posts()) : $post_grid_wp_query->the_post();
            $post_id = get_the_ID();
            $args['post_id'] = $post_id;
            $args['loop_count'] = $loop_count;

            do_action('post_grid_loop', $args);

            $loop_count++;
        endwhile;



        $response['html'] = ob_get_clean();

        $big = 999999999; // need an unlikely integer
        $max_num_pages = $post_grid_wp_query->max_num_pages;

        $html_pagination = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => max(1, $paged),
            'total' => $max_num_pages,
            'prev_text'          => $pagination_prev_text,
            'next_text'          => $pagination_next_text,
        ));

        wp_reset_query();
        wp_reset_postdata();

        $response['has_posts'] = 'yes';

    else :

        $response['has_posts'] = 'no';


    endif;

    $html = ob_get_clean();

    $response['pagination'] = $html_pagination;


    echo json_encode($response);

    die();
}

add_action('wp_ajax_post_grid_ajax_load_more', 'post_grid_ajax_load_more');
add_action('wp_ajax_nopriv_post_grid_ajax_load_more', 'post_grid_ajax_load_more');
