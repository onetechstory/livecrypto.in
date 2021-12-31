<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ennlil
 */

get_header();

?>


	<?php 

	//Single Blog Template
	
	$ennlil_singleb_global = cs_get_option( 'ennlil_single_blog_layout' ); //for globally	
	$ennlil_single_post_style = get_post_meta( get_the_ID(),'ennlil_blog_post_meta', true );

	$theme_post_meta_single = isset($ennlil_single_post_style['ennlil_single_blog_layout']) && !empty($ennlil_single_post_style['ennlil_single_blog_layout']) ? $ennlil_single_post_style['ennlil_single_blog_layout'] : '';
	
	if( is_single() && !empty( $ennlil_single_post_style  ) ) {
	 
		get_template_part( 'template-parts/single/'.$theme_post_meta_single.'' ); 
	
	} elseif ( class_exists( 'CSF' ) && !empty( $ennlil_singleb_global ) ) {
		
		get_template_part( 'template-parts/single/'.$ennlil_singleb_global.'' );  
		
	} else {
		
		get_template_part( 'template-parts/single/single-one' );  
	}
		
	?>


<?php get_footer(); ?>
