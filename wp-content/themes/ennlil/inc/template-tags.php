<?php if (!defined('ABSPATH')) die('Direct access forbidden.');
/**
 * Custom Template Tags which enhance the theme by hooking into WordPress
 *
 * @package ennlil
 */

if ( ! function_exists( 'ennlil_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function ennlil_posted_on() {

        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() )
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            esc_html_x( '%s', 'post date', 'ennlil' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">_ ' . $posted_on . '</span>'; // WPCS: XSS OK.

    };
endif;

if ( ! function_exists( 'ennlil_posted_in' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function ennlil_posted_in() {
        $categories_list = get_the_category_list( esc_html__( ' ', 'ennlil' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            $posted_in = sprintf( esc_html__( '%1$s', 'ennlil' ), $categories_list ); // WPCS: XSS OK.
        }

        echo '<div class="post-cat"><span class="posted-in">' . $posted_in . '</span></div>'; // WPCS: XSS OK.

    };
endif;

if ( ! function_exists( 'ennlil_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function ennlil_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( '%s', 'post author', 'ennlil' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline">_ ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'ennlil_theme_post_meta' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function ennlil_theme_post_meta() {
		
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf( $time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() )
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            esc_html_x( '%s', 'post date', 'ennlil' ),
            '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
        );

        $byline = sprintf(
        /* translators: %s: post author. */
            esc_html_x( '%s', 'post author', 'ennlil' ),
            '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a>'
        );

        $categories_list = get_the_category_list( esc_html__( ', ', 'ennlil' ) );
        if ( $categories_list ) {
            /* translators: 1: list of categories. */
            $posted_in = sprintf( esc_html__( '%1$s', 'ennlil' ), $categories_list ); // WPCS: XSS OK.
        }

        $comment_num = sprintf(
            /* translators: %s: post author. */
            esc_html_x( '%s', 'post comment', 'ennlil' ),
            '<a href="' .get_comments_link(). '">'. get_comments_number_text( esc_html__('0 Comments', 'ennlil'), esc_html__('1 Comment', 'ennlil'), esc_html__(  '% Comments', 'ennlil') ). '</a>' );

        /* translators: used between list items, there is a space after the comma */
		
        $tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'ennlil' ) );
		
        if ( $tags_list ) {
            /* translators: 1: list of tags. */
            $tag_with = sprintf( '<span class="tags-links">' . esc_html__( '%1$s', 'ennlil' ) . '</span>', $tags_list ); // WPCS: XSS OK.
        }
		?>
		<div class="ennlil-blog-meta-info">
		<?php	
			echo '<span class="posted-on">_ ' . $posted_on . '</span>';
			echo '<span class="byline">_ ' . $byline . '</span>';
			echo '<span class="comment-num">_ ' . $comment_num . '</span>';
			?>
		</div> 
<?Php

    }
endif;

/** Posts Meta **/

function ennlil_post_meta() {
?>
	<ul class="post-meta">

	<?php if( is_single() ):
  
	printf(
	   '<li class="post-author">%1$s<a href="%2$s">%3$s</a></li>',
	   get_avatar( get_the_author_meta( 'ID' ), 55 ), 
	   esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
	   get_the_author()
	);
		   
	endif;
	  
	if ( get_post_type() === 'post' ) {
		echo '<li class="post-meta-date">
			<i class="fa fa-clock-o"></i>
				'.  esc_html( get_the_date( 'F j, Y' ) ) . 
			'</li>';
	} 
			
	printf(' <li class="post-comment"><i class="fa fa-comments"></i><a href="#" class="comments-link">%1$s</a></li>',
	get_comments_number(get_the_ID()) 
	); 
	
	?>
	
	<?php ennlil_set_post_view();
	
	printf(' <li class="meta-post-view"><i class="icofont-fire"></i>'.ennlil_get_post_view().'</li>'); 
  
	?>
	
	
	<?php 
	
	printf(' <li class="read-time"><span class="post-read-time"><i class="fa fa-eye"></i><span class="read-time">'.ennlil_reading_time().'</span> </span></li>');
	
	?>
	
</ul>
<?php }


/** Category Posts Meta **/

function ennlil_category_post_meta() {
   ?>
    <div class="post-meta blog_post_list_Meta">
        <?php 
         
		printf('<span class="post-author blogpost_list_author_Thumbnail">%1$s<a href="%2$s">%3$s</a></span>', get_avatar( get_the_author_meta( 'ID' ), 55 ), 
			  esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), 
			  get_the_author()
		);       
            
		if ( get_post_type() === 'post') {
		   echo '<span class="post-meta-date post_post_item_Date">
			  <i class="fa fa-clock-o"></i>
				 '. esc_html( get_the_date( 'F j, Y' ) ) . 
			  '</span>';
		} 
           
         ?>
      </div>
   <?php }
   
   
/** Comment Walker **/

function ennlil_comment_style( $comment, $args, $depth ) {
	if ( 'div' === $args[ 'style' ] ) {
		$tag		 = 'div';
		$add_below	 = 'comment';
	} else {
		$tag		 = 'li ';
		$add_below	 = 'div-comment';
	}
	?>
	<?php
	if ( $args[ 'avatar_size' ] != 0 ) {
		echo get_avatar( $comment, $args[ 'avatar_size' ], '', '', array( 'class' => 'comment-avatar pull-left' ) );
	}
	?>
	<<?php
	echo kses_allowed_html( $tag );
	comment_class( empty( $args[ 'has_children' ] ) ? '' : 'parent'  );
	?> id="comment-<?php comment_ID() ?>"><?php if ( 'div' != $args[ 'style' ] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php }
	?>	
		<div class="meta-data">

			<div class="pull-right reply"><?php
				comment_reply_link(
				array_merge(
				$args, array(
					'add_below'	 => $add_below,
					'depth'		 => $depth,
					'max_depth'	 => $args[ 'max_depth' ]
				) ) );
				?>
			</div>


			<span class="comment-author vcard"><?php
				printf( kses_allowed_html( '<cite class="fn">%s</cite> <span class="says">%s</span>', 'ennlil' ), get_comment_author_link(), esc_html__( 'says:', 'ennlil' ) );
				?>
			</span>
			<?php if ( $comment->comment_approved == '0' ) { ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'ennlil' ); ?></em><br/><?php }
			?>

			<div class="comment-meta commentmetadata comment-date">
				<?php
				// translators: 1: date, 2: time
				printf(
				esc_html__( '%1$s at %2$s', 'ennlil' ), get_comment_date(), get_comment_time()
				);
				?>
				<?php edit_comment_link( esc_html__( '(Edit)', 'ennlil' ), '  ', '' ); ?>
			</div>
		</div>	
		<div class="comment-content">
			<?php comment_text(); ?>
		</div>
		<?php if ( 'div' != $args[ 'style' ] ) : ?>
		</div><?php
	endif;
}

