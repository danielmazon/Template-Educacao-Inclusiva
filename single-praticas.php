<?php get_header(); ?>

<div class="container">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
	<article class="row" id="relato_pratica">
	
		<div class="col-md-8">

			<h1><?php the_title(); ?></h1>
			
			<small>Autor: <?php the_author_posts_link() ?> - Publicado em: <?php the_time('d/m/Y') ?> </small>

			<hr>
			
			<?php
				
				// Inicio da prática
				$curso_alunos = get_post_meta( get_the_ID(), 'curso_alunos', true ); 
				if ( !empty($curso_alunos)){
					echo '<h2>Quantidade de alunos que participaram desta prática inclusiva</h2>';
					echo apply_filters('meta_content', $curso_alunos);
				}
				/* User: igor - Correção apontada pela Daniele dia 15/10/2018, conforme planilha compartilhada de controle de alterações do
					projeto */
				$tag = get_post_meta( get_the_ID(), 'tag', true ); 
				if ( !empty($tag)){
					echo '<h2>Quantidade de alunos com deficiência envolvidos</h2>';
					echo apply_filters('meta_content', $tag);
				}
				/* User: igor - Correção apontada pela Daniele dia 15/10/2018, conforme planilha compartilhada de controle de alterações do
					projeto */
				$quantos = get_post_meta( get_the_ID(), 'quantos', true ); 
				if ( !empty($quantos)){
					echo '<h2>Quantidade de alunos com deficiência envolvidos</h2>';
					echo apply_filters('meta_content', $quantos);
				}
               
				$ano = get_post_meta( get_the_ID(), 'ano', true ); 
				if ( !empty($ano)){
					echo '<h2>Série/ano/fase em que a prática inclusiva ocorreu</h2>';
					echo apply_filters('meta_content', $ano);
				}
               
				$conteudo_abordado = get_post_meta( get_the_ID(), 'conteudo_abordado', true ); 
				if ( !empty($conteudo_abordado)){
					echo '<h2>Conteúdo abordado</h2>';
					echo apply_filters('meta_content', $conteudo_abordado);
				}

				$metodologia_pratica = get_post_meta( get_the_ID(), 'metodologia_pratica', true ); 
				if ( !empty($metodologia_pratica)){
					echo '<h2>Como ocorreu a prática inclusiva</h2>';
					echo apply_filters('meta_content', $metodologia_pratica);
				}

				$quais_recursos = get_post_meta( get_the_ID(), 'quais_recursos', true ); 
				if ( !empty($quais_recursos)){
					echo '<h2>Recursos educacionais utilizados</h2>';
					echo apply_filters('meta_content', $quais_recursos);
				}

				$realizar_pratica = get_post_meta( get_the_ID(), 'realizar_pratica', true ); 
				if ( !empty($realizar_pratica)){
					echo '<h2>Resultados alcançados</h2>';
					echo apply_filters('meta_content', $realizar_pratica);
				}
               
				$detalhe_pratica = get_post_meta( get_the_ID(), 'detalhe_pratica', true ); 
				if ( !empty($detalhe_pratica)){
					echo '<h2>Maiores informações sobre a prática inclusiva</h2>';
					echo apply_filters('meta_content', $detalhe_pratica);
				}
				// Lista de Imagens
				function cmb2_output_file_list( $file_list_meta_key, $img_size = 'large' ) {
					$files = get_post_meta( get_the_ID(), $file_list_meta_key, 1 );
					echo '<h2>Fotos da prática inclusiva</h2><div class="row">';
					foreach ( (array) $files as $attachment_id => $attachment_url ) {
						echo '<div class="col" style="padding-bottom:1em">';
						echo '<a href="' . $attachment_url .'" class="foobox" rel="gallery">';
						echo wp_get_attachment_image( $attachment_id, $img_size );
						echo '</a>';
						echo '</div>';
					}
					echo '</div>';
				};
				cmb2_output_file_list( 'imagens', 'medium' ); 
				
				$entries = get_post_meta( get_the_ID(), 'videos_group', true );
				
				if ( !empty($entries)){
				
					echo "<h2>Vídeos da prática inclusiva</h2>";
					
					foreach ( (array) $entries as $key => $entry ) {

						$url = esc_url( $entry['link_youtube'] );
						echo '<p><div class="video-container">' . wp_oembed_get( $url ) . "</div></p>";

					}				
					
				}
				
			?>

			<div>	
			<?php 
			/* User: igor - Plugins usam esse hook para posicionar seus conteúdos, por isso o hook foi chamado nessa posição */
			the_content(); ?>
			<?php comments_template(); ?>
			</div>
			
		</div>
		
		<aside class="col-md-4" id="lateral_single_praticas">

			<aside id="mais_infos">

				<h4>Sobre esta prática inclusiva:</h4>
				<?php 
				/* User: Igor - Modificação no código de exibição das taxonomias para exibir os itens pai das taxonomias que possuem hierarquia. */
				// Recupera as taxonomias de modalidade deste post
				$terms = wp_get_post_terms( $post->ID, 'modalidade' ); 
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					echo '<p>Modalidade de ensino: <a href="' . esc_url( get_term_link($terms[0]->term_id) ) . '">' . $terms[0]->name . '</a>.</p>';
				}
				// Recupera as taxonomias de nivel deste post
				$terms = wp_get_post_terms( $post->ID, 'nivel' ); 
				//var_dump($terms);
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					//Verificar se há nível pai
					if($terms[0]->parent != "0") {
						$parent = get_term_by('id', $terms[0]->parent, 'nivel' );
						$txt_parent = '<a href="' . get_term_link($terms[0]->parent) . '">' . $parent->name . '</a> / ';
					} else $parent = '';
					echo '<p>Nível de ensino: ' . $txt_parent . ' <a href="' . esc_url( get_term_link($terms[0]->term_id) ) . '">' . $terms[0]->name . '</a>.</p>';
				}
				// Recupera as taxonomias de deficiência deste post
				$terms = wp_get_post_terms( $post->ID, 'deficiencia' ); 
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					echo '<p>Tipos de deficiência: ';
					$virgula = "";
					foreach ( $terms as $term ) {
						echo $virgula . '<a href="' . esc_url( get_term_link($term->term_id) ) . '">' . $term->name . '</a>';
						$virgula = ", ";							
					}
					echo '.</p>';
				}
				// Recupera as taxonomias de outros-públicos deste post
				$terms = wp_get_post_terms( $post->ID, 'outros-publicos' ); 
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
					echo '<p>Outros públicos: ';
					$virgula = "";
					foreach ( $terms as $term ) {
						echo $virgula . '<a href="' . esc_url( get_term_link($term->term_id) ) . '">' . $term->name . '</a>';
						$virgula = ", ";							
					}
					echo '.</p>';
				}
				?>
			</aside>
			
			<aside id="outras_praticas">
				
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
				
			</aside>
		
		
		<?php endwhile; else: ?>

		<p>Desculpe, nenhum relato corresponde aos seus critérios.</p>

		<?php endif; ?>

		</aside>

	</article>
	
	

</div>

<?php get_footer(); ?>