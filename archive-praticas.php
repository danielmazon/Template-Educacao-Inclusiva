<?php get_header(); ?>


<section class="container">

	<nav aria-label="caminho de migalhas" style="width:100%;">
		<?php the_breadcrumb(); ?>
	</nav>
	
	<div id="inicio_archive">
 
		<?php
	
			$args = array (
                    'post_type' => 'praticas',
					'posts_per_page' => -1,
					'post_status'    => 'publish',
					'meta_query' => array( 'relation' => 'OR', 
									array( 'key' => 'qualreaaprtic_41260', 'value' => 'Matemática' ), 
									array( 'key' => 'qualreaaprtic_41260', 'value' => 'Geografia' ) ) ); 

			 
			// Custom query.
			$query = new WP_Query( $args );
			 
			// Check that we have query results.
			if ( $query->have_posts() ) {
			 
				// Start looping over the query results.
				while ( $query->have_posts() ) {
			 
					$query->the_post();
		?>	 
		
			<div class="praticas-archive">
			
				<h4><a href="<?php the_permalink(); ?>" style="font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; color:#dd4b39;"><?php the_title(); ?></a></h4>
				
				<div class="row">
					<div class="col-md-9">
						<?php $myExcerpt = get_the_excerpt(); $tags = array("<p>", "</p>"); $myExcerpt = str_replace($tags, "", $myExcerpt); echo $myExcerpt; ?>
					</div>
				
					<div class="col-md-3">
						<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( ' %s', 'thirdstyle' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">
							<?php the_post_thumbnail( thumbnail ); ?>
						</a>
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