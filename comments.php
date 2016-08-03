<?php
// Do not delete these lines
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die ('Please do not load this page directly. Thanks!');

if ( post_password_required() ) { ?>
    <p class="nocomments">Este artigo está protegido por password. Insira-a para ver os comentários.</p>
    <?php
    return;
}
?>

<?php if ( comments_open() ) : ?>
    <section class="form-comment">
        <h3><i class="fa fa-comment" aria-hidden="true"></i><?php comments_number('0 Comentários', '1 Comentário', '% Comentários' );?></h3>
        
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
            <!-- <form method="post" id="commentform"> -->
            <?php if ( $user_ID ) : ?>
        
                <p>Autentificado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(); ?>" title="Sair desta conta">Sair desta conta &raquo;</a></p>
        
            <?php else : ?>
        
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding-left: 0px;">
                        <input type="text" name="author" id="author" placeholder="SEU NOME" value="<?php echo $comment_author; ?>" />
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" style="padding-right: 0px;">
                        <input type="text" name="email" id="email" placeholder="SEU E-MAIL" value="<?php echo $comment_author_email; ?>" />
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-12" style="padding: 0px;">
                        <textarea name="comment" id="comment" rows="" cols="" placeholder="DIXE AQUI A SUA MENSAGEM"></textarea>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" style="padding: 0px;">
                        <input type="submit" id="envio-contato" value="Enviar" class="btn"></p>
                    </div>
                    <?php comment_id_fields(); ?>
                    <?php do_action('comment_form', $post->ID); ?>
                </div>
                <?php comment_id_fields(); ?>
                <?php do_action('comment_form', $post->ID); ?> 
            <?php endif; ?>
        </form>
    </section>
<?php else : ?>
    <h2>Os comentários estão fechados.</h3>
<?php endif; ?>


<div id="comments">
    <?php if ( have_comments() ) : ?>

        <!-- <ul class="commentlist"> -->
            <!-- <?php //wp_list_comments('avatar_size=50&type=comment'); ?> -->
            <?php wp_list_comments('type=comment&callback=custom_comments'); ?>
        <!-- </ul> -->

        <?php if ($wp_query->max_num_pages > 1) : ?>
            <div class="pagination">
                <ul>
                    <li class="older"><?php previous_comments_link('Anteriores'); ?></li>
                    <li class="newer"><?php next_comments_link('Novos'); ?></li>
                </ul>
            </div>
        <?php endif; ?>

    <?php endif; ?>

    
</div>