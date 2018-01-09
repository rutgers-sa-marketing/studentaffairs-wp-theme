<?php get_header(); ?>

<section id="hero">
  <div class="container">

    <h1 class="hero-copy">Search</h1>

  </div><!-- container -->
</section>

<!-- MAIN CONTENT-->
<div class="container" id="main">
  <div class="row">
    <div class="col-md-12">
      <span class="search-results"><?php printf( esc_html__( 'Search Results for: %s', stackstar ), '<span>' . get_search_query() . '</span>' ); ?></span>
      <?php get_search_form(); ?>
    </div><!-- col -->
  </div><!-- row -->

  <div class="row">
    <div class="col-md-12">
      <?php if ( have_posts() ) : ?>


            <?php /* Start the Loop */ ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <h3><?php the_title(); ?></h3>
            <p><?php the_excerpt(); ?></p>
            <p><a href="<?php the_permalink(); ?>"><?php the_permalink(); ?></a></p><br>

            <?php endwhile; ?>

            <?php //the_posts_navigation(); ?>

        <?php else : ?>

            <?php //get_template_part( 'template-parts/content', 'none' ); ?>

        <?php endif; ?>




    </div><!-- col -->
<?php get_footer(); ?>
