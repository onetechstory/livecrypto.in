<?php

/**
 * Elementor Widget
 * @package Ennlil
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class ennlil_video_tab_post extends Widget_Base {

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
		return 'posts-video-tab';
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
		return esc_html__( 'Ennlil Video Posts Tab', 'ennlil-extra' );
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
			'thumbnail_height',
			[
				'label' =>esc_html__( 'Video Section Height', 'ennlil-extra' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 510,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 270,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 250,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 510,
				],
				
				'selectors' => [
					'{{WRAPPER}} .video_tab_Content .ennlil_video_item_Post.video_blog_Effect' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		
		
		$this->add_responsive_control(
			'video_list_height',
			[
				'label' =>esc_html__( 'Video List Height', 'ennlil-extra' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'desktop_default' => [
					'size' => 510,
					'unit' => 'px',
				],
				'tablet_default' => [
					'size' => 270,
					'unit' => 'px',
				],
				'mobile_default' => [
					'size' => 250,
					'unit' => 'px',
				],
				
				'default'  => [
					'unit' => 'px',
					'size' => 510,
				],
				
				'selectors' => [
					'{{WRAPPER}} .ennlil_video_posts_tab_Wrapper .video_tab_list_Content' => 'height: {{SIZE}}{{UNIT}};',
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
		
		// Post Items.
		
        $this->add_control(
            'post_number',
			[
				'label'         => esc_html__( 'Number Of Posts', 'ennlil-extra' ),
				'type'          => Controls_Manager::NUMBER,
				'default'       => '4',
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
				 'label' => esc_html__('Display Category', 'ennlil-extra'),
				 'type' => Controls_Manager::SWITCHER,
				 'label_on' => esc_html__('Yes', 'ennlil-extra'),
				 'label_off' => esc_html__('No', 'ennlil-extra'),
				 'default' => 'yes',
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
              'label' => esc_html__( 'Post Tab Big Title Typography', 'ennlil-extra' ),
              'scheme' => Scheme_Typography::TYPOGRAPHY_1,
              'selector' => '{{WRAPPER}} h2.video_tab_post_Title',
           ]
        );
		
		$this->add_group_control(
           Group_Control_Typography::get_type(),
           [
              'name' => 'list_title_typography',
              'label' => esc_html__( 'Post Tab List Title Typography', 'ennlil-extra' ),
              'scheme' => Scheme_Typography::TYPOGRAPHY_1,
              'selector' => '{{WRAPPER}} h4.video_tab_post_list_Title',
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
          'list_title_length',
          [
            'label'         => esc_html__( 'Post List Title Length', 'ennlil-extra' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => '10',
          ]
        );

		
		$this->end_controls_section();
	
	}	
		


	protected function render() {
		
		
		$settings = $this->get_settings_for_display();
		$display_blog_cat = $settings['display_cat'];
		$title_limit = $settings['title_length'];
		$list_title_limit = $settings['list_title_length'];
		$display_blog_date = $settings['display_date'];


		$args = [
            'post_type'   =>  'post',
            'post_status' => 'publish',
            'order' => $settings['post_ordering'],
			'orderby' => $settings['post_sorting'],
            'posts_per_page' => $settings['post_number'],
            'ignore_sticky_posts' => 1,
            'tax_query' => [
                [
                    'taxonomy' => 'post_format',
                    'field' => 'slug',
                    'terms' => array( 'post-format-video'),
					'operator' => 'IN'
                ]
            ]
        ];
		
		// Category
        if ( ! empty( $settings['post_categories'] ) ) {
            $args['category_name'] = implode(',', $settings['post_categories']);
        }
		
		// Post Offset		
		if($settings['enable_offset_post'] == 'yes') {
			$args['offset'] = $settings['post_offset_count'];
		}
		
		// Query
        $query = new \WP_Query( $args ); ?>

		<?php if ( $query->have_posts() ) : ?>

<div class="ennlil_video_posts_tab_Wrapper">		
<div class="row ennlil_video_posts_Tab">
	<div class="col-lg-7 pr-0">
		<div class="tab-content video_tab_Content clearfix">
		
			<?php $i = 0; while ($query->have_posts()) : $query->the_post(); $i++; ?>
			
				<div class="tab-pane fade <?php echo esc_attr(($i == 1) ? 'in show active' : ''); ?>" id="video-post-tab-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($i); ?>">
				
					<div class="ennlil_video_item_Post video_blog_Effect" style="background-image:url(<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'post-thumbnail'))); ?>)">
					
						<div class="video_play_icon_Tab">
						  <a href="<?php 
	$theme_video_meta = get_post_meta(get_the_ID(),'theme_postvideo_options',true);
	$video_url = isset($theme_video_meta['textm']) && !empty($theme_video_meta['textm']) ? $theme_video_meta['textm'] : '';
	echo esc_url($video_url);?>" class="ennlil_video_post_Button">
							 <i class="fa fa-play" aria-hidden="true"></i>
						  </a>
						</div>
						   
						<div class="video_blog_overlay_Effect">
							<div class="video_tab_left_Inner">

								<div class="news-cat-box-wrap">
									<?php if($display_blog_cat == 'yes'): ?> 
									<?php require ENNLIL_THEME_DIR . '/template-parts/cat-color.php'; ?>
									<?php endif; ?>
								</div>

								<h2 class="video_tab_post_Title">
									<a href="<?php the_permalink(); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), $title_limit, '')); ?></a>
								</h2>
								
								
							</div>
						</div>
					</div>
				</div>
				
			<?php endwhile; 
			wp_reset_postdata();?>
		</div>
	</div>
	
	<div class="col-lg-5 pl-0">
		<div class="video-tab-list video_tab_list_Content">
			<ul class="nav nav-pills tab_small_list_video_Item">
			
				<?php $i = 0; while ($query->have_posts()) : $query->the_post(); $i++; ?>
				
					<li data-index="<?php echo esc_attr($i); ?>" class="<?php echo esc_attr(($i == 1) ? 'active' : ''); ?>">
						<a href="#video-post-tab-<?php echo esc_attr($this->get_id()); ?>-<?php echo esc_attr($i); ?>" data-toggle="tab">
						
							<div class="video_tab_list_Inner post-content media">
							
								<div class="post-thumb video_tab_list_samll_Thumbnail" style="background-image:url(<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>)">
									  <i class="fa fa-play" aria-hidden="true"></i>
								</div>
							   
								<div class="media-body video_tab_list_samll_Content">
								   <h4 class="video_tab_post_Title video_tab_post_list_Title"><?php echo esc_html(wp_trim_words(get_the_title(), $list_title_limit, '')); ?></h4>
								   <div class="video_tab_list_samll_Date">
									   <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo esc_html(get_the_date( 'F j, Y' )); ?>
								   </div>
								</div>
								
							</div>
							
							
						</a>
					</li>
					
				<?php endwhile; ?>
				
			</ul>
		</div>
	</div>
</div>		
</div>		

		
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


Plugin::instance()->widgets_manager->register_widget_type( new ennlil_video_tab_post() );
