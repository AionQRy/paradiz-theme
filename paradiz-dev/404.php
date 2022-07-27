<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package paradiz
 */
get_header();?>


<?php paradiz_banner_title(get_the_ID()); ?>

<div class="s-container main-body">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <section class="error-404 not-found">
                <header class="page-header hide">
                    <h1 class="page-title"><?php esc_html_e('That page can&rsquo;t be found.', 'paradiz');?></h1>
                </header>

                <div class="page-content">
                    <p><?php esc_html_e('It looks like nothing was found at this location.', 'paradiz');?></p>
                    <?php get_search_form(); ?>
                </div>
            </section>

        </main>
    </div>
</div>

<?php get_footer();?>
