<?php 
/**
 * Template Name: Kontakt
*/
get_header(); ?>

    <main class="main main__page">
      <section class="main__page__contact">

        <div class="wrap content --relative">
            <?php while (have_posts()) : the_post(); ?>

                <?php while(have_rows('mapy')): the_row(); ?>
                
                    <?php $location = get_sub_field('mapa'); ?>
                    
                    <div class="acf_map">
                        <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>" data-address="<?php echo $location['address']; ?>"></div>
                        <p class="address"><?php echo $location['address']; ?></p>
                    </div>
                    
                <?php endwhile; ?>

            <?php endwhile; ?>
        </div>

      </section><!-- main__page__contact -->
    </main>

<?php get_footer(); ?>

