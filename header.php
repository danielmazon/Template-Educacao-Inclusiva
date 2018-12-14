<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>

    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/educacaoinclusiva/style.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/educacaoinclusiva/css/bootstrap.min.css" >
    <link rel="stylesheet" href="<?php echo get_site_url(); ?>/wp-content/themes/educacaoinclusiva/vendor/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Catamaran:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">

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

			<li class="nav-item">
              <a class="nav-link" href="<?php echo get_site_url(); ?>/wp-admin">Entrar</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="<?php echo get_site_url(); ?>/cadastro">Cadastre-se</a>
            </li>

          </ul>
        </div>
      </div>
    </nav>