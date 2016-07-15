<?php get_header(); ?>
<div class="single-page">
    <div class="container">
        <?php if(has_post_thumbnail()) :?>
            <figure class="tb-featured-image"><?php echo get_the_post_thumbnail( $post_id, 'medium' ); ?></figure>
        <?php endif;?>
        <section>
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <article>
                <header>
                    <?php edit_post_link(); ?>
                    <h1>
                        <?php the_title();?>
                    </h1>
                </header>

                <?php the_content();?>

                <footer>
                    <span class="tb-post-time">Publicado no dia <time datetime="<?php the_time('Y-m-d g:i') ?>"> <?php the_time('j') ?> de <?php the_time('F') ?> de <?php the_time('Y') ?></time></span>
                </footer>
            </article>
            <?php endwhile; else: ?>
            <p><?php _e('Desculpe, essa página não existe.'); ?></p>
            <?php endif; ?>
        </section>
    </div>
</div>

<?php get_footer(); ?>