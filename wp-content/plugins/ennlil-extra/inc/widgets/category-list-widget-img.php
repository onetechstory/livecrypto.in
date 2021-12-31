<?php
if ( ! defined( 'ABSPATH' ) ) exit;
add_action('widgets_init','ennlil_category_widget_new');


function ennlil_category_widget_new(){
		register_widget("ennlil_category_list_widget_imgg");
}

class ennlil_category_list_widget_imgg extends WP_Widget {


	function __construct() {
        $widget_opt = array(
            'classname'		 => 'ennlil-category-list',
            'description'	 => esc_html__('Ennlil Category List','ennlil-essential')
        );

        parent::__construct( 'ennlil_category_list_widget_imgg', esc_html__( 'Ennlil Category List', 'ennlil-essential' ), $widget_opt );
    }

	
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		$va_category_HTML ='<div class="widgets_category category_image_wrapper_main theme_cat_img_List">';
		if ( ! empty( $instance['ennlil_title'] ) && !$instance['ennlil_hide_title']) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['ennlil_title'] ) . $args['after_title'];
		}
		
		if(isset($instance['ennlil_taxonomy_type'])){
			$va_category_HTML .='<ul class="category_image_bg_image theme_img_cat_item_List">';
				$args_val = array( 'hide_empty=0' );				
				$excludeCat= $instance['ennlil_selected_categories'] ? $instance['ennlil_selected_categories'] : '';
				$ennlil_action_on_cat= $instance['ennlil_action_on_cat'] ? $instance['ennlil_action_on_cat'] : '';
				if($excludeCat && $ennlil_action_on_cat!='')
				$args_val[$ennlil_action_on_cat] = $excludeCat;
				
				$terms = get_terms( $instance['ennlil_taxonomy_type'], $args_val );
				
				if ( !empty($terms) ) {	

					foreach ( $terms as $term ) {
						$term_link = get_term_link( $term );
						
						if ( is_wp_error( $term_link ) ) {
						continue;
						}
						
					$carrentActiveClass='';	
					$category_image = '';
					if($term->taxonomy=='category' && is_category())
					{
                 $thisCat = get_category(get_query_var('cat'),false);
              
                
					  if($thisCat->term_id == $term->term_id)
						$carrentActiveClass='class="active-cat img_cat_item_list_Single"';
				    }
					 
					if(is_tax())
					{
					    $currentTermType = get_query_var( 'taxonomy' );
					    $termId= get_queried_object()->term_id;
						 if(is_tax($currentTermType) && $termId==$term->term_id)
                    $carrentActiveClass='class="active-cat img_cat_item_list_Single"';
                    
					}
                  
				$category_image_main = get_term_meta($term->term_id, 'ennlil', true);
				$catImg = !empty( $category_image_main['cat-bg'] )? $category_image_main['cat-bg'] : '';
				$category_image = 'style="background-image:url('.esc_url( $catImg ).');"';
				 
						$va_category_HTML .='<li '.$carrentActiveClass.'><a '.wp_kses_post($category_image).' href="' . esc_url( $term_link ) . '"><span>' . $term->name ;
						if (empty( $instance['ennlil_hide_count'] )) {

						$va_category_HTML .='</span><span class="bar"></span> <span class="category-count">'.$term->count.'</span>';
						}
						$va_category_HTML .='</a></li>';
					}
				}
			$va_category_HTML .='</ul>';
			
			}	
		$va_category_HTML .='</div>';

		echo wp_kses_post($va_category_HTML);
		echo $args['after_widget'];
	}


	public function form( $instance ) {
		$ennlil_title 				= ! empty( $instance['ennlil_title'] ) ? $instance['ennlil_title'] : esc_html__( 'WP Categories', 'ennlil-essential' );
		$ennlil_hide_title 			= ! empty( $instance['ennlil_hide_title'] ) ? $instance['ennlil_hide_title'] : '';
		$ennlil_taxonomy_type 			= ! empty( $instance['ennlil_taxonomy_type'] ) ? $instance['ennlil_taxonomy_type'] : esc_html__( 'category', 'ennlil-essential' );
		$ennlil_selected_categories 	= (! empty( $instance['ennlil_selected_categories'] ) && ! empty( $instance['ennlil_action_on_cat'] ) ) ? $instance['ennlil_selected_categories'] : array();
		$ennlil_action_on_cat 			= ! empty( $instance['ennlil_action_on_cat'] ) ? $instance['ennlil_action_on_cat'] : '';
		$ennlil_hide_count 			= ! empty( $instance['ennlil_hide_count'] ) ? $instance['ennlil_hide_count'] : '';
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'ennlil_title' ) ); ?>"><?php _e( esc_attr( 'Title:' ) ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ennlil_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ennlil_title' ) ); ?>" type="text" value="<?php echo esc_attr( $ennlil_title ); ?>">
		</p>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ennlil_hide_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ennlil_hide_title' ) ); ?>" type="checkbox" value="1" <?php checked( $ennlil_hide_title, 1 ); ?>>
		<label for="<?php echo esc_attr( $this->get_field_id( 'ennlil_hide_title' ) ); ?>"><?php _e( esc_attr( 'Hide Title' ) ); ?> </label> 
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'ennlil_taxonomy_type' ) ); ?>"><?php _e( esc_attr( 'Taxonomy Type:' ) ); ?></label> 
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ennlil_taxonomy_type' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ennlil_taxonomy_type' ) ); ?>">
					<?php 
					$args = array(
					  'public'   => true,
					  '_builtin' => false
					  
					); 
					$output = 'names'; // or objects
					$operator = 'and'; // 'and' or 'or'
					$taxonomies = get_taxonomies( $args, $output, $operator ); 
					array_push($taxonomies,'category');
					if ( !empty($taxonomies) ) {
					foreach ( $taxonomies as $taxonomy ) {

						echo '<option value="'.$taxonomy.'" '.selected($taxonomy,$ennlil_taxonomy_type).'>'.$taxonomy.'</option>';
					}
					}

				?>    
		</select>
		</p>
		<p>
		<select class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ennlil_action_on_cat' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ennlil_action_on_cat' ) ); ?>">
           <option value="" <?php selected($ennlil_action_on_cat,'' )?> > <?php echo esc_html__('Show All Category','ennlil-essential').' :'; ?> </option>       
           <option value="include" <?php selected($ennlil_action_on_cat,'include' )?> > <?php echo esc_html__("Include Selected Category:","ennlil-essential"); ?> </option>       
           <option value="exclude" <?php selected($ennlil_action_on_cat,'exclude' )?> > <?php echo esc_html__("Exclude Selected Category","ennlil-essential").' :'; ?> </option>
		</select> 
		<select class="widefat ennlil-category-widget" id="<?php echo esc_attr( $this->get_field_id( 'ennlil_selected_categories' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ennlil_selected_categories' ) ); ?>[]" multiple>
					<?php 			
					if($ennlil_taxonomy_type){
					$args = array( 'hide_empty=0' );
					$terms = get_terms( $ennlil_taxonomy_type, $args );
			        echo '<option value="" '.selected(true, in_array('',$ennlil_selected_categories), false).'>'.esc_html('None ','ennlil-essential').'</option>';
					if ( !empty($terms) ) {
					foreach ( $terms as $term ) {
						echo '<option value="'.$term->term_id.'" '.selected(true, in_array($term->term_id,$ennlil_selected_categories), false).'>'.$term->name.'</option>';
					}
				    	
					}
				}

				?>    
		</select>
		</p>
		<p>
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'ennlil_hide_count' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'ennlil_hide_count' ) ); ?>" type="checkbox" value="1" <?php checked( $ennlil_hide_count, 1 ); ?>>
		<label for="<?php echo esc_attr( $this->get_field_id( 'ennlil_hide_count' ) ); ?>"><?php echo esc_attr__( 'Hide Count','ennlil-essential' ) ; ?> </label> 
		</p>
		<?php 
	}

	
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['ennlil_title'] 					= ( ! empty( $new_instance['ennlil_title'] ) ) ? strip_tags( $new_instance['ennlil_title'] ) : '';
		$instance['ennlil_hide_title'] 			= ( ! empty( $new_instance['ennlil_hide_title'] ) ) ? strip_tags( $new_instance['ennlil_hide_title'] ) : '';
		$instance['ennlil_taxonomy_type'] 			= ( ! empty( $new_instance['ennlil_taxonomy_type'] ) ) ? strip_tags( $new_instance['ennlil_taxonomy_type'] ) : '';
		$instance['ennlil_selected_categories'] 	= ( ! empty( $new_instance['ennlil_selected_categories'] ) ) ? $new_instance['ennlil_selected_categories'] : '';
		$instance['ennlil_action_on_cat'] 			= ( ! empty( $new_instance['ennlil_action_on_cat'] ) ) ? $new_instance['ennlil_action_on_cat'] : '';
		$instance['ennlil_hide_count'] 			= ( ! empty( $new_instance['ennlil_hide_count'] ) ) ? strip_tags( $new_instance['ennlil_hide_count'] ) : '';
		return $instance;
	}
}





