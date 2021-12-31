<?php

/**
 * Elementor Widget
 * @package Ennlil
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class ennlil_video_grid_column_medium extends Widget_Base {

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
		return 'posts-video-grid-column';
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
		return esc_html__( 'Ennlil Video Grid Column', 'ennlil-extra' );
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
		$this->layout_options();		
		$this->post_query_options();	
		$this->meta_options();	
		$this->design_options();
	}
	
	/**
    * Layout Options
    */
    private function layout_options() {
	
	
		$this->start_controls_section(
            'layout_option',
            [
                'label' => __( 'Layout Options', 'ennlil-extra' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		$this->add_control(
            'grid_post_column',
            [
                'label'     =>esc_html__( 'Select Grid Column', 'ennlil-extra' ),
                'type'      => Controls_Manager::SELECT,
                'default'   => 'col-md-6',
                'options'   => [
						'col-md-12'    =>esc_html__( '1 Column', 'ennlil-extra' ),
                        'col-md-6'    =>esc_html__( '2 Columns', 'ennlil-extra' ),
                        'col-lg-4'    =>esc_html__( '3 Columns', 'ennlil-extra' ),
                        'col-lg-3 col-md-6'    =>esc_html__( '4 Columns', 'ennlil-extra' ),
                    ],
            ]
        );
		
		
		$this->add_responsive_control(
			'grid_img_height',
			[
				'label' =>esc_html__( 'Set Post Item Height', 'ennlil-extra' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 300,
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
					'size' => 300,
				],
				
				'selectors' => [
					'{{WRAPPER}} .video-grid-post-image' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
	
		
		$this->end_controls_section();
	
	}
	
	/**
    * Post Query Options
    */
    private function post_query_options() {
	
	
		$this->start_controls_section(
            'post_query_option',
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
                'label' =>esc_html__('Select Categories', 'ennlil-extra'),
				'type'      => Controls_Manager::SELECT2,
                'options'   => $this->posts_cat_list(),
                'multiple' => true,
				'label_block' => true,
				'placeholder' => __( 'All Categories', 'ennlil-extra' ),
            ]
        );
		
		
		// Post Items.
		
        $this->add_control(
            'post_number',
			[
				'label'         => esc_html__( 'Number Of Posts', 'ennlil-extra' ),
				'type'          => Controls_Manager::NUMBER,
				'default'       => '1',
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
    private function meta_options() {
	
	
		$this->start_controls_section(
            'meta_option',
            [
                'label' => __( 'Meta & Content Options', 'ennlil-extra' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		
		$this->add_control(
         	'display_content',
         	[
				 'label' => esc_html__('Display Content', 'ennlil-extra'),
				 'type' => Controls_Manager::SWITCHER,
				 'label_on' => esc_html__('Yes', 'ennlil-extra'),
				 'label_off' => esc_html__('No', 'ennlil-extra'),
				 'default' => 'yes',
         	]
     	);
		
		$this->add_control(
         	'display_content_top',
         	[
				 'label' => esc_html__('Display Content In Grid Box', 'ennlil-extra'),
				 'type' => Controls_Manager::SWITCHER,
				 'label_on' => esc_html__('Yes', 'ennlil-extra'),
				 'label_off' => esc_html__('No', 'ennlil-extra'),
				 'default' => 'no',
         	]
     	);
		
		$this->add_control(
         	'display_view',
         	[
				 'label' => esc_html__('Display Post Views', 'ennlil-extra'),
				 'type' => Controls_Manager::SWITCHER,
				 'label_on' => esc_html__('Yes', 'ennlil-extra'),
				 'label_off' => esc_html__('No', 'ennlil-extra'),
				 'default' => 'yes',
				 'condition' => [ 'display_content' => 'yes' ]
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
				'condition' => [ 'display_content' => 'yes' ]
            ]
        );
		

	
		$this->end_controls_section();
	
	}	
	
	/**
    * Design Options
    */
    private function design_options() {
	
	
		$this->start_controls_section(
            'design_option',
            [
                'label' => __( 'Typography', 'ennlil-extra' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		
		$this->add_group_control(
           Group_Control_Typography::get_type(),
           [
              'name' => 'title_typography',
              'label' => esc_html__( 'Post Title Typography', 'ennlil-extra' ),
              'scheme' => Scheme_Typography::TYPOGRAPHY_1,
              'selector' => '{{WRAPPER}} .video-post-grid-content h3',
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
		
		$grid_post_column = $settings['grid_post_column']; 
		
		$title_limit = $settings['title_length'];
		
		$display_blog_content = $settings['display_content'];
		$display_blog_view = $settings['display_view'];
		$display_blog_date = $settings['display_date'];
		
		$display_content_top = $settings['display_content_top'];
		

		
		
		$args = [
            'post_type' => 'post',
            'post_status' => 'publish',
			'ignore_sticky_posts' => 1,
			'tax_query' => [[
                'taxonomy' => 'post_format',
                'field' => 'slug',
                'terms' => array( 'post-format-video'),
                'operator' => 'IN'
            ]]
        ];
		
		// How many posts
        if ( ! empty( $settings['post_number'] ) ) {
            $args['posts_per_page'] = $settings['post_number'];
        }


		// Category
        if ( ! empty( $settings['post_categories'] ) ) {
            $args['category_name'] = implode(',', $settings['post_categories']);
        }
			
		// Post Sorting
        if ( ! empty( $settings['post_sorting'] ) ) {
            $args['orderby'] = $settings['post_sorting'];
        }	
			
		// Post Ordering
        if ( ! empty( $settings['post_ordering'] ) ) {
            $args['order'] = $settings['post_ordering'];
        }	
		
		// Post Offset		
		if($settings['enable_offset_post'] == 'yes') {
			$args['offset'] = $settings['post_offset_count'];
		}
		
		// Query
        $query = new \WP_Query( $args ); ?>

		<?php if ( $query->have_posts() ) : ?>
		
 
        <div class="theme_post_videogrid__Column theme-post-video-grid">
			<div class="row">
			
                <?php while ($query->have_posts()) : $query->the_post();?>
				
				<div class="<?php echo esc_attr($grid_post_column); ?>">
				
					
					<div class="theme-video_Grid video-box-wrapper">
					
					<div class="video-post-thumb">	
					
						<div class="video-grid-post-image" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>);">
						</div>
						
						<div class="video-play-icon-wrap">
						  <a href="<?php 
	$theme_video_meta = get_post_meta(get_the_ID(),'theme_postvideo_options',true);
	$video_url = isset($theme_video_meta['textm']) && !empty($theme_video_meta['textm']) ? $theme_video_meta['textm'] : '';
	echo esc_url($video_url);?>" class="ennlil-play-btn video-play-btn">
							 <i class="icofont-play-alt-2" aria-hidden="true"></i>
						  </a>
						</div>
						
						
					<?php if ($display_content_top == 'yes'): ?>	
						
					<div class="video-post-grid-content video_grid_box_Inner">
						<h3>
						<a href="<?php the_permalink(); ?>">
						<?php echo esc_html(wp_trim_words(get_the_title(), $title_limit, '')); ?></a>
						</h3>
						
						<ul class="video-grid-meta-info">
						
						<?php if ($display_blog_date == 'yes'): ?> 
						
							<li class="article-post-time post_grid_item_Date">
								<i class="fa fa-clock-o"></i> <?php echo esc_html(get_the_date('F j, Y')); ?>
							</li>
						<?php endif; ?>	
						
							<?php if ($display_blog_view == 'yes'): ?> 
							<li class="meta-post-view post_grid_video_View">
							<?php ennlil_set_post_view();?>
							<?php echo ennlil_get_post_view(); ?>
							</li>
							<?php endif; ?>
							
						</ul>
					</div>
					<?php endif; ?>


					</div>
					
					<?php if ($display_content_top == 'no'): ?>
					
					<div class="video-post-grid-content">
						<h3>
						<a href="<?php the_permalink(); ?>">
						<?php echo esc_html(wp_trim_words(get_the_title(), $title_limit, '')); ?></a>
						</h3>
						
						<ul class="video-grid-meta-info">
						
						<?php if ($display_blog_date == 'yes'): ?> 
						
							<li class="article-post-time post_grid_item_Date">
								<i class="fa fa-clock-o"></i> <?php echo esc_html(get_the_date('F j, Y')); ?>
							</li>
						<?php endif; ?>	
						
							<?php if ($display_blog_view == 'yes'): ?> 
							<li class="meta-post-view post_grid_video_View">
							<?php ennlil_set_post_view();?>
							<?php echo ennlil_get_post_view(); ?>
							</li>
							<?php endif; ?>
							
						</ul>
						
						
					</div>
					<?php endif; ?>
					
					</div>


					
				</div>
				
				<?php endwhile; ?>
				
            </div>
        </div>
		
        <?php wp_reset_postdata(); ?>
		<?php endif; ?>
		
		
	
		<?php 
      }
		
   
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


Plugin::instance()->widgets_manager->register_widget_type( new ennlil_video_grid_column_medium() );
