<!--?php /* Template name: Cases */ ?-->
<?php get_header(); ?>
<?php if(has_post_thumbnail()) :
    $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
endif;
?>
<div class="row" style="background:transparent url(<?php echo $image[0]; ?>) center 0 no-repeat;">
    <section>
        <div class="container">
            <div class="col-md-12 page-header">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <h1><?php the_content();?></h1>
            <?php endwhile; endif; ?>
            </div>
        </div>
        
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
          $bg = 'background-color: ' . $bg[0];
         }
         ?>

            <article class="case-list" style="<?php echo $bg ?>">

                <div class="container">
                    <div class="col-md-4 content vcenter">
                       <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                       <p><?php the_excerpt(); ?></p>
                       <p><a class="btn btn-ler-mais btn-lg" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i> <span>ver case completo</span></a></p>
                   </div>
                   <div class="col-md-7 vcenter">
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
         endwhile;
       }
       wp_reset_query();
       ?>
    </section>
    <?php get_template_part( 'includes/ctas' ); ?>
</div>
<?php get_footer(); ?>