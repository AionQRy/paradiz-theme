<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package paradiz
 */
 if ( \Elementor\Plugin::$instance->preview->is_preview_mode() ) {
   get_header();
    while ( have_posts() ) : the_post();
    the_content();
   wp_reset_postdata();
    endwhile;
   get_footer();

 } else {
   wp_safe_redirect('/');
   exit;
 }
