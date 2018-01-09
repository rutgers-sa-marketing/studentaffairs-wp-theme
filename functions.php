<?php

/*Registering the Left Sidebar
register_sidebar(array(
  'name'          => __( 'Left Sidebar'),
	'id'            => 'rutgers-left-sidebar',    // ID should be LOWERCASE  ! ! !
	'description'   => 'Widgets here will be in the left sidebar',
	'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'
));

UNCOMMENT THIS FUNCTION TO ENABLE LEFT SIDEBAR OPTION
*/

//Registering the Right Sidebar
register_sidebar(array(
  'name'          => __( 'Right Sidebar'),
	'id'            => 'rutgers-right-sidebar',    // ID should be LOWERCASE  ! ! !
	'description'   => 'Widgets here will be in the right sidebar',
	'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h3>',
	'after_title'   => '</h3>'
));

// Register Custom Navigation Walker
require_once('class-wp-bootstrap-navwalker.php');

register_nav_menus( array(
    	'primary' => __( 'Primary Menu', 'Rutgers Student Affairs' ),
	) );

?>
