<?php include('header-blog.php'); ?>

<?php
$newsArgs = array( 'post_type' => 'post');

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
								<span class="author"><?php the_author() ?>&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;</span>
								<span class="tb-post-time"><time datetime="<?php the_time('Y-m-d g:i') ?>"> <?php the_time('j') ?> de <?php the_time('F') ?> de <?php the_time('Y') ?></time></span>
								<span class="author">&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;<?php comments_number('No Comments', '1 Comment', '% Comments' );?></span>
								<p><?php the_content(); ?></p>
							</div>
						</div>
						
					</section>
					<section>
	                    <div class="div-social">
	                        <h1>Compartilhe:</h1>
	                        <div class="fb-share-button icones" data-href="<?php the_permalink() ?>" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Compartilhar</a></div>
	                        <div class="g-plusone icones" data-size="medium" data-annotation="none"></div>
	                        <div class="lin icones">
	                            <script src="//platform.linkedin.com/in.js" type="text/javascript"> lang: en_US</script>
	                            <script type="IN/Share" data-counter="right"></script>
	                        </div>
	                        <div class="icones">
	                        <a href="https://twitter.com/share" class="twitter-share-button" data-via="">Tweet</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
	                        </div>

	                    </div>
	                </section>
	                <section><?php if ( function_exists( 'wpsabox_author_box' ) ) echo wpsabox_author_box(); ?></section>
	                <section class="tags"><i class="fa fa-tag" aria-hidden="true"></i><?php the_tags(); ?></section>
	                <?php comments_template( '/comments.php' ); ?>
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