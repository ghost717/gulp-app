<?php 
/**
 * Template Name: Galeria
*/
get_header(); ?>

    <main class="main main__page">
        <section class="main__gallery main__page__gallery">

            <div class="wrap content --relative">
                <?php while (have_posts()) : the_post(); ?>

                    <div class="grid jwba_gallery">
                        <?php 
                            if(get_field('galeria')):
                                while(have_rows('galeria')): the_row(); 
                        ?>

                                <div class="grid__item">
                                    <div class="grid__item__thumb">
                                        <?php $image = get_sub_field('zdjecie'); $thumb = $image['sizes']['thumb600']; $thumbHD = $image['sizes']['fullhd']; ?>
                                        <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>">
                                        <a href="<?php echo $thumbHD; ?>" class="bg" style="background-image: url(<?php echo $thumb; ?>);">
                                            <img src="<?php echo $thumb; ?>" alt="<?php echo $image['alt']; ?>">
                                        </a>
                                    </div>
                                </div>

                        <?php
                                endwhile;
                            endif;
                        ?>
                    </div>

                <?php endwhile; ?>
            </div>
        </section><!-- main__page__gallery -->
    </main>

    <div id="ajax"></div>

<?php get_footer(); ?>

