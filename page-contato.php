<!--?php /* Template name: Contato */ ?-->
<?php get_header(); ?>
        <?php if(has_post_thumbnail()) :
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        endif;
        ?>
         <section class="contato" style="background:transparent url(<?php echo $image[0]; ?>) center 0 no-repeat;">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article class="container">
                    <?php the_content();?>
                    <div class="bounce" aria-hidden="true"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                    <div class="bounce2" aria-hidden="true"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                    <div class="bounce3" aria-hidden="true"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>

                </article>
            <?php endwhile; else: ?>
                <p><?php _e('Desculpe, essa página não existe.'); ?></p>
            <?php endif; ?>
        </section>
        <section class="form-contact">
            <div class="container">
                <?php echo do_shortcode( '[contact-form-7 id="4471" title="New Contato"]' ); ?>
            </div>
        </section>
        
<?php get_footer(); ?>