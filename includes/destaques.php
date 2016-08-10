<?php
global $post;
$args = array(
		'posts_per_page' => 1,
		'post_type' => 'destaque',
		'post_status' => 'publish',
		'orderby' => rand
		);
$destaques_query = null;
$destaques_query = new WP_Query($args);

if( $destaques_query->have_posts() ) {
while ($destaques_query->have_posts()) : $destaques_query->the_post(); 
  	if (has_post_thumbnail( $post->ID ) ):
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	endif; ?>
<section class="banner" style="background:transparent url(<?php echo $image[0]; ?>) center no-repeat;">
	<div class="container">		
		<div class="col-md-6">
			<h1><?php the_content(); ?></h1>
			<h2><?php the_excerpt() ?></h2>
			<p><a class="btn btn-orange btn-lg" href="<?php echo get_field('url') ? get_field('url') : the_permalink(); ?>" title="<?php the_title(); ?>"><span><?php echo get_field('text_button') ?></span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
		</div>
		
	</div>
</section>
<?php
endwhile;
}
wp_reset_query();
?>