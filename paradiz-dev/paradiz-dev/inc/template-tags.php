<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package paradiz
 */

if ( ! function_exists( 'paradiz_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function paradiz_posted_on() {
	echo get_paradiz_posted_on();
}
endif;



/*
	if ( 'post' === get_post_type() ) {

		$categories_list = get_the_category_list( esc_html__( ', ', 'paradiz' ) );
		if ( $categories_list ) {
			printf( '<span class="cat-links"><i class="si-folder"></i>' . esc_html__( '%1$s', 'paradiz' ) . '</span>', $categories_list ); // WPCS: XSS OK.
		}

		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'paradiz' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><i class="si-tag"></i>' . esc_html__( '%1$s', 'paradiz' ) . '</span>', $tags_list ); // WPCS: XSS OK.
		}
	}
*/




if ( ! function_exists( 'get_paradiz_posted_on' ) ) :
/**
 * Get HTML with meta information for the current post-date/time and author.
 */
function get_paradiz_posted_on() {

	$date_w3c = esc_attr( get_the_date( DATE_W3C ) );
	$date_txt = esc_html( get_the_date() );
	$modified_date_w3c = esc_attr( get_the_modified_date( DATE_W3C ) );
	$modified_date_txt = esc_html( get_the_modified_date() );

	$time_string = '<time class="entry-date published updated" datetime="' . $date_w3c .'">' . $date_txt .'</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="' . $date_w3c .'">' . $date_txt .'</time><time class="updated" datetime="' . $modified_date_w3c . '">' . $modified_date_txt . '</time>';
	}

	$posted_on = '<span class="posted-on"><i class="flaticon-earth-grid-symbol"></i><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a></span>';

	$byline = '';

	if($GLOBALS['s_blog_profile'] == 'enable') {
		$byline = '<span class="byline"><span class="author vcard"><i class="flaticon-account"></i><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span></span>';
	}

	return $posted_on . $byline;

}
endif;


if ( ! function_exists( 'paradiz_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function paradiz_entry_footer() {

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'paradiz' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function paradiz_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'paradiz_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'paradiz_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so paradiz_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so paradiz_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in paradiz_categorized_blog.
 */
function paradiz_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'paradiz_categories' );
}
add_action( 'edit_category', 'paradiz_category_transient_flusher' );
add_action( 'save_post',     'paradiz_category_transient_flusher' );

/**
 * Output Numbered Pagination
 * https://codex.wordpress.org/Function_Reference/paginate_links
 */
function paradiz_posts_navigation($wp_query = NULL) {
	if(!$wp_query) {
		global $wp_query;
	}
	printf('<div class="content-pagination">');
	$big = 9999999;
	echo paginate_links(
		array(
				'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' 	=> '?paged=%#%',
				'current'	=> max( 1, get_query_var('paged') ),
				'total' 	=> $wp_query->max_num_pages,
				'prev_text'  => '<i class="flaticon-left-chevron"></i>',
				'next_text'  => '<i class="flaticon-right-chevron"></i>',
		));
	printf('</div>');
}

/**
 * Output Logo (from functions.php or Custom Logo)
 */
function paradiz_logo() {
	if($GLOBALS['s_logo_path'] != 'none') {
		echo '<a href="' . esc_url( home_url( '/' ) ) .'" rel="home">';
		echo '<img src="' . get_stylesheet_directory_uri() . '/'. $GLOBALS['s_logo_path']. '" width="'. $GLOBALS['s_logo_width'] . '"  height="'. $GLOBALS['s_logo_height'] . '" alt="Logo">';
		echo '</a>';
	} else {
		the_custom_logo();
	}
}

/**
 * Output Title (h1/p)
 */
function paradiz_title() {
	if ( is_front_page() && is_home() ) {
		$tag = 'h1';
	} else {
		$tag = 'p';
	}
    echo '<' . $tag . ' class="site-title"><a href="' . esc_url( home_url( '/' ) ) .'" rel="home">' . get_bloginfo( 'name' ) . '</a></' . $tag. '>';
}

/*
 * Output Member Menu
*/
function paradiz_member_menu() {
	$m_menu  = '<a href="' . $GLOBALS['s_member_url'] . '" class="m-user">';
	$m_menu .= '<span class="pic">';
	$current_user = wp_get_current_user();
	if( 0 != $current_user->ID) {
		$m_menu .= get_avatar($current_user->ID, 64 );
	} else {
		$m_menu .= '<i class="flaticon-account"></i>';
	}
	$m_menu .= '</span>';
	$m_menu .= '</a>';
	echo $m_menu;
}

