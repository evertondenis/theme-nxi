<?php include('header-blog.php'); ?>

<?php
$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

$newsArgs = array( 'post_type' => 'post',
					'paged' => $paged
					);

$page_slug = trim( $_SERVER["REQUEST_URI"] , '/' );
$tag = substr($page_slug, 0, 3);

if (is_category( )) {
  $cat = get_query_var('cat');
  $currentcat = get_category ($cat);
  $newsArgs = array( 'post_type' => 'post', 'paged' => $paged, 'category_name' => $currentcat->slug);

} elseif($tag === 'tag') {
	$currenttag = get_tag_id_by_name(substr($page_slug, 4));
	$newsArgs = array( 'post_type' => 'post', 'paged' => $paged, 'tag_id' => $currenttag);
}

$newsLoop = new WP_Query( $newsArgs );

$queried_post = get_page_by_path('newsletter',OBJECT,'page');
$chamada = $queried_post->post_content;
$imagebg = wp_get_attachment_image_src( get_post_thumbnail_id( $queried_post->ID ), 'single-post-thumbnail' );
?>
<section class="blog-archive">
	<div class="row" style="background: #fff url(<?php echo $imagebg[0] ?>) no-repeat; height: 540px; padding-top:200px;">
		<div class="container">
			<div class="chamada-news"><?php echo $chamada; ?></div>
			<div class="form-news"><?php echo do_shortcode( '[contact-form-7 id="4496" title="NEW Newsletter"]' ); ?></div>
		</div>
	</div>
</section>
<div class="blog-archive">
	<div class="container">
		<div class="col-blog-esq">
			<?php if( $newsLoop->have_posts() ) :
				while ( $newsLoop->have_posts() ) : $newsLoop->the_post(); ?>
				<?php if(has_post_thumbnail()) : $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-post' ); endif; ?>
					<section>
						<div class="content">
							<?php if(has_post_thumbnail()) : $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-post' ); ?>
							<div class="container-imagem">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="img-responsive border-radius-top" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"></a>
							</div>
							<?php endif; ?>
							<div class="conteudo">
								<p class="title-categoria"><?php echo get_the_term_list( $post->ID, 'category', '', ' , '); ?></p><hr>
								<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
								<p><?php the_excerpt(); ?></p>
								<span class="author"><?php the_author() ?>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;</span><span class="tb-post-time"><time datetime="<?php the_time('Y-m-d g:i') ?>"> <?php the_time('j') ?> <?php the_time('F') ?> <?php the_time('Y') ?></time></span>
								<div class="continuar-lendo">
									<a class="btn btn-orange btn-lg" href="<?php the_permalink() ?>" title="Continuar lendo: <?php the_title(); ?>"><span>Continuar Lendo</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
						
					</section>
				<?php endwhile; ?>
			<?php else:  ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
			<div class="row text-center">
				<div class="pagination">
					<?php if (function_exists("pagination")) {
					    pagination($additional_loop->max_num_pages);
					} ?>
				</div>
			</div>
		</div>
		<div class="col-blog-dir">
			<aside class="sidebar">
				<?php include('sidebar-blog.php'); ?>
			</aside>
		</div>
	</div>
</div>
<?php get_footer(); ?>