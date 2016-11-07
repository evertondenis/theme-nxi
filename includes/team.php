<section class="team">
	<div class="container">
		<div class="row">
			<h1><strong>Time</strong> Next Idea</h1>
		</div>
			<?php
			global $post;
			$args = array(
					'post_type' => 'team',
					'post_status' => 'publish',
					'posts_per_page' => 10
					);
			$team_query = null;
			$team_query = new WP_Query($args);

			if( $team_query->have_posts() ) :
				while ($team_query->have_posts()) : 
					$team_query->the_post(); 
					if (has_post_thumbnail( $post->ID ) ):
                           $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'team' );
					?>
                       <div class="col-sm-6 col-md-3 text-center div-person">
	                       <div class="overlay-image">
		                       	<!-- <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"> -->
		                       		<img class="img-responsive" src="<?php echo $image[0] ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		                       		
		                       	<!-- </a> -->
	                       </div>
	                       <div class="clear"></div>
	                       <div class="after">
	                       		<p><span><?php the_title(); ?></span></p>
                       			<?php the_content(); ?>
                       			<p><?php echo get_field('cargo') ?></p>
                       		</div>
                       		<div class="clear"></div>
                       </div>
            <?php endif;
				endwhile;
			endif;
			wp_reset_query();
			?>
			<div class="col-md-12 text-center">
				<h2>Quer fazer parte deste time?</h2>
				<p><a class="btn btn-orange btn-lg" href="https://www.99jobs.com/next-idea-inbound-marketing" title="ENTRE EM CONTATO" target="_blank"><span>ENTRE EM CONTATO</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
			</div>
	</div>
</section>
