<?php
$page_slug ='certificados';
$page_data = get_page_by_path($page_slug);

?>
<section class="certificados">
	<div class="container">
		<div class="row">
			<h1><span>Escolha o </span><br>Sucesso</h1>
		</div>
		<?php echo $page_data->post_content; ?>
	</div>
</section>

