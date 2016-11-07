<!--?php /* Template name: Inbound */ ?-->
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
    <section class="sub-title-servicos">
        <div class="container">
            <div class="col-md-7"><h1><?php echo get_field('sub_titulo');?></h1></div>
        </div>
    </section>
                
                <?php
                $flag = 0;

                while($flag < 11 ) {
                    $image = get_field('servico_-_coluna_esquerda_' . $flag);
                    $titulo = get_field('servico_titulo_direita_' . $flag);
                    $texto = get_field('servico_texto_direita_' . $flag);

                    if (empty($image) && empty($titulo) && empty($texto)) {
                        break;
                    } else {

                        if ($flag % 2 == 0) {
                        ?>
                        <section class="sobre-nxi-servicos">
                            <div class="container">
                                <div class="col-md-7">
                                    <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                </div>
                                <div class="col-md-5">
                                    <h1><?php the_field('servico_titulo_direita_' . $flag); ?></h1>
                                    <p><?php the_field('servico_texto_direita_' . $flag); ?></p>
                                </div>
                            </div>
                        </section>

                        <?php
                        } else { ?>

                            <section class="sobre-nxi-servicos">
                                <div class="container">
                                    <div class="col-md-5">
                                         <h1><?php the_field('servico_titulo_direita_' . $flag); ?></h1>
                                         <p><?php the_field('servico_texto_direita_' . $flag); ?></p>
                                     </div>
                                     <div class="col-md-7 a-l">
                                        <img class="img-responsive" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
                                    </div>
                                </div>
                            </section>
                    
                      <?php
                        }
                    }

                    $flag++;
                }
                ?>
<?php endwhile; else: ?>
    <p><?php _e('Desculpe, essa página não existe.'); ?></p>
<?php endif; ?>

<?php get_template_part( 'includes/ctas' ); ?>
<?php get_template_part( 'includes/cases' ); ?>
<?php get_template_part( 'includes/newsletter' ); ?>
<?php get_footer(); ?>