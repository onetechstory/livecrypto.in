<?php

/**
 * Elementor Widget
 * @package Ennlil
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class ennlil_slider_box extends Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'slider-box';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return esc_html__( 'Theme Box Slider', 'ennlil-extra' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Elementor widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-picture-o';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Elementor widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'ennlil_widgets' ];
	}

	/**
	 * Register Elementor widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	 
	
	protected function _register_controls() {
		$this->slider_layout_options();		
		$this->slider_query_options();	
		$this->slider_meta_options();	
		$this->slider_design_options();
	}
	
	/**
    * Layout Options
    */
    private function slider_layout_options() {
	
	
		$this->start_controls_section(
            'slider_layout_option',
            [
                'label' => __( 'Layout Options', 'ennlil-extra' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		
		$this->add_responsive_control(
			'slider_height',
			[
				'label' =>esc_html__( 'Set Slider Height', 'ennlil-extra' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 600,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 400,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 350,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 600,
				],
				
				'selectors' => [
					'{{WRAPPER}} .theme-box-slider-wrapper .single-box-slide-item, .box-slide-bg-thumb' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);		
		
		$this->end_controls_section();
	
	}
	
	/**
    * Post Query Options
    */
    private function slider_query_options() {
	
	
		$this->start_controls_section(
            'slider_query_option',
            [
                'label' => __( 'Post Options', 'ennlil-extra' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		
		// Post Sort
		
        $this->add_control(
            'post_sorting',
            [
                'type'    => Controls_Manager::SELECT2,
                'label' => esc_html__('Post Sorting', 'ennlil-extra'),
                'default' => 'date',
                'options' => [
					'date' => esc_html__('Recent Post', 'ennlil-extra'),
                    'rand' => esc_html__('Random Post', 'ennlil-extra'),
					'title'         => __( 'Title Sorting Post', 'ennlil-extra' ),
                    'modified' => esc_html__('Last Modified Post', 'ennlil-extra'),
                    'comment_count' => esc_html__('Most Commented Post', 'ennlil-extra'),
					
                ],
            ]
        );		
		
		// Post Order
		
        $this->add_control(
            'post_ordering',
            [
                'type'    => Controls_Manager::SELECT2,
                'label' => esc_html__('Post Ordering', 'ennlil-extra'),
                'default' => 'DESC',
                'options' => [
					'DESC' => esc_html__('Desecending', 'ennlil-extra'),
                    'ASC' => esc_html__('Ascending', 'ennlil-extra'),
                ],
            ]
        );
		
		
		// Post Categories
		
		$this->add_control(
            'post_categories',
            [
                'type'      => Controls_Manager::SELECT2,
				'label' =>esc_html__('Select Categories', 'ennlil-extra'),
                'options'   => $this->posts_cat_list(),
                'label_block' => true,
                'multiple'  => true,
            ]
        );
		
		
		// Post Items.
		
        $this->add_control(
            'post_number',
			[
				'label'         => esc_html__( 'Number Of Posts', 'ennlil-extra' ),
				'type'          => Controls_Manager::NUMBER,
				'default'       => '6',
			]
        );
		
		$this->add_control(
            'enable_offset_post',
            [
               'label' => esc_html__('Enable Skip Post', 'ennlil-extra'),
               'type' => Controls_Manager::SWITCHER,
               'label_on' => esc_html__('Yes', 'ennlil-extra'),
               'label_off' => esc_html__('No', 'ennlil-extra'),
               'default' => 'no',
               
            ]
        );
      
        $this->add_control(
			'post_offset_count',
			  [
			   'label'         => esc_html__( 'Skip Post Count', 'ennlil-extra' ),
			   'type'          => Controls_Manager::NUMBER,
			   'default'       => '1',
			   'condition' => [ 'enable_offset_post' => 'yes' ]

			  ]
        );
		
		
		$this->end_controls_section();
	
	}	
	
	/**
    * Meta Options
    */
    private function slider_meta_options() {
	
	
		$this->start_controls_section(
            'slider_meta_option',
            [
                'label' => __( 'Meta Options', 'ennlil-extra' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		$this->add_control(
            'display_cat',
            [
                'label' => esc_html__('Display Category Name', 'ennlil-extra'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'ennlil-extra'),
                'label_off' => esc_html__('No', 'ennlil-extra'),
                'default' => 'yes',
            ]
        );
		
		$this->add_control(
         	'display_author',
         	[
				 'label' => esc_html__('Display Author', 'ennlil-extra'),
				 'type' => Controls_Manager::SWITCHER,
				 'label_on' => esc_html__('Yes', 'ennlil-extra'),
				 'label_off' => esc_html__('No', 'ennlil-extra'),
				 'default' => 'yes',
         	]
     	);
		
		$this->add_control(
            'display_date',
            [
                'label' => esc_html__('Display Date', 'ennlil-extra'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'ennlil-extra'),
                'label_off' => esc_html__('No', 'ennlil-extra'),
                'default' => 'yes',
            ]
        );

 
		
	
		$this->end_controls_section();
	
	}	
	
	/**
    * Design Options
    */
    private function slider_design_options() {
	
	
		$this->start_controls_section(
            'slider_design_option',
            [
                'label' => __( 'Slider Typography', 'ennlil-extra' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		
		$this->add_group_control(
           Group_Control_Typography::get_type(),
           [
              'name' => 'title_typography',
              'label' => esc_html__( 'Post Title Typography', 'ennlil-extra' ),
              'scheme' => Scheme_Typography::TYPOGRAPHY_1,
              'selector' => '{{WRAPPER}} .box-slider-post-title',
           ]
        );
		
		$this->add_control(
          'title_length',
          [
            'label'         => esc_html__( 'Post Title Length', 'ennlil-extra' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => '10',
          ]
        );
		
		$this->add_control(
          'title_length_box',
          [
            'label'         => esc_html__( 'Bottom Box Post Title Length', 'ennlil-extra' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => '10',
          ]
        );
		
		
		$this->end_controls_section();
	
	}	
		


	protected function render() {
		
		
		$settings = $this->get_settings_for_display();
		$post_count = $settings['post_number'];
		$post_order  = $settings['post_ordering'];
		$title_limit = $settings['title_length'];
		$title_limit_box = $settings['title_length_box'];
		$display_blog_cat = $settings['display_cat'];
		$display_blog_author = $settings['display_author'];
		$display_blog_date = $settings['display_date'];
		
		// Output
        echo '<section class="theme-slider-box-wrapper">';
		
		$args = [
            'post_type' => 'post',
            'post_status' => 'publish',
			'order' => $settings['post_ordering'],
            'posts_per_page' => $settings['post_number'],
			'ignore_sticky_posts' => 1,
        ];
		

		// Category
        if ( ! empty( $settings['post_categories'] ) ) {
            $args['category_name'] = implode(',', $settings['post_categories']);
        }
		
		// Post Sorting
        if ( ! empty( $settings['post_sorting'] ) ) {
            $args['orderby'] = $settings['post_sorting'];
        }	
		
		// Post Offset		
		if($settings['enable_offset_post'] == 'yes') {
			$args['offset'] = $settings['post_offset_count'];
		}
			
		
		// Query
        $query = new \WP_Query( $args );


		if ( $query->have_posts() ) :
		
		echo '<div class="theme_boxslide_Wrapper swiper-container gallery-top"><div class="swiper-wrapper">';
		
			while ( $query->have_posts() ) :
				$query->the_post();
				
				?>
				
				
				<div class="swiper-slide" <?php if ( has_post_thumbnail() ) : ?>style="background-image: url( <?php echo esc_url( the_post_thumbnail_url( 'full' ) ); ?> );" <?php endif; ?> >
				
				<!-- Title and Catgeory -->
				<div class="box_slide_Hedaing">
					<div class="container">
						<?php if ($display_blog_cat == 'yes'): ?> 
						<div class="box-slider-cat">
							<div class="post-trend"></div>
							<?php require ENNLIL_THEME_DIR . '/template-parts/cat-color.php'; ?>
						</div>
						<?php endif; ?>
						<div class="box-slider-post-title"><a href="<?php the_permalink(); ?>"><?php echo wp_trim_words( get_the_title(), $title_limit, '' ); ?></a></div>	
					</div>
				</div>

				</div>
				

            <?php endwhile;
			
            echo '</div>'; ?>
			
			<div class="swiper-button-next"></div>
			<div class="swiper-button-prev"></div>
			
			<?php echo '</div>'; ?>
			
		
		    <?php 
			
			echo '<div class="swiper_thumb_box_Bg">';
            echo '<div class="swiper-container gallery-thumbs thumb_box_Wrap"><div class="swiper-wrapper">';
			
                while ( $query->have_posts() ) :
                    $query->the_post();

                    ?>
					
                    <div class="swiper-slide">
						<div class="boxthumb_Img" <?php if ( has_post_thumbnail() ) : ?>style="background-image: url( <?php echo esc_url( the_post_thumbnail_url( 'full' ) ); ?> );" <?php endif; ?> ></div>
						<h3 class="boxthumb_Title"><?php echo wp_trim_words( get_the_title(), $title_limit_box, '' ); ?></h3>
						<ul class="box_thumb_block_Meta">
							<?php if ($display_blog_author == 'yes'): ?>
							<?php printf('<li class="post-author">%1$s<a href="%2$s">%3$s</a></li>', get_avatar(get_the_author_meta('ID'), 36), esc_url(get_author_posts_url(get_the_author_meta('ID'))), get_the_author()); ?>
							<?php endif; ?> 

							
						</ul>
					</div>

                    <?php endwhile;

            echo '</div></div>';
			 echo '</div>';
			
			
        endif;

        wp_reset_postdata();

        echo '</section>';
		
			

      }
	

	protected function _content_template() { }	
   
   	public function posts_cat_list() {
		
		$terms = get_terms( array(
            'taxonomy'    => 'category',
            'hide_empty'  => true
		) );

      $cat_list = [];
      foreach($terms as $post) {
      	$cat_list[$post->slug]  = [$post->name];
      }
      return $cat_list;
	
	}		
	

}


Plugin::instance()->widgets_manager->register_widget_type( new ennlil_slider_box() );