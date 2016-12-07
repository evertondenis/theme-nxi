<?php get_header(); ?>
        <?php if(has_post_thumbnail()) :
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        endif;
        ?>
         <section style="background:transparent url(<?php echo $image[0]; ?>) center 0 no-repeat;">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="container">
                <header>
                    <?php edit_post_link(); ?>
                    <h1>
                        <?php the_title();?>
                    </h1>
                </header>

                <?php the_content();?>
            </article>
            <?php endwhile; else: ?>
            <p><?php _e('Desculpe, essa página não existe.'); ?></p>
            <?php endif; ?>
        </section>
<?php //get_footer(); ?>
<style type="text/css" media="screen">
    h1 { text-align: center; }
    .header { display:none; }
    .subway-login-form { width: 220px; margin: 0 auto; }
</style>