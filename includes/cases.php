<section class="cases-home">
		<div class="container">
			<div class="row">
				<?php
				global $post;
				$args = array(
						'posts_per_page' => 1,
						'post_type' => 'case',
						'post_status' => 'publish',
						'orderby' => rand
						);
				$case_query = null;
				$case_query = new WP_Query($args);

				if( $case_query->have_posts() ) {
				  while ($case_query->have_posts()) : $case_query->the_post(); ?>
					<div class="col-md-4 content">
						<h1><span>Case de</span><br>Sucesso</h1>
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php the_content(); ?></p>
						<p><a class="btn btn-ler-mais btn-lg" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i><span>ver case completo</span></a></p>
					</div>
					<div class="col-md-8">
						<?php if (has_post_thumbnail( $post->ID ) ): ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							<figure>
								<img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
							</figure>
						<?php endif; ?>
					</div>
				
				<?php
				  endwhile;
				}
				wp_reset_query();
				?>
			</div>
		</div>
	</section>