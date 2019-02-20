<?php get_header(); ?>

<?php 
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
//var_dump($curauth);
?>

<div class="container">

	<article class="row" id="relato_pratica">

		<div class="col-md-12">
	
			<?php //if (function_exists('get_avatar')) { echo get_avatar( get_the_author_email(), '100' ); }?>
			<h1>Sobre o autor <?php echo $curauth->display_name; ?></h1>
			
			<p><?php echo $curauth->description; ?></p>
			
			<h1 style="padding-top:20px">Práticas publicadas </h1>

				<div class="container">
					
					<div class="row">

						<?php
							$loop = new WP_Query( array( 'post_type' => 'praticas', 'author' => $curauth->ID ) );
							if ( $loop->have_posts() ) {
								while ( $loop->have_posts() ) : $loop->the_post();
								?> 
								
								<div class="col-md-6">

									<div class="borda-praticas">


										<h4><a href="<?php the_permalink(); ?>" style="font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; color:#dd4b39;"><?php the_title(); ?></a></h4>

										<?php if (has_post_thumbnail( $post->ID ) ): ?>
										
											<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="float:left; margin:0 20px 10px 0;" >
												<?php the_post_thumbnail('thumbnail'); ?>
											</a>
											
										<?php endif; ?> 
										
										<?php $myExcerpt = get_the_excerpt(); $tags = array("<p>", "</p>"); $myExcerpt = str_replace($tags, "", $myExcerpt); echo $myExcerpt; ?>

									</div>
								</div>

							<?php 
								endwhile; 
								
							} else {
								?>
								<div class="col-md-12">
									<div class="borda-praticas">
										<p>Este autor ainda não publicou práticas inclusivas.</p>
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

		</div>
	</article>
</div>


<?php get_footer(); ?>