<?php get_header(); ?>

<div class="container">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article class="row" id="relato_pratica">
	
			<?php //if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '100' ); }?>
			
			<h1>Lista de autores</h1>
			
				<div class="container">
					
					<div class="row">
						
						<?php
						global $wpdb;
						$authors = $wpdb->get_results("SELECT ID, user_nicename from $wpdb->users ORDER BY display_name");
						foreach ($authors as $author ) { 
							$aid = $author->ID; 
							?>
							<div class="col-md-12">

								<div class="author_info <?php the_author_meta('user_nicename',$aid); ?>">
									<span class="author_photo"><?php echo get_avatar($aid,46); ?></span>
									<p><a href="<?php get_bloginfo('url'); ?><?php the_author_meta('user_nicename', $aid); ?>"><?php the_author_meta('display_name',$aid); ?></a></p>  
									<p><?php the_author_meta('description',$aid); ?></p>
								</div>
							</div>
						<?php
						} 						
						?>
						
					</div>	
					
				</div>
			
			<?php 
			/* User: igor - Plugins usam esse hook para posicionar seus conteúdos, por isso o hook foi chamado nessa posição */
			the_content(); ?>

	</article>
	<?php endwhile; endif; ?>
</div>


<?php get_footer(); ?>