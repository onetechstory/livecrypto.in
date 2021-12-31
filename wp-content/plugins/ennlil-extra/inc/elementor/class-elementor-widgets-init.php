<?php
/**
 * All Elementor widget init
 * @package Ennlil
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}


if ( !class_exists('Ennlil_Elementor_Widget_Init') ){

	class Ennlil_Elementor_Widget_Init{
		/*
			* $instance
			* @since 1.0.0
			* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array($this,'_widget_categories') );
			//elementor widget registered
			add_action('elementor/widgets/widgets_registered',array($this,'_widget_registered'));
			// elementor editor css
			
			add_action( 'elementor/editor/after_enqueue_styles', array($this,'load_assets_for_elementor'));
			
			//add_action( 'elementor/editor/after_enqueue_scripts', array($this,'load_assets_for_elementor'));
			
			add_action( 'elementor/controls/controls_registered', array($this,'modify_controls'), 10, 1 );
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}
		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager){
			$elements_manager->add_category(
				'ennlil_widgets',
				[
					'title' => __( 'Ennlil Widgets', 'ennlil-extra' ),
					'icon' => 'fa fa-plug',
				]
			);
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered(){
			if( !class_exists('Elementor\Widget_Base') ){
				return;
			}
			$elementor_widgets = array(
			
				'slider-one',
				'post-grid',
				'post-list-medium',
				'post-grid-column',
				'post-grid-slider',
				'post-list-slider',
				'post-tab',
				'post-tab-list',
				'post-video-grid',
				'slider-box',
                'slider-main',
                'post-video-tab',
				
				

			);
			
			$elementor_widgets = apply_filters('ennlil_elementor_widget',$elementor_widgets);

			if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
				foreach ( $elementor_widgets as $widget ){
					$widget_file = 'plugins/elementor/widget/'.$widget.'.php';
					$template_file = locate_template($widget_file);
					if ( !$template_file || !is_readable( $template_file ) ) {
						$template_file = ENNLIL_EXTRA_ELEMENTOR.'/widgets/class-'.$widget.'-elementor-widget.php';
					}
					if ( $template_file && is_readable( $template_file ) ) {
						include_once $template_file;
					}
				}
			}

		}


		/**
		 * Adding custom icon to icon control in Elementor
		*/
		
		public function modify_controls( $controls_registry ) {
			// Get existing icons
			$icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );

			// Append new icons
			$new_icons = array_merge(
				array(

					'flaticon-star' => esc_html__('Star','ennlil-extra'),

				),
				$icons
			);

			// Then we set a new list of icons as the options of the icon control
			$controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
		}

		/**
		 * load custom assets for elementor
		 * @since 1.0.0
		 * */
		public function load_assets_for_elementor(){
			wp_enqueue_style( 'flaticon-css', ENNLIL_EXTRA_CSS.'/flaticon.css');
			
			//wp_enqueue_script( 'ennlil-elementor-scripts', ENNLIL_EXTRA_JS.'/scripts.js', array( 'jquery' ),  '1.0', true );
		}

	}

	if ( class_exists('Ennlil_Elementor_Widget_Init') ){
		Ennlil_Elementor_Widget_Init::getInstance();
	}

}//end if