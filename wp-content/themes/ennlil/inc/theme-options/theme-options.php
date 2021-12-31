<?php
/*
 * Theme Options
 * @package Ennlil
 * @since 1.0.0
 * */

if ( !defined('ABSPATH') ){
    exit(); // exit if access directly
}

if( class_exists( 'CSF' ) ) {

$allowed_html = kses_allowed_html(array('mark'));

  //
  // Set a unique slug-like ID
  $prefix = 'ennlil';

  //
  // Create options
  CSF::createOptions( $prefix.'_theme_options', array(
    'menu_title' => 'Theme Option',
    'menu_slug'  => 'ennlil-theme-option',
    'menu_type' => 'menu',
    'enqueue_webfont'         => true,
    'show_footer' => false,
    'framework_title'      => 'Ennlil Theme Options',
  ) );

  //
  // Create a section
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => 'General',
    'icon'  => 'fa fa-wrench',
    'fields' => array(
	
	
		array(
			'type' => 'subheading',
			'content' => '<h3>' . esc_html__('Theme Dark Mode', 'ennlil') . '</h3>',
		) ,
		
		
		array(
			'id' => 'dark_mode_enable',
			'title' => esc_html__('Activate Dark Mode', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Enable or Disable Dark Mode', 'ennlil') ,
			'default' => true,
		) ,

		array(
			'type' => 'subheading',
			'content' => '<h3>' . esc_html__('Site Logo', 'ennlil') . '</h3>',
		) ,
			
		array(
			'id' => 'theme_logo',
			'title' => esc_html__('Main Logo','ennlil'),
			'type' => 'media',
			'library' => 'image',
			'desc' => esc_html__('Upload Your Static Logo Image on Header Static', 'ennlil')
		), 
		
		array(
			'id' => 'theme_logo_light',
			'title' => esc_html__('Light or Transparent Logo', 'ennlil') ,
			'type' => 'media',
			'library' => 'image',
			'desc' => esc_html__('Upload Your Logo Image for Dark Mode', 'ennlil')
		) ,
		
		array(
			'id' => 'logo_width',
			'type' => 'slider',
			'title' => 'Set Logo Width',
			'min' => 0,
			'max' => 300,
			'step' => 1,
			'unit' => 'px',
			'default' => 184,
			'desc' => esc_html__('Set Logo Width in px. Default Width 184px.', 'ennlil') ,
		) ,
		
	  
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Preloader','ennlil').'</h3>'
      ),
	  
	  
      array(
        'id' => 'preloader_enable',
        'title' => esc_html__('Enable Preloader','ennlil'),
        'type' => 'switcher',
        'desc' => esc_html__('Enable or Disable Preloader', 'ennlil') ,
        'default' => true,
      ),
	  
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Back Top Options','ennlil').'</h3>'
      ),
	  
	  
      array(
        'id' => 'back_top_enable',
        'title' => esc_html__('Scroll Top Button','ennlil'),
        'type' => 'switcher',
        'desc' => esc_html__('Enable or Disable scroll button', 'ennlil') ,
        'default' => true,
      ),

    )
  ) );

  /*-------------------------------------------------------
     ** Entire Site Header  Options
   --------------------------------------------------------*/
  
    CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Header','ennlil'),
    'id' => 'header_options',
    'icon' => 'fa fa-header',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Header Layout','ennlil').'</h3>'
      ),
        //
        // nav select
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
			'id' => 'theme_header_sticky',
			'title' => esc_html__('Sticky Header', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Enable Sticky Header', 'ennlil') ,
			'default' => false,
		) ,
		
		
	array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Top Bar','ennlil').'</h3>'
      ),
	  
      array(
        'id' => 'header_top_enable',
        'title' => esc_html__('Show Header Top','ennlil'),
        'type' => 'switcher',
        'default' => true,
		'desc' => esc_html__('Enable Header Top', 'ennlil') ,
      ),

		array(
			'id' => 'header_top_calender',
			'title' => esc_html__('Show Current Date', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Enable Header Current Date', 'ennlil') ,
			'dependency' => array(
				'header_top_enable',
				'==',
				'true'
			) ,
			'default' => true,
		) ,
		
		array(
			'id' => 'breaking_enable',
			'title' => esc_html__('Show Breaking News', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Enable Header Breaking News', 'ennlil') ,
			'dependency' => array(
				'header_top_enable',
				'==',
				'true'
			) ,
			'default' => true,
		) ,
		
		array(
			'id'         => 'breaking_title',
			'type'       => 'text',
			'title'      => 'Breaking News Title',
			'default'    => 'Breaking!',
			'desc'       => 'Type Title',
			'dependency' => array( 'breaking_enable', '==', 'true' ),
		),
		
		array(
			'id'         => 'header_btn_text',
			'type'       => 'text',
			'title'      => 'Header Subscribe Button Text',
			'default'    => 'Subscribe',
			'desc'       => 'Type Button Text',
		),	
			
		array(
			'id' => 'top_bar_nav',
			'title' => esc_html__('Top Bar Menu','ennlil'),
			'type' => 'switcher',
			'desc' => wp_kses(__('You can set menu on Top bar in Header Style 4','ennlil'),$allowed_html),
			'default' => false,
		),

	  
	       	
		
	array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Search Bar Option','ennlil').'</h3>'
      ),
	  
      array(
        'id' => 'search_bar_enable',
        'title' => esc_html__('Search Bar Display In Header','ennlil'),
        'type' => 'switcher',
		'desc' => esc_html__('Enable or Disable Search Bar', 'ennlil') ,
        'default' => true,
      ),
		
		array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Header Social Option','ennlil').'</h3>'
      ),	
	
      array(
        'id' => 'header_social_enable',
        'title' => esc_html__('Do You want to Show Header Social Icons','ennlil'),
        'type' => 'switcher',
		'desc' => esc_html__('Enable or Disable Social Bar', 'ennlil') ,
        'default' => false,
      ),
	  
		
	array(
        'id'     => 'social-icon',
        'type'   => 'repeater',
        'title'  => 'Repeater',
        'dependency' => array('header_social_enable','==','true'),
        'fields' => array(
          array(
            'id'    => 'icon',
            'type'  => 'icon',
            'title' => esc_html__('Pick Up Your Social Icon','ennlil'),
          ),
          array(
            'id'    => 'link',
            'type'  => 'text',
            'title' => esc_html__('Inter Social Url','ennlil'),
          ),

        ),
      ),	
		
		

    )
  ));
  
   
    /*-------------------------------------
     ** Typography Options
     -------------------------------------*/
    CSF::createSection($prefix . '_theme_options', array(
        'title' => esc_html__('Typography', 'ennlil') ,
		'id' => 'typography_options',
		'icon' => 'fa fa-font',
        'fields' => array(

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Body', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'body-typography',
                'type' => 'typography',
                'output' => 'body',
                'default' => array(
					'color' => '#574F63',
                    'font-family' => 'Mulish',
                    'font-weight' => '400',
                    'font-size' => '15',
                    'line-height' => '24',
					'letter-spacing' => false,
                    'subset' => 'latin-ext',
                    'type' => 'google',
                    'unit' => 'px',
                ) ,

            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading h1', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'heading-one-typo',
                'type' => 'typography',

                'output' => 'h1',
                'default' => array(
                    'color' => '#1c1c1c',
                    'font-family' => 'Montserrat',
                    'font-weight' => '700',
					'font-size' => '42',
                    'line-height' => '50',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading h2', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'heading-two-typo',
                'type' => 'typography',

                'output' => 'h2',
                'default' => array(
                    'color' => '#1c1c1c',
                    'font-family' => 'Montserrat',
                    'font-weight' => '700',
					'font-size' => '28',
                    'line-height' => '36',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading h3', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'heading-three-typo',
                'type' => 'typography',

                'output' => 'h3',
                'default' => array(
                    'color' => '#1c1c1c',
                    'font-family' => 'Montserrat',
                    'font-weight' => '700',
					'font-size' => '24',
                    'line-height' => '28',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading h4', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'heading-four-typo',
                'type' => 'typography',

                'output' => 'h4',
                'default' => array(
                    'color' => '#1c1c1c',
                    'font-family' => 'Montserrat',
                    'font-weight' => '700',
					'font-size' => '18',
                    'line-height' => '28',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading h5', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'heading-five-typo',
                'type' => 'typography',

                'output' => 'h5',
                'default' => array(
                    'color' => '#1c1c1c',
                    'font-family' => 'Montserrat',
                    'font-weight' => '700',
					'font-size' => '14',
                    'line-height' => '24',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Heading h6', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'heading-six-typo',
                'type' => 'typography',
                'output' => 'h6',
                'default' => array(
                    'color' => '#1c1c1c',
                    'font-family' => 'Montserrat',
                    'font-weight' => '700',
					'font-size' => '14',
                    'line-height' => '28',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

            array(
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Navigation', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'nav-typography',
                'type' => 'typography',
                'output' => '.mainmenu ul li a',
                'default' => array(
                    'color' => '#ffffff',
                    'font-family' => 'Muli',
                    'font-weight' => '600',
					'font-size' => '18',
                    'line-height' => '23',
                    'subset' => 'latin-ext',
                    'text-align' => 'left',
                    'type' => 'google',
                    'unit' => 'px',
                    'letter-spacing' => false,
                ) ,
                'extra-styles' => array(
                    '300',
                    '400',
                    '500',
                    '600',
                    '800',
                    '900'
                ) ,
            ) ,

        )
    ));
  
  
  
  

  /*-------------------------------------------------------
     ** Pages and Template
   --------------------------------------------------------*/

   // blog optoins
    CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Blog','ennlil'),
    'id' => 'blog_page',
    'icon' => 'fa fa-bookmark',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Blog Options','ennlil').'</h3>'
      ),
	  
	  	array(
			'id'         => 'blog_title',
			'type'       => 'text',
			'title'      => 'Blog Page Title',
			'default'    => 'Blog Page',
			'desc'       => 'Type Blog Page Title',
		),
		
		array(
			'id' => 'page-spacing-blog',
			'type' => 'spacing',
			'title' => 'Blog Page Spacing',
			'output' => '.main-container.blog-spacing',
			'output_mode' => 'padding', // or margin, relative
			'default' => array(
				'top' => '80',
				'right' => '0',
				'bottom' => '80',
				'left' => '0',
				'unit' => 'px',
			) ,
		) ,
		
		array(
			'id' => 'blog_breadcrumb_enable',
			'title' => esc_html__('Breadcrumb', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Enable Breadcrumb', 'ennlil') ,
			'default' => true,
		) ,
		
		array(
			'id' => 'blog_thumb_height',
			'type' => 'slider',
			'title' => 'Set Blog Featured Image Height',
			'min' => 0,
			'max' => 1000,
			'step' => 1,
			'unit' => 'px',
			'default' => 470,
			'desc' => esc_html__('Set Featured Image Height in px. Default Height 470.', 'ennlil') ,
		) ,
			
	
		array(
			'id' => 'theme_blog_author',
			'title' => esc_html__('Show Author Name', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Show Author', 'ennlil') ,
			'default' => true,
		) ,
		
		array(
			'id' => 'blog_ddate',
			'title' => esc_html__('Show Date', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Show Blog date', 'ennlil') ,
			'default' => true,
		) ,
		
		array(
			'id' => 'blog_comment_number',
			'title' => esc_html__('Show Comments Number', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Show Blog Comments Number', 'ennlil') ,
			'default' => true,
		) ,
		
		array(
			'id' => 'blog_excerpt',
			'title' => esc_html__('Show Excerpt', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Show Post Excerpt', 'ennlil') ,
			'default' => true,
		) ,
			
		array(
		  'id'      => 'excerpt_limit',
		  'type'    => 'text',
		  'title' => 'Post Content Length',
		  'desc' => 'Set Blog Post Content Length',
		  'default' => 20,
		),
		

	 
    )
  ));
  
  
    // category 
	
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Category','ennlil'),
    'id' => 'cat_page',
    'icon' => 'fa fa-list-ul',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' => '<h3>' . esc_html__('Theme Category Options. You can Customize Each Catgeory by Editing Individually.', 'ennlil') . '</h3>'
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
		
		array(
			'id' => 'page-spacing-category',
			'type' => 'spacing',
			'title' => 'Category Page Spacing',
			'output' => '.main-container.cat-page-spacing',
			'output_mode' => 'padding', // or margin, relative
			'default' => array(
				'top' => '80',
				'right' => '0',
				'bottom' => '80',
				'left' => '0',
				'unit' => 'px',
			) ,
		) ,
		
		array(
			'id' => 'cat_breadcrumb_enable',
			'title' => esc_html__('Breadcrumb', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Show Breadcrumb', 'ennlil') ,
			'default' => true,
		) ,
			
		array(
			'id' => 'cat_thumb_height',
			'type' => 'slider',
			'title' => 'Catgeory Grid Layout image Height',
			'min' => 0,
			'max' => 1000,
			'step' => 1,
			'unit' => 'px',
			'output' => '.category-layout-one .blog-post-wrapper .cat-one-post-image',
			'output_mode' => 'height',
			'default' => 275,
			'desc' => esc_html__('Set Category Post Image Height in px. Default Height 275px.', 'ennlil') ,
		) ,
		
		array(
			'id' => 'cat_thumb_height_overlay',
			'type' => 'slider',
			'title' => 'Catgeory Grid Overlay Layout image Height',
			'min' => 0,
			'max' => 1000,
			'step' => 1,
			'unit' => 'px',
			'output' => '.category-layout-three .news-block-design .item',
			'output_mode' => 'min-height',
			'output_important' => true,
			'default' => 424,
			'desc' => esc_html__('Set Category Post Image Height in px. Default Height 424px.', 'ennlil') ,
		) ,
		
		array(
			'id' => 'cat_img_height',
			'type' => 'slider',
			'title' => 'Catgeory List Layout image Height',
			'min' => 0,
			'max' => 1000,
			'step' => 1,
			'unit' => 'px',
			'output' => '.cat-layout-alt .blog-post-wrapper .post-media',
			'output_mode' => 'height',
			'default' => 326,
			'desc' => esc_html__('Set Category Post Image Height in px. Default Height 326px.', 'ennlil') ,
		) ,

		
		array(
			'id' => 'blog_catt',
			'title' => esc_html__('Catgeory','ennlil'),
			'type' => 'switcher',
			'desc' => esc_html__('Show Category','ennlil'),
			'default' => true,
		),
		
		array(
			'id' => 'catt_date',
			'title' => esc_html__('Date', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Show Date', 'ennlil') ,
			'default' => false,
		) ,

		array(
			'id' => 'catt_author',
			'title' => esc_html__('Author Name', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Show Author', 'ennlil') ,
			'default' => true,
		) ,
			
		array(
			'id' => 'catt_excerpt',
			'title' => esc_html__('Excerpt', 'ennlil') ,
			'type' => 'switcher',
			'desc' => esc_html__('Show Excerpt', 'ennlil') ,
			'default' => true,
		) ,
			
		array(
		'id'         => 'length_cat_title',
		'type'       => 'text',
		'title'      => 'Catgeory Title Length',
		'default'    => 10,
		'desc'       => 'Insert Catgeory Post Title Length',
		),
		
		array(
		'id'         => 'cat_excerpt_limit',
		'type'       => 'text',
		'title'      => 'Catgeory Excerpt Length',
		'default'    => 20,
		'desc'       => 'Insert Catgeory Post Content Length',
		),

    )
  ));
  
  

  // blog single optoins
    CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Single','ennlil'),
    'id' => 'single_page',
    'icon' => 'fa fa-pencil-square-o',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Blog Single Page Option','ennlil').'</h3>'
      ),
	  
       array(
            'id' => 'ennlil_single_blog_layout',
            'type' => 'image_select',
            'title' => esc_html__('Select Single Blog Style','ennlil'),
            'options' => array(
                'single-one' => ENNLIL_IMG . '/admin/page/blog-1.png',
                'single-two' => ENNLIL_IMG . '/admin/page/blog-2.png',
				'single-three' => ENNLIL_IMG . '/admin/page/blog-3.png',
				'single-four' => ENNLIL_IMG . '/admin/page/blog-3.png',
            ),
            'default' => 'single-two'
        ),
		
		array(
			'id' => 'page-spacing-single',
			'type' => 'spacing',
			'title' => 'Single Blog Spacing',
			'output' => '.blog-layout-one',
			'output_mode' => 'padding', // or margin, relative
			'default' => array(
				'top' => '80',
				'right' => '0',
				'bottom' => '80',
				'left' => '0',
				'unit' => 'px',
			) ,
		) ,
		
		array(
			'id'         => 'blog_prev_title',
			'type'       => 'text',
			'title'      => 'Previous Post Text',
			'default'    => 'Previous Post',
			'desc'       => 'Type Previous Post Link Title',
		),
		
		array(
			'id'         => 'blog_next_title',
			'type'       => 'text',
			'title'      => 'Next Post Text',
			'default'    => 'Next Post',
			'desc'       => 'Type Next Post Link Title',
		),
			
		array(
			'id' => 'blog_single_cat',
			'title' => esc_html__('Show Catgeory','ennlil'),
			'type' => 'switcher',
			'desc' => esc_html__('Show Category Name','ennlil'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_single_author',
			'title' => esc_html__('Show Author','ennlil'),
			'type' => 'switcher',
			'desc' => esc_html__('Single Post Author','ennlil'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_single_date',
			'title' => esc_html__('Show Date','ennlil'),
			'type' => 'switcher',
			'desc' => esc_html__('Single Post Date','ennlil'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_single_comment',
			'title' => esc_html__('Show Comments','ennlil'),
			'type' => 'switcher',
			'desc' => esc_html__('Single Post Comments Number','ennlil'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_single_view',
			'title' => esc_html__('Show Post View','ennlil'),
			'type' => 'switcher',
			'desc' => esc_html__('Single Post Views','ennlil'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_single_read_time',
			'title' => esc_html__('Show Read Time','ennlil'),
			'type' => 'switcher',
			'desc' => esc_html__('Single Post Total Read Time','ennlil'),
			'default' => true,
		),
		
		
		
		
		array(
			'id' => 'blog_nav',
			'title' => esc_html__('Show Navigation','ennlil'),
			'type' => 'switcher',
			'desc' => esc_html__('Post Navigation','ennlil'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_tags',
			'title' => esc_html__('Show Tags','ennlil'),
			'type' => 'switcher',
			'desc' => esc_html__('Show Post Tags','ennlil'),
			'default' => true,
		),
		
		array(
			'id' => 'blog_author',
			'title' => esc_html__('Show Author Box','ennlil'),
			'type' => 'switcher',
			'desc' => esc_html__('Show Post Author','ennlil'),
			'default' => true,
		),		
		
		array(
			'id' => 'blog_related',
			'title' => esc_html__('Show Related Posts','ennlil'),
			'type' => 'switcher',
			'desc' => esc_html__('Related Posts','ennlil'),
			'default' => true,
		),

        
        array(
			'id' => 'blog_header_one_style',
			'title' => esc_html__('Header One Style','ennlil'),
			'type' => 'switcher',
			'desc' => esc_html__('Blog Details Page Header','ennlil'),
			'default' => true,
		),
		

    )
  ));


	  // Create a section
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => 'Error Page',
	'id' => 'error_page',
    'icon'  => 'fa fa-exclamation',
    'fields' => array(

		array( //nav bar one start
			'type' => 'subheading',
			'content' => '<h3>' . esc_html__('404 Page Options', 'ennlil') . '</h3>'
		) ,

		array(
			'id' => 'error_title',
			'type' => 'text',
			'title' => 'Error Page Title',
			'default' => 'OOPS THAT PAGE CANT BE FOUND',
		) ,

		array(
			'id' => 'error_btn_text',
			'type' => 'text',
			'title' => 'Error Page Button Text',
			'default' => 'Back To Home Page',
		) ,

		array(
			'id' => 'page-spacing-error',
			'type' => 'spacing',
			'title' => 'Page Spacing',
			'output' => '.blog.main-container.error-wrapper',
			'output_mode' => 'padding', // or margin, relative
			'default' => array(
				'top' => '135',
				'right' => '0',
				'bottom' => '140',
				'left' => '0',
				'unit' => 'px',
			) ,
		) ,
	  
	  

    )
  ) );

  // Create a section
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => 'Ads Management',
    'icon'  => 'fa fa-picture-o',
    'fields' => array(
	
	
			array( //nav bar one start
                'type' => 'subheading',
                'content' => '<h3>' . esc_html__('Header Ads Options', 'ennlil') . '</h3>'
            ) ,

            array(
                'id' => 'show_header_ads',
                'title' => esc_html__('Enable Header Ads Banner', 'ennlil') ,
                'type' => 'switcher',
                'desc' => esc_html__('Activate Header Ads', 'ennlil') ,
                'default' => true,
            ) ,

            array(
                'id' => 'ads_type',
                'type' => 'select',
                'title' => 'Select Ad Type',
                'placeholder' => 'Select Ad Type',
                'options' => array(
                    'ad-img' => 'Image Link',
                    'ad-code' => 'Custom Code',
                ) ,
                'default' => 'ad-img',
                'dependency' => array(
                    'show_header_ads',
                    '==',
                    true
                ) ,
            ) ,

            array(
                'id' => 'top_ads_img',
                'title' => esc_html__('Image', 'ennlil') ,
                'type' => 'media',
                'library' => 'image',
                'dependency' => array(
                    'ads_type',
                    '==',
                    'ad-img'
                ) ,
            ) ,

            array(
                'id' => 'top_ads_link',
                'title' => esc_html__('Image Link', 'ennlil') ,
                'type' => 'text',
                'dependency' => array(
                    'ads_type',
                    '==',
                    'ad-img'
                ) ,
            ) ,

            array(
                'id' => 'top_ads_code',
                'type' => 'code_editor',
                'title' => 'Custom Code',
				
                'dependency' => array(
                    'ads_type',
                    '==',
                    'ad-code'
                ) ,
                'sanitize' => false,
            ) ,
	  

    )
  ) );



  /*-------------------------------------------------------
       ** Footer  Options
  --------------------------------------------------------*/
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Footer','ennlil'),
    'id' => 'footer_options',
    'icon' => 'fa fa-copyright',
    'fields' => array(
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Footer Options','ennlil').'</h3>'
      ),
	  
	array(
        'id' => 'footer_nav',
        'title' => esc_html__('Footer Right Menu','ennlil'),
        'type' => 'switcher',
        'desc' => wp_kses(__('You can set <mark>Yes / No</mark> to show Footer menu','ennlil'),$allowed_html),
        'default' => false,
      ),
	  
	  
      array(
        'type' => 'subheading',
        'content' =>'<h3>'.esc_html__('Footer Copyright Area Options','ennlil').'</h3>'
      ),

      array(
        'id' => 'copyright_text',
        'title' => esc_html__('Copyright Area Text','ennlil'),
        'type' => 'textarea',
        'desc' => esc_html__('Footer Copyright Text','ennlil'),
      ),


	  
    )
  ));


  // Backup section
  CSF::createSection( $prefix.'_theme_options', array(
    'title'  => esc_html__('Backup','ennlil'),
    'id'    => 'backup_options',
    'icon'  => 'fa fa-window-restore',
    'fields' => array(
        array(
            'type' => 'backup',
        ),   
    )
  ) );
  

}