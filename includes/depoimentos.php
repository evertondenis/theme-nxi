<section class="depoimentos">
	<div class="container">
		<div id="slides">
			<?php
			global $post;
			$args = array(
					'posts_per_page' => 3,
					'post_type' => 'testimonial',
					'post_status' => 'publish',
					'orderby' => rand
					);
			$testimonial_query = null;
			$testimonial_query = new WP_Query($args);

			if( $testimonial_query->have_posts() ) :
			  while ($testimonial_query->have_posts()) : $testimonial_query->the_post(); ?>

			  	<div class="row">
			  		<div class="col-50">
			  			<?php if (has_post_thumbnail( $post->ID ) ): ?>
							<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							<figure>
								<img class="img-responsive img-circle" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
							</figure>
						<?php endif; ?>	
			  		</div>
			  		<div class="col-40">
			  			<figure>
							<img class="img-quotes" src="<?php bloginfo('template_url');?>/images/quatations.png" alt="">								
						</figure>
			  			<?php the_content(); ?>
				    	<p><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
			  		</div>
			    </div>
			    <?php
			  endwhile;
			endif;
			wp_reset_query();
			?>
		</div>
	</div>
</section>