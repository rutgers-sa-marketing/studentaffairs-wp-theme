<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="description" content="Student Affairs is an integral part of university life for students. We facilitate interactions among students, faculty, and staff to promote students’ academic success and their personal and professional development.">
    <meta name="keywords" content="Student Affairs, Rutgers, University">
    <title><?php bloginfo('description'); ?> | <?php bloginfo( 'name' ); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php bloginfo(template_directory); ?>/css/styles.css">
    <?php wp_head(); ?>
  </head>
  <body<?php body_class(); ?>>

<!-- HEADER -->
    <header>
      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            <a href="<?php echo get_home_url(); ?>" title="Rutgers University - Division of Student Affairs"><img src="<?php bloginfo(template_directory); ?>/images/main-logo.png" class="main-logo" alt="Rutgers University - Division of Student Affairs"></a>
          </div><!-- col -->

          <div class="col-lg-4">
            <p class="slogan">There's a <span>U</span> in R<span>u</span>tgers</p>
            <!--<h2 class="dep-name">The Center for Social Justice Education and LGBT Communities</h2>-->
          </div><!-- col -->

          <div class="col-lg-3 ml-auto">
            <form class="form-inline my-2 my-lg-0 desktop-search">
              <div class="inner-addon right-addon">
                <i class="fa fa-search" aria-hidden="true"></i>
                <input type="text" class="form-control" placeholder="Search" />
              </div>
            </form><!-- Search Field for Desktop -->
          </div><!-- col -->
        </div><!-- row -->
      </div><!-- container-->
    </header>
<!-- HEADER -->

<!-- NAVIGATION -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">

              <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span>Menu </span><span class="navbar-toggler-icon"></span>
              </button>

              <!--<div class="collapse navbar-collapse" id="navbarsExampleDefault">-->
                <?php
                  wp_nav_menu( array(
                      'theme_location'    => 'primary',
                      'depth'             => 2,
                      'container'         => 'div',
                      'container_class'   => 'collapse navbar-collapse',
                      'container_id'      => 'navbarsExampleDefault',
                      'menu_class'        => 'nav navbar-nav mr-auto',
                      'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                      'walker'            => new WP_Bootstrap_Navwalker())
                  );
                ?>

                <!--<ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Leadership</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Departments</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Services</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Get Involved</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Communications</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Giving</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Events</a>
                  </li>
                </ul> Main Nav -->

                <form class="form-inline my-2 my-lg-0 mobile-search">
                  <div class="inner-addon right-addon">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" class="form-control" placeholder="Search" />
                  </div>
                </form> <!-- Search Field for Mobile-->

              </div> <!-- Collapse -->

        </div><!-- contianer -->
      </nav>
<!-- NAVIGATION -->
