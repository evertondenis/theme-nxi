<!--?php /* Template name: Serviços */ ?-->
<?php get_header(); ?>
<?php if(has_post_thumbnail()) :
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
    endif;
    ?>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    
    <section style="background:transparent url(<?php echo $image[0]; ?>) center 0 no-repeat;" class="page-header sobre">

        <article class="container">
            <?php the_content();?>
        </article>
    </section>
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="bounce" aria-hidden="true"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
      </div>
    </div>
<?php endwhile; else: ?>
    <p><?php _e('Desculpe, essa página não existe.'); ?></p>
<?php endif; ?>
<?php get_template_part( 'includes/inbound' ); ?>
<?php get_template_part( 'includes/servicos' ); ?>
<?php get_template_part( 'includes/clientes' ); ?>
<?php get_template_part( 'includes/cases' ); ?>
<?php get_template_part( 'includes/ctas' ); ?>
<?php get_template_part( 'includes/newsletter' ); ?>
<?php get_footer(); ?>