<?php

//Registering the Sidebar
register_sidebar(array(
  'name'          => __( 'Sidebar 1'),
	'id'            => 'rutgers-sidebar-1',    // ID should be LOWERCASE  ! ! !
	'description'   => 'Widgets here will be on the right of the site',
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
