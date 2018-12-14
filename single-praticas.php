<?php get_header(); ?>

<div class="container">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<div class="row" id="relato_pratica">
	
		<div class="col-md-8">

			<h1><?php the_title(); ?></h1>
			
			<small>Autor: <?php the_author_posts_link() ?> - Publicado em: <?php the_time('d/m/Y') ?> </small>

			<hr>
			
			<?php
				
				// Inicio da prática
				
				$curso_alunos = get_post_meta( get_the_ID(), 'curso_alunos', true ); 
				if ( !empty($curso_alunos)){
					echo '<h2>Quantos alunos participaram desta prática inclusiva?</h2>';
					echo apply_filters('meta_content', $curso_alunos);
				}
               
				$tag = get_post_meta( get_the_ID(), 'tag', true ); 
				if ( !empty($tag)){
					echo '<h2>Quantos alunos deficientes envolvidos?</h2>';
					echo apply_filters('meta_content', $tag);
				}
               
				$quantos = get_post_meta( get_the_ID(), 'quantos', true ); 
				if ( !empty($quantos)){
					echo '<h2>Quantos alunos deficientes envolvidos?</h2>';
					echo apply_filters('meta_content', $quantos);
				}
               
				$ano = get_post_meta( get_the_ID(), 'ano', true ); 
				if ( !empty($ano)){
					echo '<h2>Qual a série/ano/fase em que a prática inclusiva ocorreu?</h2>';
					echo apply_filters('meta_content', $ano);
				}
               
				$conteudo_abordado = get_post_meta( get_the_ID(), 'conteudo_abordado', true ); 
				if ( !empty($conteudo_abordado)){
					echo '<h2>Qual foi o conteúdo abordado?</h2>';
					echo apply_filters('meta_content', $conteudo_abordado);
				}

				$metodologia_pratica = get_post_meta( get_the_ID(), 'metodologia_pratica', true ); 
				if ( !empty($metodologia_pratica)){
					echo '<h2>Como ocorreu a prática inclusiva?</h2>';
					echo apply_filters('meta_content', $metodologia_pratica);
				}

				$quais_recursos = get_post_meta( get_the_ID(), 'quais_recursos', true ); 
				if ( !empty($quais_recursos)){
					echo '<h2>Quais recursos educacionais foram utilizados?</h2>';
					echo apply_filters('meta_content', $quais_recursos);
				}

				$realizar_pratica = get_post_meta( get_the_ID(), 'realizar_pratica', true ); 
				if ( !empty($realizar_pratica)){
					echo '<h2>Quais os resultados alcançados?</h2>';
					echo apply_filters('meta_content', $realizar_pratica);
				}
               
				$detalhe_pratica = get_post_meta( get_the_ID(), 'detalhe_pratica', true ); 
				if ( !empty($detalhe_pratica)){
					echo '<h2>Maiores informações sobre a prática inclusiva?</h2>';
					echo apply_filters('meta_content', $detalhe_pratica);
				}
				// Lista de Imagens
				function cmb2_output_file_list( $file_list_meta_key, $img_size = 'large' ) {
					$files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
					echo '<div class="row">';
					foreach ( (array) $files as $attachment_id => $attachment_url ) {
						echo '<div class="col">';
						echo '<a href="' . $attachment_url .'" class="foobox" rel="gallery">';
						echo wp_get_attachment_image( $attachment_id, $img_size );
						echo '</a>';
						echo '</div>';
					}
					echo '</div>';
				};
				cmb2_output_file_list( 'imagens', 'medium' ); 
				
			?>

		</div>
		
		<div class="col-md-4" id="lateral_single_praticas">

			<aside id="mais_infos">

				<h4>Sobre esta prática inclusiva:</h4>
	
				<?php //MOSTRAR TAXONOMIAS
				
					$terms = get_terms( 'criterios' );
					 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						echo '<p>Deficiências atendidas:';
						echo '&nbsp;';
						 foreach ( $terms as $term ) {
						   echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>, &nbsp;';
						 }
						 echo '</br></p>';
					 }

					$terms = get_terms( 'modalidade' );
					 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						echo '<p>Modalidade da prática:';
						echo '&nbsp;';
						 foreach ( $terms as $term ) {
						   echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>, &nbsp;';
							
						 }
						 echo '</br></p>';
					 }

					$terms = get_terms( 'infantil' );
					 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						 echo '<p>Ensino Intantil:';
						 echo '&nbsp;';
						 foreach ( $terms as $term ) {
						   echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>, &nbsp;';
						 }
						 echo '</br></p>';
					 }

					$terms = get_terms( 'fundamental' );
					 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						 echo '<p>Ensino Fundamental:';
						 echo '&nbsp;';
						 foreach ( $terms as $term ) {
						   echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>, &nbsp;';
						 }
						 echo '</br></p>';
					 }
					 
					$terms = get_terms( 'medio' );
					 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						 echo '<p>Ensino Médio:';
						 echo '&nbsp;';
						 foreach ( $terms as $term ) {
						   echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>, &nbsp;';
						 }
						 echo '</br></p>';
					 }
					 

					$terms = get_terms( 'superior' );
					 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						 echo '<p>Ensino Superior:';
						 echo '&nbsp;';
						 foreach ( $terms as $term ) {
						   echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>, &nbsp;';
						 }
						 echo '</br></p>';
					 }
					 
					$terms = get_terms( 'deficiencia' );
					 if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
						echo '<p>Deficiências atendidas:';
						echo '&nbsp;';
						 foreach ( $terms as $term ) {
						   echo '<a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>, &nbsp;';
						 }
						 echo '</br></p>';
					 }		
				?>
				
			</aside>
			
			<div id="outras_praticas">
				
				<h4>Outras práticas:</h4>

				<?php
					$loop = new WP_Query( array( 'post_type' => 'praticas', 'posts_per_page' => 4,  'post__not_in' => array( $post->ID ) ) );
					while ( $loop->have_posts() ) : $loop->the_post();
				?>
							
				<div class="row-fluid">
					
					<a href="<?php the_permalink(); ?>">
					
					<?php if (has_post_thumbnail( $post->ID ) ): ?>
								
						<div style="float:left; margin:0 10px 10px 0;">
							<?php the_post_thumbnail('imagem-aside'); ?>
						</div>
								
					<?php endif; ?> 

					<h5 class="titulos_aside"><?php the_title(); ?></h5>

					</a>

				</div>	
					
				<hr style="clear:both;">
					
				<?php endwhile; ?>
				
			</div>

		<?php endwhile; else: ?>

		<p>Desculpe, nenhum relato corresponde aos seus critérios.</p>

		<?php endif; ?>

		</div>

	</div>

</div>

<?php get_footer(); ?>