<?php
if (!defined('ABSPATH'))
{
	exit; // Exit if accessed directly
	
}

if (!function_exists('ennlil_theme_inline_style')):

	function ennlil_theme_inline_style()
	{

		wp_enqueue_style('ennlil-custom-style', get_template_directory_uri() . '/assets/css/custom-style.css');
		
		
		
		$theme_color_type = cs_get_customize_option('theme_color_type');
		
		$gradient_one = cs_get_customize_option('gradient_one');
		$gradient_two = cs_get_customize_option('gradient_two');
		
		$theme_main_color = cs_get_customize_option('theme_main_color');
		
		$theme_second_color = cs_get_customize_option('theme_second_color');
		
		$theme_btn_hover_color = cs_get_customize_option('theme_btn_hover_color');
		
		
		
		$theme_top_bar_bg = cs_get_customize_option('top_bar_bg');
		
		
		$nav_bar_one_bgcolor = cs_get_customize_option('nav_bg_one');
		$nav_bar_two_bgcolor = cs_get_customize_option('nav_bg_two');
		
		$top_gr_bg_one = cs_get_customize_option('top_gr_bg_one');
		$top_gr_bg_two = cs_get_customize_option('top_gr_bg_two');
		
		$body_color = cs_get_customize_option('theme_body_text');
		
		$theme_logo_width = cs_get_option('logo_width');
		$theme_logo_height = cs_get_option('logo_height');
		
		
		$blog_thumb_height = cs_get_option('blog_thumb_height');
		

		$custom_css = '';
		
		
		if (!empty($theme_logo_width))
		{
			$custom_css .= '.logo img {max-width: ' . esc_attr($theme_logo_width) . 'px;}';
		}
		
		if (!empty($theme_logo_height))
		{
			$custom_css .= '.logo img {height: ' . esc_attr($theme_logo_height) . 'px;}';
		}
		
		if (!empty($blog_thumb_height))
		{
			$custom_css .= 'body.blog .blog-new-layout .entry-media img {height: ' . esc_attr($blog_thumb_height) . 'px;}';
		}
		
		
		if (!empty($body_color))
		{
			$custom_css .= 'body {color: ' . esc_attr($body_color) . ';}';
		}
		
		
		
		
		if (!empty($theme_top_bar_bg))
		{
			$custom_css .= '.top-header-area {background: ' . esc_attr($theme_top_bar_bg) . ';}';
		}
		
		if (!empty($nav_bar_one_bgcolor) and !empty($nav_bar_two_bgcolor) )
		{
			$custom_css .= ' .theme_header_design__gradient .mainmenu {
				background-image: linear-gradient(90deg, ' . esc_attr($nav_bar_one_bgcolor) . ' 0%, ' . esc_attr($nav_bar_two_bgcolor) . ' 100%);
			}';
			
		}
		
		if (!empty($top_gr_bg_one) and !empty($top_gr_bg_two) )
		{
			$custom_css .= ' .top-header-area.top-bar-three {
				background-image: linear-gradient(90deg, ' . esc_attr($top_gr_bg_one) . ' 0%, ' . esc_attr($top_gr_bg_two) . ' 100%);
			}';
			
		}
		
		
		if($theme_color_type == 'gradient-color' ) {
			
		if (!empty($gradient_one) and !empty($gradient_two) ) {
			
			$custom_css .= ' .category-layout-one .blog-post-wrapper a.read_more_Btutton, .category-layout-two .blog-post-wrapper a.read_more_Btutton, .grid-layout-two .blog-post-wrapper a.read_more_Btutton, .swiper_thumb_box_Bg .swiper-slide-thumb-active, .blog-post-comment .comment-respond .comment-form .btn-comments, .main-container .theme-pagination-style ul.page-numbers li span.current, .theme-single-blog-wrapper .theme-post-contentt .entry-details .read_more_Btutton
			
			{
				background: linear-gradient(90deg, ' . esc_attr($gradient_one) . ' 0%, ' . esc_attr($gradient_two) . ' 100%)!important;
			}';
			
			$custom_css .= ' .category-layout-one .blog-post-wrapper a.read_more_Btutton:hover, .category-layout-two .blog-post-wrapper a.read_more_Btutton:hover, .grid-layout-two .blog-post-wrapper a.read_more_Btutton:hover, .blog-post-comment .comment-respond .comment-form .btn-comments:hover, .theme-single-blog-wrapper .theme-post-contentt .entry-details .read_more_Btutton:hover
			
			{
				background: linear-gradient(90deg, ' . esc_attr($gradient_two) . ' 0%, ' . esc_attr($gradient_one) . ' 100%)!important;
			}';
			
			
			$custom_css .= '.news-block-style .news-content h4 a, .widget-post-wrap h4.post-title a {
					background-image: linear-gradient(to right, ' . esc_attr($gradient_one) . ' 0%, ' . esc_attr($gradient_two) . ' 100%)!important;
					
		
			}';
			
			
			$custom_css .= '.theme-single-blog-wrapper .theme-post-contentt h2.post-title a:hover {color: ' . esc_attr($gradient_one) . '!important;}';
		
		
		
		
		}
			
			
			
		} 
		
		else {
			
			if (!empty($theme_main_color)) {
				
				$custom_css .= ' .category-layout-one .blog-post-wrapper a.read_more_Btutton, .category-layout-two .blog-post-wrapper a.read_more_Btutton, .grid-layout-two .blog-post-wrapper a.read_more_Btutton, .swiper_thumb_box_Bg .swiper-slide-thumb-active, .blog-post-comment .comment-respond .comment-form .btn-comments, .main-container .theme-pagination-style ul.page-numbers li span.current, .theme-single-blog-wrapper .theme-post-contentt .entry-details .read_more_Btutton, .custom-form-subscribe {background: ' . esc_attr($theme_main_color) . '!important;}';
				
				$custom_css .= '.blog-sidebar .widget ul.wpt-tabs li.selected a, .home-blog-tab-right ul.wpt-tabs li.selected a, .news_video_post_section .tab_small_list_video_Item .video_tab_list_samll_Thumbnail i, .theme_blog_nav_Title a:hover, .theme-single-blog-wrapper .theme-post-contentt h2.post-title a:hover {color: ' . esc_attr($theme_main_color) . '!important;}';
				
				$custom_css .= '.news_tab_Block .nav-tabs .nav-link.active span.tab_menu_Item, .blog-sidebar .tagcloud a:hover, .blog-single .tag-lists a:hover, .tagcloud a:hover, .wp-block-tag-cloud a:hover, .theme_post_list_tab__Inner ul.post_tab_list_Menu li a.active span {border-color: ' . esc_attr($theme_main_color) . '!important;}';
				
				$custom_css .= '.news-block-style .news-content h4 a, .widget-post-wrap h4.post-title a {
					background-image: linear-gradient(to right, ' . esc_attr($theme_main_color) . ' 0%, ' . esc_attr($theme_main_color) . ' 100%)!important;
					
		
				}';
				
				
				$custom_css .= ' .theme-single-blog-wrapper .theme-post-contentt .entry-details .read_more_Btutton:hover, .category-layout-one .blog-post-wrapper a.read_more_Btutton:hover, .category-layout-two .blog-post-wrapper a.read_more_Btutton:hover, .grid-layout-two .blog-post-wrapper a.read_more_Btutton:hover, .blog-post-comment .comment-respond .comment-form .btn-comments:hover, .theme-single-blog-wrapper .theme-post-contentt .entry-details .read_more_Btutton:hover {background: ' . esc_attr($theme_btn_hover_color) . '!important;}';
				
				
				
			}

			
			 
		}
		
		
		if (!empty($theme_second_color))
		{
			
			$custom_css .= ' .home-blog-tab-right ul.wpt-tabs li.selected a:before, .blog-sidebar .tagcloud a:hover, .blog-single .tag-lists a:hover, .tagcloud a:hover, .wp-block-tag-cloud a:hover, .theme_author_Socials a:hover {background: ' . esc_attr($theme_second_color) . '!important;}';
				
				$custom_css .= '.blog-sidebar .widget ul.wpt-tabs li.selected a, .home-blog-tab-right ul.wpt-tabs li.selected a, .news_video_post_section .tab_small_list_video_Item .video_tab_list_samll_Thumbnail i, .theme_blog_nav_Title a:hover {color: ' . esc_attr($theme_second_color) . '!important;}';
				
				$custom_css .= '.news_tab_Block .nav-tabs .nav-link.active span.tab_menu_Item, .blog-sidebar .tagcloud a:hover, .blog-single .tag-lists a:hover, .tagcloud a:hover, .wp-block-tag-cloud a:hover, .theme_post_list_tab__Inner ul.post_tab_list_Menu li a.active span {border-color: ' . esc_attr($theme_second_color) . '!important;}';
		}
	
		
		
		

		// Get Category Color for List Widget
		
		$categories_widget_color = get_terms('category');
		
        if ($categories_widget_color) {
            foreach( $categories_widget_color as $tag) {
				$tag_link = get_category_link($tag->term_id);
				$title_bg_Color = get_term_meta($tag->term_id, 'ennlil', true);
				$catColor = !empty( $title_bg_Color['cat-color'] )? $title_bg_Color['cat-color'] : '#ffbc00';
				$custom_css .= '
					.cat-item-'.$tag->term_id.' span.post_count {background-color : '.$catColor.' !important;} 
				';
			}
        }	
		
		
	
				


		wp_add_inline_style('ennlil-custom-style', $custom_css);
	}
	add_action('wp_enqueue_scripts', 'ennlil_theme_inline_style');

endif;

