<?php
/**
* Header Template.
*
* 
*/
?>

<!doctype html>
<html lang="<?php language_attributes();?>">
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>


 <?php 
	 if(function_exists('wp_body_open')){
	 	wp_body_open();
	 } 
 ?>

<div class="home-page">
	 ****
	 <title><?php echo get_bloginfo( 'name' ) . ' : '. get_bloginfo( 'description' ); ?></title>
<?php
	 	echo get_option('blogname'); // For Site Name
		echo get_option('blogdescription'); // For Tag line or description
?>
</div>



<div id="page" class="site">
	<header id="masthead" class="site-header" role="banner">
		<nav class="navbar navbar-expand-lg navbar-expand-md navbar-light">
 <?php 
  if ( function_exists( 'the_custom_logo' ) ) {
      the_custom_logo();
} ?>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
            <?php
               if ( has_nav_menu( 'header_menu' ) ) {
                wp_nav_menu( array( 
                'menu' => 'header_menu',
                'theme_location'=>  'header_menu',
                'container' => 'div',
                'container_class'     => '',
                'menu_class'      => 'navbar-nav',
                'link_before'          => '',
                'link_after'           => '', 
                'depth'     =>5,
                'walker'            => new WP_Bootstrap_Navwalker(),

                'fallback_cb' => '__return_false',
                                
             ));}
                
            ?>
    </ul>
  </div>
</nav>

	</header>
	<div id="content" class="site-content">
		
	