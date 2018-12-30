<?php get_header(); ?>


<section class="container">

	<nav aria-label="caminho de migalhas" style="width:100%;">
		<?php //the_breadcrumb(); ?>
	</nav>
	
	<div id="inicio_archive">
	
			<?php if (have_posts()) : ?>
            
            <?php while (have_posts()) : the_post(); ?>            
            
			<div class="praticas-archive">
			
				<h4><a href="<?php the_permalink(); ?>" style="font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; color:#dd4b39;"><?php the_title(); ?></a></h4>
				
				<div class="row">
					<div class="col-md-9">
						<?php $myExcerpt = get_the_excerpt(); $tags = array("<p>", "</p>"); $myExcerpt = str_replace($tags, "", $myExcerpt); echo $myExcerpt; ?>
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
		
            <?php endwhile; ?>
         
            <?php else : ?>
    
            <h2>Não localizado</h2>
    
            <?php endif; ?>
	
</section>

<?php get_footer(); ?>