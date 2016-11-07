<?php
$page_slug ='certificados';
$page_data = get_page_by_path($page_slug);

?>
<section class="certificados">
	<div class="container">
		<div class="row">
			<h1><strong>Somos reconhecidos</strong> pelas<br> principais instituições de<br> <strong>Inbound Marketing</strong> do mercado.</h1>
		</div>
		<div class="row row-fluid">
			
				<?php
				global $post;
				$args = array(
						'post_type' => 'certificados',
						'post_status' => 'publish',
						'posts_per_page' => 1,
						'orderby' => rand
						);
				$parceiros_query = null;
				$parceiros_query = new WP_Query($args);

				if( $parceiros_query->have_posts() ) :
					while ($parceiros_query->have_posts()) : 
						$parceiros_query->the_post(); 
						if (has_post_thumbnail( $post->ID ) ):
	                           $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>

	                       
		                   <div class="col-md-6 col-md-push-6">
		                   		<img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		                   </div>
		                   <div class="col-md-6 col-left col-md-pull-6">
		                       <?php the_content(); ?>
		                       <p><a class="btn btn-orange btn-lg" href="<?php echo get_field('url') ? get_field('url') : the_permalink(); ?>" title="<?php the_title(); ?>"><span><?php echo get_field('text_button') ?></span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
		                   </div>
		            <?php
		            	endif;
					endwhile;
				endif;
				wp_reset_query();
				?>
				
			
		</div>
	</div>
</section>

