<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ennlil
 */

$blog_title = cs_get_option('blog_title');
$blog_breadcrumb = cs_get_option('blog_breadcrumb_enable');

get_header();

?>

	<?php if($blog_breadcrumb == true) :?>
    <!-- Blog Breadcrumb -->
    <div class="theme-breadcrumb__Wrapper theme-breacrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
					<h1 class="theme-breacrumb-title">
						<?php echo esc_html($blog_title); ?>
					</h1>
					<div class="breaccrumb-inner">
						<?php 
							if ( shortcode_exists( '[flexy_breadcrumb]' ) ) {
								echo do_shortcode( '[flexy_breadcrumb]');
							}
						?>
					</div>
				</div>
            </div>
        </div>
    </div>
    <!-- Blog Breadcrumb End -->
	<?php endif; ?>
	
	<section id="main-content" class="blog main-container blog-spacing" role="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="category-layout-two main-blog-layout blog-new-layout">
					<?php if (have_posts()): ?>
					
						<?php while (have_posts()): the_post(); ?>
							<?php get_template_part('template-parts/content', get_post_format());?>
						<?php
						endwhile; ?>
						
						<div class="theme-pagination-style text-center">
							<?php
								the_posts_pagination(array(
								'next_text' => '<i class="fa fa-long-arrow-right"></i>',
								'prev_text' => '<i class="fa fa-long-arrow-left"></i>',
								'screen_reader_text' => ' ',
								'type'                => 'list'
							));
							?>
						</div>
						
						<?php else: ?>
							<?php get_template_part('template-parts/content', 'none'); ?>
						<?php endif; ?>
						
					</div>
				</div>

				<?php get_sidebar(); ?>

			</div>
		</div>
	</section>
	
	<?php get_footer(); ?>
