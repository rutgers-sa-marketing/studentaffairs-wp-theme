<?php
/**
* Template Name: Left-Sidebar Template
**/


get_header(); ?>

<section id="hero">
  <div class="container">
    <h1 class="hero-copy"><?php the_title(); ?></h1>
  </div><!-- container -->
</section>

<!-- MAIN CONTENT-->
<div class="container" id="main">
  <div class="row">
    <div class="col-lg-3 custom-menu-sidebar">
      <?php
        global $post;
        $values = get_post_custom( $post->ID );
        $selectedMenu = -1;
        if(isset( $values['custom_post_sidebar'] ) ){
          $selectedMenu = esc_attr( $values['custom_post_sidebar'][0] );
        }
        if($selectedMenu > -1){
          $menu_args = array( 'menu' => $selectedMenu );
          wp_nav_menu($menu_args);
        }
        else{
      ?>
      <h2>No Menu Selected!</h2>
      <p>Please select a menu in the page editor to have content diplayed here. If you no longer require a menu to be displayed here, please select "Default Template" in the page editor.</p>
      <?php
        }
      ?>
    </div>
    <div class="col-lg-9">

      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <?php the_content(); ?>

        <?php endwhile; else : ?>
  	       <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>

    </div><!-- col -->

<?php get_footer(); ?>
