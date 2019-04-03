<?php get_header(); ?>

<?php
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<nav id="breadcrumbs"><div class="container">Você está em:  ','</div></nav>' );
	}
?>

<section class="container" >
	
	<h1><a href="<?php echo site_url(); ?>/noticias">Lista de Notícias</a></h1>
	
	<div class="row">

		<?php

			$args = array (
				'post_type' => 'blog',
				'posts_per_page' => 15,
				'post_status'    => 'publish',
			); 
				 
			// Custom query.
			$query = new WP_Query( $args );
				 
			// Check that we have query results.
			if ( $query->have_posts() ) {
			 
			// Start looping over the query results.
			while ( $query->have_posts() ) {
			$query->the_post();
		?>
		
		<div class="col-md-9">
 
			<h2>
				<a href="<?php the_permalink(); ?>" style="font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; color:#dd4b39;">
				<?php the_title(); ?></a>
			</h2>

			<?php echo the_excerpt() ?>
			
			<small>Autor: <?php the_author_posts_link() ?> - Publicado em: <?php the_time('d/m/Y') ?></small>
			
			<hr>
			
		</div>
		
		<div class="col-md-3">
			<!-- Implementar filtro por meses  -->
		</div>
		
		<?php
				}
			}
			wp_reset_postdata(); 
		?>
		
	</div>
		
</section>

<?php get_footer(); ?>