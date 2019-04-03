<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:200" rel="stylesheet">

</head>

<body <?php body_class(); ?> id="page-top">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="mainNav">

      <div class="container">

        <a class="navbar-brand" href="<?php echo get_site_url(); ?>">Educação Inclusiva</a>

        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav ml-auto">
		  
			 <li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				  Sobre o projeto
				</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
				  <a class="dropdown-item" href="<?php echo get_site_url(); ?>/sobre">Sobre o projeto</a>
				  <a class="dropdown-item" href="<?php echo get_site_url(); ?>/parceiros">Parceiros</a>
				  <a class="dropdown-item" href="<?php echo get_site_url(); ?>/na-midia-clipping">Na mídia - clipping</a>
				  <a class="dropdown-item" href="<?php echo get_site_url(); ?>/contato">Contato</a>
				</div>
			  </li>
				<li class="nav-item">
					<a class="nav-link" href="<?php echo get_site_url(); ?>/noticias">Notícias</a>
				</li>
			<?php if (is_user_logged_in()) : ?>

				<li class="nav-item">
					<a class="nav-link" href="<?php echo get_site_url(); ?>/wp-admin/post-new.php?post_type=praticas">Escrever uma prática</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link last-item" href="<?php echo wp_logout_url(get_permalink()); ?>">Sair</a>
				</li>

			<?php else : ?>

				<li class="nav-item">
					<a class="nav-link" href="<?php echo wp_login_url(get_permalink()); ?>">Acesse sua conta</a>
				</li>
				
				<li class="nav-item">
					<a class="nav-link last-item" href="<?php echo get_site_url(); ?>/cadastro">Cadastre-se</a>
				</li>
				
			<?php endif;?>
			
          </ul>

        </div>

      </div>

    </nav>