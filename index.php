<?php get_header(); ?>

<section id="hero">
  <div class="container">

    <h1 class="hero-copy">Blog</h1>
    <!--<h2 class="sub-hero">About Us</h2>-->

  </div><!-- container -->
</section>

<!-- MAIN CONTENT-->
<div class="container" id="main">
  <div class="row">
    <div class="col-lg-9">
      <div class="post-block">

        <!-- THE LOOP-->
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

          <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <?php the_content(); ?>

            <span class="post-meta">Posted by <strong><?php the_author();?></strong> on <?php the_time('l, F jS, Y')?></span>
            <?php edit_post_link(__('Edit This Post'));?>
          </div><!-- post-block -->

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

          </div><!-- posts -->
        </div><!-- col -->

<?php get_sidebar('right'); ?>
<?php get_footer(); ?>
