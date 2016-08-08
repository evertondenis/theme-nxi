<section class="clientes">
	<div class="container">
		<div class="row">
			<h1><span>Nossos</span><br>Clientes</h1>
		</div>
		<div class="distribute-imgs">
			<?php
			global $post;
			$args = array(
					'post_type' => 'clientes',
					'post_status' => 'publish',
					'posts_per_page' => 50
					);
			$clientes_query = null;
			$clientes_query = new WP_Query($args);

			if( $clientes_query->have_posts() ) :
				while ($clientes_query->have_posts()) : 
					$clientes_query->the_post(); 
					if (has_post_thumbnail( $post->ID ) ):
                           $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'large' ); ?>
                       <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" /></a>
            <?php
            		endif;
				endwhile;
			endif;
			wp_reset_query();
			?>
			<?php //echo $page_data->post_content; ?>
			<span class="stretch"></span>
		</div>
	</div>
</section>

