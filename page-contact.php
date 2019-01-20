<?php 
/**
 * Template Name: Kontakt
*/
get_header(); ?>

    <main class="main main__page">
      <section class="main__page__contact">

        <div class="wrap content --relative">
          <?php while (have_posts()) : the_post(); ?>



          <?php endwhile; ?>
        </div>

      </section><!-- main__page__contact -->
    </main>

<?php get_footer(); ?>

