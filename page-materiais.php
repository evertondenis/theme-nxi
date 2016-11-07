<!--?php /* Template name: Materiais */ ?-->
<?php get_header(); ?>
        <?php if(has_post_thumbnail()) :
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        endif;
        ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         <section class="page-materiais" style="background:transparent url(<?php echo $image[0]; ?>) center 0 no-repeat;" class="page-header">
            <article class="container">
                <?php the_content();?>
            </article>
        </section>
        <?php endwhile; else: ?>
            <section style="background:transparent url(<?php echo $image[0]; ?>) center 0 no-repeat;" class="page-header">
                <p><?php _e('Desculpe, essa página não existe.'); ?></p>
            </section>
        <?php endif; ?>
        <div class="row">
          <div class="col-md-12 text-center">
            <div class="bounce" aria-hidden="true"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
          </div>
        </div>
        <section class="container-cases">
            <div class="container">

                <?php $categories = get_categories("taxonomy=materiais_entries"); ?>

                <div class="list-cases">
                    <?php
                    global $post;
                    $args = array(
                            'post_type' => 'materiais',
                            'post_status' => 'publish',
                            );
                    $port_query = null;
                    $port_query = new WP_Query($args);

                    if( $port_query->have_posts() ) : while ($port_query->have_posts()) : $port_query->the_post(); ?>
                    <?php if (has_post_thumbnail( $post->ID ) ): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-cases' ); endif; ?>

                    <?php //$terms = get_the_terms( $post->ID , 'materiais_entries' ); foreach ( $terms as $term ) {}?>
                    
                    <a href="<?php echo get_field('url') ?>" title="<?php the_title(); ?>" class="box" id="<?php echo $term->slug; ?>">
                        <figure>
                            <img src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                        </figure>
                        <div class="after">
                            <p><?php the_title(); ?></p>

                            <div class="btn btn-orange btn-lg"><span>Baixar e-book</span><i class="fa fa-download" aria-hidden="true"></i></div>
                        </div>
                    </a>

                    <?php endwhile; endif; wp_reset_query();?>
                </div>
            </div>
        </section>
        <?php get_template_part( 'includes/ctas' ); ?>
<?php get_footer(); ?>