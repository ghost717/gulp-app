<?php 
/**
 * Template Name: Oferta
*/
get_header(); ?>

    <main class="main main__page">
        <section class="main__offer main__page__offer">

            <div class="wrap content --relative">
                <?php while (have_posts()) : the_post(); ?>

                    <div class="main__title">
                        <h1><?php the_title(); ?></h1>
                    </div>

                    <div class="grid">
                        <?php while(have_rows('zabiegi')): the_row();
                                $post = get_sub_field('zabieg'); setup_postdata( $post );
                                $thumb_id = get_post_thumbnail_id(); $thumb = wp_get_attachment_image_src($thumb_id,'thumbOf', true);                                
                        ?>

                                <div class="grid__item">
                                    <div class="main__offer__item">
                                        <div class="post --relative">

                                            <div class="post__thumb flex-center --relative">
                                                <img src="<?php echo $thumb[0]; ?>" alt="<?php echo $image['alt']; ?>">
                                                <a href="<?php the_permalink(); ?>" class="bg">
                                                    <img src="<?php echo $thumb[0]; ?>" alt="<?php echo $image['alt']; ?>">
                                                </a>
                                            </div>
                                            <a class="post__content flex-center --bg" href="<?php the_permalink(); ?>">
                                                <div class="post__title">
                                                    <h4><?php the_title(); ?></h4>
                                                </div>
                                            </a>

                                        </div>
                                    </div>
                                </div>

                        <?php wp_reset_postdata(); endwhile; ?>
                    </div>

                <?php endwhile; ?>
            </div>
        </section><!-- main__page__offer -->
    </main>
    
<?php get_footer(); ?>

