<?php

$ennlil_cmeta_show = cs_get_option('blog_meta_cat', true);
$length_cat_title = cs_get_option('length_cat_title');
$cat_excerpt_limit = cs_get_option('cat_excerpt_limit');

?>

<div class="main-content-inner category-layout-two cat-layout-alt">
	<div class="row"> 
	<?php while ( have_posts() ) : the_post(); ?>
      
		<article id="post-<?php the_ID(); ?>" <?php post_class('post-layout col-md-12'); ?>>
        
			<div class="theme_news_grid__Design blog-post-wrapper row">
				<?php if(has_post_thumbnail()): ?>
				<div class="col-md-6 pr-zero">
					<div class="post-media post-image" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>);">   
					</div>
				</div>
				<?php endif; ?>
	
				<div class="<?php echo esc_attr(has_post_thumbnail()?"col-md-6 pl-zero ":"col-md-12"); ?> ">
					<div class="post-content cat_list_item_Content">
						<div class="blog_title_Box">
							<h2 class="post-title cat_list_item_Title">
								<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html( wp_trim_words(get_the_title(), $length_cat_title, '') );?></a>
							</h2>
						</div>
						<?php if($ennlil_cmeta_show == true) :?>
						<div class="post-meta blog_meta_content_Box">  
							<?php ennlil_category_post_meta(); ?> 
						</div>
						<?php endif; ?>
					  
						<div class="blog_excerpt_Box cat_grid_item_content_Excerpt">
							<p><?php echo esc_html( wp_trim_words(get_the_excerpt(), $cat_excerpt_limit, '') );?></p>
					 
							<a href="<?php echo esc_url( get_permalink() ); ?>" class="read_more_Btutton theme_cat_grid__Button"><?php echo esc_html__('Read More', 'ennlil'); ?></a>
						</div>
					</div>
				</div>
			</div>
			
		</article>

   <?php endwhile; ?>
   </div>
</div>