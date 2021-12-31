<?php

$ennlil_cats_show = cs_get_option('blog_catt');
$ennlil_cmeta_show = cs_get_option('blog_meta_cat', true);
$length_cat_title = cs_get_option('length_cat_title');

?>

<div class="main-content-inner category-layout-three row">
  
	<?php while ( have_posts() ) : the_post(); ?>
    <article id="post-<?php the_ID(); ?>" <?php post_class('post-layout col-md-6'); ?>>
	
		<div <?php post_class("blog-post-wrapper news-block-design"); ?>>
			<div class="item news-block-hover_Effect" style="background-image:url(<?php echo esc_attr(esc_url(get_the_post_thumbnail_url())); ?>)">
    
				<div class="news-postblock-content cat_grid_item_Content">
					<div class="post-content cat_grid_item_content_Inner">
					<?php if($ennlil_cats_show == true) :?>
					<div class="news-cat-box-wrap">
						<?php require ENNLIL_THEME_DIR . '/template-parts/cat-color.php'; ?>
					</div>
					<?php endif; ?>
					<h3 class="post-title cat_grid_item_Title">
						<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html( wp_trim_words(get_the_title(), $length_cat_title, '') );?></a>
					</h3>
					<?php if($ennlil_cmeta_show == true) :?>
					<ul class="news_block_Meta cat_grid_item_Meta">
						<?php printf('<li class="post-author post_cat_author_Thumbnail">%1$s<a href="%2$s">%3$s</a></li>',
							get_avatar( get_the_author_meta( 'ID' ), 36 ), 
							esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
							get_the_author()
						); ?>

						<li class="post_cat_item_Date">
							<i class="fa fa-clock-o"></i>
							<?php  echo esc_html(get_the_date( 'F j, Y' )); ?>
						</li>
					</ul>
					<?php endif; ?>
					</div>
				</div>
				
			</div>
		</div>
		
	</article>
   <?php endwhile; ?>

</div>