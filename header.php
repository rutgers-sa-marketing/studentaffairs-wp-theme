<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible"> <!-- Add attribute: content="ie=edge" if we need to support Internet Explorer prior to version 11! -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php
      # Security Enhancement: Learn about how we can setup a content security policy
      # meta http-equiv="Content-Security-Policy" content="default-src 'self'"
    ?>
    <!-- Theme Color for Chrome, Firefox OS and Opera. This will delight students! -->
    <meta name="theme-color" content="#d21034">
    <meta name="description" content="Student Affairs is an integral part of university life for students. We facilitate interactions among students, faculty, and staff to promote students’ academic success and their personal and professional development.">
    <?php
      # Set the base URL for all relative URLs within the document. Use this if we want to avoid using "bloginfo() so many times"
      # <base href="<?php bloginfo(template_directory); ?/>">
    ?>
    <meta name="keywords" content="Student Affairs, Rutgers University">
    <title><?php bloginfo( 'name' ); ?> | <?php bloginfo('description'); ?></title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php bloginfo(template_directory); ?>/css/styles.css">
    <!-- disallow Twitter from using your site's info for personalization purposes -->
    <meta name="twitter:dnt" content="on">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
  <!-- HEADER -->
    <header>
      <div class="container">
        <div class="row header-row">
          <div class="col-lg-2">
            <a href="<?php echo get_home_url(); ?>" title="Rutgers University - Division of Student Affairs">
              <img src="<?php bloginfo(template_directory); ?>/images/sarutgers-logo-scarlet.png" class="main-logo mx-auto d-block" alt="Rutgers University - Division of Student Affairs">
            </a>
          </div><!-- col -->

          <div class="col-lg-4">
            <h1 class="dep-name"><?php bloginfo( 'name' ); ?></h1>
          </div><!-- col -->

          <div class="col-lg-6 ml-auto">
            <?php get_search_form(); ?><!-- Search Field for Desktop -->
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
          </div> <!-- Collapse -->
        </div><!-- contianer -->
      </nav>
<!-- NAVIGATION -->
