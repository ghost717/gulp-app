<!doctype html>
<html lang="pl">
  <head>
    <title><?php bloginfo('name'); ?> | <?php wp_title(); ?></title>
    <meta name="viewport" content="width=device-width, user-scalable=no, maximum-scale=1, initial-scale=1, minimum-scale=1" />
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="keywords" content="" />

    <script src="<?php bloginfo('template_url'); ?>/js/lib/jquery/dist/jquery.min.js" type="text/javascript"></script>

    <link href="<?php bloginfo('template_url'); ?>/bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="<?php bloginfo('template_url'); ?>/bootstrap/js/bootstrap.min.js"></script>

    <link href="<?php bloginfo('template_url'); ?>/css/reset.css" media="all" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/css/layout.css" media="all" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/style.css" media="all" rel="stylesheet" type="text/css">
    <link href="<?php bloginfo('template_url'); ?>/images/fa/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- owl -->
    <link href="<?php bloginfo('template_url'); ?>/owl/owl.carousel.css" media="all" rel="stylesheet" type="text/css">
    
    <!-- wow.js -->
    <link href="<?php bloginfo('template_url'); ?>/wow/animate.css" media="all" rel="stylesheet" type="text/css">
    
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&amp;subset=latin-ext" rel="stylesheet">

    <!-- wp_head -->
    <?php wp_head(); ?>
  </head>
  <body>
<!--
  <div id="loader">
    <div class="logo">
      <img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="logo">

      <img id="loaderImg" src="<?php bloginfo('template_url'); ?>/images/loader.png" alt="">
    </div>
  </div>
-->

  <section id="navbar" class="wow fadeInUp">
    <div class="wrap">

      <div class="row">
        <div class="col-xs-12 col-sm-4 logo">
          <a href="<?php bloginfo('home'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt=""></a>
        </div>

        <div class="col-xs-12 col-sm-8 menus">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>

          <div id="menu" class="collapse">
            <?php  wp_nav_menu( array( 'theme_location' => 'primary-menu' ) ); ?>
          </div>
        </div>
        
      </div>

    </div>
  </section>
    
<?php //get_footer(); ?>

    <script src="<?php bloginfo('template_url'); ?>/js/smoothScrolling.js" type="text/javascript"></script>
<!--
    <script src="<?php bloginfo('template_url'); ?>/js/ajax.js" type="text/javascript"></script>
-->
  
    <?php wp_footer(); ?>
  </body>
</html>