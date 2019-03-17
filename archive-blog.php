<?php get_header(); ?>

<?php
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<nav id="breadcrumbs"><div class="container">Você está em:  ','</div></nav>' );
	}
?>

<section class="container">

	<h1>Blog</h1>
	
	<div class="row">
	
		<div class="col-md-3">
		
			
		</div>
	
	
	<div class="col-md-9">
 
				<h2><a href="<?php the_permalink(); ?>" style="font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; color:#dd4b39;"><?php the_title(); ?></a></h2>

				<div class="row">
					<div class="col-md-3">
						<?php if (has_post_thumbnail( $post->ID ) ): ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="float:left; margin:0 20px 10px 0;" >
								<?php the_post_thumbnail('thumb_200'); ?>
							</a>
						<?php endif; ?> 
					</div>
					
					<div class="col-md-9">
						<?php echo the_excerpt() ?>
						<small class="pull-right">Autor: <?php the_author_posts_link() ?> - Publicado em: <?php the_time('d/m/Y') ?></small>
					</div>
				</div>  

	</div>

</section>


<?php get_footer(); ?>