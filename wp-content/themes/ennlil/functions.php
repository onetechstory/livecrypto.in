<?php
/**
 * Ennlil functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ennlil
 */


/**
 * define theme info
 * @since 1.0.0
 * */
 
 if (is_child_theme()){
	$theme = wp_get_theme();
	$parent_theme = $theme->Template;
	$theme_info = wp_get_theme($parent_theme);
}else{
	$theme_info = wp_get_theme();
}

define('ENNLIL_DEV_MODE',true);
$ennlil_version = ENNLIL_DEV_MODE ? time() : $theme_info->get('Version');
define('ENNLIL_NAME',$theme_info->get('Name'));
define('ENNLIL_VERSION',$ennlil_version);
define('ENNLIL_AUTHOR',$theme_info->get('Author'));
define('ENNLIL_AUTHOR_URI',$theme_info->get('AuthorURI'));


/**
 * Define Const for theme Dir
 * @since 1.0.0
 * */

define('ENNLIL_THEME_URI', get_template_directory_uri());
define('ENNLIL_IMG', ENNLIL_THEME_URI . '/assets/images');
define('ENNLIL_CSS', ENNLIL_THEME_URI . '/assets/css');
define('ENNLIL_JS', ENNLIL_THEME_URI . '/assets/js');
define('ENNLIL_THEME_DIR', get_template_directory());
define('ENNLIL_IMG_DIR', ENNLIL_THEME_DIR . '/assets/images');
define('ENNLIL_CSS_DIR', ENNLIL_THEME_DIR . '/assets/css');
define('ENNLIL_JS_DIR', ENNLIL_THEME_DIR . '/assets/js');
define('ENNLIL_INC', ENNLIL_THEME_DIR . '/inc');
define('ENNLIL_THEME_OPTIONS',ENNLIL_INC .'/theme-options');
define('ENNLIL_THEME_OPTIONS_IMG',ENNLIL_THEME_OPTIONS .'/img');

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
*/
	 
function ennlil_setup(){
	
	// make the theme available for translation
	load_theme_textdomain( 'ennlil', get_template_directory() . '/languages' );
	
	// add support for post formats
    add_theme_support('post-formats', [
        'standard', 'image', 'video', 'audio','gallery'
    ]);

    // add support for automatic feed links
    add_theme_support('automatic-feed-links');

    // let WordPress manage the document title
    add_theme_support('title-tag');
	
	// add editor style theme support
	function ennlil_theme_add_editor_styles() {
		add_editor_style( 'custom-style.css' );
	}
	add_action( 'admin_init', 'ennlil_theme_add_editor_styles' );

    // add support for post thumbnails
    add_theme_support('post-thumbnails');
	
	// hard crop center center
    set_post_thumbnail_size(770, 470, ['center', 'center']);
	add_image_size( 'ennlil-box-slider-small', 96, 96, true );
	
	
	// register navigation menus
    register_nav_menus(
        [
            'primary' => esc_html__('Primary Menu', 'ennlil'),
            'footermenu' => esc_html__('Footer Menu', 'ennlil'),
			'topmenu' => esc_html__('Top Bar Menu', 'ennlil'),
        ]
    );
	
	
	// HTML5 markup support for search form, comment form, and comments
    add_theme_support('html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
	
	
	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 150,
		'width'       => 300,
		'flex-width'  => true,
		'flex-height' => true,
	) );
	
	
	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
	
	
	/*
     * Enable support for wide alignment class for Gutenberg blocks.
     */
    add_theme_support( 'align-wide' );
    add_theme_support( 'editor-styles' );
    add_theme_support( 'wp-block-styles' );
		
}

add_action('after_setup_theme', 'ennlil_setup');

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*/
 
