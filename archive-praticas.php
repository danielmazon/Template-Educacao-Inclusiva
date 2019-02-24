<?php get_header(); ?>


<section class="container">

	<?php
	/* User: Igor - Incluir breadcrumbs para melhorar a navegabilidade do site e rank em buscadores */
	if ( function_exists('yoast_breadcrumb') ) {
	  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
	}
	?>	
	<h1>Práticas</h1>
	<div id="inicio_archive">
 
		<?php
	
/*			$args = array (
                    'post_type' => 'praticas',
					'posts_per_page' => 150,
					'post_status'    => 'publish',
					'meta_query' => array( 'relation' => 'OR', 
									array( 'key' => 'qualreaaprtic_41260', 'value' => 'Matemática' ), 
									array( 'key' => 'qualreaaprtic_41260', 'value' => 'Geografia' ) ) ); */

			$args = array (
                    'post_type' => 'praticas',
					'posts_per_page' => 150,
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
		
			<div class="praticas-archive">
			
				<h2><a href="<?php the_permalink(); ?>" style="font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; color:#dd4b39;"><?php the_title(); ?></a></h2>
				
				<div class="row">
					<div class="col-md-9">
						<p><?php $myExcerpt = get_the_excerpt(); /*$tags = array("<p>", "</p>"); $myExcerpt = str_replace($tags, "", $myExcerpt);*/ echo $myExcerpt; ?></p>
					</div>
				
					<div class="col-md-3">
						<?php if (has_post_thumbnail( $post->ID ) ): ?>
							
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="float:left; margin:0 20px 10px 0;" >
									<?php the_post_thumbnail('thumbnail'); ?>
								</a>
								
							<?php endif; ?> 
					</div>

				</div>

			</div>
    
		<?php
				}
						
			}
			wp_reset_postdata(); 
		?>    

	</div>

</section>


<?php get_footer(); ?>