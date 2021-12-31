<?php
/*
 * Theme Metabox
 * @package Ennlil
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
    exit(); // exit if access directly
}

if ( class_exists('CSF') ){

    $allowed_html = kses_allowed_html(array('mark'));

    $prefix = 'ennlil';

	/*-------------------------------------
		Category Taxonomy Options
	-------------------------------------*/
	
	
// Create taxonomy options
  CSF::createTaxonomyOptions( $prefix, array(
	'title'     => 'Catgeory Options',
    'taxonomy'  => 'category',
    'data_type' => 'serialize', // The type of the database save options. `serialize` or `unserialize`
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'fields' => array(

	array(
	
	  'id'          => 'cat-color',
	  'type'        => 'color',
	  'title'       => 'Select Category Color',
	  'default' => '#ffbc00',
	  	  
	),
	
	array(
	  'id'    => 'cat-bg',
	  'type'  => 'upload',
	  'title' => 'Upload',
	),

	   array(
		'id' => 'ennlil_cat_layout',
		'type' => 'image_select',
		'title' => esc_html__('Select Category Layout','ennlil'),
		'options' => array(
			'catt-one' => ENNLIL_IMG . '/admin/page/style1.png',
			'catt-two' => ENNLIL_IMG . '/admin/page/style2.png',
			'catt-three' => ENNLIL_IMG . '/admin/page/style4.png',
		),
		'default' => 'catt-one'
	),

    )
  ) );
	
	
	/*-------------------------------------
		Post Format Options
	-------------------------------------*/
	CSF::createMetabox('theme_postvideo_options',array(
		'title' => esc_html__('Video Post Format Options','ennlil'),
		'post_type' => 'post',
		'post_formats' => 'video',
		'data_type'          => 'serialize',
		'context'            => 'advanced',
		'priority'           => 'default',
	));
	
	CSF::createSection('theme_postvideo_options',array(
		'fields' => array(
			array(
				'id' => 'textm',
				'type' => 'text',
				'title' => esc_html__('Upload Video For Post','ennlil'),
				'desc' => wp_kses(__('Upload Video Post','ennlil'),$allowed_html),
			)
		)
	));

	
	/*-------------------------------------
       Page Options
   -------------------------------------*/
   	  $post_metabox = 'ennlil_post_meta';
	  
	  CSF::createMetabox( $post_metabox, array(
	    'title'     => 'Page Options',
	    'post_type' => 'page',
	  ) );

	  //
	  // Create a section
	  CSF::createSection( $post_metabox, array(
	    'title'  => 'Nav Menu Option',
	    'fields' => array(
	     array(
                'type'    => 'subheading',
                'content' => esc_html__('Nav Menu Option','ennlil'),
	       ),
	      //
		
		array(
            'id' => 'nav_menu',
            'type' => 'image_select',
            'title' => esc_html__('Select Header Navigation Style','ennlil'),
            'options' => array(
                'nav-style-one' => ENNLIL_IMG . '/admin/header-style/style1.png',
                'nav-style-two' => ENNLIL_IMG . '/admin/header-style/style2.png',
				'nav-style-three' => ENNLIL_IMG . '/admin/header-style/style3.png',
				'nav-style-four' => ENNLIL_IMG . '/admin/header-style/style4.png',
            ),
            'default' => 'nav-style-two'
        ),
		
		
		array(
			'id' => 'page_title_enable',
			'title' => esc_html__('Show Page Title','ennlil'),
			'type' => 'switcher',
			'default' => true,
			'desc' => esc_html__('Show Page Title Bar', 'ennlil') ,
		),
		
		
		array(
			'id' => 'page-spacing-padding',
			'type' => 'spacing',
			'title' => esc_html__('Theme Page Spacing', 'ennlil') ,
			'output' => 'body.page .main-container',
			'output_mode' => 'padding', // or margin, relative
			'default' => array(
				'top' => '80',
				'right' => '0',
				'bottom' => '80',
				'left' => '0',
				'unit' => 'px',
			) ,
		) ,
		
		
		
		
		

	    )
	  ) );	
	  
	/*-------------------------------------
       Post Options
   -------------------------------------*/
   	  $single_blog_metabox = 'ennlil_blog_post_meta';
	  
	  CSF::createMetabox( $single_blog_metabox, array(
	    'title'     => 'Post Options',
	    'post_type' => 'post',
	  ) );

	  //
	  // Create a section
	  CSF::createSection( $single_blog_metabox, array(
	    'title'  => 'Single Post Layout Option',
	    'fields' => array(
	     array(
                'type'    => 'subheading',
                'content' => esc_html__('Single Post Layout Option','ennlil'),
	       ),
	      //
		
		array(
				'id' => 'ennlil_single_blog_layout',
				'type' => 'image_select',
				'title' => esc_html__('Select Single Blog Style','ennlil'),
				'options' => array(
					'single-one' => ENNLIL_IMG . '/admin/page/blog-1.png',
					'single-two' => ENNLIL_IMG . '/admin/page/blog-2.png',
					'single-three' => ENNLIL_IMG . '/admin/page/blog-3.png',
					'single-four' => ENNLIL_IMG . '/admin/page/blog-1.png',
				),
				'default' => 'single-two'
			),
		
		array(
		  'id'      => 'recipe_duration',
		  'type'    => 'text',
		  'title'   => 'Text',
		  'default' => '30 Mins Cook',
		),
	
		

	    )
	  ) );	
	  





}//endif