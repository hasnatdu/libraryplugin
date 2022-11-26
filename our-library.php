<?php
/**
 * Plugin Name:       Our Library
 * Plugin URI:        #
 * Description:       Complete Library Management Solutions
 * Version:           1.0
 * Author:            Abu Hasnat
 * Author URI:        #
 * License URI:       #
 * Text Domain:       our-library
 */



define("PLUGIN_DIR_PATH", plugin_dir_path(__FILE__));
define("PLUGINS_URL",plugins_url());

/*********************************************************
    custom header and footer link
********************************************************
add_action('wp_head', 'code_header');
function code_header(){

if(file_exists(PLUGIN_DIR_PATH .'custom-header.php')){

  require_once(PLUGIN_DIR_PATH .'custom-header.php');
}

};

add_action('wp_footer', 'code_footer');
function code_footer(){

if(file_exists(PLUGIN_DIR_PATH .'custom-footer.php')){

  require_once(PLUGIN_DIR_PATH .'custom-footer.php');
}

};*/
//any method upper/following. following has been executed here
function _get_header($name, $require_once = TRUE, $args = []) {
  return load_template(PLUGIN_DIR_PATH .'custom-header.php');
}

function _get_footer($name, $require_once = TRUE, $args = []) {
  return load_template(PLUGIN_DIR_PATH .'custom-footer.php');
}



/*********************************************************
		Register a custom menu and Sub-menu page for admin
*********************************************************/
function our_library_register_custom_menu_page(){
    add_menu_page( 
        __( 'Custom Menu Title', 'our-library' ),
        'Administrative work',
        'manage_options',
        'custompage',
        'my_custom_menu_page',
        'dashicons-menu-alt2',
        3
    ); 
	add_submenu_page( 'custompage', 'Administrators Manual', 'Manual','manage_options','custompage', 'my_custom_menu_page');
    add_submenu_page( 'custompage', 'Add Book Page', 'Add Book','manage_options','add-book', 'our_library_add_book');
	add_submenu_page( 'custompage', 'Issue Book Page', 'Issue Book','manage_options','custompage2', 'our_library_issue_book');
	add_submenu_page( 'custompage', 'Return Book Page', 'Return Book','manage_options','custompage3', 'our_library_Return_book');
	add_submenu_page( 'custompage', 'Report Book Page', 'Library Report','manage_options','custompage4', 'our_library_report_book');
	add_submenu_page( 'custompage', 'Update Book Page', 'Update data','manage_options','update-data', 'our_library_update_book');
  add_submenu_page( 'custompage', 'Update Book Page final', 'Update final','manage_options','update-final', 'our_library_update_book_final');
	add_submenu_page( 'custompage', 'Delete Book Page', 'Delete data','manage_options','custompage6', 'our_library_delete_book');


}
add_action( 'admin_menu', 'our_library_register_custom_menu_page' );
 

/*********************************************************
		 Link and Display custom menu page
*********************************************************/
 function my_custom_menu_page(){
    include_once PLUGIN_DIR_PATH.'/pages/manual.php';
}
function our_library_add_book(){
    include_once PLUGIN_DIR_PATH.'/pages/add-book.php';
    
}
function our_library_issue_book(){
    include_once PLUGIN_DIR_PATH.'/pages/issue-book.php';
}
function our_library_Return_book(){
    include_once PLUGIN_DIR_PATH.'/pages/return-book.php';
}
function our_library_report_book(){
    include_once PLUGIN_DIR_PATH.'/pages/library-report.php';
}
function our_library_update_book(){
    include_once PLUGIN_DIR_PATH.'/pages/update-data.php';
}
function our_library_update_book_final(){
    include_once PLUGIN_DIR_PATH.'/pages/update-final.php';
}
function our_library_delete_book(){
    include_once PLUGIN_DIR_PATH.'/pages/delete-data.php';
}




