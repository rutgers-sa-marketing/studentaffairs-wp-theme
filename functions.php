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


//Registering the Footer Columns
register_sidebar(array(
  'name'          => __( 'Footer Column 1'),
	'id'            => 'rutgers-footer-1',
	'description'   => 'Content placed here will go in the first column of the site footer.',
	'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>'
));

register_sidebar(array(
  'name'          => __( 'Footer Column 2'),
	'id'            => 'rutgers-footer-2',
	'description'   => 'Content placed here will go in the second column of the site footer.',
	'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>'
));

register_sidebar(array(
  'name'          => __( 'Footer Column 3'),
	'id'            => 'rutgers-footer-3',
	'description'   => 'Content placed here will go in the third column of the site footer.',
	'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>'
));

register_sidebar(array(
  'name'          => __( 'Footer Column 4'),
	'id'            => 'rutgers-footer-4',
	'description'   => 'Content placed here will go in the fourth column of the site footer.',
	'before_widget' => '<div class="widget">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4>',
	'after_title'   => '</h4>'
));


// Register Custom Navigation Walker
require_once('class-wp-bootstrap-navwalker.php');

register_nav_menus( array(
    	'primary' => __( 'Primary Menu', 'Rutgers Student Affairs' ),
	) );

?>
