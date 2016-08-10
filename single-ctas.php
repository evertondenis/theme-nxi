<?php get_header(); ?>
<?php
$banner = $dynamic_featured_image->get_featured_images( $post->ID );
$banner =  $banner[0]['full'];
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="single-page" style="background:#6653C7 url(<?php echo $banner ?>) center 0 no-repeat;">
        <div class="container">
            <section>
                <article>
                    <header>
                        <div class="container">
                            <div class="col-md-4 vcenter">
                               <div class="content">
                                   <?php edit_post_link(); ?>
                                   <h2><?php the_field('brand');?></h2>
                                   <h1><?php the_title();?></h1>
                                   <p><?php the_excerpt(); ?></p>
                               </div>
                           </div>
                           <div class="col-md-7 vcenter">
                               <div class="content">
                                    <?php if (has_post_thumbnail( $post->ID ) ): ?>
                                       <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
                                       <figure>
                                           <img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                                       </figure>
                                   <?php endif; ?>
                                </div>
                           </div>
                        </div>
                    </header>
                </article>
            </section>
        </div>
    </div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 conteudo">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'includes/cases' ); ?>

<?php endwhile; else: ?>
<p><?php _e('Desculpe, essa página não existe.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>