/*
* Output Main Header with Title
*/
function paradiz_banner_title($post_id) {

// Banner Class
$banner_class = $GLOBALS['s_title_style'];
if (function_exists('get_field')) {
    if(get_field( 'title_style', $post_id )) {
        $banner_class = get_field( 'title_style', $post_id );
    }
}

// Banner BG
$title_style = $GLOBALS['s_title_style'];
$banner_bg = '';
if (function_exists('get_field')) {
    if(get_field( 'title_style', $post_id )) {
        $title_style = get_field( 'title_style', $post_id );
    }
}
if($title_style == 'banner') {
    $img_banner = '';
    $img_banner_blur = '';
    $img_banner_opacity = '';
    if (function_exists('get_field')) {
        $img_banner = get_field( 'banner', $post_id );
        $img_banner_blur = get_field( 'banner_blur', $post_id );
        $img_banner_opacity = get_field( 'banner_opacity', $post_id );
    }
    if (!$img_banner) {
        $thumb_id = get_post_thumbnail_id($post_id);
        $thumb_url = wp_get_attachment_image_src($thumb_id, 'full', true);
        $img_banner = $thumb_url[0];
    }
    $banner_bg = '<div class="bg';
		if($img_banner) {
			$style = 'background-image: url(' . $img_banner . ');';
			if ($img_banner_blur != '') {
				$style .= ' filter: blur(' . $img_banner_blur . 'px);';
			}
			if ($img_banner_opacity) {
				$style .= ' opacity: ' . $img_banner_opacity . ';';
			}
			$banner_bg .= '" style="' . $style .'"';
		} else {
			$banner_bg .= ' -blank"';
		}
    $banner_bg .='></div>' ;
}
$permalink = get_the_permalink($post_id);
$breadcrumb='' ;
if (function_exists('yoast_breadcrumb') ) {
    $breadcrumb=yoast_breadcrumb( '<div id="breadcrumbs" class="bc">' ,'</div>',false);
}
// if (function_exists('rank_math_the_breadcrumbs') ) {
//     $breadcrumb=rank_math_the_breadcrumbs( '<div id="breadcrumbs" class="bc">' ,'</div>',false);
// }
if ( 'post' === get_post_type($post_id) ) {
    $breadcrumb='<div class="entry-meta">' . get_paradiz_posted_on() . '</div>' ;
}
if(is_front_page()) {
    $title=get_bloginfo( 'name' ) . '<small>' . get_bloginfo( 'description' ) . '</small>' ;
    $breadcrumb='' ;
} elseif (is_archive()) {
    $title=get_the_archive_title($post_id);
    $breadcrumb='' ;
} elseif (is_404()) {
    $title=__('Page not found', 'paradiz' );
} else {
    $title = get_the_title($post_id);
}
if (function_exists('is_shop') ) {
    if (is_shop()) {
        $title=get_the_title($post_id);
    }
}
    $output = '<div class="main-header -' . $banner_class . '">' . $banner_bg . '<div class="s-container"><div class="main-title _heading"><div class="title"><a href="' . $permalink . '">' . $title .'</a> </div>' . $breadcrumb . '</div></div></div>' ;
    echo $output;
}

/*
 * Output Author Avatar & Profile in .content-item
 */
function paradiz_author($author_id) {
    $output = '<a class="author" href="'
    . esc_url( get_author_posts_url($author_id) )
    .'">'
    . get_avatar($author_id, 40)
    . '<div class="name">'
        . '<h2>' . get_the_author_meta('display_name', $author_id) . '</h2>'
        . '<small>' . get_the_date() . '</small>'
        . '</div>'
    . '</a>';
    echo $output;
}

/*
 * Output Action in Header for Mobile
 */
function paradiz_header_action($action, $phone, $custom) {
switch ($action) {
case "menu":
echo '<div class="site-toggle"><b></b></div>';
break;
case "search":
echo '<a class="site-search _mobile s-modal-trigger m-user" onclick="return false;"
    data-popup-trigger="site-search"><i class="flaticon-magnifying-glass"></i></a>';
break;
case "phone":
echo '<a class="site-phone" href="tel:' . $phone . '"><i class="flaticon-phone"></i></a>';
break;
case "custom":
echo '<div class="site-custom">' . $custom . '</div>';
break;
}
}
