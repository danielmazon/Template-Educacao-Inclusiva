<?php get_header(); ?>
  
    <section class="cta">
      <div class="cta-content">
        <div class="container">
          <h1>Plataforma colaborativa de práticas educacionais inclusivas</h1>
          <a href="<?php echo get_site_url(); ?>/cadastro" class="btn btn btn-outline-light btn-lg" style="border-radius: 300px;padding: 15px 45px;">Compartilhe sua experiência</a>
        </div>
      </div>
      <div class="overlay"></div>
    </section>

	<section class="bg-inicial" id="sobre" style="background:#fdc94a;">
      <div class="container">
	  	<div class="row">

		  <div class="col-md-7">
			<img src="<?php echo get_site_url(); ?>/wp-content/themes/educacaoinclusiva/img/imagem2.jpg" width="100%">
		  </div>
		  
		  <div class="col-md-5">
			<h4>Que tal compartilhar sua prática educacional inclusiva e contribuir para que a inclusão aconteça cada vez mais?</h4>
			<p>Uma prática educacional inclusiva onde todos(as) estudantes acessam e participam da aprendizagem, promove colaboração, participação democrática, empatia, ética nas relações, solidariedade, proatividade, respeito à diversidade, cuidado com as pessoas e com o ambiente, sustentabilidade, confiança e cidadania.</p>
			
			<p><a class="btn" style="background-color: #014b94!important;" data-toggle="collapse" data-target="#libras1" target="_blank">
				<img src="http://educacaoinclusiva.org/wp-content/uploads/2018/12/libras90px.jpg" width="44" height="30" />
				<span style="color: #ffffff;"><strong>Acessível em Libras</strong></span></a>
			</p>
			
			<div id="libras1" class="collapse" style="margin-top: 30px;">
				<div class="responsive-video">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/Ym7SHHg1ADU?modestbranding=1&autohide=1&showinfo=0&controls=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>


		   </div>
		 </div>
      </div>
    </section>
	
	<section style="padding:0;">	
	
		<div style="background-color:#dd4b39; margin-bottom:30px;">
			<div class="container">
				<div class="row"><div class="col-md-6">
				<h2 style="color:#fff; padding-top:30px; font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; ">Práticas compartilhadas: 
				</h2>
				</div><div class="col-md-6" style="line-height: 60px;">
				<h2 style="padding-top:15px; padding-bottom:15px; font-size: 1.5em;color:#fff; font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; ">Encontrar por: <?php
				  $categories = get_categories('taxonomy=deficiencia');
				 
				  $select = "<select name='cat' id='cat' class='postform'>n";
				  $select.= "<option value='-1'>Público atendido</option>n";
				 
				  foreach($categories as $category){
					if($category->count > 0){
						$select.= "<option value='".$category->slug."'>".$category->name."</option>";
					}
				  }
				  $select.= "</select>";
				  echo $select;
				?>
				</h2>
				</div>
				<script type="text/javascript"><!--
					var dropdown = document.getElementById("cat");
					function onCatChange() {
						if ( dropdown.options[dropdown.selectedIndex].value != -1 ) {
							location.href = "<?php echo home_url();?>/deficiencia/"+dropdown.options[dropdown.selectedIndex].value+"/";
						}
					}
					dropdown.onchange = onCatChange;
				--></script>
				</div>
			</div>
		</div>
		
		<div class="container">
			
			<div class="row">

				<?php
					$loop = new WP_Query( array( 'post_type' => 'praticas', 'posts_per_page' => 150 ) );
					while ( $loop->have_posts() ) : $loop->the_post();
				?> 
					
					<div class="col-md-6">

						<div class="borda-praticas">


							<h3><a href="<?php the_permalink(); ?>" style="font-family: 'Lato', 'Helvetica', 'Arial', 'sans-serif'; color:#dd4b39;"><?php the_title(); ?></a></h3>

							<?php if (has_post_thumbnail( $post->ID ) ): ?>
							
								<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" style="float:left; margin:0 20px 10px 0;" >
									<?php the_post_thumbnail('thumbnail'); ?>
								</a>
								
							<?php endif; ?> 
							
							<?php $myExcerpt = get_the_excerpt(); $tags = array("<p>", "</p>"); $myExcerpt = str_replace($tags, "", $myExcerpt); echo $myExcerpt; ?>

						</div>
					</div>

				<?php endwhile; ?> 

			</div>
	
	</section>

<?php get_footer(); ?>