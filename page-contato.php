<!--?php /* Template name: Contato */ ?-->
<?php get_header(); ?>
        <?php if(has_post_thumbnail()) :
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        endif;
        ?>
         <section class="contato" style="background:transparent url(<?php echo $image[0]; ?>) center 0 no-repeat;">
            <div class="container">
                <div class="col-md-12 page-header">
                    <h1><?php the_content();?></h1>
                </div>
            </div>
        </section>
        <section class="form-contact">
            <div class="container">
                <?php echo do_shortcode( '[contact-form-7 id="4471" title="New Contato"]' ); ?>
            </div>
        </section>
        
<?php get_footer(); ?>