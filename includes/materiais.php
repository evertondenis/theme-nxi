<section class="materiais">
	<div class="container">
		<?php
		global $post;
		$args = array(
				'posts_per_page' => 1,
				'post_type' => 'portfolio',
				'post_status' => 'publish',
				'orderby' => rand
				);
		$port_query = null;
		$port_query = new WP_Query($args);

		if( $port_query->have_posts() ) {
		  while ($port_query->have_posts()) : $port_query->the_post(); ?>
		  	<div class="col-md-6">
				<h1><span>E-BOOK</span><br>GRÁTIS</h1>
				<p><?php the_title(); ?></p>
				<p><a class="btn btn-orange btn-lg" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><span>Baixar e-book</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
			</div>

		  	<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<div class="col-md-6">
				<figure>
					<img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				</figure>
			</div>
			<?php endif; ?>
		    <?php
		  endwhile;
		}
		wp_reset_query();
		?>		
	</div>
</section>