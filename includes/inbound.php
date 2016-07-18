<section class="inbound">
	<div class="container">
		<?php
		global $post;
		$args = array( 
				'posts_per_page' => 1,
				'category_name' => 'inbound-marketing',
				'orderby' => rand
				);
		$inboundPost = get_posts( $args );

		foreach( $inboundPost as $post ) : setup_postdata($post); ?>
		<div class="col-md-6">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="col-md-6">
			<p><?php the_content(); ?></p>
			<p><a class="btn btn-blue-light btn-lg" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span>Conheça mais o Inbound</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
		</div>
		<?php endforeach; ?>
	</div>
</section>