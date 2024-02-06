jQuery(document).ready(function ($) {


	$(document).on('click', '.post-grid .load-more', function () {


		var paged = parseInt($(this).attr('paged'));
		var per_page = parseInt($(this).attr('per_page'));
		var grid_id = parseInt($(this).attr('grid_id'));
		var terms = $('#post-grid-' + grid_id + ' .nav-filter .filter.active').attr('terms-id');

		var taxonomy = '';
		//alert(terms);

		if (terms == null || terms == '') {
			terms = '';
		}

		$(this).addClass('loading');


		var post_grid_options = $('#post-grid-' + grid_id).attr('data-options');

		post_grid_options = JSON.parse(post_grid_options);

		masonry_enable = post_grid_options.masonry_enable;
		no_posts_text = post_grid_options.no_posts_text;
		page_type = post_grid_options.page_type;

		if (page_type == 'taxonomy') {

			terms = post_grid_options.page_tax_term;
			taxonomy = post_grid_options.page_taxonomy;


		}

		$.ajax(
			{
				type: 'POST',
				context: this,
				url: post_grid_ajax.post_grid_ajaxurl,
				data: { "action": "post_grid_ajax_load_more", "grid_id": grid_id, "per_page": per_page, "paged": paged, "terms": terms, "taxonomy": taxonomy, },
				success: function (data) {

					var response = JSON.parse(data)
					var html = response['html'];
					var has_posts = response['has_posts'];



					if (masonry_enable == 'yes') {

						var $container = $('#post-grid-' + grid_id + ' .grid-items');
						// initialize

						$container.append(html).masonry('appended', html, true);
						$container.masonry({
							itemSelector: '.item',
							columnWidth: '.item', //as you wish , you can use numeric
							isAnimated: true,
						});
						$container.masonry('reloadItems');
						$container.imagesLoaded().progress(function () {
							$container.masonry('layout');
						});

					}
					else {
						$('#post-grid-' + grid_id + ' .grid-items').append(html);
					}


					$(this).attr('paged', (paged + 1));

					if ($(this).hasClass('loading')) {

						$(this).removeClass('loading');

					}

					if (has_posts == 'no') {
						$(this).addClass('no-more-posts');
						$(this).text(no_posts_text);

						$(this).fadeOut(2000);
					}


				}
			});

		//alert(per_page);
	})

});






