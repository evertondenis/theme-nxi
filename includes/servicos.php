<?php
$page_slug ='certificados';
$page_data = get_page_by_path($page_slug);

?>
<section class="servicos">
	<div class="container">
		<div class="row">
            <h1>
                Sua empresa merece o melhor.<br> <strong>Conheça nossas outras soluções.</strong>
            </h1>
		</div>
		
		<section class="container-services">
            <div class="container">

                <div class="list-servicos">
                    <?php
                    global $post;
                    $args = array(
                            'post_type' => 'servicos',
                            'post_status' => 'publish',
							'posts_per_page' => 10
                            );
                    $port_query = null;
                    $port_query = new WP_Query($args);

                    if( $port_query->have_posts() ) : while ($port_query->have_posts()) : $port_query->the_post(); ?>
                    <?php
			         $bg =  str_replace(" ", "", get_field('custom_color'));
			         $bg = explode(",", $bg);
			         $total = count($bg);

			          $bg = 'color: #' . $bg[0];
			         ?>
                    <?php if (has_post_thumbnail( $post->ID ) ): $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumb-servicos' ); endif; ?>
                    
                    <div class="box-servico">
                        <figure>
                            <img src="<?php echo $image[0]; ?>" alt="imagem sobre <?php the_title(); ?>" />
                        </figure>

                        <div class="info-servico">
                        	<p class="title" style="<?php //echo $bg ?>">
                                <?php the_title(); ?>
                            </p>
                        	<p><?php the_excerpt(); ?></p>
                            <p><?php if(get_field('url') != "" && get_field('url') != "#") :
                            ?>
                                <a href="<?php echo get_field('url') ? get_field('url') : the_permalink(); ?>" title="Conheça <?php the_title(); ?>" class="btn btn-orange btn-lg"><span>Conheça</span> <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            <?php endif ?></p>                        	
                        </div>
                    </div>

                    <?php endwhile; endif; wp_reset_query();?>
                </div>
            </div>
        </section>

	</div>
</section>

