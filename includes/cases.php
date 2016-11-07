<?php
global $post;
$args = array(
		'posts_per_page' => 1,
		'post_type' => 'case',
		'post_status' => 'publish',
		'orderby' => rand
		);
$case_query = null;
$case_query = new WP_Query($args);

$postType = get_queried_object();

while ($case_query->have_posts()) {

	$case_query->the_post();
	$bg =  str_replace(" ", "", get_field('background'));
	$bg = explode(",", $bg);
	$total = count($bg);
}

if($postType != NULL && get_field('background_image')['url'] == '') :
	if($total > 1 && $total <= 2) {
		$bg = 'background-image: linear-gradient(to right, #' . $bg[0] . ',#' . $bg[1] . ');';
	} elseif($bg[0] != '') {
		$bg = 'background-color: #' . $bg[0];
	} else {
		$bg = 'background-color: #E6E9EC';
	}
?>
<section class="cases-home" style="<?php echo $bg ?>">
<?php else: ?>
<section class="cases-home" style="background: transparent url(<?php echo get_field('background_image')['url'] ?>) no-repeat">
<?php endif; ?>
		<div class="container">
			<div class="row">
	            <h1>O <strong>SUCESSO DOS NOSSOS CLIENTES</strong><br>É TAMBÉM O NOSSO</h1>
			</div>
			<div class="row">
				<?php
				if( $case_query->have_posts() ) {
				  while ($case_query->have_posts()) : $case_query->the_post(); ?>
					
					<div class="col-md-7 col-dir col-md-push-5">
						<?php if (has_post_thumbnail( $post->ID ) ): ?>
						<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
							<figure>
								<img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
							</figure>
						<?php endif; ?>
					</div>
					<div class="col-md-5 col-md-pull-7">
						<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
						<p><?php the_excerpt(); ?></p>
						<p><a class="btn btn-orange btn-lg" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><span>ver case completo</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
					</div>
				
				<?php
				  endwhile;
				}
				wp_reset_query();
				?>
			</div>
		</div>
	</section>