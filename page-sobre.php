<!--?php /* Template name: Sobre */ ?-->
<?php get_header(); ?>
        <?php if(has_post_thumbnail()) :
            $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
        endif;
        ?>
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         <section style="background:transparent url(<?php echo $image[0]; ?>) center 0 no-repeat;" class="page-header sobre">
            
            <article class="container">
                <?php the_content();?>
                <div class="row">
                    <div class="col-md-3">
                    <?php if (get_field('lead_nxi')) : ?>
                        <article>
                            <p class="title"><?php the_field('lead_nxi'); ?></p class="title">
                            <p>Leads Gerados para nossos clientes</p>
                        </article>
                    <?php endif; ?>
                    </div>
                    
                    <div class="col-md-3">
                    <?php if (get_field('total_materiais_nxi')) : ?>
                        <article>
                            <p class="title"><?php the_field('total_materiais_nxi'); ?></p class="title">
                            <p>Materias Ricos Publicados</p>
                        </article>
                    <?php endif; ?>
                    </div>
                    
                    <div class="col-md-3">
                    <?php if (get_field('idade_nxi')) : ?>
                        <article>
                            <p class="title"><?php the_field('idade_nxi'); ?></p class="title">
                            <p>Anos Agência de Inbound Marketing</p>
                        </article>
                    <?php endif; ?>
                    </div>

                    <div class="col-md-3">
                    <?php if (get_field('total_clientes_nxi')) : ?>
                        <article>
                            <p class="title"><?php the_field('total_clientes_nxi'); ?></p class="title">
                            <p>Clientes Atendidos no mundo.</p>
                        </article>
                    <?php endif; ?>
                    </div>
                </div>
            </article>
        </section>

        <section class="sobre-nxi">
            <div class="container">
                <div class="col-md-7">
                    <h1><?php the_field('sobre_nos_col_left'); ?></h1>
                </div>
                <div class="col-md-5">
                    <p><?php the_field('sobre_nos_col_right'); ?></p>
                    <p><a class="btn btn-orange btn-lg" href="<?php echo get_field('link_externo_nxi') ? get_field('link_externo_nxi') : the_permalink(); ?>" title="<?php echo get_field('titulo_botao_nxi'); ?>"><span><?php echo get_field('titulo_botao_nxi') ?></span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
                </div>
            </div>
        </section>

        <?php endwhile; else: ?>
        <p><?php _e('Desculpe, essa página não existe.'); ?></p>
        <?php endif; ?>


        <?php get_template_part( 'includes/servicos' ); ?>
        <div class="sobre-case"><?php get_template_part( 'includes/cases' ); ?></div>
        <?php get_template_part( 'includes/depoimentos' ); ?>
        <?php get_template_part( 'includes/clientes' ); ?>
        <?php get_template_part( 'includes/ctas' ); ?>
        <?php get_template_part( 'includes/parceiros' ); ?>
        <?php get_template_part( 'includes/team' ); ?>
        <?php get_template_part( 'includes/newsletter' ); ?>
    <!-- <div class="col-md-4">
        <?php get_sidebar(); ?>
    </div> -->
<?php get_footer(); ?>