<?php
/**
 * Basic way to add new meta box to the page screen
 */
 // https://code.tutsplus.com/tutorials/how-to-create-custom-wordpress-writemeta-boxes--wp-20336 
add_action( 'add_meta_boxes', 'add_custom_menu_meta_box' );

 
function add_custom_menu_meta_box()
{
    add_meta_box(
        'sa-menu-meta-box', // id, used as the html id att
        __( 'Sidebar Menu' ), // meta box title, like "Page Attributes"
        'generateSidebarMenus', // callback function, spits out the content
        'page', // post type or page. We'll add this to pages only
        'side', // context (where on the screen
        'low' // priority, where should this go in the context?
    );
}

//Callback function for our meta box.  Echos out the content
function generateSidebarMenus( $post )
{
	/*Took the following code straight from admin/nav-menus.php*/
	$menus = get_terms('nav_menu');
	echo("<script>console.log('PHP found these menus: ".json_encode($menus)."');</script>");
	$nav_menus = wp_get_nav_menus();
	// Set $nav_menu_selected_id to 0 if no menus.
	if ( $one_theme_location_no_menus ) {
	  $nav_menu_selected_id = 0;
	} elseif ( empty( $nav_menu_selected_id ) && ! empty( $nav_menus ) && ! $add_new_screen ) {
	  // if we have no selection yet, and we have menus, set to the first one in the list.
	  $nav_menu_selected_id = $nav_menus[0]->term_id;
	}
	// Generate truncated menu names.
	foreach ( (array) $nav_menus as $key => $_nav_menu ) {
	  $nav_menus[$key]->truncated_name = wp_html_excerpt( $_nav_menu->name, 40, '&hellip;' );
	}
	if ( current_theme_supports( 'menus' ) ) {
	  $locations = get_registered_nav_menus();
	  $menu_locations = get_nav_menu_locations();
	}
	?>
	<select name="menu" id="select-menu-to-edit">
	<?php if ( $add_new_screen ) : ?>
	  <option value="0" selected="selected"><?php _e( '&mdash; Select &mdash;' ); ?></option>
	<?php endif; ?>
	<?php foreach ( (array) $nav_menus as $_nav_menu ) : ?>
	  <option value="<?php echo esc_attr( $_nav_menu->term_id ); ?>" <?php selected( $_nav_menu->term_id, $nav_menu_selected_id ); ?>>
	    <?php
	    echo esc_html( $_nav_menu->truncated_name ) ;

	    if ( ! empty( $menu_locations ) && in_array( $_nav_menu->term_id, $menu_locations ) ) {
	      $locations_assigned_to_this_menu = array();
	      foreach ( array_keys( $menu_locations, $_nav_menu->term_id ) as $menu_location_key ) {
	        if ( isset( $locations[ $menu_location_key ] ) ) {
	          $locations_assigned_to_this_menu[] = $locations[ $menu_location_key ];
	        }
	      }

	      /**
	       * Filters the number of locations listed per menu in the drop-down select.
	       *
	       * @since 3.6.0
	       *
	       * @param int $locations Number of menu locations to list. Default 3.
	       */
	      $assigned_locations = array_slice( $locations_assigned_to_this_menu, 0, absint( apply_filters( 'wp_nav_locations_listed_per_menu', 3 ) ) );

	      // Adds ellipses following the number of locations defined in $assigned_locations.
	      if ( ! empty( $assigned_locations ) ) {
	        printf( ' (%1$s%2$s)',
	          implode( ', ', $assigned_locations ),
	          count( $locations_assigned_to_this_menu ) > count( $assigned_locations ) ? ' &hellip;' : ''
	        );
	      }
	    }
	    ?>
	  </option>
	<?php endforeach; ?>
	</select>
	<?php
}


/*** MORE COMPLICATED VERSION ***/
// https://wp.smashingmagazine.com/2011/10/create-custom-post-meta-boxes-wordpress/ 

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
