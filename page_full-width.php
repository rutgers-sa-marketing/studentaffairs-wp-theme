<?php
/**
* Template Name: Full Width Template
**/


get_header(); ?>

<section id="hero">
  <div class="container">

    <h1 class="hero-copy"><?php the_title(); ?></h1>
    <!--<h2 class="sub-hero">About Us</h2>-->

  </div><!-- container -->
</section>

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

<?php get_footer(); ?>
