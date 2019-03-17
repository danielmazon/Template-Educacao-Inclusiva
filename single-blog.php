<?php get_header(); ?>

<?php
	/* User: Igor - Incluir breadcrumbs para melhorar a navegabilidade do site e rank em buscadores */
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<nav id="breadcrumbs"><div class="container">Você está em:  ','</div></nav>' );
	}
?>
			
<div class="container">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="row">
	
		<div class="col-md-8">

			<h1><?php the_title(); ?></h1>
			
			<small>Autor: <?php the_author_posts_link() ?> - Publicado em: <?php the_time('d/m/Y') ?> </small>

			<hr>

			<?php the_content(); ?>
			
			<?php comments_template(); ?>
			
		</div>
		
		<aside class="col-md-4" id="outras_praticas">
		
				<h4>Outras notícias:</h4>

				<?php
					$loop = new WP_Query( array( 'post_type' => 'blog', 'posts_per_page' => 6,  'post__not_in' => array( $post->ID ) ) );
					while ( $loop->have_posts() ) : $loop->the_post();
				?>
							
				<div class="row-fluid">
					
					<a class="titulos_aside" href="<?php the_permalink(); ?>">
					
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
								
						<div style="float:left; margin:0 10px 10px 0;">
							<?php the_post_thumbnail('thumb_130'); ?>
						</div>
								
					<?php endif; ?> 

					<h5><?php the_title(); ?></h5>

					</a>

				</div>	
					
				<hr style="clear:both;">
					
				<?php endwhile; ?>
		</aside>
		
		<?php endwhile; else: ?>

		<p>Desculpe, nenhum relato corresponde aos seus critérios.</p>

		<?php endif; ?>

		</aside>

	</article>

</div>

<?php get_footer(); ?>