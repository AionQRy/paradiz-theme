<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package paradiz
 */
get_header(); ?>

<div class="main-header -banner">
  <div class="bg" style="background-image: url('https://www.designrest.com/wp-content/uploads/edd/2019/08/5b65f25142bbd070ae105dcc90ca1c4f.jpg');"></div>
  <div class="s-container"><div class="main-title _heading"><div class="title">
    <a href="https://www.designrest.com/theme/">ธีมของเรา</a>
  </div>
</div>
</div>
</div>

<div class="s-container main-body <?php echo '-'.$GLOBALS['s_blog_layout']; ?>">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php if ( have_posts() ) : ?>

            <header class="page-header">
                <?php
					the_archive_title( '<h1 class="page-title entry-title hide">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
					?>
            </header>

            <?php
                echo '<div class="s-grid -m'.$GLOBALS['s_blog_columns_m'].' -d'.$GLOBALS['s_blog_columns_d'].'">';
                while ( have_posts() ) : the_post();
                get_template_part( 'template-parts/content', $GLOBALS['s_blog_template']);
                endwhile;
                echo '</div>';
                paradiz_posts_navigation();
            ?>

            <?php else : ?>

            <?php get_template_part( 'template-parts/content', 'none' ); ?>

            <?php endif; ?>

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
