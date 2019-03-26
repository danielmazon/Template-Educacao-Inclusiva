<?php get_header(); ?>

<?php 
	/* User: Igor - Incluir breadcrumbs para melhorar a navegabilidade do site e rank em buscadores */
	if ( function_exists('yoast_breadcrumb') ) {
		yoast_breadcrumb( '<nav id="breadcrumbs"><div class="container">Você está em:  ','</div></nav>' );
	}
	
?>

<section class="container" id="lista-praticas">

	<?php
	/* User: igor - Recuperar o post para identificar o seu nível pai para exibir no título da página <h1> */
	$queried_object = get_queried_object();
	// User: igor - Recuperar o nível pai.
	$parent = get_term_by('id', $queried_object->parent, 'nivel' ); ?>

	<h1><a href="<?php echo site_url(); ?>/praticas">Lista de Práticas Inclusivas</a> / <span style="color:#888"><?php single_cat_title(); ?></span>
		
		<?php // User: igor - Exibir na tela caso haja nível pai.
			if($parent->name != '') echo ' / ' . $parent->name;
		?>
		
	</h1>
	
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
			
			<?php if (have_posts()) : ?>
            
            <?php while (have_posts()) : the_post(); ?>            
            
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
		
            <?php endwhile; ?>
         
            <?php else : ?>
    
            <h2>Não localizado</h2>
    
            <?php endif; ?>
	</div>
	
	<?php 
	/* User: igor - Plugins usam esse hook para posicionar seus conteúdos, por isso o hook foi chamado nessa posição */
	the_content(); ?>
	
</section>

<?php get_footer(); ?>