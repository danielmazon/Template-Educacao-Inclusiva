<?php

/**
 * Cria menu rápido para escrever relatos
 */
add_action( 'admin_bar_menu', 'menu_praticas', 900 );
function menu_praticas($wp_admin_bar)
{
	$args = array();
	array_push($args,array(
		'id'		=>	'praticas',
		'title'		=>	'+ Clique aqui e escreva o seu relato',
		'href'		=>	get_site_url() . '/wp-admin/post-new.php?post_type=praticas',
	));

	sort($args);
	foreach( $args as $each_arg)	{
		$wp_admin_bar->add_node($each_arg);
	}	
}