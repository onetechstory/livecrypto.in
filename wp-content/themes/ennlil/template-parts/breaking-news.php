<?php
/*
 * Breaking News 
 * @package Ennlil
 * @since 1.0.0
 * 
*/ 

$breaking_title = cs_get_option('breaking_title');

$breaking_arg = array(
	'post_type' => 'post', 
	'posts_per_page' => 4, 
	'orderby' => 'date', 
	'order' => 'DESC', 
	'post_status' => 'publish', 
	'ignore_sticky_posts' => 1
);


$breaking_news_post = new WP_Query($breaking_arg);
if ($breaking_news_post->have_posts()) {
?>



<div class="theme_breaking__News breaking-news carousel slide carousel-fade" data-ride="carousel">
	<p class="breaking-title"><?php echo esc_html($breaking_title); ?></p>
	<div class="breaking-news-slides carousel-inner">
	
	
	<?php
    $k = 1;
    while ($breaking_news_post->have_posts()):
        $breaking_news_post->the_post(); ?>

	<?php if ($k == 1) { ?>	
	<div class="single-breaking-news carousel-item active">
	<?php } else { ?>
	<div class="single-breaking-news carousel-item"> 
	<?php } ?>

	<h6 class="breaking-list-title"><a href="<?php echo esc_url(get_permalink()); ?>"><?php the_title(); ?></a></h6>
	</div>

	<?php
		$k++;
	endwhile;
	wp_reset_postdata(); ?>

	</div>
</div>

<?php }

