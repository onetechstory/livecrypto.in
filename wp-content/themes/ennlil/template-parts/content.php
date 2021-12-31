<?php 

$excerpt_limit = cs_get_option('excerpt_limit');

?>

	<article <?php post_class('post-wrapper'); ?>>
	
		<div class="new theme-single-blog-wrapper">
			<?php if(has_post_thumbnail()): ?>
			<div class="entry-media">
				<img class="img-fluid" src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt=" <?php the_title_attribute(); ?>">
			</div>
			<?php endif; ?>

			<div class="theme-post-contentt agaisn">

				<div class="post-meta blog_meta_content_Box">  
					<?php ennlil_category_post_meta(); ?> 
					<span class="post_meta__Comment">
						<a class="ennlil-comment" href="<?php echo esc_url( get_comments_link() ); ?>">
							<i class="icofont-comment"></i>
							<?php printf( esc_html( _nx( 'Comments (%1$s)', 'Comments (%1$s)', get_comments_number(), 'comments title', 'ennlil' ) ), '<span class="comment">'.number_format_i18n( get_comments_number() ).'</span>','<span>' . get_the_title() . '</span>' ); ?>
						</a>
					</span>
				</div>

				<h2 class="post-title theme_blog_post__Title">
					<a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title(); ?></a>
				</h2>
				<div class="entry-details theme_blog_post__Content">
				
					<p><?php echo get_the_excerpt(); ?></p>
					
					<?php echo '<div style="clear:both"></div><a href="' . esc_url( get_permalink() ) . '" class="read_more_Btutton theme_blog_post__Button">'.esc_html__('Read More', 'ennlil').'</a>'; ?>
					 
				</div>
			</div>
		</div>
	
	</article>
