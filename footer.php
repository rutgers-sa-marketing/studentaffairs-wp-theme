</div><!-- row -->
</div><!-- container -->

<footer>
<div class="container">
  <div class="row">
    <div class="col-sm-6 col-md-3">
      <?php if ( ! dynamic_sidebar( 'Footer Column 1' ) ) : ?>

      <?php endif; ?>
    </div><!-- col -->

    <div class="col-sm-6 col-md-3">
      <?php if ( ! dynamic_sidebar( 'Footer Column 2' ) ) : ?>

      <?php endif; ?>
    </div><!-- col -->

    <div class="col-sm-6 col-md-3">
      <?php if ( ! dynamic_sidebar( 'Footer Column 3' ) ) : ?>

      <?php endif; ?>
    </div><!-- col -->

    <div class="col-sm-6 col-md-3">
      <?php if ( ! dynamic_sidebar( 'Footer Column 4' ) ) : ?>

      <?php endif; ?>
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->
</footer><!-- footer -->


<div class="bottom-bar">
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <p class="copyright">Copyright &copy;<? echo date(Y);?>, <a href="http://www.rutgers.edu" title="Rutgers University" target="_blank">Rutgers, The State University of New Jersey</a>, an equal opportunity, affirmative action institution. All rights reserved.</p>
    </div><!-- col -->

    <div class="col-md-4">
      <ul class="university-links">
      <li><a href="http://nb.rutgers.edu/" title="Rutgers University–New Brunswick" target="_blank">Rutgers University–New Brunswick</a></li>
      <li><a href="http://search.rutgers.edu/" title="Search Rutgers" target="_blank">Search Rutgers</a></li>
    </div><!-- col -->
  </div><!-- row -->
</div><!-- container -->
</div><!-- bottom-bar -->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Font Awesome CDN-->
<script src="https://use.fontawesome.com/a7b310d9ee.js"></script>

<!-- Custom Scripts -->
<script src="<?php bloginfo(template_directory); ?>/js/script.js"></script>

<?php wp_footer(); ?>
</body>
</html>
