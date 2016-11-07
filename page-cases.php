<!--?php /* Template name: Cases */ ?-->
<?php get_header(); ?>
<?php if(has_post_thumbnail()) :
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
endif;
?>
<div class="row" style="background:transparent url(<?php echo $image[0]; ?>) center 0 no-repeat;">
    <section class="page-cases">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article class="container">
                <h1><?php the_content();?></h1>
            </article>
        <?php endwhile; else: ?>
            <p><?php _e('Desculpe, essa página não existe.'); ?></p>
        <?php endif; ?>
    </section>
    
    <div class="row">
      <div class="col-md-12 text-center">
        <div class="bounce" aria-hidden="true"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
      </div>
    </div>

    <section>        
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

         if($total > 1 && $total <= 2) {
          $bg = 'background-image: linear-gradient(to right, #' . $bg[0] . ',#' . $bg[1] . ');';
         } else {
          $bg = 'background-color: #' . $bg[0];
         }
         ?>

          <?php 
          if(get_field('background_image')['url'] == '') : ?>
            <article class="case-list" style="<?php echo $bg ?>">
          <?php else: ?>
            <article class="case-list" style="background: transparent url(<?php echo get_field('background_image')['url'] ?>) no-repeat">
          <?php endif ?>

                <div class="container">
                    <div class="row">
                      
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
                </div>
           </article>                    
       <?php
         endwhile;
       }
       wp_reset_query();
       ?>
    </section>
    <?php get_template_part( 'includes/ctas' ); ?>
    <?php get_template_part( 'includes/newsletter' ); ?>
</div>
<?php get_footer(); ?>