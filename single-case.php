<?php get_header(); ?>
<?php
// $banner = $dynamic_featured_image->get_featured_images( $post->ID );
// $banner =  $banner[0]['full'];

$bg =  str_replace(" ", "", get_field('background'));
$bg = explode(",", $bg);
$total = count($bg);

$current_post = $post->ID;

if($total > 1 && $total <= 2) {
  $bg = 'background-image: linear-gradient(to right, #' . $bg[0] . ',#' . $bg[1] . ');';
} else {
  $bg = 'background-color: #' . $bg[0];
}
$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="single-page" style="background: transparent url(<?php echo get_field('background_image')['url'] ?>) no-repeat">
        <div class="container">
            <section>
                <article>
                    <header>
                        <div class="container">
                          <h1>Case de <strong>Sucesso</strong><br><strong><?php the_field('brand'); ?></strong></h1>
                        </div>
                    </header>
                </article>
            </section>
        </div>
    </div>
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="bounce" aria-hidden="true"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
      </div>
    </div>
    <section class="descricao">
        <div class="container">
            <div class="row">
              <div class="col-md-8 title-case-container">
                <?php echo get_field('titulo_case'); ?>
              </div>
            </div>
            <div class="row col-flex">
                <div class="col-md-6">
                  <img src="<?php echo get_field('imagem_marca')['url'] ?>" alt="">
                </div>
                <?php if (get_field('desafio')) : ?>
                <div class="col-md-6">
                    <article>
                        <?php the_field('desafio'); ?>
                        <h2 class="problema-title">Problema</h2>
                        <?php the_field('problema'); ?>
                    </article>
                </div>
                <?php endif; ?>
            </div>
            <?php if (get_field('solucao')) : ?>
            <div class="row">
              <article class="solucao">
                  <div class="col-md-5">
                    <h2 class="problema-title">Solução</h2>
                    <?php the_field('solucao'); ?>
                  </div>
                  <div class="col-md-7">
                    <img src="<?php echo get_field('solucao_imagem')['url'] ?>" alt="">
                  </div>
                  <div class="clear"></div>
              </article>
            </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="conteudo-extra">
      <div class="row">
        <?php the_content(); ?>
      </div>
    </section>
     <section class="resultados">
        <div class="container">
            <h1>Resultados</h1>
            <div class="row">
              <div class="container-resultados">
                <?php if (get_field('lead')) : ?>
                  <div class="col-resultado">
                      <article>
                          <h2><?php the_field('titulo_1'); ?></h2>
                          <p><span><?php the_field('lead'); ?></span></p>
                          <p class="legenda-resultado"><?php the_field('legenda_1'); ?></p>
                      </article>
                  </div>
                <?php endif; ?>
                
                <?php if (get_field('visitas')) : ?>
                  <div class="col-resultado">
                      <article>
                          <h2><?php the_field('titulo_2'); ?></h2>
                          <p><span><?php the_field('visitas'); ?></span></p>
                          <p class="legenda-resultado"><?php the_field('legenda_2'); ?></p>
                      </article>
                  </div>
                <?php endif; ?>
                
                <?php if (get_field('rejeicao')) : ?>
                  <div class="col-resultado">
                      <article>
                          <h2><?php the_field('titulo_3'); ?></h2>
                          <p><span><?php the_field('rejeicao'); ?></span></p>
                          <p class="legenda-resultado"><?php the_field('legenda_3'); ?></p>
                      </article>
                  </div>
                <?php endif; ?>

                <?php if (get_field('social_media')) : ?>
                  <div class="col-resultado">
                      <article>
                          <h2><?php the_field('titulo_4'); ?></h2>
                          <p><span><?php the_field('social_media'); ?></span></p>
                          <p class="legenda-resultado"><?php the_field('legenda_4'); ?></p>
                      </article>
                  </div>
                <?php endif; ?>
                <span class="stretch"></span>
              </div>
            </div>
        </div>
    </section>

    <?php get_template_part( 'includes/ctas' ); ?>

    <?php
       global $post;
       $args = array(
               'post_type' => 'case',
               'post_status' => 'publish',
               'orderby' => rand
               );
       $case_query = null;
       $case_query = new WP_Query($args);
       if( $case_query->have_posts() ) {
         while ($case_query->have_posts()) : $case_query->the_post(); ?>
         <?php
         $bg =  str_replace(" ", "", get_field('background'));
         $bg = explode(",", $bg);
         $total = count($bg);

           if ($current_post != $post->ID) {
           
               if($postType != NULL && get_field('background_image')['url'] == '') :
                  if($total > 1 && $total <= 2) {
                    $bg = 'background-image: linear-gradient(to right, #' . $bg[0] . ',#' . $bg[1] . ');';
                  } elseif($bg[0] != '') {
                    $bg = 'background-color: #' . $bg[0];
                  } else {
                    $bg = 'background-color: #E6E9EC';
                  }
                ?>
                <article class="case-list" style="<?php echo $bg ?>">
                <?php else: ?>
                <article class="case-list" style="background: transparent url(<?php echo get_field('background_image')['url'] ?>) no-repeat">
                <?php endif; ?>
                      <div class="container">
                          
                          <div class="col-md-7 col-dir col-md-push-5">
                            <?php if (has_post_thumbnail( $post->ID ) ): ?>
                            <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
                              <figure>
                                <img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                              </figure>
                            <?php endif; ?>
                          </div>
                          <div class="col-md-5 col-md-pull-7">
                            <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <p><?php the_excerpt(); ?></p>
                            <p><a class="btn btn-orange btn-lg" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span>ver case completo</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
                          </div>
                      </div>
                 </article>                    
             <?php
          }
         endwhile;
       }
       wp_reset_query();
       ?>
<?php endwhile; else: ?>
<p><?php _e('Desculpe, essa página não existe.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>