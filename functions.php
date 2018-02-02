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
<?php
	// Add custom meta boxes to our page editors:
	add_action( 'add_meta_boxes', 'add_custom_menu_meta_box' );
	add_action( 'save_post', 'cd_meta_box_save' );

	 
	function add_custom_menu_meta_box(){
	    add_meta_box(
	        'sa-menu-meta-box', // id, used as the html id att
	        __( 'Sidebar Menu' ), // meta box title, like "Page Attributes"
	        'generateSidebarMenus', // callback function, spits out the content
	        'page', // post type or page. We'll add this to pages only
	        'side', // context --> position on the screen
	        'low' // priority, how high up should this be in the context?
	    );
	}

	//Callback function for our meta box. Generates the box and its fields
	function generateSidebarMenus( $post ){
		// $post is already set, and contains an object: the WordPress post
	    global $post;
	    $values = get_post_custom( $post->ID );
	    $text = isset( $values['my_meta_box_text'] ) ? $values['my_meta_box_text'] : '';
	    $selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'] ) : 'NO_VALUE_SET';
	    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );

		/*
		<p>
	        <label for="my_meta_box_select">Color</label>
	        <select name="my_meta_box_select" id="my_meta_box_select">
	            <option value="red" <?php selected( $selected, 'red' ); ?>>Red</option>
	            <option value="blue" <?php selected( $selected, 'blue' ); ?>>Blue</option>
	        </select>
	    </p>
		*/
		?>
		<p>
			<label for="my_meta_box_text">Sample Input Field: </label>
		    <input type="text" name="my_meta_box_text" id="my_meta_box_text" value="<?php echo $text[0]; ?>" />
		</p>
	    <?php
		/*Took the following code straight from admin/nav-menus.php*/
		$menus = get_terms('nav_menu');
		// Okay I added this debug statement:
		// echo("<script>console.log('PHP found these menus: ".json_encode($menus)."');</script>");
		$nav_menus = wp_get_nav_menus();
		// Generate truncated menu names.
		foreach ( (array) $nav_menus as $key => $_nav_menu ) {
		  $nav_menus[$key]->truncated_name = wp_html_excerpt( $_nav_menu->name, 40, '&hellip;' );
		}
		if ( current_theme_supports( 'menus' ) ) {
		  $locations = get_registered_nav_menus();
		  $menu_locations = get_nav_menu_locations();
		}
		?>
		<p>Sidebar Menu:</p>
		<select name="my_meta_box_select" id="my_meta_box_select" value="<?php echo $selected; ?>">
			<option value="default">None</option>
			<?php foreach ( (array) $nav_menus as $_nav_menu ) : ?>
				<option value="<?php echo esc_attr( $_nav_menu->term_id ); ?>" <?php selected($selected, $_nav_menu->term_id); ?>>
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
		<!-- This element contains the list of registered meta_boxes that wordpress is aware of: -->
		<p>*** <?php global $wp_meta_boxes; echo print_r($wp_meta_boxes); ?> ***</p>
		<?php
	}

	function cd_meta_box_save( $post_id ){
	    //echo("GETTING READY TO SAVE!!!");
	    // First a few sanity checks to see if we should cancel the save operation:
	    // Cancel if we're doing an auto save
	    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
	     
	    // Cancel if our nonce isn't there, or we can't verify it.
	    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
	     
	    // Cancel if our current user can't edit this post
	    if( !current_user_can( 'edit_posts' ) ) return;     
	    // now we can actually save the data
	    $allowed = array( 
	        'a' => array( // on allow a tags
	            'href' => array() // and those anchors can only have href attribute
	        )
	    );
	    // Make sure your data is set before trying to save it
	    if( isset( $_POST['my_meta_box_text'] ) )
	        update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );
	         
	    if( isset( $_POST['my_meta_box_select'] ) )
	        update_post_meta( $post_id, 'my_meta_box_select', esc_attr( $_POST['my_meta_box_select'] ) );
	    else{
			// delete data
			delete_post_meta( $post_id, 'my_meta_box_select' );
		}
	    
	}
?>
