<?php 

$blog_single_author= cs_get_option('blog_author');
$blog_single_navigation = cs_get_option('blog_nav');
$blog_single_related = cs_get_option('blog_related');
$blog_single_taglist = cs_get_option('blog_tags');

?>

<?php get_template_part('template-parts/single/single', 'toptwo'); ?>


<div id="main-content" class="bloglayout__Two main-container blog-single post-layout-style2 single-one-bwrap"  role="main">
	<div class="container">
		<div class="row single-blog-content">
		
			<div class="col-lg-2"></div>
			
			<div class="col-lg-8 col-sm-12">
            <?php while (have_posts()):
				the_post(); ?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(["post-content", "post-single"]); ?>>
				
					<?php if(get_post_format()=='video'): ?>
					<div class="post-media post-image">
						<?php get_template_part( 'template-parts/single/post', 'video' ); ?>  
					</div>
					<?php endif; ?>
					
					<div class="post-body clearfix single-blog-header single-blog-inner blog-single-block blog-details-content">
						<!-- Article content -->
						<div class="entry-content clearfix">
							
							<?php
							if ( is_search() ) {
								the_excerpt();
							} else {
								the_content();
								ennlil_link_pages();
							}
							?>
							
						<?php if(has_tag() && $blog_single_taglist == true ) : ?>
						<div class="post-footer clearfix">
							<?php ennlil_single_post_tags(); ?>
						</div>
						 
						<?php endif; ?>	
						</div> 
					</div> 	
					
				</article>
               
				<?php if($blog_single_author == true) :?>
					<?php ennlil_theme_author_box(); ?>
				<?php endif; ?>
			   
				<?php if($blog_single_navigation == true) :?>
					<?php ennlil_theme_post_navigation(); ?>
				<?php endif; ?>
			   
				<?php comments_template(); ?>
				<?php endwhile; ?>
				
			</div>	
			
			<div class="col-lg-2"></div>

        </div>
		
		<?php if($blog_single_related == true) :?>
		<div class="theme_related_posts_Wrapper">
			<div class="row">
				<div class="col-md-12">
					<?php get_template_part('template-parts/single/related', 'posts'); ?>
				</div>
			</div>
			
		</div>
		<?php endif; ?>
		
    </div> 
</div>









