<section class="cta">
		<div class="container text-center">
			<?php
			global $post;
			$args = array( 
					'posts_per_page' => 1,
					'category_name' => 'cta',
					'orderby' => rand
					);
			$ctaPost = get_posts( $args );

			foreach( $ctaPost as $post ) : setup_postdata($post); ?>
				<?php the_content(); ?>
			<?php endforeach; ?>
		</div>
	</section>