/** Pagination **/

function ennlil_link_pages() {
  
  
	$args = array(
		'before'			 => '<div class="page-links"><span class="page-link-text">' . esc_html__( 'More pages: ', 'ennlil' ) . '</span>',
		'after'				 => '</div>',
		'link_before'		 => '<span class="page-link">',
		'link_after'		 => '</span>',
		'next_or_number'	 => 'number',
		'separator'			 => '  ',
		'nextpagelink'		 => esc_html__( 'Next ', 'ennlil' ) . '<I class="fa fa-angle-right"></i>',
		'previouspagelink'	 => '<I class="fa fa-angle-left"></i>' . esc_html__( ' Previous', 'ennlil' ),
	);
	wp_link_pages( $args );
}



/** Change textarea position in comment form **/

function ennlil_move_comment_textarea_to_bottom( $fields ) {
	$comment_field		 = $fields[ 'comment' ];
	unset( $fields[ 'comment' ] );
	$fields[ 'comment' ] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'ennlil_move_comment_textarea_to_bottom' );


/** Search Form **/

function ennlil_search_form( $form ) {
    $form = '
        <form  method="get" action="' . esc_url( home_url( '/' ) ) . '" class="ennlil-serach xs-search-group">
            <div class="input-group">
                <input type="search" class="form-control" name="s" placeholder="' .esc_attr__( 'Search Keyword', 'ennlil' ) . '" value="' . get_search_query() . '">
                <button class="input-group-btn search-button"><i class="icon icon-search1"></i></button>
            </div>
        </form>';
	return $form;
}
add_filter( 'get_search_form', 'ennlil_search_form' );

function ennlil_body_classes( $classes ) {

    if ( is_active_sidebar( 'sidebar-1' ) ) {
        $classes[] = 'sidebar-active';
    }else{
        $classes[] = 'sidebar-inactive';
    }
 
    return $classes;
 }
 
 add_filter( 'body_class','ennlil_body_classes' );



if ( ! function_exists( 'wp_body_open' ) ) {
   function wp_body_open() {
           do_action( 'wp_body_open' );
   }
}


/** Add span to category post count **/

function ennlil_cat_count_span($links) {
    $links = str_replace('</a> (', '</a> <span class="posts-count">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}
add_filter('wp_list_categories', 'ennlil_cat_count_span');


/** Add span to archive post count **/

function ennlil_archive_count_span($links) {
    $links = str_replace('</a>&nbsp;(', '</a> <span class="posts-count">(', $links);
    $links = str_replace(')', ')</span>', $links);
    return $links;
}
add_filter('get_archives_link', 'ennlil_archive_count_span');


/** Single Post Tag List **/
if ( ! function_exists( 'ennlil_single_post_tags' ) ) :

    function ennlil_single_post_tags(){
		
	$tags_list = get_the_tag_list( '', esc_html_x( ' ', 'list item separator', 'ennlil' ) );
	
	if ( $tags_list ) {
		
		printf( '<div class="theme-tags__wrapper tag-lists"><h4>' . esc_html__( 'Tags:', 'ennlil' ) . '</h4>' . esc_html__( '%1$s', 'ennlil' ) . '</div>', $tags_list ); // 
	}
	
		
		
    };
endif;







