<?php get_header(); ?>

<section id="hero">
  <div class="container">

    <h1 class="hero-copy">Uh oh...</h1>
    <h2 class="sub-hero">404 error</h2>

  </div><!-- container -->
</section>

<!-- MAIN CONTENT-->
<div class="container" id="main">
  <div class="row">

    <div class="col-md-2">
      <img class="img-responsive" src="<?php bloginfo(template_directory); ?>/images/sad-knight.png" alt="Sad Scarlet Knight">
    </div><!-- col -->

    <div class="col-md-10">
      <h2>You've broken the Scarlet Knight's feather plume...How could you!</h2>
      <p>A page you are looking for has either moved or no longer exists.</p>
      <p>Leave this page by <a href="<?php echo get_home_url(); ?>">clicking here.</a></p>
    </div><!-- col -->
<?php get_footer(); ?>
