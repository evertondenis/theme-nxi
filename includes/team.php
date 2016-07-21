<section class="team">
	<div class="container">
		<div class="row">
			<h1><span>Time</span><br>Next Idea</h1>
		</div>
			<?php
			global $post;
			$args = array(
					'post_type' => 'team',
					'post_status' => 'publish',
					'orderby' => rand
					);
			$team_query = null;
			$team_query = new WP_Query($args);

			if( $team_query->have_posts() ) :
				while ($team_query->have_posts()) : 
					$team_query->the_post(); 
					if (has_post_thumbnail( $post->ID ) ):
                           $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'team' );
					?>
                       <div class="col-sm-6 col-md-3">
	                       <div class="overlay-image">
		                       	<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
		                       		<img class="img-responsive" src="<?php echo $image[0] ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
		                       		<div class="after">
		                       			<p><span><?php the_title(); ?></span></p>
		                       			<?php the_content(); ?>
		                       		</div>
		                       	</a>
	                       </div>
                       </div>
            <?php endif;
				endwhile;
			endif;
			wp_reset_query();
			?>
			<div class="col-sm-6 col-md-3">
               <div class="overlay-image">
               		<div class="fazer-parte">
               			<p>Quer fazer parte deste time?</p>
               			<p><a class="btn btn-primary btn-lg" href="#" title="Quer fazer parte deste time?"><span>Entre em contato</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
               		</div>
               </div>
           </div>
			<?php //echo $page_data->post_content; ?>
	</div>
</section>
