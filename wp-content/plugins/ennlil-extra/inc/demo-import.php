<?php 
/*
* @packge Ennlil Extra
* @since 1.0.0
 */
function ennlil_import() { 
  return array(
  
    array(
      'import_file_name'             => __('Magazine Demo','ennlil-extra'),
      'page_title'                   => __('Import Demo Data','ennlil-extra'),
      'local_import_file'            => ENNLIL_EXTRA_ROOT_PATH.'/demo/demo-data.xml',
      'local_import_widget_file'     => ENNLIL_EXTRA_ROOT_PATH.'/demo/widget.wie',
      'local_import_customizer_file' =>  ENNLIL_EXTRA_ROOT_PATH.'/demo/ennlil-customizer.dat',
	  'import_preview_image_url'     => 'https://arielthemes.com/demo-img/h1.jpg',
      'import_notice'                => __( 'This import maybe finish on 2-5 minutes', 'ennlil-extra' ),
	  'preview_url'                  => 'https://arielthemes.com/demo/ennlil',

  ),    
  
  array(
      'import_file_name'             => __('News Demo','ennlil-extra'),
      'page_title'                   => __('Import Demo Data','ennlil-extra'),
      'local_import_file'            => ENNLIL_EXTRA_ROOT_PATH.'/demo/demo-data2.xml',
      'local_import_widget_file'     => ENNLIL_EXTRA_ROOT_PATH.'/demo/widget2.wie',
      'local_import_customizer_file' =>  ENNLIL_EXTRA_ROOT_PATH.'/demo/ennlil-customizer2.dat',
	  'import_preview_image_url'     => 'https://arielthemes.com/demo-img/h2.jpg',
      'import_notice'                => __( 'This import maybe finish on 2-5 minutes', 'ennlil-extra' ),
	  'preview_url'                  => 'https://arielthemes.com/demo/news',

  ),  
  
  array(
      'import_file_name'             => __('Recipe Demo','ennlil-extra'),
      'page_title'                   => __('Import Demo Data','ennlil-extra'),
      'local_import_file'            => ENNLIL_EXTRA_ROOT_PATH.'/demo/demo-data3.xml',
      'local_import_widget_file'     => ENNLIL_EXTRA_ROOT_PATH.'/demo/widget3.wie',
      'local_import_customizer_file' =>  ENNLIL_EXTRA_ROOT_PATH.'/demo/ennlil-customizer3.dat',
	  'import_preview_image_url'     => 'https://arielthemes.com/demo-img/h3.jpg',
      'import_notice'                => __( 'This import maybe finish on 2-5 minutes', 'ennlil-extra' ),
	  'preview_url'                  => 'https://arielthemes.com/demo/recipe',

  ),
   
);
}
add_filter( 'pt-ocdi/import_files', 'ennlil_import' );


add_action( 'pt-ocdi/after_import',  'ennlil_after_import' );

if(!function_exists( 'ennlil_after_import')):
function ennlil_after_import($selected_import) {
	
if ( 'Demo' === $selected_import['import_file_name'] ) {

	$main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

    set_theme_mod( 'nav_menu_locations', array(
        'primary' => $main_menu->term_id,
     ) );

	//Set Front page

	$front_page_id = get_page_by_title( 'Home One' );
	$blog_page_id  = get_page_by_title( 'Blog' );

	update_option( 'show_on_front', 'page' );
	update_option( 'page_on_front', $front_page_id->ID );
	update_option( 'page_for_posts', $blog_page_id->ID );
	
}}
endif;
