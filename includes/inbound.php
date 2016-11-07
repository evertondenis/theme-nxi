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
		<div class="col-md-8">
			<?php the_content(); ?>
		</div>
		<div class="col-md-5 col-right">
			<?php echo get_field('segundo_texto'); ?>
			<p><a class="btn btn-orange btn-lg" href="<?php echo get_field('url') ? get_field('url') : the_permalink(); ?>" title="<?php the_title(); ?>"><span><?php echo get_field('text_button') ?></span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
		</div>
		<?php endforeach; ?>
	</div>
</section>