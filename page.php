<?php get_header(); ?>

<section>

	<div class="container">

		<?php
		/* User: Igor - Incluir breadcrumbs para melhorar a navegabilidade do site e rank em buscadores */
		if ( function_exists('yoast_breadcrumb') ) {
		  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
		}
		?>

		<?php while ( have_posts() ) : the_post(); ?>
		
		<?php the_content(); ?>

		<?php endwhile; ?>

	</div>

</section>


<?php get_footer(); ?>