function ennlil_widget_init() {
	

        register_sidebar( array (
			'name' => esc_html__('Blog widget area', 'ennlil'),
			'id' => 'sidebar-1',
			'description' => esc_html__('Blog Sidebar Widget.', 'ennlil'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '</h3>',
			
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area One', 'ennlil' ),
			'id'            => 'footer-widget-1',
			'description'   => esc_html__( 'Add Footer  widgets here.', 'ennlil' ),
			'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );			

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Two', 'ennlil' ),
			'id'            => 'footer-widget-2',
			'description'   => esc_html__( 'Add Footer widgets here.', 'ennlil' ),
			'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );			

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Three', 'ennlil' ),
			'id'            => 'footer-widget-3',
			'description'   => esc_html__( 'Add Footer widgets here.', 'ennlil' ),
			'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );			

		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Four', 'ennlil' ),
			'id'            => 'footer-widget-4',
			'description'   => esc_html__( 'Add Footer widgets here.', 'ennlil' ),
			'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Footer Widget Area Five', 'ennlil' ),
			'id'            => 'footer-widget-5',
			'description'   => esc_html__( 'Add Footer widgets here.', 'ennlil' ),
			'before_widget' => '<div id="%1$s" class="footer-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
		
		register_sidebar( array(
			'name'          => esc_html__( 'Panel Menu Widget Area', 'ennlil' ),
			'id'            => 'panel-nav',
			'description'   => esc_html__( 'Add Panel Nav widgets here.', 'ennlil' ),
			'before_widget' => '<div id="%1$s" class="panel-widget widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
					
}

add_action('widgets_init', 'ennlil_widget_init');


/**
 * Load Google Fonts.
 */
 
if ( ! function_exists( 'ennlil_fonts_url' ) ) :
/**
 * Register Google fonts for Blessing.
 */
function ennlil_fonts_url() {
	$fonts_url = '';
	$font_families     = array();
	$subsets   = 'latin';

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'ennlil' ) ) {
		$font_families[] = 'Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	}
	/* translators: If there are characters in your language that are not supported by Nunito Sans, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Mulish font: on or off', 'ennlil' ) ) {
		$font_families[] = 'Mulish:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i';
	}

	if ( $font_families ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}
	return esc_url_raw( $fonts_url );
}
endif;
		

/**
 * Enqueue scripts and styles.
 */
function ennlil_scripts() {
	
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'ennlil-fonts', ennlil_fonts_url(), array(), null );
	
	wp_enqueue_style( 'font-awesome', ENNLIL_CSS . '/font-awesome.css');
	wp_enqueue_style( 'icon-font',  ENNLIL_CSS . '/icon-font.css' );
	wp_enqueue_style( 'animate',  ENNLIL_CSS . '/animate.css' );
	wp_enqueue_style( 'magnific-popup',  ENNLIL_CSS . '/magnific-popup.css' );
	wp_enqueue_style( 'owl-carousel',  ENNLIL_CSS . '/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-theme',  ENNLIL_CSS . '/owl.theme.min.css' );
	wp_enqueue_style( 'slick',  ENNLIL_CSS . '/slick.css' );
	wp_enqueue_style( 'slicknav',  ENNLIL_CSS . '/slicknav.css' );
	wp_enqueue_style( 'swiper',  ENNLIL_CSS . '/swiper.min.css' );
	wp_enqueue_style( 'flickity',  ENNLIL_CSS . '/flickity.min.css' );

   // theme css
	

	if (is_rtl()) {
		wp_enqueue_style( 'bootstrap', ENNLIL_CSS . '/bootstrap.min.css', array(), '4.0', 'all');
		wp_enqueue_style( 'ennlil-main',  ENNLIL_CSS . '/main.css' );
		wp_enqueue_style( 'ennlil-rtl',  ENNLIL_CSS . '/rtl.css' );
		wp_enqueue_style( 'ennlil-responsive',  ENNLIL_CSS . '/responsive.css' );
		
	} else {
		wp_enqueue_style( 'bootstrap', ENNLIL_CSS . '/bootstrap.min.css', array(), '4.0', 'all');
		wp_enqueue_style( 'ennlil-main',  ENNLIL_CSS . '/main.css' );
		wp_enqueue_style( 'ennlil-responsive',  ENNLIL_CSS . '/responsive.css' );	
	}
	
	

	wp_enqueue_style( 'ennlil-style', get_stylesheet_uri() );

	
	wp_enqueue_script( 'bootstrap',  ENNLIL_JS . '/bootstrap.min.js', array( 'jquery' ),  '4.0', true );
	wp_enqueue_script( 'popper',  ENNLIL_JS . '/popper.min.js', array( 'jquery' ),  '1.0', true );
	wp_enqueue_script( 'jquery-magnific-popup',  ENNLIL_JS . '/jquery.magnific-popup.min.js', array( 'jquery' ),  '1.0', true );
	wp_enqueue_script( 'jquery-appear',  ENNLIL_JS . '/jquery.appear.min.js', array( 'jquery' ),  '1.0', true );
	wp_enqueue_script( 'owl-carousel',  ENNLIL_JS . '/owl.carousel.min.js', array( 'jquery' ),  '1.0', true );
	wp_enqueue_script( 'jquery-easypiechart', ENNLIL_JS . '/jquery.easypiechart.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'slick', ENNLIL_JS . '/slick.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'swiper', ENNLIL_JS . '/swiper.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script( 'jquery-slicknav', ENNLIL_JS . '/jquery.slicknav.min.js', array( 'jquery' ), '1.0', true );
	
	wp_enqueue_script( 'imagesloaded', ENNLIL_JS . '/imagesloaded.min.js', array( 'jquery' ), '1.0', true );
	
	wp_enqueue_script( 'jquery-flickity', ENNLIL_JS . '/flickity.min.js', array( 'jquery' ), '1.0', true );
	
	// Custom JS Scripts
	
	wp_enqueue_script( 'ennlil-scripts',  ENNLIL_JS . '/scripts.js', array( 'jquery' ),  '1.0', true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	

}

add_action( 'wp_enqueue_scripts', 'ennlil_scripts' );


/*
* Include codester helper functions
* @since 1.0.0
*/
if ( file_exists( ENNLIL_INC.'/cs-framework-functions.php' ) ) {
	require_once  ENNLIL_INC.'/cs-framework-functions.php';
}

/**
 * Theme option panel & Metaboxes.
*/
 if ( file_exists( ENNLIL_THEME_OPTIONS.'/theme-options.php' ) ) {
	require_once  ENNLIL_THEME_OPTIONS.'/theme-options.php';
}

if ( file_exists( ENNLIL_THEME_OPTIONS.'/theme-metabox.php' ) ) {
	require_once  ENNLIL_THEME_OPTIONS.'/theme-metabox.php';
}


if ( file_exists( ENNLIL_THEME_OPTIONS.'/theme-customizer.php' ) ) {
	require_once  ENNLIL_THEME_OPTIONS.'/theme-customizer.php';
}

if ( file_exists( ENNLIL_THEME_OPTIONS.'/theme-inline-styles.php' ) ) {
	require_once  ENNLIL_THEME_OPTIONS.'/theme-inline-styles.php';
}


/**
 * Required plugin installer 
*/
require get_template_directory() . '/inc/required-plugins.php';


/**
 * Custom template tags & functions for this theme.
*/
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
*/
function ennlil_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ennlil_content_width', 640 );
}

add_action( 'after_setup_theme', 'ennlil_content_width', 0 );

/*
 * kses allowed html
 * @since 1.0.0
 * 
*/
function kses_allowed_html( $allowed_tags = 'all' ) {
	$allowed_html = array(
		'div'    => array( 'class' => array(), 'id' => array() ),
		'header' => array( 'class' => array(), 'id' => array() ),
		'h1'     => array( 'class' => array(), 'id' => array() ),
		'h2'     => array( 'class' => array(), 'id' => array() ),
		'h3'     => array( 'class' => array(), 'id' => array() ),
		'h4'     => array( 'class' => array(), 'id' => array() ),
		'h5'     => array( 'class' => array(), 'id' => array() ),
		'h6'     => array( 'class' => array(), 'id' => array() ),
		'p'      => array( 'class' => array(), 'id' => array() ),
		'span'   => array( 'class' => array(), 'id' => array() ),
		'cite'   => array( 'class' => array(), 'id' => array() ),
		'i'      => array( 'class' => array(), 'id' => array() ),
		'mark'   => array( 'class' => array(), 'id' => array() ),
		'strong' => array( 'class' => array(), 'id' => array() ),
		'br'     => array( 'class' => array(), 'id' => array() ),
		'b'      => array( 'class' => array(), 'id' => array() ),
		'em'     => array( 'class' => array(), 'id' => array() ),
		'del'    => array( 'class' => array(), 'id' => array() ),
		'ins'    => array( 'class' => array(), 'id' => array() ),
		'u'      => array( 'class' => array(), 'id' => array() ),
		's'      => array( 'class' => array(), 'id' => array() ),
		'nav'    => array( 'class' => array(), 'id' => array() ),
		'ul'     => array( 'class' => array(), 'id' => array() ),
		'li'     => array( 'class' => array(), 'id' => array() ),
		'form'   => array( 'class' => array(), 'id' => array() ),
		'select' => array( 'class' => array(), 'id' => array() ),
		'option' => array( 'class' => array(), 'id' => array() ),
		'img'    => array( 'class' => array(), 'id' => array() ),
		'a'      => array( 'class' => array(), 'id' => array(), 'href' => array()),
	);

	if ( 'all' == $allowed_tags ) {
		return $allowed_html;
	} else {
		if ( is_array( $allowed_tags ) && ! empty( $allowed_tags ) ) {
			$specific_tags = array();
			foreach ( $allowed_tags as $allowed_tag ) {
				if ( array_key_exists( $allowed_tag, $allowed_html ) ) {
					$specific_tags[ $allowed_tag ] = $allowed_html[ $allowed_tag ];
				}
			}
			return $specific_tags;
		}
	}

} 





