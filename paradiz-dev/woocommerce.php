<?php get_header(); ?>
<?php
	if(!is_front_page()) {
		$shop_page_id = get_option( 'woocommerce_shop_page_id' );
		if(is_shop()) {
			paradiz_banner_title($shop_page_id);
		} else {
			paradiz_banner_title(get_the_ID());
		}
	}
	$css_class = '';
	if($GLOBALS['s_shop_layout'] != 'full-width' && !is_product()) {
		$css_class = ' -' . $GLOBALS['s_shop_layout'] . '  -shopbar';
	}
?>
<div class="s-container main-body <?php echo $css_class; ?>">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
			if(is_shop() && !(is_search()) && ($GLOBALS['s_shop_pagebuilder'] == 'enable')) {

				/* Use Shop Page instead of Archive Product */
				edit_post_link('Edit', '<span class="edit-link">','</span>', $shop_page_id);
				$the_query = new WP_Query( array( 'page_id' => $shop_page_id ));
				while ( $the_query->have_posts() ) : $the_query->the_post();
				the_content();
				endwhile;
				wp_reset_postdata();

			} else {
				woocommerce_content();
				if (is_shop()) {
					edit_post_link('Edit', '<span class="edit-link">','</span>', $shop_page_id);
				} else {
					paradiz_entry_footer();
				}
			}
			?>
        </main>
    </div>
    <?php if($GLOBALS['s_shop_layout'] != 'full-width' && !is_product() ) get_sidebar('shop'); ?>
</div>
<?php get_footer(); ?>
