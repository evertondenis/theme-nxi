<?php get_header();?>
<section class="banner sec-destaque" style="background:transparent url(<?php bloginfo('template_url');?>/images/bg-404_Page.jpg) center no-repeat;">
	<div class="container">
		<div class="col-md-12 text-center">
			<h1>opps! página<br>não encontrada</h1>
			<p><a class="btn btn-orange btn-lg" href="/" title="Voltar para a página de início"><span>Ir para a home</span><i class="fa fa-chevron-right" aria-hidden="true"></i></a></p>
		</div>
	</div>
</section>
<?php get_template_part( 'includes/ctas' ); ?>
<?php get_template_part( 'includes/newsletter' ); ?>
<?php get_footer();?>