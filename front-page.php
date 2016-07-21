<?php get_header(); ?>

<?php get_template_part( 'includes/destaques' ); ?>
<?php get_template_part( 'includes/inbound' ); ?>
<div id="inbound-cases" class="row">
	<?php get_template_part( 'includes/cases' ); ?>
	<?php get_template_part( 'includes/ctas' ); ?>
</div>
<?php get_template_part( 'includes/materiais' ); ?>
<?php get_template_part( 'includes/depoimentos' ); ?>
<?php get_template_part( 'includes/certificados' ); ?>
<?php get_template_part( 'includes/newsletter' ); ?>

<?php get_footer(); ?>