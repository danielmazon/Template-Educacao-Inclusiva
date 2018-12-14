<?php get_header(); ?>

<div class="container" style="padding-top: 50px;">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<div class="row" id="relato_pratica">
		<div class="col-md-8">

			<h1 style="font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; color:#dd4b39;"><?php the_title(); ?></h1>
			<small>Autor: <?php the_author_posts_link() ?> - Publicado em: <?php the_time('d/m/Y') ?> </small>
				
			<hr>    
			<?php the_content(); ?>


			<?php if (has_post_thumbnail( $post->ID ) ): ?>
						
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="float:left; margin:0 20px 10px 0;" >
					<?php the_post_thumbnail('medium'); ?>
				</a>
				
			<?php endif; ?> 

			<?php
				$curso_alunos = get_post_meta( get_the_ID(), 'curso_alunos', true ); 
				if ( !empty($curso_alunos)){
					echo '<h2>Com que curso; turma; quantos alunos/as?</h2>';
					echo apply_filters('meta_content', $curso_alunos);
				}
               
				$conteudo_abordado = get_post_meta( get_the_ID(), 'conteudo_abordado', true ); 
				if ( !empty($conteudo_abordado)){
					echo '<h2>Qual foi o conteúdo abordado?</h2>';
					echo apply_filters('meta_content', $conteudo_abordado);
				}
				
				$quantos = get_post_meta( get_the_ID(), 'quantos', true );
				if ( !empty($quantos)){
					echo '<h2>Quantos alunos deficientes envolvidos/quais deficiências?</h2>';
					echo apply_filters('meta_content', $quantos);
				}
				
				$quais_recursos = get_post_meta( get_the_ID(), 'quais_recursos', true );
				if ( !empty($quais_recursos)){
					echo '<h2>Quais recursos educacionais foram utilizados?</h2>';
					echo apply_filters('meta_content', $quais_recursos);
				}
				
				$quais_obstaculos = get_post_meta( get_the_ID(), 'quais_obstaculos', true );
				if ( !empty($quais_obstaculos)){
					echo '<h2>Quais obstáculos você superou na prática inclusiva descrita?</h2>';
					echo apply_filters('meta_content', $quais_obstaculos);
				}		

				$percepcao = get_post_meta( get_the_ID(), 'percepcao', true );
				if ( !empty($percepcao)){
					echo '<h2>O que você percebeu na turma após realizar esta prática?</h2>';
					echo apply_filters('meta_content', $percepcao);
				}		
							
				$quais_aprendizados = get_post_meta( get_the_ID(), 'quais_aprendizados', true );
				if ( !empty($quais_aprendizados)){
					echo '<h2>Quais aprendizados você teve como professor/a?</h2>';
					echo apply_filters('meta_content', $quais_aprendizados);
				}		

				$detalhe_pratica = get_post_meta( get_the_ID(), 'detalhe_pratica', true );
				if ( !empty($detalhe_pratica)){
					echo '<h2>Mais algum detalhe sobre a sua prática inclusiva</h2>';
					echo apply_filters('meta_content', $detalhe_pratica);
				}
				
				
	
				function cmb2_output_file_list( $file_list_meta_key, $img_size = 'medium' ) {

                // Get the list of files
                $files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );

                echo '<div class="file-list-wrap">';
                // Loop through them and output an image
                foreach ( (array) $files as $attachment_id => $attachment_url ) {
                    echo '<div class="file-list-image">';
                    echo wp_get_attachment_image( $attachment_id, $img_size );
                    echo '</div>';
                }
                echo '</div>';
            };
            cmb2_output_file_list( 'imagens', 'medium' );
			
			
			
			
			
			
			?>

			<div style="background-color:#f8f9fa; padding-right: 10px;padding-left: 10px;">

				<h4 style="font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; color:#666; border-bottom:1px solid #ccc; padding-top:15px;">Área da prática inclusiva:</h4>

				<?php
				
				the_taxonomies ( 

					array(
					  'before' => '<ul><li>',
					  'sep' => '</li><li>',
					  'after' => '</li></ul>',
					  'template' => '%s:<br> %l'
					) ); 
				?>
				
				<hr>	
				

					
			</div>
			
		</div>

		<div class="col-md-4">
			
			<div style="background-color:#f8f9fa; padding-right: 10px;padding-left: 10px;">
				
				<h4 style="font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; color:#666; border-bottom:1px solid #ccc; padding-top:15px;">Outras práticas:</h4>

				<?php
					$loop = new WP_Query( array( 'post_type' => 'praticas', 'posts_per_page' => 4,  'post__not_in' => array( $post->ID ) ) );
					while ( $loop->have_posts() ) : $loop->the_post();
				?>
						
					<a href="<?php the_permalink(); ?>">
						<h5 style="font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; color:#dd4b39"><?php the_title(); ?></h5>
					</a>
					
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
								
						<div style="float:left; margin:0 20px 10px 0;">
							<?php the_post_thumbnail('thumbnail'); ?>
						</div>
							
					<?php endif; ?> 
							
					<?php $myExcerpt = get_the_excerpt(); $tags = array("<p>", "</p>"); $myExcerpt = str_replace($tags, "", $myExcerpt); echo $myExcerpt; ?>

					<hr> 

				<?php endwhile; ?>
			</div>
		</div>

		<?php endwhile; else: ?>
		<p>Desculpe, nenhum relato corresponde aos seus critérios.</p>

		<?php endif; ?>
	</div>

</div>

<?php get_footer(); ?>