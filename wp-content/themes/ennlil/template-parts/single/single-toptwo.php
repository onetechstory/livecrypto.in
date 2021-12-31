<?php 

$user = wp_get_current_user();
$blog_single_meta = cs_get_option('blog_single_meta');
$blog_single_cat = cs_get_option('blog_single_cat');
$blog_single_author = cs_get_option('blog_single_author');
$blog_single_date = cs_get_option('blog_single_date');
$blog_single_comment = cs_get_option('blog_single_comment');
$blog_single_view = cs_get_option('blog_single_view');
$blog_single_read_time = cs_get_option('blog_single_read_time');
$blog_header_one_style = cs_get_option('blog_header_one_style', true);

?>

<div class="theme-featured-thumbp-wrappr theme_single_blog_banner__Center <?php if( $blog_header_one_style == true ) { echo "home_style_singletwo"; } else { echo "simple-header"; } ?>">
	<div class="single-blog-header-layout full-width-featured" style="background-image: url( <?php echo esc_url( the_post_thumbnail_url( 'full' ) ); ?> );">

		<div class="full-width-captions">
			<div class="container">
				<div class="row">
					<div class="col-md-12 single-blog-header">
						<h1 class="single-blogtitle post-title single_blog_inner__Title"><?php the_title(); ?></h1>
						
					
						<ul class="post-meta blog-post-metas single_blog_inner__Meta">
						
							<?php if($blog_single_author == true) :?>
							<?php printf('<li class="post-author blog_details_author_Thumbnail">%1$s<a href="%2$s">%3$s</a></li>',
								get_avatar( get_the_author_meta( 'ID' ), 32 ), 
								esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
								get_the_author()
							); ?>
							<?php endif; ?>		
								
							<?php if($blog_single_date == true) :?>	
							<li class="post-meta-date blog_details__Date"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></li> 
							<?php endif; ?>
							
							<?php if($blog_single_comment == true) :?>	
							<li class="post-comment blog_details_comment__Number">
								<a href="#" class="comments-link"><?php echo get_comments_number(get_the_ID()); ?> </a>
							</li>
							<?php endif; ?>
							
							<?php if($blog_single_view == true) :?>	
							<li class="meta-post-view blog_details_blog__View">
							<?php ennlil_set_post_view();?>
							<?php echo ennlil_get_post_view(); ?>
							</li>
							<?php endif; ?>
							
							<?php if($blog_single_read_time == true) :?>	
							<li class="read-time blog_details_blog__Readtime">
								<span class="post-read-time"><i class="fa fa-eye"></i><span class="read-time"><?php echo ennlil_reading_time(); ?></span></span>
							</li>
							<?php endif; ?>
							
						</ul>

						
					</div>
				</div>
			</div>
		</div>
		
	</div>
</div>