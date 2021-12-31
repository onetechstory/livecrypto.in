<?php 

    global $post;

    $relatedposts = get_posts( array( 
	
	'category__in' => wp_get_post_categories($post->ID), 
	'numberposts' => 5,
	'order'       => 'ASC',
	'post__not_in' => array($post->ID) ) 
	
	);
	
    if( $relatedposts ) : 

    echo '<div class="theme_related_post_Grid">';
    echo '<h2>'.esc_html__( 'Related Posts', 'ennlil' ).'</h2>';
	
    echo '<div class="theme_post_grid__Slider_Wrapperr">';
	echo '<div class="theme_post_grid__Slider weekend-top trending-slider owl-carousel owl-theme">';
	
	
    foreach( $relatedposts as $post ) {
		
    setup_postdata($post); ?>
    
	<div class="trending-news-slides">
		<div class="news-block-style">
			<div class="news-thumb related_post_grid_Thumbnail" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>);">
				<div class="grid-cat related_post_grid_Category">
					<?php require ENNLIL_THEME_DIR . '/template-parts/cat-color.php'; ?>
				</div>
			</div>
			<div class="news-content related_post_grid_Content">
				<h4 class="post-title related_post_grid__Title">
					<a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 7 ,'') ); ?></a>
				</h4>
				<p><?php echo esc_html( wp_trim_words(get_the_excerpt(), 11 ,'') );?></p>
				<div class="blog_meta_content_Box related_post_grid_Meta">
					<div class="entry-meta-author related_post_author_Thumbnail">
						<?php printf('<div class="entry-author-thumb">%1$s<a href="%2$s">%3$s</a></div>',
						get_avatar( get_the_author_meta( 'ID' ), 36 ), 
						esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
						get_the_author()
						); ?>
					</div>
					<div class="entry-date related_post_grid__Date">
						<span><i class="fa fa-clock-o"></i> <?php echo esc_html(get_the_date( 'F j, Y' )); ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>

    <?php } 
	
	wp_reset_postdata();

    echo '</div>'; 
	echo '</div>';
    echo '</div>';

    endif;