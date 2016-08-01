<?php include('header-blog.php'); ?>

<?php
$queried_post = get_page_by_path('newsletter',OBJECT,'page');
$chamada = $queried_post->post_content;
$imagebg = wp_get_attachment_image_src( get_post_thumbnail_id( $queried_post->ID ), 'single-post-thumbnail' );
?>
<section class="blog-archive">
	<div class="row" style="background: #fff url(<?php echo $imagebg[0] ?>) no-repeat; height: 200px; padding-top:200px;"></div>
</section>
<div class="blog-archive">
	<div class="container">
		<div class="col-blog-esq">
			<header class="tb-seartch-title">
				<h3 class="tb-title-1"><?php printf( __( 'Resultado da busca por: %s', 'blog' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
			</header>
			<?php if( have_posts() ) :
				while ( have_posts() ) : the_post(); ?>
				<?php if(has_post_thumbnail()) : $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-post' ); endif; ?>
					<section>
						<div class="content">
							<?php if(has_post_thumbnail()) : $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-post' ); ?>
							<div class="container-imagem">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><img class="img-responsive border-radius-top" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>"></a>
							</div>
							<?php endif; ?>
							<div class="conteudo">
								<p class="title-categoria"><?php echo get_the_term_list( $post->ID, 'category', '', ' '); ?></p>
								<h1><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h1>
								<p><?php the_excerpt(); ?></p>
								<span class="tb-post-time"><time datetime="<?php the_time('Y-m-d g:i') ?>"> <?php the_time('j') ?> de <?php the_time('F') ?> de <?php the_time('Y') ?></time></span>
								<div class="continuar-lendo">
									<a class="btn btn-purple btn-lg" href="<?php the_permalink() ?>" title="Continuar lendo: <?php the_title(); ?>"><span>Continuar Lendo</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a>
								</div>
							</div>
						</div>
						
					</section>
				<?php endwhile; ?>
			<?php else:  ?>
				<header class="tb-seartch-title">
					<h3 class="tb-title-1"><?php printf( __( 'Nenhum artigo encontrado com o termo: %s', 'blog' ), '<span>' . get_search_query() . '</span>' ); ?></h3>
				</header>
			<?php endif; wp_reset_query(); ?>
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