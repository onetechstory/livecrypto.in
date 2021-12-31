<?php

/**
 * Elementor Widget
 * @package Ennlil
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class ennlil_slider_main extends Widget_Base {

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
		return 'slider-main';
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
		return esc_html__( 'Ennlil Main Slider', 'ennlil-extra' );
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
					'size' => 570,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 300,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 250,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 570,
				],
				
				'selectors' => [
					'{{WRAPPER}} .theme-slider-two .post-layout-three .item.post-overlay' => 'min-height: {{SIZE}}{{UNIT}};',
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
				'default'       => '3',
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
		
		$this->add_control(
            'display_comment',
            [
                'label' => esc_html__('Display Comment', 'ennlil-extra'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'ennlil-extra'),
                'label_off' => esc_html__('No', 'ennlil-extra'),
                'default' => 'yes',
            ]
        );
		
		$this->add_control(
            'display_view',
            [
                'label' => esc_html__('Display Post View Count', 'ennlil-extra'),
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
              'selector' => '{{WRAPPER}} .theme-slide-one .blog-slider-container h2',
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
		
		$this->end_controls_section();
	
	}	
		


	protected function render() {
		
		
		$settings = $this->get_settings_for_display();
		$post_count = $settings['post_number'];
		$post_order  = $settings['post_ordering'];
		$title_limit = $settings['title_length'];
		$display_blog_cat = $settings['display_cat'];
		$display_blog_author = $settings['display_author'];
		$display_blog_date = $settings['display_date'];
		$display_blog_comment = $settings['display_comment'];
		$display_blog_view = $settings['display_view'];
		
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
    $query = new \WP_Query( $args ); ?>
	
	<?php $id = 'blog-slider-'.wp_rand( 1, 100 ); ?>
	
	<script type="text/javascript">
	
		jQuery(document).ready(function ($) {
			
			function rtl_slick(){
				if ($('body').hasClass("rtl")) {
				   return true;
				} else {
				   return false;
			}}
			

			/* Blog Slider */
			$('.<?php echo esc_js( $id ); ?> .blog-slider-list').slick({
				dots: false,
				arrows: true,
				autoplay: false,
				fade: false,
				swipe: true,
				swipeToSlide: true,
				speed: 1100,
				useTransform: true,
				variableWidth: true,
				centerMode: true,
				centerPadding: '29%',
				slidesToShow: 1,
				rtl: rtl_slick(),

				prevArrow: '<div class="slick-prev"></div>',
				nextArrow: '<div class="slick-next"></div>',
				appendDots: $('.<?php echo esc_js( $id ); ?> .blog-slider-dots'),

				responsive: [
					{
					  breakpoint: 1400,
					  settings: {
						centerPadding: '23%',
					  }
					},
					{
					  breakpoint: 1200,
					  settings: {
						centerPadding: '18%',
					  }
					},
					{
					  breakpoint: 768,
					  settings: {
						centerPadding: '5%',
					  }
					},
					{
					  breakpoint: 600,
					  settings: {
						centerPadding: '0%',
					  }
					}
				  ]
			 });
			 
			 $('.<?php echo esc_js( $id ); ?> .blog-slider-list').on('setPosition', function(event, slick, currentSlide, nextSlide){
				 
				 var slider_info = $('.blog-slider .blog-slider-item.slick-active');
				 
				 $('.<?php echo esc_js( $id ); ?> .blog-slider-list .slick-prev').html( '<i class="icofont-thin-left"></i><p class="sh-heading-font">' + slider_info.prev().find('.grid-cat').html() + '</p><h5>' + slider_info.prev().find('h2').html() + '</h5>' ).fadeIn('slow');
				 
				 $('.<?php echo esc_js( $id ); ?> .blog-slider-list .slick-next').html( '<i class="icofont-thin-right"></i><p class="sh-heading-font">' + slider_info.next().find('.grid-cat').html() + '</p><h5>' + slider_info.next().find('h2').html() + '</h5>' ).fadeIn('slow');
			 });

		});
    </script> 
	
	
	
	
	<?php if ( $query->have_posts() ) : ?>

	<div <?php if( is_rtl() ){ echo'dir="rtl"'; }?>></div>

    <div class="theme-slide-one blog-slider blog-slider-style2 <?php echo esc_attr( $id ); ?>" style="position: relative;">
        <div class="blog-slider-list">

		<?php while ($query->have_posts()) : $query->the_post();?>
		
			<div class="blog-slider-item" style="background-image: url( <?php echo esc_url( the_post_thumbnail_url( 'full' ) ); ?> );">
				<div class="blog-slider-container">
					<div class="blog-slider-content">
					
						<?php if ($display_blog_cat == 'yes'): ?> 
						<div class="grid-cat">
							<div class="post-trend"></div>
							<?php require ENNLIL_THEME_DIR . '/template-parts/cat-color.php'; ?>
						</div>
						<?php endif; ?>
						
						<a href="<?php echo esc_url( get_permalink() ); ?>">
							<h2 class="post-title"><?php echo wp_trim_words( get_the_title(), $title_limit, '' ); ?></h2>
						</a>
						
						<div class="single-blog-header home_slide_metalist">
						<ul class="post-meta blog-post-metas single_blog_inner__Meta">
					
							<?php if($display_blog_author == true) :?>
							<?php printf('<li class="post-author blog_details_author_Thumbnail">%1$s<a href="%2$s">%3$s</a></li>',
								get_avatar( get_the_author_meta( 'ID' ), 45 ), 
								esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
								get_the_author()
							); ?>
							<?php endif; ?>
								
							<?php if($display_blog_date == true) :?>	
							<li class="post-meta-date blog_details__Date"></i><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></li> 
							<?php endif; ?>
							
							<?php if($display_blog_comment == true) :?>	
							<li class="post-comment blog_details_comment__Number">
								<a href="#" class="comments-link"><?php echo get_comments_number(get_the_ID()); ?> </a>
							</li>
							<?php endif; ?>
							
							<?php if($display_blog_view == true) :?>	
							<li class="meta-post-view blog_details_blog__View">
							<?php ennlil_set_post_view();?>
							<?php echo ennlil_get_post_view(); ?>
							</li>
							<?php endif; ?>
							
						</ul>
						</div>

					</div>
				</div>
			</div>	
				
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
			
		</div>
	
		<div class="blog-slider-dots"></div>
	
	</div>
	

	<?php endif; ?>
		
	<?php  
	

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


Plugin::instance()->widgets_manager->register_widget_type( new ennlil_slider_main() );