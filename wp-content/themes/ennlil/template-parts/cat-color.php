<?php 
/*
 * Ctaegory Name Box with Color
 * @package Ennlil
 * @since 1.0.0
 * */  
?> 
   
	<?php $cat = get_the_category(); ?> 

	<?php foreach( $cat as $key => $category):
		$meta = get_term_meta($category->term_id, 'ennlil', true);
		
		$catColor = !empty( $meta['cat-color'] )? $meta['cat-color'] : '#ffbc00';
	?>

	<a class="news-cat_Name" href="<?php echo esc_url(get_category_link($category->term_id)); ?>" style="background-color:<?php echo esc_attr($catColor); ?>;">
		<?php echo esc_html($category->cat_name); ?>
	</a>
   
	<?php endforeach; ?>