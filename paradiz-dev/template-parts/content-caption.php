<?php
/**
 * Loop Name: Content Caption
 */
?>
<article id="post-<?php the_ID();?>" <?php post_class('content-item -caption');?>>
    <div class="pic">
        <a href="<?php the_permalink();?>" title="Permalink to <?php the_title_attribute();?>" rel="bookmark">
            <?php if (has_post_thumbnail()) {the_post_thumbnail('large');} else {echo '<img src="' . esc_url(get_template_directory_uri()) . '/img/thumb.jpg" alt="' . get_the_title() . '" />';}?>
        </a>
    </div>
    <div class="info">
        <header class="entry-header">
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');?>
            <?php if ('post' === get_post_type()): ?>
            <div class="entry-meta">
                <?php paradiz_posted_on();?>
            </div>
            <?php endif;?>
        </header>
    </div>
</article>