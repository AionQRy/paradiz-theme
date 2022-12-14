<?php get_header(); ?>

<?php 
	if ( !is_front_page() && is_home() ) {
		$post_id = get_option( 'page_for_posts' );
	} else {
		$post_id = get_the_ID();
	}
	paradiz_banner_title($post_id); 
?>

<div class="s-container main-body <?php echo '-'.$GLOBALS['s_blog_layout']; ?>">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php 
				echo '<div class="s-grid -m'.$GLOBALS['s_blog_columns_m'].' -d'.$GLOBALS['s_blog_columns_d'].'">';
				while ( have_posts() ) : the_post();
				get_template_part( 'template-parts/content', $GLOBALS['s_blog_template']);
				endwhile; 
				echo '</div>';
				paradiz_posts_navigation(); 
			?>

        </main>
    </div>

    <?php 
		switch ($GLOBALS['s_blog_layout']) {
			case 'rightbar':
				get_sidebar('right'); 
				break;
			case 'leftbar':
				get_sidebar('left'); 
				break;
			case 'full-width':
				break;
			default:
				break;
		}
	?>
</div>

<?php get_footer(); ?>