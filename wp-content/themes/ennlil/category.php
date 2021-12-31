<?php
/**
 * The template for displaying catgeory pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package ennlil
 */

get_header();

$ennlil_cat_style = get_term_meta( get_queried_object_id(), 'ennlil', true );
$ennlil_cat_style_template = !empty( $ennlil_cat_style['ennlil_cat_layout'] )? $ennlil_cat_style['ennlil_cat_layout'] : '';
	
?>

	<!-- Category Breadcrumb -->
    <div class="theme-breadcrumb__Wrapper theme-breacrumb-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
					<h1 class="theme-breacrumb-title">
						<?php echo esc_html__('Category','ennlil').' :'; ?>  <?php single_cat_title(); ?>
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
    <!-- Category Breadcrumb End -->

	<section id="main-content" class="blog main-container cat-page-spacing" role="main">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-lg-4">
				
					<?php if (have_posts() ): ?>
					
					<?php 
				
						$ennlil_cat_global = cs_get_option( 'ennlil_cat_layout' ); //for global	  
						
						if( is_category() && !empty( $ennlil_cat_style  ) ) {
						 
						get_template_part( 'template-parts/category-templates/'.$ennlil_cat_style_template.'' ); 
						
						} elseif ( class_exists( 'CSF' ) && !empty( $ennlil_cat_global ) ) {
							
							get_template_part( 'template-parts/category-templates/'.$ennlil_cat_global.'' );
							
						} else {
							
							get_template_part( 'template-parts/category-templates/catt-one' ); 
						}
					?>
		
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
				
				<?php get_sidebar(); ?>
				
			</div>
		</div>
	</section>

<?php get_footer(); ?>
