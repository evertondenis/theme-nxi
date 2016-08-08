<?php
// $page_slug ='parceiros';
// $page_data = get_page_by_path($page_slug);
?>
<section class="parceiros">
	<div class="container">
		<div class="row">
			<h1><span>Nossos</span><br>Parceiros</h1>
		</div>
		<div class="distribute-imgs">
			<?php
			global $post;
			$args = array(
					'post_type' => 'parceiros',
					'post_status' => 'publish',
					'posts_per_page' => 10,
					'orderby' => rand
					);
			$parceiros_query = null;
			$parceiros_query = new WP_Query($args);

			if( $parceiros_query->have_posts() ) :
				while ($parceiros_query->have_posts()) : 
					$parceiros_query->the_post(); 
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