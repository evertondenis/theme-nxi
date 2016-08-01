<section class="cta">
		<div class="container text-center">
			<?php
			global $post;
			$args = array(
					'posts_per_page' => 1,
					'post_type' => 'ctas',
					'post_status' => 'publish',
					'orderby' => rand
					);
			$ctaPost = get_posts( $args );

			foreach( $ctaPost as $post ) : setup_postdata($post); ?>
				<h1><?php the_title(); ?></h1>
				<p><a class="btn btn-primary btn-lg" href="<?php the_permalink(); ?>"><span>Saiba Mais</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
			<?php endforeach; ?>
		</div>
	</section>