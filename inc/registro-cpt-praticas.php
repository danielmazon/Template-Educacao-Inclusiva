<?php

/* Criando o Práticas custom post type */
function relato_praticas_post_type(){

	// definir um array de rótulos
	$post_type_labels = array(
		'name'                  => _x( 'Seus relatos de práticas inclusivas', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Prática', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Práticas', 'text_domain' ),
		'name_admin_bar'        => __( 'Relato de Práticas', 'text_domain' ),
		'archives'              => __( 'Arquivos de práticas', 'text_domain' ),
		'attributes'            => __( 'Atributos da prática', 'text_domain' ),
		'parent_item_colon'     => __( 'Prática:', 'text_domain' ),
		'all_items'             => __( 'Lista de relatos', 'text_domain' ),
		'add_new_item'          => __( 'Compartilhando sua experiência educacional inclusiva', 'text_domain' ),
		'add_new'               => __( 'Novo relato', 'text_domain' ),
		'new_item'              => __( 'Criar novo', 'text_domain' ),
		'edit_item'             => __( 'Editar esta prática', 'text_domain' ),
		'update_item'           => __( 'Atualizar relato', 'text_domain' ),
		'view_item'             => __( 'Ver esta prática no site', 'text_domain' ),
		'view_items'            => __( 'Ver relatos', 'text_domain' ),
		'search_items'          => __( 'Procurar relato', 'text_domain' ),
		'not_found'             => __( 'Não encontrado', 'text_domain' ),
		'not_found_in_trash'    => __( 'Não encontrado na lixeira', 'text_domain' ),
		'featured_image'        => __( 'Imagem destaque', 'text_domain' ),
		'set_featured_image'    => __( 'Selecionar imagem destaque', 'text_domain' ),
		'remove_featured_image' => __( 'Remover imagem destaque', 'text_domain' ),
		'use_featured_image'    => __( 'Usar imagem destaque', 'text_domain' ),
		'insert_into_item'      => __( 'Inserir intrudução', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Enviado para este item', 'text_domain' ),
		'items_list'            => __( 'Lista de itens', 'text_domain' ),
		'items_list_navigation' => __( 'Navegação da lista de itens', 'text_domain' ),
		'filter_items_list'     => __( 'Lista de itens de filtro', 'text_domain' ),
		);

	// definir um array de argumentos
	$post_type_args = array(
		'labels' => $post_type_labels,
		'public' => true,
		'menu_position' => 2,
		'menu_icon' => 'dashicons-media-document',
		//'capability_type' => 'praticas',
		'capabilities' => array(
			'read_post'					=> 'read_praticas',
			'read_private_posts' 		=> 'read_private_praticass',
			'edit_post'					=> 'edit_praticas',
			'edit_posts'				=> 'edit_praticass',
			'edit_others_posts'			=> 'edit_others_praticass',
			'edit_published_posts'		=> 'edit_published_praticass',
			'edit_private_posts'		=> 'edit_private_praticass',
			'delete_post'				=> 'delete_praticas',
			'delete_posts'				=> 'delete_praticass',
			'delete_others_posts'		=> 'delete_others_praticass',
			'delete_published_posts'	=> 'delete_published_praticass',
			'delete_private_posts'		=> 'delete_private_praticass',
			'publish_posts'				=> 'publish_praticass',
			'moderate_comments'			=> 'moderate_praticas_comments',
			),
		'map_meta_cap' => true,
		'hierarchical' => false,
		'supports' => array( 'title', 'thumbnail', 'excerpt', 'comments' ),
		'has_archive' => true,
		);

	register_post_type( 'praticas', $post_type_args );
	
}
add_action( 'init', 'relato_praticas_post_type' );
