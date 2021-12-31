<?php

/**
 * Elementor Widget
 * @package Ennlil
 * @since 1.0.0
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly.

class ennlil_post_tab_list extends Widget_Base {

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
		return 'posts-tab-list';
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
		return esc_html__( 'Ennlil Posts Tab List', 'ennlil-extra' );
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
		$this->tab_options();		
		$this->post_query_options();	
		$this->meta_options();	
		$this->design_options();
	}
	
	/**
    * Tab Item Options
    */
    private function tab_options() {
	
	
		$this->start_controls_section(
            'tab_option',
            [
                'label' => __( 'Tab Item and Content', 'ennlil-extra' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		$this->add_control(
         'tabs',
         [
             'label' => esc_html__('Tab Items', 'ennlil-extra'),
             'type' => Controls_Manager::REPEATER,
             'default' => [
                 [
                     'tab_title' => esc_html__('Add Tab Item Menu', 'ennlil-extra'),
                 ],
             ],
			 
             'fields' => [
			 
                [   'name' => 'post_categories',
                     'label' =>esc_html__('Select Categories', 'ennlil-extra'),
                     'type'      => Controls_Manager::SELECT2,
                     'options'   => $this->posts_cat_list(),
                     'label_block' => true,
                     'multiple'  => true,
					 'placeholder' => __( 'All Categories', 'ennlil-extra' ),
                ],
				 
                [   'name' => 'tab_menu_name',
                     'label'         => esc_html__( 'Tab Menu Name', 'ennlil-extra' ),
                     'type'          => Controls_Manager::TEXT,
                     'default'       => 'Add Tab Menu',
                ],
			   
                [   
                  'name' => 'enable_offset_post',
                  'label'         => esc_html__( 'Enable Skip Post', 'ennlil-extra' ),
                  'type' => Controls_Manager::SWITCHER,
                  'label_on' => esc_html__('Yes', 'ennlil-extra'),
                  'label_off' => esc_html__('No', 'ennlil-extra'),
				  'default' => 'no',
                ],
			   
                [  
                   'name' => 'post_offset_count',
                   'label'         => esc_html__( 'Skip Post Count', 'ennlil-extra' ),
                   'type'          => Controls_Manager::NUMBER,
                   'default'       => '1',
                   'condition' => [ 'enable_offset_post' => 'yes' ]
                ],
			   
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
		
		// Post Items
		
        $this->add_control(
            'post_number',
			[
				'label'         => esc_html__( 'Number Of Posts', 'ennlil-extra' ),
				'type'          => Controls_Manager::NUMBER,
				'default'       => '1',
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

		
		$this->end_controls_section();
	
	}	
	
	/**
    * Meta Options
    */
    private function meta_options() {
	
	
		$this->start_controls_section(
            'meta_option',
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
    private function design_options() {
	
	
		$this->start_controls_section(
            'design_option',
            [
                'label' => __( 'Design Options', 'ennlil-extra' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
		
		
		$this->add_control(
			'tab_title_text',
				[
					'label' => esc_html__('Section Title', 'ennlil-extra'),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__( 'Featured News', 'ennlil-extra' ),
				]
		);
				
		$this->add_control(
			  'tab_title_text_color',
			  [
				 'label' => esc_html__('Section Title Color', 'ennlil-extra'),
				 'type' => Controls_Manager::COLOR,
				 'default' => '#001737',
				 'selectors' => [
						 '{{WRAPPER}} .news_tab_Block h2.tab-item-title' => 'color: {{VALUE}};',
					  ],
			  ]
		);
		
		$this->add_control(
          'title_length',
          [
            'label'         => esc_html__( 'Big Block Post Title Length', 'ennlil-extra' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => '10',
          ]
        );
		
		$this->add_control(
          'title_length_small',
          [
            'label'         => esc_html__( 'List Post Title Length', 'ennlil-extra' ),
            'type'          => Controls_Manager::NUMBER,
            'default'       => '10',
          ]
        );
		
		
        $this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'big_title_typography',
				'label' => __( 'Featured Title Typography', 'ennlil-extra' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .news_tab_Block .tab-item-slide .post-title.tab_title__Large',
			]
		);
		
		$this->add_group_control(
			Group_Control_Typography::get_type(),
			[
				'name' => 'small_title_typography',
				'label' => __( 'Small Title Typography', 'ennlil-extra' ),
				'scheme' => Scheme_Typography::TYPOGRAPHY_1,
				'selector' => '{{WRAPPER}} .news_tab__Wrapper .theme_post_tab_list__Item .theme_news_grid__Design .post-title.tab_list_title_Small',
			]
		);
		

		$this->end_controls_section();
	
	}	
		


	protected function render() {
		
		
		$settings = $this->get_settings_for_display();
		
		$tab_title_text   = $settings['tab_title_text'];
		
		$title_limit = $settings['title_length'];
		$title_limit_small = $settings['title_length_small'];
		
		$post_number        = $settings['post_number'];
		$post_order         = $settings['post_ordering'];
        $post_sortby        = $settings['post_sorting'];
		
		$display_blog_cat = $settings['display_cat'];
		$display_blog_author = $settings['display_author'];
		$display_blog_date = $settings['display_date'];
		
		$tabs               = $settings['tabs'];
        $post_count         = count($tabs);

	?>


	    <div class="theme_post_list_tab__wrapper">
            <div class="theme_post_list_tab__Inner">
			
				<div class="post_tab_list_Title">
					<h2 class="tab-item-title">
					<?php echo esc_html($tab_title_text); ?>
					</h2>
				</div>
					
				<ul class="post_tab_list_Menu nav nav-tabs" role="tablist">
					<?php
						  foreach ( $tabs as $tab_Menu_key=>$value ) {
								   
								if( $tab_Menu_key == 0 ){
									  echo '<li class="nav-item"><a class="nav-link active" href="#'.$this->get_id().$value['_id'].'" data-toggle="tab"><span class="tab_menu_Item">'.$value['tab_menu_name'].'</span></a></li>';
								} else {
									  echo '<li class="nav-item"><a class="nav-link" href="#'.$this->get_id().$value['_id'].'" data-toggle="tab"><span class="tab_menu_Item">'.$value['tab_menu_name'].'</span></a></li>';
								}
							 
						  }
					?>
				</ul>

                <div class="theme_post_Tab__content tab-content">

                     <?php
                     
                     foreach ($tabs as $tab_Content_key=>$value) {
                      
                        if( $tab_Content_key == 0){
                           echo '<div role="tabpanel" class="tab-pane fade active show" id="'.$this->get_id().$value['_id'].'">';
                        } else {
                           echo '<div role="tabpanel" class="tab-pane fade" id="'.$this->get_id().$value['_id'].'">';
                        }
                        
                        $args = array(
                           'post_type'   =>  'post',
                           'post_status' => 'publish',
                           'posts_per_page' => $post_number,
                           'order' => $post_order,
                           'orderby' => $post_sortby,
                           'ignore_sticky_posts' => 1,
                        );
						
						
						// Category
						
						if ( ! empty( $value['post_categories'] ) ) {
							$args['category_name'] = implode(',', $value['post_categories']);
						}
						
						// Post Offset
						
						if($value['enable_offset_post'] == 'yes') {
							$args['offset'] = $value['post_offset_count'];
						}
                   
                   
                       $Tabquery = new \WP_Query( $args );
                     
                     ?>

                     <?php if ( $Tabquery->have_posts() ) : ?>
					 
                        <div class="theme_post_list_tab__Content">
                            
							<?php while ($Tabquery->have_posts()) : $Tabquery->the_post();?>
								
                                <div class="theme_post_tab_list__Single">
									<div class="post_tab_list__image" style="background-image:url(<?php echo esc_attr(esc_url(get_the_post_thumbnail_url(null, 'full'))); ?>)">
									</div>
									<div class="post_tab_list__Content">
										<h3>
											<a href="<?php echo esc_url( get_permalink()); ?>"><?php echo esc_html(wp_trim_words( get_the_title() ,$title_limit_small,'') );  ?></a>
										</h3>
										  
										<?php if($display_blog_date == 'yes') { ?>
										<div class="tab_post_list_item_Meta">
											
										<ul class="single_blog_inner__Meta tab_post_list_single_Meta">
											
											<?php printf('<li class="post-author post_grid_author_Thumbnail">%1$s<a href="%2$s">%3$s</a></li>',
											get_avatar( get_the_author_meta( 'ID' ), 36 ), 
											esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
											get_the_author()
											); ?>
											
											<li class="post-meta-date blog_details__Date"><?php echo esc_html( get_the_date( 'F j, Y' ) ); ?></li> 
											
											<li class="post-comment blog_details_comment__Number">
												<a href="#" class="comments-link"><?php echo get_comments_number(get_the_ID()); ?> </a>
											</li>
											
											<li class="meta-post-view blog_details_blog__View">
												<?php ennlil_set_post_view();?>
												<?php echo ennlil_get_post_view(); ?>
											</li>

										</ul>
											
										</div>
										 <?php } ?>
													 
									</div>
                                </div>

                                <?php endwhile; ?>
						
                           </div>
                        <?php wp_reset_postdata(); ?>
                     <?php endif; ?>
					 
                     </div>
                     <?php } ?>
                </div>
			
          </div>
      </div>


		
	
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


Plugin::instance()->widgets_manager->register_widget_type( new ennlil_post_tab_list() );