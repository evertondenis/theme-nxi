<?php
global $post;
$args = array(
		'posts_per_page' => 1,
		'post_type' => 'ctas',
		'post_status' => 'publish',
		'orderby' => rand
		);
$ctaPost = get_posts( $args );

foreach( $ctaPost as $post ) {
	setup_postdata($post);
	$bg =  str_replace(" ", "", get_field('background_module'));
	$bg = explode(",", $bg);
	$total = count($bg);
}

if($total > 1 && $total <= 2) {
	$bg = 'background-image: linear-gradient(to right, #' . $bg[0] . ',#' . $bg[1] . ');';
} else {
	$bg = 'background-color: #' . $bg[0];
}
?>
<section class="cta" style="<?php echo $bg ?>">
		<div class="container text-center">
			<?php
			foreach( $ctaPost as $post ) : setup_postdata($post); ?>
				<h1><?php the_title(); ?></h1>
				<p><a class="btn btn-orange btn-lg" href="<?php echo get_field('url') ? get_field('url') : the_permalink(); ?>"><span><?php echo get_field('text_button') ?></span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
			<?php endforeach; ?>
		</div>
	</section>