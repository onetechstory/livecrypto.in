<?php

/*
 * Theme Customize Options
 * @package ennlil
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}

if (class_exists('CSF') ){
	$prefix = 'ennlil';

	CSF::createCustomizeOptions($prefix.'_customize_options');


	/*-------------------------------------
     ** Color Settings
     -------------------------------------*/
    CSF::createSection($prefix . '_customize_options', array(
		'id' => 'theme_settings', // Set a unique slug-like ID
        'title' => esc_html__('Ennlil Color Settings', 'ennlil') ,
        'priority' => 10,
        'fields' => array(

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Choose Theme Color', 'ennlil') . '</h3>',
            ) ,

			array(
				  'id'          => 'theme_color_type',
				  'type'        => 'select',
				  'title'       => 'Select Theme Primary Color Type',
				  'options'     => array(
					'gradient-color'  => 'Gradient Color',
					'solid-color'  => 'Solid Color',
				  ),
				  'default'     => 'gradient-color'
			),

			array(
                'id' => 'gradient_one',
                'type' => 'color',
                'title' => esc_html__('Theme Gradient Color One', 'ennlil') ,
                'default' => '#C6005F',
				'dependency' => array(
                    'theme_color_type',
                    '==',
                    'gradient-color'
                ) ,
            ) ,

            array(
                'id' => 'gradient_two',
                'type' => 'color',
                'title' => esc_html__('Theme Gradient Color Two', 'ennlil') ,
                'default' => '#4D0270',
				'dependency' => array(
                    'theme_color_type',
                    '==',
                    'gradient-color'
                ) ,
            ) ,
			
            array(
                'id' => 'theme_main_color',
                'type' => 'color',
                'title' => esc_html__('Theme Primary Solid Color', 'ennlil') ,
                'default' => '#C20160',
				'dependency' => array(
                    'theme_color_type',
                    '==',
                    'solid-color'
                ) 
            ) ,

            array(
                'id' => 'theme_second_color',
                'type' => 'color',
                'title' => esc_html__('Theme Secondary Color', 'ennlil') ,
                'default' => '#C20160',
            ) ,
			
			array(
                'id' => 'theme_btn_hover_color',
                'type' => 'color',
                'title' => esc_html__('Theme Button Hover Color', 'ennlil') ,
                'default' => '#000',
				'dependency' => array(
                    'theme_color_type',
                    '==',
                    'solid-color'
                ) 
            ) ,

            array(
                'id' => 'theme_body_bg',
                'type' => 'color',
                'title' => esc_html__('Body Background Color', 'ennlil') ,
                'default' => '#fff',
				'output'      => 'body',
				'output_mode' => 'background-color'
				
            ) ,

            array(
                'id' => 'theme_body_text',
                'type' => 'color',
                'title' => esc_html__('Body Text Color', 'ennlil') ,
                'default' => '#574F63',
				'output'      => 'body',
				'output_mode' => 'color'
            ) ,
			
			array(
                'id' => 'preloader_bg',
                'type' => 'color',
                'title' => esc_html__('Preloader Background Color', 'ennlil') ,
                'default' => '#001737',
				'output'      => '#preloader',
				'output_mode' => 'background-color',
				'output_important' => true,
            ) ,
			
			array(
                'id' => 'back_btn_bg',
                'type' => 'color',
                'title' => esc_html__('Back To Top Button Background Color', 'ennlil') ,
                'default' => '#F06544',
				'output'      => '.backto',
				'output_mode' => 'background-color',
				'output_important' => true,
            ) ,
			
			array(
                'id' => 'back_btn_bg_hvr',
                'type' => 'color',
                'title' => esc_html__('Back To Top Button Hover Color', 'ennlil') ,
                'default' => '#001737',
				'output'      => '.backto:hover',
				'output_mode' => 'background-color',
				'output_important' => true,
            ) ,


            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Top Bar & Header', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'top_bar_bg',
                'type' => 'color',
                'title' => esc_html__('Top Bar Background for Header Style 1+2', 'ennlil') ,
                'default' => '#002584',
            ) ,
			
			array(
                'id' => 'top_gr_bg_one',
                'type' => 'color',
                'title' => esc_html__('Top Bar Gradient One Header Style 3', 'ennlil') ,
                'default' => '#C6005F',
            ) ,

            array(
                'id' => 'top_gr_bg_two',
                'type' => 'color',
                'title' => esc_html__('Top Bar Gradient Two Header Style 3', 'ennlil') ,
                'default' => '#4D0270',
            ) ,
			
			array(
                'id' => 'top_bar_bg_two',
                'type' => 'color',
                'title' => esc_html__('Top Bar Background Header Style 4', 'ennlil') ,
				'default' => '#002584',
				'output'      => '.top-header-area.top-bar-four',
				'output_mode' => 'background-color',
				'output_important' => true,
            ) ,

            array(
                'id' => 'breaking_color_bg',
                'type' => 'color',
                'title' => esc_html__('Breaking News Title Background', 'ennlil') ,
				'default' => '#C20160',
				'output'      => '.breaking_header_Top .breaking-title',
				'output_mode' => 'background-color',
				'output_important' => true,
            ) ,
			
			array(
                'id' => 'breaking_color_text',
                'type' => 'color',
                'title' => esc_html__('Breaking News Text Color', 'ennlil') ,
                'default' => '#fff',
				'output'      => '.breaking-title, .top-bar-three p.breaking-title',
				'output_mode' => 'color',
				'output_important' => true,
				
            ) ,
			
			
			array(
                'id' => 'top_bar_date',
                'type' => 'color',
                'title' => esc_html__('Top Bar Date Box Text Color', 'ennlil') ,
                'default' => '#fff',
				'output'      => '.header-date',
				'output_mode' => 'color',
				'output_important' => true,
				
            ) ,
			
			array(
                'id' => 'top_bar_icon',
                'type' => 'color',
                'title' => esc_html__('Header Social Icon Color', 'ennlil') ,
                'default' => '#000000',
				'output'      => '.top-social li a',
				'output_mode' => 'color',
				//'output_important' => true,
            ) ,
			
			array(
                'id' => 'top_bar_search_color',
                'type' => 'color',
                'title' => esc_html__('Header Search Button Color', 'ennlil') ,
                'default' => '#fff',
				'output'      => '.theme_header_design__One .theme-search-box .search-btn',
				'output_mode' => 'color',
				//'output_important' => true,
            ) ,
			
			array(
                'id' => 'header_btn_color_bg',
                'type' => 'color',
                'title' => esc_html__('Header 4 Button Background', 'ennlil') ,
				'default' => '#C20160',
				'output'      => '.recipe_sign_btn a',
				'output_mode' => 'background-color',
				'output_important' => true,
            ) ,
			
			array(
                'id' => 'header_btn_color_hvr',
                'type' => 'color',
                'title' => esc_html__('Header 4 Button Background Hover', 'ennlil') ,
				'default' => '#002584',
				'output'      => '.recipe_sign_btn a:hover',
				'output_mode' => 'background-color',
				'output_important' => true,
            ) ,
			
			array(
                'id' => 'header_btn_color_txt',
                'type' => 'color',
                'title' => esc_html__('Header 4 Button Text color', 'ennlil') ,
				'default' => '#fff',
				'output'      => '.recipe_sign_btn a',
				'output_mode' => 'color',
				'output_important' => true,
            ) ,
			
			

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Navigation', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'nav_bg_one',
                'type' => 'color',
                'title' => esc_html__('Menu Gradient One', 'ennlil') ,
                'default' => '#C6005F',
            ) ,

            array(
                'id' => 'nav_bg_two',
                'type' => 'color',
                'title' => esc_html__('Menu Gradient Two', 'ennlil') ,
                'default' => '#4D0270',
            ) ,

            array(
                'id' => 'nav_text',
                'type' => 'color',
                'title' => esc_html__('Menu Text Color', 'ennlil') ,
                'default' => '#001737',
				'output'      => '.nav-wrapp-three .mainmenu ul li a',
				'output_mode' => 'color',
				'output_important' => true,
            ) ,

            array(
                'id' => 'nav_text_hover',
                'type' => 'color',
                'title' => esc_html__('Menu Text Hover Color', 'ennlil') ,
                'default' => '#C20160',
				'output'      => '.nav-wrapp-three .mainmenu ul li a:hover',
				'output_mode' => 'color',
				'output_important' => true,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Dropdown Navigation', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'dropdown_menu_bar_bg',
                'type' => 'color',
                'title' => esc_html__('Dropdown Menu Background Color', 'ennlil') ,
				'default' => '#001737',
				'output'      => '.mainmenu li ul',
				'output_mode' => 'background-color',
				'output_important' => true,
            ) ,
			
			array(
                'id' => 'nav_drop_text',
                'type' => 'color',
                'title' => esc_html__('Dropdown Menu Text Color', 'ennlil') ,
                'default' => '#fff',
				'output'      => '.nav-wrapp-three .mainmenu li ul.sub-menu li a',
				'output_mode' => 'color',
				'output_important' => true,
            ) ,

            array(
                'id' => 'nav_drop_hover_text',
                'type' => 'color',
                'title' => esc_html__('Dropdown Menu Text Hover Color', 'ennlil') ,
                'default' => '#fff',
				'output'      => '.nav-wrapp-three .mainmenu li ul.sub-menu li a:hover',
				'output_mode' => 'color',
				'output_important' => true,
            ) ,
			
			array(
                'id' => 'dropnav_border_color',
                'type' => 'color',
                'title' => esc_html__('Dropdown Menu Border Color', 'ennlil') ,
                'default' => '#10264a',
				'output'      => '.mainmenu li ul li a',
				'output_mode' => 'border-color',
				'output_important' => true,
            ) ,
			
			array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Mobile Navigation', 'ennlil') . '</h3>'
            ) ,
			
			array(
                'id' => 'mobile_menu_bar_bg',
                'type' => 'color',
                'title' => esc_html__('Mobile Menu Bar Background', 'ennlil') ,
				'default' => '#C20160',
				'output'      => 'a.slicknav_btn',
				'output_mode' => 'background-color',
				'output_important' => true,
            ) ,
			
			array(
                'id' => 'mobile_menu_bg',
                'type' => 'color',
                'title' => esc_html__('Mobile Menu Background', 'ennlil') ,
				'default' => '#000',
				'output'      => 'ul.slicknav_nav',
				'output_mode' => 'background-color',
				'output_important' => true,
            ) ,
			
			array(
                'id' => 'mobile_menu_bg_hvr',
                'type' => 'color',
                'title' => esc_html__('Mobile Menu Hover Background', 'ennlil') ,
				'default' => '#C20160',
				'output'      => '.slicknav_nav li a:hover',
				'output_mode' => 'background-color',
				'output_important' => true,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Footer', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'footer_bg',
                'type' => 'color',
                'title' => esc_html__('Background Color', 'ennlil') ,
                'default' => '#F1F4F7',
            ) ,

            array(
                'id' => 'footer_title_color',
                'type' => 'color',
                'title' => esc_html__('Title Color', 'ennlil') ,
                'default' => '#4A4A4A',
            ) ,

            array(
                'id' => 'footer_text_color',
                'type' => 'color',
                'title' => esc_html__('Text Color', 'ennlil') ,
                'default' => '#8F8F8F',
            ) ,

            array(
                'id' => 'footer_link_color',
                'type' => 'color',
                'title' => esc_html__('Link Color', 'ennlil') ,
                'default' => '#fff',
            ) ,

            array(
				'id' => 'copyright_area_bg_color',
				'type' => 'color',
				'title' => esc_html__('Copyright Area Background Color','ennlil'),
				'default' => '#F1F4F7'
			),
			
			array(
                'id' => 'footer_cright_color',
                'type' => 'color',
                'title' => esc_html__('Footer Bottom Text Color', 'ennlil') ,
                'default' => '#8F8F8F',
            ) ,
			

        )

    ));






}//endif