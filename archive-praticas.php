<?php get_header(); ?>

<?php
	/* User: Igor - Incluir breadcrumbs para melhorar a navegabilidade do site e rank em buscadores */
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<nav id="breadcrumbs"><div class="container">Você está em:  ','</div></nav>' );
	}
	
?>

<section class="container" id="lista-praticas">

	<h1>Lista de Práticas Inclusivas</h1>
	
	<div class="row">
	
		<div class="col-md-3" id="filtro-lista-praticas">
		
			<caption>Encontrar por:</caption>
			
		  	<?php
			  $categories = get_categories('taxonomy=deficiencia');
			 
			  $select = "<select name='cat' id='cat' class='form-control'>\n";
			  $select.= "<option value='-1'>Público atendido</option>\n";
			 
			  foreach($categories as $category){
				if($category->count > 0){
					$select.= "<option value='".$category->slug."'>".$category->name."</option>";
				}
			  }
			  $select.= "</select>";
			  echo $select;
			?>
			
		  	<?php
			  $categories = get_categories('taxonomy=modalidade');
			 
			  $select = "<select name='mod' id='mod' class='form-control'>\n";
			  $select.= "<option value='-1'>Modalidade de ensino</option>\n";
			 
			  foreach($categories as $category){
				if($category->count > 0){
					$select.= "<option value='".$category->slug."'>".$category->name."</option>";
				}
			  }
			  $select.= "</select>";
			  echo $select;
			?>

		  	<?php
			  $categories = get_categories('taxonomy=nivel');
			  //var_dump($categories);
			  $select = "<select name='niv' id='niv' class='form-control'>\n";
			  $select.= "<option value='-1'>Nível de ensino</option>\n";
			 
			  foreach($categories as $category){
				if($category->count > 0){
					//var_dump($category);
					// Recupera o nivel pai deste nivel
					$txt_parent = '';
					$slug_parent = '';
					if($category->parent != "0") {
						$parent = get_term_by('id', $category->parent, 'nivel' );
						//var_dump($parent);
						$slug_parent = $parent->slug . '/';
						$txt_parent = $parent->name . ' > ';
					}
					$select.= "<option value='".$slug_parent.$category->slug."'>".$txt_parent.$category->name."</option>";
				}
			  }
			  $select.= "</select>";
			  echo $select;
			?>
		</div>
	
	<script type="text/javascript"><!--
		var dropdown = document.getElementById("cat");
		function onCatChange() {
			if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
				location.href = "<?php echo home_url();?>/publico-educacao-especial/"+dropdown.options[dropdown.selectedIndex].value+"/";
			}
		}
		dropdown.onchange = onCatChange;
		var dropdown2 = document.getElementById("mod");
		function onModChange() {
			if ( dropdown2.options[dropdown2.selectedIndex].value != -1 ) {
				location.href = "<?php echo home_url();?>/modalidade/"+dropdown2.options[dropdown2.selectedIndex].value+"/";
			}
		}
		dropdown2.onchange = onModChange;
		var dropdown3 = document.getElementById("niv");
		function onNivChange() {
			if ( dropdown3.options[dropdown3.selectedIndex].value != -1 ) {
				location.href = "<?php echo home_url();?>/nivel/"+dropdown3.options[dropdown3.selectedIndex].value+"/";
			}
		}
		dropdown3.onchange = onNivChange;
	--></script>
	
	<div id="inicio_archive" class="col-md-9">
 
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
    
		<?php
				}
						
			}
			wp_reset_postdata(); 
		?>    

	</div>

</section>


<?php get_footer(); ?>