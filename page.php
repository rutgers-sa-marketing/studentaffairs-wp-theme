<?php get_header(); ?>

<section id="hero">
  <div class="container">

    <h1 class="hero-copy"><?php the_title(); ?></h1>
    <!--<h2 class="sub-hero">About Us</h2>-->

  </div><!-- container -->
</section>

<!-- MAIN CONTENT-->
<div class="container" id="main">
  <div class="row">

    <div class="col-lg-9">
      <?php the_content(); ?>
    </div><!-- col -->

<?php get_sidebar('right'); ?>
<?php get_footer(); ?>
