<?php get_header(); ?>

<?php
global $post;
$args = array( 
		'posts_per_page' => 1,
		'category_name' => 'banner',
		'orderby' => rand
		);
$bannersPost = get_posts( $args );

foreach( $bannersPost as $post ) : setup_postdata($post); 
	if (has_post_thumbnail( $post->ID ) ):
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
	endif;
?>
<section class="banner" style="background:transparent url(<?php echo $image[0]; ?>) center no-repeat;">
	<div class="container">
		
		<div class="col-md-6">
			<h1><?php the_title(); ?></h1>
			<p><?php the_content(); ?></p>
		</div>
		
	</div>
</section>
<?php endforeach; ?>

<!-- <section class="banner">
	<div class="container">
		<div class="col-md-6">
			<h1>Aumente os seus resultados</h1>
			<p>E-mails diários abordando conceito e inovações que farão o seu negócio avançar utilizando o inbound marketing.</p>
			<p><a class="btn btn-primary btn-lg" href="#"><span>Learn more</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
		</div>
	</div>
</section>
 -->
<section class="inbound">
	<div class="container">
		<?php
		global $post;
		$args = array( 
				'posts_per_page' => 1,
				'category_name' => 'inbound-marketing',
				'orderby' => rand
				);
		$inboundPost = get_posts( $args );

		foreach( $inboundPost as $post ) : setup_postdata($post); ?>
		<div class="col-md-6">
			<h1><?php the_title(); ?></h1>
		</div>
		<div class="col-md-6">
			<p><?php the_content(); ?></p>
			<p><a class="btn btn-blue-light btn-lg" href="<?php the_permalink(); ?>"><span>Conheça mais o Inbound</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
		</div>
		<?php endforeach; ?>
	</div>
</section>

<div id="inbound-cases" class="row">
	<section class="cases-home">
		<div class="container">
			<div class="row">
				<?php
				global $post;
				$args = array( 
						'posts_per_page' => 1,
						'category_name' => 'cases',
						'orderby' => rand
						);
				$casesPost = get_posts( $args );

				foreach( $casesPost as $post ) : setup_postdata($post); ?>
				<div class="col-md-4 content">
					<h1><span>Case de</span><br>Sucesso</h1>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
					<p><?php the_content(); ?></p>
					<p><a class="btn btn-ler-mais btn-lg" href="<?php the_permalink(); ?>"><i class="fa fa-chevron-right" aria-hidden="true"></i><span>ver case completo</span></a></p>
				</div>
				<div class="col-md-8">
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
					<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
						<figure>
							<img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
						</figure>
					<?php endif; ?>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	
	<section class="cta">
		<div class="container text-center">
			<?php
			global $post;
			$args = array( 
					'posts_per_page' => 1,
					'category_name' => 'cta',
					'orderby' => rand
					);
			$ctaPost = get_posts( $args );

			foreach( $ctaPost as $post ) : setup_postdata($post); ?>
				<?php the_content(); ?>
			<?php endforeach; ?>
		</div>
	</section>
</div>

<section class="materiais">
	<div class="container">
		<?php
		global $post;
		$args = array(
				'posts_per_page' => 1,
				'post_type' => 'portfolio',
				'post_status' => 'publish',
				'orderby' => rand
				);
		$port_query = null;
		$port_query = new WP_Query($args);

		if( $port_query->have_posts() ) {
		  while ($port_query->have_posts()) : $port_query->the_post(); ?>
		  	<div class="col-md-6">
				<h1><span>E-BOOK</span><br>GRÁTIS</h1>
				<p><?php the_title(); ?></p>
				<p><a class="btn btn-primary btn-lg" href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><span>Baixar e-book</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
			</div>

		  	<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
			<div class="col-md-6">
				<figure>
					<img class="img-responsive" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				</figure>
			</div>
			<?php endif; ?>
		    <?php
		  endwhile;
		}
		wp_reset_query();
		?>		
	</div>
</section>

<section class="depoimentos">
	<div class="container">
		<?php
		global $post;
		$args = array(
				'posts_per_page' => 3,
				'post_type' => 'testimonial',
				'post_status' => 'publish',
				'orderby' => rand
				);
		$testimonial_query = null;
		$testimonial_query = new WP_Query($args);

		if( $testimonial_query->have_posts() ) :
		  while ($testimonial_query->have_posts()) : $testimonial_query->the_post(); ?>

		  	<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<figure>
					<img class="img-responsive img-circle" src="<?php echo $image[0]; ?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" />
				</figure>
			<?php endif; ?>
		    
		    <p><a href="<?php the_permalink() ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
		    <?php
		  endwhile;
		endif;
		wp_reset_query();
		?>
	</div>
</section>

<!--<section class="certificados">
	<div class="container">
		<div class="row">
			<h1><span>Nós somos</span><br>certificados</h1>
		</div>
		<div class="row">
			<div class="col-md-4">
				<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
				<p><a class="btn btn-primary btn-lg" href="#"><span>Learn more</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
			</div>
			<div class="col-md-4">
				<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
			</div>
			<div class="col-md-4">
				<p>This is Photoshop's version  of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non  mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>
			</div>
		</div>
	</div>
</section>
-->
<section class="newsletter">
	<div class="container">
		<div class="row text-center">
			<h1>Cadastre-se e receba<br>dicas de como aumentar<br>as suas vendas</h1>
		</div>
		<div class="row text-center">
			<form class="navbar-form">
                <div class="form-group">
                    <input type="text" placeholder="Qual o seu nome" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" placeholder="Qual o seu e-mail" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary btn-lg"><span>Cadastrar e-mail</span><i class="fa fa-envelope-o" aria-hidden="true"></i></button>
            </form>
		</div>
	</div>
</section>

<?php get_footer(); ?>