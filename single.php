<?php get_header(); ?>


        <!-- MAIN CONTENT-->
        <div class="col-lg-9">
          <div class="post-block">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
              <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
              <p>Single Page</p>
              <?php the_content(); ?>

              <span class="post-meta">Posted by <strong><?php the_author();?></strong> on <?php the_time('l, F jS, Y')?></span>
            </div><!-- post-block -->

<?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>

<?comments_template( '', true );; ?>

          </div><!-- posts -->
        </div><!-- col -->


<?php get_footer(); ?>
