	<div class="row">
		<div class="col-md-12">
			<div class="content">
				<h3>Buscar</h3>
					<?php include('searchform.php'); ?>
				<div class="clear">&nbsp;</div>
			</div>
		</div>
	</div>
<?php
$postType = get_queried_object();

if ($postType->name != "blog") {
?>
	<div class="row sb-newsletter">
		<div class="col-md-12">
			<div class="content">
				<h3><strong>Cadastre-se</strong> e<br> receba dicas de<br> como <strong>aumentar</strong> as<br> <strong>suas vendas</strong>.</h3>
				<div class="textwidget">
					<?php echo do_shortcode( '[contact-form-7 id="75" title="NEW Newsletter"]' ); ?>
				</div>
				<div class="clear">&nbsp;</div>
			</div>
		</div>
	</div>
<?php
}

if(is_active_sidebar('sidebar-blog')){
	dynamic_sidebar('sidebar-blog');
}

if ($postType->name == "blog") {
?>
	<div class="row sb-newsletter">
		<div class="col-md-12">
			<div class="content">
				<h3><strong>Cadastre-se</strong> e<br> receba dicas de<br> como <strong>aumentar</strong> as<br> <strong>suas vendas</strong>.</h3>
				<div class="textwidget">
					<?php echo do_shortcode( '[contact-form-7 id="75" title="NEW Newsletter"]' ); ?>
				</div>
				<div class="clear">&nbsp;</div>
			</div>
		</div>
	</div>
<?php
}
?>