<?php

/**
 * Elementor Widget
 * @package Ennlil
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class ennlil_post_list_medium extends Widget_Base {

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
		return 'posts-list-medium';
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
		return esc_html__( 'Ennlil Posts List Medium', 'ennlil-extra' );
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
					'size' => 326,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 270,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 326,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 326,
				],
				
				'selectors' => [
					'{{WRAPPER}} .theme_post_list__Medium .blog-post-wrapper .post-content, .theme_post_list__Medium .blog-post-wrapper .post-media' => 'min-height: {{SIZE}}{{UNIT}};',
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
            'display_view',
            [
                'label' => esc_html__('Display Post Comments & View', 'ennlil-extra'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'ennlil-extra'),
                'label_off' => esc_html__('No', 'ennlil-extra'),
                'default' => 'no',
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
              'selector' => '{{WRAPPER}} .news_block_Gridbox .post-content h3.post-title',
           ]
        );		
		
		$this->add_group_control(
           Group_Control_Typography::get_type(),
           [
              'name' => 'meta_typography',
              'label' => esc_html__( 'Post Meta Typography', 'ennlil-extra' ),
              'scheme' => Scheme_Typography::TYPOGRAPHY_1,
              'selector' => '{{WRAPPER}} .news_block_Gridbox .post-content ul.news_block_Meta li',
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
            'display_excerpt',
            [
                'label' => esc_html__('Display Content', 'ennlil-extra'),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => esc_html__('Yes', 'ennlil-extra'),
                'label_off' => esc_html__('No', 'ennlil-extra'),
                'default' => 'yes',
            ]
        );
		
		$this->add_control(
          'content_length',
          [
            'label'         => esc_html__( 'Post Content Length', 'ennlil-extra' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => '20',
          ]
        );
		

		
		$this->end_controls_section();
	
	}	
		


	protected function render() {
		
		
		$settings = $this->get_settings_for_display();
		$post_count = $settings['post_number'];
		$post_order  = $settings['post_ordering'];
		$title_limit = $settings['title_length'];
		$content_limit = $settings['content_length'];
		$display_blog_cat = $settings['display_cat'];
		$display_blog_author = $settings['display_author'];
		$display_blog_date = $settings['display_date'];
		$display_blog_view = $settings['display_view'];
		$display_blog_excerpt = $settings['display_excerpt'];
		
		
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

		<?php if ( $query->have_posts() ) : ?>
        <?php while ($query->have_posts()) : $query->the_post(); ?>



		<div class="theme_post_list__Medium grid-layout-two">
			<div class="theme_news_grid__Design blog-post-wrapper row">
			
				<?php if(has_post_thumbnail()): ?>
				<div class="col-md-6 pr-zero">
					<div class="post-media post-image" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>);">
					</div>
					<?php if ($display_blog_cat == 'yes'): ?> 
					<div class="grid-cat">
						<?php require ENNLIL_THEME_DIR . '/template-parts/cat-color.php'; ?>
					</div>
					<?php endif; ?>
				</div>
				<?php endif; ?>
				
				<div class="<?php echo esc_attr(has_post_thumbnail()?"col-md-6 pl-zero":"col-md-12"); ?> ">
					 <div class="post-content">
						<div class="blog_title_Box">
							<h2 class="post-title">
								<a href="<?php echo esc_url( get_permalink()); ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo wp_trim_words( get_the_title() ,$title_limit,''); ?></a>
							</h2>
						</div>
						<div class="news_block_Meta">
							<?php if($display_blog_author == 'yes'): ?> 
							<?php printf('<span class="theme_author__Thumb post-author">%1$s<a href="%2$s">%3$s</a></span>', get_avatar(get_the_author_meta('ID') , 36) , esc_url(get_author_posts_url(get_the_author_meta('ID'))) , get_the_author()); ?>
							<?php endif; ?> 
							<?php if ($display_blog_date == 'yes'): ?>
							  <span class="post-meta-date post_grid_item_Date">
								 <i class="fa fa-clock-o"></i> <?php echo get_the_date(get_option('date_format')); ?>
							  </span>
							<?php endif; ?>
						</div>
						
						<?php if ($display_blog_excerpt == 'yes'): ?>
						<div class="blog_excerpt_Box">
							<p><?php echo esc_html( wp_trim_words(get_the_excerpt(),$content_limit,'') );?></p>
							<a class="read_more_Btutton" href="<?php echo esc_url( get_permalink()); ?>" > <?php echo esc_html('Read More', 'ennlil'); ?> <i class="icon icon-arrow-right"></i> </a>
						</div>
						<?php endif; ?>
						 
						<?php if ($display_blog_view == 'yes'): ?>
						<div class="view-comment-box">
							<div class="entry-comments-number">
								<span><i class="icofont-ui-text-chat"></i> <?php echo get_comments_number(); ?></span>
							</div>
							<div class="entry-postview">
								<a class="trending" href="#"><i class="icofont-fire"></i></a>
							</div>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>

		
		
		<?php endwhile; ?>
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


Plugin::instance()->widgets_manager->register_widget_type( new ennlil_post_list_medium() );