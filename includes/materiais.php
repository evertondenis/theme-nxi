<?php
global $post;
$args = array(
		'posts_per_page' => 1,
		'post_type' => 'materiais',
		'post_status' => 'publish',
		'orderby' => rand
		);
$ctaPost = get_posts( $args );
$port_query = null;
$port_query = new WP_Query($args);

foreach( $ctaPost as $post ) {
	setup_postdata($post);
	$bg =  str_replace(" ", "", get_field('background_module'));
	$bg = explode(",", $bg);
	$total = count($bg);
}

if($total > 1 && $total <= 2) {
	$bg = 'background-image: linear-gradient(to right, #' . $bg[0] . ',#' . $bg[1] . ');';
} elseif($bg[0] != '') {
	$bg = 'background-color: #' . $bg[0];
} else {
	$bg = 'background-color: #E6E9EC';
}
?>
<section class="materiais" style="<?php echo $bg ?>">
	<div class="container">
		<?php
		if( $port_query->have_posts() ) {
		  while ($port_query->have_posts()) : $port_query->the_post(); ?>
		  	<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
		  	<div class="col-md-7">
		  		<figure>
					<img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				</figure>
			</div>
			<?php endif; ?>
		  	
			<div class="col-md-5">
				<h1><span>MATERIAIS</span><br>o que sua empresa<br>precisa saber para<br>para crescer</h1>
				<h2><?php the_title(); ?></h2>
				<p><a class="btn btn-orange btn-lg" href="<?php echo get_field('url') ? get_field('url') : the_permalink(); ?>" title="<?php the_title(); ?>"><span><?php echo get_field('text_button') ?></span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
			</div>
			
		    <?php
		  endwhile;
		}
		wp_reset_query();
		?>		
	</div>
</section>