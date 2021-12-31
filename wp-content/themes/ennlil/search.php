<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package ennlil
 */
 
get_header();

?>
	
	<!-- Search Breadcrumb -->
    <div class="theme-breadcrumb__Wrapper theme-breacrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
					<h1 class="theme-breacrumb-title">
						<?php printf(esc_html__('Search Results for: %s', 'ennlil') , get_search_query()); ?>
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
    <!-- Search Breadcrumb End -->

	<section class="blog main-container" role="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="category-layout-two main-blog-layout blog-new-layout">
					
					<?php if (have_posts()): ?>
					<?php while (have_posts()): the_post(); ?>
						<?php get_template_part('template-parts/content', get_post_format());?>
					<?php endwhile; ?>
					
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
