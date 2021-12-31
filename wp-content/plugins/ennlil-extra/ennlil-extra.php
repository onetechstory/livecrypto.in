<?php
/*
Plugin Name: Ennlil Extra
Plugin URI: https://gossipthemes.com/ennlil-extra
Description: This is a helper plugin for Ennlil Theme.
Author: Gossip Themes
Version: 1.0
Author URI: https://gossipthemes.com
*/

/**  Related Theme Type */

global $related_theme_type;
$related_theme_type = array('Ennlil','Ennlil Child');
//define current theme name
$current_theme = !empty( wp_get_theme() ) ? wp_get_theme()->get('Name') : '';
define('CURRENT_THEME_NAME',$current_theme);


/*
 * Define Plugin Dir Path
 * @since 1.0.0
 * */
define('ENNLIL_EXTRA_SELF_PATH','ennlil-extra/ennlil-extra.php');
define('ENNLIL_EXTRA_ROOT_PATH',plugin_dir_path(__FILE__));
define('ENNLIL_EXTRA_ROOT_URL',plugin_dir_url(__FILE__));
define('ENNLIL_EXTRA_LIB',ENNLIL_EXTRA_ROOT_PATH.'/lib');
define('ENNLIL_EXTRA_INC',ENNLIL_EXTRA_ROOT_PATH .'/inc');
define('ENNLIL_EXTRA_ADMIN',ENNLIL_EXTRA_INC .'/admin');
define('ENNLIL_EXTRA_ADMIN_ASSETS',ENNLIL_EXTRA_ROOT_URL .'inc/admin/assets');
define('ENNLIL_EXTRA_CSS',ENNLIL_EXTRA_ROOT_URL .'assets/css');
define('ENNLIL_EXTRA_JS',ENNLIL_EXTRA_ROOT_URL .'assets/js');
define('ENNLIL_EXTRA_ELEMENTOR',ENNLIL_EXTRA_INC .'/elementor');
define('ENNLIL_EXTRA_SHORTCODES',ENNLIL_EXTRA_INC .'/shortcodes');
define('ENNLIL_EXTRA_WIDGETS',ENNLIL_EXTRA_INC .'/widgets');

/** Plugin version **/
define('ENNLIL_CORE_VERSION','1.0.0');

//initial file
include_once ABSPATH .'wp-admin/includes/plugin.php';

if ( is_plugin_active(ENNLIL_EXTRA_SELF_PATH) ) {

	if ( !in_array(CURRENT_THEME_NAME,$GLOBALS['related_theme_type']) && file_exists(ENNLIL_EXTRA_INC .'/cs-framework-functions.php') ) {
		
		require_once ENNLIL_EXTRA_INC .'/cs-framework-functions.php';
		
	}

	//plugin core file include
	
	if ( file_exists(ENNLIL_EXTRA_INC .'/class-ennlil-extra-init.php') ) {
		require_once ENNLIL_EXTRA_INC .'/class-ennlil-extra-init.php';
	}
	
	//Demo data import 
	
	if (file_exists(ENNLIL_EXTRA_INC .'/demo-import.php')){
		require_once ENNLIL_EXTRA_INC .'/demo-import.php';
	}
	
	
	
	
	

}
