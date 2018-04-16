<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <!-- encoding -->
	<meta charset="<?php bloginfo('charset'); ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
  <!-- info / SEO -->
  <title><?php echo (get_field('title', 'option')) ? get_field('title', 'option') : get_bloginfo('title'); ?></title>
	<meta name="description" content="<?php echo (get_field('title', 'option')) ? get_field('description', 'option') : get_bloginfo('description'); ?>">
	
  <!-- fonts -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Roboto:300,400,500" rel="stylesheet">
	<?php wp_head(); ?>

	<!-- remove this line on production server -/->
	<script>
		document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] +
			':35729/livereload.js?snipver=1"></' + 'script>')
	</script>
	<!-- remove this line on production server -->
</head>

<body <?php body_class(); ?>>
    <noscript>
      Do pelnego funkcjonowania witryny potrzebny jest JavaScript.
      <br/>
      <br/> This page needs JavaScript activated to work.
      <style>
        [data-aos] {
          opacity: 1 !important;
          -webkit-transform: none !important;
          transform: none !important;
        }

        noscript {
          position: fixed;
          z-index: 123;
          background: #f00;
          text-align: center;
          width: 100%;
          display: block;
          padding: 20px 20px;
          width: 250px;
          top: 0;
        }

        .owl-carousel {
          display: block;
        }
      </style>
    </noscript>

    <header class="header" role="banner">
      <div class="grid">
        <a class="header__branding" href="<?php echo get_home_url(); ?>">
          <img src="<?php asset('images/logo.svg') ?>" alt="">
        </a>

        <nav class="header__nav" role="navigation">

          <?php wp_nav_menu(array('pl_PL' => 'primary')); ?>

          <button class="header__nav__button menu__toggle">
            <span class="menu__line"></span>
            <span class="menu__line"></span>
            <span class="menu__line"></span>
          </button>

        </nav>

      </div>
    </header>

    <main class="main">

    </main>

    <footer class="footer">
        <div class="wrap content">

        </div>
    </footer>

    <script src="<?php bloginfo('template_url'); ?>/dist/js/smoothScrolling.js" type="text/javascript"></script>
  
    <?php wp_footer(); ?>
  </body>
</html>