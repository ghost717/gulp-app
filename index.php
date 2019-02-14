<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- encoding -->
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- info / SEO -->
    <title><?php echo (get_field('title', 'option')) ? get_field('title', 'option') : bloginfo('title').' '.wp_title(); ?></title>

    <!-- livereload -->
    <?php if (strpos(get_home_url(), 'localhost') == true) : ?>
    <script>
      document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] +
        ':35729/livereload.js?snipver=1"></' + 'script>')
    </script>
    <?php endif; ?>

    <?php wp_head(); ?>
    <?php echo (get_field('header_text', 'option')) ? get_field('header_text', 'option') : ''; ?>
</head>
<body <?php body_class(); ?>>
    <?php echo (get_field('body_text', 'option')) ? get_field('body_text', 'option') : ''; ?>

    <?php get_template_part('no-script'); ?>

    <header class="header">
      <div class="wrap">

        <a class="header__branding" href="<?php echo get_home_url(); ?>">
          <img class="header__logo" src="<?php $image = get_field('logo', 'option'); echo $thumb = $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        </a><!--header__logo-->

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

    <?php if(isset($tab)): ?>

      <section class="modal__form lightbox" <?php if(isset($tab)): echo 'style="display: block"'; endif; ?>>
        <div class="wrap content">
          <?php
            $tab = $_GET['form'];
            
            if(isset($tab)){
              the_field('umow_wizyte', 'option'); 
            }
          ?>
        </div>
      </section>
      
    <?php endif; ?>
            
    <?php if(get_field('cookies', 'option')): ?>
    <div style="display:none" id="cookies">
      <div class="wrap">
        <?php the_field('cookies', 'option'); ?>
        <div id="exit">OK</div>
      </div>
    </div>
    <?php endif; ?>

    <?php echo (get_field('footer_text', 'option')) ? get_field('footer_text', 'option') : ''; ?>
    <?php wp_footer(); ?>
  </body>
</html>