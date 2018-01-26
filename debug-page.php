<?php
/**
* Template Name: Debug Page Template
**/


get_header(); ?>

<section id="hero">
  <div class="container">

    <h1 class="hero-copy"><?php the_title(); ?></h1>
    <!--<h2 class="sub-hero">About Us</h2>-->

  </div><!-- container -->
</section>

<!-- DEBUG AREA -->
<div class="container" id="debuggery">
  <div class="row">
    <div class="col-lg-12">
      <h2>Debug Section</h2>
      <?php
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
    </div>
  </div>
</div>

<!-- MAIN CONTENT-->
<div class="container" id="main">
  <div class="row">
    <div class="col-lg-12">
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
        <?php endwhile; else : ?>
  	       <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>
    </div><!-- col -->
    <!-- Row and container completed by the footer -->
<?php get_footer(); ?>
