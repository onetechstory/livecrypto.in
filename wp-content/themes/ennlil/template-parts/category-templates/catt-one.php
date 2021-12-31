<?php

$ennlil_cats_show = cs_get_option('blog_catt');
$ennlil_cmeta_show = cs_get_option('blog_meta_cat', true);
$length_cat_title = cs_get_option('length_cat_title');
$cat_excerpt_limit = cs_get_option('cat_excerpt_limit');

?>

<div class="main-content-inner row category-layout-one">
  
	<?php while ( have_posts() ) : the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class('post-layout col-md-6'); ?>>
		<div class="theme_news_grid__Design blog-post-wrapper">
		
			<?php if(has_post_thumbnail()): ?>
			<div class="post-thumb">
				<div class="cat-one-post-image" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>);">
				</div>
				<?php if($ennlil_cats_show == true) :?>
				<div class="grid-cat">
					<?php require ENNLIL_THEME_DIR . '/template-parts/cat-color.php'; ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>

			<div class="post-content cat_grid_item_Content">
				<div class="blog_title_Box">
					<h3 class="post-title cat_grid_item_Title">
						<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html( wp_trim_words(get_the_title(), $length_cat_title, '') );?></a>
					</h3>
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
	</article>
	
	<?php endwhile; ?>

</div>