<?php get_header(); ?>
<?php
$banner = $dynamic_featured_image->get_featured_images( $post->ID );
$banner =  $banner[0]['full'];

$bg =  str_replace(" ", "", get_field('background'));
$bg = explode(",", $bg);
$total = count($bg);

if($total > 1 && $total <= 2) {
  $bg = 'background-image: linear-gradient(to right, #' . $bg[0] . ',#' . $bg[1] . ');';
} else {
  $bg = 'background-color: ' . $bg[0];
}
?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="single-page" style="<?php echo $bg ?>">
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
    <section class="descricao">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                <?php if (get_field('desafio')) : ?>
                    <article>
                        <h1>Desafio</h1>
                        <?php the_field('desafio'); ?>
                    </article>
                <?php endif; ?>
                </div>
                <div class="col-md-6">
                <?php if (get_field('problema')) : ?>
                    <article>
                        <h1>Problema</h1>
                        <?php the_field('problema'); ?>
                    </article>
                <?php endif; ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                <?php if (get_field('solucao')) : ?>
                    <article>
                        <h1>Solução</h1>
                        <?php the_field('solucao'); ?>
                    </article>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </section>
     <section class="resultados" style="<?php echo $bg ?>">
        <div class="container">
            <h1>Resultados</h1>
            <div class="row">
                
                <div class="col-md-3">
                <?php if (get_field('lead')) : ?>
                    <article>
                        <h1>leads</h1>
                        <p><span><?php the_field('lead'); ?></span><span class="perc">%</span></p>
                        <p>Crescimento em leads qualificados gerados.</p>
                    </article>
                <?php endif; ?>
                </div>
                
                <div class="col-md-3">
                <?php if (get_field('visitas')) : ?>
                    <article>
                        <h1>Visitas</h1>
                        <p><span><?php the_field('visitas'); ?></span><span class="perc">%</span></p>
                        <p>Visitas convertidos em orçamentos no website</p>
                    </article>
                <?php endif; ?>
                </div>
                
                <div class="col-md-3">
                <?php if (get_field('rejeicao')) : ?>
                    <article>
                        <h1>Rejeição</h1>
                        <p><span><?php the_field('rejeicao'); ?></span><span class="perc">%</span></p>
                        <p>Redução da Taxa de Rejeição do Website</p>
                    </article>
                <?php endif; ?>
                </div>

                <div class="col-md-3">
                <?php if (get_field('social_media')) : ?>
                    <article>
                        <h1>Social Media</h1>
                        <p><span><?php the_field('social_media'); ?></span><span class="perc">%</span></p>
                        <p>Crescimento de seguidores em redes sociais (s/mídia)</p>
                    </article>
                <?php endif; ?>
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
       $count = 1;
       if( $case_query->have_posts() ) {
         while ($case_query->have_posts()) : $case_query->the_post(); ?>
            <article class="gradient-bg<?php echo $count ?>  case-list">
                <div class="container">
                    <div class="col-md-4 content">
                       <?php edit_post_link(); ?>
                       <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                       <p><?php the_excerpt(); ?></p>
                       <p><a class="btn btn-ler-mais btn-lg" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i> <span>ver case completo</span></a></p>
                   </div>
                   <div class="col-md-8">
                       <?php if (has_post_thumbnail( $post->ID ) ): ?>
                           <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
                           <figure>
                               <img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
                           </figure>
                       <?php endif; ?>
                   </div>
                </div>
           </article>                    
       <?php
         $count = (($count%3)==0) ? 1 : $count + 1;
         endwhile;
       }
       wp_reset_query();
       ?>
<?php endwhile; else: ?>
<p><?php _e('Desculpe, essa página não existe.'); ?></p>
<?php endif; ?>

<?php get_footer(); ?>