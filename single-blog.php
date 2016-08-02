<?php include('header-blog.php'); ?>

<?php
$newsArgs = array( 'post_type' => 'blog');

$newsLoop = new WP_Query( $newsArgs );

$queried_post = get_page_by_path('newsletter',OBJECT,'page');
$chamada = $queried_post->post_content;
$imagebg = wp_get_attachment_image_src( get_post_thumbnail_id( $queried_post->ID ), 'single-post-thumbnail' );
?>

<section class="blog-archive">
	<div class="row" style="background: #fff url(<?php echo $imagebg[0] ?>) no-repeat; height: 140px;">&nbsp;</div>
</section>

<div class="blog-archive">
	<div class="container">
	        <div class="crumbs container"><?php the_breadcrumb(); ?><hr></div>
		<div class="col-blog-esq">
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
				<?php if(has_post_thumbnail()) : $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-post' ); endif; ?>
					<section>
						<div class="content">
							<?php if(has_post_thumbnail()) : $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-post' ); ?>
							<div class="container-imagem">
								<figure>
									<img class="img-responsive border-radius-top" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>">
								</figure>
							</div>
							<?php endif; ?>
							<div class="conteudo">
								<p class="title-categoria"><?php echo get_the_term_list( $post->ID, 'category', '', ' , '); ?></p><hr>
								<h1><?php the_title(); ?></h1>
								<span class="tb-post-time"><time datetime="<?php the_time('Y-m-d g:i') ?>"> <?php the_time('j') ?> de <?php the_time('F') ?> de <?php the_time('Y') ?></time></span>
								<p><?php the_content(); ?></p>
							</div>
						</div>
						
					</section>
				<?php endwhile; ?>
			<?php else:  ?>
				<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
			<?php endif; ?>
		</div>
		<div class="col-blog-dir">
			<aside class="sidebar">
				<?php include('sidebar-blog.php'); ?>
			</aside>
		</div>
	</div>
</div>
<?php get_footer(); ?>