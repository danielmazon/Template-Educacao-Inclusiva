<?php get_header(); ?>

<?php
	/* User: Igor - Incluir breadcrumbs para melhorar a navegabilidade do site e rank em buscadores */
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<nav id="breadcrumbs"><div class="container">Você está em:  ','</div></nav>' );
	}
	
?>

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
							/* User: Igor - Verificar se o author tem post de práticas para exibi-lo */
							$author_posts = $wpdb->get_results("SELECT count(*) posts_pratica from $wpdb->posts WHERE post_author = '".$aid."' AND post_type = 'praticas' AND post_status = 'publish'");
							//var_dump($author_posts[0]->posts_pratica);
							if($author_posts[0]->posts_pratica>0) {
							?>
							<div class="col-md-12">

								<div class="author_info <?php the_author_meta('user_nicename',$aid); ?>">
									<span class="author_photo"><?php echo get_avatar($aid,46); ?></span>
									<p><a href="<?php get_bloginfo('url'); ?><?php the_author_meta('user_nicename', $aid); ?>"><?php the_author_meta('display_name',$aid); ?> (<?=$author_posts[0]->posts_pratica?>)</a></p>  
									<p><?php the_author_meta('description',$aid); ?></p>
								</div>
							</div>
							<?php
							}
							?>
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