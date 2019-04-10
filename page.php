<?php get_header(); ?>

<?php
	/* User: Igor - Incluir breadcrumbs para melhorar a navegabilidade do site e rank em buscadores */
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<nav id="breadcrumbs"><div class="container">Você está em:  ','</div></nav>' );
	}
?>

<section>

	<div class="container" id="paginas">

		<?php while ( have_posts() ) : the_post(); ?>
		
		<h1><?php the_title(); ?></h1>
		
		<?php the_content(); ?>

		<?php endwhile; ?>

	</div>

</section>

<?php get_footer(); ?>