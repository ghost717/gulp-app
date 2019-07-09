<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <?php echo (get_field('header_text', 'option')) ? get_field('header_text', 'option') : ''; ?>

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
</head>
<body <?php body_class(); ?>>
    <?php echo (get_field('body_text', 'option')) ? get_field('body_text', 'option') : ''; ?>

    <div id="loader" class="flex-center">
      <img src="<?php asset('img/logo.png'); ?>" alt="<?php bloginfo('title'); ?>">
    </div>

    <header class="header">
      <div class="wrap">

        <a class="header__branding" href="<?php echo get_home_url(); ?>">
          <img class="header__logo" src="<?php $image = get_field('logo', 'option'); echo $thumb = $image['url']; ?>" alt="<?php echo $image['alt']; ?>">
        </a><!--header__logo-->

        <nav class="header__nav" role="navigation">
          <button class="header__nav__button menu__toggle" aria-label="button_nav">
              <span class="menu__line"></span>
              <span class="menu__line"></span>
              <span class="menu__line"></span>
          </button>
          
          <?php wp_nav_menu(array('theme_location' => 'primary-menu')); //wp_nav_menu(array('pl_PL' => 'primary')); ?>
        </nav>

      </div>
    </header>

    <main class="main">

    </main>

    <footer class="footer">
        <div class="wrap content">

        </div>
        
        <div class="footer__copy">
          Projekt i wykonanie <a href="http://stomatologia.314.pl/" target="_blank" aria-label="Stomatologia 314.pl">Stomatologia 314.pl</a>
        </div>
    </footer>

    <?php $tab = $_GET['form']; if($_GET['form'] == 'reservation'): ?>
      <section class="modal__form flex-center <?php if(isset($tab)): echo 'lightbox active'; endif; ?>">
        <div class="wrap content --relative">
          <a href="#" id="exit" aria-label="exit">X</a>
          <div class="main__title"><h3>Umów wizytę</h3></div>
          <img src="<?php asset('img/separator.png'); ?>" class="modal__form__sep" alt="">
          <?php echo (get_field('umow_wizyte', 'option')) ? get_field('umow_wizyte', 'option') : get_field('formularz', 'option'); ?>
        </div>
      </section>
    <?php endif; ?>
            
    <?php //if(get_field('cookies', 'option')): ?>
      <div style="display:none" id="cookies">
        <div class="wrap">
      
            <?php echo (get_field('cookies', 'option')) ? get_field('cookies', 'option') : "Serwis wykorzystuje pliki cookies. Korzystając ze strony wyrażasz zgodę na wykorzystywanie plików cookies."; ?>
            <div id="exit">OK</div>
            
        </div>
      </div>
    <?php //endif; ?>
    
    <?php echo (get_field('footer_text', 'option')) ? get_field('footer_text', 'option') : ''; ?>
    
    <?php get_template_part('no-script'); ?>

    <?php wp_footer(); ?>
  </body>
</html>