/*********************************************************
					enque css and js
*********************************************************/
function our_library_theme_scripts() {
    wp_enqueue_style( 'style-css', PLUGINS_URL."/our-library/assets/style.css",'','1.0');
    wp_enqueue_style( 'bootstrap-css', PLUGINS_URL."/our-library/assets/css/bootstrap.min.css",false,'1.1','all');
   	wp_enqueue_style( 'bootstrap-grid', PLUGINS_URL."/our-library/assets/css/bootstrap-grid.min.css",false,'1.1','all');



   	wp_enqueue_script( 'bootstrap-js', PLUGINS_URL.'/our-library/assets/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
   	wp_enqueue_script('bootstrapbundle-js', PLUGINS_URL. '/our-library/assets/js/bootstrap.bundle.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script('script', PLUGINS_URL."/our-library/assets/custom.js",'','1.0', true);
}
add_action( 'wp_enqueue_scripts', 'our_library_theme_scripts' );



/*********************************************************
          enque css and js for admin pages
*********************************************************/
function our_library_theme_scripts_admin() {
    wp_enqueue_style( 'style-css', PLUGINS_URL."/our-library/assets/style.css",'','1.0');
    wp_enqueue_style( 'bootstrap-css', PLUGINS_URL."/our-library/assets/css/bootstrap.min.css",false,'1.1','all');
    wp_enqueue_style( 'bootstrap-grid', PLUGINS_URL."/our-library/assets/css/bootstrap-grid.min.css",false,'1.1','all');



    wp_enqueue_script( 'bootstrap-js', PLUGINS_URL.'/our-library/assets/js/bootstrap.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script('bootstrapbundle-js', PLUGINS_URL. '/our-library/assets/js/bootstrap.bundle.min.js', array ( 'jquery' ), 1.1, true);
    wp_enqueue_script('script', PLUGINS_URL."/our-library/assets/custom.js",'','1.0', true);
}
add_action( 'admin_enqueue_scripts', 'our_library_theme_scripts_admin' );





/*********************************************************
				Create Table in Database
*********************************************************/
function our_library_create_custom_table(){

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$charset_collate =$wpdb->get_charset_collate();

$sql = "CREATE TABLE `wp_lib_documents` (
 `sl` int(20) NOT NULL AUTO_INCREMENT,
 `accession_no` int(20) NOT NULL,
 `accession_date` date NOT NULL,
 `title` varchar(100) NOT NULL,
 `sub_title` varchar(100) DEFAULT NULL,
 `author` varchar(100) DEFAULT NULL,
 `author2` varchar(100) DEFAULT NULL,
 `author3` varchar(100) DEFAULT NULL,
 `imprint` varchar(255) DEFAULT NULL,
 `pagination` int(20) DEFAULT NULL,
 `price` int(20) DEFAULT NULL,
 `isbn_issn` varchar(50) DEFAULT NULL,
 `key_word` varchar(255) DEFAULT NULL,
 `clssification_no` varchar(50) NOT NULL,
 `Status` varchar(255) NOT NULL,
 `created_by` bigint(100) NOT NULL,
 `created_at` datetime(2) NOT NULL,
 PRIMARY KEY (`accession_no`),
 KEY `id` (`sl`)
) $charset_collate";

dbDelta( $sql );

}
register_activation_hook( __FILE__, 'our_library_create_custom_table' );



//table delete if deactivate plugin
function our_library_deactivate_custom_table() {
  global $wpdb;
  $wpdb-> query("DROP table IF Exists wp_lib_documents"); 
}
register_deactivation_hook( __FILE__, 'our_library_deactivate_custom_table' );

//table delete if delete plugin
function our_library_delete_custom_table() {
  global $wpdb;
  $wpdb-> query("DROP table IF Exists wp_lib_documents"); 
}
register_uninstall_hook( __FILE__, 'our_library_delete_custom_table' );
/*********************************************************
        Create Table in Database
*********************************************************/
function our_library_create_custom_table2(){

global $wpdb;
require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

$charset_collate =$wpdb->get_charset_collate();

$sql = "CREATE TABLE `library`.`wp_students` (
 `firstname` VARCHAR(100) NOT NULL , 
 `lastname` VARCHAR(100) NOT NULL , 
 `email` VARCHAR(100) NOT NULL ) ENGINE = InnoDB;
 ) $charset_collate";

dbDelta( $sql );

}
register_activation_hook( __FILE__, 'our_library_create_custom_table2' );



//table delete if deactivate plugin
function our_library_deactivate_custom_table2() {
  global $wpdb;
  $wpdb-> query("DROP table IF Exists wp_students"); 
}
register_deactivation_hook( __FILE__, 'our_library_deactivate_custom_table2' );

//table delete if delete plugin
function our_library_delete_custom_table2() {
  global $wpdb;
  $wpdb-> query("DROP table IF Exists wp_students"); 
}
register_uninstall_hook( __FILE__, 'our_library_delete_custom_table2' );




/*********************************************************
     template overriding   
*********************************************************/

add_filter('template_include', 'template_override');
function template_override($template) {
  if (is_front_page()) {
    return PLUGIN_DIR_PATH . 'custom.php';
  }
  // default wordpress behavior
  return $template;
}

/*********************************************************
     DROPDWN MENU for bootstrap navwalker
*********************************************************/

if(file_exists(PLUGIN_DIR_PATH .'/inc/bootstrap-navwalker.php')){

  require_once(PLUGIN_DIR_PATH .'/inc/bootstrap-navwalker.php');
}






/*********************************************************
     theme setting for customization
*********************************************************/

function confide_theme_setup(){

  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'title-tags' );
  add_theme_support( 'custom-background' );
  add_theme_support( 'custom-header' );
  add_theme_support( 'custom-logo' );
  

  add_theme_support('html5',array(
    'search-form',
    'comment-form',
    'comment-list',
    'gallery',
    'caption',
  ));

 


register_nav_menus(
    array(
      'header_menu' => 'Header Menu',
      'extra-menu' => 'Extra Menu'
    )
  );

add_image_size('aqilla-post', 300, 300, true);
add_image_size('aqilla_single_post', 600, 600, true);
}
add_action( 'after_setup_theme', 'confide_theme_setup' );


?>

 